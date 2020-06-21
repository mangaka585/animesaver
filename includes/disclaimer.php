<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="ru">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style_privacyPolicy.css">
  <link rel="shortcut icon" href="../images/favicon_for_line.ico" type="image/png">
  <title>Disclaimer | Animesaver</title>
  <meta name="description" content="Disclaimer Animesaver.ru"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <style type="text/css" media="screen, print">
    @font-face {
      font-family: "Comfortaa-Regular";
      src: url("../fonts/Comfortaa-Regular.ttf");
    }
    @font-face {
      font-family: "Oswald";
      src: url("../fonts/Oswald-VariableFont_wght.ttf") format("truetype");
      src: url("../fonts/Oswald-Regular.otf") format("opentype");
      font-weight: normal;
      font-style: normal;
    }
  </style>
</head>
<body>


    <header>                                                                    <!--Блок header-->
        <div class="header__navigation">
            <a href="https://animesaver.ru" class="header__navigation__first_a">
                <img src="../images/S-icon.png" alt="site logo" class="header__navigation__first_a__img">
                <h1 class="header__navigation__first_a__h1">AnimeSaver</h1>
            </a>
            <ul class="header__navigation__buttons">
                <li class="header__navigation__buttons__li__active">
                    <a href="https://animesaver.ru">
                        <img src="../images/house.svg">
                        <span>Главная</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/catalogue">
                        <img src="../images/stack.svg">
                        <span>Каталог</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/random">
                        <img src="../images/perspective-dice-six-faces-random.svg">
                        <span>Случайное</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <?php if(empty($_SESSION['login'])) { ?>
                    <a id="autorisation" onclick="showWindow()">
                      <img src="../images/stars-stack.svg" alt="значок личного кабинета">
                      <span>Мой профиль</span>
                    </a>
                    <div id="autorisation_window">
                      <iframe src="autorisation.php">
                          Ваш браузер не поддерживает плаваюшие фреймы!
                      </iframe>
                    </div>

                    <?php } else {?>
                    <a href="https://animesaver.ru/includes/my_profile.php">
                        <img src="../images/stars-stack.svg" alt="значок личного кабинета">
                        <span>Мой профиль</span>
                    </a>
                    <?php } ?>
                </li>
            </ul>
            <form action="search.php" method="post" target="_top" class="search">
                <button type="submit" name="submit" title="Найти">
                    <img src="../images/magnifying-glass1.svg">
                </button>
                <input type="text" size="17" maxlength="128" name="search" placeholder="Найти аниме">
            </form>
        </div>
    </header>


    <section class="main_section">                                              <!--Блок main_section-->

      <section class="main_section__privacy_policy">
        <br>
        <br>
        <h2>Отказ от ответственности</h2>
        <br>
        <p>Мы не утверждаем, что являемся создателями аниме-сериалов. Мы абсолютно не участвовали ни в каком создании аниме-сериалов, а просто преданные фанаты различных аниме-сериалов, которые нашли время для создания этого сайта. Ни один из видеоконтента данного веб-сайта не размещен на наших серверах или на серверах наших сотрудников, членов семьи или иным образом связан каким-либо образом. Если не указано иное, весь видеоконтент загружается и размещается на серверах третьих сторон, так называемых веб-сайтов для обмена видео. В случае нарушения авторских прав или любого другого вопроса, пожалуйста, свяжитесь напрямую с ответственными лицами. Animesaver.ru просто функционирует как платформа для распространения аниме культуры в России. Тем не менее, animesaver.ru твердо верит в защиту интеллектуальной собственности и будет готов помочь, когда это возможно и применимо. Пользователи, которые загружают на эти сайты, соглашаются не загружать нелегальный контент при создании своих учетных записей. animesaver.com не несет ответственности за контент, размещенный на сторонних веб-сайтах, а также мы сами не загружаем видео и не призываем других делать это. Аниме-видео транслируются непосредственно из сторонних сервисов обмена видео. Мы здесь для того, чтобы поощрять продолжающуюся популярность японского аниме и для того, чтобы многие зрители смотрели его. Все остальные торговые марки, логотипы и изображения являются собственностью их соответствующих и законных владельцев.</p>
        <br>
    </section>

        <section class="links">                                                 <!--Блок Links main_section-->
            <div class="links__div1">
                <h4 class="links__title">Социальные сети</h4>
                <ul class="links__ul">
                    <li>
                        <a href="https://vk.com/weeklysaver">
                            <img src="../images/logic-gate-xor.svg">
                            <span>VKontakte</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/animesaver.ru/">
                            <img src="../images/logic-gate-xor.svg">
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
                            <img src="../images/letter-bomb.svg">
                            <span>Напишите нам</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/includes/privacy_policy.php">
                            <img src="../images/dragon-shield.svg">
                            <span>Privacy policy</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/includes/disclaimer.php">
                            <img src="../images/dragon-shield.svg">
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
                    <img src="../images/S-icon.png">
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

</body>
</html>
