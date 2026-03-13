<?php
session_start();
include("include/connection.php");

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
    <title>About Uss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- ================REMIXICON LINK================================ -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- ==============================BOXICON LINKS============================= -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



    <!--===============================SWIPPER CDN LIBRARY LINK===========================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <!-- ===========================>>>FONT AWESOME LINK <<<=================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- =======================Header css link ====================================-->
    <link rel="stylesheet" href="CSS/style.css">

    <!--Index Link CSS Link-->

</head>

<body style="background:url('img/aboutBackground.jpg')">
    <!-- >>>>>>>>>>>>>>>>>>>>>>>>SECTION 1 HEADER SECTION<<<<<<<<<<<<<<<<<<<<<<<< -->
    <?php include("include/header.php"); ?>

    <div class="container-fluid aMainContainer">
        <div class="row aHeaderRow">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 p-5">
                <div class="atextContainer">
                    <div class="aRowOne">
                        <a href="index.php" class="aWebName">
                            <img src="img/idlogo.png" alt="" width="70px" height="70px" />
                            <p class="aWowName">Wow Grapher</p>


                        </a>
                    </div>
                    <div class="aTagline">
                        <p class="aTaglineHeadM">
                        <p class="aTaglineHead">Wowgrapher:Your Gateway to</p>
                        <p class="aTaglineHead" style="margin-top: -20px;">Stunning Visual Stories.</p>

                        </p>

                        <p class="aTaglineDesc">
                            WowGrapher provide you a rich varieties of
                            <br />
                            helpful services that makes your work easier and
                            faster.
                        </p>
                    </div>
                </div>
            </div>
            <!-- row 1 end -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 d-flex justify-content-end">
                <img src="img/idcard.png" alt="" class="aheaderImg" />
            </div>
            <!-- row 2 end -->
        </div>
    </div>


    <!--********************* container 2 **************************************-->

    <div class="container aMainContainer2">
        <div class="C2TextHead">
            Try WowGrapher. Right Here. Right Now.

        </div>


        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <a href="createIdCard.php" class="aCardLink">
                    <div class="aCard">
                        <img src="img/idcard.png" alt="">
                        <p>Wow Editor</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <a href="result.php" class="aCardLink">
                    <div class="aCard">
                        <img src="img/result/Rtemp5.png" alt="">
                        <p>Wow Result Generator</p>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <a href="imageEnhancer.php" class="aCardLink">
                    <div class="aCard">
                        <img src="img/aimg4.jpg" alt="">
                        <p>Wow Enhancer</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="aExploreMore"><a href="create.php">Explore More</a></div>

    </div>

    <div class="container-fluid aMainContainer3">
        <div class="C2TextHead2">
            Upcoming Wow Features Soon.

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="aCard2">
                        <img src="img/textstyle4.png" alt="Card image">
                        <p>Wow Stylish Text</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="aCard2">
                        <img src="img/logoCard.png" alt="Card image">
                        <p>Wow Logo Designer</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="aCard2">
                        <video autoplay loop>
                            <source src="img/textAnimation.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <p>Wow Text Animation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="aDecsriptionContainer">
        <h1>About WowGrapher</h1>
        <p>Welcome to WowGrapher, your ultimate destination for all your image editing needs!</p>
        <p>At WowGrapher, we offer a wide range of powerful tools and features to enhance your images and unleash
            your creativity.</p>
        <div class="feature-list">
            <h2>Key Features:</h2>
            <ul>
                <li><span class="emphasis">Image Editing:</span> Our advanced image editing tools allow you to crop,
                    resize, adjust colors, and apply filters to your images with ease.</li>
                <li><span class="emphasis">Image Enhancer:</span> Take your photos to the next level with our image
                    enhancement feature, which automatically improves the quality and clarity of your images.</li>
                <li><span class="emphasis">Stylish Text Designer:</span> Add text to your images in style! Choose
                    from a variety of fonts, colors, and styles to create eye-catching text designs.</li>
                <li><span class="emphasis">Report Card Generator:</span> Create professional-looking report cards
                    and certificates with our easy-to-use report card generator. Customize templates and add your
                    own content with just a few clicks.</li>
                <li><span class="emphasis">More:</span> Explore a plethora of other exciting features
                    including collage maker, Text Animations, background remover, and much more!</li>
            </ul>
        </div>
        <p>With WowGrapher, the possibilities are endless. Whether you're a professional photographer, a social
            media enthusiast, or just someone who loves to have fun with photos, WowGrapher has everything you need
            to bring your images to life.</p>
        <p>Start creating amazing visuals today with WowGrapher!</p>
    </div>

    <?php include("include/footer.php"); ?>




    <!-- =======================LINKS OF ICONS (SEARCH)============================= -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- =====================SWIPPER .JS LINK ===================================== -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- ======================JQUERY CDN LINK================================ -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- =====================EXTERNAL SCRIPT JS LINK================================ -->
    <script src="jscode/script.js"></script>

</body>

</html>