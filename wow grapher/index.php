<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <link rel="stylesheet" href="CSS/style.css" type="text/css" />
    <!--Index Link CSS Link-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- ================REMIXICON LINK================================ -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- ==============================BOXICON LINKS============================= -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!--===============================SWIPPER CDN LIBRARY LINK===========================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- ===========================>>>FONT AWESOME LINK <<<=================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- =======================Header css link ====================================-->

</head>

<body>
    <!-- >>>>>>>>>>>>>>>>>>>>>>>>SECTION 1 HEADER SECTION<<<<<<<<<<<<<<<<<<<<<<<< -->
    <?php
    include ("include/connection.php");
    ?>
    <?php include ("include/header.php"); ?>

    <!-- =========================================SECTION 2 TEXT============================================== -->

    <!-- <div class="container"> -->
    <div class="container-fluid sec-2">
        <div class="row">
            <!-- START ROW 1 -->
            <div class="hr-top"></div>
            <div class="title-div">
                <!--WEBSITE NAME DIV START-->
                <p class="title">
                    <span id="s1">W</span>
                    <span id="s2" style="margin-left:-25px;">ow </span>
                    <span id="s3">G</span>
                    <span id="s4" style="margin-left:-10px;">rapher</span>
                </p>
            </div>
            <!--WEBSITE NAME DIV CLOSE-->

            <div class="web-text" style="margin-top: 20px;">
                <!--web-text-ON-->
                <p class="title-detail">
                    Make Professional and Unique Designs...
                </p>
                <p class="title-description">
                    WowGrapher Provides you a number of templates that will
                    help you to design Professional Designs.
                    Edit image and enhance Quality with our Enhancer Tool.Compress image size and many more upcoming
                    tools are coming.

                </p>

            </div>
            <!--web-text-OFF-->
        </div>
        <!-- CLOSE ROW 1 -->
    </div>
    <!-- =======================SECTION B(TOOLS SECTION)=================================================== -->
    <div class="container-fluid sec-b">
        <div class="row toolRow">
            <div class="sec-bHeader">
                <p>TOOLS</p>
                <hr>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="webToolOne">
                    <img src="img/idcard.png" alt="Card Image" />
                    <p>Wow Designer</p>
                    <div class="overlay">
                        <a href="wordEditor.php" class="ClickMeIndex">Let's Design</a>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="webToolOne">
                    <img src="img/enhancer.png" alt="Card Image" />
                    <p>Image Enhancer</p>
                    <div class="overlay">
                        <a href="imageEnhancer.php" class="ClickMeIndex">Let's Enhance</a>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="webToolOne">
                    <img src="img/compressorimg.png" alt="Card Image" />
                    <p>Image Compressor</p>
                    <div class="overlay">
                        <a href="Imagecompress.php" class="ClickMeIndex">Compress Image</a>

                    </div>
                </div>
            </div>

            <p class="create-position">
                <a href="create.php" class="create-btn">CREATE</a>
            </p>
        </div>

    </div>
    <!-- ==================================(SEC-3) SECTION============================================================= -->

    <div class="container-fluid sec-3">
        <div class="row slider-row">
            <!-- START ROW 2 -->
            <p class="slider-text-header">Rich Stock collection</p>



            <div class="offset-2 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $gettingdata = "SELECT * FROM template WHERE Orcode=0 ";

                        $result = mysqli_query($connect, $gettingdata);

                        if ($result) {
                            if (
                                mysqli_num_rows($result) >
                                0
                            ) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                    <div class="swiper-slide">
                                        <img src="backendimages/<?php echo $row["image"]; ?>" alt="templates">
                                    </div>
                                    <?php
                                }
                            }
                        }

                        ?>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>

            <div class="slider-text">
                <p class="slider-text-1">100+ Free Amazing Stock Images</p>
                <p class="slider-text-2">All Elements are totally free to use.</p>
            </div>
            <p class="see-more">
                <a href="templates.php" class="see-btn">SEE MORE</a>
            </p>
        </div>
    </div>

    <!--========================Section 3 (TESTIMONIALS) ==========================  -->
    <div class="testimonial-container">
        <span class="test-head">W</span>
        <span class="testimonial">HAT</span>
        <span class="test-head">O</span>
        <span class="testimonial">UR</span>
        <span class="test-head">U</span>
        <span class="testimonial">SERS</span>
        <span class="test-head">S</span>
        <span class="testimonial">AY</span>
    </div>
    <div class="sec-4" id="reviewsection">
        <div class="wrapper2">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel2">
                <?php
                $gettingdata = "SELECT * FROM feedbacktable";

                $result2 = mysqli_query($connect, $gettingdata);

                if ($result2) {
                    if (
                        mysqli_num_rows($result2) >
                        0
                    ) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                            <li class="card2">

                                <h2>
                                    <?php echo $row2["name"]; ?>
                                </h2>
                                <p>
                                    <?php echo $row2["feedback"]; ?>
                                </p>
                            </li>
                            <?php
                        }
                    }
                }

                ?>

            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
    </div>
    <!-- </div> -->
    <!-- ---------------FOOTER SECTION-5============================ -->

    <?php include ("include/footer.php"); ?>




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