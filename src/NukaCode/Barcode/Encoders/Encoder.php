<?php namespace NukaCode\Barcode\Encoders;

interface Encoder {

    public function encode($text);
    public function validateCode($text);
    public function getChecksum($text);
}