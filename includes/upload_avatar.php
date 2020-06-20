<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/favicon_for_line.ico" type="image/png">
    <title>Мой профиль | Animesaver</title>
    <link rel="stylesheet" href="../css/style_my_profile.css">
    <meta name="description" content="Мой профиль на Animesaver.ru"/>
    <meta name="keywords" content="профиль, мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../scripts/jquery_code.js" type="text/javascript"></script>
</head>
<body>
<div class="preloader">
    <div class="preloader__image"></div>
</div>
<div class="layout">
    <header class="navi">
        <a href="/" class="animesaver_link"><img src="../images/favicon.png" alt="Logo of the site"></a>
        <div class="navigation">
            <a href="../">ГЛАВНАЯ</a>
            <a href="../catalogue">КАТАЛОГ</a>
            <a href="../weekly-saver">ЖУРНАЛ WS</a>
        </div>
        <div class="container">                                                         <!--Navigation button for mobile-->
            <div class="menu-icon">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        <a href="../weekly-saver" class="weeklysaver_link"><img src="../images/favicon_ws.png" alt="Logo of WS" /></a>
    </header>
    <div id="mobile_nav" class="mobile_nav">
        <ul>
            <li><a href="../">ГЛАВНАЯ</a></li>
            <li><a href="../weekly-saver">ЖУРНАЛ WS</a></li>
            <li><a href="../catalogue">КАТАЛОГ</a></li>
        </ul>
    </div>
    <div class="ui">
        <h1 class="ui_1">Animesaver</h1>
        <h2 class="ui_2">Самый простой сайт по аниме в России!</h2>
        <form action="search.php" method="post" target="_top" class="search">
              <input type="text" size="20" maxlength="128" name="search" class="search_input" placeholder="      Поиск аниме по названию">
              <input type="submit" name="submit" class="search_submit" value="Найти" title="Найти">
        </form>
    </div>
    <section class="body_layout">
        <div class="news_sidebar">                                                          <!--Sidebar-->
            <h3>НОВОСТИ САЙТА</h3>
            <iframe src="../anime/news.php">
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>
        </div>
        <section class="main_block">                                                        <!--Main block-->
            <?php
              include "db.php";
              $login = $_SESSION['login'];
              $user_id_array = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` LIKE '$login'");
              $user_id_full = mysqli_fetch_assoc($user_id_array);
              $user_id = (int) $user_id_full['id'];
              if($_FILES["filename"]["size"] > 1024*2*1024)
                 {
                   echo ("Размер файла превышает три мегабайта");
                   exit;
                 }
                 // Проверяем загружен ли файл
                 if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
                 {
                   // Если файл загружен успешно, перемещаем его из временной директории в конечную
                   move_uploaded_file($_FILES["filename"]["tmp_name"], "/home/users/m/mangaka585/domains/animesaver.ru/images/avatars/".$user_id.".jpg");
                   mysqli_query($connection, "UPDATE `users` SET `avatar` = '$user_id.jpg' WHERE `users`.`id` = '$user_id'");
                   echo "Аватарка успешно обновлена</br><a href='my_profile.php'>Вернуться обратно</a>";

                 } else {
                    echo("Ошибка загрузки файла");
                 }
            ?>
        </section>
        <div class="adv">                                                                   <!--ADV-->
            <h3>НОВОСТИ ЖУРНАЛА</h3>
            <iframe src="../anime/ws_news.php">
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>
        </div>
    </section>
    <footer>
        <div class="site_description">
            <p>
                Добро пожаловать на animesaver.ru! Мы молодой, развивающийся сайт аниме с необычными планами на будущее.
                Ведь у нас есть еще и второе направление: мы создали первый еженедельный журнал российской манги. Прямо
                сейчас читайте наш журнал, смотрите аниме сериалы и фильмы без рекламы, которая вечно всех раздражает.
                Японские аниме доступны для просмотра без регистрации, смс и каких-либо ограничений. В наших планах стать
                самым масштабным в России порталом аниме, где будет абсолютно все бесплатно и легкодоступно. Нам всегда
                требуются новые люди в команду, поэтому мы открыты для контактов и рады любой помощи.
            </p>
        </div>
        <div class="flex-container">
            <div>
                <p id="Piroll">Created by mangaka585@gmail.com</p>
            </div>
            <div id="Mellriart">Special thanks to <a href="https://www.instagram.com/meellri/">Meellri</a></div>
            <div id="Rights">
                <p>&#169; 2019 - 2020 Animesaver.ru. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <a href="#" class="scroll-top" title="В начало">
        <img src="../images/up.png" alt="up_logo"/>
    </a>
</div>
</body>
</html>
