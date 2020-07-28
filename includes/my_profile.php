<?php session_start(); 
include "db.php";
if (empty($_SESSION['login'])) {
  echo "Вы не авторизованы, доступ запрещен";
  die(); 
} else { 
    $login = $_SESSION['login'];
    $user_id_array = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` LIKE '$login'");
    $user_id_full = mysqli_fetch_assoc($user_id_array);
    $user_id = (int) $user_id_full['id'];
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
  <title>Моя страница | Animesaver</title>
  <meta name="description" content="Моя страница на Animesaver.ru"/>
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

          <section class="profileInfo">
            <div class="profileInfo__leftSide" id="avatar">
                <img src="<?php if($user_id_full['avatar'] == null) {echo '../images/avatars/avatar.jpg';} else {
                      echo "../images/avatars/".$user_id.".jpg";
                    }?>" alt="Фотография пользователя">
                <form action="upload_avatar.php" method="post" enctype="multipart/form-data" class="upload_avatar" id="upload_avatar" target="_blank">
                  <input type="file" name="filename" title="Файл должен быть квадратным, формата JPG и весить не более двух мегабайт">
                  <input type="text" name="user_id" value="<?php echo $user_id; ?>" style="display: none;">
                  <br>
                  <input type="submit" value="Обновить аватар" class="update_avatar" id="uploadAvatarButton">
                  <br>
                </form>
            </div>
            <div class="profileInfo__rightSide" id="profileInfo__rightSide">
              <div class="login"><?php echo $user_id_full['login'];?></div>
              <hr>
              <div class="profileInfo__rightSide__mainInfo">
                <div class="profileInfo__rightSide__mainInfo__leftSide">
                  <ul>
                    <li>Фамилия:</li>
                    <li>Имя:</li>
                    <li>Отчество:</li>
                    <li>Дата рождения:</li>
                    <li>Город:</li>
                    <li>E-mail:</li>
                    <br>
                    <li>Просмотрено аниме:</li>
                  </ul>
                </div>
                <div class="profileInfo__rightSide__mainInfo__rightSide">
                  <ul>
                    <li><?php if($user_id_full['surname'] == null) {echo "Неизвестно";} else {echo $user_id_full['surname'];}?></li>
                    <li><?php if($user_id_full['name'] == null) {echo "Неизвестно";} else {echo $user_id_full['name'];}?></li>
                    <li><?php if($user_id_full['fathername'] == null) {echo "Неизвестно";} else {echo $user_id_full['fathername'];}?></li>
                    <li id="birth"><?php echo $user_id_full['birth'];?></li>
                    <li><?php if($user_id_full['city'] == null) {echo "Неизвестный";} else {echo $user_id_full['city'];}?></li>
                    <li><?php if($user_id_full['email'] == null) {echo "Неизвестно";} else {echo $user_id_full['email'];}?></li>
                    <br>
                    <li id="watchedcount"><?php $a = mysqli_query($connection,"SELECT COUNT(1) FROM `watched_anime` WHERE `user_id` = $user_id");
                        $b = mysqli_fetch_array( $a );
                        echo $b[0]; ?></li>
                  </ul>
                </div>
                <button id="change_info">Редактировать</button>
              </div>
            </div>
          </section>

          <section class="edit_info" id="editInfo">
            <div class="edit_info__leftSide">
              <ul>
                <li>Фамилия:</li>
                <li>Имя:</li>
                <li>Отчество:</li>
                <li>Город:</li>
              </ul>
            </div>
            <form class="editInfo__form" method="post" id="ajax_form" action="">
              <input type="text" name="surname" value="<?php if($user_id_full['surname'] == null) {echo "Неизвестно";} else {echo $user_id_full['surname'];}?>"><br>
              <input type="text" name="name" value="<?php if($user_id_full['name'] == null) {echo "Неизвестно";} else {echo $user_id_full['name'];}?>"><br>
              <input type="text" name="fathername" value="<?php if($user_id_full['fathername'] == null) {echo "Неизвестно";} else {echo $user_id_full['fathername'];}?>"><br>
              <input type="text" name="city" value="<?php if($user_id_full['city'] == null) {echo "Неизвестно";} else {echo $user_id_full['city'];}?>"><br>
              <input type="text" name="id" value="<?php echo $user_id_full['id'];?>" style="display: none;">
              <input type="submit" onclick="event.preventDefault()" value="Сохранить" id="save">
              <input type="submit" onclick="event.preventDefault()" value="Отменить" id="cancel">
            </form>
            <div id="result_form" style="display: none;"></div>
          </section>

          <section class="favoritesAnime">
            <h3>Избранные аниме</h3>
            <table>
              <tbody>
                <tr class="trChapter">
                  <td class="tableTd1">Наименование</td>
                  <td class="tableTd2">Год</td>
                  <td class="tableTd3">Рейтинг</td>
                </tr>
                <?php $favorites_anime_array = mysqli_query($connection,"SELECT * FROM `favorites_anime` WHERE `user_id` = $user_id");
                  while($favorites_anime = mysqli_fetch_assoc($favorites_anime_array)) {
                          $favoritesanime_id = (int) $favorites_anime['anime_id'];
                          $favoritesanime_array = mysqli_query($connection, "SELECT * FROM `anime` WHERE `id` LIKE '$favoritesanime_id'");
                          $favoritesanime = mysqli_fetch_assoc($favoritesanime_array);?>
                  <tr>
                    <td class="tableTd1"><a href="../<?php echo $favoritesanime['link'];?>"><?php echo $favoritesanime['title']; ?></a></td>
                    <td class="tableTd2"><a href="../<?php echo $favoritesanime['link'];?>"><?php echo $favoritesanime['year']; ?></a></td>
                    <td class="tableTd3"><a href="../<?php echo $favoritesanime['link'];?>"><?php echo $favoritesanime['IMDb']; ?></a></td>
                  </tr>
              <?php } ?>
              </tbody>
            </table>
          </section>
          <br>
          <br>
          <section class="watchedAnime">
            <h3>Просмотренные аниме</h3>
            <table>
              <tbody>
                <tr class="trChapter">
                  <td class="tableTd1">Наименование</td>
                  <td class="tableTd2">Год</td>
                  <td class="tableTd3">Рейтинг</td>
                </tr>
                <?php $watched_anime_array = mysqli_query($connection,"SELECT * FROM `watched_anime` WHERE `user_id` = $user_id");
                  while($watched_anime = mysqli_fetch_assoc($watched_anime_array)) {
                          $watchedanime_id = (int) $watched_anime['anime_id'];
                          $watchedanime_array = mysqli_query($connection, "SELECT * FROM `anime` WHERE `id` LIKE '$watchedanime_id'");
                          $watchedanime = mysqli_fetch_assoc($watchedanime_array);?>
                  <tr>
                    <td class="tableTd1"><a href="../<?php echo $watchedanime['link'];?>"><?php echo $watchedanime['title']; ?></a></td>
                    <td class="tableTd2"><a href="../<?php echo $watchedanime['link'];?>"><?php echo $watchedanime['year']; ?></a></td>
                    <td class="tableTd3"><a href="../<?php echo $watchedanime['link'];?>"><?php echo $watchedanime['IMDb']; ?></a></td>
                  </tr>
              <?php } ?>
              </tbody>
            </table>
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
<?php } ?>