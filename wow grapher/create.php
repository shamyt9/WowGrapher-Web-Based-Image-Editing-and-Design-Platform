<?php
session_start();
include ("include/connection.php");

$created = $_SESSION['email'];
if ($created) {

} else {
  header("Location:userlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CREATE</title>
  <!-- =====================BOOTSTRAP LINK =================== -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <!-- ================REMIXICON LINK================================ -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- ==============================BOXICON LINKS============================= -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- ===========================>>>FONT AWESOME LINK <<<=================== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- =========================CUSTOME CSS======================= -->
  <link rel="stylesheet" href="CSS/style.css">


  <style>
    body {

      padding: 0;
      background-image: linear-gradient(rgba(20, 23, 61, 0.5), rgba(20, 23, 61, 0.5)), url('img/bg9.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>
  <?php include ("include/header.php"); ?>


  <div class="container CMainToolContainer">
    <p class="ToolHeader">Tools</p>
    <div class="row">
      <!-- Card 1 -->
      <div class="CtoolCardContainer">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="wordEditor.php" class="CCardLink">
            <div class="CCard">
              <img src="img/idcard.png" alt="" />
            </div>
            <p>Wow Editor</p>
          </a>
        </div>

        <!-- Card 2 -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="bgeraser.php" class="CCardLink">
            <div class="CCard">
              <video autoplay loop>
                <source src="img/bgremover.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
            <p>Wow Background Remover</p>
          </a>
        </div>

        <!-- Card 3 -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="imageEnhancer.php" class="CCardLink">
            <div class="CCard">
              <img src="img/aimg4.jpg" alt="" />
            </div>
            <p>Wow Enhancer</p>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="Imagecompress.php" class="CCardLink">
            <div class="CCard">
              <img src="img/compressorimg.png" alt="" />
            </div>
            <p>Wow Copressor</p>
          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Card 5 -->
      <div class="CtoolCardContainer">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="result.php" class="CCardLink">
            <div class="CCard">
              <img src="img/result/Rtemp5.png" alt="" />
            </div>
            <p>Wow Result Generator</p>
          </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="WowText.php" class="CCardLink">
            <div class="CCard">
              <img src="img/textstyle.png" alt="" />
              <img src="img/textstyle2.png" alt="" />
              <img src="img/textstyle3.png" alt="" />
            </div>
            <p>Wow Text</p>
          </a>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="wowResizer.php" class="CCardLink">
            <div class="CCard">
              <img src="img/imageResize.png" alt="" />


            </div>
            <p>Wow Resizer</p>
          </a>
        </div>


        <!-- Card 6 -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="wowGradient.php" class="CCardLink">
            <div class="CCard">
              <img src="img/gradientBackground.png" alt="" />

            </div>
            <p>Wow Gradient</p>
          </a>
        </div>



      </div>
      <div class="CtoolCardContainer">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="#" class="CCardLink">
            <div class="CCard">
              <video autoplay loop>
                <source src="img/textAnimation.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
            <p>Wow Text Animation</p>
          </a>
        </div>
        <!-- Card 7 -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
          <a href="#" class="CCardLink">
            <div class="CCard">
              <img src="img/logoCard.png" alt="" />
            </div>
            <p>Wow Logo Maker</p>
          </a>
        </div>
        <!-- card 8 -->
      </div>
    </div>
  </div>


  <!-- ......................EDITING CODES END ........................... -->
  <?php include ("include/footer.php"); ?>
  <!-- =======================LINKS OF ICONS (SEARCH)============================= -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <!-- =====================SWIPPER .JS LINK ===================================== -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- ======================JQUERY CDN LINK================================ -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

  <!-- =====================EXTERNAL SCRIPT JS LINK================================ -->

</body>

</html>