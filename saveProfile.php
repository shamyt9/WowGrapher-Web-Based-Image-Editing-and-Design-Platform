<?php
session_start();

$created = $_SESSION['email'];

include "include/connection.php";

if (isset($_POST['save'])) {
    $imgname = $_FILES["profileimage"]["name"];
    $imgtemp = $_FILES["profileimage"]["tmp_name"];

    $folder = "backendimages/" . $imgname;

    move_uploaded_file($imgtemp, $folder);

    $insert = "UPDATE accounttable SET image = ? WHERE email = ?";
    $stmt = mysqli_prepare($connect, $insert);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $folder, $created);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script>alert('Updated');</script>";
            header('Location: profile.php');
            exit();
        } else {
            echo "<script>alert('Failed to update');</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Failed to prepare statement');</script>";
    }

    mysqli_close($connect);

} else {
    echo "<script>alert('ERROR');</script>";
}



?>