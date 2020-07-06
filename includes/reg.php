<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="alternate" hreflang="ru" href="https://animesaver.ru/includes/reg.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация | Animesaver</title>
    <meta name="description" content="Регистрация на Animesaver.ru"/>
    <meta name="keywords" content="мультфильмы, аниме, смотреть, онлайн, видео, серии, сезоны, эпизоды, мультики, online"/>
</head>
<body>
  <h3 style="text-align:center; padding:0; margin: 0; color:cadetblue;">Регистрация</h3>
  <form action="save_user.php" method="post">
      <p>
          <input name="login" type="text" placeholder="Логин" size="12" maxlength="15">
      </p>
      <p>
          <input name="password" type="text" placeholder="Пароль" size="12" maxlength="20">
      </p>
      <p>
          <input name="email" type="email" placeholder="E-mail" size="12">
      </p>
      <p>
        <label style="text-align: center;width: 178px;display: block;">Дата рождения:<br></label>
        <input name="birth" type="date" size="12" style="width:159px;text-align:center;">
      </p>
      <p>
          <input type="submit" name="submit" value="Зарегистрироваться" style="padding:0; width:178px;color:blue;">
      </p>
  </form>
</body>
</html>
