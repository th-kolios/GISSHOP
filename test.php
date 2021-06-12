<?php

require __DIR__ . "/vendor/autoload.php";
$qrcode = new QrReader('qrcode.png');
$text = $qrcode->text(); //return decoded text from QR Code

echo $text;

?>