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

    <link rel="stylesheet" href="css/editor.css" />
    <link rel="stylesheet" href="css/editorLayout.css" />
    <link rel="stylesheet" href="css/editorExternalClass.css" />

    <style>
        body {
            background: url('img/aboutBackground.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            overflow: hidden;
        }

        #formatting-options {
            margin: 10px;
        }

        #working-canvas {
            position: relative;

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

        .imageBlurContainer {
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

        .imageBlurContainer::-webkit-scrollbar {
            width: 20px;
        }

        .imageBlurContainer::-webkit-scrollbar-thumb {
            background-color: #2c3e50;
            border: 1px solid #abb2b9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .imageEditContainer::-webkit-scrollbar-track {
            background-color: #5d6d7e;
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
            box-shadow: 2px 2px 3px rgb(0, 191, 255),
                -2px -2px 4px rgb(0, 191, 255);
        }

        .draggable {
            position: absolute;
            cursor: move;
            max-width: 100%;
            max-height: 100%;
            width: 30%;
            height: auto;
        }

        .resizable {

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
            color: #f8f9f9;
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

        input[type='range'] {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background-color: #7f8c8d;
            outline: none;
            margin: 5px 0;
        }

        input[type='range']::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #3498db;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        input[type='range']::-moz-range-thumb {
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
                        <li class="nav-item" style="transform: translateY(22%)">
                            <a class="Canvasborder" href="index.php" style="
                                        text-decoration: none;
                                        color: red;
                                        background-color: black;
                                        font-weight: bold;
                                        padding: 12px;
                                    ">
                                <i class="fa-solid fa-home fa-beat"></i>&nbsp;&nbsp;Home Page
                            </a>
                        </li>
                        <li class="nav-item">
                            <p class="templates" id="canvasBackgroundBtn">
                                <i class="fa-solid fa-fire fa-beat"></i>&nbsp;&nbsp;Background
                            </p>
                        </li>
                        <li class="nav-item">
                            <p class="page-size" id="sizeButton">
                                <i class="fa-solid fa-expand fa-beat"></i>&nbsp;&nbsp;Canvas Size
                            </p>
                        </li>

                        <li>
                            <input type="file" id="imageInput" accept="image/*" />
                            <label for="imageInput" class="customImage">
                                <i class="fas fa-images fa-address-card fa-beat"></i>
                                Add Images
                            </label>
                        </li>
                        <!-- <li class="nav-item">
                                <p
                                    class="shapes"
                                    data-bs-toggle="modal"
                                    data-bs-target="#profileModal"
                                >
                                    <i
                                        class="fa-solid fa-shapes fa-address-card fa-beat"
                                    ></i
                                    >&nbsp;&nbsp;Add Shapes
                                </p>
                            </li> -->
                        <li class="nav-item">
                            <p class="Canvasborder" id="addBorder">
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
        <!-- =============================================ELEMENT CONTAINER============================================== -->

        <div class="elementContainer">
            <ul>
                <li id="El-position">layers</li>
                <li><button id="undoButton">Undo</button></li>
                <li class="textEdit" id="textEdit">
                    <select name="fontFamily" id="fontFamily">
                        <option value="Arial, sans-serif" style="font-family: Arial, sans-serif">
                            Arial
                        </option>
                        <option value="Verdana, sans-serif" style="font-family: Verdana, sans-serif">
                            Verdana
                        </option>
                        <option value="Georgia, serif" style="font-family: Georgia, serif">
                            Georgia
                        </option>
                        <option value="Times New Roman, serif" style="font-family: 'Times New Roman', serif">
                            Times New Roman
                        </option>
                        <option value="Courier New, monospace" style="font-family: 'Courier New', monospace">
                            Courier New
                        </option>
                        <option value="Helvetica, sans-serif" style="font-family: Helvetica, sans-serif">
                            Helvetica
                        </option>
                        <option value="Trebuchet MS, sans-serif" style="font-family: 'Trebuchet MS', sans-serif">
                            Trebuchet MS
                        </option>
                        <option value="Tahoma, sans-serif" style="font-family: Tahoma, sans-serif">
                            Tahoma
                        </option>
                        <option value="Impact, sans-serif" style="font-family: Impact, sans-serif">
                            Impact
                        </option>
                        <option value="Comic Sans MS, cursive" style="font-family: 'Comic Sans MS', cursive">
                            Comic Sans MS
                        </option>
                        <option value="Lucida Sans Unicode, sans-serif" style="
                                    font-family: 'Lucida Sans Unicode',
                                        sans-serif;
                                ">
                            Lucida Sans Unicode
                        </option>
                        <option value="Palatino Linotype, serif" style="font-family: 'Palatino Linotype', serif">
                            Palatino Linotype
                        </option>
                        <option value="Arial Black, sans-serif" style="font-family: 'Arial Black', sans-serif">
                            Arial Black
                        </option>
                        <option value="Garamond, serif" style="font-family: Garamond, serif">
                            Garamond
                        </option>
                        <option value="Book Antiqua, serif" style="font-family: 'Book Antiqua', serif">
                            Book Antiqua
                        </option>
                        <option value="Franklin Gothic Medium, sans-serif" style="
                                    font-family: 'Franklin Gothic Medium',
                                        sans-serif;
                                ">
                            Franklin Gothic Medium
                        </option>
                        <option value="Century Gothic, sans-serif" style="
                                    font-family: 'Century Gothic', sans-serif;
                                ">
                            Century Gothic
                        </option>
                        <option value="Copperplate, sans-serif" style="font-family: Copperplate, sans-serif">
                            Copperplate
                        </option>
                        <option value="Baskerville, serif" style="font-family: Baskerville, serif">
                            Baskerville
                        </option>
                        <option value="Futura, sans-serif" style="font-family: Futura, sans-serif">
                            Futura
                        </option>
                    </select>
                    <!-- FONT SIZE -->
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
                    <input type="number" id="customSize" placeholder="Enter custom size" style="display: none" />

                    <!-- BOLD ITALIC AND UNDERLINE -->
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
                    <!-- COLOR DIV CONTAINER FOR FONT COLOR -->
                    <div class="color" title="Font Color" id="fontColorShow">
                        <img src="img/color.png" alt="" width="46" />
                    </div>
                    <div class="effectText" title="Font Background Color">
                        <p id="effectsShow">Effects</p>
                    </div>
                    <div class="textTransparency" id="textTransparency">
                        <p>Transparency</p>
                        <input type="range" class="textTransparencyRange" style="width: 160px" min="0.1" max="0.9"
                            step="0.1" />
                    </div>
                    <div class="lockTextPosition" id="lockTextPosition">
                        <p id="textUnlocked" class="textUnlocked">
                            lock
                        </p>
                    </div>
                </li>
                <li class="imageEdit" id="imageEdit">
                    <p id="imageSizeShow" title="Image Size">Size</p>
                    <p title="Image Border" id="imageBorderShow">Border</p>
                    <p title="Image Shadow" id="imageShadowShow">Shadow</p>
                    <p title="Image Effects" id="imageEffectShow">
                        Effects
                    </p>
                    <p title="Image Rotate" id="imageRotateShow">Rotate</p>
                    <p id="imageUnlocked" class="imageUnlocked" title="Lock Image">
                        Lock
                    </p>
                </li>
            </ul>
        </div>
        <!-- ELEMENT CONTAINER -->
        <div id="positionCont" class="positionCont">
            <div class="positionHeader">
                <p class="layers">layers</p>
            </div>
            <ul id="layersList"></ul>
        </div>

        <!-- Font Color -->
        <div id="colorCont" class="colorCont">
            <div class="colorHeader">
                <p class="colors">FONT COLOR</p>
            </div>

            <div class="chooseColorCont">
                <label for="fontColor">Choose Color</label>
                <input type="color" id="fontColor" value="#00002f" class="fontColor" />
            </div>
        </div>

        <!-- font bg -->
        <div id="effectsCont" class="effectsCont">
            <div class="effectsHeader">
                <p class="effects">Effects</p>
            </div>
            <div class="effectOptionCont">
                <p>EFFECTS</p>

                <div class="effectsTools">
                    <p class="fontnone" title="None" id="fontNone">N</p>
                    <p class="fontBgCol" title="Text Background" id="fontBgCol">
                        A
                    </p>
                    <p class="fontHollow" title="Text Stroke" id="fontStroke">
                        A
                    </p>
                    <p class="fontStroke" title="Text Hollow" id="fontHollow">
                        A
                    </p>
                    <p class="fontShadow" title="font Shadow" id="fontShadow">
                        A
                    </p>
                    <p class="fontGlow" title="Text Glow" id="fontGlow">
                        A
                    </p>
                </div>
                <hr style="
                            border: 2px solid rgb(0, 195, 255);
                            height: 5px;
                            width: 100%;
                            background: rgb(0, 195, 255);
                        " />
            </div>
            <div class="effectsItems">
                <!-- // 1) ITEM BACKGROUND -->
                <div class="ItemBg">
                    <!-- ? Choose color for font bg  -->
                    <div class="bgOpacityCont textEditCont">
                        <label for="BgOpacity" class="label">Color</label>
                        <input type="color" id="textBackground" value="#000000" title="Choose Color" />
                    </div>
                    <!-- ? test background OPACITY -->

                    <div class="bgOpacityCont textEditCont">
                        <label for="BgOpacity" class="label">Transparent</label>
                        <input type="range" id="textBackgroundOpacity" min="0" max="1" step="0.01" value="1" />
                        <input type="text" id="BackgroundOpacityValue" class="rangeValue" value="1" readonly />
                    </div>

                    <!-- ? test background ROUNDNESS -->
                    <div class="bgOpacityCont textEditCont">
                        <label for="BgOpacity" class="label">Roundness</label>
                        <input type="range" id="BackgroundRoundnessRange" min="0" max="50" step="1" />
                        <input type="text" id="BackgroundRoundnessValue" class="rangeValue" readonly />
                    </div>
                    <!-- ? test background PADDING -->
                    <div class="bgOpacityCont textEditCont">
                        <label for="BgOpacity" class="label">Spread</label>
                        <input type="range" id="textBackgroundPaddingRange" min="0" max="50" step="1" />
                        <input type="text" id="BackgroundPaddingValue" class="rangeValue" readonly />
                    </div>
                </div>

                <!-- ! TEXT STROKE SETTING -->
                <div class="Itemstroke">
                    <div class="strokeColorCont textEditCont">
                        <label for="BgOpacity" class="label">Stroke Color</label>
                        <input type="color" id="strokeColor" value="#000000" title="Choose Color" />
                    </div>

                    <div class="strokeWidthCont textEditCont">
                        <label for="BgOpacity" class="label">Stroke Width</label>
                        <input type="range" id="strokeWidth" min="1" max="10" step="1" />
                        <input type="text" id="strokeWidthValue" class="rangeValue" readonly />
                    </div>
                </div>

                <!-- ! TEXT HOLLOW SETTING -->

                <div class="Itemhollow">
                    <!-- ? TEXT STROKE COLOR -->
                    <div class="hollowColorCont textEditCont">
                        <label for="hollowColor" class="label">Hollow Color</label>
                        <input type="color" id="hollowColor" value="#000000" title="Choose Color" />
                    </div>

                    <div class="hollowWidthCont textEditCont">
                        <label for="hollowWidth" class="label">Hollow Width</label>
                        <input type="range" id="hollowWidth" min="0" max="10" step="1" />
                        <input type="text" id="hollowWidthValue" class="rangeValue" readonly />
                    </div>
                </div>

                <!-- ! TEXT SHADOW SETTING -->
                <div class="Itemshadow">
                    <div class="ShadowColorCont textEditCont">
                        <label for="shadowColor" class="label">Shadow Color</label>
                        <input type="color" id="shadowColor" value="#000000" title="Choose Color" />
                    </div>

                    <div class="shadowOffsetCont textEditCont">
                        <label for="shadowOffset" class="label">Offset</label>
                        <input type="range" id="shadowOffset" min="0" max="20" step="1" />
                        <input type="text" id="shadowOffsetValue" class="rangeValue" readonly />
                    </div>

                    <div class="shadowBlurCont textEditCont">
                        <label for="shadowBlur" class="label">Shadow Blur</label>
                        <input type="range" id="shadowBlur" min="0" max="20" step="1" />
                        <input type="text" id="shadowBlurValue" class="rangeValue" readonly />
                    </div>

                    <div class="shadowTransparentCont textEditCont">
                        <label for="shadowTransparent" class="label">Transparency</label>
                        <input type="range" id="shadowTransparent" min="0" max="1" step="0.1" />
                        <input type="text" id="shadowTransparentValue" class="rangeValue" readonly />
                    </div>

                    <div class="shadowDirrectionCont textEditCont">
                        <label for="shadowDirrection" class="label">Direction</label>
                        <input type="range" id="shadowDirrection" min="0" max="360" step="1" />
                        <input type="text" id="shadowDirrectionValue" class="rangeValue" readonly />
                    </div>
                </div>
                <!-- ! TEXT GLOW SETTING -->
                <div class="Itemglow">
                    <!-- ? TEXT GLOW SPREAD Offset -->
                    <div class="glowColorCont textEditCont">
                        <label for="glowColor" class="label">Text Color</label>
                        <input type="color" id="glowColor" value="#ff0000" title="Choose Text Color" />
                    </div>

                    <div class="glowOutlineColorCont textEditCont">
                        <label for="glowOutlineColor" class="label">Outline Color</label>
                        <input type="color" id="glowOutlineColor" value="#ffffff" title="Choose Outline Color" />
                    </div>

                    <div class="glowOffsetCont textEditCont">
                        <label for="glowOffset" class="label">Spread</label>
                        <input type="range" id="glowOffset" min="0" max="50" step="1" />
                        <input type="text" id="glowOffsetValue" class="rangeValue" readonly />
                    </div>
                </div>
            </div>
        </div>

        <!-- !IMAGE SIZE CONTAINER ******************-->
        <div class="ImageSize" id="ImageSize">
            <div class="effectsHeader">
                <p class="effects">Image Size</p>
            </div>
            <div class="Imagewidth">
                <p class="slider-label">Width</p>
                <input type="range" id="widthSlider" class="Sliders" min="5" max="5000" step="1" value="100" />
                <input type="number" id="widthValue" placeholder="Enter Width Manually" class="imageInputBox"
                    value="100" />
            </div>
            <hr style="height: 3px; background: brown" />

            <div class="Imageheight">
                <p class="slider-label">Height</p>
                <input type="range" id="heightSlider" class="Sliders" min="5" max="5000" step="1" value="100" />
                <input type="number" id="heightValue" placeholder="Enter Height Manually" class="imageInputBox" />
            </div>
            <div class="ImageDefaultSize" id="ImageDefaultSize">
                <span>100%</span><i class="fa-solid fa-expand" style="margin-left:30px;"></i>
            </div>
        </div>

        <!-- !IMAGE BORDER CONTAINER *******************-->
        <div class="ImageBorder" id="ImageBorder">
            <div class="effectsHeader">
                <p class="effects">Image Border</p>
            </div>

            <div class="imageBorder">
                <div class="borderRadius">
                    <p class="slider-label">Radius</p>

                    <input type="range" id="radiusSlider" class="Sliders" min="0" max="100" step="1" value="0" />
                    <input type="text" id="radiusValue" class="imageInputBox" placeholder="Enter Radius Manually" />
                </div>

                <div class="imageBorderWidth">
                    <p class="slider-label">Width</p>
                    >
                    <input type="range" id="borderWidthSlider" class="Sliders" min="1" max="200" step="1" value="1" />
                    <input type="text" id="borderWidthValue" class="imageInputBox"
                        placeholder="Enter Border Manually" />
                </div>
                <div class="imageBorderWidth">
                    <p class="slider-label">Style</p>
                    >
                    <select name="" id="imageBorderStyle" class="imageBorderStyle">
                        <option value="solid" title="solid">
                            _________
                        </option>
                        <option value="dotted" title="Dotted">
                            ................
                        </option>
                        <option value="dashed" title="Dashed">
                            ---------
                        </option>
                        <option value="double" title="Double">=====</option>
                    </select>
                </div>

                <div class="imageBorderColor">
                    <p class="slider-label">Color</p>

                    <input type="color" id="borderColor" value="#000000" style="
                                width: 100%;
                                box-shadow: 0 0 10px rgb(204, 255, 0);
                            " />
                </div>
            </div>
        </div>
        <!-- !IMAGE SHADOW CONTAINER *******************-->
        <div class="ImageShadow" id="ImageShadow">
            <div class="effectsHeader">
                <p class="effects">Image Shadow</p>
            </div>

            <div class="boxShadowX">
                <p class="slider-label">Box Shadow-X</p>
                <input type="range" id="boxShadowX" class="Sliders" min="-500" max="500" step="1" value="0" />
                <input type="text" id="boxShadowXValue" class="imageInputBox"
                    placeholder="Enter X-axis Value Manually" />
            </div>

            <hr style="height: 3px; background: brown" />
            <div class="boxShadowY">
                <p class="slider-label">Box Shadow-Y</p>
                <input type="range" id="boxShadowY" class="Sliders" min="-500" max="500" step="1" value="0" />
                <input type="text" id="boxShadowYValue" class="imageInputBox"
                    placeholder="Enter y-axis Value Manually" />
            </div>

            <hr style="height: 3px; background: brown" />

            <div class="boxShadowBlur">
                <p class="slider-label">Box Shadow Blur</p>
                <input type="range" id="boxShadowBlur" class="Sliders" min="10" max="50" step="1" value="0" />
                <input type="text" id="ShadowBlurValue" class="imageInputBox"
                    placeholder="Enter shadow Blur Manually" />
            </div>

            <hr style="height: 3px; background: brown" />

            <div class="boxShadowColor">
                <p class="slider-label">Box Shadow Color</p>
                <input type="color" id="boxShadowColor" value="#000000" style="
                            width: 100%;
                            box-shadow: 0 0 10px rgb(204, 255, 0);
                        " />
            </div>
        </div>
    </div>
    <!-- !IMAGE Effects CONTAINER *******************-->
    <div class="ImageEffect" id="ImageEffect">
        <div class="effectsHeader">
            <p class="effects">Image Effect</p>
            <div class="slider-container" id="imageBlurContainer">
                <p class="slider-label">Image Blur</p>
                <input type="range" id="imageBlurSlider" class="Sliders" min="0" max="100" step="1" />
                <input type="text" id="imageBlurValue" class="imageInputBox" readonly value="0" />
            </div>

            <div class="slider-container">
                <p class="slider-label">Brightness</p>
                <input type="range" id="brightnessSlider" class="Sliders" min="0" max="300" step="1" value="0" />
                <input type="number" id="brightnessValue" class="imageInputBox" readonly value="0" />
            </div>
            <hr style="height: 3px; background: brown" />
            <div class="slider-container">
                <p class="slider-label">Saturation</p>
                <input type="range" id="saturationSlider" class="Sliders" min="0" max="300" step="1" value="100" />
                <input type="text" id="saturationValue" class="imageInputBox" readonly value="0" />
            </div>
            <hr style="height: 3px; background: brown" />
            <div class="slider-container">
                <p class="slider-label">Contrast</p>
                <input type="range" id="contrastSlider" class="Sliders" min="0" max="300" step="1" value="100" />
                <input type="text" id="contrastValue" class="imageInputBox" readonly value="0" />
            </div>
            <hr style="height: 3px; background: brown" />

            <div class="slider-container">
                <p class="slider-label">Opacity</p>
                <input type="range" id="opacitySlider" class="Sliders" min="0" max="1" step="0.01" value="1" />
                <input type="text" id="opacityValue" class="imageInputBox" readonly value="0" />
            </div>
        </div>
    </div>
    <!-- !IMAGE ROTATION CONTAINER -->

    <div class="ImageRotation" id="ImageRotation">
        <p class="effects">ROTATION</p>

        <div class="Imageflip">
            <p>Flip</p>
            <div class="flipIconContainer">
                <div class="flipRight" id="flipRight">
                    <i class="fa-solid fa-repeat"></i>
                </div>
                <div class="flipTop" id="flipTop">
                    <i class="fa-solid fa-arrows-up-down"></i>
                </div>
            </div>
        </div>

        <div class="imageRotateContainer">
            <p>Rotate</p>
            <div class="rotateImageSlider">
                <input type="range" min="0" max="360" id="imageRotateSlider" />
                <input type="text" readonly placeholder="0deg" id="imageRotateValue" />
            </div>
        </div>
    </div>

    <!-- ==========TOOL CONTAINER ==================== -->

    <div class="tool-container">
        <div class="add-text tools" title="Add-text">
            <table style="border-collapse: collapse">
                <tr>
                    <th style="border: none">
                        <i class="fa-solid fa-plus fa-beat"></i>
                    </th>
                    <th style="border: none">AddText</th>
                </tr>
            </table>
        </div>
        <div class="format-text tools" title="Add-text">
            <table style="border: none; border-collapse: collapse">
                <tr>
                    <th style="border: none">
                        <i class="fa-solid fa-pen-to-square fa-beat"></i>
                    </th>
                    <th style="border: none">EditText</th>
                </tr>
            </table>
        </div>

        <div class="format-Image tools" title="Add-text">
            <table style="border: none; border-collapse: collapse">
                <tr>
                    <th style="border: none">
                        <i class="fa-solid fa-pen-to-square fa-beat"></i>
                    </th>
                    <th style="border: none"></th>
                    <th style="border: none">Image</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="workingAreaShadow">
        <div id="working-canvas"></div>
    </div>
    <!-- Layers Container -->

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

    <div></div>

    <!-- ==========CLICK EVENT TRIGGER HTML PART================= -->

    <!-- Popup box -->
    <div class="popup" id="popupBox">
        <button id="closeButton">
            <i class="fa-solid fa-circle-xmark"></i>
        </button>
        <div class="size-icon-div">
            <div class="canvasSizeItem" id="manualSize">
                <i class="fa-regular fa-keyboard"></i>
                Custom Size
                <div class="canvasWidthHeight" id="canvasWidthHeight">
                    <input type="number" placeholder="width" id="canvasWidth" />X
                    <input type="number" placeholder="height" id="canvasHeight" />

                    <button id="setSize">Set Size</button>
                </div>
                <h6 style="color: red; font-size: 16px; display: none" id="sizeError">
                    Width between 40px to 1300px and Height between 40px to
                    750px
                </h6>
            </div>
            <div class="canvasSizeItem" id="youtubeThumbnail">
                <i class="fa-brands fa-youtube" style="color: red"></i>
                Youtube Thumbnail
            </div>
            <div class="canvasSizeItem" id="youtubeBanner">
                <i class="fa-brands fa-square-youtube" style="color: red"></i>
                Youtube Banner
            </div>
            <div class="canvasSizeItem" id="instagramPost">
                <i class="fa-brands fa-square-instagram" style="color: rgb(208, 3, 109)"></i>
                Instagram Posts
            </div>
            <div class="canvasSizeItem" id="logoSize">
                <i class="fa-brands fa-pied-piper" style="color: lightgreen"></i>
                Logo
            </div>
            <div class="canvasSizeItem" id="idCardSize">
                <i class="fa-solid fa-address-card" style="color: skyblue"></i>
                Id Card
            </div>
            <div class="canvasSizeItem" id="instagramStory">
                <i class="fa-solid fa-mobile" style="color: #009dff"></i>
                Instagram Story
            </div>
        </div>
    </div>

    <!--! ;;;;;;;;;;;;;;;;;;;;;CANVAS BACKGROUNDS CONTAINER;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; -->
    <div class="canvasBackgroundContainer" id="canvasBackgroundContainer">
        <select name="backgroundForCanvas" id="backgroundForCanvas">
            <option value="1" selected>Color</option>
            <option value="2">Custom Background</option>
            <option value="3">Wow Background</option>
        </select>
        <div class="backgroundColorCont">
            <div class="usingSolidBg">
                <label for="solid" class="canvasBgLabel">Color</label>
                <input type="color" value="#009dff" id="bgcolor" />
            </div>

            <label for="gradient" class="canvasBgLabel">Gradient Color</label>
            <div class="gradientContainer">
                <div class="gradientBg" id="gradientBg1"></div>
                <div class="gradientBg" id="gradientBg2"></div>
                <div class="gradientBg" id="gradientBg3"></div>
                <div class="gradientBg" id="gradientBg4"></div>
                <div class="gradientBg" id="gradientBg5"></div>
                <div class="gradientBg" id="gradientBg6"></div>
                <div class="gradientBg" id="gradientBg7"></div>
                <div class="gradientBg" id="gradientBg8"></div>
                <div class="gradientBg" id="gradientBg9"></div>
                <div class="gradientBg" id="gradientBg10"></div>
                <div class="gradientBg" id="gradientBg11"></div>
                <div class="gradientBg" id="gradientBg12"></div>
            </div>
        </div>

        <!-- !CUSTOM BACKGROUND OPTION FOR CANVAS -->
        <div class="selectCustomBg" id="selectCustomBg" style="display: none">
            <input type="file" class="CustomBg" id="fileInput" />
            <label for="fileInput" class="uploadText">⬆️ <br />Upload</label>
        </div>

        <!-- ! WOW TEMPLATE BG FOR CANVAS -->
        <div class="wowTemplateContainer" id="wowTemplateContainer" style="display: none">
            <?php


            $gettingdata = "SELECT * FROM template";
            $result = mysqli_query($connect, $gettingdata);

            if ($result) {
                if (
                    mysqli_num_rows($result) >
                    0
                ) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <div class="card" style="width: 18rem">
                            <img src="backendimages/<?php echo $row["image"]; ?>" class="card-img-top img" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $row["name"]; ?>
                                </p>
                            </div>
                        </div>

                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>

    <!-- ---------------------------------CANVAS BORDER Container----------------------------------------------- -->
    <div class="canvasBorderContainer" id="canvasBorderContainer">
        <div class="canvasBorderRTadius">
            <label for="CanvasRadius">Canvas Roundness:</label>
            <input type="text" name="CanvasRadius" id="CanvasRadius" class="canvasBorderRadius"
                placeholder="Border Radius" />
        </div>
        <div class="canvasBorderWidth">
            <label for="CanvasBorderWidth">Border Width:</label>
            <input type="number" name="CanvasBorderWidth" id="CanvasWidth" class="canvasBorderWidth" value="5" />
        </div>
        <div class="canvasBorderType">
            <label for="CanvasBorderType">Border Type:</label>

            <select name="CanvasBorderType" id="CanvasType" class="canvasBorderStyle">
                <option value="solid" selected>solid</option>
                <option value="dotted">dotted</option>
                <option value="dashed">dashed</option>
            </select>
        </div>
        <div class="canvasBorderColor">
            <label for="CanvasBorderColor">Border Color:</label>

            <input type="color" id="CanvasColor" class="canvasBorderColor" />
        </div>
    </div>

    <!-- ================BORDER OFF CANVAS BODY======================= -->

    <!-- ============================================================= -->

    <!-- jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/interactjs@1.10.11/dist/interactjs/interact.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script type="module" src="jscode/editor.js"></script>
    <script type="module" src="jscode/editorLayout.js"></script>
</body>

</html>