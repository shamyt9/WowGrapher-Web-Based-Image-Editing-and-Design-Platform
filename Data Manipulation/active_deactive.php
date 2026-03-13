<?php

include "../include/connection.php";

$status=$_GET['active'];

$sql="UPDATE book SET Book_Status=0 WHERE id='$status'";

$result=mysqli_query($connect,$sql);

if(!$result)
{
    die("error");
}
else{
    header("location:booklist.php");
}

?>

<?php

include "../include/connection.php";

$status=$_GET['deactive'];

$sql="UPDATE book SET Book_Status=1 WHERE id='$status'";

$result=mysqli_query($connect,$sql);

if(!$result)
{
    die("error");
}
else{
    header("location:booklist.php");
}

?>