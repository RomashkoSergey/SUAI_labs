<?php
ini_set('session.gc_maxlifetime', 10);
ini_set('session.gc_divisor', 1);
session_start();
if (!$_SESSION['user']) {
    header('Location: http://localhost/registration/inOut/index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
	
    <!-- Профиль -->

    <form>
		<h1> Профиль </h1>
		<a href= 'http://localhost/registration/inOut/changePassword.php' class="">Смена пароля</a>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </form>

</body>
</html>