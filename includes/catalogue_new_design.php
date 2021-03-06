<?php
include "includes/db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <link rel="alternate" hreflang="ru" href="https://animesaver.ru/catalogue" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style media="screen, print">
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
  <link rel="stylesheet" href="css/style_new_catalogue_v19.css">
  <link rel="shortcut icon" href="images/favicon_for_line.ico" type="image/png">
  <title>Каталог | Animesaver</title>
  <meta name="description" content="Каталог популярных аниме, которые можно посмотреть онлайн на Animesaver.ru - самом простом сайте по аниме в России! Без регистрации и совершенно бесплатно!"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <script defer src="scripts/cataloguescripts_v10.js"></script>
</head>
<body>


    <header>                                                                    <!--Блок header-->
        <div class="header__navigation">
            <a href="https://animesaver.ru" class="header__navigation__first_a">
                <img src="images/S-icon.png" class="header__navigation__first_a__img" alt="Изображение логотипа сайта">
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
                    <iframe src="includes/autorisation.php"></iframe>
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
                  <li class="main_section__menu__buttons__active" id="menuGenres_mobile">
                      <a href="#genres">
                          <img src="images/settings-knobs.svg" alt="значок Жанров"><span>Жанры</span>
                      </a>
                  </li>
                  <li class="main_section__menu__buttons" id="menuYear_mobile">
                      <a href="#year">
                          <img src="images/time-trap.svg" alt="значок Времени"><span>Год выпуска</span>
                      </a>
                  </li>
              </ul>
          </section>

          <section id="main_section__menu__genres">
          <section class="main_section__menu__genres__all_genres">
              <ul>
                  <?php
                  $genreslist = mysqli_query($connection, "SELECT * FROM `categories`");
                  while($genres = mysqli_fetch_assoc($genreslist)) {
                  ?>
                  <li><a href="/genres=<?php echo $genres['id']?>"><?php echo $genres['title'] ?></a></li>
                  <?php } ?>
              </ul>
          </section>
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
                        <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                      <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                      <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
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
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

        </section>

        <section id="main_section__menu__genres_mobile">
          <section>
              <h3>Приключения</h3>
              <div class="content__genres">
                <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
                <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
                <ul>
                  <?php
                  $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 1 OR `categories_2_id` = 1 OR `categories_3_id` = 1 ORDER BY `update_date` DESC LIMIT 0,14");
                  while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                    <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                      <a href="/<?php echo $adveture['link']; ?>">
                        <h5><?php echo $adveture['title']; ?></h5>
                      </a>
                    </li>
                  <?php } ?>
                  <li class="content__genres__li_end">
                    <a href="/genres=1">
                      <img src="images/select.svg" alt="Иконка проваливания в жанры">
                      <span>Ещё<br>...</span>
                    </a>
                  </li>
                </ul>
              </div>
          </section>

        <section>
            <h3>Романтика</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
              <ul>
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 2 OR `categories_2_id` = 2 OR `categories_3_id` = 2 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=2">
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
        </section>

        <section>
            <h3>Комедия</h3>
            <div class="content__genres">
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
              <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
              <ul>
                <?php
                $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 3 OR `categories_2_id` = 3 OR `categories_3_id` = 3 ORDER BY `update_date` DESC LIMIT 0,14");
                while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                  <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                    <a href="/<?php echo $adveture['link']; ?>">
                      <h5><?php echo $adveture['title']; ?></h5>
                    </a>
                  </li>
                <?php } ?>
                <li class="content__genres__li_end">
                  <a href="/genres=3">
                    <img src="images/select.svg" alt="Иконка проваливания в жанры">
                    <span>Ещё<br>...</span>
                  </a>
                </li>
              </ul>
            </div>
        </section>

        <section>
          <h3>Драма</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 4 OR `categories_2_id` = 4 OR `categories_3_id` = 4 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=4">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Фэнтэзи</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 6 OR `categories_2_id` = 6 OR `categories_3_id` = 6 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=6">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Повседневность</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 7 OR `categories_2_id` = 7 OR `categories_3_id` = 7 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=7">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Школа</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 9 OR `categories_2_id` = 9 OR `categories_3_id` = 9 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=9">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Детектив</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 13 OR `categories_2_id` = 13 OR `categories_3_id` = 13 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=13">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Ужасы</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 14 OR `categories_2_id` = 14 OR `categories_3_id` = 14 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=14">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Экшен</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 15 OR `categories_2_id` = 15 OR `categories_3_id` = 15 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=15">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Психология</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 17 OR `categories_2_id` = 17 OR `categories_3_id` = 17 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=17">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Сверхъестественное</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 18 OR `categories_2_id` = 18 OR `categories_3_id` = 18 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=18">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

        <section>
          <h3>Боевые искусства</h3>
          <div class="content__genres">
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
            <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
            <ul>
              <?php
              $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `categories_1_id` = 22 OR `categories_2_id` = 22 OR `categories_3_id` = 22 ORDER BY `update_date` DESC LIMIT 0,14");
              while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                  <a href="/<?php echo $adveture['link']; ?>">
                    <h5><?php echo $adveture['title']; ?></h5>
                  </a>
                </li>
              <?php } ?>
              <li class="content__genres__li_end">
                <a href="/genres=22">
                  <img src="images/select.svg" alt="Иконка проваливания в жанры">
                  <span>Ещё<br>...</span>
                </a>
              </li>
            </ul>
          </div>
        </section>

      </section>

        <section id="main_section__menu__year">
            <section class="main_section__menu__genres__all_genres">
                <ul>
                    <li><a href="/year=2020">2020</a></li>
                    <li><a href="/year=2019">2019</a></li>
                    <li><a href="/year=2018">2018</a></li>
                    <li><a href="/year=2017">2017</a></li>
                    <li><a href="/year=2016">2016</a></li>
                    <li><a href="/year=2015">2015</a></li>
                    <li><a href="/year=2014">2014</a></li>
                    <li><a href="/year=2013">2013</a></li>
                    <li><a href="/year=2012">2012</a></li>
                    <li><a href="/year=2011">2011</a></li>
                    <li><a href="/year=2010">2010</a></li>
                    <li><a href="/year=2009">2009</a></li>
                    <li><a href="/year=2007">2007</a></li>
                    <li><a href="/year=2006">2006</a></li>
                    <li><a href="/year=2003">2003</a></li>
                    <li><a href="/year=2002">2002</a></li>
                    <li><a href="/year=2001">2001</a></li>
                    <li><a href="/year=1999">1999</a></li>
                    <li><a href="/year=1995">1995</a></li>
                </ul>
            </section>
            <section>
                <h3>2020</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButton_ul1"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButton_ul1"/>
                    <ul id="ul1_1">
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2020 ORDER BY `update_date` DESC LIMIT 0,14");
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
                            <a href="/year=2020">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2019</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButton_ul2"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButton_ul2"/>
                    <ul id="ul1_2">
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2019 ORDER BY `update_date` DESC LIMIT 0,14");
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
                            <a href="/year=2019">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2018</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButton_ul3"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButton_ul3"/>
                    <ul id="ul1_3">
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2018 ORDER BY `update_date` DESC LIMIT 0,14");
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
                            <a href="/year=2018">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2017</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft" id="toLeftButton_ul4"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight" id="toRightButton_ul4"/>
                    <ul id="ul1_4">
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2017 ORDER BY `update_date` DESC LIMIT 0,14");
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
                            <a href="/year=2017">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </section>

        <section id="main_section__menu__year_mobile">
            <section>
                <h3>2020</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
                    <ul>
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2020 ORDER BY `update_date` DESC LIMIT 0,14");
                        while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                            <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                                <a href="/<?php echo $adveture['link']; ?>">
                                    <h5><?php echo $adveture['title']; ?></h5>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="content__genres__li_end">
                            <a href="/year=2020">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2019</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
                    <ul>
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2019 ORDER BY `update_date` DESC LIMIT 0,14");
                        while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                            <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                                <a href="/<?php echo $adveture['link']; ?>">
                                    <h5><?php echo $adveture['title']; ?></h5>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="content__genres__li_end">
                            <a href="/year=2019">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2018</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
                    <ul>
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2018 ORDER BY `update_date` DESC LIMIT 0,14");
                        while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                            <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                                <a href="/<?php echo $adveture['link']; ?>">
                                    <h5><?php echo $adveture['title']; ?></h5>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="content__genres__li_end">
                            <a href="/year=2018">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2017</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
                    <ul>
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2017 ORDER BY `update_date` DESC LIMIT 0,14");
                        while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                            <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                                <a href="/<?php echo $adveture['link']; ?>">
                                    <h5><?php echo $adveture['title']; ?></h5>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="content__genres__li_end">
                            <a href="/year=2017">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2016</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
                    <ul>
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2016 ORDER BY `update_date` DESC LIMIT 0,14");
                        while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                            <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                                <a href="/<?php echo $adveture['link']; ?>">
                                    <h5><?php echo $adveture['title']; ?></h5>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="content__genres__li_end">
                            <a href="/year=2016">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section>
                <h3>2015</h3>
                <div class="content__genres">
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toLeft"/>
                    <img src="images/save-arrow.svg" alt="Стрелка прокрутки аниме" class="content__genres__toRight"/>
                    <ul>
                        <?php
                        $adventuresArray = mysqli_query($connection,"SELECT * FROM `anime` WHERE `year` = 2015 ORDER BY `update_date` DESC LIMIT 0,14");
                        while($adveture = mysqli_fetch_assoc($adventuresArray)) { ?>
                            <li class="content__genres__li" style="background: url('<?php echo $adveture["main_img_sourse"]; ?>') 100% 100% no-repeat;background-size: 150px 220px;">
                                <a href="/<?php echo $adveture['link']; ?>">
                                    <h5><?php echo $adveture['title']; ?></h5>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="content__genres__li_end">
                            <a href="/year=2015">
                                <img src="images/select.svg" alt="Иконка проваливания в года">
                                <span>Ещё<br>...</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
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
                                                                                <!--Скрипты для метрик-->
  <script>
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
