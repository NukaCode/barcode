<?php namespace spec\NukaCode\Barcode;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BarcodeSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('NukaCode\Barcode\Barcode');
    }

    function it_checks_return_value_code128()
    {
        $this->_encode_code128('01234')
             ->shouldReturn('2112141231221232212232112211322212312412112331112');
    }

    function it_checks_return_value_code39()
    {
        $this->_encode_code39('01234')
             ->shouldReturn('121121211111122121112112111121112211112121221111111112211121121121211');
    }

    function it_checks_return_value_code25()
    {
        $this->_encode_code25('01234')
             ->shouldReturn('111113113131131333111131311');
    }

    function it_checks_return_value_codabar()
    {
        $this->_encode_codabar('01234')
             ->shouldReturn('1122121111111221111122111112112122111111112112111122121');
    }

    function it_checks_return_base64_image_for_code128()
    {
        $this->encode('01234', 'code_128', 1, false, 'base64')
             ->shouldReturn('iVBORw0KGgoAAAANSUhEUgAAAG4AAAAUAQMAAABWLJofAAAABlBMVEUAAAD///+l2Z/dAAAAHElEQVQYlWP4f7paOFnN5OJs4VuF7n8YRrm4uQCfmY6pFJbGTQAAAABJRU5ErkJggg==');
    }

    function it_checks_return_base64_image_for_code39()
    {
        $this->encode('01234', 'code39', 1, false, 'base64')
             ->shouldReturn('iVBORw0KGgoAAAANSUhEUgAAAG4AAAAUAQMAAABWLJofAAAABlBMVEUAAAD///+l2Z/dAAAAHUlEQVQYlWP4f8trU9CVZUtmrdbMVP/DMMrFzQUAB6Gk7Qx6JgMAAAAASUVORK5CYII=');
    }

    function it_checks_return_base64_image_for_code25()
    {
        $this->encode('01234', 'code25', 1, false, 'base64')
             ->shouldReturn('iVBORw0KGgoAAAANSUhEUgAAAEEAAAAUAQMAAADoesJCAAAABlBMVEUAAAD///+l2Z/dAAAAFklEQVQImWP4f/WieOEVl/8NDEOaBQAzx3NRww5R2wAAAABJRU5ErkJggg==');
    }

    function it_checks_return_base64_image_for_codabar()
    {
        $this->encode('01234', 'codabar', 1, false, 'base64')
             ->shouldReturn('iVBORw0KGgoAAAANSUhEUgAAAFsAAAAUAQMAAADY9tNjAAAABlBMVEUAAAD///+l2Z/dAAAAGUlEQVQYlWP4fzlr07K1aquiZts/YBiZHADe9o7lvHZDjgAAAABJRU5ErkJggg==');
    }

    function it_checks_return_null_if_invalid_type_is_passed()
    {
        $this->encode('01234', 'invalid')
             ->shouldReturn(null);
    }

    function it_checks_horizontal_image_type()
    {
        $this->encode('01234', 'code25', 1, false, 'base64', 20, 'somthingEsle')
             ->shouldReturn('iVBORw0KGgoAAAANSUhEUgAAABQAAABBAQMAAADrBBYKAAAABlBMVEUAAAD///+l2Z/dAAAAJ0lEQVQYlWP4//8DAzEYBLDR2ORhABcfmz5kPrJ6fPYTsgfdDBwYAOqvdTEG8dSgAAAAAElFTkSuQmCC');
    }

    function it_checks_show_text()
    {
        $this->encode('01234', 'code25', 1, true, 'base64')
             ->shouldReturn('iVBORw0KGgoAAAANSUhEUgAAAEEAAAAoAQMAAACbwgWUAAAABlBMVEUAAAD///+l2Z/dAAAAYElEQVQYlWP4f/WieOEVl/8NDMOGBQUUsn7++WMj/xzE+vDj58zzx0GsZwWfzz9vB7HO2/w/f14dypovlw5l2Z95DmH9q3/CDNZR8+f/c4gpf37+PA9m/fxgwAMxGdNeAM2BCGN8qdFgAAAAAElFTkSuQmCC');
    }

    function it_checks_return_src()
    {
        $this->encode('01234', 'code25', 1, false, 'src')
            ->shouldReturn('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAAAUAQMAAADoesJCAAAABlBMVEUAAAD///+l2Z/dAAAAFklEQVQImWP4f/WieOEVl/8NDEOaBQAzx3NRww5R2wAAAABJRU5ErkJggg==');
    }

    function it_checks_return_gd()
    {
        $this->encode('01234', 'code25', 1, false, 'gd')
             ->shouldHaveResourceType('gd');
    }

    function it_bypasses_return_type_to_complete_unit_tests()
    {
        $this->encode('01234', 'code25', 1, false, 'invalid');
    }

    public function getMatchers()
    {
        return [
            'haveResourceType' => function($subject, $key) {
                return (get_resource_type($subject) == $key);
            }
        ];
    }
}