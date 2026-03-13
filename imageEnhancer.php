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
  <title>Image Enhancer</title>

  <link rel="stylesheet" href="CSS/enhancer.css">
  <link rel="stylesheet" href="CSS/header.css">
</head>

<body>
  <?php include("include/header.php"); ?>
  <div class="Econtainer" style="margin-top:100px;">
    <div class="tools-container">
      <label for="uploadInput" class="custom-file-upload">
        Choose Image
      </label>
      <input type="file" id="uploadInput" accept="image/*" style="display: none" />

      <div class="controls">
        <label for="brightness">Brightness:</label>
        <input type="range" id="brightness" min="0" max="200" value="100" />
        <label for="contrast">Contrast:</label>
        <input type="range" id="contrast" min="0" max="200" value="100" />
        <label for="saturation">Saturation:</label>
        <input type="range" id="saturation" min="0" max="200" value="100" />
        <label for="vignette">Vignette:</label>
        <input type="range" id="vignette" min="0" max="100" value="0" />
        <label for="opacity">Opacity:</label>
        <input type="range" id="opacity" min="0" max="100" value="100" />
        <label for="blur">Blur:</label>
        <input type="range" id="blur" min="0" max="10" step="0.1" value="0" />
        <label for="rotation">Rotation:</label>
        <input type="range" id="rotation" min="0" max="360" value="0" />

        <label for="invert">Invert:</label>
        <input type="range" id="invert" min="0" max="100" value="0" />
      </div>
      <button id="downloadBtn">Download Enhanced Image</button>
    </div>
    <div class="preview-container">
      <h2>Preview</h2>
      <canvas id="previewCanvas"></canvas>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="jscode/enhancer.js"></script>

</body>

</html>

</body>

</html>