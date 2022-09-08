<?php
$dbh = null;

try {
  $dbh = new PDO(
    "mysql:host=mysql;dbname=test",
    "ezh1k",
    "alastor_cool",
    [PDO::ATTR_PERSISTENT => true]
  );
}
catch (PDOException $e) {
  echo "<div>{$e->getMessage()}</div>";
  die();
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Тестовая страница</title>
</head>


<body>
<?php
$stmt = $dbh->query("SELECT * FROM `test`.`User`");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Surname</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($rows as $row): ?>
      <tr>
        <td><?= $row["user_id"] ?></td>
        <td><?= $row["name"] ?></td>
        <td><?= $row["surname"] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php phpinfo(); ?>
</body>

</html>