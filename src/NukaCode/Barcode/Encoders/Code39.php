<?php namespace NukaCode\Barcode\Encoders;


class Code39 extends BaseEncoder {

    public $encoding = [
        '0' => '1112212111', '1' => '2112111121', '2' => '1122111121', '3' => '2122111111', '4' => '1112211121',
        '5' => '2112211111', '6' => '1122211111', '7' => '1112112121', '8' => '2112112111', '9' => '1122112111',
        'A' => '2111121121', 'B' => '1121121121', 'C' => '2121121111', 'D' => '1111221121', 'E' => '2111221111',
        'F' => '1121221111', 'G' => '1111122121', 'H' => '2111122111', 'I' => '1121122111', 'J' => '1111222111',
        'K' => '2111111221', 'L' => '1121111221', 'M' => '2121111211', 'N' => '1111211221', 'O' => '2111211211',
        'P' => '1121211211', 'Q' => '1111112221', 'R' => '2111112211', 'S' => '1121112211', 'T' => '1111212211',
        'U' => '2211111121', 'V' => '1221111121', 'W' => '2221111111', 'X' => '1211211121', 'Y' => '2211211111',
        'Z' => '1221211111', '-' => '1211112121', '.' => '2211112111', ' ' => '1221112111', '$' => '1212121111',
        '/' => '1212111211', '+' => '1211121211', '%' => '1112121211', '*' => '1211212111'
    ];

    /**
     * Uppercase letters (A through Z), numeric digits (0 through 9)
     * and a number of special characters (-, ., $, /, +, %, *) and space
     *
     * @var string The regex pattern to use when validating the code
     */
    protected $validationRegEx = '/[A-Z0-9\-. \$\/\+%\*]$/';

    public function encode($text)
    {
        $this->validateCode($text);

        $textArray = str_split($text);

        foreach ($textArray as $key => $value) {
            $textArray[$key] = $this->encoding[$value];
        }

        $codeString = implode('', $textArray);

        return "1211212111{$codeString}121121211";
    }

    /**
     * Code39 does not contain a check digit.
     *
     * @param $text
     *
     * @return bool
     */
    public function getChecksum($text)
    {
        return true;
    }
}