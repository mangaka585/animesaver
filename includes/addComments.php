<?php
include "db.php";
if (isset($_POST["user_id"]) && isset($_POST["anime_id"]) && isset($_POST["text"])) {

    $user_id = $_POST["user_id"];
    $anime_id = $_POST["anime_id"];
    $text = htmlspecialchars($_POST["text"]);

    mysqli_query($connection,"INSERT INTO `comments` (`anime_id`, `user_id`, `text`) VALUES ('".$anime_id."','".$user_id."','".$text."') ");
}
?>
