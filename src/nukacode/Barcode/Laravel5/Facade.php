<?php namespace NukaCode\Barcode\Laravel5;

/**
 * Class Facade
 *
 * @package NukaCode\Barcode
 */
class Facade extends Illuminate\Support\Facades\Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'barcode';
    }

}