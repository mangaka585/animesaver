<?php
session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

include("db.php");

$result = mysqli_query($connection, "SELECT * FROM users WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
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
  <link rel="stylesheet" href="../css/style_myPage_v25.css">
  <link rel="shortcut icon" href="../images/favicon_for_line.ico" type="image/png">
  <title>Ошибка авторизации | Animesaver</title>
  <meta name="description" content="Ошибка авторизации на Animesaver.ru"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <script defer src="../scripts/myPage_v20.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>


    <header>                                                                    <!--Блок header-->
        <div class="header__navigation">
            <a href="https://animesaver.ru" class="header__navigation__first_a">
                <img src="../images/S-icon.png" class="header__navigation__first_a__img" alt="Изображение логотипа сайта">
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
                <li class="header__navigation__buttons__li__active">
                  <a href="https://animesaver.ru/includes/my_profile.php">
                      <img src="../images/stars-stack.svg" alt="значок личного кабинета">
                      <span>Мой профиль</span>
                  </a>
                </li>
            </ul>
            <form action="../includes/search.php" method="post" target="_top" class="search">
                <button type="submit" name="submit" title="Найти">
                    <img src="../images/magnifying-glass1.svg" alt="значок лупы">
                </button>
                <input type="text" size="17" maxlength="128" name="search" placeholder="Найти аниме">
            </form>
        </div>
    </header>


    <section class="main_section">                                              <!--Блок main_section-->

        <section class="content">                                               <!--Блок Контента main_section-->
          <br>
          <br>
          <?php
                if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль
                { ?>
                    <h2 class="welldone_h2">Вы ввели не всю информацию</h2>
                    <div class="dabbing_wrong"><img src="../images/wrong_password.png" alt="dabbing pic" /></div>
                    </br>
                    <div class="iframe_class">
                        <iframe src="autorisation.php" class="entry_frame">></iframe>
                    </div>
                <?php }

                else if (empty($myrow['password']))
                {
                    //если пользователя с введенным логином не существует ?>
                    <h2 class="welldone_h2">Введённый логин или пароль неверный</h2>
                    <div class="dabbing_wrong"><img src="../images/wrong_password.png" alt="dabbing pic" /></div>
                    </br>
                    <div class="iframe_class">
                        <iframe src="autorisation.php" class="entry_frame">></iframe>
                    </div>
                <?php }
                else {
                    //если существует, то сверяем пароли
                    if ($myrow['password']==$password) {
                        //если пароли совпадают, то запускаем пользователю сессию!
                        $_SESSION['login']=$myrow['login'];
                        $_SESSION['id']=$myrow['id'];
                        header("Location: https://animesaver.ru/includes/my_profile.php");
                        exit;
                    } else {
                        //если пароли не сошлись
                        ?>
                    <h2 class="welldone_h2">Введённый вами пароль неверный</h2>
                    <div class="dabbing_wrong"><img src="../images/wrong_password.png" alt="dabbing pic" /></div>
                    </br>
                    <div class="iframe_class">
                        <iframe src="autorisation.php" class="entry_frame"></iframe>
                    </div>
                    <?php }
                }
                ?>
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