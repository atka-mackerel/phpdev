<?php
namespace util\common;

class CommonUtil
{

    private const ESCAPE_SEQUECES = [
        "\\n" => "\n",
        "\\r" => "\r",
        "\\t" => "\t",
        "\\\\" => "\\",
        "\\\$" => "\$",
        "\\(" => '(',
        "\\)" => ')',
        "\\[" => '[',
        "\\]" => ']',
        "\\\'" => "\'",
        "\\\"" => '"'
    ];

    /**
     * $strを$delimiterによってトークンに分割する
     *
     * @param string $str
     * @param string $delimiter
     * @return \Generator
     */
    public static function stringTokenize(string $str, string $delimiter): \Generator
    {
        do {
            $pos = mb_strpos($str, $delimiter);
            if ($pos !== false) {
                $token = mb_substr($str, 0, $pos);
                $str = mb_substr($str, $pos + strlen($delimiter));
                yield $token;
            } else {
                yield $str;
            }
        } while ($pos !== false);
    }

    public static function unescape(string $str): string
    {
        foreach (self::ESCAPE_SEQUECES as $sequence => $replace) {
            $str = str_replace($sequence, $replace, $str);
        }
        return $str;
    }

    public static function getMessage(string $messageId): string
    {
        return $_SESSION['MESSAGE'][$messageId] ?? null;
    }
}

