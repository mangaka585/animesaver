<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
?>
<html>
<head>
    <title>Форма регистрации</title>
    <style>
        body  {
            text-align: center;
            color: blueviolet;
        }

        span input {
            margin-bottom: 5px;
        }

        .submit {
            width: 180px;
            height: 40px;
            font-size: 1em;
            background: darkblue;
            color: white;
            border-radius: 7px;
        }

        .submit:hover   {
            background: white;
            color: black;
        }

        span    {
            text-align: center;
        }

        a {
            display: block;
            padding: 10px;
            border: solid 1px black;
            width: 158px;
            border-radius: 5px;
            background: deepskyblue;
            color: white;
            text-decoration: none;
            font-size: 1em;
        }

        a:hover {
            background: dodgerblue;
            color: black;
        }
    </style>
</head>
<body>
<?php
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{ ?>
  <form action="testreg.php" method="post" target="_top">

      <span>
          <input name="login" type="text" size="12" maxlength="15" placeholder="Логин">
      </span>
      <span>
          <input name="password" type="password" size="12" maxlength="15" placeholder="Пароль">
      </span>
      <span>
          <input type="submit" name="submit" value="Войти" class="submit">

          <a href="reg.php">Регистрация</a>
      </span>
  </form>
    // Если пусты, то мы не выводим ссылку
    //echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
<?php }
else
{

    // Если не пусты, то мы выводим ссылку
   echo "Вы вошли на сайт, как ".$_SESSION['login']//."<br><a  href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только  зарегистрированным пользователям</a>"
   ;
}
?>
</body>
</html>
