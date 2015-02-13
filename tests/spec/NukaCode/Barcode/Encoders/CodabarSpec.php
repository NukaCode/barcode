<?php namespace spec\NukaCode\Barcode\Encoders;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CodabarSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Barcode\Encoders\Codabar');
    }

    function it_checks_return_value_codabar()
    {
        $this->encode('01234')
             ->shouldReturn('1122121111111221111122111112112122111111112112111122121');
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