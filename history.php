<?php
session_start();
if(!isset($_SESSION['user_id'])) die('Чтобы посмотреть историю заявок, надо войти в аккаунт.');
include('db.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $review = $_POST['review'];
    $query = $con->query("UPDATE users SET review='$review' WHERE id='{$_SESSION['user_id']}'");}
// Код получения отзыва
$query = $con->query("SELECT review FROM users WHERE id='{$_SESSION['user_id']}'");
$review = $query->fetch_assoc()['review'];
// Код истории заявок
$query = $con->query("SELECT * FROM request WHERE user_id='{$_SESSION['user_id']}'"); // SQL-инъекция
if(!$query) die('query error: ' . $con->error); ?>
<link rel = 'stylesheet' href = 'styles/style.css'>
<html>
    <head><title>Личный кабинет</title></head>
    <body>
    <div class = "header">
        <div class = "nav">
            <a href = "index.php" class = "logo">Корочки.есть</a>    
                <div class = "nav-buttons">
                    <a href = "history.php" class = "btn-active">Личный кабинет</a>
                    <a href = "create.php" class = "btn-create">Создание новой заявки</a>
                </div>
        </div>
    </div>
    <div class = "container">
        <div class = "booking-card">
            <div class = "booking-header">
                <h1>История заявок</h1>
            </div>
            <?php
                $i = 0;
                while($request = $query->fetch_assoc()) {
                    $i++; 
                    echo "
                    <div class = 'request-card'>
                    <h2>Заявка $i</h2>
                    <b>Дата: </b>{$request['date']}<br>
                    <b>Вид услуги: </b>{$request['curses']}<br>
                    <b>Тип оплаты: </b>{$request['payment']}<br><br>
                    <b>Статус: </b>{$request['status']}<br>";
                    if($request['status'] === 'Обучение завершено')
                    {
                        echo"<br>
                        <form action='' method='POST'>
                        <input name = 'review' placeholder = 'Отзыв об услуге' value = '{$request['review']}'</br>
                        <button class = 'btn-sub'>Оставить отзыв</button>
                        </form>";
                        // Код изменения отзыва
                        if($_SERVER['REQUEST_METHOD'] == 'POST') {echo '<script>alert("Отзыв оставлен")</script>';}
                    }
                    echo "</div>";
                }?>
        </div>
    <?php
    if (isset($_GET['index']))
    {
        session_destroy();
        header('Location:index.php');
        exit;
    }
        echo '
        <a href = "?index=1" name = "index" class = "btn-exit">Выход</a>'; 
    ?>
    </div>
    </body>
</html>