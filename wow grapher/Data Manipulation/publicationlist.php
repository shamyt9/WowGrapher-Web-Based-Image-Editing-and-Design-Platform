<?php

include "../include/connection.php";


   

    $gettingdata="SELECT * FROM publication";
    $result=mysqli_query($connect,$gettingdata);

   
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <title>Document</title>
</head>
<body>
    
     <div class="container-fluid">
        <div class="row">
            <table class="table bordered">

            <tr>
                <th>SR.No</th>
                <th>Publication Name</th>
                <th>About</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>Remove</th>
            </tr>
    <?php

            if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $n=1;
            while($row=mysqli_fetch_assoc($result))
            {?>
            <tr>
                <td><?php echo $n;?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["about"];?></td>
                <td><img src='../imgstore/<?php echo $row["image"];?>' alt="" width="65px" height="75px"></td>
                <td><button type="button" class="btn btn-warning" name="update">Update</button></td>
                <td><a href="delete.php?id=<?php echo $row["id"];?>" class="btn btn-danger" name="delete">Delete</a></td>
            </tr>
           
                <!-- <img src='imgstore/' alt="" width="285px" height="345px">
                <p class="text-center text-success h3"></p> -->
           
             <?php

             $n++;
            }
        }
    }
    ?>
            </table>
        </div>
     </div>







</body>
</html>