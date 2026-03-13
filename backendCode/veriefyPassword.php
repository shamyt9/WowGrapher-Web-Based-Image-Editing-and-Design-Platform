<?php
session_start();
include ('../include/connection.php');


if (isset ($_POST['submit'])) {
    $password = $_POST['verifyPassword'];

    $created = $_SESSION['userPassword'];


    if ($password === $created) {
        header('location:../updateUserDetails.php');
    } else {
        // echo '<script>alert("Wrong password");</script>';
        echo '<script>window.location.href = "veriefyPassword.php";</script>';

    }



} else {
    // echo "<script>alert('Connection Failed!!');</script>";

}


?>