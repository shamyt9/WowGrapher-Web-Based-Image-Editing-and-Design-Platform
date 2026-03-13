<?php

include "../include/connection.php";

if(isset($_POST['psubmit']))
{
    $imgname=$_FILES["pimage"]["name"];
    $imgtemp=$_FILES["pimage"]["tmp_name"];
    
    $folder="../imgstore/".$imgname;
    move_uploaded_file($imgtemp,$folder); 
    $pname=$_POST['pname'];
    $pabout=$_POST['pabout'];

    $insert="INSERT INTO publication(name,about,image) VALUES('$pname','$pabout','$folder')";

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