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
    <title>WowText</title>
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton" />

    <!-- =====================BOOTSTRAP LINK =================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- ================REMIXICON LINK================================ -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- ==============================BOXICON LINKS============================= -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===========================>>>FONT AWESOME LINK <<<=================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/WowText.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 255, 0.5)), url("img/banner3.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;

        }

        .mainContainer {
            /* box-shadow: 0 0 2px rgb(123, 255, 79), 0 0 5px rgb(255, 4, 0);*/
            border-radius: 20px;
            padding: 10px;
            border: 1px solid yellow;
            margin-top: 500px;
            backdrop-filter: blur(5px);
            height: auto;

        }

        .wowtext {
            font-size: 10vmin;
            text-align: center;
            font-family: verdana;
            font-weight: bold;
            color: #0c0c0c;
            letter-spacing: 4px;
            text-shadow: 5px 5px rgb(255, 251, 4);
            animation: colorChange 5s infinite alternate, glow 2s infinite;
        }

        @keyframes colorChange {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        @keyframes glow {

            0%,
            100% {
                text-shadow: 5px 5px rgb(255, 251, 4);
            }

            50% {
                text-shadow: 5px 5px rgb(4, 247, 255);
            }

            60% {
                text-shadow: 5px 5px rgb(255, 146, 4);
            }

            75% {
                text-shadow: 5px 5px rgb(255, 4, 4);
            }

            90% {
                text-shadow: 5px 5px rgb(4, 255, 4);
            }
        }

        .row1,
        .row2,
        .row3,
        .row4,
        .row5,
        .row6,
        .row7,
        .row8,
        .row9,
        .row10,
        .row11,
        .row12 {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        @media (max-width:767px) {

            .row1,
            .row2,
            .row3,
            .row4,
            .row5,
            .row6,
            .row7,
            .row8,
            .row9,
            .row10,
            .row11,
            .row12 {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                padding: 20px;
            }

            .mainContainer {
                margin-top: 350px;
            }
        }

        .Tbtn {
            width: 350px;
            height: 140px;
            margin-top: 10px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgb(0, 0, 0);
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 4rem;
            text-transform: uppercase;
        }

        .btn:hover {
            box-shadow: 0 0 20px rgb(255, 231, 45);

            transition: 0.1s;
            border: 2px solid rgb(255, 242, 0);
        }

        #inputContainer {
            width: 95%;
            height: 10%;
            padding: 20px;
            background-color: transparent;
            border-radius: 2px;
            /*margin-left: 18%;*/
            text-decoration: none;
            font-size: 15vmin;
            text-align: center;
        }

        .outerinput {
            box-shadow: 0 0 20px black;
            background: rgb(53, 53, 53);
        }

        /*.buttonGroups {
                margin-left: 75%;
            }*/
        #resetBtn,
        #downloadBg,
        #downloadNoBg {
            padding: 5px;
            border-radius: 10px;
            background-color: rgb(110, 221, 254);
            color: black;
            font-size: 1rem;
            cursor: pointer;
        }

        #resetBtn:hover,
        #downloadNoBg:hover {
            color: white;
            background-color: #022c6b;
            border: 2px solid white;
            transition: 0.2s ease;
        }

        .Theader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            margin-top: 80px;
            background: rgba(0, 0, 0, 0.723);
            backdrop-filter: blur(10px);
            z-index: 1000;
        }

        .downloadNoBg {
            background: transparent;
            margin: auto;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include ("include/header.php"); ?>
    <section class="Theader">
        <div class="textheadingLogo">
            <h1 class="wowtext">WowText</h1>
        </div>
        <div class="mainInputContainer">
            <div class="btncolorGroup">
                <div class="buttonGroups">
                    <!-- <a href="create.php" id="resetBtn" class="text-danger btn-danger btn">Reset</a> -->
                    <button id="resetBtn">Reset</button>
                    <button id="downloadNoBg">Download</button>

                </div>
            </div>

            <div class="outerinput">
                <div class="downloadNoBg">
                    <div id="inputContainer" contenteditable="true" spellcheck="false">TYPE</div>
                </div>
            </div>
        </div>
    </section>

    <div class="mainContainer">
        <div class="row1">
            <div class="Tbtn" id="text1">text1</div>
            <div class="Tbtn" id="text2">text2</div>
            <div class="Tbtn" id="text3">text3</div>
            <div class="Tbtn" id="text4">text4</div>
        </div>
        <div class="row2">
            <div class="Tbtn" id="text5">text5</div>
            <div class="Tbtn" id="text6">text6</div>
            <div class="Tbtn" id="text7">text7</div>
            <div class="Tbtn" id="text8">text8</div>
        </div>
        <div class="row3">
            <div class="Tbtn" id="text9Outer">
                <div id="text9">text9</div>
            </div>
            <div class="Tbtn" id="text10">text10</div>
            <div class="Tbtn" id="text11">text11</div>
            <div class="Tbtn" id="text12">
                <div id="innertext12">text12</div>
            </div>
        </div>
        <div class="row4">
            <div class="Tbtn" id="text13">
                <div id="innertext13">text13</div>
            </div>
            <div class="Tbtn" id="text14">
                <div id="innertext14">text14</div>
            </div>
            <div class="Tbtn" id="text15">
                <div id="innertext15">text15</div>
            </div>
            <div class="Tbtn" id="text16">
                <div id="innertext16">text16</div>
            </div>
        </div>
        <div class="row5">
            <div class="Tbtn" id="text17">
                <div id="innertext17">text17</div>
            </div>
            <div class="Tbtn" id="text18">
                <div id="innertext18">text18</div>
            </div>
            <div class="Tbtn" id="text19">text19</div>
            <div class="Tbtn" id="text20">text20</div>
        </div>
        <div class="row6">
            <div class="Tbtn" id="text21">text21</div>
            <div class="Tbtn" id="text22">text22</div>
            <div class="Tbtn" id="text23">text23</div>
            <div class="Tbtn" id="text24">text24</div>
        </div>
        <div class="row7">
            <div class="Tbtn" id="text25">text25</div>
            <div class="Tbtn" id="text26">text26</div>
            <div class="Tbtn" id="text27">text27</div>
            <div class="Tbtn" id="text28">text28</div>
        </div>
        <div class="row8">
            <div class="Tbtn" id="text29">text29</div>
            <div class="Tbtn" id="text30">text30</div>
            <div class="Tbtn" id="text31">text31</div>
            <div class="Tbtn" id="text32">text32</div>
        </div>
        <div class="row9">
            <div class="Tbtn" id="text33">text33</div>
            <div class="Tbtn" id="text34">text34</div>
            <div class="Tbtn" id="text35">text35</div>
            <div class="Tbtn" id="text36">text36</div>
        </div>
        <div class="row10">
            <div class="Tbtn" id="text37">text37</div>
            <div class="Tbtn" id="text38">text38</div>
            <div class="Tbtn" id="text39">text39</div>
            <div class="Tbtn" id="text40">text40</div>
        </div>
        <div class="row11">
            <div class="Tbtn" id="text41">text41</div>
            <div class="Tbtn" id="text42">text42</div>
            <div class="Tbtn" id="text43">text43</div>
            <div class="Tbtn" id="text44">text44</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text45">text45</div>
            <div class="Tbtn" id="text46">text46</div>
            <div class="Tbtn" id="text47">text47</div>
            <div class="Tbtn" id="text48">text48</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text49">text49</div>
            <div class="Tbtn" id="text50">text50</div>
            <div class="Tbtn" id="text51">text51</div>
            <div class="Tbtn" id="text52">text52</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text53">text53</div>
            <div class="Tbtn" id="text54">text54</div>
            <div class="Tbtn" id="text55">text55</div>
            <div class="Tbtn" id="text56">text56</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text57">text57</div>
            <div class="Tbtn" id="text58">text58</div>
            <div class="Tbtn" id="text59">text59</div>
            <div class="Tbtn" id="text60">text60</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text61">text61</div>
            <div class="Tbtn" id="text62">text62</div>
            <div class="Tbtn" id="text63">text63</div>
            <div class="Tbtn" id="text64">text64</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text65">text65</div>
            <div class="Tbtn" id="text66">text66</div>
            <div class="Tbtn" id="text67">text67</div>
            <div class="btn" id="text68">text68</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text69">text69</div>
            <div class="Tbtn" id="text70">text70</div>
            <div class="Tbtn" id="text71">text71</div>
            <div class="Tbtn" id="text72">text72</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text73">text73</div>
            <div class="Tbtn" id="text74">text74</div>
            <div class="Tbtn" id="text75">text75</div>
            <div class="Tbtn" id="text76">text76</div>
        </div>
        <div class="row12">
            <div class="Tbtn" id="text77">text77</div>
            <div class="Tbtn" id="text78">text78</div>
            <div class="Tbtn" id="text79">text79</div>
            <div class="Tbtn" id="text80">text80</div>
        </div>
    </div>
    <div class="row12">
        <div class="Tbtn" id="text81">text81</div>
        <div class="Tbtn" id="text82">text82</div>
        <div class="Tbtn" id="text83">text83</div>
        <div class="Tbtn" id="text84">text84</div>
    </div>
    </div>
    <div class="row12">
        <div class="Tbtn" id="text85">text85</div>
        <div class="Tbtn" id="text86">text86</div>
        <div class="Tbtn" id="text87">text87</div>
        <div class="Tbtn" id="text88">text88</div>
    </div>
    </div>
    <div class="row12">
        <div class="Tbtn" id="text89">text89</div>
        <div class="Tbtn" id="text90">text90</div>
        <div class="Tbtn" id="text91">text91</div>
        <div class="Tbtn" id="text92">text92</div>
    </div>
    </div>
    <div class="row12">
        <div class="Tbtn" id="text93">text93</div>
        <div class="Tbtn" id="text94">text94</div>
        <div class="Tbtn" id="text95">text95</div>
        <div class="Tbtn" id="text96">text96</div>
    </div>
    </div>
    <div class="row12">
        <div class="Tbtn" id="text97">text97</div>
        <div class="Tbtn" id="text98">text98</div>
        <div class="Tbtn" id="text99">text99</div>
        <div class="Tbtn" id="text100">text100</div>
    </div>


    </div>
    <!-- =======================LINKS OF ICONS (SEARCH)============================= -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- =====================SWIPPER .JS LINK ===================================== -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- ======================JQUERY CDN LINK================================ -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script>
        $(document).ready(function () {
            let resetBtn = $('#resetBtn');
            let downloadBg = $('#downloadBg');
            let downloadNoBg = $('#downloadNoBg');

            let input = $('#inputContainer');
            let withoutBg = $('.downloadNoBg');

            $('#text1').click(function () {
                input.removeClass();
                input.addClass('text1');
            });
            $('#text2').click(function () {
                input.removeClass();
                input.addClass('text2');
            });
            $('#text3').click(function () {
                input.removeClass();
                input.addClass('text3');
            });
            $('#text4').click(function () {
                input.removeClass();
                input.addClass('text4');
            });
            $('#text5').click(function () {
                input.removeClass();
                input.addClass('text5');
            });
            $('#text6').click(function () {
                input.removeClass();
                input.addClass('text6');
            });
            $('#text7').click(function () {
                input.removeClass();
                input.addClass('text7');
            });
            $('#text8').click(function () {
                input.removeClass();
                input.addClass('text8');
            });
            $('#text9').click(function () {
                input.removeClass();
                input.addClass('text9 text9Outer');
            });
            $('#text10').click(function () {
                input.removeClass();
                input.addClass('text10');
            });
            $('#text11').click(function () {
                input.removeClass();
                input.addClass('text11');
            });
            $('#text12').click(function () {
                input.removeClass();
                input.addClass('text12');
                input.addClass('innertext12');
            });
            $('#text13').click(function () {
                input.removeClass();
                input.addClass('text13 innertext13');
            });
            $('#text14').click(function () {
                input.removeClass();
                input.addClass('text14 innertext14');
            });
            $('#text15').click(function () {
                input.removeClass();
                input.addClass('text15 innertext15');
            });
            $('#text16').click(function () {
                input.removeClass();
                input.addClass('text16 innertext16');
            });
            $('#text17').click(function () {
                input.removeClass();
                input.addClass('text17 innertext17');
            });
            $('#text18').click(function () {
                input.removeClass();
                input.addClass('text18 innertext18');
            });
            $('#text19').click(function () {
                input.removeClass();
                input.addClass('text19');
            });
            $('#text20').click(function () {
                input.removeClass();
                input.addClass('text20');
            });
            $('#text21').click(function () {
                input.removeClass();
                input.addClass('text21');
            });
            $('#text22').click(function () {
                input.removeClass();
                input.addClass('text22');
            });
            $('#text23').click(function () {
                input.removeClass();
                input.addClass('text23');
            });
            $('#text24').click(function () {
                input.removeClass();
                input.addClass('text24');
            });
            $('#text25').click(function () {
                input.removeClass();
                input.addClass('text25');
            });
            $('#text26').click(function () {
                input.removeClass();
                input.addClass('text26');
            });
            $('#text27').click(function () {
                input.removeClass();
                input.addClass('text27');
            });
            $('#text28').click(function () {
                input.removeClass();
                input.addClass('text28');
            });
            $('#text29').click(function () {
                input.removeClass();
                input.addClass('text29');
            });
            $('#text30').click(function () {
                input.removeClass();
                input.addClass('text30');
            });
            $('#text31').click(function () {
                input.removeClass();
                input.addClass('text31');
            });
            $('#text32').click(function () {
                input.removeClass();
                input.addClass('text32');
            });
            $('#text33').click(function () {
                input.removeClass();
                input.addClass('text33');
            });
            $('#text34').click(function () {
                input.removeClass();
                input.addClass('text34');
            });
            $('#text35').click(function () {
                input.removeClass();
                input.addClass('text35');
            });
            $('#text36').click(function () {
                input.removeClass();
                input.addClass('text36');
            });
            $('#text37').click(function () {
                input.removeClass();
                input.addClass('text37');
            });
            $('#text38').click(function () {
                input.removeClass();
                input.addClass('text38');
            });
            $('#text39').click(function () {
                input.removeClass();
                input.addClass('text39');
            });
            $('#text40').click(function () {
                input.removeClass();
                input.addClass('text40');
            });
            $('#text41').click(function () {
                input.removeClass();
                input.addClass('text41');
            });
            $('#text42').click(function () {
                input.removeClass();
                input.addClass('text42');
            });
            $('#text43').click(function () {
                input.removeClass();
                input.addClass('text43');
            });
            $('#text44').click(function () {
                input.removeClass();
                input.addClass('text44');
            });
            $('#text45').click(function () {
                input.removeClass();
                input.addClass('text45');
            });
            $('#text46').click(function () {
                input.removeClass();
                input.addClass('text46');
            });
            $('#text47').click(function () {
                input.removeClass();
                input.addClass('text47');
            });
            $('#text48').click(function () {
                input.removeClass();
                input.addClass('text48');
            });
            $('#text49').click(function () {
                input.removeClass();
                input.addClass('text49');
            });
            $('#text50').click(function () {
                input.removeClass();
                input.addClass('text50');
            });
            $('#text51').click(function () {
                input.removeClass();
                input.addClass('text51');
            });
            $('#text52').click(function () {
                input.removeClass();
                input.addClass('text52');
            });
            $('#text53').click(function () {
                input.removeClass();
                input.addClass('text53');
            });
            $('#text54').click(function () {
                input.removeClass();
                input.addClass('text54');
            });
            $('#text55').click(function () {
                input.removeClass();
                input.addClass('text55');
            });
            $('#text56').click(function () {
                input.removeClass();
                input.addClass('text56');
            });
            $('#text57').click(function () {
                input.removeClass();
                input.addClass('text57');
            });
            $('#text58').click(function () {
                input.removeClass();
                input.addClass('text58');
            });
            $('#text59').click(function () {
                input.removeClass();
                input.addClass('text59');
            });
            $('#text60').click(function () {
                input.removeClass();
                input.addClass('text60');
            });
            $('#text61').click(function () {
                input.removeClass();
                input.addClass('text61');
            });
            $('#text62').click(function () {
                input.removeClass();
                input.addClass('text62');
            });
            $('#text63').click(function () {
                input.removeClass();
                input.addClass('text63');
            });
            $('#text64').click(function () {
                input.removeClass();
                input.addClass('text64');
            });
            $('#text65').click(function () {
                input.removeClass();
                input.addClass('text65');
            });
            $('#text66').click(function () {
                input.removeClass();
                input.addClass('text66');
            });
            $('#text67').click(function () {
                input.removeClass();
                input.addClass('text67');
            });
            $('#text68').click(function () {
                input.removeClass();
                input.addClass('text68');
            });
            $('#text69').click(function () {
                input.removeClass();
                input.addClass('text69');
            });
            $('#text70').click(function () {
                input.removeClass();
                input.addClass('text70');
            });
            $('#text71').click(function () {
                input.removeClass();
                input.addClass('text71');
            });
            $('#text72').click(function () {
                input.removeClass();
                input.addClass('text72');
            });
            $('#text73').click(function () {
                input.removeClass();
                input.addClass('text73');
            });
            $('#text74').click(function () {
                input.removeClass();
                input.addClass('text74');
            });
            $('#text75').click(function () {
                input.removeClass();
                input.addClass('text75');
            });
            $('#text76').click(function () {
                input.removeClass();
                input.addClass('text76');
            });
            $('#text77').click(function () {
                input.removeClass();
                input.addClass('text77');
            });
            $('#text78').click(function () {
                input.removeClass();
                input.addClass('text78');
            });
            $('#text79').click(function () {
                input.removeClass();
                input.addClass('text79');
            });
            $('#text80').click(function () {
                input.removeClass();
                input.addClass('text80');
            });
            $('#text81').click(function () {
                input.removeClass();
                input.addClass('text81');
            });
            $('#text82').click(function () {
                input.removeClass();
                input.addClass('text82');
            });
            $('#text83').click(function () {
                input.removeClass();
                input.addClass('text83');
            });
            $('#text84').click(function () {
                input.removeClass();
                input.addClass('text84');
            }); $('#text85').click(function () {
                input.removeClass();
                input.addClass('text85');
            }); $('#text86').click(function () {
                input.removeClass();
                input.addClass('text86');
            }); $('#text87').click(function () {
                input.removeClass();
                input.addClass('text87');
            }); $('#text88').click(function () {
                input.removeClass();
                input.addClass('text88');
            }); $('#text89').click(function () {
                input.removeClass();
                input.addClass('text89');
            }); $('#text90').click(function () {
                input.removeClass();
                input.addClass('text90');
            }); $('#text91').click(function () {
                input.removeClass();
                input.addClass('text91');
            }); $('#text92').click(function () {
                input.removeClass();
                input.addClass('text92');
            }); $('#text93').click(function () {
                input.removeClass();
                input.addClass('text93');
            }); $('#text94').click(function () {
                input.removeClass();
                input.addClass('text94');
            }); $('#text95').click(function () {
                input.removeClass();
                input.addClass('text95');
            }); $('#text96').click(function () {
                input.removeClass();
                input.addClass('text96');
            }); $('#text97').click(function () {
                input.removeClass();
                input.addClass('text97');
            }); $('#text98').click(function () {
                input.removeClass();
                input.addClass('text98');
            }); $('#text99').click(function () {
                input.removeClass();
                input.addClass('text99');
            }); $('#text100').click(function () {
                input.removeClass();
                input.addClass('text100');
            });




            downloadNoBg.click(function () {
                // Use html2canvas to capture the content of the inputContainer without background
                html2canvas(input[0], {
                    backgroundColor: 'transparent',
                }).then(function (canvas) {
                    // Remove borders by drawing the content on a new canvas without borders
                    let borderlessCanvas = document.createElement('canvas');
                    borderlessCanvas.width = canvas.width;
                    borderlessCanvas.height = canvas.height;

                    let ctx = borderlessCanvas.getContext('2d');
                    ctx.drawImage(canvas, 0, 0);

                    // Convert the borderless canvas to a data URL and trigger the download
                    let imgData = borderlessCanvas.toDataURL('image/png');
                    let link = document.createElement('a');
                    link.href = imgData;
                    link.download = 'text_no_bg.png';
                    link.click();
                });
            });

            resetBtn.click(function () {
                input.removeClass();
            });
        });
    </script>
</body>

</html>