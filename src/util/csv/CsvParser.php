<?php
namespace util\csv;

use util\common\CommonUtil;
use core\ApplicationException;

class CsvParser
{

    public const DEFAULT_DELIMITER = ',';

    public const DEFAULT_ENCLOSURE = '"';

    public const CR = "\r";

    public const LF = "\n";

    public const CRLF = "\r\n";

    private $delimiter;

    private $enclosure;

    private $type;

    public function __construct()
    {
        $this->delimiter = self::DEFAULT_DELIMITER;
        $this->enclosure = self::DEFAULT_ENCLOSURE;
    }

    public function setEnclosure(string $enclosure)
    {
        $this->enclosure = $enclosure;
    }

    public function setDelimiter(string $delimiter)
    {
        $this->delimiter = $delimiter;
    }

    public function parseString($data): CsvData
    {
        $lineDelimiter = self::CRLF;
        if (mb_strpos($data, self::CRLF) === false) {
            $lineDelimiter = (mb_strpos($data, self::LF) !== false) ? self::LF : self::CR;
        }

        $csvGenerator = $this->parse(CommonUtil::stringTokenize($data, $lineDelimiter), $lineDelimiter);
        return new CsvData($csvGenerator, $lineDelimiter);
    }

    public function parseFile(string $filename): CsvData
    {
        $handle = fopen($filename, 'r');
        $line = fgets($handle);
        $encoding = mb_detect_encoding($line, 'ASCII,JIS,UTF-8,CP51932,SJIS-win') ?: mb_internal_encoding();

        $line_delimiter = self::CRLF;
        if (mb_strpos($line, self::CRLF) === false) {
            $line_delimiter = (mb_strpos($line, self::LF) !== false) ? self::LF : self::CR;
        }

        fseek($handle, 0);

        $csvGenerator = $this->parse($this->toFileLineGenerator($handle, $line_delimiter, $encoding), $line_delimiter);
        $csvData = new CsvData($csvGenerator, $line_delimiter);
        $csvData->setEncoding($encoding);
        return $csvData;
    }

    private function toFileLineGenerator($handle, string $lineDelimiter, string $encoding): \Generator
    {
        while (($line = fgets($handle)) !== false) {
            if ($encoding !== mb_internal_encoding()) {
                $line = mb_convert_encoding($line, mb_internal_encoding(), $encoding);
            }
            if (mb_strpos($line, $lineDelimiter) !== false) {
                $line = rtrim($line);
            }
            yield $line;
        }

        fclose($handle);
    }

    /**
     * $data(CSVデータ）を解析する
     *
     * @param string $data
     * @return CsvData
     */
    public function parse(\Generator $lineGenerator, string $lineDelimiter): \Generator
    {
        $lineContinued = false;
        $delimEndFlg = false;
        $lineWk = '';
        $quotedDelimiter = str_replace("\t", '\t', preg_quote($this->delimiter));
        $quotedEnclosure = preg_quote($this->enclosure);

        foreach ($lineGenerator as $line) {

            if ($line === '') {
                break;
            }

            $lineWk .= $line;

            $pattern = '/';
            if ($this->enclosure !== '') {
                $pattern .= "^${quotedEnclosure}";
                $pattern .= "|${quotedEnclosure}$";
                $pattern .= "|(?=.${quotedEnclosure})";
                $pattern .= "(?!(?!${quotedDelimiter}).${quotedEnclosure})";
                $pattern .= "|(?=${quotedEnclosure}.)";
                $pattern .= "(?!${quotedEnclosure}(?!${quotedDelimiter}).)";
            }
            $pattern .= '/';

            if (preg_match_all($pattern, $line) % 2 === ($lineContinued ? 0 : 1)) {
                $lineContinued = true;
                $lineWk .= $lineDelimiter;
                continue;
            } else {
                $lineContinued = false;
            }

            if (mb_strrpos($lineWk, $this->delimiter) === mb_strlen($lineWk) - mb_strlen($this->delimiter)) {
                $delimEndFlg = true;
            }

            $delimLen = 0;
            $cols = array();

            while (mb_strlen($lineWk) > 0) {
                $pos = false;

                if (mb_strpos($lineWk, $this->enclosure) === 0) {
                    // 囲み文字で始まる場合
                    $lineWk = mb_substr($lineWk, strlen($this->enclosure));
                    $pos = mb_strpos($lineWk, $this->enclosure . $this->delimiter);

                    if ($pos !== false) {
                        $delimLen = mb_strlen($this->enclosure . $this->delimiter);
                    }
                } else {
                    // 囲み文字で始まらない場合
                    $pos = mb_strpos($lineWk, $this->delimiter);
                    if ($pos !== false) {
                        $delimLen = mb_strlen($this->delimiter);
                    }
                }

                $col = '';
                if ($pos !== false) {
                    $col = mb_substr($lineWk, 0, $pos);
                    $lineWk = mb_substr($lineWk, $pos + $delimLen);
                } else {
                    $col = $lineWk;
                    $lineWk = '';
                }

                array_push($cols, $col);
            }

            if ($delimEndFlg) {
                array_push($cols, '');
            }

            yield $cols;
        }

        if ($lineWk !== '') {
            throw new ApplicationException('E0003');
        }
    }
}