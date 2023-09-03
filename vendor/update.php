<?php
require_once '../config/connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$feedback = $_POST['feedback'];
$photo = $_FILES['photo'];

// Check if a file was uploaded successfully
if ($photo['error'] === UPLOAD_ERR_OK) {
    // Get the file name and extension
    $filename = basename($photo['name']);

    // Specify the path where you want to store the file (e.g., "/img/")
    $uploadPath = '/img/' . $filename;

    // Move the uploaded file to the desired location
    move_uploaded_file($photo['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $uploadPath);

    // Update the record in the database with the new file path
    $query = "UPDATE `feedback` SET `title` = '$title', `feedback` = '$feedback', `photo` = '$uploadPath' WHERE `feedback`.`id` = '$id'";
    mysqli_query($connect, $query);

    // Check if the query was successful or not
    if (mysqli_affected_rows($connect) > 0) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
} else {
    // Handle the case where no new photo was uploaded
    $query = "UPDATE `feedback` SET `title` = '$title', `feedback` = '$feedback' WHERE `feedback`.`id` = '$id'";
    mysqli_query($connect, $query);

    // Check if the query was successful or not
    if (mysqli_affected_rows($connect) > 0) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}

header('Location: /crud-feedback');
