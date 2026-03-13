<?php

include "../include/connection.php";

if(isset($_POST['bsubmit']))
{
    $imgname=$_FILES["bimage"]["name"];
    $imgtemp=$_FILES["bimage"]["tmp_name"];
    
    $folder="../imgstore/".$imgname;
    move_uploaded_file($imgtemp,$folder); 
    $bname=$_POST['bname'];
    $isbn=$_POST['bisbn'];
    $edition=$_POST['bedition'];
    $babout=$_POST['babout'];
    $author=$_POST['author'];
    $publication=$_POST['publication'];
    $category=$_POST['category'];

    $insert="INSERT INTO book(name,author,publication,edition,isbn,category,about,image) VALUES('$bname','$author','$publication','$edition','$isbn','$category','$babout','$folder')";

    $result=mysqli_query($connect,$insert);

    if($result)
    {
        echo "<script> alert('INERTED DATA');</script>";
        header('Location:admin.php');
    }
    else
    {
        echo "<script> alert('FAILED TO INERTED DATA');</script>";
    }
    
}

else{
    echo "failed to insert";
}









?>