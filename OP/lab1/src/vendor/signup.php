<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
	
	$number = preg_match('@[0-9]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	if($login === ""){
		$_SESSION['message'] = 'придумайте логин';
		header('Location: ../register.php');
	}
 
	if(strlen($password) < 4 || !$number || !$lowercase) {
		$_SESSION['message'] = 'В пароля должна быть цифра и буква, его длина должна быть больше 4';
		header('Location: ../register.php');
	}
	else{

    if ($password === $password_confirm) {

		$password = $password . 2**strlen($password);
        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `user` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }
	}
?>
