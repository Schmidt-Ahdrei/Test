<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php


$mysql = new mysqli('localhost', 'root', '', 'register-bd');

$result = $mysql->query("SELECT * FROM `users` WHERE `id`='$_GET[id]'");

while ($row = mysqli_fetch_array($result));
{
    print("Hello " . $row['name'] . "<br>");
}


?>

	<a href="exit.php">Bыйти</a>

</body>
</html>