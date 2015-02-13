<?php namespace NukaCode\Barcode;

/**
 * Class BarcodeFacade
 *
 * @package NukaCode\Barcode
 */
class BarcodeFacade extends Illuminate\Support\Facades\Facade {

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