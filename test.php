<?
include('vendor/autoload.php');

$new = new NukaCode\Barcode\Encoders\Code25();

echo $new->encode('0123456789');

