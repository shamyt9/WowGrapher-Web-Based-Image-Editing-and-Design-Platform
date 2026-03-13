<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>resultTemplate</title>
    <link rel="stylesheet" href="css/resultStyle.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

</head>

<body>
    <?php include ("include/header.php"); ?>
    <div class="container-fluid" id="mainBlurContainer" style="margin-top:100px;">

        <div class="row" id="mainRow">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <button id="downloadBtn">Download</button>

                <div class="resultDownloadContainer">
                    <div class="report-container1" id="reportContainer">
                        <div class="report-header1" contenteditable="true" id="reportHeader">
                            School Report Card
                        </div>
                        <p class="institutionName1" contenteditable="true" id="institutionName">
                            XYZ PUBLIC SCHOOL
                        </p>
                        <p class="institutionAddress1" contenteditable="true" id="institutionAddress">
                            Civilines, Gorakhpur, Uttar Pradesh, 273016
                        </p>
                        <p class="passingYear1" contenteditable="true" id="passingYear">
                            2020-2021
                        </p>

                        <div class="studentDetail1" id="studentDetail">
                            <p contenteditable="true">
                                <strong>Name:</strong> Harish Rawat
                            </p>
                            <p contenteditable="true">
                                <strong>Class/Section:</strong> 9th A
                            </p>
                        </div>
                        <table class="result-table1" id="resultTable">
                            <thead>
                                <tr>
                                    <th contenteditable="true" class="th1">
                                        Subjects
                                    </th>
                                    <th contenteditable="true" class="th1">
                                        Total Marks
                                    </th>
                                    <th contenteditable="true" class="th1">
                                        Obt. Marks
                                    </th>
                                    <th contenteditable="true" class="th1">
                                        Percentage
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td contenteditable="true" class="td1">
                                        Sub1
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00%
                                    </td>
                                </tr>

                                <tr>
                                    <td contenteditable="true" class="td1">
                                        Sub2
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00%
                                    </td>
                                </tr>
                                <tr>
                                    <td contenteditable="true" class="td1">
                                        Sub3
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00%
                                    </td>
                                </tr>
                                <tr>
                                    <td contenteditable="true" class="td1">
                                        Sub3
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00%
                                    </td>
                                </tr>
                                <tr>
                                    <td contenteditable="true" class="td1">
                                        Sub3
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00%
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td contenteditable="true" class="td1">
                                        Total
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00
                                    </td>
                                    <td contenteditable="true" class="td1">
                                        00%
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="grade-section1" id="gradeSection">
                            <p contenteditable="true">
                                <strong>Grade:</strong> A+
                            </p>
                            <p contenteditable="true">
                                <strong>Percentage:</strong> x%
                            </p>
                            <p contenteditable="true">
                                <strong>Rank:</strong> 1
                            </p>
                        </div>
                        <div class="signature-section1" id="signatureSection">
                            <p contenteditable="true">Principal Sign</p>
                            <p contenteditable="true">Teacher Sign</p>
                            <p contenteditable="true">Parent Sign</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="0ffset-xl-1 offset-lg-1 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                <div class="cardImg">
                    <div class="cardContainer">
                        <div class="card" id="card1">
                            <img src="img/result/Rtemp1.png" alt="" />
                        </div>

                        <div class="card" id="card2">
                            <img src="img/result/Rtemp2.png" alt="" />
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="card" id="card3">
                            <img src="img/result/Rtemp3.png" alt="" />
                        </div>
                        <div class="card" id="card4">
                            <img src="img/result/Rtemp4.png" alt="" />
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="card" id="card5">
                            <img src="img/result/Rtemp5.png" alt="" />
                        </div>
                        <div class="card" id="card6">
                            <img src="img/result/Rtemp6.png" alt="" />
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="card" id="card7">
                            <img src="img/result/Rtemp7.png" alt="" />
                        </div>
                        <div class="card" id="card8">
                            <img src="img/result/Rtemp8.png" alt="" />
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="card" id="card9">
                            <img src="img/result/Rtemp9.png" alt="" />
                        </div>
                        <div class="card" id="card10">
                            <img src="img/result/Rtemp10.png" alt="" />
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="card" id="card11">
                            <img src="img/result/Rtemp11.png" alt="" />
                        </div>
                        <div class="card text-center text-danger" id="card12">
                            Coming Soon
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="card" id="card13">
                            <img src="img/result/Rtemp13.png" alt="" />
                        </div>
                        <div class="card" class="" id="card14">
                            <img src="img/result/Rtemp14.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script src="jscode/result.js"></script>
</body>

</html>