<?php

include "../include/connection.php";

if (isset($_POST['asubmit'])) {
    $imgname = $_FILES["aimage"]["name"];
    $imgtemp = $_FILES["aimage"]["tmp_name"];

    $folder = "../backendimages/" . $imgname;
    move_uploaded_file($imgtemp, $folder);
    $aname = $_POST['aname'];
    $orientation = $_POST['orientation'];
    $Orcode = $_POST['orcode'];

    $insert = "INSERT INTO template(name,orientation,image,Orcode) VALUES('$aname','$orientation','$folder',$Orcode)";

    $result = mysqli_query($connect, $insert);

    if ($result) {
        echo "<script> alert('INERTED DATA');</script>";
        header('Location:admin.php');
    } else {
        echo "<script> alert('FAILED TO INERTED DATA');</script>";
    }

} else {
    echo "failed to insert";
}









?>