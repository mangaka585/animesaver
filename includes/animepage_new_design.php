<?php
include "includes/db.php";
session_start();
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
  <link rel="alternate" hreflang="ru" href="https://animesaver.ru/<?php echo $r1['link']; ?>" />
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
  <link rel="stylesheet" href="css/style_new_animepage_v10.css">
  <link rel="shortcut icon" href="images/favicon_for_line.ico" type="image/png">
  <title><?php echo $r1['title']; ?> | Animesaver</title>
  <meta name="description" content="Аниме <?php echo $r1['title']; ?>  смотреть онлайн бесплатно без регистрации в хорошем качестве"/>
  <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
  <script defer src="scripts/animepagescripts_v9.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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
        <h3 class="main_section__h3">Смотреть аниме <?php echo $r1['description_2'];?> онлайн</h3>

        <section class="main_section__anime">                                   <!--Блок описания аниме-->
            <section class="main_section__anime__info">
                <div class="main_section__anime__info__img">
                    <img src="<?php echo $r1['main_img_sourse']; ?>" alt="Аватарка аниме">
                </div>
                <div class="main_section__anime__info__description">
                    <img src="<?php
                        $login = $_SESSION['login'];
                        $anime_id = $r1['id'];
                        $user_id_array = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` LIKE '$login'");
                        $user_id_full = mysqli_fetch_assoc($user_id_array);
                        $user_id = (int) $user_id_full['id'];
                        $check_favorites_anime = mysqli_query($connection, "SELECT COUNT(*) FROM `favorites_anime` WHERE `user_id` = $user_id AND `anime_id` = $anime_id");
                        $check_favorites_anime_last = mysqli_fetch_array($check_favorites_anime);
                        $check_favorites_anime_finish = (int) $check_favorites_anime_last[0];
                        if (empty($_SESSION['login']) || ($check_favorites_anime_finish == 0)) {
                            echo "images/round-star.svg";
                            } else {
                            echo "images/round-star_done.svg";
                        } ?>" id="addToFavorites" title="<?php if (empty($_SESSION['login']) || ($check_favorites_anime_finish == 0)) {
                            echo "Добавить в избранное";
                        } else {
                            echo "Удалить из избранного";
                        }?>" alt="Добавить/удалить избранное">
                        <form method="post" id="ajax_form" action="" style="display: none;">
                            <input type="text" name="user_id" value="<?php echo $user_id; ?>" />
                            <input type="text" name="anime_id" value="<?php echo $r1['id']; ?>" />
                            <input type="text" name="action" value="<?php if(empty($_SESSION['login'])) {echo "none"; } else if($check_favorites_anime_finish == 0) {echo "add";} else {echo "delete";} ?>" id="addOrDelete"/>
                        </form>
                        <div id="result_form" style="display: none;"></div>
                        <img src="<?php
                        $check_watched_anime = mysqli_query($connection, "SELECT COUNT(*) FROM `watched_anime` WHERE `user_id` = $user_id AND `anime_id` = $anime_id");
                        $check_watched_anime_last = mysqli_fetch_array($check_watched_anime);
                        $check_watched_anime_finish = (int) $check_watched_anime_last[0];
                        if (empty($_SESSION['login']) || ($check_watched_anime_finish == 0)) {
                            echo "images/ice-iris.svg";
                        } else {
                            echo "images/ice-iris_donee.svg";
                        } ?>" id="addToWatched" title="<?php if (empty($_SESSION['login']) || ($check_watched_anime_finish == 0)) {
                            echo "Добавить в просмотренное";
                        } else {
                            echo "Удалить из просмотренного";
                        }?>" alt="Добавить/удалить просмотренное">
                        <form method="post" id="ajax_forme" action="" style="display: none;">
                            <input type="text" name="user_id" value="<?php echo $user_id; ?>" />
                            <input type="text" name="anime_id" value="<?php echo $r1['id']; ?>" />
                            <input type="text" name="action" value="<?php if(empty($_SESSION['login'])) {echo "none"; } else if($check_favorites_anime_finish == 0) {echo "add";} else {echo "delete";} ?>" id="addOrDelete_1"/>
                        </form>
                        <div id="result_forme" style="display: none;"></div>
                    <h2 class="main_section__anime__info__description_title"><?php echo $r1['title'];?></h2>
                    <p class="main_section__anime__info__description__p">Альтернативное название:
                      <span><?php echo $r1['title_eng']; ?></span>
                    </p>
                    <p class="main_section__anime__info__description__p">Рейтинг IMDB:
                      <span><?php echo $r1['IMDb']; ?></span>
                    </p>
                    <p class="main_section__anime__info__description__p">Год:
                      <span><?php echo $r1['year']; ?></span>
                    </p>
                    <p class="main_section__anime__info__description__p">Режиссер:
                      <span><?php echo $r1['producer']; ?></span>
                    </p>
                    <p class="main_section__anime__info__description__p">Просмотров:
                      <span><?php echo $r1['views']; ?></span>
                    </p>
                    <p class="main_section__anime__info__description__genres">Жанры:
                      <?php
                      $categories = $r1['categories_1_id'];
                      $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                      $categories_name_result = mysqli_fetch_assoc($categories_name);
                      if($categories_name_result != null){ ?>
                        <a href="/genres=<?php echo $categories_name_result['id']; ?>">
                          <span><?php echo $categories_name_result['title']; ?></span>
                        </a>
                      <?php };?>
                      <?php
                      $categories = $r1['categories_2_id'];
                      $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                      $categories_name_result = mysqli_fetch_assoc($categories_name);
                      if($categories_name_result != null){ ?>
                        <a href="/genres=<?php echo $categories_name_result['id']; ?>">
                          <span><?php echo $categories_name_result['title']; ?></span>
                        </a>
                      <?php };?>
                      <?php
                      $categories = $r1['categories_3_id'];
                      $categories_name = mysqli_query($connection,"SELECT * FROM `categories` WHERE `id` = '$categories'");
                      $categories_name_result = mysqli_fetch_assoc($categories_name);
                      if($categories_name_result != null){ ?>
                        <a href="/genres=<?php echo $categories_name_result['id']; ?>">
                          <span><?php echo $categories_name_result['title']; ?></span>
                        </a>
                      <?php };?>
                    </p>
                    <p class="main_section__anime__info__description__desc">Описание: <br>
                      <span><?php echo $r1['description']; ?></span>
                    </p>
                    <div class="main_section__anime__info__description__another">
                      <?php
                      $prev_series = $r1['prev_anime'];
                      $prev_series_name = mysqli_query($connection,"SELECT * FROM `anime` WHERE `id` = '$prev_series'");
                      $prev_series_name_result = mysqli_fetch_assoc($prev_series_name);
                      if($prev_series_name_result != null){ ?>
                          <div class="main_section__anime__info__description__another__prev_series">
                            <div class="main_section__anime__info__description__another__prev_series__div_img">
                                <a href="/<?php echo $prev_series_name_result['link'] ?>">
                                    <img src="<?php echo $prev_series_name_result['main_img_sourse'] ?>" class="main_section__anime__info__description__another__prev_series__div_img__img" alt="Изображение аниме">
                                </a>
                            </div>
                            <div class="main_section__anime__info__description__another__prev_series__description">
                                <div class="main_section__anime__info__description__another__prev_series__description_np">
                                    <img src="images/pounce.svg" alt="Предыдущие серии картинка" />
                                     <span>Пред.</span>
                                </div>
                                <a href="/<?php echo $prev_series_name_result['link'] ?>">
                                    <h3 class="main_section__anime__info__description__another__prev_series__description_title"><?php echo $prev_series_name_result['title'] ?></h3>
                                </a>
                                <br>
                                <br>
                                <div class="main_section__anime__info__description__another__prev_series__description__series">
                                    <a href="/<?php echo $prev_series_name_result['link'] ?>">
                                        <img src="images/toggles.svg" alt="значок серий">
                                        Серии <?php echo $prev_series_name_result['series'] ?>
                                    </a>
                                </div>
                              </div>
                          </div>
                      <?php };
                      $next_series = $r1['next_anime'];
                      $next_series_name = mysqli_query($connection,"SELECT * FROM `anime` WHERE `id` = '$next_series'");
                      $next_series_name_result = mysqli_fetch_assoc($next_series_name);
                      if($next_series_name_result != null){ ?>
                        <div class="main_section__anime__info__description__another__next_series">
                          <div class="main_section__anime__info__description__another__next_series__div_img">
                              <a href="/<?php echo $next_series_name_result['link'] ?>">
                                  <img src="<?php echo $next_series_name_result['main_img_sourse'] ?>" class="main_section__anime__info__description__another__next_series__div_img__img" alt="Изображение аниме">
                              </a>
                          </div>
                          <div class="main_section__anime__info__description__another__next_series__description">
                              <div class="main_section__anime__info__description__another__next_series__description_np">
                                  <img src="images/pounce(1).svg" alt="Следующие серии картинка" />
                                   <span>След.</span>
                              </div>
                              <a href="/<?php echo $next_series_name_result['link'] ?>">
                                  <h3 class="main_section__anime__info__description__another__next_series__description_title"><?php echo $next_series_name_result['title'] ?></h3>
                              </a>
                              <br>
                              <br>
                              <div class="main_section__anime__info__description__another__next_series__description__series">
                                  <a href="/<?php echo $next_series_name_result['link'] ?>">
                                      <img src="images/toggles.svg" alt="значок серий">
                                      Серии <?php echo $next_series_name_result['series'] ?>
                                  </a>
                              </div>
                            </div>
                        </div>
                      <?php } ?>
                    </div>
                </div>
            </section>
            <br>
            <br>

            <section class="main_section__anime__watch">                        <!--Блок просмотра аниме-->

              <section class="main_section__anime__watch__series">
                      <div class="main_section__anime__watch__series__left_side">
                        <h3>Серии</h3>
                        <div class="main_section__anime__watch__series__left_side__flexbox">
                            <?php
                              if($r1['50+series'] == 1) {
                                $start_seria = 51;
                              } else if($r1['100+series'] == 1) {
                                $start_seria = 101;
                              } else if($r1['150+series'] == 1) {
                                $start_seria = 151;
                              } else if($r1['200+series'] == 1) {
                                $start_seria = 201;
                              } else if($r1['250+series'] == 1) {
                                $start_seria = 251;
                              } else if($r1['300+series'] == 1) {
                                $start_seria = 301;
                              } else if($r1['350+series'] == 1) {
                                $start_seria = 351;
                              } else if($r1['400+series'] == 1) {
                                $start_seria = 401;
                              } else if($r1['450+series'] == 1) {
                                $start_seria = 451;
                              } else {
                                $start_seria = 1;
                              };
                              for ($i=1; $i < 51; $i++) {
                                $seriaNum = 'seria_' . $i;
                                if($r1[$seriaNum] != null) {?>
                                  <button class="main_section__anime__watch__series__left_side__flexbox__element"
                                  data-seria="<?php echo $r1[$seriaNum] ?>"><?php echo $start_seria; $start_seria++  ?></button>
                                <?php }
                              }; ?>

                        </div>
                      </div>
                      <div class="main_section__anime_watch__series__right_side">
                        <h3 id="seriaH3">Выберите серию, чтобы начать просмотр</h3>
                        <iframe id="iframe" allowfullscreen="">
                        </iframe>
                      </div>
                  </section>

                  <section class="comments">                                                      <!--Секция комментариев-->
                    <hr>
                    <h4>Комментарии</h4>
                    <div class="commentsFlexbox">
                      <?php 
                      $commentsArray = mysqli_query($connection,"SELECT * FROM `comments` WHERE `anime_id` = $anime_id ORDER BY `pubdate` ASC ");
                      if(mysqli_num_rows($commentsArray) == 0) { ?>
                          <h6>Стань первым, кто прокомментирует это аниме</h6>
                      <?php } else {
                    while($comment = mysqli_fetch_assoc($commentsArray)) { 
                      $commentUserId = $comment['user_id'];
                      ?>
                      <div class="comments__element">
                        <div class="comments__element__leftside">
                          <img src="images/avatars/<?php 
                            $userCommentArray = mysqli_query($connection,"SELECT * FROM `users` WHERE `id` = $commentUserId ");
                            $userCommentId = mysqli_fetch_assoc($userCommentArray);
                            echo $userCommentId['avatar'];
                           ?>" alt="Аватарка пользователя">
                        </div>
                        <div class="comments__element__rightside">
                          <h5><?php echo $userCommentId['login'] ?></h5>
                          <p><?php echo $comment['text'] ?></p>
                        </div>
                      </div>
                    </div>
                  <?php } }
                  if(empty($_SESSION['login'])) {?>
                    <p class="no_login">Авторизуйтесь, чтобы оставлять комментарии</p>
                  <?php } else { ?>
                    <div class="addComments">
                      <div class="addComments__leftSide">
                        <img src="images/avatars/<?php echo $user_id_full['avatar']; ?>" alt="Аватарка пользователя">
                      </div>
                      <div class="addComments__rightSide">
                        <form method="post" id="ajax_formComment" action="">   
                          <textarea rows="5" cols="100" name="text" placeholder="Здесь можно оставить свой комментарий" class="textarea"></textarea>
                          <input type="text" name="user_id" value="<?php echo $user_id_full['id']; ?>" style="display: none;">
                          <input type="text" name="anime_id" value="<?php echo $r1['id']; ?>" style="display: none;">
                          <input type="submit" onclick="event.preventDefault()" value="Отправить" class="submit" id="submit">
                        </form>
                      </div>
                    </div> <?php } ?>
                  </section>

            </section>
        </section>

        <br>
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
<?php } ?>
