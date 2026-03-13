<?php

include "../include/connection.php";

if(isset($_POST['submit']))
{
   
    $category=$_POST['category'];

    $insert="INSERT INTO category(category) VALUES('$category')";

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