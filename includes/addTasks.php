<?php
include "db.php";
if (isset($_POST["user_id"]) && isset($_POST["text"])) {

    $user_id = $_POST["user_id"];
    $text = htmlspecialchars($_POST["text"]);

    mysqli_query($connection,"INSERT INTO `tasks` (`user_id`, `text`) VALUES ('".$user_id."','".$text."') ");
}
?>
