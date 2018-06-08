<?php
    header("Content-type: image/png");
    $im = imagecreatefrompng("images/certificate.png");
    imagealphablending($im, true);
    imageSaveAlpha($im, true);
    $orange = imagecolorallocate($im, 220, 210, 60);
    $red = imagecolorallocate($im, 225, 0, 0);
    
    switch ($_GET['result']) {
        case '3':
            $result = 'Удовлетворительно';
            $result_color = imagecolorallocate($im, 70, 70, 0);
            break;
        
        case '4':
            $result = 'Хорошо!';
            $result_color = imagecolorallocate($im, 0, 95, 0);
            break;
        
        case '5':
            $result = 'Отлично!';
            $result_color = imagecolorallocate($im, 0, 70, 70);
            break;
        
        default:
            $result = 'Не обнаружен!';
            $result_color = imagecolorallocate($im, 127, 0, 0);
            break;
    }
    $fio = $_GET['fio'];
    $string2 = 'О прохождении теста "' . $_GET['testname'] . '" получил(а):';
    
    $c_blue = imagecolorallocate($im, 64, 64, 255);
    $c_heading = 'СЕРТИФИКАТ';
    imagettftext($im, 20, 0, 233, 128, $c_blue, 'fonts/Lobster-Regular.ttf', $c_heading);
    
    $c_text_blue = imagecolorallocate($im, 64, 64, 255);
    
    imagettftext($im, 16, 0, 120, 184, $c_text_blue, 'fonts/Lobster-Regular.ttf', $string2);
    
    imagettftext($im, 18, 0, 280, 236, $red, 'fonts/Lobster-Regular.ttf', $fio);
    
    imagettftext($im, 14, 0, 270, 300, $c_text_blue, 'fonts/Lobster-Regular.ttf', 'Результат:');
    
    $result_px = (imagesx($im) - 4 * mb_strlen($result)) / 2;
    imagettftext($im, 16, 0, $result_px, 350, $result_color, 'fonts/Lobster-Regular.ttf', $result);
    
    imagepng($im);
    imagedestroy($im);
//    /**
//     * Created by PhpStorm.
//     * User: konstantin
//     * Date: 20.05.2018
//     * Time: 11:35
//     */