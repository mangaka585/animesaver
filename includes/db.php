<?php

$connection = mysqli_connect('10.0.0.125', 'mangaka585','Linkra12081995','mangaka585_animesaver');

if($connection == false){
    echo 'Не удалось подключиться к базе данных! <br><hr>';
    echo mysqli_connect_error();
    exit();
};