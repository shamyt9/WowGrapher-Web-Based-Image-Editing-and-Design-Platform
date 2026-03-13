<?php

include "../include/connection.php";

if (isset($_POST['Gsubmit'])) {
    $imgname = $_FILES["Gimage"]["name"];
    $imgtemp = $_FILES["Gimage"]["tmp_name"];

    $folder = "../backendimages/" . $imgname;
    move_uploaded_file($imgtemp, $folder);
    $Gname = $_POST['Gname'];
    $GcreatedBy = $_POST['Gcreated_by'];


    $insert = "INSERT INTO gallery(galery_image_name,creator,gallery_image) VALUES('$Gname','$GcreatedBy','$folder')";

    $result = mysqli_query($connect, $insert);

    if ($result) {
        echo "<script> alert('INERTED DATA');</script>";
        header('Location:galleryImageForm.php');
    } else {
        echo "<script> alert('FAILED TO INERTED DATA');</script>";
    }

} else {
    echo "failed to insert";
}









?>