<?php

require_once 'config/connect.php';

$feedback_id = $_GET['id'];
$query = "SELECT * FROM `feedback` WHERE `id` = '$feedback_id'";
$result = mysqli_query($connect, $query);
$feedback = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update feedback page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Update feedback</h3>
    <form action="vendor/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$feedback['id'] ?>">
        <p>Title</p>
        <input type="text" name="title" value="<?=$feedback['title'] ?>">
        <p>Feedback</p>
        <textarea name="feedback"><?=$feedback['feedback'] ?></textarea>
        <p>Photo</p>
        <input type="file" name="photo">
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
