<?php
include "includes/db.php";
$url = $_GET['link'];
    $result = mysqli_query($connection,"SELECT * FROM  `anime` WHERE  `link` = '$url'");
    $r1 = mysqli_fetch_assoc($result);
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
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?167"></script> <!--VK comments-->
    <script type="text/javascript">
        VK.init({apiId: 7327920, onlyWidgets: true});
    </script>
    <link rel="shortcut icon" href="images/favicon_for_line.ico" type="image/png">
    <title><?php echo $r1['title']; ?> | Animesaver</title>
    <link rel="stylesheet" href="css/style_anime.css">
    <meta name="description" content="<?php echo $r1['description_2']; ?> смотреть онлайн бесплатно без регистрации в хорошем качестве на сайте animesaver.ru" />
    <meta name="keywords" content="Аниме Смотреть Онлайн бесплатно Наруто Клинок Поджелудочную Доктор Стоун Мастера меча онлайн Синий Экзорцист"/>
    <script src="playerjs.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="scripts/jquery_code.js" type="text/javascript"></script>
</head>
<body>
<div class="preloader">
    <div class="preloader__image"></div>
</div>
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
            <iframe src="anime/news.php">
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>
        </div>
        <section class="description_of_anime">
            <img src="<?php echo $r1['main_img_sourse']; ?>" alt="<?php echo $r1['title'];?> pic" />
            <div class="description_of_anime_text">
                <h1><?php echo $r1['title'];?><br><?php echo $r1['title_eng']; ?></h1>
                <p>
                    <?php echo $r1['description']; ?>
                </>
            </div>
            <div class="description_of_anime_info">
                <fieldset class="description_of_anime_info_1">
                    <legend>Информация</legend>
                    <div class="description_of_anime_info_tabble">
                        <div class="description_of_anime_info_title">
                            <strong>Год</strong>
                        </div>
                        <div class="description_of_anime_info_text">
                            <?php echo $r1['year']; ?>
                        </div>
                    </div>
                    <div class="description_of_anime_info_tabble">
                        <div class="description_of_anime_info_title">
                            <strong>Режиссёр</strong>
                        </div>
                        <div class="description_of_anime_info_text">
                            <?php echo $r1['producer']; ?>
                        </div>
                    </div>
                    <div class="description_of_anime_info_tabble">
                        <div class="description_of_anime_info_title">
                            <strong>Жанр</strong>
                        </div>
                        <div class="description_of_anime_info_text">
                            <?php
                            $categories = $r1['categories_1_id'];
                            $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                            $categories_name_result = mysqli_fetch_assoc($categories_name);
                            if($categories_name_result != null){
                                echo $categories_name_result['title'] . ', ';
                            };
                            $categories = $r1['categories_2_id'];
                            $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                            $categories_name_result = mysqli_fetch_assoc($categories_name);
                            if($categories_name_result != null){
                                echo $categories_name_result['title'] . ', ';
                            };
                            $categories = $r1['categories_3_id'];
                            $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                            $categories_name_result = mysqli_fetch_assoc($categories_name);
                            if($categories_name_result != null){
                                echo $categories_name_result['title'];
                            };
                            ?>
                        </div>
                    </div>
                    <div class="description_of_anime_info_tabble">
                        <div class="description_of_anime_info_title">
                            <strong>Время</strong>
                        </div>
                        <div class="description_of_anime_info_text">
                            <?php echo $r1['time']; ?> минут
                        </div>
                    </div>
                    <div class="description_of_anime_info_tabble" style="border-bottom: none">
                        <div class="description_of_anime_info_title">
                            <strong>Серии</strong>
                        </div>
                        <div class="description_of_anime_info_text">
                            <?php echo $r1['series']; ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div style="clear: both"></div>
            <fieldset class="images_of_anime">
                <legend>Скриншоты</legend>
                <img src="<?php echo $r1['pic_1']; ?>" alt="1"/><img src="<?php echo $r1['pic_2']; ?>" alt="2"/><img src="<?php echo $r1['pic_3']; ?>" alt="3"/>
            </fieldset>
            <div style="clear: both"></div>
            <h2 class="h2_description">Смотреть аниме <?php echo $r1['description_2']; ?> онлайн</h2>
            <section class="video">

                <?php
                if($r1['seria_1'] != null){
                        ?>
                        <div>
                            <h3>Серия 1</h3>
                            <div id="1"></div>
                            <script>
                                var player = new Playerjs({id:"1", file:<?php echo $r1['seria_1']; ?>});
                            </script>
                        </div>
                        <?php
                    }
                ?>
                <?php
                if($r1['seria_2'] != null){
                    ?>
                    <div>
                        <h3>Серия 2</h3>
                        <div id="2"></div>
                        <script>
                            var player = new Playerjs({id:"2", file:<?php echo $r1['seria_2']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_3'] != null){
                    ?>
                    <div>
                        <h3>Серия 3</h3>
                        <div id="3"></div>
                        <script>
                            var player = new Playerjs({id:"3", file:<?php echo $r1['seria_3']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_4'] != null){
                    ?>
                    <div>
                        <h3>Серия 4</h3>
                        <div id="4"></div>
                        <script>
                            var player = new Playerjs({id:"4", file:<?php echo $r1['seria_4']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_5'] != null){
                    ?>
                    <div>
                        <h3>Серия 5</h3>
                        <div id="5"></div>
                        <script>
                            var player = new Playerjs({id:"5", file:<?php echo $r1['seria_5']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_6'] != null){
                    ?>
                    <div>
                        <h3>Серия 6</h3>
                        <div id="6"></div>
                        <script>
                            var player = new Playerjs({id:"6", file:<?php echo $r1['seria_6']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_7'] != null){
                    ?>
                    <div>
                        <h3>Серия 7</h3>
                        <div id="7"></div>
                        <script>
                            var player = new Playerjs({id:"7", file:<?php echo $r1['seria_7']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_8'] != null){
                    ?>
                    <div>
                        <h3>Серия 8</h3>
                        <div id="8"></div>
                        <script>
                            var player = new Playerjs({id:"8", file:<?php echo $r1['seria_8']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_9'] != null){
                    ?>
                    <div>
                        <h3>Серия 9</h3>
                        <div id="9"></div>
                        <script>
                            var player = new Playerjs({id:"9", file:<?php echo $r1['seria_9']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_10'] != null){
                    ?>
                    <div>
                        <h3>Серия 10</h3>
                        <div id="10"></div>
                        <script>
                            var player = new Playerjs({id:"10", file:<?php echo $r1['seria_10']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_11'] != null){
                    ?>
                    <div>
                        <h3>Серия 11</h3>
                        <div id="11"></div>
                        <script>
                            var player = new Playerjs({id:"11", file:<?php echo $r1['seria_11']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_12'] != null){
                    ?>
                    <div>
                        <h3>Серия 12</h3>
                        <div id="12"></div>
                        <script>
                            var player = new Playerjs({id:"12", file:<?php echo $r1['seria_12']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_13'] != null){
                    ?>
                    <div>
                        <h3>Серия 13</h3>
                        <div id="13"></div>
                        <script>
                            var player = new Playerjs({id:"13", file:<?php echo $r1['seria_13']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_14'] != null){
                    ?>
                    <div>
                        <h3>Серия 14</h3>
                        <div id="14"></div>
                        <script>
                            var player = new Playerjs({id:"14", file:<?php echo $r1['seria_14']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_15'] != null){
                    ?>
                    <div>
                        <h3>Серия 15</h3>
                        <div id="15"></div>
                        <script>
                            var player = new Playerjs({id:"15", file:<?php echo $r1['seria_15']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_16'] != null){
                    ?>
                    <div>
                        <h3>Серия 16</h3>
                        <div id="16"></div>
                        <script>
                            var player = new Playerjs({id:"16", file:<?php echo $r1['seria_16']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_17'] != null){
                    ?>
                    <div>
                        <h3>Серия 17</h3>
                        <div id="17"></div>
                        <script>
                            var player = new Playerjs({id:"17", file:<?php echo $r1['seria_17']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_18'] != null){
                    ?>
                    <div>
                        <h3>Серия 18</h3>
                        <div id="18"></div>
                        <script>
                            var player = new Playerjs({id:"18", file:<?php echo $r1['seria_18']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_19'] != null){
                    ?>
                    <div>
                        <h3>Серия 19</h3>
                        <div id="19"></div>
                        <script>
                            var player = new Playerjs({id:"19", file:<?php echo $r1['seria_19']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_20'] != null){
                    ?>
                    <div>
                        <h3>Серия 20</h3>
                        <div id="20"></div>
                        <script>
                            var player = new Playerjs({id:"20", file:<?php echo $r1['seria_20']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_21'] != null){
                    ?>
                    <div>
                        <h3>Серия 21</h3>
                        <div id="21"></div>
                        <script>
                            var player = new Playerjs({id:"21", file:<?php echo $r1['seria_21']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_22'] != null){
                    ?>
                    <div>
                        <h3>Серия 22</h3>
                        <div id="22"></div>
                        <script>
                            var player = new Playerjs({id:"22", file:<?php echo $r1['seria_22']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_23'] != null){
                    ?>
                    <div>
                        <h3>Серия 23</h3>
                        <div id="23"></div>
                        <script>
                            var player = new Playerjs({id:"23", file:<?php echo $r1['seria_23']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_24'] != null){
                    ?>
                    <div>
                        <h3>Серия 24</h3>
                        <div id="24"></div>
                        <script>
                            var player = new Playerjs({id:"24", file:<?php echo $r1['seria_24']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_25'] != null){
                    ?>
                    <div>
                        <h3>Серия 25</h3>
                        <div id="25"></div>
                        <script>
                            var player = new Playerjs({id:"25", file:<?php echo $r1['seria_25']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_26'] != null){
                    ?>
                    <div>
                        <h3>Серия 26</h3>
                        <div id="26"></div>
                        <script>
                            var player = new Playerjs({id:"26", file:<?php echo $r1['seria_26']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_27'] != null){
                    ?>
                    <div>
                        <h3>Серия 27</h3>
                        <div id="27"></div>
                        <script>
                            var player = new Playerjs({id:"27", file:<?php echo $r1['seria_27']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_28'] != null){
                    ?>
                    <div>
                        <h3>Серия 28</h3>
                        <div id="28"></div>
                        <script>
                            var player = new Playerjs({id:"28", file:<?php echo $r1['seria_28']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_29'] != null){
                    ?>
                    <div>
                        <h3>Серия 29</h3>
                        <div id="29"></div>
                        <script>
                            var player = new Playerjs({id:"29", file:<?php echo $r1['seria_29']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_30'] != null){
                    ?>
                    <div>
                        <h3>Серия 30</h3>
                        <div id="30"></div>
                        <script>
                            var player = new Playerjs({id:"30", file:<?php echo $r1['seria_30']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_31'] != null){
                    ?>
                    <div>
                        <h3>Серия 31</h3>
                        <div id="31"></div>
                        <script>
                            var player = new Playerjs({id:"31", file:<?php echo $r1['seria_31']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_32'] != null){
                    ?>
                    <div>
                        <h3>Серия 32</h3>
                        <div id="32"></div>
                        <script>
                            var player = new Playerjs({id:"32", file:<?php echo $r1['seria_32']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_33'] != null){
                    ?>
                    <div>
                        <h3>Серия 33</h3>
                        <div id="33"></div>
                        <script>
                            var player = new Playerjs({id:"33", file:<?php echo $r1['seria_33']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_34'] != null){
                    ?>
                    <div>
                        <h3>Серия 34</h3>
                        <div id="34"></div>
                        <script>
                            var player = new Playerjs({id:"34", file:<?php echo $r1['seria_34']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_35'] != null){
                    ?>
                    <div>
                        <h3>Серия 35</h3>
                        <div id="35"></div>
                        <script>
                            var player = new Playerjs({id:"35", file:<?php echo $r1['seria_35']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_36'] != null){
                    ?>
                    <div>
                        <h3>Серия 36</h3>
                        <div id="36"></div>
                        <script>
                            var player = new Playerjs({id:"36", file:<?php echo $r1['seria_36']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_37'] != null){
                    ?>
                    <div>
                        <h3>Серия 37</h3>
                        <div id="37"></div>
                        <script>
                            var player = new Playerjs({id:"37", file:<?php echo $r1['seria_37']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_38'] != null){
                    ?>
                    <div>
                        <h3>Серия 38</h3>
                        <div id="38"></div>
                        <script>
                            var player = new Playerjs({id:"38", file:<?php echo $r1['seria_38']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_39'] != null){
                    ?>
                    <div>
                        <h3>Серия 39</h3>
                        <div id="39"></div>
                        <script>
                            var player = new Playerjs({id:"39", file:<?php echo $r1['seria_39']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_40'] != null){
                    ?>
                    <div>
                        <h3>Серия 40</h3>
                        <div id="40"></div>
                        <script>
                            var player = new Playerjs({id:"40", file:<?php echo $r1['seria_40']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_41'] != null){
                    ?>
                    <div>
                        <h3>Серия 41</h3>
                        <div id="41"></div>
                        <script>
                            var player = new Playerjs({id:"41", file:<?php echo $r1['seria_41']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_42'] != null){
                    ?>
                    <div>
                        <h3>Серия 42</h3>
                        <div id="42"></div>
                        <script>
                            var player = new Playerjs({id:"42", file:<?php echo $r1['seria_42']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_43'] != null){
                    ?>
                    <div>
                        <h3>Серия 43</h3>
                        <div id="43"></div>
                        <script>
                            var player = new Playerjs({id:"43", file:<?php echo $r1['seria_43']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_44'] != null){
                    ?>
                    <div>
                        <h3>Серия 44</h3>
                        <div id="44"></div>
                        <script>
                            var player = new Playerjs({id:"44", file:<?php echo $r1['seria_44']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_45'] != null){
                    ?>
                    <div>
                        <h3>Серия 45</h3>
                        <div id="45"></div>
                        <script>
                            var player = new Playerjs({id:"45", file:<?php echo $r1['seria_45']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_46'] != null){
                    ?>
                    <div>
                        <h3>Серия 46</h3>
                        <div id="46"></div>
                        <script>
                            var player = new Playerjs({id:"46", file:<?php echo $r1['seria_46']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_47'] != null){
                    ?>
                    <div>
                        <h3>Серия 47</h3>
                        <div id="47"></div>
                        <script>
                            var player = new Playerjs({id:"47", file:<?php echo $r1['seria_47']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_48'] != null){
                    ?>
                    <div>
                        <h3>Серия 48</h3>
                        <div id="48"></div>
                        <script>
                            var player = new Playerjs({id:"48", file:<?php echo $r1['seria_48']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_49'] != null){
                    ?>
                    <div>
                        <h3>Серия 49</h3>
                        <div id="49"></div>
                        <script>
                            var player = new Playerjs({id:"49", file:<?php echo $r1['seria_49']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
                <?php
                if($r1['seria_50'] != null){
                    ?>
                    <div>
                        <h3>Серия 50</h3>
                        <div id="50"></div>
                        <script>
                            var player = new Playerjs({id:"50", file:<?php echo $r1['seria_50']; ?>});
                        </script>
                    </div>
                    <?php
                }
                ?>
            </section>
            <fieldset class="images_of_anime">
                <legend>Комментарии</legend>
                <div id="vk_comments"></div>                                               <!--VK comments-->
                <script type="text/javascript">
                    VK.Widgets.Comments("vk_comments", {limit: 5, attach: "*", width: 720});
                </script>
            </fieldset>
        </section>
        <div class="adv">                                                                   <!--ADV-->
            <h3>НОВОСТИ ЖУРНАЛА</h3>
            <iframe src="anime/ws_news.html">
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>
        </div>
    </section>
    <footer>
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
</div>
</body>
</html>
<?php mysqli_close($connection);?>
