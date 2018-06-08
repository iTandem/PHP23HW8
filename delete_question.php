<?php
    
    require_once 'core/core.php';
    
    loginCheck();
    forbiddenForGuests();
    
    foreach (scandir(TESTS_LOCATION) as $key => $value) {
        if (TESTS_LOCATION . $value == TESTS_LOCATION . $_GET['removefile']) {
            $request_check = true;
        }
    }
    
    if ($request_check !== true) {
        header("HTTP/1.0 404 Not Found");
        echo '<h1 style="text-align: center; font-size: 40pt;">404</h1><h1 style="text-align: center;">Страница не найдена</h1>';
        exit;
    }
    
    $test_contents = json_decode(file_get_contents(TESTS_LOCATION . $_GET['removefile']), true);

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
<div class="container" style="text-align: center; color: crimson;">
    <h2>Вы действительно хотите удалить "<?= $test_contents['testname'] ?>"?</h2><br><br>
    <div class="col-md-4 col-md-offset-4">
        <a href="delete_file.php" class="btn btn-success btn-block">Нет</a><br>
        <a href="delete_handler.php?removefile=<?= $_GET['removefile'] ?>" class="btn btn-danger btn-block">Да</a>
    </div>
</div>
</body>
</html>
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 08.06.2018
     * Time: 13:29
     */