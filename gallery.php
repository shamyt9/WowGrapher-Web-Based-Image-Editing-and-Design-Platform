<?php
session_start();
include ("include/connection.php");

$created = $_SESSION['email'];

if (!$created) {
    header("Location:userlogin.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- ================REMIXICON LINK================================ -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- ==============================BOXICON LINKS============================= -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            background-image: linear-gradient(rgba(255, 255, 255, 0.6), rgba(20, 23, 61, 0.8)), url('img/bg9.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        /* .gallery {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }*/

        .lcard .image {
            display: flex;
            flex-direction: column;
            height: 300px;
            border: 2px solid white;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .lcard .image img {
            max-width: 100%;
            max-height: 70%;
            object-fit: contain;
            border-radius: 5px;
        }

        .lcard .image img:hover {
            scale: 0.9;
            transition: 0.2s ease-out;
        }

        .lcard {
            display: grid;
            grid-gap: 10px;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            grid-auto-rows: 300px;
        }

        .image:hover {

            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
            cursor: pointer;
        }

        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('img/aboutBackground.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .fullscreen.active {
            opacity: 1;
            pointer-events: auto;
        }

        .fullscreen img {
            max-width: 90%;
            max-height: 90%;
        }

        .galleryContainer {
            margin-top: 150px;
            height: auto;
            padding: 20px;
        }

        .textElement {
            display: flex;
            flex-direction: column;
            line-height: 5px;
            text-align: center;
            margin-top: 15px;
        }

        .textElement p {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 20px;
            font-weight: bold;
            border-radius: 10px;
            color: black;
        }

        .creatorLikes {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
            font-size: 14px;
            color: #666;

            /* Adjust the color according to your design */
        }

        .creatorLikes p {
            margin: 0;
        }




        /*.creatorLikes {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 20px;
        }*/

        .like-icon {
            position: absolute;
            font-size: 25px;
            color: red;
        }

        .like-icon:hover {
            scale: 1.5;
            transition: 0.1s ease;
            color: red;

        }

        .like-icon.liked {
            color: red;
        }

        .galleryHeader {
            font-size: 50px;
            font-weight: bold;
            text-align: center;
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body>
    <?php include ("include/header.php"); ?>
    <div class="container galleryContainer">
        <p class="galleryHeader">Gallery</p>
        <div class="gallery">
            <div class="lcard">

            </div>
        </div>
    </div>
    <div class="fullscreen" id="fullscreen"></div>
    <!-- jquery cdn link -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            //retrieving image from backend
            function getImage() {
                $.ajax({
                    url: "backendCode/showGallery.php",
                    type: "POST",
                    success: function (data) {
                        if (data) {
                            $(".lcard").html(data);
                        }
                        else {
                            window.location.href = "include/404Error.php";
                        }


                    }
                })
            }
            setInterval(getImage, 5000);
            getImage();

            $(document).on("click", ".like-icon", function () {
                var getId = $(this).data("id");
                $.ajax({
                    url: "backendCode/likeImage.php",
                    type: "POST",
                    data: { imageId: getId },
                    success: function (data) {
                        getImage();
                    }
                })
            })

        });

    </script>



</body>

</html>