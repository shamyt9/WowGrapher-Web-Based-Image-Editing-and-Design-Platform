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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WowResizer</title>
    <style>
        body {
            padding: 0;
            background-image: linear-gradient(rgba(255, 23, 61, 0.5), rgba(20, 23, 61, 0.5)), url('img/bg9.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .Rcontainer {
            max-width: 450px;
            margin: 200px auto;
            backdrop-filter: blur(25px);
            text-align: center;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), inset -8px -8px 1px black, inset 2px 2px 1px white;

        }

        .Rcontainer h1 {
            margin-bottom: 20px;
            font-size: 50px;
            color: #333;
            font-weight: bold;
        }

        input[type='file'] {
            margin-bottom: 10px;
            display: none;
        }

        label {
            margin-right: 5px;
            color: #555;
        }

        input[type='number'],
        select {
            width: 70px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        #output {
            margin-top: 20px;
        }

        p {
            margin: 0;
            color: #555;
        }

        #originalImageContainer img,
        #output canvas {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php include ("include/header.php"); ?>
    <div class="Rcontainer">
        <h1>Wow Resizer</h1>
        <label for="fileInput" id="uploadLabel" class="btn btn-success mb-2">Upload Image</label>
        <input type="file" id="fileInput" accept="image/*" />
        <div id="originalImageContainer"></div>
        <div>
            <label for="widthInput">Width:</label>
            <input type="number" id="widthInput" />
            <select id="widthUnit">
                <option value="px">px</option>
                <option value="cm">cm</option>
                <option value="inch">inch</option>
                <option value="%">%</option>
            </select>
        </div>
        <div>
            <label for="heightInput">Height:</label>
            <input type="number" id="heightInput" />
            <select id="heightUnit">
                <option value="px">px</option>
                <option value="cm">cm</option>
                <option value="inch">inch</option>
                <option value="%">%</option>
            </select>
        </div>
        <button id="resizeButton">Resize</button>
        <button id="downloadButton" style="display: none">
            Download Resized Image
        </button>
        <div id="output"></div>
    </div>

    <script>
        document
            .getElementById('uploadLabel')
            .addEventListener('click', function () {
                document.getElementById('fileInput').click();
            });

        document
            .getElementById('fileInput')
            .addEventListener('change', function () {
                var fileInput = document.getElementById('fileInput');
                var originalImageContainer = document.getElementById(
                    'originalImageContainer'
                );

                if (!fileInput.files[0]) {
                    return;
                }

                var file = fileInput.files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = new Image();
                    img.src = e.target.result;

                    img.onload = function () {
                        originalImageContainer.innerHTML =
                            '<p>Original Image:</p>';
                        originalImageContainer.appendChild(img);
                    };
                };

                reader.readAsDataURL(file);
            });

        document
            .getElementById('resizeButton')
            .addEventListener('click', function () {
                var fileInput = document.getElementById('fileInput');
                var widthInput =
                    document.getElementById('widthInput').value;
                var heightInput =
                    document.getElementById('heightInput').value;
                var widthUnit = document.getElementById('widthUnit').value;
                var heightUnit =
                    document.getElementById('heightUnit').value;
                var output = document.getElementById('output');

                if (!fileInput.files[0]) {
                    output.innerHTML = '<p>Please select an image.</p>';
                    return;
                }

                var file = fileInput.files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = new Image();
                    img.src = e.target.result;

                    img.onload = function () {
                        var canvas = document.createElement('canvas');
                        var ctx = canvas.getContext('2d');
                        var width = widthInput;
                        var height = heightInput;

                        if (widthUnit === '%') {
                            width = img.width * (widthInput / 100);
                        } else if (widthUnit === 'cm') {
                            width = widthInput * 37.8; // Approximation for converting cm to pixels
                        } else if (widthUnit === 'inch') {
                            width = widthInput * 96; // Approximation for converting inches to pixels
                        }

                        if (heightUnit === '%') {
                            height = img.height * (heightInput / 100);
                        } else if (heightUnit === 'cm') {
                            height = heightInput * 37.8; // Approximation for converting cm to pixels
                        } else if (heightUnit === 'inch') {
                            height = heightInput * 96; // Approximation for converting inches to pixels
                        }

                        canvas.width = width;
                        canvas.height = height;

                        ctx.drawImage(img, 0, 0, width, height);

                        output.innerHTML = '<p>Resized Image:</p>';
                        output.appendChild(canvas);
                    };
                };

                reader.readAsDataURL(file);
                document.getElementById('downloadButton').style.display =
                    'inline-block';
            });

        document
            .getElementById('downloadButton')
            .addEventListener('click', function () {
                var canvas = document.querySelector('canvas');
                var url = canvas.toDataURL('image/png');
                var a = document.createElement('a');
                a.href = url;
                a.download = 'resized_image.png';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            });
    </script>
</body>

</html>