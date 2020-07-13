<?php
include "db.php";
if (isset($_POST["user_id"]) && isset($_POST["anime_id"]) && isset($_POST["action"])) {

    $user_id = $_POST["user_id"];
    $anime_id = $_POST["anime_id"];
    $action = $_POST["action"];
    if($action == "add") {
        mysqli_query($connection,"INSERT INTO `favorites_anime` (`id`, `user_id`, `anime_id`) VALUES (NULL, $user_id, $anime_id)");
    } else if ($action == "delete") {
        mysqli_query($connection,"DELETE FROM `favorites_anime` WHERE (`favorites_anime`.`user_id` = $user_id) && (`favorites_anime`.`anime_id` = $anime_id)");
    }

    // Формируем массив для JSON ответа
    $result = array(
        'user_id' => $_POST["user_id"],
        'anime_id' => $_POST["anime_id"]
    );

    // Переводим массив в JSON
    echo json_encode($result);
}

?>