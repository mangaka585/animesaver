<?php
include "includes/db.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="ru">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css" media="screen, print">
    @font-face {
      font-family: "Comfortaa-Regular";
      src: url("fonts/Comfortaa-Regular.ttf");
    }
    @font-face {
      font-family: "Oswald";
      src: url("fonts/Oswald-VariableFont_wght.ttf") format("truetype");
      src: url("fonts/Oswald-Regular.otf") format("opentype");
      font-weight: normal;
      font-style: normal;
    }
  </style>
  <link rel="stylesheet" href="css/style_new_design.css">
  <link rel="shortcut icon" href="images/favicon_for_line.ico" type="image/png">
  <title>Каталог | Animesaver</title>
  <meta name="description" content="Каталог популярных аниме, которые можно посмотреть онлайн на Animesaver.ru - самом простом сайте по аниме в России! Без регистрации и совершенно бесплатно! Страница 1"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <script defer src="scripts/cataloguescripts.js" type="text/javascript"></script>
</head>
<body>


    <header>                                                                    <!--Блок header-->
        <div class="header__navigation">
            <a href="https://animesaver.ru" class="header__navigation__first_a">
                <img src="images/S-icon.png" alt="site logo" class="header__navigation__first_a__img" alt="Изображение логотипа сайта">
                <h1 class="header__navigation__first_a__h1">AnimeSaver</h1>
            </a>
            <ul class="header__navigation__buttons">
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru">
                        <img src="images/house.svg" alt="значок домика">
                        <span>Главная</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li__active">
                    <a href="https://animesaver.ru/catalogue">
                        <img src="images/stack.svg" alt="значок каталога">
                        <span>Каталог</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/random">
                        <img src="images/perspective-dice-six-faces-random.svg" alt="значок кубика">
                        <span>Случайное</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                  <?php if(empty($_SESSION['login'])) { ?>
                  <a id="autorisation" onclick="showWindow()">
                    <img src="images/stars-stack.svg" alt="значок личного кабинета">
                    <span>Мой профиль</span>
                  </a>
                  <div id="autorisation_window">
                    <iframe src="includes/autorisation.php">
                        Ваш браузер не поддерживает плаваюшие фреймы!
                    </iframe>
                  </div>

                  <?php } else {?>
                  <a href="https://animesaver.ru/includes/my_profile.php">
                      <img src="images/stars-stack.svg" alt="значок личного кабинета">
                      <span>Мой профиль</span>
                  </a>
                  <?php } ?>
                </li>
            </ul>
            <form action="includes/search.php" method="post" target="_top" class="search">
                <button type="submit" name="submit" title="Найти">
                    <img src="images/magnifying-glass1.svg" alt="значок лупы">
                </button>
                <input type="text" size="17" maxlength="128" name="search" placeholder="Найти аниме">
            </form>
        </div>
    </header>


    <section class="main_section">                                              <!--Блок main_section-->

        <section class="content">                                               <!--Блок Контента main_section-->
          <style>

            .content section h3 {
              font-family: "Comfortaa-Regular";
              font-size: 1.5em;
              text-align: center;
              margin-top: 10px;
              margin-bottom: 5px;
            }

            .content__genres {
              width: 95%;
              margin-left: auto;
              overflow: hidden;
              margin-right: auto;
              background: #69b5ff;
              border-radius: 15px;
              position: relative;
            }

            .content__genres__toLeft {
              opacity: 80%;
              width: 314px;
              height: 30px;
              position: absolute;
              top: 140px;
              left: -142px;
              border-bottom: solid 1px black;
              transform: rotate(-90deg);
              background: #16222A;
              z-index: 1;
            }

            .content__genres__toRight {
              opacity: 80%;
              width: 314px;
              height: 30px;
              position: absolute;
              top: 140px;
              right: -142px;
              border-bottom: solid 1px black;
              transform: rotate(90deg);
              background: #16222A;
              z-index: 1;
            }

            .content__genres__toLeft:hover,
            .content__genres__toRight:hover {
              opacity: 100%;
            }

            .content__genres ul {
              list-style: none;
              display: inline-flex;
              width: 9999px;
              height: 280px;
              padding-left: 15px;
              transition: 1s;
            }

            .content__genres__li,
            .content__genres__li_end,
            .content__year__element {
              display: inline-block;
              border: solid 1px black;
              border-radius: 15px;
              margin-right: 10px;
              padding-left: 5px;
              padding-right: 5px;
              width: 200px;
              height: 280px;
              box-sizing: border-box;
            }

            .content__year__element {
              width: 212px;
              height: 290px;
            }

            .content__genres__li_end {
              position: relative;
              padding-left: 0;
              padding-right: 0;
            }

            .content__genres__li_end:hover {
              background: lightseagreen;
            }

            .content__genres__li_end a {
              display: block;
              text-decoration: none;
              color: black;
            }

            .content__genres__li_end a img {
              margin-top: 40px;
              width: 200px;
            }

            .content__genres__li_end a span {
              position: absolute;
              font-size: 2.5em;
              font-family: "Comfortaa-Regular";
              top: 100px;
              left: 55px;
              text-align: center;
            }

            .content__genres__li:hover,
            .content__year__element:hover {
              background: azure !important;
              transition: 1s;
            }

            .content__genres__li a,
            .content__year a {
              display: block;
              text-decoration: none;
              color: black;
            }

            .content__genres__li a h5,
            .content__year__element a h5 {
              font-family: "Comfortaa-Regular";
              font-size: 0.95em;
              margin-top: 5px;
              margin-bottom: 10px;
              display: none;
              text-align: center;
            }

            .content__genres__li a span,
            .content__genres__li a p,
            .content__year__element a span,
            .content__year__element a p {
              margin-top: 5px;
              display: none;
              font-size: 0.9em;
            }

            .content__year {
              display: -webkit-flex;
              display: flex;
              -webkit-flex-wrap: wrap;
              flex-wrap: wrap;
              margin-left: auto;
              margin-right: auto;
              width: 95%;
              margin-top: 15px;
              padding-left: 10px;
            }

            .content__year__element {
              margin-bottom: 10px;
            }

          </style>

          <section class="main_section__menu">                                    <!--Блок Меню main_section-->
              <div class="main_section__menu__hidden_line">
                  <br>
              </div>
              <ul class="main_section__menu__buttons">
                  <li class="main_section__menu__buttons__active" id="menuGenres">
                      <a href="#genres">
                          <img src="images/settings-knobs.svg" alt="значок Жанров"><span>Жанры</span>
                      </a>
                  </li>
                  <li class="main_section__menu__buttons" id="menuYear">
                      <a href="#year">
                          <img src="images/time-trap.svg" alt="значок Времени"><span>Год выпуска</span>
                      </a>
                  </li>
              </ul>
          </section>

          <section id="main_section__menu__genres">
            <section>
                <h3>Приключения</h3>
                <div class="content__genres">
                  <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl1"/>
                  <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl1"/>
                  <ul id="ul1">
                    <?php
                    $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 1 OR `categories_2_id` = 1 OR `categories_3_id` = 1 ORDER BY `update_date` DESC LIMIT 0,14");
                    while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                      <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                        <a href="/<?php echo $adveture['link']; ?>">
                          <h5><?php echo $adveture['title']; ?></h5>
                          <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                          <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,159, 'utf-8') . '...'; ?></p>
                        </a>
                      </li>
                    <?php } ?>
                    <li class="content__genres__li_end">
                      <a href="/genres=1">
                        <img src="images/select.svg">
                        <span>Ещё<br>...</span>
                      </a>
                    </li>
                  </ul>
                </div>
            </section>

          <section>
              <h3>Романтика</h3>
              <div class="content__genres">
                <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl2"/>
                <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl2"/>
                <ul id="ul2">
                  <?php
                  $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 2 OR `categories_2_id` = 2 OR `categories_3_id` = 2 ORDER BY `update_date` DESC LIMIT 0,14");
                  while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                    <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                      <a href="/<?php echo $adveture['link']; ?>">
                        <h5><?php echo $adveture['title']; ?></h5>
                        <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                        <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                      </a>
                    </li>
                  <?php } ?>
                  <li class="content__genres__li_end">
                    <a href="/genres=2">
                      <img src="images/select.svg">
                      <span>Ещё<br>...</span>
                    </a>
                  </li>
                </ul>
              </div>
          </section>

          <section>
              <h3>Комедия</h3>
              <div class="content__genres">
                <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl3"/>
                <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl3"/>
                <ul id="ul3">
                  <?php
                  $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 3 OR `categories_2_id` = 3 OR `categories_3_id` = 3 ORDER BY `update_date` DESC LIMIT 0,14");
                  while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                    <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                      <a href="/<?php echo $adveture['link']; ?>">
                        <h5><?php echo $adveture['title']; ?></h5>
                        <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                        <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                      </a>
                    </li>
                  <?php } ?>
                  <li class="content__genres__li_end">
                    <a href="/genres=3">
                      <img src="images/select.svg">
                      <span>Ещё<br>...</span>
                    </a>
                  </li>
                </ul>
              </div>
          </section>

          <section>
            <h3>Драма</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl4"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl4"/>
              <ul id="ul4">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 4 OR `categories_2_id` = 4 OR `categories_3_id` = 4 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=4">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Фэнтэзи</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl5"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl5"/>
              <ul id="ul5">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 6 OR `categories_2_id` = 6 OR `categories_3_id` = 6 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=6">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Повседневность</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl6"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl6"/>
              <ul id="ul6">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 7 OR `categories_2_id` = 7 OR `categories_3_id` = 7 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=7">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Школа</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl7"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl7"/>
              <ul id="ul7">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 9 OR `categories_2_id` = 9 OR `categories_3_id` = 9 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=9">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Детектив</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl8"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl8"/>
              <ul id="ul8">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 13 OR `categories_2_id` = 13 OR `categories_3_id` = 13 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=13">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Ужасы</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl9"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl9"/>
              <ul id="ul9">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 14 OR `categories_2_id` = 14 OR `categories_3_id` = 14 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=14">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Экшен</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl10"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl10"/>
              <ul id="ul10">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 15 OR `categories_2_id` = 15 OR `categories_3_id` = 15 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=15">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Психология</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl11"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl11"/>
              <ul id="ul11">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 17 OR `categories_2_id` = 17 OR `categories_3_id` = 17 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=17">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Сверхъестественное</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl12"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl12"/>
              <ul id="ul12">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 18 OR `categories_2_id` = 18 OR `categories_3_id` = 18 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=18">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section>
            <h3>Боевые искусства</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButtonUl13"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButtonUl13"/>
              <ul id="ul13">
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 22 OR `categories_2_id` = 22 OR `categories_3_id` = 22 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 200px 280px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                      <span><b>Рейтинг IMDB:</b> <?php echo $adveture['IMDb']; ?></span>
                      <p><b>Сюжет:</b> <?php echo mb_substr($adveture['description'],0,180, 'utf-8') . '...'; ?></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=22">
                    <img src="images/select.svg">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

        </section>

        <section id="main_section__menu__year">
          <div class="content__year">
            <?php
            $animeYearArray = mysqli_query($connection,"SELECT * FROM `anime` ORDER BY `anime`.`year` DESC ");
            while($animeYear = mysqli_fetch_assoc($animeYearArray)) { ?>
            <div class="content__year__element" style="background: url('<?php echo $animeYear["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 212px 290px;">
              <a href="/<?php echo $animeYear['link']; ?>">
                <h5><?php echo $animeYear['title']; ?></h5>
                <span><b>Рейтинг IMDB:</b> <?php echo $animeYear['IMDb']; ?></span>
                <p><b>Сюжет:</b> <?php echo mb_substr($animeYear['description'],0,180, 'utf-8') . '...'; ?></p>
              </a>
            </div>
            <?php } ?>
          </div>
        </section>

        <br>
        <br>
        </section>

        <section class="links">                                                 <!--Блок Links main_section-->
            <div class="links__div1">
                <h4 class="links__title">Социальные сети</h4>
                <ul class="links__ul">
                    <li>
                        <a href="https://vk.com/weeklysaver">
                            <img src="images/logic-gate-xor.svg" alt="картинка ссылки на ВК журнал">
                            <span>VKontakte</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/animesaver.ru/">
                            <img src="images/logic-gate-xor.svg" alt="Картинка ссылки на инстаграм">
                            <span>Instagram</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="links__div2">
                <h4 class="links__title">Полезные ссылки</h4>
                <ul class="links__ul">
                    <li>
                      <a href="mailto:mangaka585@gmail.com?subject=Вопрос&body=Здравствуйте." target="_blank" rel="noopener noreferrer">
                          <img src="images/letter-bomb.svg" alt="Изображение написания письма администрации">
                          <span>Напишите нам</span>
                      </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/includes/privacy_policy.php">
                            <img src="images/dragon-shield.svg" alt="Изображение политики конфиденциальности">
                            <span>Privacy policy</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/includes/disclaimer.php">
                            <img src="images/dragon-shield.svg" alt="Изображение Отказа от ответственности">
                            <span>Disclaimer</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="links__div3">
                <p>
                  Мы молодой, развивающийся сайт аниме с необычными планами на будущее.
                  Ведь у нас есть еще и второе направление: мы создали первый еженедельный журнал российской манги.
                  Прямо сейчас читайте наш журнал, смотрите аниме сериалы и фильмы без рекламы.
                  Японские аниме доступны для просмотра без регистрации, смс и каких-либо ограничений.
                  В наших планах стать самым масштабным в России порталом аниме!
                </p>
                <div class="links__div3__site_logo">
                    <img src="images/S-icon.png" alt="Изображение логотипа сайта">
                    <h3>AnimeSaver</h3>
                </div>
            </div>
        </section>


        <footer>
          <div>
            Авторские права и торговые марки на аниме и другие рекламные материалы принадлежат
            их соответствующим владельцам, и их использование разрешено <br>в соответствии с
            положениями о добросовестном использовании Закона об авторском праве.
          </div>
      </footer>

  </section>

  <div id="to_top_button">
      <button>
          <img src="images/save-arrow.svg" alt="Изображение стрелочки наверх">
          <span>Наверх</span>
      </button>
  </div>

  <script>
    //Переключение вкладок
    let menuGenres = document.getElementById('menuGenres');
    let contentGenres = document.getElementById('main_section__menu__genres');
    let menuYear = document.getElementById('menuYear');
    let contentYear = document.getElementById('main_section__menu__year');
    menuGenres.addEventListener('click',function(){
    contentYear.style.display = 'none';
    menuYear.classList.remove('main_section__menu__buttons__active');
    contentGenres.style.display = 'block';
    menuGenres.classList.add('main_section__menu__buttons__active');
    });
    menuYear.addEventListener('click',function(){
    contentGenres.style.display = 'none';
    menuGenres.classList.remove('main_section__menu__buttons__active');
    contentYear.style.display = 'block';
    menuYear.classList.add('main_section__menu__buttons__active');
    });

    let ul1 = document.getElementById('ul1');
    let toLeftButtonUl1 = document.getElementById('toLeftButtonUl1');
    toLeftButtonUl1.addEventListener('click', function(){
      let position = ul1.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul1.style.transform = position;
      };
    });
    let toRightButtonUl1 = document.getElementById('toRightButtonUl1');
    toRightButtonUl1.addEventListener('click', function(){
      let position = ul1.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -2055) {
        position = +position - 590;
        if(position < -2055) {
          position = -2055;
        };
        position = "translateX(" + position + "px)";
        ul1.style.transform = position;
      };
    });

    let ul2 = document.getElementById('ul2');
    let toLeftButtonUl2 = document.getElementById('toLeftButtonUl2');
    toLeftButtonUl2.addEventListener('click', function(){
      let position = ul2.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul2.style.transform = position;
      };
    });
    let toRightButtonUl2 = document.getElementById('toRightButtonUl2');
    toRightButtonUl2.addEventListener('click', function(){
      let position = ul2.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -2055) {
        position = +position - 590;
        if(position < -2055) {
          position = -2055;
        };
        position = "translateX(" + position + "px)";
        ul2.style.transform = position;
      };
    });

    let ul3 = document.getElementById('ul3');
    let toLeftButtonUl3 = document.getElementById('toLeftButtonUl3');
    toLeftButtonUl3.addEventListener('click', function(){
      let position = ul3.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul3.style.transform = position;
      };
    });
    let toRightButtonUl3 = document.getElementById('toRightButtonUl3');
    toRightButtonUl3.addEventListener('click', function(){
      let position = ul3.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -2055) {
        position = +position - 590;
        if(position < -2055) {
          position = -2055;
        };
        position = "translateX(" + position + "px)";
        ul3.style.transform = position;
      };
    });

    let ul4 = document.getElementById('ul4');
    let toLeftButtonUl4 = document.getElementById('toLeftButtonUl4');
    toLeftButtonUl4.addEventListener('click', function(){
      let position = ul4.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul4.style.transform = position;
      };
    });
    let toRightButtonUl4 = document.getElementById('toRightButtonUl4');
    toRightButtonUl4.addEventListener('click', function(){
      let position = ul4.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -2055) {
        position = +position - 590;
        if(position < -2055) {
          position = -2055;
        };
        position = "translateX(" + position + "px)";
        ul4.style.transform = position;
      };
    });

    let ul5 = document.getElementById('ul5');
    let toLeftButtonUl5 = document.getElementById('toLeftButtonUl5');
    toLeftButtonUl5.addEventListener('click', function(){
      let position = ul5.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul5.style.transform = position;
      };
    });
    let toRightButtonUl5 = document.getElementById('toRightButtonUl5');
    toRightButtonUl5.addEventListener('click', function(){
      let position = ul5.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -2055) {
        position = +position - 590;
        if(position < -2055) {
          position = -2055;
        };
        position = "translateX(" + position + "px)";
        ul5.style.transform = position;
      };
    });

    let ul6 = document.getElementById('ul6');
    let toLeftButtonUl6 = document.getElementById('toLeftButtonUl6');
    toLeftButtonUl6.addEventListener('click', function(){
      let position = ul6.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul6.style.transform = position;
      };
    });
    let toRightButtonUl6 = document.getElementById('toRightButtonUl6');
    toRightButtonUl6.addEventListener('click', function(){
      let position = ul6.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -780) {
        position = +position - 590;
        if(position < -780) {
          position = -780;
        };
        position = "translateX(" + position + "px)";
        ul6.style.transform = position;
      };
    });

    let ul7 = document.getElementById('ul7');
    let toLeftButtonUl7 = document.getElementById('toLeftButtonUl7');
    toLeftButtonUl7.addEventListener('click', function(){
      let position = ul7.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul7.style.transform = position;
      };
    });
    let toRightButtonUl7 = document.getElementById('toRightButtonUl7');
    toRightButtonUl7.addEventListener('click', function(){
      let position = ul7.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -1200) {
        position = +position - 590;
        if(position < -1200) {
          position = -1200;
        };
        position = "translateX(" + position + "px)";
        ul7.style.transform = position;
      };
    });

    let ul8 = document.getElementById('ul8');
    let toLeftButtonUl8 = document.getElementById('toLeftButtonUl8');
    toLeftButtonUl8.addEventListener('click', function(){
      let position = ul8.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul8.style.transform = position;
      };
    });
    let toRightButtonUl8 = document.getElementById('toRightButtonUl8');
    toRightButtonUl8.addEventListener('click', function(){
      let position = ul8.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -360) {
        position = +position - 590;
        if(position < -360) {
          position = -360;
        };
        position = "translateX(" + position + "px)";
        ul8.style.transform = position;
      };
    });

    let ul9 = document.getElementById('ul9');
    let toLeftButtonUl9 = document.getElementById('toLeftButtonUl9');
    toLeftButtonUl9.addEventListener('click', function(){
      let position = ul9.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul9.style.transform = position;
      };
    });
    let toRightButtonUl9 = document.getElementById('toRightButtonUl9');
    toRightButtonUl9.addEventListener('click', function(){
      let position = ul9.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -360) {
        position = +position - 590;
        if(position < -360) {
          position = -360;
        };
        position = "translateX(" + position + "px)";
        ul9.style.transform = position;
      };
    });

    let ul10 = document.getElementById('ul10');
    let toLeftButtonUl10 = document.getElementById('toLeftButtonUl10');
    toLeftButtonUl10.addEventListener('click', function(){
      let position = ul10.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul10.style.transform = position;
      };
    });
    let toRightButtonUl10 = document.getElementById('toRightButtonUl10');
    toRightButtonUl10.addEventListener('click', function(){
      let position = ul10.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -2055) {
        position = +position - 590;
        if(position < -2055) {
          position = -2055;
        };
        position = "translateX(" + position + "px)";
        ul10.style.transform = position;
      };
    });

    let ul11 = document.getElementById('ul11');
    let toLeftButtonUl11 = document.getElementById('toLeftButtonUl11');
    toLeftButtonUl11.addEventListener('click', function(){
      let position = ul11.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul11.style.transform = position;
      };
    });
    let toRightButtonUl11 = document.getElementById('toRightButtonUl11');
    toRightButtonUl11.addEventListener('click', function(){
      let position = ul11.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -360) {
        position = +position - 590;
        if(position < -360) {
          position = -360;
        };
        position = "translateX(" + position + "px)";
        ul11.style.transform = position;
      };
    });

    let ul12 = document.getElementById('ul12');
    let toLeftButtonUl12 = document.getElementById('toLeftButtonUl12');
    toLeftButtonUl12.addEventListener('click', function(){
      let position = ul12.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul12.style.transform = position;
      };
    });
    let toRightButtonUl12 = document.getElementById('toRightButtonUl12');
    toRightButtonUl12.addEventListener('click', function(){
      let position = ul12.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -360) {
        position = +position - 590;
        if(position < -360) {
          position = -360;
        };
        position = "translateX(" + position + "px)";
        ul12.style.transform = position;
      };
    });

    let ul13 = document.getElementById('ul13');
    let toLeftButtonUl13 = document.getElementById('toLeftButtonUl13');
    toLeftButtonUl13.addEventListener('click', function(){
      let position = ul13.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position != 0) {
        position = +position + 590;
        if(position > 0) {
          position = 0;
        };
        position = "translateX(" + position + "px)";
        ul13.style.transform = position;
      };
    });
    let toRightButtonUl13 = document.getElementById('toRightButtonUl13');
    toRightButtonUl13.addEventListener('click', function(){
      let position = ul13.style.transform;
      let skobka = position.indexOf('(');
      let px = position.indexOf('px');
      position = position.slice(skobka+1,px);
      if(position > -2055) {
        position = +position - 590;
        if(position < -2055) {
          position = -2055;
        };
        position = "translateX(" + position + "px)";
        ul13.style.transform = position;
      };
    });

    let content__genres__liArray = document.getElementsByClassName('content__genres__li');
    for (var i = 0; i < content__genres__liArray.length; i++) {
      content__genres__liArray[i].addEventListener('mouseover', function(){
        this.children[0].children[0].style.display = 'block';
        this.children[0].children[1].style.display = 'block';
        this.children[0].children[2].style.display = 'block';
      })
    }
    for (var i = 0; i < content__genres__liArray.length; i++) {
      content__genres__liArray[i].addEventListener('mouseout', function(){
        this.children[0].children[0].style.display = 'none';
        this.children[0].children[1].style.display = 'none';
        this.children[0].children[2].style.display = 'none';
      })
    }

    let content__yearArray = document.getElementsByClassName('content__year__element');
    for (var i = 0; i < content__yearArray.length; i++) {
      content__yearArray[i].addEventListener('mouseover', function(){
        this.children[0].children[0].style.display = 'block';
        this.children[0].children[1].style.display = 'block';
        this.children[0].children[2].style.display = 'block';
      })
    }
    for (var i = 0; i < content__yearArray.length; i++) {
      content__yearArray[i].addEventListener('mouseout', function(){
        this.children[0].children[0].style.display = 'none';
        this.children[0].children[1].style.display = 'none';
        this.children[0].children[2].style.display = 'none';
      })
    }
  </script>
                                                                                <!--Скрипты для метрик-->
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

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149359628-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-149359628-1');
  </script>

</body>
</html>
