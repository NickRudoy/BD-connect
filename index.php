<?php

require_once "config/connect.php";

//CRUD

// C - Create +
// R - Read +
// U - Update +
// D - Delete +

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                Title
            </th>
            <th>
                Feedback
            </th>
            <th>
                Photo
            </th>
            <th>
                Update
            </th>
            <th>
                Delete
            </th>
        </tr>

        <?php  

            $feedbacks = mysqli_query($connect, query: "SELECT * FROM `feedback`");

            $feedbacks = mysqli_fetch_all($feedbacks);
            foreach($feedbacks as $feedback) {
               ?>
               <tr>
                    <td><?=$feedback[0] ?></td>
                    <td><?=$feedback[1] ?></td>
                    <td><?=$feedback[2] ?></td>
                    <td><?=$feedback[3] ?>$</td>
                    <td><a href="update.php?id=<?=$feedback[0] ?>">Update</a></td>
                    <td><a class="delete" href="vendor/delete.php?id=<?=$feedback[0] ?>">Delete</a></td>
                </tr>

               <?php
            }

        ?>   
    </table>

    <h3>Add new feedback</h3>
    <form action="vendor/create.php" method="post" enctype="multipart/form-data">
            <p>Title</p>
            <input type="text" name="title">
            <p>Feedback</p>
            <textarea name="feedback"></textarea>
            <p>Photo</p>
            <input type="file" name="photo">
            <br>
            <button type="submit">Add new feedback</button>
    </form>

</body>
</html>