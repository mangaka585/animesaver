<?php
    $a = mysqli_query($connection,"SELECT COUNT(1) FROM `anime`");
    $b = mysqli_fetch_array( $a );
    $c = (int) $_GET['page'];
    if ($c == null) {$c = 1;}
    if ($c - ($b[0] / 10) > 1 ) { echo "Упс, страница не найдена :("; die();}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Yandex.Metrika counter -->
    <script async type="text/javascript">
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
    <link rel="cannonical" href="https://animesaver.ru/">
    <title>Смотреть аниме онлайн бесплатно в хорошем качестве
        <?php
          $current_page_for_title = (int) $_GET['page'];
          if($current_page_for_title != null)   {
              echo "(".$current_page_for_title.")";
          };
        ?>
       | Animesaver</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="Только самые популярные аниме в хорошем качестве без рекламы можно посмотреть онлайн на Animesaver.ru - самом простом сайте по аниме в России! Без регистрации и совершенно бесплатно!
    <?php
      $current_page_for_description = (int) $_GET['page'];
      if($current_page_for_description != null)   {
          echo " Страница ".$current_page_for_title;
      };
    ?>
    "/>
    <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="scripts/jquery_code.js" type="text/javascript"></script>
</head>
<body>
<div class="preloader">
    <div class="preloader__image"></div>
</div>
<div class="layout">
    <header class="navi">
        <a href="/" class="animesaver_link"><img src="images/favicon.png" alt="Logo of the site"></a>
        <div class="navigation">
            <a href="/">ГЛАВНАЯ</a>
            <a href="catalogue">КАТАЛОГ</a>
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
            <li><a href="/">ГЛАВНАЯ</a></li>
            <li><a href="weekly-saver">ЖУРНАЛ WS</a></li>
            <li><a href="catalogue">КАТАЛОГ</a></li>
        </ul>
    </div>
    <div class="ui">
        <h1 class="ui_1">Animesaver</h1>
        <h2 class="ui_2">Самый простой сайт по аниме в России!</h2>
        <form action="includes/search.php" method="post" target="_top" class="search">
              <input type="text" size="20" maxlength="128" name="search" class="search_input" placeholder="      Поиск аниме по названию">
              <input type="submit" name="submit" class="search_submit" value="Найти" title="Найти">
        </form>
    </div>
    <section class="body_layout">
        <div class="news_sidebar">                                                          <!--Sidebar-->
            <h3>НОВОСТИ САЙТА</h3>
            <iframe src="anime/news.php">
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>
        </div>
        <section class="main_block">                                                        <!--Main block-->
            <?php
            $current_page = (int) $_GET['page'];
            if($current_page == null)   {
                $page_start = 0;
            } else {
                $page_start = 10*($current_page - 1);
            };
            $anime_page = mysqli_query($connection,"SELECT * FROM  `anime` ORDER BY `update_date` DESC LIMIT $page_start,10");
            ?>

            <?php
            while($anime_page_result = mysqli_fetch_assoc($anime_page)){
                ?>
                <div class="main_block_element">
                    <a href="/<?php echo $anime_page_result['link'];?>"><img src=<?php echo $anime_page_result['main_img_sourse']; ?> alt="<?php echo $anime_page_result['title']; ?>pic" /></a>
                    <div class="main_block_element_description">
                        <a href="/<?php echo $anime_page_result['link'];?>"><h2><?php echo $anime_page_result['title'];?></h2></a>
                        <p>
                            <?php echo mb_substr($anime_page_result['description'],0,440, 'utf-8') . '...'; ?>
                        </p>
                        <div style="clear: both"></div>
                        <div class="views">
                            <div> <?php
                            if($anime_page_result['views'] == null) {
                                echo 0;
                            } else {
                                echo $anime_page_result['views'];
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="main_block_element_genre">
                        <h4>Жанр:</h4>
                        <span>
                                <?php
                                $categories = $anime_page_result['categories_1_id'];
                                $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                                $categories_name_result = mysqli_fetch_assoc($categories_name);
                                if($categories_name_result != null){
                                    echo $categories_name_result['title'] . '<br>';
                                };
                                $categories = $anime_page_result['categories_2_id'];
                                $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                                $categories_name_result = mysqli_fetch_assoc($categories_name);
                                if($categories_name_result != null){
                                    echo $categories_name_result['title'] . '<br>';
                                };
                                $categories = $anime_page_result['categories_3_id'];
                                $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                                $categories_name_result = mysqli_fetch_assoc($categories_name);
                                if($categories_name_result != null){
                                    echo $categories_name_result['title'];
                                };
                                ?>
                            </span>
                        <h4>Серии:</h4>
                        <span><?php echo $anime_page_result['series']; ?></span>
                        <h4>IMDb:</h4>
                        <span><?php echo $anime_page_result['IMDb']; ?> </span>
                    </div>
                    <a href="/<?php echo $anime_page_result['link'];?>" class="Watch_button">Смотреть</a>
                </div>
                <?php
            }
            ?>

            <?php
            /* Входные параметры */
            $count_pages_pre = mysqli_query($connection, "SELECT COUNT(*) FROM `anime`" );
            $count_pages_result = mysqli_fetch_array($count_pages_pre);
            $count_pages = ceil($count_pages_result[0]/10);
            $active = (int) $_GET['page'];
            if($active == null) {
                $active = 1;
            };
            $count_show_pages = 6;
            $url = "/index.php";
            $url_page = "/index.php?page=";
            if ($count_pages > 1) {
                $left = $active - 1;
                $right = $count_pages - $active;
                if ($left < floor($count_show_pages / 2)) $start = 1;
                else $start = $active - floor($count_show_pages / 2);
                $end = $start + $count_show_pages - 1;
                if ($end > $count_pages) {
                    $start -= ($end - $count_pages);
                    $end = $count_pages;
                    if ($start < 1) $start = 1;
                }
                ?>
                <!-- Pagination -->
                <div id="pagination">
                    <?php if ($active != 1) { ?>
                        <a href="<?=$url?>" title="Первая страница">&lt;&lt;</a>

                    <?php } ?>
                    <?php for ($i = $start; $i <= $end; $i++) { ?>
                        <?php if ($i == $active) { ?><span><?=$i?></span><?php } else { ?><a href="<?php if ($i == 1) { ?><?=$url?><?php } else { ?><?=$url_page.$i?><?php } ?>"><?=$i?></a><?php } ?>
                    <?php } ?>
                    <?php if ($active != $count_pages) { ?>

                        <a href="<?=$url_page.$count_pages?>" title="Последняя страница">&gt;&gt;</a>
                    <?php } ?>
                </div>
            <?php } ?>

        </section>
        <div class="adv">                                                                   <!--ADV-->
            <h3>НОВОСТИ ЖУРНАЛА</h3>
            <iframe src="anime/ws_news.php">
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>
        </div>
        <div class="registration">
            <h3>АВТОРИЗАЦИЯ</h3>
            <iframe src="includes/autorisation.php">
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
            <div id="Mellriart">Special thanks to <a href="https://www.instagram.com/meellri/">Meellri</a></div>
            <div id="Rights">
                <p>&#169; 2019 - 2020 Animesaver.ru. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <a href="#" class="scroll-top" title="В начало">
        <img src="images/up.png" alt="up_logo"/>
    </a>
</div>
</body>
</html>
