<?php
include "includes/db.php";
$url_test = $_SERVER['REQUEST_URI'];
$random_num = $rest = substr($url_test, 0, 10);
if($url_test == "/" || $random_num == "/index.php")
{   //Отрисовываем index.php
    include "includes/homepage.php";
} else { //Отрисовываем anime.php
    include "includes/animepage.php";}
mysqli_close($connection);?>