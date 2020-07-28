<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="alternate" hreflang="ru" href="https://animesaver.ru/includes/reg.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация | Animesaver</title>
    <meta name="description" content="Регистрация на Animesaver.ru"/>
    <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
    <style>

      body {
        margin: 0 10px;
      }

      form {
        text-align: center;
      }
    </style>
</head>
<body>
  <h3 style="text-align:center; padding:0; margin: 0; color:white;">Регистрация</h3>
  <form action="save_user.php" method="post">
    <input name="login" type="text" placeholder="Логин" maxlength="15">
    <input name="password" type="text" placeholder="Пароль" maxlength="20">
    <input name="email" type="email" placeholder="E-mail">
    <label style="text-align: center;color: grey">Дата рождения:<br></label>
    <input name="birth" type="date" style="width:100%;text-align:center;">
    <p>
        <input type="submit" name="submit" value="Зарегистрироваться" style="idth:100%;color:green;">
    </p>
  </form>
</body>
</html>
