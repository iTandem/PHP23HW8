<?php
    session_start();
    session_destroy();
    header('Refresh: 1 Url="index.php"');
    echo 'Вы вышли из аккаунта. Перемещаю на страницу авторизации...';
    
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 21.05.2018
     * Time: 15:28
     */