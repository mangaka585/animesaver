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
          width: 175px;
          height: 30px;
          padding: 10px;
          border-radius: 5px;
          border: solid 1px grey;
        }

        .submit {
          width: 175px;
          height: 40px;
          font-size: 1em;
          background: cadetblue;
          color: white;
          border-radius: 7px;
          border: solid 1px black;
        }

        .submit:hover   {
            background: white;
            color: black;
        }

        span    {
            text-align: center;
        }

        a {
          display: inline-block;
          padding: 2px;
          border: dotted 2px black;
          width: 167px;
          border-radius: 7px;
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
          <br>
          <a href="reg.php">Регистрация</a>
      </span>
  </form>
<?php
// Если пусты, то мы не выводим ссылку
//echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
}
else
{

    // Если не пусты, то мы выводим ссылку
   echo "Вы вошли на сайт, как ".$_SESSION['login']."<br>"."
   <a href='https://animesaver.ru/includes/my_profile.php' target='_top' style='color:black; padding-top:3px;padding-bottom:3px;padding-left:7px;padding-right:7px;margin-top: 5px;'>Моя страница</a>
   <img alt='autorisation image' src='https://animesaver.ru/images/autorisation.jpg' style='width: 180px;margin-top: 30px;'>";
}
?>
</body>
</html>
