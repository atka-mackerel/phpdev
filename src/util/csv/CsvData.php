<?php
namespace util\csv;

class CsvData
{

    private const MAX_VIEW_COUNT = 100;

    private $lines;

    private $generator;

    private $lineDelimiter;

    private $encoding;

    public function __construct(\Generator $generator, string $line_delimiter)
    {
        $this->generator = $generator;
        $this->lineDelimiter = $line_delimiter;
        $this->encoding = mb_internal_encoding();
    }

    public function setEncoding(string $encoding)
    {
        $this->encoding = $encoding;
    }

    public function getEncoding()
    {
        return $this->encoding;
    }

    public function getLine($position): array
    {
        $line = $this->lines[$position];
        return isset($line) ? $line : NULL;
    }

    public function getLines(): array
    {
        if (! isset($this->lines)) {
            $this->lines = array();
            foreach ($this->generator as $line) {
                if (count($this->lines) < self::MAX_VIEW_COUNT) {
                    array_push($this->lines, $line);
                }
            }
        }
        return $this->lines;
    }

    public function convert(string $enclosure, string $delimiter): string
    {
        $csv = '';
        foreach ($this->getLines() as $line) {
            $csv .= $enclosure . implode($enclosure . $delimiter . $enclosure, $line) . $enclosure . $this->lineDelimiter;
        }
        return $csv;
    }

    public function convertStream(string $enclosure, string $delimiter): \Generator
    {
        foreach ($this->generator as $line) {
            yield $enclosure . implode($enclosure . $delimiter . $enclosure, $line) . $enclosure . $this->lineDelimiter;
        }
    }
}