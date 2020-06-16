<?php
session_start();
include("db.php");
$login = $_SESSION['login'];
$user_id_array = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` LIKE '$login'");
$user_id_full = mysqli_fetch_assoc($user_id_array);
$id = $user_id_full['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$selfInfo = $_POST['selfInfo'];
//если все поля заполнены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$name = stripslashes($name);
$name = htmlspecialchars($name);
$surname = stripslashes($surname);
$surname = htmlspecialchars($surname);
$selfInfo = stripslashes($selfInfo);
$selfInfo = htmlspecialchars($selfInfo);
// подключаемся к базе
$user_changes = mysqli_query($connection, "UPDATE `users` SET `name` = '$name', `surname` = '$surname', `selfInfo` = '$selfInfo' WHERE `users`.`id` = $id");
// Проверяем, есть ли ошибки
if ($user_changes=='TRUE')
{
    echo "Вы успешно изменили данные! Нажмите на кнопку, чтобы вернуться обратно:
    <a href='my_profile.php' style='text-align: center;display: block;margin: 30px;font-size: 1.5em;'>Вернуться</a>";
}
else {
    echo "Ошибка! Обратитесь в администрацию сайта по адресу mangaka585@gmail.com";
}
?>
