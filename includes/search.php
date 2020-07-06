<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="alternate" hreflang="ru" href="https://animesaver.ru/search.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/favicon_for_line.ico" type="image/png">
    <title>Поиск по сайту | Animesaver</title>
    <link rel="stylesheet" href="../css/style.css">
    <meta name="description" content="Поиск аниме по названию на Animesaver.ru"/>
    <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="../scripts/jquery_code.js"></script>
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
        <a href="weekly-saver" class="weeklysaver_link"><img src="../images/favicon_ws.png" alt="Logo of WS" /></a>
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
            if (isset($_POST['search'])) { $search = $_POST['search']; if ($search == '') { unset($search);} }
            //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
            if (empty($search)) //если пользователь не ввел какие-либо данные, то выдаем ошибку и останавливаем скрипт
            { ?>
              <h3 style="text-align:center;">Видимо, ничего не написали, поэтому и показать нечего..</h3>

            <?php } else {
            //если все поля заполнены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
            $search = stripslashes($search);
            $search = htmlspecialchars($search);
            //удаляем лишние пробелы
            $search = trim($search);
            include("db.php");
            $search_array = mysqli_query($connection,"SELECT * FROM `anime` WHERE `title` LIKE '%$search%' ");
            while($search_result = mysqli_fetch_assoc($search_array)){ ?>
                <div class="main_block_element">
                    <a href="/<?php echo $search_result['link'];?>"><img src=<?php echo "../".$search_result['main_img_sourse']; ?> alt="<?php echo $search_result['title']; ?>pic" /></a>
                    <div class="main_block_element_description">
                        <a href="/<?php echo $search_result['link'];?>"><h2><?php echo $search_result['title'];?></h2></a>
                        <p>
                            <?php echo mb_substr($search_result['description'],0,440, 'utf-8') . '...'; ?>
                        </p>
                        <div style="clear: both"></div>
                        <div class="views">
                            <div> <?php
                            if($search_result['views'] == null) {
                                echo 0;
                            } else {
                                echo $search_result['views'];
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="main_block_element_genre">
                        <h4>Жанр:</h4>
                        <span>
                                <?php
                                $categories = $search_result['categories_1_id'];
                                $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                                $categories_name_result = mysqli_fetch_assoc($categories_name);
                                if($categories_name_result != null){
                                    echo $categories_name_result['title'] . '<br>';
                                };
                                $categories = $search_result['categories_2_id'];
                                $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                                $categories_name_result = mysqli_fetch_assoc($categories_name);
                                if($categories_name_result != null){
                                    echo $categories_name_result['title'] . '<br>';
                                };
                                $categories = $search_result['categories_3_id'];
                                $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                                $categories_name_result = mysqli_fetch_assoc($categories_name);
                                if($categories_name_result != null){
                                    echo $categories_name_result['title'];
                                };
                                ?>
                            </span>
                        <h4>Серии:</h4>
                        <span><?php echo $search_result['series']; ?></span>
                        <h4>IMDb:</h4>
                        <span><?php echo $search_result['IMDb']; ?> </span>
                    </div>
                    <a href="/<?php echo $search_result['link'];?>" class="Watch_button">Смотреть</a>
                </div>
              <?php
            }
          }?>

        </section>
        <div class="adv">                                                                   <!--ADV-->
            <h3>НОВОСТИ ЖУРНАЛА</h3>
            <iframe src="../anime/ws_news.php">
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>
        </div>
        <div class="registration">
            <h3>АВТОРИЗАЦИЯ</h3>
            <iframe src="autorisation.php">
                Ваш браузер не поддерживает плаваюшие фреймы!
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
            <div id="Mellriart"><p>Special thanks to <a href="https://www.instagram.com/meellri/">Meellri</a></p></div>
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
