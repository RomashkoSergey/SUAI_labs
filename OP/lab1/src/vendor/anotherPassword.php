<?php

	session_start();
	require_once 'connect.php';
	
	$login = $_POST['login'];
	$newpassword = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	$id = mysqli_real_escape_string($connect, $login);
	$query = "SELECT * FROM user WHERE id='$id'";
	
	$result = mysqli_query($connect, $query);
	$user = mysqli_fetch_assoc($result);
	
	if ($newpassword === $password_confirm) {
		$newpassword = $newpassword . 2**strlen($newpassword);
		$newpassword = md5($newpassword);
		$query = "UPDATE user SET password='$newpassword' WHERE id='$id'";
		mysqli_query($connect, $query);
		$_SESSION['message'] = $newpassword;
		header('Location: ../index.php');
	} else {
		$_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../resetpassword.php');
	}
?>