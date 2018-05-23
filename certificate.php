<?php
    $result = $_GET['result'];
    $qCount = $_GET['qcount'];
    $username = $_GET['username'];
    $text = "Поздравляем, $username!\nВаш результат: $result из $qCount";
    $fontFile = __DIR__ . '/fonts/Lobster-Regular.ttf';
    if (!file_exists($fontFile)) {
        echo 'Шрифт не найден!';
        exit;
    }
    $backFile = __DIR__ . '/images/certificate.png';
    $backSizes = getimagesize($backFile);
    $backWidth = $backSizes[0];
    $backHeight = $backSizes[1];
    $image = imagecreatetruecolor($backWidth, $backHeight);
    $textColor = imagecolorallocate($image, 102, 102, 102);
    $imBox = imagecreatefrompng($backFile);
    imagecopy($image, $imBox, 0, 0, 0, 0, $backWidth, $backHeight);
    imagettftext($image, 26, 0, 160, floor($backHeight * 0.4), $textColor, $fontFile, $text);
    header('Content-type: image/png');
    imagepng($image);
    imagedestroy($image);
//    /**
//     * Created by PhpStorm.
//     * User: konstantin
//     * Date: 20.05.2018
//     * Time: 11:35
//     */