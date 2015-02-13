<?php namespace NukaCode\Barcode\Encoders;

class Codabar extends BaseEncoder {

    public $encoding = [
        '1' => '11112211', '2' => '11121121', '3' => '22111111', '4' => '11211211', '5' => '21111211',
        '6' => '12111121', '7' => '12112111', '8' => '12211111', '9' => '21121111', '0' => '11111221',
        '-' => '11122111', '$' => '11221111', ':' => '21112121', '/' => '21211121', '.' => '21212111',
        '+' => '11212121', 'A' => '11221211', 'B' => '12121121', 'C' => '11121221', 'D' => '11122211'
    ];

    /**
     * Uppercase letters (A through D), numeric digits (0 through 9)
     * and a number of special characters (-, $, :, /, ., +)
     *
     * @var string The regex pattern to use when validating the code
     */
    protected $validationRegEx = '/[A-D0-9\-\$\:\/.\+]$/';


    public function encode($text)
    {
        $this->validateCode($text);

        $textArray = str_split($text);

        foreach ($textArray as $key => $value) {
            $textArray[$key] = $this->encoding[$value];
        }

        $codeString = implode('', $textArray);

        return "11221211{$codeString}1122121";
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