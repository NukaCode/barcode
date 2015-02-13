<?php namespace spec\NukaCode\Barcode\Encoders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Code128Spec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Barcode\Encoders\Code128');
    }

    function it_checks_return_value_code128()
    {
        $this->encode('01234')
             ->shouldReturn('2112141231221232212232112211322212312412112331112');
    }
}