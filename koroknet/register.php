<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	include('db.php');
	$query = $con->query("INSERT INTO users (login, password, fullname, phone, email) VALUES ('$login', '$password', '$fullname', '$phone', '$email')"); // SQL-инъекция | обрати внимание на порядок полей!
	if(!$query) die('query error: ' . $con->error); 
	header('Location: login.php');}?>
<html lang='ru'>
<head>
	<meta charset='UTF-8'>
	<meta name ='viewport' content='width-device-width, initiial-scale=1.0'>
	<title> Регистрация - Корочки.есть </title>
	<link rel = 'stylesheet' href = 'styles/style.css'>
	<script src = 'phone.js'></script>
</head>
<body class="body-form">
	<div class = 'register-container'>
        <a href = 'index.php' class = 'index-link'>◄ На главную </a> <!-- Кнопка возврата на главную страницу -->
		<h1> Регистрация </h1>
		<p> Создайте аккаунт для составления заявки</p>	
		<!--Блок ввода и вывода данных -->
		<form method = 'POST' action=''>
				<label for='fullname'> ФИО* </label>
				<input type="text" id ='fullname' name='fullname' required>
                <label for="phone">Телефон*</label>
                <input type="tel" id="phone" name="phone" placeholder='+7(___)___-__-__' pattern="\+7\(\d{3}\)\d{3}-\d{2}-\d{2}" maxlength='16' required> <!--Проверяет существует ли такое поле в базе данных-->
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" required>
                <label for="login">Логин* (латиница, от 6 символов)</label><!--Задает паттерн ввода логина только с использованием латиницы и цифр -->
                <input type="text" id="login" name="login" pattern="[a-zA-Z0-9\s]{6,}" required>
                <label for="password">Пароль* (от 8 символов)</label><!--Задается минимальная длина пароля в 8 символов -->
                <input type="password" id="password" name="password" minlength="8" required>
            <!--Создание кнопки регистрации  -->
            <button type="submit" class="btn-sub">Зарегистрироваться</button>
        </form>
			<!--Создание ссылки на страницу входа -->
		<p> Уже есть аккаунт? <a href ='login.php' class = 'login-link'> Войти </a></p>
	</div>
</body>
</html>