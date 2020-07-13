<?php
include "db.php";
if (isset($_POST["user_id"]) && isset($_POST["anime_id"]) && isset($_POST["action"])) {

    $user_id = $_POST["user_id"];
    $anime_id = $_POST["anime_id"];
    $action = $_POST["action"];
    if($action == "add") {
        mysqli_query($connection,"INSERT INTO `watched_anime` (`id`, `user_id`, `anime_id`) VALUES (NULL, $user_id, $anime_id)");
    } else if ($action == "delete") {
        mysqli_query($connection,"DELETE FROM `watched_anime` WHERE (`watched_anime`.`user_id` = $user_id) && (`watched_anime`.`anime_id` = $anime_id)");
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