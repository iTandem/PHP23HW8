<?php
    
    require_once 'core/core.php';
    
    loginCheck();
    forbiddenForGuests();
    
    $message = ' ';
    function getExtension($filename)
    {
        return substr(strrchr($filename, '.'), 1);
    }
    
    if (isset($_FILES['userfile']) && !empty($_FILES['userfile']['name'])) {
        if (getExtension($_FILES['userfile']['name']) == 'json' || getExtension($_FILES['userfile']['name']) == 'JSON') {
            if ($_FILES['userfile']['size'] < 10000) {
                if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK &&
                    move_uploaded_file($_FILES['userfile']['tmp_name'], TESTS_LOCATION . md5_file($_FILES['userfile']['tmp_name']) . '.json')) {
                    header('Location: list.php');
//                    $message = '<h2 class="text-success">Файл с тестами успешно загружен</h2>';
                } else {
                    $message = '<h2 class="text-danger">Ошибка, файл с тестами не загружен!</h2>';
                }
            } else {
                $message = '<h2 class="text-danger">Размер файла не должен превышать 10 кб!</h2>';
            }
        } else {
            $message = '<h2 class="text-danger">Выберите JSON файл!</h2>';
        }
    } else {
        $message = '<h2 class="text-warning">Выберите файл!</h2>';
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JSON TEST form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body style="background-color: cornsilk">
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-collapse navbar-top collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="list.php">СПИСОК ТЕСТОВ</a></li>
                <li><a href="admin.php">ЗАГРУЗИТЬ ТЕСТ</a></li>
                <li><a href="delete_file.php">УДАЛИТЬ ТЕСТ</a></li>
                <li><a href="logout.php">ВЫЙТИ</a></li>
                <li><a href="#">Привет, <?php echo getAuthorizedUser()['username'] ?>!</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h2 style="text-align: center;">Здесь вы можете загрузить JSON файл теста</h2><br><br>
    <form enctype="multipart/form-data" method="POST" action="upload_handler.php" class="form-horizontal">
        <div class="form-group">
            <label for="userfile" class="control-label col-md-4 col-sm-4">Файл теста: </label>
            <div class="col-md-4 col-sm-4">
                <input name="userfile" type="file"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-sm-4"></div>
            <div class="col-md-4 col-sm-4">
                <button type="submit" value="Отправить" class="btn btn-success">Отправить</button>
            </div>
        </div>
    </form>
    <div class="row" style="text-align: center;"><?= $message ?></div>
    <pre><?php print_r($_FILES); ?></pre>
</div>
</body>
</html>
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 08.06.2018
     * Time: 13:01
     */