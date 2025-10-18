<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Корочи.есть - дополнительное образование</title>
  <link rel = "stylesheet" href = "styles/style.css">
  <link rel = "stylesheet" href = "styles/slider.css">
</head>
<body>
<!-- ---------------------------
ШАПКА
------------------------------->
<div class = "header">
  <div class ="nav">
    <a href = "index.php" class = "logo">Корочки.есть</a>
    <?php
    session_start();
        if(!isset($_SESSION['user_id']))
        {
            echo '
                <div class ="nav-buttons"> 
                    <a href = "login.php" class ="btn-login">Войти</a>
                    <a href = "register.php" class = "btn-register">Регистрация</a>
                </div>
            ';
        }
        elseif ($_SESSION['admin'] == 1)
        {
          if (isset($_GET['index']))
          {
            session_destroy();
            header('Location:index.php');
            exit;
          }
          echo '
              <div class = "nav-buttons">
                <a href = "admin.php" class = "btn-admin">Панель администратора</a>
                <a href = "?index=1" name = "index" class = "btn-exit">Выход</a>
              </div> 
            ';
        }
        else 
        {
          echo '
              <div class = "nav-buttons">
                <a href = "history.php" class = "btn-lk">Личный кабинет</a>
                <a href = "create.php" class = "btn-create">Создание новой заявки</a>
              </div>
            ';
        }
    ?>
  </div>
</div>
<!-- ---------------------------
СЛАЙДЕР
------------------------------->
<div class="slideshow-container">
    <div class="mySlides fade">
      <img src="https://avatars.mds.yandex.net/i?id=a07cf6b531fb7f8b121fdc243b0480df_l-5865525-images-thumbs&n=13" style="width:100%">
      <div class="text">Заголовок слайда 1</div>
    </div>

    <div class="mySlides fade">
      <img src="https://avatars.mds.yandex.net/i?id=8638bc7e56cd75f9c8028f80fe518b27_l-3027871-images-thumbs&n=13" style="width:100%">
      <div class="text">Заголовок слайда 2</div>
    </div>

    <div class="mySlides fade">
      <img src="https://westsiderc.org/wp-content/uploads/2019/10/Resources.jpg" style="width:100%">
      <div class="text">Заголовок слайда 3</div>
    </div>

    <div class="mySlides fade">
      <img src="https://avatars.mds.yandex.net/i?id=9f76720b269488ed45eac628c5fb1cba_l-12385820-images-thumbs&n=13" style="width:100%">
      <div class="text">Заголовок слайда 4</div>
  </div>
<!--Кнопки (стрелки) для переключения картинок слайдера (вперед\назад)-->
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
</div>
<!-- Точки для открытия конкретной картинки и показывающие активную -->
<div class="dot-container">
  <span class="dot active" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span>
</div>
</body>
<script src = 'script/script.js'></script>
</html>