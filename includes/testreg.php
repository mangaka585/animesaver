<?php
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
// подключаемся к базе
include("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь

$result = mysqli_query($connection, "SELECT * FROM users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../images/favicon_for_line.ico" type="image/png">
        <title>Смотреть аниме онлайн бесплатно в хорошем качестве | Animesaver</title>
        <link rel="stylesheet" href="../css/style.css">
        <meta name="description" content="Авторизация на Animesaver.ru"/>
        <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script src="../scripts/jquery_code.js" type="text/javascript"></script>
    </head>
    <body>
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <div class="layout">
        <header class="navi">
            <a href="/" class="animesaver_link"><img src="../images/favicon.png" alt="Logo of the site"></a>
            <div class="navigation">
                <a href="/">ГЛАВНАЯ</a>
                <a href="../catalogue">КАТАЛОГ</a>
                <a href="../weekly-saver">ЖУРНАЛ WS</a>
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
            <a href="../weekly-saver" class="weeklysaver_link"><img src="../images/favicon_ws.png" alt="Logo of WS" /></a>
        </header>
        <div id="mobile_nav" class="mobile_nav">
            <ul>
                <li><a href="/">ГЛАВНАЯ</a></li>
                <li><a href="../weekly-saver">ЖУРНАЛ WS</a></li>
                <li><a href="../catalogue">КАТАЛОГ</a></li>
            </ul>
        </div>
        <div class="ui">
            <h1 class="ui_1">Animesaver</h1>
            <h2 class="ui_2">Самый простой сайт по аниме в России!</h2>
        </div>
        <section class="body_layout_testreg">
            <div class="news_sidebar">                                                          <!--Sidebar-->
                <h3>НОВОСТИ САЙТА</h3>
                <iframe src="../anime/news.php">
                    Ваш браузер не поддерживает плавающие фреймы!
                </iframe>
            </div>
            <section class="main_block">                                                        <!--Main block-->
                <?php
                if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
                { ?>
                    <h2 class="welldone_h2">Вы ввели не всю информацию</h2>
                    <div class="dabbing_wrong"><img src="../images/wrong_password.png" alt="dabbing pic" /></div>
                    </br>
                    <div class="try_again">
                        <input type="submit" value="ПОПРОБОВАТЬ СНОВА" onclick="try_again_button()"/>
                    </div>
                    <div class="iframe_class">
                        <iframe src="autorisation.php"></iframe>
                    </div>
                    <div class="links">
                        <a href="https://animesaver.ru">ГЛАВНАЯ</a>
                        <a href="https://animesaver.ru/catalogue">КАТАЛОГ</a>
                        <a href="https://animesaver.ru/weekly-saver">ЖУРНАЛ</a>
                        <a href="https://vk.com/weeklysaver" target="_blank">ГРУППА ВК</a>
                    </div>
                <?php }

                else if (empty($myrow['password']))
                {
                    //если пользователя с введенным логином не существует ?>
                    <h2 class="welldone_h2">Введённый логин или пароль неверный</h2>
                    <div class="dabbing_wrong"><img src="../images/wrong_password.png" alt="dabbing pic" /></div>
                    </br>
                    <div class="try_again">
                        <input type="submit" value="ПОПРОБОВАТЬ СНОВА" onclick="try_again_button()"/>
                    </div>
                    <div class="iframe_class">
                        <iframe src="autorisation.php"></iframe>
                    </div>
                    <div class="links">
                        <a href="https://animesaver.ru">ГЛАВНАЯ</a>
                        <a href="https://animesaver.ru/catalogue">КАТАЛОГ</a>
                        <a href="https://animesaver.ru/weekly-saver">ЖУРНАЛ</a>
                        <a href="https://vk.com/weeklysaver" target="_blank">ГРУППА ВК</a>
                    </div>
                <?php }
                else {
                    //если существует, то сверяем пароли
                    if ($myrow['password']==$password) {
                        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
                        $_SESSION['login']=$myrow['login'];
                        $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
                        ?>
                    <h2 class="welldone_h2">Вы успешно вошли на сайт!</h2>
                    <div class="dabbing"><img src="../images/goodjob.png" alt="dabbing pic" /></div>
                    <div class="links">
                        <a href="https://animesaver.ru">ГЛАВНАЯ</a>
                        <a href="https://animesaver.ru/catalogue">КАТАЛОГ</a>
                        <a href="https://animesaver.ru/weekly-saver">ЖУРНАЛ</a>
                        <a href="https://vk.com/weeklysaver" target="_blank">ГРУППА ВК</a>
                    </div>
                    <?php }
                    else {
                        //если пароли не сошлись
                        ?>
                    <h2 class="welldone_h2">Введённый вами пароль неверный</h2>
                    <div class="dabbing_wrong"><img src="../images/wrong_password.png" alt="dabbing pic" /></div>
                    </br>
                    <div class="try_again">
                        <input type="submit" value="ПОПРОБОВАТЬ СНОВА" onclick="try_again_button()"/>
                    </div>
                    <div class="iframe_class">
                        <iframe src="autorisation.php"></iframe>
                    </div>
                    <div class="links">
                        <a href="https://animesaver.ru">ГЛАВНАЯ</a>
                        <a href="https://animesaver.ru/catalogue">КАТАЛОГ</a>
                        <a href="https://animesaver.ru/weekly-saver">ЖУРНАЛ</a>
                        <a href="https://vk.com/weeklysaver" target="_blank">ГРУППА ВК</a>
                    </div>
                    <?php }
                }
                ?>
            </section>
            <div class="adv">                                                                   <!--ADV-->
                <h3>НОВОСТИ ЖУРНАЛА</h3>
                <iframe src="../anime/ws_news.php">
                    Ваш браузер не поддерживает плавающие фреймы!
                </iframe>
            </div>
        </section>
        <footer>
            <div class="site_description">
                <p>
                    Добро пожаловать на animesaver.ru! Мы молодой, развивающийся сайт аниме с необычными планами на будущее.
                    Ведь у нас есть еще и второе направление: мы создали первый еженедельный журнал российской манги. Прямо
                    сейчас читайте наш журнал, смотрите аниме сериалы и фильмы без рекламы, которая вечно всех раздражает.
                    Японские аниме доступны для просмотра без регистрации, смс и каких-либо ограничений. В наших планах стать
                    самым масштабным в России порталом аниме, где будет абсолютно все бесплатно и легкодоступно. Нам всегда
                    требуются новые люди в команду, поэтому мы открыты для контактов и рады любой помощи.
                </p>
            </div>
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
            <img src="../images/up.png" alt="up_logo"/>
        </a>
    </div>
    </body>
    </html>
