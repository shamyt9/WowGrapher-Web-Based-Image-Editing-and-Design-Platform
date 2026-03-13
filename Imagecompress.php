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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Image Compressor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            background: radial-gradient(circle,
                    rgba(154, 171, 255, 1) 9%,
                    rgba(255, 200, 211, 1) 100%);
        }

        #Compresscontainer {
            display: grid;
            grid-template-columns: 20% 35% 35%;
            width: 99%;
            justify-content: space-between;
            margin-top: 30px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.3), inset 2px 2px 1px white, inset -2px -2px 1px black;
            padding: 10px;
            border-radius: 20px;
        }

        #tools {
            display: flex;
            flex-direction: column;
        }

        #controls {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        #qualityValue {
            margin-left: 5px;
        }

        .imageContainer {
            width: 90%;
            height: 700px;

            border-radius: 5px;
            background-color: #fff;
            overflow: hidden;
            padding: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9),
                inset 4px 4px 1px white;
        }

        .imageContainer img {
            max-width: 100%;
            max-height: 100%;
        }

        #tools {
            background-color: #ffffff65;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.9),
                inset 2px 2px 1px white;
        }

        #tools label {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }

        #tools select {
            padding: 5px;
            border: 1px solid #000000;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
        }

        #controls {
            margin-bottom: 20px;
        }

        #controls label {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }

        #controls input[type='range'] {
            width: 100%;
            margin-bottom: 10px;
        }

        #qualityValue {
            font-size: 14px;
            color: #555;
        }

        #tools button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        #tools button:hover {
            background-color: #45a049;
        }

        label {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        input[type='file'] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
        }

        .CompressorHeader {
            font-family: Arial, sans-serif;
            font-size: 28px;
            font-weight: bold;
            color: #212F3C;
            text-align: center;
            padding: 20px;
            background-color: #F4D03F;
            width: 30%;
            border-radius: 10px;
            margin: 22px auto 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: bounceIn 1s ease-in-out infinite alternate;
        }

        @keyframes bounceIn {
            0% {
                transform: translateY(-4px);
                box-shadow: inset 2px 2px 1px white;
                color: #34495E;
            }

            100% {
                transform: translateY(0);
                box-shadow: inset -2px -2px 1px white;

            }
        }


        .CompressorHeader:hover {
            animation: none;
            /* Stop animation on hover */
        }
    </style>
</head>

<body>
    <?php include("include/header.php"); ?>
    <p class="CompressorHeader" style="margin-top:100px;">Wow Image Compressor</p>
    <div id="Compresscontainer">
        <div id="tools">
            <label for="fileInput">Choose File:</label>
            <input type="file" accept="image/*" id="fileInput" onchange="handleFileSelect(event)" />

            <div id="controls">
                <label for="quality">Compression Quality:</label>
                <select id="quality">
                    <option value="0.1">10% (Bad)</option>
                    <option value="0.3">30% (Average)</option>
                    <option value="0.5" selected>50% (Good)</option>
                    <option value="0.7">70% (Better)</option>
                    <option value="1">100% (Best)</option>
                </select>
                <span id="qualityValue">0.5</span>
            </div>
            <p>Original Image Size: <span id="originalSize"></span></p>
            <p>Compressed Image Size: <span id="compressedSize"></span></p>

            <button onclick="compressAndDisplay()">Compress Image</button>
            <button onclick="downloadCompressedImage()">
                Download Compressed Image
            </button>
        </div>

        <div class="imageContainer" id="originalContainer">
            <img id="originalImage" src="#" alt="Original Image" />
        </div>

        <div class="imageContainer" id="compressedContainer">
            <img id="compressedImage" src="#" alt="Compressed Image" />
        </div>
    </div>

    <script>
        function handleFileSelect(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (event) {
                const originalImage =
                    document.getElementById('originalImage');
                originalImage.src = event.target.result;
            };

            reader.readAsDataURL(file);
        }

        function compressAndDisplay() {
            const originalImage = document.getElementById('originalImage');
            const quality = document.getElementById('quality').value;
            compressImage(originalImage.src, quality);
        }

        function compressImage(imageData, quality) {
            const img = new Image();
            img.onload = function () {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                // Calculate scaled dimensions
                const scaleFactor = quality;
                const scaledWidth = img.width * scaleFactor;
                const scaledHeight = img.height * scaleFactor;

                canvas.width = scaledWidth;
                canvas.height = scaledHeight;
                ctx.drawImage(img, 0, 0, scaledWidth, scaledHeight);

                const compressedImageData = canvas.toDataURL(
                    'image/jpeg',
                    quality
                );

                const compressedImage =
                    document.getElementById('compressedImage');
                compressedImage.src = compressedImageData;

                // Update compressed image size
                const compressedSize =
                    document.getElementById('compressedSize');
                compressedSize.textContent = formatBytes(
                    compressedImageData.length
                );

                // Update quality value
                const qualityValue =
                    document.getElementById('qualityValue');
                qualityValue.textContent = quality;
            };
            img.src = imageData;

            // Update original image size
            const originalSize = document.getElementById('originalSize');
            originalSize.textContent = formatBytes(imageData.length);
        }

        function downloadCompressedImage() {
            const compressedImage =
                document.getElementById('compressedImage');
            const link = document.createElement('a');
            link.href = compressedImage.src;
            link.download = 'compressed_image.jpg';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = [
                'Bytes',
                'KB',
                'MB',
                'GB',
                'TB',
                'PB',
                'EB',
                'ZB',
                'YB',
            ];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return (
                parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) +
                ' ' +
                sizes[i]
            );
        }
    </script>
</body>

</html>