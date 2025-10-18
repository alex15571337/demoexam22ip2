<?php
$con = mysqli_connect('MySQL-5.7', 'root', '', 'demoexam');
if(!$con) die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
mysqli_set_charset($con, 'utf8');
?>