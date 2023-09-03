<?php
// Подключение к БД 
$connect = mysqli_connect(hostname:'localhost', username:'username', password:'password', database:'database');

if (!$connect) {
    die ('Error connect database');
}