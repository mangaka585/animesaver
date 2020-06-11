<?php
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (isset($_POST['birth'])) { $birth=$_POST['birth']; if ($birth =='') { unset($birth);} }
//заносим введенную пользователем дату рождения в переменную $birth, если она пустая, то уничтожаем переменную
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
//заносим введенную пользователем почту в переменную $email, если она пустая, то уничтожаем переменную
if (empty($login) or empty($password) or empty($birth) or empty($email)) //если пользователь не ввел какие-либо данные, то выдаем ошибку и останавливаем скрипт
{
    exit ('Видимо, не вышло заполнить все поля. Теперь нужно вернуться обратно и попытаться еще..
    </br><a href="https://animesaver.ru/includes/reg.php" style="text-align: center;display: block;margin: 30px;font-size: 1.5em;">Вернуться</a>');
}
//если все поля заполнены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$email = stripslashes($email);
$email = htmlspecialchars($email);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$email = trim($email);
// подключаемся к базе
include("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
// проверка на существование пользователя с таким же логином
$result = mysqli_query($connection, "SELECT id FROM `users` WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['id'])) {
    exit ('Извините, введённый вами логин уже зарегистрирован. Введите другой логин.
    </br><a href="https://animesaver.ru/includes/reg.php" style="text-align: center;display: block;margin: 30px;font-size: 1.5em;">Ввести</a>');
}
// если такого нет, то сохраняем данные
$result2 = mysqli_query ($connection, "INSERT INTO users (login,password,birth,email) VALUES('$login','$password','$birth','$email')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
    echo "Вы успешно зарегистрированы! Теперь вы можете войти на сайт под своим логином.
    <a href='https://animesaver.ru/includes/autorisation.php' style='text-align: center;display: block;margin: 30px;font-size: 1.5em;'>Войти</a>";
}
else {
    echo "Ошибка! Вы не зарегистрированы.";
}
?>
