<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$pass = md5($pass . "ghjsfkld2345");

$mysql = new mysqli('localhost', 'root', '', 'register-bd');


$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");


    if($user = mysqli_num_rows($result)== 0) {
        echo "Неверно введен логин или пароль";
        exit();
    }


setcookie('user', $user['name'], time() + 3600, "/");

$mysql->close();

header('Location: page.php');

 ?>

