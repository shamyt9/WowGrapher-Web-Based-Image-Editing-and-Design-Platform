<?php
session_start();

 
 if(isset($_SESSION['username'])==true)
 {
  

 }
 else
 {
  header('location:adminloginform.php');

 }
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- 1. Bootstrap link -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



   





     <!-- 3.css font style link -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&family=Oswald&display=swap" rel="stylesheet">

    <!-- tinymcs api -->

    <script src="tinymce/tinymce.min.js"></script>

    <script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'advlist autolink lists link image charmap print preview',
    toolbar: 'undo redo | bold italic underline | bullist numlist | link image'
 });
</script>


</head>
<body>


<p class="text-center display-4 bg-secondary text-light p-1 " style="font-weight:bold;">Edit About Page</p>


<ul class="nav nav-pills  justify-content-center " id="pills-tab" role="tablist" style="background-color:yellow;">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Edit</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-p1-tab" data-bs-toggle="pill" data-bs-target="#pills-p1" type="button" role="tab" aria-controls="pills-p1" aria-selected="false">paragraph 1</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-p2-tab" data-bs-toggle="pill" data-bs-target="#pills-p2" type="button" role="tab" aria-controls="pills-p2" aria-selected="false">paragraph 2</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-p3-tab" data-bs-toggle="pill" data-bs-target="#pills-p3" type="button" role="tab" aria-controls="pills-p3" aria-selected="false">paragraph 3</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-image-tab" data-bs-toggle="pill" data-bs-target="#pills-image" type="button" role="tab" aria-controls="pills-image" aria-selected="false">Change Images</button>
  </li>

  
</ul>

<div class="tab-content" id="pills-tabContent">

  <div class="tab-pane fade show " id="pills-image" role="tabpanel" aria-labelledby="pills-image-tab">

  <div class="container">
    <div >
    <h1  class="text-center display-5 fw-bold">Edit IMAGES</h1>
    <div style="margin-top:50px;border:2px solid black;border-radius:20px;padding:50px;">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="aboutimg1" class="display-5 fw-bold">Image First:</label></td>
                <td><input type="file" class="display-5 m-5" name="aboutimg1" ></td>
            </tr>

            <tr>
                <td><label for="aboutimg2" class="display-5 fw-bold">Image Second:</label></td>
                <td><input type="file" class="display-5 m-5" name="aboutimg2" ></td>
            </tr>

            <tr>
                <td><label for="aboutimg3" class="display-5 fw-bold">Image Third:</label></td>
                <td><input type="file" class="display-5 m-5" name="aboutimg3" ></td>
            </tr>
        </table>
        
        <button type="submit" name="save3" value="Save" class="btn btn-danger p-2  my-3 w-100" style="font-size:20px; font-weight:bold;">Save</button>
        
    </form>
    </div>
    

    </div>
    
  </div>

  </div>


<!-- paragraph 1 start -->
  <div class="tab-pane fade" id="pills-p1" role="tabpanel" aria-labelledby="pills-p1-tab">

    <div class=" justify-content-between" style="border:5px solid green; border-radius: 10px; overflow:hidden;">
         <p class="text-center display-5   p-2 my-4" style="font-weight:bold;">Edit Paragraph 1</p>

         <form action="" method="post" enctype="multipart/form-data" class="my-5 " style="border:2px solid black;padding:10px;">

             <textarea name="para1" id="tinymce-editor"  placeholder="enter paragraph 1 content"></textarea>

             <button type="submit" name="save3" value="Save" class="btn btn-success p-2 float-end my-5 w-100">Save</button>
         </form>

    </div>

  </div>
  <!-- ***paragraph 1 end*** -->



  <!-- paragraph 2 start -->
  <div class="tab-pane fade" id="pills-p2" role="tabpanel" aria-labelledby="pills-p2-tab">

     <div class=" justify-content-between my-4" style="border:5px solid green; border-radius: 10px; overflow:hidden;">

   
       <p class="text-center display-5   p-2 " style="font-weight:bold;">Edit Paragraph 2</p>

       <form action="" method="post" enctype="multipart/form-data" class="my-5 " style="border:2px solid black;padding:10px;">

          <textarea name="para2" id="tinymce-editor"  placeholder="enter paragraph 2 content"></textarea>

          <button type="submit" name="save2" value="Save" class="btn btn-success p-2 float-end my-5 w-100">Save</button>
       </form>

    </div>
  </div>
  <!-- ***paragraph 1 end*** -->



<!-- paragraph 3 start -->
  <div class="tab-pane fade" id="pills-p3" role="tabpanel" aria-labelledby="pills-p3-tab">

        <div class=" justify-content-between my-4" style="border:5px solid green; border-radius: 10px; overflow:hidden;">
          <p class="text-center display-5   p-2 " style="font-weight:bold;">Edit Paragraph 3</p>

          <form action="" method="post" enctype="multipart/form-data" class="my-5 " style="border:2px solid black;padding:10px;">

            <textarea name="para3" id="tinymce-editor"  placeholder="enter paragraph 1 content"></textarea>

            <button type="submit" name="save3" value="Save" class="btn btn-success p-2 float-end my-5 w-100">Save</button>
          </form>

        </div>

  </div>
  <!-- ***paragraph 1 end*** -->




</div>



<?php

include "../include/connection.php";

if(isset($_POST['asubmit']))
{
    $imgname=$_FILES["aimage"]["name"];
    $imgtemp=$_FILES["aimage"]["tmp_name"];
    
    $folder="../imgstore/".$imgname;
    move_uploaded_file($imgtemp,$folder); 
    $aname=$_POST['aname'];
    $aabout=$_POST['aabout'];

    $insert="INSERT INTO author(name,about,image) VALUES('$aname','$aabout','$folder')";

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







    
</body>
</html>