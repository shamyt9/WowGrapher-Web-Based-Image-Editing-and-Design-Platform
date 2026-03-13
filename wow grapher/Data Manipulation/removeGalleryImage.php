<!-- FOR AUTHORS -->
<?php

include "../include/connection.php";

$id = $_GET['id'];




$gettingdata = "DELETE  FROM gallery WHERE gallery_id=$id";
$result = mysqli_query($connect, $gettingdata);

if (!$result) {
    die("Error");
} else {
    header('Location:showGallery.php');
}

?>