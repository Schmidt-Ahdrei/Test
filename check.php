<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$pass_2 = filter_var(trim($_POST['pass_2']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

if ( trim($login) == '' )
    {
        echo 'Введите логин';
        exit();
    }
if(mb_strlen($login) < 6){
	echo "Недопустимая длина логина";
	exit();
}
if ( trim($name) == '' )
    {
        echo 'Введите имя';
        exit();
    }
if (preg_match("/[^a-zA-Z]/",$name)) {
    echo "Имя может состоять только из букв";
    exit;
}
else if(mb_strlen($name) < 2){
	echo "Недопустимая длина имени.";
	exit();
}
if (trim($pass) == '' )
    {
        echo  'Введите пароль';
        exit();
    }
if (preg_match("/[^a-zA-Z0-9]/",$pass)) {
    echo "Пароль может состоять только из букв и цифр";
    exit;
}
if (trim($pass_2) != trim($pass))
    {
        echo  'Повторный пароль введен не верно!';
        exit();
    }
if ( trim($email) == '' )
    {
        echo  'Введите Email';
        exit();
    }


if (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/",$email)) {
    echo "Неверный mail";
    exit;
}

$pass = md5($pass ."ghjsfkld2345");

$mysql = new mysqli('localhost', 'root', '', 'register-bd');

$result1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user1 = $result1->fetch_assoc();
if(!empty($user1)){
	echo "Данный логин уже используется!";
	exit();
}

$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `email`)
	VALUES('$login', '$pass', '$name', '$email')");
$mysql->close();

header('Location: page.php');
exit();
 ?>

