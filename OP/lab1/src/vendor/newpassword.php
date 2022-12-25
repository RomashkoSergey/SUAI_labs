<?php

	session_start();
	require_once 'connect.php';
	
	$id = $_SESSION['user']['id']; // id юзера из сессии
	$query = "SELECT * FROM user WHERE id='$id'";
	
	$result = mysqli_query($connect, $query);
	$user = mysqli_fetch_assoc($result);
	
	$hash = $user['password']; // соленый пароль из БД
	$password = $_POST['password'];
	$password = $password . 2**strlen($password);
    $password = md5($password);
	$newpassword = $_POST['new_password'];
	$newpassword = $newpassword . 2**strlen($newpassword);
    $newpassword = md5($newpassword);
	
	// Проверяем соответствие хеша из базы введенному старому паролю
	if ($password === $hash) {
		
		$query = "UPDATE user SET password='$newpassword' WHERE id='$id'";
		mysqli_query($connect, $query);
		$_SESSION['message'] = 'Пароль сменен';
		header('Location: ../changePassword.php');
	} else {
		$_SESSION['message'] = 'Старый пароль не верен';
        header('Location: ../changePassword.php');
		// старый пароль введен неверно, выведем сообщение
	}
?>