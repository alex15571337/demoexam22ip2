<?php
session_start();
if(!isset($_SESSION['user_id'])) die('Чтобы оставить заявку, надо войти в аккаунт.');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $review = $_POST['review'];
	$date = $_POST['date'];
	$curses = $_POST['curses'];
	$payment = $_POST['payment'];
	$status = $_POST['status'];
	include('db.php');
	$query = $con->query("INSERT INTO request (review, date, curses, payment, user_id) VALUES ('$review', '$date', '$curses', '$payment', '{$_SESSION['user_id']}')"); // SQL-инъекция / чтобы понять КТО оставил заявку, нам нужен $_SESSION['user_id'] - это  foreign key
	if(!$query) die('query error: ' . $con->error);
	header('Location: history.php');
}?>
<html>
    <head>
        <title>Создание заявки</title>
        <link rel = "stylesheet" href = "styles/style.css">
    </head>
    <body>
        <div class = "header">
            <div class = "nav">
            <a href = "index.php" class = "logo">Корочки.есть</a>
                <div class = "nav-buttons">
                        <a href = "history.php" class = "btn-lk">Личный кабинет</a>
                        <a href = "create.php" class = "btn-active">Создание новой заявки</a>
                </div>
            </div>
        </div>
        <div class = "container">
            <div class = "booking-card">
                <div class = "booking-header">
                <h1>Создание заявки</h1>
                </div>
                <form action="" method="POST" class = "form-group">
                    <label for='curses'>Название курса</label>
                    <select required name="curses">
                        <option value="Программирование">Программирование</option>
                        <option value="Веб-Дизайн">Веб-Дизайн</option>
                        <option value="Проектирование базы данных">Проектирование базы данных</option>
                    </select>
                    <label for='date'>Когда желаете начать обучение?</label>
                    <input required size="50" type="datetime-local" name="date"><br>
                    <label for='payment'>Способ оплаты</label>
                    <select required name="payment">
                        <option value="наличные">Наличные</option>
                        <option value="перевод">Переводом по номеру</option>
                    </select>
                    <br>
                    <button class = "btn-sub">Отправить заявку</button>
                </form>
            </div>
        </div>
    </body>
</html>