<?php
    $url = trim($url_test, "/");
    mysqli_query($connection, "UPDATE `anime` SET `views` = `views` + 1 WHERE `link` = '$url'");
    $result = mysqli_query($connection,"SELECT * FROM  `anime` WHERE  `link` = '$url'");
    $r1 = mysqli_fetch_assoc($result);
    $recomendation_count = 0;

    if($r1 == null){
        include 'includes/404_error.php';
    } else {
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
            <script type="text/javascript" src="https://vk.com/js/api/openapi.js?167"></script>
            <script type="text/javascript">
                VK.init({apiId: 7327920, onlyWidgets: true});
            </script>
            <link rel="shortcut icon" href="images/favicon_for_line.ico" type="image/png">
            <title><?php echo $r1['title']; ?> | Animesaver</title>
            <link rel="stylesheet" href="css/style_anime.css">
            <meta name="description" content="Аниме <?php echo $r1['title']; ?> смотреть онлайн бесплатно без регистрации в хорошем качестве" />
            <meta name="keywords" content="Аниме Смотреть Онлайн бесплатно Наруто Клинок Поджелудочную Доктор Стоун Мастера меча онлайн Синий Экзорцист"/>
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
                <h2 class="ui_1">Animesaver</h2>
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
                        </p>
                        <div class="views">
                            <div> <?php echo $r1['views']; ?></div>
                        </div>
                        <div class="vk_likes">
                            <div id="vk_like"></div>
                            <script type="text/javascript">
                                VK.Widgets.Like('vk_like', {pageTitle: '<?php echo $r1['title'];?> на сайте Animesaver.ru'}, <?php echo $r1['id'];?>);
                            </script>
                        </div>
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
                                <?php if($r1['50+series'] == 1) { ?>
                                <h3>Серия 51</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                <h3>Серия 101</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                <h3>Серия 151</h3> <?php } else { ?>
                                <h3>Серия 1</h3> <?php } ?>
                                <div id="1">
                                <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_1']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"1", file:<?php echo $r1['seria_1']; ?>});
                                </script>
                            </div>
                            <?php
                            } }
                        ?>
                        <?php
                        if($r1['seria_2'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 52</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 102</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 152</h3> <?php } else { ?>
                                    <h3>Серия 2</h3> <?php } ?>
                                <div id="2">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_2']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"2", file:<?php echo $r1['seria_2']; ?>});
                                </script>
                            </div>
                            <?php
                            } }
                        ?>
                        <?php
                        if($r1['seria_3'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 53</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 103</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 153</h3> <?php } else { ?>
                                    <h3>Серия 3</h3> <?php } ?>
                                <div id="3">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_3']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"3", file:<?php echo $r1['seria_3']; ?>});
                                </script>
                            </div>
                            <?php
                            } }
                        ?>
                        <?php
                        if($r1['seria_4'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 54</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 104</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 154</h3> <?php } else { ?>
                                    <h3>Серия 4</h3> <?php } ?>
                                <div id="4">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_4']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"4", file:<?php echo $r1['seria_4']; ?>});
                                </script>
                            </div>
                            <?php
                            } }
                        ?>
                        <?php
                        if($r1['seria_5'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 55</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 105</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 155</h3> <?php } else { ?>
                                    <h3>Серия 5</h3> <?php } ?>
                                <div id="5">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_5']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"5", file:<?php echo $r1['seria_5']; ?>});
                                </script>
                            </div>
                            <?php
                            } }
                        ?>
                        <?php
                        if($r1['seria_6'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 56</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 106</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 156</h3> <?php } else { ?>
                                    <h3>Серия 6</h3> <?php } ?>
                                <div id="6">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_6']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"6", file:<?php echo $r1['seria_6']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_7'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 57</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 107</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 157</h3> <?php } else { ?>
                                    <h3>Серия 7</h3> <?php } ?>
                                <div id="7">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_7']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"7", file:<?php echo $r1['seria_7']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_8'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 58</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 108</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 158</h3> <?php } else { ?>
                                    <h3>Серия 8</h3> <?php } ?>
                                <div id="8">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_8']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"8", file:<?php echo $r1['seria_8']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_9'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 59</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 109</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 159</h3> <?php } else { ?>
                                    <h3>Серия 9</h3> <?php } ?>
                                <div id="9">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_9']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"9", file:<?php echo $r1['seria_9']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_10'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 60</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 110</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 160</h3> <?php } else { ?>
                                    <h3>Серия 10</h3> <?php } ?>
                                <div id="10">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_10']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"10", file:<?php echo $r1['seria_10']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_11'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 61</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 111</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 161</h3> <?php } else { ?>
                                    <h3>Серия 11</h3> <?php } ?>
                                <div id="11">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_11']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"11", file:<?php echo $r1['seria_11']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_12'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 62</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 112</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 162</h3> <?php } else { ?>
                                    <h3>Серия 12</h3> <?php } ?>
                                <div id="12">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_12']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"12", file:<?php echo $r1['seria_12']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_13'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 63</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 113</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 163</h3> <?php } else { ?>
                                    <h3>Серия 13</h3> <?php } ?>
                                <div id="13">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_13']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"13", file:<?php echo $r1['seria_13']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_14'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 64</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 114</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 164</h3> <?php } else { ?>
                                    <h3>Серия 14</h3> <?php } ?>
                                <div id="14">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_14']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"14", file:<?php echo $r1['seria_14']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_15'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 65</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 115</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 165</h3> <?php } else { ?>
                                    <h3>Серия 15</h3> <?php } ?>
                                <div id="15">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_15']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"15", file:<?php echo $r1['seria_15']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_16'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 66</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 116</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 166</h3> <?php } else { ?>
                                    <h3>Серия 16</h3> <?php } ?>
                                <div id="16">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_16']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"16", file:<?php echo $r1['seria_16']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_17'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 67</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 117</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 167</h3> <?php } else { ?>
                                    <h3>Серия 17</h3> <?php } ?>
                                <div id="17">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_17']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"17", file:<?php echo $r1['seria_17']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_18'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 68</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 118</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 168</h3> <?php } else { ?>
                                    <h3>Серия 18</h3> <?php } ?>
                                <div id="18">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_18']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"18", file:<?php echo $r1['seria_18']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_19'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 69</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 119</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 169</h3> <?php } else { ?>
                                    <h3>Серия 19</h3> <?php } ?>
                                <div id="19">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_19']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"19", file:<?php echo $r1['seria_19']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_20'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 70</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 120</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 170</h3> <?php } else { ?>
                                    <h3>Серия 20</h3> <?php } ?>
                                <div id="20">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_20']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"20", file:<?php echo $r1['seria_20']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_21'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 71</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 121</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 171</h3> <?php } else { ?>
                                    <h3>Серия 21</h3> <?php } ?>
                                <div id="21">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_21']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"21", file:<?php echo $r1['seria_21']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_22'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 72</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 122</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 172</h3> <?php } else { ?>
                                    <h3>Серия 22</h3> <?php } ?>
                                <div id="22">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_22']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"22", file:<?php echo $r1['seria_22']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_23'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 73</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 123</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 173</h3> <?php } else { ?>
                                    <h3>Серия 23</h3> <?php } ?>
                                <div id="23">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_23']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"23", file:<?php echo $r1['seria_23']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_24'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 74</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 124</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 174</h3> <?php } else { ?>
                                    <h3>Серия 24</h3> <?php } ?>
                                <div id="24">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_24']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"24", file:<?php echo $r1['seria_24']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_25'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 75</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 125</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 175</h3> <?php } else { ?>
                                    <h3>Серия 25</h3> <?php } ?>
                                <div id="25">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_25']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"25", file:<?php echo $r1['seria_25']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_26'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 76</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 126</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 176</h3> <?php } else { ?>
                                    <h3>Серия 26</h3> <?php } ?>
                                <div id="26">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_26']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"26", file:<?php echo $r1['seria_26']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_27'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 77</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 127</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 177</h3> <?php } else { ?>
                                    <h3>Серия 27</h3> <?php } ?>
                                <div id="27">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_27']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"27", file:<?php echo $r1['seria_27']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_28'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 78</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 128</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 178</h3> <?php } else { ?>
                                    <h3>Серия 28</h3> <?php } ?>
                                <div id="28">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_28']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"28", file:<?php echo $r1['seria_28']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_29'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 79</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 129</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 179</h3> <?php } else { ?>
                                    <h3>Серия 29</h3> <?php } ?>
                                <div id="29">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_29']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"29", file:<?php echo $r1['seria_29']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_30'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 80</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 130</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 180</h3> <?php } else { ?>
                                    <h3>Серия 30</h3> <?php } ?>
                                <div id="30">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_30']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"30", file:<?php echo $r1['seria_30']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_31'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 81</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 131</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 181</h3> <?php } else { ?>
                                    <h3>Серия 31</h3> <?php } ?>
                                <div id="31">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_31']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"31", file:<?php echo $r1['seria_31']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_32'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 82</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 132</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 182</h3> <?php } else { ?>
                                    <h3>Серия 32</h3> <?php } ?>
                                <div id="32">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_32']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"32", file:<?php echo $r1['seria_32']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_33'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 83</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 133</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 183</h3> <?php } else { ?>
                                    <h3>Серия 33</h3> <?php } ?>
                                <div id="33">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_33']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"33", file:<?php echo $r1['seria_33']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_34'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 84</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 134</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 184</h3> <?php } else { ?>
                                    <h3>Серия 34</h3> <?php } ?>
                                <div id="34">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_34']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"34", file:<?php echo $r1['seria_34']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_35'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 85</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 135</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 185</h3> <?php } else { ?>
                                    <h3>Серия 35</h3> <?php } ?>
                                <div id="35">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_35']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"35", file:<?php echo $r1['seria_35']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_36'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 86</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 136</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 186</h3> <?php } else { ?>
                                    <h3>Серия 36</h3> <?php } ?>
                                <div id="36">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_36']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"36", file:<?php echo $r1['seria_36']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_37'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 87</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 137</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 187</h3> <?php } else { ?>
                                    <h3>Серия 37</h3> <?php } ?>
                                <div id="37">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_37']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"37", file:<?php echo $r1['seria_37']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_38'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 88</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 138</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 188</h3> <?php } else { ?>
                                    <h3>Серия 38</h3> <?php } ?>
                                <div id="38">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_38']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"38", file:<?php echo $r1['seria_38']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_39'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 89</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 139</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 189</h3> <?php } else { ?>
                                    <h3>Серия 39</h3> <?php } ?>
                                <div id="39">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_39']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"39", file:<?php echo $r1['seria_39']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_40'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 90</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 140</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 190</h3> <?php } else { ?>
                                    <h3>Серия 40</h3> <?php } ?>
                                <div id="40">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_40']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"40", file:<?php echo $r1['seria_40']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_41'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 91</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 141</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 191</h3> <?php } else { ?>
                                    <h3>Серия 41</h3> <?php } ?>
                                <div id="41">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_41']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"41", file:<?php echo $r1['seria_41']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_42'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 92</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 142</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 192</h3> <?php } else { ?>
                                    <h3>Серия 42</h3> <?php } ?>
                                <div id="42">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_42']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"42", file:<?php echo $r1['seria_42']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_43'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 93</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 143</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 193</h3> <?php } else { ?>
                                    <h3>Серия 43</h3> <?php } ?>
                                <div id="43">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_43']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"43", file:<?php echo $r1['seria_43']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_44'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 94</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 144</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 194</h3> <?php } else { ?>
                                    <h3>Серия 44</h3> <?php } ?>
                                <div id="44">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_44']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"44", file:<?php echo $r1['seria_44']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_45'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 95</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 145</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 195</h3> <?php } else { ?>
                                    <h3>Серия 45</h3> <?php } ?>
                                <div id="45">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_45']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"45", file:<?php echo $r1['seria_45']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_46'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 96</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 146</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 196</h3> <?php } else { ?>
                                    <h3>Серия 46</h3> <?php } ?>
                                <div id="46">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_46']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"46", file:<?php echo $r1['seria_46']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_47'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 97</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 147</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 197</h3> <?php } else { ?>
                                    <h3>Серия 47</h3> <?php } ?>
                                <div id="47">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_47']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"47", file:<?php echo $r1['seria_47']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_48'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 98</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 148</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 198</h3> <?php } else { ?>
                                    <h3>Серия 48</h3> <?php } ?>
                                <div id="48">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_48']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"48", file:<?php echo $r1['seria_48']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_49'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 99</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 149</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 199</h3> <?php } else { ?>
                                    <h3>Серия 49</h3> <?php } ?>
                                <div id="49">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_49']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"49", file:<?php echo $r1['seria_49']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                        <?php
                        if($r1['seria_50'] != null){
                            ?>
                            <div>
                                <?php if($r1['50+series'] == 1) { ?>
                                    <h3>Серия 100</h3>
                                <?php } else if($r1['100+series'] == 1) { ?>
                                    <h3>Серия 150</h3> <?php } else if($r1['150+series'] == 1){ ?>
                                    <h3>Серия 200</h3> <?php } else { ?>
                                    <h3>Серия 50</h3> <?php } ?>
                                <div id="50">
                                    <?php if($r1['kodik_bd'] == 1) { ?>
                                    <iframe src="http:<?php echo $r1['seria_50']; ?>"
                                            allowfullscreen="" frameborder="0"></iframe></div></div>
                                <?php } else {?>
                                </div>
                                <script>
                                    var player = new Playerjs({id:"50", file:<?php echo $r1['seria_50']; ?>});
                                </script>
                            </div>
                            <?php
                        } }
                        ?>
                    </section>
                    <fieldset class="images_of_anime">
                        <legend>Комментарии</legend>
                        <div id="vk_comments"></div>                                               <!--VK comments-->
                        <script type="text/javascript">
                            VK.Widgets.Comments("vk_comments", {limit: 10, attach: false, width: 720}, <?php echo $r1['id']; ?>);
                        </script>
                    </fieldset>
                </section>
                <div class="adv">                                                                   <!--ADV-->
                    <h3>НОВОСТИ ЖУРНАЛА</h3>
                    <iframe src="anime/ws_news.php">
                        Ваш браузер не поддерживает плавающие фреймы!
                    </iframe>
                </div>
            </section>

            <?php //Код для рандомного вычисления id анимешек для рекомендаций
            $count_anime_pages_pre = mysqli_query($connection, "SELECT COUNT(*) FROM `anime`");
            $count_anime_pages_pre1 = mysqli_fetch_array($count_anime_pages_pre);
            $count_anime_pages = $count_anime_pages_pre1[0];
            function randarr( $N, $min, $max) {
                return array_map(
                    function() use( $min, $max) {
                        return rand( $min, $max);
                    },
                    array_pad( [], $N, 0)
                );
            };
            $random_array = randarr(5, 1, $count_anime_pages);
            $array_num = 0;
            ?>

            <section class="recomendations">
                <div class="recomendations__content">
                    <h2 class="recomendations__content__h2">Вместе с этим аниме смотрят</h2>
                    <div class="recomendations__content__flexbox">

                        <?php
                        while($recomendation_count<5) {
                            $array_num_value = $random_array[$array_num];
                            $recomendation = mysqli_query($connection, "SELECT * FROM  `anime` WHERE  `id` = '$array_num_value'");
                            $recomendation_result = mysqli_fetch_assoc($recomendation);
                            $recomendation_count += 1;
                            $array_num += 1;
                            ?>
                            <div class="recomendations__content__flexbox__element">
                                <a href="/<?php echo $recomendation_result['link'];?>">
                                    <h4 class="recomendations__content__flexbox__element__h4"><?php echo $recomendation_result['title'];?></h4>
                                    <img src=<?php echo $recomendation_result['main_img_sourse']; ?> alt="<?php echo $recomendation_result['title']; ?>pic" class="recomendations__content__flexbox__element__img"/>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
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
            <a href="#" class="scroll-top" title="В начало">
                <img src="images/up.png" alt="up_logo"/>
            </a>
        </div>
        </body>
        </html>
<?php } ?>
