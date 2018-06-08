<?php
    
    require_once 'core/core.php';
    
    loginCheck();
    forbiddenForGuests();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Удалить тест | JSON TEST form</title>
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
<div class="container" style="text-align: center;">
  <h2>Удалить тест</h2>
    <?php
        $get_catalog = scandir(TESTS_LOCATION);
        foreach ($get_catalog as $key => $value) {
            if ($value !== '.' && $value !== '..') {
                echo '<a href="delete_question.php?removefile=' . $value . '">' . json_decode(file_get_contents(TESTS_LOCATION . $value), true)['testname'] . '</a><br>' . PHP_EOL;
            }
        }
    ?>
</div>
</body>
</html>
    /**
     * Created by PhpStorm.
     * User: konstantin
     * Date: 08.06.2018
     * Time: 7:47
     */