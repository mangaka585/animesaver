<?php
include "includes/db.php";
$anime_page = mysqli_query($connection,"SELECT * FROM  `anime` ORDER BY `update_date` DESC LIMIT 0,66");
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
  <link rel="cannonical" href="https://animesaver.ru/">
  <title>Смотреть аниме онлайн бесплатно в хорошем качестве | Animesaver</title>
  <meta name="description" content="Только самые популярные аниме в хорошем качестве без рекламы можно посмотреть онлайн на Animesaver.ru - самом простом сайте по аниме в России! Без регистрации и совершенно бесплатно!"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <script defer src="scripts/homepagescripts.js" type="text/javascript"></script>
</head>
<body>


    <header>                                                                    <!--Блок header-->
        <div class="header__navigation">
            <a href="/" class="header__navigation__first_a">
                <img src="images/S-icon.png" alt="site logo" class="header__navigation__first_a__img">
                <h1 class="header__navigation__first_a__h1">AnimeSaver</h1>
            </a>
            <ul class="header__navigation__buttons">
                <li class="header__navigation__buttons__li__active">
                    <a href="https://animesaver.ru">
                        <img src="images/house.svg">
                        <span>Главная</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/catalogue">
                        <img src="images/stack.svg">
                        <span>Каталог</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/random">
                        <img src="images/perspective-dice-six-faces-random.svg">
                        <span>Случайное</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/includes/my_profile.php">
                        <img src="images/stars-stack.svg">
                        <span>Мой профиль</span>
                    </a>
                </li>
            </ul>
            <form>
                <button type="submit">
                    <img src="images/magnifying-glass1.svg">
                </button>
                <input type="text" size="17" placeholder="Найти аниме">
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
                        <img src="images/bowen-knot.svg"><span>Новое</span>
                    </a>
                </li>
                <li id="menuMagazineButton">
                    <a href="#weeklysaver">
                        <img src="images/conversation.svg"><span>Журнал</span>
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
                                <img src="<?php echo $anime_page_result['main_img_sourse']; ?>" class="content__new__flexbox__element__div__img">
                            </a>
                        </div>
                        <div class="content__new__flexbox__element__description">
                            <div class="content__new__flexbox__element__description__date">
                                <img src="images/calendar.svg">
                                <span><?php echo $anime_page_result['update_date']; ?></span>
                            </div>
                            <a href="/<?php echo $anime_page_result['link']; ?>">
                                <h3 class="content__new__flexbox__element__description_title"><?php echo $anime_page_result['title']; ?></h3>
                            </a>
                            <br>
                            <br>
                            <div class="content__new__flexbox__element__description_series">
                                <a href="/<?php echo $anime_page_result['link']; ?>">
                                    <img src="images/toggles.svg">
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
                              <img src="ws/magazine/samples/pages/fourth/1.jpg"><h3>Выпуск № 4</h3>
                          </a>
                      </div>
                      <div class="content__weeklysaver__left_side__flexbox__element" id="thirdMagazine">
                          <a href="https://animesaver.ru/ws/magazine/samples/third.html">
                              <img src="ws/magazine/samples/pages/third/1.jpg"><h3>Выпуск № 3</h3>
                          </a>
                      </div>
                      <div class="content__weeklysaver__left_side__flexbox__element" id="secondMagazine">
                          <a href="https://animesaver.ru/ws/magazine/samples/second.html">
                              <img src="ws/magazine/samples/pages/second/1.jpg"><h3>Выпуск № 2</h3>
                          </a>
                      </div>
                      <div class="content__weeklysaver__left_side__flexbox__element" id="firstMagazine">
                          <a href="https://animesaver.ru/ws/magazine/samples/index.html">
                              <img src="ws/magazine/samples/pages/first/1.jpg"><h3>Выпуск № 1</h3>
                          </a>
                      </div>
                    </div>
                </section>
                <section class="contect__weeklysaver__right_side" id="rightSideMagazine">
                    <h4 id="magazineH4">Наведите на выпуск</h4>
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
                            <img src="images/logic-gate-xor.svg">
                            <span>VKontakte</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/animesaver.ru/">
                            <img src="images/logic-gate-xor.svg">
                            <span>Instagram</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="links__div2">
                <h4 class="links__title">Полезные ссылки</h4>
                <ul class="links__ul">
                    <li>
                        <a href="https://animesaver.ru/contact_us.php">
                            <img src="images/letter-bomb.svg">
                            <span>Напишите нам</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/privacy_policy.php">
                            <img src="images/dragon-shield.svg">
                            <span>Privacy policy</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/disclaimer.php">
                            <img src="images/dragon-shield.svg">
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
                    <img src="images/S-icon.png">
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
      <a href="#">
          <img src="images/save-arrow.svg">
          <span>Наверх</span>
      </a>
  </div>
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
