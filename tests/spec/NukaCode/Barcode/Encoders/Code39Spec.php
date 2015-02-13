<?php namespace spec\NukaCode\Barcode\Encoders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Code39Spec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Barcode\Encoders\Code39');
    }

    function it_checks_return_value_code39()
    {
        $this->encode('01234')
             ->shouldReturn('121121211111122121112112111121112211112121221111111112211121121121211');
    }

    function it_checks_for_invalid_code()
    {
        $this->shouldThrow(new \Exception("Code validation failed."))
             ->during('encode', ['00)']);
    }

    function it_checks_get_checksum()
    {
        $this->getChecksum('1234')
            ->shouldReturn(true);
    }
}