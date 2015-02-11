<?
include('vendor/autoload.php');

$new = new NukaCode\Barcode\Barcode();

var_dump($new->encode('01234', 'code39', 1, false, 'base64'));
var_dump($new->encode('01234', 'code25', 1, false, 'base64'));
var_dump($new->encode('01234', 'codabar', 1, false, 'base64'));
