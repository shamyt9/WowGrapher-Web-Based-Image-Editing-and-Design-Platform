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
    <title>idcardeditor</title>
    <!-- ////////////////////////////////////////////////////////////////////// -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://unpkg.com/interactjs@1.10.11/dist/interactjs/interact.min.css" />
    <!-- /////////////////////////////////////////////////////////////////////////// -->

    <!-- BOOtSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.css"
        integrity="sha512-GL7EM8Lf8kU23I3kTio2kRWt8YRDVIQcSZjRVtVRfk05kB/QvkyafuTC94Ev0X6qk7Z0r5s06c1lsP1p/ezDYw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/create.css">

    <style>
        body {
            background: url('img/aboutBackground.jpg');
            background-size: cover;
        }

        #formatting-options {
            margin: 10px;
        }

        #working-canvas {
            position: relative;
            border: 1px solid black;
            top: 0%;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            background: white;
            width: 1280px;
            height: 720px;
            overflow: hidden;
        }


        button,
        select,
        input {
            margin-right: 5px;
        }

        #textStrokeWidth,
        #textShadowOffsetX,
        #textShadowOffsetY,
        #textShadowBlur {
            width: 50px;
            margin-right: 5px;
        }

        .textFormattingTool,
        .imageEditContainer {
            background: rgb(15, 16, 27);
            width: 260px;
            height: 820px;
            margin-top: 0;
            margin-left: 1650px;
            box-shadow: -4px 0 2px rgb(163, 45, 2);
            /*/border-top-right-radius: 20px;
                        border-top-left-radius:20px ;*/
            border: 2px solid white;
            display: none;
            overflow-y: auto;
        }

        .textFormattingTool::-webkit-scrollbar,
        .imageEditContainer::-webkit-scrollbar {
            width: 20px;
        }

        .textFormattingTool::-webkit-scrollbar-thumb,
        .imageEditContainer::-webkit-scrollbar-thumb {
            background-color: #2C3E50;
            border: 1px solid #ABB2B9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);

        }

        .textFormattingTool::-webkit-scrollbar-track,
        .imageEditContainer::-webkit-scrollbar-track {
            background-color: #5D6D7E;

        }

        .formatTextHover {
            background: black;
            color: rgb(0, 191, 255);
            border-radius: 20px;
            padding: 10px;
            width: 90%;
            font-size: 1.5rem;
            cursor: pointer;
            transition: 0.2s ease-in-out;
            box-shadow: 2px 2px 3px rgb(0, 191, 255), -2px -2px 4px rgb(0, 191, 255);
        }

        .draggable {
            position: absolute;
            cursor: move;
        }

        .resizable {
            border: 1px solid #000;
            overflow: hidden;
        }

        .resize-handle {
            width: 10px;
            height: 10px;
            background-color: #000;
            position: absolute;
            bottom: 0;
            right: 0;
            cursor: nwse-resize;
        }

        .activeImage {
            border: 2px dotted black;
        }

        #imageInput {
            display: none;
            /* Hide the original file input */
        }

        .customImage {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .customImage i {
            margin-right: 5px;
        }

        #imageInput:focus+.customImage {
            outline: 2px solid #3498db;
            outline-offset: -2px;
        }

        /* image offcanvas styling */
        .widthHeightSlider,
        .imageBorder,
        .imageBoxShadow,
        .slider-container {
            background: #2c3e50;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .Imagewidth,
        .Imageheight,
        .borderRadius,
        .imageBorderWidth,
        .imageBorderColor {
            margin-bottom: 15px;
        }

        .slider-label {
            font-size: 1.2rem;
            margin-bottom: 10px;
            text-align: center;
            color: #F8F9F9;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .Sliders {
            width: 100%;
        }

        .imageInputBox {
            width: calc(100% - 10px);
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #34495e;
            color: white;
            outline: none;
            font-size: 14px;
        }

        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background-color: #7f8c8d;
            outline: none;
            margin: 5px 0;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #3498db;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #3498db;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <div class="main-editing-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img src="img/idlogo.png" alt="" class="idLogo" />
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="transform:translateY(22%);">
                            <a class="Canvasborder" href="index.php"
                                style="text-decoration:none; color:red;background-color:black;font-weight:bold;padding:12px;">
                                <i class="fa-solid fa-home fa-beat"></i>&nbsp;&nbsp;Home Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <p class="templates" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fa-solid fa-fire fa-beat"></i>&nbsp;&nbsp;Templates
                            </p>
                        </li>
                        <li class="nav-item">
                            <p class="page-size" id="sizeButton">
                                <i class="fa-solid fa-expand fa-beat"></i>&nbsp;&nbsp;Size
                            </p>
                        </li>

                        <li>
                            <input type="file" id="imageInput" accept="image/*" />
                            <label for="imageInput" class="customImage">
                                <i class="fas fa-images fa-address-card fa-beat"></i>
                                Add Images
                            </label>
                        </li>
                        <li class="nav-item">
                            <p class="shapes" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <i class="fa-solid fa-shapes fa-address-card fa-beat"></i>&nbsp;&nbsp;Add Shapes
                            </p>
                        </li>
                        <li class="nav-item">
                            <p class="Canvasborder" id="addBorder" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="fa-regular fa-border-all fa-bounce"></i>&nbsp;&nbsp;Border
                            </p>
                        </li>

                        <li class="nav-item">
                            <p class="download" id="downloadBtn">
                                <i class="fa-solid fa-download fa-beat"></i>&nbsp;&nbsp;Download
                            </p>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>

        <!-- ==========TOOL CONTAINER ==================== -->

        <div class="tool-container">
            <div class="add-text tools" title="Add-text">
                <table style="border-collapse: collapse;">
                    <tr>
                        <th style="border:none;"><i class="fa-solid fa-plus fa-beat"></i></th>
                        <th style="border:none;">AddText</th>
                    </tr>
                </table>
            </div>
            <div class="format-text tools" title="Add-text">
                <table style="border:none;border-collapse: collapse;">
                    <tr>
                        <th style="border:none;">
                            <i class="fa-solid fa-pen-to-square fa-beat"></i>
                        </th>
                        <th style="border:none;">EditText</th>
                    </tr>
                </table>
            </div>

            <div class="format-Image tools" title="Add-text">
                <table style="border:none; border-collapse: collapse;">
                    <tr>
                        <th style="border:none;">
                            <i class="fa-solid fa-pen-to-square fa-beat"></i>
                        </th>
                        <th style="border:none;"></th>
                        <th style="border:none;">Image</th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="workingAreaShadow">
            <div id="working-canvas"></div>
        </div>

        <div class="color-range-box">
            <input type="color" id="colorPicker" value="#000000" />
        </div>

        <div class="color-bg-box">
            <input type="color" id="bgPicker" value="#ffffff" />
            <p class="fontBgNone" style="
                        color: red;
                        font-weight: bold;
                        font-size: 1.3rem;
                        cursor: pointer;
                    ">
                None
            </p>
        </div>

        <div class="textFormattingTool">
            <h3 class="text-center" style="color: aqua">Text Tools</h3>
            <div id="formatting-options">
                <div class="BI">
                    <button id="bold">
                        <i class="fa-solid fa-bold fa-beat"></i>
                    </button>
                    <button id="italic">
                        <i class="fa-solid fa-italic fa-beat"></i>
                    </button>
                    <button id="underline">
                        <i class="fa-solid fa-underline fa-beat"></i>
                    </button>
                    <button id="strikethrough">
                        <i class="fa-solid fa-strikethrough fa-beat"></i>
                    </button>
                </div>
                <div class="TA">
                    <button id="alignLeft">
                        <i class="fa-solid fa-arrow-left fa-beat"></i>
                    </button>

                    <button id="alignCenter">
                        <i class="fa-solid fa-arrow-up fa-beat"></i>
                    </button>
                    <button id="alignJustify">
                        <i class="fa-solid fa-arrow-down fa-beat"></i>
                    </button>
                    <button id="alignRight">
                        <i class="fa-solid fa-arrow-right fa-beat"></i>
                    </button>
                </div>

                <div class="textSizeOption">
                    <select id="fontSize">
                        <option value="1">Size 1</option>
                        <option value="2">Size 2</option>
                        <option value="3">Size 3</option>
                        <option value="4">Size 4</option>
                        <option value="5">Size 5</option>
                        <option value="6">Size 6</option>
                        <option value="7">Size 7</option>
                        <option value="custom">Custom Size</option>
                    </select>
                    <input type="text" id="customSize" placeholder="Enter custom size" style="display: none" />
                </div>

                <div class="fontfamilyoptions">
                    <select name="fontFamily" id="fontFamily">
                        <option value="Arial, sans-serif">Arial</option>
                        <option value="Verdana, sans-serif">Verdana</option>
                        <option value="Georgia, serif">Georgia</option>
                        <option value="Times New Roman, serif">
                            Times New Roman
                        </option>
                        <option value="Courier New, monospace">
                            Courier New
                        </option>
                        <option value="Helvetica, sans-serif">
                            Helvetica
                        </option>
                        <option value="Trebuchet MS, sans-serif">
                            Trebuchet MS
                        </option>
                        <option value="Tahoma, sans-serif">Tahoma</option>
                        <option value="Impact, sans-serif">Impact</option>
                        <option value="Comic Sans MS, cursive">
                            Comic Sans MS
                        </option>
                        <option value="Lucida Sans Unicode, sans-serif">
                            Lucida Sans Unicode
                        </option>
                        <option value="Palatino Linotype, serif">
                            Palatino Linotype
                        </option>
                        <option value="Arial Black, sans-serif">
                            Arial Black
                        </option>
                        <option value="Garamond, serif">Garamond</option>
                        <option value="Book Antiqua, serif">
                            Book Antiqua
                        </option>
                        <option value="Franklin Gothic Medium, sans-serif">
                            Franklin Gothic Medium
                        </option>
                        <option value="Century Gothic, sans-serif">
                            Century Gothic
                        </option>
                        <option value="Copperplate, sans-serif">
                            Copperplate
                        </option>
                        <option value="Baskerville, serif">
                            Baskerville
                        </option>
                        <option value="Futura, sans-serif">Futura</option>
                    </select>
                </div>

                <hr style="
                            border: 2px solid orange;
                            height: 3px;
                            width: 100%;
                            background: orange;
                        " />

                <div class="textColorDiv">
                    <table>
                        <tr class="fontColor">
                            <th>
                                <p>Color:</p>
                            </th>
                            <th>
                                <input type="color" id="fontColor" value="#000000" />
                            </th>
                        </tr>

                        <tr class="fongBgColor">
                            <th>
                                <p>Text Bg:</p>
                            </th>
                            <th>
                                <input type="color" id="textBackground" value="#ffffff" />
                            </th>
                        </tr>
                        <tr class="fongBgnone">
                            <th>
                                <p>Background:</p>
                            </th>
                            <th>
                                <p id="fontbgnone">None</p>
                            </th>
                        </tr>
                    </table>
                </div>

                <hr style="
                            border: 2px solid orange;
                            height: 3px;
                            width: 100%;
                            background: orange;
                        " />
                <div class="textStrokeDiv">
                    <p class="text-center">
                        <button id="textStroke">Text Stroke</button>
                    </p>
                    <table>
                        <tr class="strokeWidth">
                            <th>
                                <p>Stroke Width:</p>
                            </th>
                            <th>
                                <input type="range" id="textStrokeWidth" min="0" max="10" value="1" />
                            </th>
                        </tr>
                        <tr class="strokeColor">
                            <th>
                                <p>Stroke Color:</p>
                            </th>
                            <th>
                                <input type="color" id="textStrokeColor" value="#ff0000" />
                            </th>
                        </tr>
                    </table>
                </div>

                <hr style="
                            border: 2px solid orange;
                            height: 3px;
                            width: 100%;
                            background: orange;
                        " />

                <div class="textShadowDiv">
                    <p class="text-center">
                        <button id="textShadow">Text Shadow</button>
                    </p>
                    <table>
                        <tr>
                            <th>
                                <p>X-Offset:</p>
                            </th>
                            <th>
                                <input type="range" id="textShadowOffsetX" min="-10" max="10" value="2" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>Y-offset:</p>
                            </th>
                            <th>
                                <input type="range" id="textShadowOffsetY" min="-10" max="10" value="2" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>Shadow-Blur:</p>
                            </th>
                            <th>
                                <input type="range" id="textShadowBlur" min="0" max="10" value="2" />
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>Shadow Color:</p>
                            </th>
                            <th>
                                <input type="color" id="textShadowColor" value="#000000" />
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- ============IMAGE EDITING OFF CANVAS ======================================== -->
        <div class="imageEditContainer">
            <div class="widthHeightSlider">
                <div class="Imagewidth">
                    <p class="slider-label">Width</p>
                    <input type="range" id="widthSlider" class="Sliders" min="5" max="1000" step="1" value="100" />
                    <input type="text" id="widthValue" placeholder="Enter Width Manually" class="imageInputBox" />
                </div>
                <hr style="height: 3px; background: brown" />

                <div class="Imageheight">
                    <p class="slider-label">Height</p>
                    <input type="range" id="heightSlider" class="Sliders" min="5" max="1000" step="1" value="100" />
                    <input type="text" id="heightValue" placeholder="Enter Height Manually" class="imageInputBox" />
                </div>
            </div>

            <div class="imageBorder" style="background: #17202a">
                <p style="
                            color: white;
                            font-size: 2rem;
                            text-align: center;
                            font-weight: 500;
                        ">
                    Border
                </p>
                <hr style="height: 3px; background: brown" />
                <div class="borderRadius">
                    <p class="slider-label">Radius</p>

                    >
                    <input type="range" id="radiusSlider" class="Sliders" min="0" max="100" step="1" value="0" />
                    <input type="text" id="radiusValue" class="imageInputBox" placeholder="Enter Radius Manually" />
                </div>

                <hr style="height: 3px; background:brown" />

                <div class="imageBorderWidth">
                    <p class="slider-label">Width</p>
                    >
                    <input type="range" id="borderWidthSlider" class="Sliders" min="1" max="200" step="1" value="1" />
                    <input type="text" id="borderWidthValue" class="imageInputBox"
                        placeholder="Enter Border Manually" />
                </div>
                <hr style="height: 3px; background: brown" />

                <div class="imageBorderColor">
                    <p class="slider-label">Color</p>

                    <input type="color" id="borderColor" value="#000000" style="
                                width: 100%;
                                box-shadow: 0 0 10px rgb(204, 255, 0);
                            " />
                </div>
            </div>

            <div class="imageBoxShadow">
                <p style="
                            color: white;
                            font-size: 2rem;
                            text-align: center;
                            font-weight: 500;
                        ">
                    Shadow
                </p>

                <hr style="height: 3px; background: brown" />

                <p class="slider-label">Box Shadow-X</p>
                <input type="range" id="boxShadowX" class="Sliders" min="-500" max="500" step="1" value="0" />
                <input type="text" id="boxShadowXValue" class="imageInputBox"
                    placeholder="Enter X-axis Value Manually" />

                <hr style="height: 3px; background: brown" />

                <p class="slider-label">Box Shadow-Y</p>
                <input type="range" id="boxShadowY" class="Sliders" min="-500" max="500" step="1" value="0" />
                <input type="text" id="boxShadowYValue" class="imageInputBox"
                    placeholder="Enter y-axis Value Manually" />

                <hr style="height: 3px; background: brown" />

                <p class="slider-label">Box Shadow Blur</p>
                <input type="range" id="boxShadowBlur" class="Sliders" min="0" max="50" step="1" value="0" />
                <input type="text" id="boxShadowBlurValue" class="imageInputBox"
                    placeholder="Enter shadow Blur Manually" />

                <hr style="height: 3px; background: brown" />

                <p class="slider-label">Box Shadow Color</p>
                <input type="color" id="boxShadowColor" value="#000000" style="
                            width: 100%;
                            box-shadow: 0 0 10px rgb(204, 255, 0);
                        " />
            </div>

            <div class="slider-container" style="background: black">
                <p class="slider-label">Image Blur</p>
                <input type="range" id="imageBlurSlider" class="Sliders" min="0" max="100" step="0.1" value="0" />
                <input type="text" id="imageBlurValue" class="imageInputBox" placeholder="Enter Blur Value Manually" />
            </div>

            <div class="slider-container" style="background: #161f28">
                <p class="slider-label">Brightness</p>
                <input type="range" id="brightnessSlider" class="Sliders" min="0" max="300" step="1" value="100" />
                <input type="text" id="brightnessValue" class="imageInputBox"
                    placeholder="Enter brightness Value Manually" />

                <hr style="height: 3px; background: brown" />

                <p class="slider-label">Saturation</p>
                <input type="range" id="saturationSlider" class="Sliders" min="0" max="300" step="1" value="100" />
                <input type="text" id="saturationValue" class="imageInputBox"
                    placeholder="Enter saturation Value Manually" />

                <hr style="height: 3px; background: brown" />

                <p class="slider-label">Contrast</p>
                <input type="range" id="contrastSlider" class="Sliders" min="0" max="300" step="1" value="100" />
                <input type="text" id="contrastValue" class="imageInputBox"
                    placeholder="Enter contrast Value Manually" />

                <hr style="height: 3px; background: brown" />

                <p class="slider-label">Tint</p>
                <input type="range" id="tintSlider" class="Sliders" min="0" max="300" step="1" value="100" />
                <input type="text" id="tintValue" class="imageInputBox" placeholder="Enter tint Value Manually" />

                <hr style="height: 3px; background:brown" />

                <p class="slider-label">Opacity</p>
                <input type="range" id="opacitySlider" class="Sliders" min="0" max="1" step="0.01" value="1" />
                <input type="text" id="opacityValue" class="imageInputBox" placeholder="Enter opacity 0.1-0.9" />
            </div>
        </div>
    </div>

    <!-- ==========CLICK EVENT TRIGGER HTML PART================= -->

    <!-- Popup box -->
    <div class="popup" id="popupBox">
        <button id="closeButton">
            <i class="fa-solid fa-circle-xmark"></i>
        </button>
        <div class="size-icon-div">
            <div class="onexone" id="square">
                <i class="ri-square-line"></i>
                <p>1 x 1</p>
            </div>
            <div class="onextwo" id="rectangle">
                <i class="ri-rectangle-line "></i>
                <p>1 x 2</p>
            </div>
            <div class="twoxone" id="portrait">
                <i class="fa-solid fa-image-portrait fa-beat"></i>
                <p>2 x 1</p>
            </div>
            <div class="twoxone" id="circleShape">
                <i class="fa-regular fa-circle fa-beat"></i>
                <p>Disc</p>
            </div>
            <div class="twoxone" id="ovalShape">
                <i class="fa-solid fa-egg fa-beat"></i>
                <p>Oval</p>
            </div>



        </div>
    </div>

    <!-- ;;;;;;;;;;;;;;;;;;;;;TEMPLATES MODAL;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; -->
    <!-- Button trigger modal -->

    <!-- Modal -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Modal title
                        <hr />
                        <table>
                            <tr>
                                <th style="border:none;">
                                    <p>Gallery:</p>
                                </th>
                                <th style="border:none;"><input type="file" class="CustomBg" /></th>

                            </tr>

                            <tr>
                                <th style="border:none;">Background Color:</th>
                                <th style="border:none;">
                                    <p>
                                        <input type="color" name="" id="bgcolor" class="bg-color" />
                                    </p>
                                </th>
                            </tr>
                        </table>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="height: 500px; overflow: auto">
                    <div class="container-fluid template-container">
                        <div class="row">
                            <hr />
                            <hr />
                            <?php


                            $gettingdata = "SELECT * FROM template";
                            $result = mysqli_query($connect, $gettingdata);

                            if ($result) {
                                if (
                                    mysqli_num_rows($result) >
                                    0
                                ) {
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <div class="col-12 template-cards">
                                            <div class="card" style="width: 18rem">
                                                <img src="backendimages/<?php echo $row["image"]; ?>" class="card-img-top img"
                                                    alt="...">
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        <?php echo $row["name"]; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="change">
                        Change
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; -->

    <!-- --------------------------------------------------------------------------------------------- -->

    <!-- ================BORDER OFF CANVAS BODY======================= -->

    <div class="offcanvas offcanvas-end offcanvasBorder" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">CANVAS BORDER STYLING</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <table style="padding: 10px">
                <tr>
                    <th style="border:none;">
                        <label for="CanvasRadius">Border Radius:</label>
                    </th>
                    <th style="border:none;">
                        <input type="text" name="CanvasRadius" id="CanvasRadius" class="canvasBorderRadius" value="2"
                            style="
                                    margin-left: 20px;
                                    border-radius: 10px;
                                    width: 80%;
                                    padding: 5px;
                                    border: 2px solid red;
                                    margin-top: 10px;
                                " />
                    </th>
                </tr>
                <tr>
                    <th style="border:none;">
                        <label for="CanvasBorderWidth">Border Width:</label>
                    </th>
                    <th style="border:none;">
                        <input type="number" name="CanvasBorderWidth" id="CanvasWidth" class="canvasBorderWidth"
                            value="5" style="
                                    margin-left: 20px;
                                    border-radius: 10px;
                                    width: 80%;
                                    padding: 5px;
                                    border: 2px solid red;
                                    margin-top: 10px;
                                " />
                    </th>
                </tr>
                <tr>
                    <th style="border:none;">
                        <label for="CanvasBorderType">Border Type:</label>
                    </th>
                    <th style="border:none;">
                        <select name="CanvasBorderType" id="CanvasType" class="canvasBorderStyle" style="
                                    margin-left: 20px;
                                    border-radius: 10px;
                                    width: 80%;
                                    padding: 5px;
                                    border: 2px solid red;
                                    margin-top: 10px;
                                ">
                            <option value="solid" selected>solid</option>
                            <option value="dotted">dotted</option>
                            <option value="dashed">dashed</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th style="border:none;">
                        <label for="CanvasBorderColor">Border Color:</label>
                    </th>
                    <th style="border:none;">
                        <input type="color" id="CanvasColor" class="canvasBorderColor" style="
                                    margin-left: 20px;
                                    border-radius: 10px;
                                    width: 80%;
                                    padding: 5px;
                                    border: 2px solid red;
                                    margin-top: 10px;
                                " />
                    </th>
                </tr>
                <tr>
                    <th style="border:none;">
                        <label for="CanvasBorderColor">Border Image:</label>
                    </th>
                    <th style="border:none;">
                        <input type="file" id="CanvasColor" class="canvasBorderImage" style="
                                    margin-left: 20px;
                                    border-radius: 10px;
                                    width: 80%;
                                    padding: 5px;
                                    border: 2px solid red;
                                    margin-top: 10px;
                                " />
                    </th>
                </tr>
            </table>
        </div>
    </div>
    <!-- ============================================================= -->

    <!-- jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/interactjs@1.10.11/dist/interactjs/interact.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        $(document).ready(function () {
            var a = $('#working-canvas');
            var profilePhoto = $('#profile');
            var mainEditingContainer = $('.main-editing-container');

            //************************************************************************************************************

            // Function to add a text box to the working area
            function addTextBox() {
                var activeClass = false;

                // Create a textbox
                var newTextbox = $(
                    '<div class="added-textbox" id="editor" style="background:none;font-size:1.5rem;border:2px solid black;padding:10px;" contentEditable>Enter Your Text Here...</div>'
                );

                // Add border when clicked
                newTextbox.on('click', function () {
                    $(this).css('border', '1px solid #000');
                    activeClass = true;
                });

                // Remove border when clicked outside the div
                a.on('click', function (event) {
                    if (!$(event.target).closest('.added-textbox').length) {
                        newTextbox.css('border', 'none');
                        activeClass = false;
                    }
                });

                a.append(newTextbox);

                $('#fontSize').change(function () {
                    var size = $(this).val();
                    if (activeClass) {
                        if (size === 'custom') {
                            $('#customSize').show();
                        } else {
                            $('#customSize').hide();
                            newTextbox.css('font-size', size + 'rem');
                        }
                    }
                });

                $('#customSize').change(function () {
                    if (activeClass) {
                        var customSize = $(this).val();
                        newTextbox.css('font-size', customSize + 'rem');
                    }
                });

                $('#fontFamily').change(function () {
                    if (activeClass) {
                        var fontFamily = $(this).val();
                        newTextbox.css('font-family', fontFamily);
                    }
                });

                $('#bold').click(function () {
                    if (activeClass) {
                        $(this).toggleClass('bold');
                        if ($(this).hasClass('bold')) {
                            newTextbox.css('font-weight', 'bold');
                        } else {
                            newTextbox.css('font-weight', 'normal');
                        }
                    }
                });

                $('#italic').click(function () {
                    if (activeClass) {
                        $(this).toggleClass('italic');

                        if ($(this).hasClass('italic')) {
                            newTextbox.css('font-style', 'italic');
                        } else {
                            newTextbox.css('font-style', 'normal');
                        }
                    }
                });
                $('#underline').click(function () {
                    if (activeClass) {
                        $(this).toggleClass('underline');

                        if ($(this).hasClass('underline')) {
                            newTextbox.css('text-decoration', 'underline');
                        } else {
                            newTextbox.css('text-decoration', 'none');
                        }
                    }
                });
                $('#strikethrough').click(function () {
                    if (activeClass) {
                        $(this).toggleClass('strike');

                        if ($(this).hasClass('strike')) {
                            newTextbox.css(
                                'text-decoration',
                                'line-through'
                            );
                        } else {
                            newTextbox.css('text-decoration', 'none');
                        }
                    }
                });

                $('#fontColor').change(function () {
                    if (activeClass) {
                        var fontColor = $('#fontColor').val();
                        newTextbox.css('color', fontColor);
                    }
                });
                $('#textBackground').change(function () {
                    if (activeClass) {
                        var fontbgColor = $('#textBackground').val();
                        newTextbox.css('background', fontbgColor);
                    }
                });
                $('#fontbgnone').click(function () {
                    if (activeClass) {
                        newTextbox.css('background', 'none');
                    }
                });

                $('#textStroke').click(function () {
                    var strokeWidth = $('#textStrokeWidth').val();
                    var strokeColor = $('#textStrokeColor').val();
                    applyTextStroke(strokeWidth, strokeColor);
                });

                $('#textStrokeWidth').on('input', function () {
                    var strokeWidth = $(this).val();
                    $('#textStrokeWidth')
                        .prev()
                        .text('Text Stroke: ' + strokeWidth);
                    applyTextStroke(
                        strokeWidth,
                        $('#textStrokeColor').val()
                    );
                });

                $('#textStrokeColor').on('input', function () {
                    var strokeColor = $(this).val();
                    applyTextStroke(
                        $('#textStrokeWidth').val(),
                        strokeColor
                    );
                });

                function applyTextStroke(width, color) {
                    if (activeClass) {
                        var textStrokeValue = width + 'px ' + color;
                        newTextbox.css('text-stroke', textStrokeValue);
                    }
                }

                $('#textShadow').click(function () {
                    if (activeClass) {
                        var offsetX = $('#textShadowOffsetX').val();
                        var offsetY = $('#textShadowOffsetY').val();
                        var blur = $('#textShadowBlur').val();
                        var color = $('#textShadowColor').val();
                        applyTextShadow(offsetX, offsetY, blur, color);
                    }
                });

                $('#textShadowOffsetX').on('input', function () {
                    if (activeClass) {
                        var offsetX = $(this).val();
                        $(this)
                            .prev()
                            .text('Offset X: ' + offsetX);
                        applyTextShadow(
                            offsetX,
                            $('#textShadowOffsetY').val(),
                            $('#textShadowBlur').val(),
                            $('#textShadowColor').val()
                        );
                    }
                });

                $('#textShadowOffsetY').on('input', function () {
                    if (activeClass) {
                        var offsetY = $(this).val();
                        $(this)
                            .prev()
                            .text('Offset Y: ' + offsetY);
                        applyTextShadow(
                            $('#textShadowOffsetX').val(),
                            offsetY,
                            $('#textShadowBlur').val(),
                            $('#textShadowColor').val()
                        );
                    }
                });

                $('#textShadowBlur').on('input', function () {
                    if (activeClass) {
                        var blur = $(this).val();
                        $(this)
                            .prev()
                            .text('Blur: ' + blur);
                        applyTextShadow(
                            $('#textShadowOffsetX').val(),
                            $('#textShadowOffsetY').val(),
                            blur,
                            $('#textShadowColor').val()
                        );
                    }
                });

                $('#textShadowColor').on('input', function () {
                    if (activeClass) {
                        var color = $(this).val();
                        $(this)
                            .prev()
                            .text('Shadow Color: ' + color);
                        applyTextShadow(
                            $('#textShadowOffsetX').val(),
                            $('#textShadowOffsetY').val(),
                            $('#textShadowBlur').val(),
                            color
                        );
                    }
                });

                function applyTextShadow(offsetX, offsetY, blur, color) {
                    if (activeClass) {
                        var textShadowValue =
                            offsetX +
                            'px ' +
                            offsetY +
                            'px ' +
                            blur +
                            'px ' +
                            color;
                        newTextbox.css('textShadow', textShadowValue);
                    }
                }

                $('#alignLeft').click(function () {
                    if (activeClass) {
                        var currentLeft =
                            parseInt(newTextbox.css('margin-left')) || 0;
                        newTextbox.css(
                            'margin-left',
                            currentLeft - 20 + 'px'
                        );
                    }
                });

                $('#alignRight').click(function () {
                    if (activeClass) {
                        var currentRight =
                            parseInt(newTextbox.css('margin-left')) || 0;
                        newTextbox.css(
                            'margin-left',
                            currentRight + 20 + 'px'
                        );
                    }
                });

                $('#alignCenter').click(function () {
                    if (activeClass) {
                        var currentTop =
                            parseInt(newTextbox.css('margin-top')) || 0;
                        var currentBottom =
                            parseInt(newTextbox.css('margin-bottom')) || 0;

                        newTextbox.css({
                            'margin-top': currentTop - 10 + 'px',
                            'margin-bottom': currentBottom - 10 + 'px',
                        });
                    }
                });

                $('#alignJustify').click(function () {
                    if (activeClass) {
                        var currentTop =
                            parseInt(newTextbox.css('margin-top')) || 0;
                        newTextbox.css(
                            'margin-top',
                            currentTop + 20 + 'px'
                        );
                    }
                });

                function applyTextShadow(offsetX, offsetY, blur, color) {
                    var textShadowValue =
                        offsetX +
                        'px ' +
                        offsetY +
                        'px ' +
                        blur +
                        'px ' +
                        color;
                    $('#editor').css('textShadow', textShadowValue);
                }

                //===================FOR ENABLING TEXT DRAG OPTION====================================
                var isMoving = false;
                var isEditing = false;
                var offsetX, offsetY;
                var editedTextbox = null;

                newTextbox.mousedown(function (event) {
                    isMoving = true;
                    offsetX = event.pageX - $(this).offset().left;
                    offsetY = event.pageY - $(this).offset().top;
                    editedTextbox = $(this);
                });

                newTextbox.dblclick(function () {
                    isEditing = true;
                    $(this).attr('contenteditable', true);
                    $(this).focus(); // Set focus on double-click for immediate text editing
                    editedTextbox = $(this);
                });

                // Disable text editing on click outside the contenteditable div
                $(document).click(function (event) {
                    if (
                        editedTextbox &&
                        !editedTextbox.is(event.target) &&
                        !editedTextbox.has(event.target).length
                    ) {
                        isEditing = false;
                        editedTextbox.attr('contenteditable', false);
                        editedTextbox = null;
                    }
                });

                // Enable text editing on click inside the contenteditable div
                newTextbox.click(function () {
                    if (isEditing) {
                        $(this).attr('contenteditable', true);
                        $(this).focus();
                    }
                });

                // Prevent dragging during text editing
                newTextbox.on(
                    'mousedown',
                    '[contenteditable=true]',
                    function (event) {
                        event.stopPropagation();
                    }
                );

                // Handle key events to allow normal text editing
                newTextbox.keydown(function (event) {
                    // Allow Enter key and backspace during text editing
                    if (
                        isEditing &&
                        (event.which === 13 || event.which === 8)
                    ) {
                        event.stopPropagation();
                    }
                });

                $(document).mousemove(function (event) {
                    if (isMoving && !isEditing) {
                        editedTextbox.offset({
                            top: event.pageY - offsetY,
                            left: event.pageX - offsetX,
                        });
                    }
                });

                $(document).mouseup(function () {
                    isMoving = false;
                });

                //======================================================================================================
            }

            //FOR SHOWING TEXT FORMATTING TOOL OFFCANVAS ========================
            $('.format-text').click(function () {
                $('.textFormattingTool').slideToggle();
                $(this).toggleClass(' formatTextHover');
                $(this).toggleClass('tools');
            });

            $('.format-Image').click(function () {
                $('.imageEditContainer').slideToggle();
                $(this).toggleClass(' formatTextHover');
                $(this).toggleClass('tools');
            });
            //===================================================================

            // ==============Click event for "Add Text" div==================================

            $('.add-text').click(function () {
                addTextBox();
            });

            //===============================================================================

            $('#sizeButton').click(function () {
                $('#popupBox').toggleClass('show');
            });

            // Hide the popup when the "Close" button is clicked
            $('#closeButton').click(function () {
                $('#popupBox').removeClass('show');
            });
            $('#square').click(function () {
                a.css({ width: '850', height: '850' });
                $('.workingAreaShadow').css({
                    width: '850',
                    height: '850',
                });
            });
            $('#rectangle').click(function () {
                a.css({ width: '1280', height: '720' });
                $('.workingAreaShadow').css({
                    width: '1280',
                    height: '720',
                });
            });
            $('#portrait').click(function () {
                a.css({ width: '700', height: '850' });
                $('.workingAreaShadow').css({
                    width: '700',
                    height: '850',
                });
            });
            $('#circleShape').click(function () {
                a.css({ width: '800', height: '800', borderRadius: '50%' });
                $('.workingAreaShadow').css({
                    width: '800',
                    height: '800',
                    borderRadius: '50%',
                });
            });
            $('#ovalShape').click(function () {
                a.css({ width: '700', height: '800', borderRadius: '50%' });
                $('.workingAreaShadow').css({
                    width: '700',
                    height: '800',
                    borderRadius: '50%',
                });
            });
            $('#bgcolor').change(function () {
                var bgColor = $(this).val();
                a.css('background', bgColor);
            });
            //=================================CANVAS BORDER SETTING===================================================
            $('.canvasBorderRadius').change(function () {
                var CanvasBorderRadius = $(this).val();
                a.css('border-radius', CanvasBorderRadius + 'px');
                $('.workingAreaShadow').css(
                    'border-radius',
                    CanvasBorderRadius + 'px'
                );
            });
            $('.canvasBorderWidth').change(function () {
                var CanvasBorderWidth = $(this).val();
                a.css('border-width', CanvasBorderWidth + 'px');
                $('.workingAreaShadow').css(
                    'border-width',
                    CanvasBorderWidth + 'px'
                );
            });
            $('.canvasBorderColor').change(function () {
                var CanvasBorderColor = $(this).val();
                a.css('border-image', 'none');
                a.css('border-color', CanvasBorderColor);
                $('.workingAreaShadow').css(
                    'border-color',
                    CanvasBorderColor
                );
            });
            $('.canvasBorderImage').change(function () {
                var CanvasBorderImage = this;

                a.css('border-color', 'transparent');

                if (CanvasBorderImage.files && CanvasBorderImage.files[0]) {
                    var imagereader = new FileReader();

                    imagereader.onload = function (e) {
                        a.css(
                            'border-image',
                            'url(' + e.target.result + ') 30 repeat'
                        );
                    };

                    imagereader.readAsDataURL(CanvasBorderImage.files[0]);
                }
            });

            $('.canvasBorderStyle').change(function () {
                var CanvasBorderStyle = $(this).val();
                a.css('border-style', CanvasBorderStyle);
            });

            //====================================END OF CANVAS BORDER RADIUS=====================================================

            //*************************************************************************************************
            function downloadImage() {
                // Use HTML2Canvas to capture the content of #working-canvas
                html2canvas($('#working-canvas')[0]).then(function (
                    canvas
                ) {
                    // Convert the canvas to a data URL
                    var dataURL = canvas.toDataURL('image/jpeg');

                    // Create a download link
                    var a = $('<a>').attr({
                        href: dataURL,
                        download: 'image.jpg',
                    });

                    // Append the link to the document and trigger the click event
                    $('body').append(a);
                    a[0].click();

                    // Clean up: remove the link from the document
                    a.remove();
                });
            }

            // Attach the downloadImage function to the click event of the download button
            $('#downloadBtn').on('click', downloadImage);

            //****************************************************************************************************

            //>>>>>>>>>>>>>>>>>>>>>>>>for setting image from templates<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

            // Click event for template images
            $('.card').click(function () {
                $(this).css('border', '2px solid black');
            });
            $('.img').click(function () {
                // Store the clicked image in a variable
                var clickedImageUrl = $(this).attr('src');

                // Change the background image of the div with class 'sok'
                $('#change').click(function () {
                    a.css({
                        'background-image': 'url(' + clickedImageUrl + ')',
                        'background-size': 'cover',
                        'background-repeat': 'no-repeat',
                    });
                });
            });
            //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

            $('#bgcolor').change(function () {
                var bgColor = $(this).val();
                a.css('background', bgColor);
            });
            $('.CustomBg').change(function () {
                var customBg = this.files[0];

                if (customBg) {
                    var customFileReader = new FileReader();
                    customFileReader.onload = function (e) {
                        a.css({
                            'background-image':
                                'url(' + e.target.result + ')',
                            'background-size': 'cover',
                            'background-repeat': 'no-repeat',
                        });
                    };

                    customFileReader.readAsDataURL(customBg);
                }
            });

            // }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}

            document
                .getElementById('imageInput')
                .addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const imageUrl = URL.createObjectURL(file);
                        createImage(imageUrl);
                    }
                });

            function createImage(imageUrl) {
                const img = new Image();
                img.src = imageUrl;
                img.classList.add('draggable', 'resizable');
                document.querySelector('#working-canvas').appendChild(img);

                const resizeHandle = document.createElement('div');
                resizeHandle.classList.add('resize-handle');
                img.appendChild(resizeHandle);

                img.addEventListener('click', function () {
                    setActiveImage(img);
                });

                const widthSlider = document.getElementById('widthSlider');
                const heightSlider =
                    document.getElementById('heightSlider');
                const radiusSlider =
                    document.getElementById('radiusSlider');
                const borderWidthSlider =
                    document.getElementById('borderWidthSlider');
                const borderColorInput =
                    document.getElementById('borderColor');
                const boxShadowXSlider =
                    document.getElementById('boxShadowX');
                const boxShadowYSlider =
                    document.getElementById('boxShadowY');
                const boxShadowBlurSlider =
                    document.getElementById('boxShadowBlur');
                const boxShadowColorInput =
                    document.getElementById('boxShadowColor');
                const widthValue = document.getElementById('widthValue');
                const heightValue = document.getElementById('heightValue');
                const radiusValue = document.getElementById('radiusValue');
                const borderWidthValue =
                    document.getElementById('borderWidthValue');
                const boxShadowXValue =
                    document.getElementById('boxShadowXValue');
                const boxShadowYValue =
                    document.getElementById('boxShadowYValue');
                const boxShadowBlurValue =
                    document.getElementById('boxShadowBlurValue');
                const imageBlurSlider =
                    document.getElementById('imageBlurSlider');
                const imageBlurValue =
                    document.getElementById('imageBlurValue');

                const brightnessSlider =
                    document.getElementById('brightnessSlider');
                const brightnessValue =
                    document.getElementById('brightnessValue');
                const saturationSlider =
                    document.getElementById('saturationSlider');
                const saturationValue =
                    document.getElementById('saturationValue');
                const contrastSlider =
                    document.getElementById('contrastSlider');
                const contrastValue =
                    document.getElementById('contrastValue');
                const tintSlider = document.getElementById('tintSlider');
                const tintValue = document.getElementById('tintValue');

                makeDraggable(img);
                makeResizable(
                    img,
                    widthSlider,
                    heightSlider,
                    widthValue,
                    heightValue
                );
                makeBorderRadius(img, radiusSlider, radiusValue);
                makeBorder(
                    img,
                    borderWidthSlider,
                    borderColorInput,
                    borderWidthValue
                );
                makeBoxShadow(
                    img,
                    boxShadowXSlider,
                    boxShadowYSlider,
                    boxShadowBlurSlider,
                    boxShadowColorInput,
                    boxShadowXValue,
                    boxShadowYValue,
                    boxShadowBlurValue
                );
                setupTextboxListeners(
                    img,
                    widthSlider,
                    heightSlider,
                    radiusSlider,
                    borderWidthSlider,
                    boxShadowXSlider,
                    boxShadowYSlider,
                    boxShadowBlurSlider,
                    widthValue,
                    heightValue,
                    radiusValue,
                    borderWidthValue,
                    boxShadowXValue,
                    boxShadowYValue,
                    boxShadowBlurValue
                );
            }

            function setActiveImage(image) {
                const allImages = document.querySelectorAll('.draggable');
                allImages.forEach((img) => {
                    img.classList.remove('activeImage');
                });
                image.classList.add('activeImage');
            }

            function makeDraggable(element) {
                let pos1 = 0,
                    pos2 = 0,
                    pos3 = 0,
                    pos4 = 0;
                element.onmousedown = dragMouseDown;

                function dragMouseDown(e) {
                    e.preventDefault();
                    pos3 = e.clientX;
                    pos4 = e.clientY;
                    document.onmouseup = closeDragElement;
                    document.onmousemove = elementDrag;
                }

                function elementDrag(e) {
                    e.preventDefault();
                    pos1 = pos3 - e.clientX;
                    pos2 = pos4 - e.clientY;
                    pos3 = e.clientX;
                    pos4 = e.clientY;
                    element.style.top = element.offsetTop - pos2 + 'px';
                    element.style.left = element.offsetLeft - pos1 + 'px';
                }

                function closeDragElement() {
                    document.onmouseup = null;
                    document.onmousemove = null;
                }
            }

            function makeResizable(
                element,
                widthSlider,
                heightSlider,
                widthValue,
                heightValue
            ) {
                let isResizing = false;
                let originalWidth, originalHeight;

                widthSlider.addEventListener('input', function () {
                    element.style.width = widthSlider.value + 'px';
                    widthValue.value = widthSlider.value;
                });

                heightSlider.addEventListener('input', function () {
                    element.style.height = heightSlider.value + 'px';
                    heightValue.value = heightSlider.value;
                });

                element.addEventListener('mousedown', function (e) {
                    if (e.target.classList.contains('resize-handle')) {
                        isResizing = true;
                        originalWidth = element.offsetWidth;
                        originalHeight = element.offsetHeight;
                    }
                });

                document.addEventListener('mousemove', function (e) {
                    if (isResizing) {
                        const newWidth = originalWidth + e.movementX;
                        const newHeight = originalHeight + e.movementY;

                        element.style.width = newWidth + 'px';
                        element.style.height = newHeight + 'px';

                        widthSlider.value = newWidth;
                        heightSlider.value = newHeight;

                        widthValue.value = newWidth;
                        heightValue.value = newHeight;
                    }
                });

                document.addEventListener('mouseup', function () {
                    isResizing = false;
                });
            }

            function makeBorderRadius(element, radiusSlider, radiusValue) {
                radiusSlider.addEventListener('input', function () {
                    const radius = radiusSlider.value + '%';
                    element.style.borderRadius = radius;
                    radiusValue.value = radiusSlider.value;
                });
            }

            function makeBorder(
                element,
                borderWidthSlider,
                borderColorInput,
                borderWidthValue
            ) {
                borderWidthSlider.addEventListener('input', function () {
                    const borderWidth = borderWidthSlider.value + 'px';
                    element.style.borderWidth = borderWidth;
                    borderWidthValue.value = borderWidthSlider.value;
                });

                borderColorInput.addEventListener('input', function () {
                    const borderColor = borderColorInput.value;
                    element.style.borderColor = borderColor;
                });
            }

            function makeBoxShadow(
                element,
                boxShadowXSlider,
                boxShadowYSlider,
                boxShadowBlurSlider,
                boxShadowColorInput,
                boxShadowXValue,
                boxShadowYValue,
                boxShadowBlurValue
            ) {
                boxShadowXSlider.addEventListener('input', function () {
                    const boxShadowX = boxShadowXSlider.value + 'px';
                    updateBoxShadow();
                    boxShadowXValue.value = boxShadowXSlider.value;
                });

                boxShadowYSlider.addEventListener('input', function () {
                    const boxShadowY = boxShadowYSlider.value + 'px';
                    updateBoxShadow();
                    boxShadowYValue.value = boxShadowYSlider.value;
                });

                boxShadowBlurSlider.addEventListener('input', function () {
                    const boxShadowBlur = boxShadowBlurSlider.value + 'px';
                    updateBoxShadow();
                    boxShadowBlurValue.value = boxShadowBlurSlider.value;
                });

                boxShadowColorInput.addEventListener('input', function () {
                    updateBoxShadow();
                });

                function updateBoxShadow() {
                    const boxShadowX = boxShadowXSlider.value + 'px';
                    const boxShadowY = boxShadowYSlider.value + 'px';
                    const boxShadowBlur = boxShadowBlurSlider.value + 'px';
                    const boxShadowColor = boxShadowColorInput.value;

                    const boxShadow = `${boxShadowX} ${boxShadowY} ${boxShadowBlur} ${boxShadowColor}`;
                    element.style.boxShadow = boxShadow;
                }
            }

            function setupTextboxListeners(
                element,
                widthSlider,
                heightSlider,
                radiusSlider,
                borderWidthSlider,
                boxShadowXSlider,
                boxShadowYSlider,
                boxShadowBlurSlider,
                widthValue,
                heightValue,
                radiusValue,
                borderWidthValue,
                boxShadowXValue,
                boxShadowYValue,
                boxShadowBlurValue
            ) {
                widthValue.addEventListener('input', function () {
                    const value = parseInt(widthValue.value, 10);
                    if (!isNaN(value)) {
                        widthSlider.value = Math.min(
                            Math.max(value, widthSlider.min),
                            widthSlider.max
                        );
                        element.style.width = widthSlider.value + 'px';
                    }
                });

                heightValue.addEventListener('input', function () {
                    const value = parseInt(heightValue.value, 10);
                    if (!isNaN(value)) {
                        heightSlider.value = Math.min(
                            Math.max(value, heightSlider.min),
                            heightSlider.max
                        );
                        element.style.height = heightSlider.value + 'px';
                    }
                });

                radiusValue.addEventListener('input', function () {
                    const value = parseInt(radiusValue.value, 10);
                    if (!isNaN(value)) {
                        radiusSlider.value = Math.min(
                            Math.max(value, radiusSlider.min),
                            radiusSlider.max
                        );
                        element.style.borderRadius =
                            radiusSlider.value + '%';
                    }
                });

                borderWidthValue.addEventListener('input', function () {
                    const value = parseInt(borderWidthValue.value, 10);
                    if (!isNaN(value)) {
                        borderWidthSlider.value = Math.min(
                            Math.max(value, borderWidthSlider.min),
                            borderWidthSlider.max
                        );
                        element.style.borderWidth =
                            borderWidthSlider.value + 'px';
                    }
                });

                boxShadowXValue.addEventListener('input', function () {
                    const value = parseInt(boxShadowXValue.value, 10);
                    if (!isNaN(value)) {
                        boxShadowXSlider.value = Math.min(
                            Math.max(value, boxShadowXSlider.min),
                            boxShadowXSlider.max
                        );
                        updateBoxShadow();
                    }
                });

                boxShadowYValue.addEventListener('input', function () {
                    const value = parseInt(boxShadowYValue.value, 10);
                    if (!isNaN(value)) {
                        boxShadowYSlider.value = Math.min(
                            Math.max(value, boxShadowYSlider.min),
                            boxShadowYSlider.max
                        );
                        updateBoxShadow();
                    }
                });

                boxShadowBlurValue.addEventListener('input', function () {
                    const value = parseInt(boxShadowBlurValue.value, 10);
                    if (!isNaN(value)) {
                        boxShadowBlurSlider.value = Math.min(
                            Math.max(value, boxShadowBlurSlider.min),
                            boxShadowBlurSlider.max
                        );
                        updateBoxShadow();
                    }
                });
            }

            document.addEventListener('click', function (e) {
                const activeImage = document.querySelector('.activeImage');
                if (activeImage && !activeImage.contains(e.target)) {
                    activeImage.classList.remove('activeImage');
                }
            });

            imageBlurSlider.addEventListener('input', function () {
                const blurValue = imageBlurSlider.value;
                imageBlurValue.value = blurValue;

                const activeImage = document.querySelector('.activeImage');
                if (activeImage) {
                    activeImage.style.filter = `blur(${blurValue}px)`;
                }
            });

            imageBlurValue.addEventListener('input', function () {
                const value = parseFloat(imageBlurValue.value);
                if (!isNaN(value)) {
                    imageBlurSlider.value = Math.min(
                        Math.max(value, imageBlurSlider.min),
                        imageBlurSlider.max
                    );

                    const activeImage =
                        document.querySelector('.activeImage');
                    if (activeImage) {
                        activeImage.style.filter = `blur(${imageBlurSlider.value}px)`;
                    }
                }
            });

            brightnessSlider.addEventListener('input', function () {
                const brightness = brightnessSlider.value;
                brightnessValue.value = brightness;

                const activeImage = document.querySelector('.activeImage');
                if (activeImage) {
                    activeImage.style.filter = `brightness(${brightness}%)`;
                }
            });

            saturationSlider.addEventListener('input', function () {
                const saturation = saturationSlider.value;
                saturationValue.value = saturation;

                const activeImage = document.querySelector('.activeImage');
                if (activeImage) {
                    activeImage.style.filter = `saturate(${saturation}%)`;
                }
            });

            contrastSlider.addEventListener('input', function () {
                const contrast = contrastSlider.value;
                contrastValue.value = contrast;

                const activeImage = document.querySelector('.activeImage');
                if (activeImage) {
                    activeImage.style.filter = `contrast(${contrast}%)`;
                }
            });

            tintSlider.addEventListener('input', function () {
                const tint = tintSlider.value;
                tintValue.value = tint;

                const activeImage = document.querySelector('.activeImage');
                if (activeImage) {
                    activeImage.style.filter = `sepia(${tint}%)`;
                }
            });

            brightnessValue.addEventListener('input', function () {
                const value = parseFloat(brightnessValue.value);
                if (!isNaN(value)) {
                    brightnessSlider.value = Math.min(
                        Math.max(value, brightnessSlider.min),
                        brightnessSlider.max
                    );

                    const activeImage =
                        document.querySelector('.activeImage');
                    if (activeImage) {
                        activeImage.style.filter = `brightness(${brightnessSlider.value}%)`;
                    }
                }
            });

            saturationValue.addEventListener('input', function () {
                const value = parseFloat(saturationValue.value);
                if (!isNaN(value)) {
                    saturationSlider.value = Math.min(
                        Math.max(value, saturationSlider.min),
                        saturationSlider.max
                    );

                    const activeImage =
                        document.querySelector('.activeImage');
                    if (activeImage) {
                        activeImage.style.filter = `saturate(${saturationSlider.value}%)`;
                    }
                }
            });

            contrastValue.addEventListener('input', function () {
                const value = parseFloat(contrastValue.value);
                if (!isNaN(value)) {
                    contrastSlider.value = Math.min(
                        Math.max(value, contrastSlider.min),
                        contrastSlider.max
                    );

                    const activeImage =
                        document.querySelector('.activeImage');
                    if (activeImage) {
                        activeImage.style.filter = `contrast(${contrastSlider.value}%)`;
                    }
                }
            });

            tintValue.addEventListener('input', function () {
                const value = parseFloat(tintValue.value);
                if (!isNaN(value)) {
                    tintSlider.value = Math.min(
                        Math.max(value, tintSlider.min),
                        tintSlider.max
                    );

                    const activeImage =
                        document.querySelector('.activeImage');
                    if (activeImage) {
                        activeImage.style.filter = `sepia(${tintSlider.value}%)`;
                    }
                }
            });
            const opacitySlider = document.getElementById('opacitySlider');
            const opacityValue = document.getElementById('opacityValue');

            opacitySlider.addEventListener('input', function () {
                const opacity = opacitySlider.value;
                opacityValue.value = opacity;

                const activeImage = document.querySelector('.activeImage');
                if (activeImage) {
                    activeImage.style.opacity = opacity;
                }
            });

            opacityValue.addEventListener('input', function () {
                const value = parseFloat(opacityValue.value);
                if (!isNaN(value)) {
                    opacitySlider.value = Math.min(
                        Math.max(value, opacitySlider.min),
                        opacitySlider.max
                    );

                    const activeImage =
                        document.querySelector('.activeImage');
                    if (activeImage) {
                        activeImage.style.opacity = opacitySlider.value;
                    }
                }
            });
        });
        /*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    </script>
</body>

</html>