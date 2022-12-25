<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Смена пароля</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/newpassword.php" method="post">
        <label>Старый Пароль</label>
        <input type="password" name="password" placeholder="Введите старый пароль">
        <label>Новый пароля</label>
        <input type="password" name="new_password" placeholder="Придумайте новый пароль">
        <button type="submit">Сменить пароль</button>
        
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
	<a href='http://localhost/registration/inOut/profile.php' class="logout">Выход</a>

</body>
</html>