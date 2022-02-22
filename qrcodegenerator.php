<?php
session_start();
require_once 'qr-code-master/vendor/autoload.php';
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

$result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data('http://localhost/idcard/idcard.php?Id='.$_SESSION["qr"])
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->size(100)
    ->margin(10)
    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
    ->labelText('')
    ->labelFont(new NotoSans(20))
    ->labelAlignment(new LabelAlignmentCenter())
    ->build();

    header('Content-Type: '.$result->getMimeType());
    echo $result->getString();
?>