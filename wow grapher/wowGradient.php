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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5), inset 2px 2px 1px white, inset -2px -2px 1px red;
            padding: 40px;
            border-radius: 10px;

        }

        .gradient-container {
            width: 100%;
            height: 70vh;
            background: linear-gradient(to right, red, yellow);
        }

        .controls {
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .controls button,
        .controls input[type='color'] {
            padding: 8px 16px;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .controls input[type='range'] {
            width: 200px;
        }

        #download-btn {
            background-color: #4caf50;
            color: white;
            border: 2px solid white;
        }

        #random-btn,
        #custom-btn {
            background-color: #007bff;
            color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border: 2px solid white;
        }

        #random-btn:hover,
        #custom-btn:hover {
            background-color: green;
        }

        input[type='number'] {
            width: 60px;
        }
    </style>
</head>

<body>
    <?php include ("include/header.php"); ?>
    <div class="container">
        <div class="gradient-container" id="gradient-container">
            <!-- Gradient background will be applied here -->
        </div>
        <div class="controls">
            <button id="random-btn">Generate Random Background</button>
            <input type="color" id="color1" value="#ff0000" />
            <input type="color" id="color2" value="#ffff00" />

            <input type="range" id="angle" min="0" max="360" step="1" value="0" />
            <button id="custom-btn">Generate Custom Background</button>
            <button id="download-btn">Download as 4K Image</button>
        </div>
    </div>

    <canvas id="canvas" style="display: none"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script>
        // Function to generate random color
        function randomColor() {
            return '#' + Math.floor(Math.random() * 16777215).toString(16);
        }

        // Function to generate random gradient background
        function generateRandomBackground() {
            const color1 = randomColor();
            const color2 = randomColor();
            const angle = Math.floor(Math.random() * 360); // Random angle between 0 and 359
            const gradient = `linear-gradient(${angle}deg, ${color1}, ${color2})`;
            document.getElementById('gradient-container').style.background =
                gradient;
        }

        // Function to generate custom gradient background
        function generateCustomBackground() {
            const color1 = document.getElementById('color1').value;
            const color2 = document.getElementById('color2').value;

            const angle = document.getElementById('angle').value || 0;
            const gradient = `linear-gradient(${angle}deg, ${color1}, ${color2})`;
            document.getElementById('gradient-container').style.background =
                gradient;
        }

        // Function to download canvas as image
        function downloadAsImage() {
            const canvas = document.getElementById('canvas');
            const ctx = canvas.getContext('2d');
            const container = document.getElementById('gradient-container');
            canvas.width = container.offsetWidth * devicePixelRatio;
            canvas.height = container.offsetHeight * devicePixelRatio;
            ctx.scale(devicePixelRatio, devicePixelRatio);

            html2canvas(container).then((canvas) => {
                const link = document.createElement('a');
                link.download = 'gradient_background.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        }

        // Event listener for random button
        document
            .getElementById('random-btn')
            .addEventListener('click', generateRandomBackground);

        // Event listener for custom button
        document
            .getElementById('custom-btn')
            .addEventListener('click', generateCustomBackground);

        // Event listener for download button
        document
            .getElementById('download-btn')
            .addEventListener('click', downloadAsImage);

        // Event listener for angle range slider
        document
            .getElementById('angle')
            .addEventListener('input', function () {
                const angleValue = this.value;
                const color1 = document.getElementById('color1').value;
                const color2 = document.getElementById('color2').value;

                const gradient = `linear-gradient(${angleValue}deg,${color1},${color2})`;

                document.getElementById(
                    'gradient-container'
                ).style.background = gradient;
            });
    </script>
</body>

</html>