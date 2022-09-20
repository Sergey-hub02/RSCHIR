<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/utils/execute.php" ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin page</title>
</head>


<body>

<form id="command-form" method="get">
  <div>
    <label for="command"></label>
    <input type="text" name="command" id="command" placeholder="Введите команду">
  </div>

  <div>
    <button type="submit" name="submit">Ввести</button>
  </div>
</form>

<div>
  <?php empty($_REQUEST["command"]) ?: execute($_REQUEST["command"]) ?>
</div>

</body>

</html>
