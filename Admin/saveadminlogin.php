<?php
session_start();
include "../include/connection.php";



if(isset($_POST['adminlogin']))
{
$adminname=$_POST['adminname'];
$adminpass=$_POST['adminpass'];



$insert="SELECT * FROM adminlogin WHERE (email='$adminname' OR username='$adminname') && login_password='$adminpass'";


$result=mysqli_query($connect,$insert);

$total=mysqli_num_rows($result);


if($total==1)
{
    $row=mysqli_fetch_assoc($result);
    $_SESSION['username']=$row['email'];
    header('Location:admin.php');
   
}
else
{
   
   
    echo "<script> alert('Incorrect Email or Password');</script>";
}

}
else{
    echo "not connected";
}






?>