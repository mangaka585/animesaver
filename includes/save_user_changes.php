<?php
include "db.php";
if (isset($_POST["surname"]) && isset($_POST["name"]) && isset($_POST["fathername"]) && isset($_POST["city"]) && isset($_POST["id"])) {

    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $fathername = $_POST["fathername"];
    $city = $_POST["city"];
    $id = $_POST["id"];
    mysqli_query($connection,"UPDATE `users` SET `surname` = '$surname', `name` = '$name', `fathername` = '$fathername', `city` = '$city' WHERE `users`.`id` = $id ");

    // Формируем массив для JSON ответа
    $result = array(
        'surname' => $_POST["surname"],
        'name' => $_POST["name"],
        'fathername' => $_POST["fathername"],
        'city' => $_POST["city"],
        'id' => $_POST["id"]
    );

    // Переводим массив в JSON
    echo json_encode($result);
}
?>
