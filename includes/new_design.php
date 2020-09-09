<?php
include "includes/db.php";
session_start();
$anime_page = mysqli_query($connection,"SELECT * FROM  `anime` ORDER BY `update_date` DESC LIMIT 0,66");
$tasksArray = mysqli_query($connection,"SELECT * FROM  `tasks` ORDER BY `date` DESC");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
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
  <link rel="stylesheet" href="css/style_new_design_v9.css">
  <link rel="shortcut icon" href="images/favicon_for_line.ico" type="image/png">
  <link rel="cannonical" hreflang="ru" href="https://animesaver.ru/">
  <title>Смотреть аниме онлайн бесплатно в хорошем качестве | Animesaver</title>
  <meta name="description" content="Только самые популярные аниме в хорошем качестве без рекламы можно посмотреть онлайн на Animesaver.ru - самом простом сайте по аниме в России! Без регистрации и совершенно бесплатно!"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <meta name="google-site-verification" content="_yyf1MpKF0VC1IK6_gsW4rDxrrsRNWtylmtxAADzVhE" /> <!--Код для googleConsole-->
  <script defer src="scripts/homepagescripts_v6.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>


    <header>                                                                    <!--Блок header-->
        <div class="header__navigation">
            <a href="https://animesaver.ru" class="header__navigation__first_a">
                <img src="images/S-icon.png" alt="Изображение логотипа сайта">
                <h1 class="header__navigation__first_a__h1">AnimeSaver</h1>
            </a>
            <ul class="header__navigation__buttons">
                <li class="header__navigation__buttons__li__active">
                    <a href="https://animesaver.ru">
                        <img src="images/house.svg" alt="значок домика">
                        <span>Главная</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
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

        <section class="main_section__menu">                                    <!--Блок Меню main_section-->
            <div class="main_section__menu__hidden_line">
                <br>
            </div>
            <ul class="main_section__menu__buttons">
                <li class="main_section__menu__buttons__active" id="menuNewButton">
                    <a href="#new">
                        <img src="images/bowen-knot.svg" alt="значок Нового"><span>Новое</span>
                    </a>
                </li>
                <li id="menuMagazineButton">
                    <a href="#weeklysaver">
                        <img src="images/conversation.svg" alt="значок журнала"><span>Журнал</span>
                    </a>
                </li>
                <li id="menuTasksButton">
                    <a href="#tasks">
                        <img src="images/envelope.svg" alt="значок Заявок"><span>Заявки</span>
                    </a>
                </li>
            </ul>
        </section>

        <section class="content">                                               <!--Блок Контента main_section-->

            <section class="content__new" id="content__new">                    <!--Блок Контента Новое main_section-->
                <div class="content__new__fake_br">
                    <br>
                </div>
                <div class="content__new__flexbox">
                <?php while($anime_page_result = mysqli_fetch_assoc($anime_page)){ ?>
                    <div class="content__new__flexbox__element">
                        <div class="content__new__flexbox__element__div">
                            <a href="/<?php echo $anime_page_result['link']; ?>">
                                <img src="<?php echo $anime_page_result['main_img_sourse']; ?>" class="content__new__flexbox__element__div__img" alt="Изображение аниме">
                            </a>
                        </div>
                        <div class="content__new__flexbox__element__description">
                            <div class="content__new__flexbox__element__description__date">
                                <img src="images/calendar.svg" alt="значок календаря">
                                <span><?php echo $anime_page_result['update_date']; ?></span>
                            </div>
                            <a href="/<?php echo $anime_page_result['link']; ?>">
                                <h3 class="content__new__flexbox__element__description_title"><?php echo $anime_page_result['title']; ?></h3>
                            </a>
                            <br>
                            <br>
                            <div class="content__new__flexbox__element__description_series">
                                <a href="/<?php echo $anime_page_result['link']; ?>">
                                    <img src="images/toggles.svg" alt="значок серий">
                                    Серии <?php echo $anime_page_result['series'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </section>

            <section class="content__weeklysaver" id="content__weeklysaver">    <!--Блок Контента Журнал main_section-->
              <br>
              <section class="content__weeklysaver__left_side">
                <div class="content__weeklysaver__left_side__flexbox">
                  <div class="content__weeklysaver__left_side__flexbox__element" id="fourthMagazine">
                    <a href="https://animesaver.ru/ws/magazine/samples/fourth.html">
                      <img src="ws/magazine/samples/pages/fourth/1.jpg" alt="Изображение выпуска 4"><h3>Выпуск № 4</h3>
                    </a>
                  </div>
                  <div class="content__weeklysaver__left_side__flexbox__element" id="thirdMagazine">
                    <a href="https://animesaver.ru/ws/magazine/samples/third.html">
                      <img src="ws/magazine/samples/pages/third/1.jpg" alt="Изображение выпуска 3"><h3>Выпуск № 3</h3>
                    </a>
                  </div>
                  <div class="content__weeklysaver__left_side__flexbox__element" id="secondMagazine">
                    <a href="https://animesaver.ru/ws/magazine/samples/second.html">
                      <img src="ws/magazine/samples/pages/second/1.jpg" alt="Изображение выпуска 2"><h3>Выпуск № 2</h3>
                    </a>
                  </div>
                  <div class="content__weeklysaver__left_side__flexbox__element" id="firstMagazine">
                    <a href="https://animesaver.ru/ws/magazine/samples/index.html">
                      <img src="ws/magazine/samples/pages/first/1.jpg" alt="Изображение выпуска 1"><h3>Выпуск № 1</h3>
                    </a>
                  </div>
                </div>
              </section>
              <section class="contect__weeklysaver__right_side" id="rightSideMagazine">
                <h4 id="magazineH4">Наведите на выпуск</h4>
              </section>
            </section>

            <section class="content__tasks" id="content__tasks">                <!--Блок Заявок main_section-->
              <br>
              <h4>Заявки на добавление / обновление контента</h4>
              <table id="takskTable">
                <tr id="tasksTableTr">
                  <td class="tasksTableTrTd1">Автор</td>
                  <td class="tasksTableTrTd2">Содержание</td>
                  <td class="tasksTableTrTd3">Статус</td>
                </tr>
                <?php while($task = mysqli_fetch_assoc($tasksArray)){ ?>
                  <tr>
                    <td class="tasksTableTrTd11">
                      <?php
                        $userIdPre = $task['user_id'];
                        $userArray = mysqli_query($connection,"SELECT * FROM `users` WHERE `id` = $userIdPre");
                        $userId = mysqli_fetch_assoc($userArray);
                        ?>
                      <img src="images/avatars/<?php echo $userId['avatar'];?>" alt="Аватарка пользователя">
                      <span><?php echo $userId['login'];?></span>
                    </td>
                    <td class="tesksTableTrTd22"><?php echo $task['text']; ?></td>
                    <td class="tasksTableTrTd33"><?php echo $task['status']; ?></td>
                  </tr>
                <?php } ?>
              </table>
                  <?php 
                  if(empty($_SESSION['login'])) {?>
                    <p class="no_login">Авторизуйтесь, чтобы сделать заявку</p>
                  <?php } else { 
                    $login = $_SESSION['login'];
                    $user_id_array = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` LIKE '$login'");
                    $user_id_full = mysqli_fetch_assoc($user_id_array); ?>
                    <div class="addTasks">
                      <div class="addTasks__leftSide">
                        <img src="images/avatars/<?php echo $user_id_full['avatar']; ?>" alt="Аватарка пользователя">
                      </div>
                      <div class="addTasks__rightSide">
                        <form method="post" id="ajax_formTask" action="">   
                          <textarea rows="5" cols="100" name="text" placeholder="Здесь можно ввести текст заявки" class="textarea"></textarea>
                          <input type="text" name="user_id" value="<?php echo $user_id_full['id']; ?>" style="display: none;">
                          <input type="submit" onclick="event.preventDefault()" value="Отправить" class="submit" id="submit">
                        </form>
                      </div>
                    <?php } ?>
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
