<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$login = $_POST['login'];
	$password = $_POST['password'];
	include('db.php');
	$query = $con->query("SELECT * FROM users WHERE login='$login' AND password='$password'"); // SQL-инъекция
	if(!$query) die('query error: ' . $con->error);
	$user = $query->fetch_assoc();
	if(!$user){
        echo 'Неверный логин или пароль';
        die();
    } 
	session_start(); // Нет защиты от XSS
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['admin'] = $user['login'] == 'adm';
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - Корочки.есть</title>
    <link rel = 'stylesheet' href = 'styles/style.css'>
</head>
<body class="body-form">
    <div class="login-container">
        <a href = 'index.php' class = 'index-link'>◄ На главную </a> 
        <h1>Вход в систему</h1>
        <p>Войдите в свой аккаунт</p>
        <!-- Блок ввода непосредственно логина и пароля --> 
        <form method="POST" action="">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login" required>
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="btn-sub">Войти</button>
        </form>
        <p> Нет аккаунта? <a href="register.php" class = 'register-link'>Зарегистрироваться</a> </p>
    </div>
</body>
</html>