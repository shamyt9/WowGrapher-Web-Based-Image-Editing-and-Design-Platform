<?php
session_start();
include ("../include/connection.php");

// Ensure imageId is properly received
if (isset($_POST['imageId'])) {
    $imageId = $_POST['imageId'];
    $userId = $_SESSION['id'];

    // Check if the user has already liked the image
    $select = "SELECT * FROM likes WHERE gallery_id='$imageId' AND id='$userId'";
    $result = mysqli_query($connect, $select);

    if (mysqli_num_rows($result) > 0) {
        // If the user has already liked the image, delete the like
        $delete = "DELETE FROM likes WHERE gallery_id='$imageId' AND id='$userId'";
        $executeDelete = mysqli_query($connect, $delete);
    } else {
        // If the user has not liked the image, insert a new like
        $Liked = 1;
        $insert = "INSERT INTO likes (id, gallery_id, Liked) VALUES ('$userId', '$imageId', '$Liked')";
        $executeInsert = mysqli_query($connect, $insert);
    }
}
?>