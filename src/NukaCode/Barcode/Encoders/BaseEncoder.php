<?php namespace NukaCode\Barcode\Encoders;

abstract class BaseEncoder implements Encoder {

    protected $validateRegEx;

    /**
     * Validate the code
     *
     * @param $text the code to validate
     *
     * @throws \Exception Code must be numeric
     */
    public final function validateCode($text)
    {
        if (preg_match($this->validationRegEx, $text) == false) {
            throw new \Exception('Code validation failed.');
        }
    }
}