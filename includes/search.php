<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style media="screen, print">
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
  <link rel="stylesheet" href="../css/style_new_design_v9.css">
  <link rel="shortcut icon" href="../images/favicon_for_line.ico" type="image/png">
  <link rel="cannonical" hreflang="ru" href="https://animesaver.ru/">
  <title>Поиск аниме на сайте | Animesaver</title>
  <meta name="description" content="Поиск аниме на Animesaver.ru"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <meta name="google-site-verification" content="_yyf1MpKF0VC1IK6_gsW4rDxrrsRNWtylmtxAADzVhE" /> <!--Код для googleConsole-->
  <script defer src="../scripts/homepagescripts_6.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>


    <header>                                                                    <!--Блок header-->
        <div class="header__navigation">
            <a href="https://animesaver.ru" class="header__navigation__first_a">
                <img src="../images/S-icon.png" alt="Изображение логотипа сайта">
                <h1 class="header__navigation__first_a__h1">AnimeSaver</h1>
            </a>
            <ul class="header__navigation__buttons">
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru">
                        <img src="../images/house.svg" alt="значок домика">
                        <span>Главная</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/catalogue">
                        <img src="../images/stack.svg" alt="значок каталога">
                        <span>Каталог</span>
                    </a>
                </li>
                <li class="header__navigation__buttons__li">
                    <a href="https://animesaver.ru/random">
                        <img src="../images/perspective-dice-six-faces-random.svg" alt="значок кубика">
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
                      <iframe src="../includes/autorisation.php"></iframe>
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
                    <img src="../images/magnifying-glass1.svg" alt="значок лупы">
                </button>
                <input type="text" size="17" maxlength="128" name="search" placeholder="Найти аниме">
            </form>
        </div>
    </header>


    <section class="main_section">                                              <!--Блок main_section-->

        <section class="content">                                               <!--Блок Контента main_section-->

            <section class="content__new" id="content__new">                    <!--Блок Контента Новое main_section-->
                <?php 
                    if (isset($_POST['search'])) { $search = $_POST['search']; if ($search == '') { unset($search);} }
                    //заносим введенное пользователем название аниме в переменную $search, если она пустая, то уничтожаем переменную
                    if (empty($search)) //если пользователь не ввел какие-либо данные, то выдаем ошибку и останавливаем скрипт
                  { ?>
                  <h3 style="text-align: center; width: 100%; font-family: 'Comfortaa-Regular'; font-size: 1.5em;">Видимо, ничего не написали, поэтому и показать нечего..</h3>
                  <?php } else {
                    //если поле заполнено, то обрабатываем, чтобы теги и скрипты не работали
                    $search = stripslashes($search);
                    $search = htmlspecialchars($search);
                    //удаляем лишние пробелы
                    $search = trim($search);
                    $search_array = mysqli_query($connection,"SELECT * FROM `anime` WHERE `title` LIKE '%$search%' OR `title_eng` LIKE '%$search%'");
                    $search_count_post = mysqli_query($connection, "SELECT COUNT(1) FROM `anime` WHERE `title` LIKE '%$search%' OR `title_eng` LIKE '%$search%'");
                    $search_count_get = mysqli_fetch_array($search_count_post);
                    $search_count = ceil($search_count_get[0]);
                  ?>
                  <h4 id="searchResultH4">По запросу "<?php echo $search ?>" нашлось результатов - <?php echo $search_count ?></h4>
                  <div class="content__new__flexbox">
                  <?php
                    while($search_result = mysqli_fetch_assoc($search_array)){ 
                  ?>
                    <div class="content__new__flexbox__element">
                        <div class="content__new__flexbox__element__div">
                            <a href="/<?php echo $search_result['link']; ?>">
                                <img src="<?php echo "../" . $search_result['main_img_sourse']; ?>" class="content__new__flexbox__element__div__img" alt="Изображение аниме">
                            </a>
                        </div>
                        <div class="content__new__flexbox__element__description">
                            <div class="content__new__flexbox__element__description__date">
                                <img src="../images/calendar.svg" alt="значок календаря">
                                <span><?php echo $search_result['update_date']; ?></span>
                            </div>
                            <a href="/<?php echo $search_result['link']; ?>">
                                <h3 class="content__new__flexbox__element__description_title"><?php echo $search_result['title']; ?></h3>
                            </a>
                            <br>
                            <br>
                            <div class="content__new__flexbox__element__description_series">
                                <a href="/<?php echo $anime_page_result['link']; ?>">
                                    <img src="../images/toggles.svg" alt="значок серий">
                                    Серии <?php echo $search_result['series'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } }?>
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
                            <img src="../images/logic-gate-xor.svg" alt="картинка ссылки на ВК журнал">
                            <span>VKontakte</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/animesaver.ru/">
                            <img src="../images/logic-gate-xor.svg" alt="Картинка ссылки на инстаграм">
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
                          <img src="../images/letter-bomb.svg" alt="Изображение написания письма администрации">
                          <span>Напишите нам</span>
                      </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/includes/privacy_policy.php">
                            <img src="../images/dragon-shield.svg" alt="Изображение политики конфиденциальности">
                            <span>Privacy policy</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://animesaver.ru/includes/disclaimer.php">
                            <img src="../images/dragon-shield.svg" alt="Изображение Отказа от ответственности">
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
                    <img src="../images/S-icon.png" alt="Изображение логотипа сайта">
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
          <img src="../images/save-arrow.svg" alt="Изображение стрелочки наверх">
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