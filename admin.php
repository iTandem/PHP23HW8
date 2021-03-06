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
</div>
</body>
</html>
/**
* Created by PhpStorm.
* User: konstantin
* Date: 16.05.2018
* Time: 11:49
*/