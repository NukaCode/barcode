<?php namespace spec\NukaCode\Barcode\Encoders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Code25Spec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Barcode\Encoders\Code25');
    }

    function it_checks_return_value_code25()
    {
        $this->encode('01234')
             ->shouldReturn('111113113131131333111131311');
    }

    function it_checks_for_invalid_code()
    {
        $this->shouldThrow(new \Exception("Code validation failed."))
             ->during('encode', ['abc']);
    }
}