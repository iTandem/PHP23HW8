<?php
    session_start();
    if ($_SESSION['is_admin']) {
        header('Refresh:2 Url="admin.php"');
        echo 'Вы авторизовались как администратор. Перемещаю на страницу загрузки тестов...';
    } else {
        header('Refresh:2; Url="list.php"');
        echo 'Вы авторизовались как гость. Перемещаю на список тестов...';
    }
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 20.05.2018
     * Time: 19:12
     */