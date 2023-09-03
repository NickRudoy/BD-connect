<?php

require_once '../config/connect.php';

$id = $_GET['id'];

mysqli_query($connect, query: "DELETE FROM `feedback` WHERE `feedback`.`id` = '$id'");

header('Location: /crud-feedback');