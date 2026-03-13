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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wow Background Eraser</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <style>
        body {
            background: linear-gradient(to bottom right, #bdc3c7, #2c3e50);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            height: 90vh;
        }

        .card {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
            border: 2px solid black;
            height: 100%;
        }

        .form-group {
            margin-bottom: 0;
        }

        #previewImageContainer,
        #uploadedImageContainer {
            border: 1px dotted white;
            padding: 10px;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #uploadedImageContainer img,
        #previewImageContainer img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
        }

        #upload {
            margin-top: 20px;
        }

        .progress-bar {
            transition: width 0.3s ease-in-out;
        }

        @media (max-width: 576px) {

            /* Adjustments for small screens */
            #previewImageContainer,
            #uploadedImageContainer {
                height: 250px;
                /* Decrease height for small screens */
            }

            .container {
                height: 100vh;
            }
        }

        @media (max-width: 768px) {

            /* Adjustments for tablets */
            #previewImageContainer,
            #uploadedImageContainer {
                height: 350px;
                /* Decrease height for tablets */
            }
        }

        @media (min-width: 577px) and (max-width: 767px) {

            /* Adjustments for screens between 577px and 767px */
            #previewImageContainer,
            #uploadedImageContainer {
                height: 300px;
                /* Decrease height for screens between 577px and 767px */
            }
        }
    </style>
</head>

<body>
    <?php include("include/header.php"); ?>
    <div class="container " style="margin-top:100px;">
        <div class="row mt-4">
            <div class="col-md-6">
                <div id="previewContainer" class="card">
                    <div class="card-body">
                        <h5 class="card-title">Original Image</h5>
                        <div id="previewImageContainer"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="uploadedContainer" class="card" style="display: none">
                    <div class="card-body">
                        <h5 class="card-title">Erased Image</h5>
                        <div id="uploadedImageContainer"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 card mt-5">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 33.33%">
                                <form>
                                    <div class="form-group">
                                        <label for="fileInput" class="btn btn-primary btn-block">
                                            Select a File
                                            <input id="fileInput" class="form-control-file" type="file"
                                                onchange="previewImage(event)" style="display: none" />
                                        </label>
                                    </div>
                                </form>
                            </td>
                            <td style="width: 33.33%">
                                <input class="btn btn-primary m-1 btn-block" type="button" onclick="submitHandler()"
                                    value="Upload" id="upload" />
                            </td>
                            <td style="width: 33.33%">
                                <button class="btn btn-warning btn-block" onclick="downloadFile()" id="downloadButton"
                                    style="display: none">
                                    Download
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Progress bar -->
                <div class="progress" style="display: none" id="progressBarContainer">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        0%
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
        let erasedImageURL;

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                const previewImage = document.createElement('img');
                previewImage.src = reader.result;
                document.getElementById('previewImageContainer').innerHTML =
                    '';
                document
                    .getElementById('previewImageContainer')
                    .appendChild(previewImage);
            };

            reader.readAsDataURL(file);
        }

        function submitHandler() {
            console.log('click');
            const fileInput = document.getElementById('fileInput');
            console.log(fileInput.files);
            const image = fileInput.files[0];

            // Show progress bar
            document.getElementById('progressBarContainer').style.display =
                'block';
            // Start updating progress
            // Start updating progress
            const progressBar = document.querySelector('.progress-bar');
            const interval = setInterval(function () {
                // Update progress
                progressBar.style.width =
                    parseInt(progressBar.style.width, 10) + 2 + '%'; // Increase by 5% each time
                progressBar.innerHTML = progressBar.style.width;
                if (parseInt(progressBar.style.width, 10) >= 100) {
                    // Hide progress bar when progress reaches 100%
                    clearInterval(interval);
                    document.getElementById(
                        'progressBarContainer'
                    ).style.display = 'none';
                }
            }, 50); // Decrease the interval duration to 50 milliseconds for faster growth

            // Multipart file
            const formData = new FormData();
            formData.append('image_file', image);
            formData.append('size', 'auto');

            const apiKey = 'LBQXx3P3X2jFzBQPJ8UP2Qkc';

            fetch('https://api.remove.bg/v1.0/removebg', {
                method: 'POST',
                headers: {
                    'X-Api-Key': apiKey,
                },
                body: formData,
            })
                .then(function (response) {
                    return response.blob();
                })
                .then(function (blob) {
                    console.log(blob);
                    const url = URL.createObjectURL(blob);
                    const img = document.createElement('img');
                    img.src = url;
                    document.getElementById(
                        'uploadedImageContainer'
                    ).innerHTML = '';
                    document
                        .getElementById('uploadedImageContainer')
                        .appendChild(img);
                    erasedImageURL = url; // Store erased image URL

                    // Show the uploaded image container and download button
                    document.getElementById(
                        'uploadedContainer'
                    ).style.display = 'block';
                    document.getElementById(
                        'downloadButton'
                    ).style.display = 'block';
                })
                .catch();
        }

        function downloadFile() {
            var anchorElement = document.createElement('a'); //<a></a>
            anchorElement.href = erasedImageURL; // Download erased image
            anchorElement.download = 'erased_image.png';
            document.body.appendChild(anchorElement);

            anchorElement.click();

            document.body.removeChild(anchorElement);
        }
    </script>
</body>

</html>