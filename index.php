<?php
include "includes/db.php";
$url_test = $_SERVER['REQUEST_URI'];
$random_num = $rest = substr($url_test, 0, 10);
if($url_test == "/" || $random_num == "/index.php")
{   //Отрисовываем index.php
    include "includes/new_design.php";
}  else if($url_test == "/random")
{   //Отрисаовываем рандомное аниме
    $animeTableArray = mysqli_query($connection, "SELECT COUNT(*) FROM `anime`" );
    $animeTableArrayCount = mysqli_fetch_array($animeTableArray);
    $animeMaxId = (int) $animeTableArrayCount[0];
    $animeRandId = rand(1, $animeMaxId);
    $animeLinkArray = mysqli_query($connection, "SELECT * FROM `anime` WHERE `id` = $animeRandId ");
    $animeObject = mysqli_fetch_assoc($animeLinkArray);
    $animeLink = $animeObject['link'];
    header( "Location: https://animesaver.ru/$animeLink" );
}   else if($url_test == "/catalogue")
{   include "includes/catalogue_new_design.php";
}   else { //Отрисовываем anime.php
    include "includes/animepage_new_design.php";}
mysqli_close($connection);?>
