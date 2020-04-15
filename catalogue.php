<?php
include "includes/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Yandex.Metrika counter -->
    <script async type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(55604875, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149359628-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-149359628-1');
    </script>
    <meta name="yandex-verification" content="067bb48ccc18ed4a" />
    <link rel="shortcut icon" href="images/favicon_for_line.ico" type="image/png">
    <title>Каталог | Animesaver</title>
    <link rel="stylesheet" href="css/style_catalogue.css">
    <meta name="description" content="Каталог популярных аниме, которые можно посмотреть онлайн на Animesaver.ru - самом простом сайте по аниме в России! Без регистрации и совершенно бесплатно!"/>
    <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="scripts/jquery_code.js" type="text/javascript"></script>
</head>
<body>
<?php
$anime_page = mysqli_query($connection,"SELECT * FROM  `anime` ORDER BY `update_date` DESC");
?>
    <div class="layout">
        <header class="navi">
            <a href="index.php" class="animesaver_link"><img src="images/favicon.png" alt="Logo of the site"></a>
            <div class="navigation">
                <a href="index.php">ГЛАВНАЯ</a>
                <a href="catalogue.php">КАТАЛОГ</a>
                <a href="weekly-saver">ЖУРНАЛ WS</a>
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
            <a href="weekly-saver" class="weeklysaver_link"><img src="images/favicon_ws.png" alt="Logo of WS" /></a>
        </header>
        <div id="mobile_nav" class="mobile_nav">
            <ul>
                <li><a href="index.php">ГЛАВНАЯ</a></li>
                <li><a href="weekly-saver">ЖУРНАЛ WS</a></li>
                <li><a href="catalogue.php">КАТАЛОГ</a></li>
            </ul>
        </div>
        <div class="ui">
            <h1 class="ui_1">Animesaver</h1>
            <h2 class="ui_2">Самый простой сайт по аниме в России!</h2>
        </div>
        <section class="body_layout">
            <div class="news_sidebar">                                                          <!--Sidebar-->
                <h3>НОВОСТИ САЙТА</h3>
                <iframe src="anime/news.php" width="190" height="75%">
                    Ваш браузер не поддерживает плавающие фреймы!
                </iframe>
            </div>
            <section class="main_block">                                                        <!--Main block-->
                    <div class="catalogue_of">
                        <?php
                        while($anime_page_result = mysqli_fetch_assoc($anime_page)){
                        ?>
                        <div>
                            <h2><?php echo $anime_page_result['title']; ?></h2>
                            <a href="anime.php?link=<?php echo $anime_page_result['link']; ?>"><img src="<?php echo $anime_page_result['main_img_sourse']; ?>" alt="<?php echo $anime_page_result['title']; ?> pic" /></a>
                        </div>
                        <?php } ?>
                    </div>
            </section>
            <div class="adv">                                                                   <!--ADV-->
                <h3>НОВОСТИ ЖУРНАЛА</h3>
                <iframe src="anime/ws_news.html">
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
                <div id="Piroll">
                    <p>Created by mangaka585@gmail.com</p>
                </div>
                <div id="Mellriart">Special thanks to <a href="https://www.instagram.com/meellri/">Meellri</a></div>
                <div id="Rights">
                    <p>&#169; 2019 - 2020 Animesaver.ru. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>