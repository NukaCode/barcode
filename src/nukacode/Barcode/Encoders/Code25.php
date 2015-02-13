<?php namespace NukaCode\Barcode\Encoders;

class Code25 extends BaseEncoder {

    public $encoding= [
        '0' => '11331', '1' => '31113', '2' => '13113', '3' => '33111', '4' => '11313',
        '5' => '31311', '6' => '13311', '7' => '11133', '8' => '31131', '9' => '13131'
    ];

    /**
     * Uppercase letters (A through D), numeric digits (0 through 9)
     * and a number of special characters (-, $, :, /, ., +)
     *
     * @var string The regex pattern to use when validating the code
     */
    protected $validationRegEx = '/[0-9]$/';

    public function encode($text)
    {
        $this->validateCode($text);

        $textArray = str_split($text);

        foreach ($textArray as $key => $value) {
            $textArray[$key] = $this->encoding[$value];
        }

        // If the array is not even then remove last element
        if (count($textArray) % 2 != 0) {
            array_pop($textArray);
        }

        $codeString = '';
        while (count($textArray) > 0) {
            $firstHalf = str_split(array_shift($textArray));
            $lastHalf = str_split(array_shift($textArray));

            foreach ($firstHalf as $key => $value) {
                $codeString .= $firstHalf[$key] . $lastHalf[$key];
            }
        }

        return "1111{$codeString}311";
    }

    public function getChecksum($text)
    {

    }
}