php-barcode
===========

Forked from davidscotttufts/php-barcode and MFlor/php-barcode
https://github.com/MFlor/php-barcode

Class for generating barcodes in four barcode formats including Code 128, Code 39, Code 2of5 and Codabar

Parameters
-----------

`$text`			The text to be encoded

`$code_type`	Either "code25", "code39", "code128" or "codabar" (See class constants, default "code128")

`$scale`		Up- or downscale the image (2 makes the image twice as big, default 1)

`$show_text`	Show the encoded text below the image (default false)

`$returntype`	Either "src", "base64" or "gd" (See class constants, default "src")

`$size`			The height of the barcode (default 20)

`$orientation`	The orientation of the barcode (defaut "horizontal")


Returntype
-----------
`src` returns a base64 png encoded string, ready to be inserted into an image tags src attribute, eg:

```php
<img src="<?php echo $returned_content; ?>" />
```


`base64` returns the png image as a base64 encoded string


`gd` returns the PHP image resource.