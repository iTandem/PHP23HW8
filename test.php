<?php
    
    require_once 'core/core.php';
    
    loginCheck();
    
    foreach (scandir(TESTS_LOCATION) as $key => $value) {
        if (TESTS_LOCATION . $value == TESTS_LOCATION . $_GET['testfile']) {
            $request_check = true;
        }
    }
    
    if ($request_check !== true) {
        header("HTTP/1.0 404 Not Found");
        echo '<h1 style="text-align: center; font-size: 40pt;">404</h1><h1 style="text-align: center;">Страница не найдена</h1>';
        exit;
    }
    
    $test_contents = json_decode(file_get_contents(TESTS_LOCATION . $_GET['testfile']), true);
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
          <?php if (!$_SESSION['is_guest']) {
              echo '<li><a href="admin.php">ЗАГРУЗИТЬ ТЕСТ</a></li>';
              echo '<li><a href="delete_file.php">УДАЛИТЬ ТЕСТ</a></li>';
          } ?>
        <li><a href="logout.php">ВЫЙТИ</a></li>
        <li><a href="#">Привет, <?php echo getAuthorizedUser()['username'] ?>!</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <h2 style="text-align: center;"><?= $test_contents['testname'] ?></h2><br><br>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <?php echo '<form action="answer_handler.php?testname=' . $test_contents['testname'] . '&testfile=' . $_GET['testfile'] . '" method="post">'; ?>
        <?php
            foreach ($test_contents as $pri_key => $pri_value) {
                if ($pri_key !== 'testname' && $pri_key !== 'answers') {
                    echo '<div class="panel panel-info">';
                    foreach ($pri_value as $se_key => $se_value) {
                        if ($se_key == 'question') {
                            echo '<div class="panel-heading"><h4>' . $pri_key . ' . ' . $se_value . '</h4></div>';
                        } elseif ($se_key == 'variants') {
                            echo '<div class="panel-body"><div class="form-control">' . PHP_EOL;
                            foreach ($se_value as $ter_key => $ter_value) {
                                echo '<div class="radio-inline"><label><input type="radio" name="user_answers[' . $pri_key . ']" id="' . $pri_key . $ter_key . '" value="' . $ter_key . '">' . $ter_value . '</label></div>' . PHP_EOL;
                            }
                            echo '</div></div>' . PHP_EOL;
                        }
                    }
                    echo '</div>' . PHP_EOL;
                }
            }
        ?>
      <button class="btn btn-success btn-block">Проверить!</button>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
<div class="row" style="height: 40px;"></div>
</body>
</html>