<?
include('vendor/autoload.php');

$new = new NukaCode\Barcode\Barcode();

echo '<img src="' . $new->encode('01234', 'codabar', 1, false, 'src') . '">';
