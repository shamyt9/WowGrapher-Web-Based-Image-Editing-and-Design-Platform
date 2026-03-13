<?php
session_start();
include("connection.php");


if (isset($_POST['submitReview'])) {
    $review = $_POST['feedback'];
    $name = $_POST['name'];

    $userdata = "insert into feedbacktable(id,name,feedback) values('','$name','$review')";

    $getconnected = mysqli_query($connect, $userdata);

    if ($getconnected) {
        echo "<script>alert('feedback updated');</script>";
        header("location:../index.php#reviewsection");
    } else {
        echo "<script>alert('Not updated');</script>";
    }
}

?>