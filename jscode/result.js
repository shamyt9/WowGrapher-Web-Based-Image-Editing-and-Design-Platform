function downloadImage() {
    html2canvas($('#reportContainer')[0], {
        scale: 2, // Increase scale for higher quality
        logging: true, // Enable logging for debugging (optional)
        letterRendering: true, // Enhances text rendering (optional)
    }).then(function (canvas) {
        var dataURL = canvas.toDataURL('image/png'); // Change format to PNG

        var a = $('<a>').attr({
            href: dataURL,
            download: 'image.png', // Change file extension to .png
        });

        $('body').append(a);
        a[0].click();

        a.remove();
    });
}
$(document).ready(function () {
    $('#downloadBtn').on('click', downloadImage);

    /*=============ALL VARIABLES OF DIFFERENT CONTAINER=================*/

    var reportContainer = $('#reportContainer');
    var reportHeader = $('#reportHeader');
    var institutionName = $('#institutionName');
    var institutionAddress = $('#institutionAddress');
    var passingYear = $('#passingYear');
    var studentDetail = $('#studentDetail');
    var resultTable = $('#resultTable');
    var td = $('#resultTable td');
    var th = $('#resultTable th');
    var gradeSection = $('#gradeSection');
    var signatureSection = $('#signatureSection');

    /*ON CLICK FUNCTION ON CARD ID*/
    $('#card1').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container1');
        reportHeader.addClass('report-header1');
        institutionName.addClass('institutionName1');
        institutionAddress.addClass('institutionAddress1');
        passingYear.addClass('passingYear1');
        studentDetail.addClass('studentDetail1');
        resultTable.addClass('result-table1');
        td.addClass('td1');
        th.addClass('th1');
        gradeSection.addClass('grade-section1');
        signatureSection.addClass('signature-section1');
    });
    $('#card2').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container2');
        reportHeader.addClass('report-header2');
        institutionName.addClass('institutionName2');
        institutionAddress.addClass('institutionAddress2');
        passingYear.addClass('passingYear2');
        studentDetail.addClass('studentDetail2');
        resultTable.addClass('result-table2');
        td.addClass('td2');
        th.addClass('th2');
        gradeSection.addClass('grade-section2');
        signatureSection.addClass('signature-section2');
    });
    $('#card3').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container3');
        reportHeader.addClass('report-header3');
        institutionName.addClass('institutionName3');
        institutionAddress.addClass('institutionAddress3');
        passingYear.addClass('passingYear3');
        studentDetail.addClass('studentDetail3');
        resultTable.addClass('result-table3');
        td.addClass('td3');
        th.addClass('th3');
        gradeSection.addClass('grade-section3');
        signatureSection.addClass('signature-section3');
    });

    $('#card4').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container5');
        reportHeader.addClass('report-header5');
        institutionName.addClass('institutionName5');
        institutionAddress.addClass('institutionAddress5');
        passingYear.addClass('passingYear5');
        studentDetail.addClass('studentDetail5');
        resultTable.addClass('result-table5');
        td.addClass('td5');
        th.addClass('th5');
        gradeSection.addClass('grade-section5');
        signatureSection.addClass('signature-section5');
    });
    $('#card5').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container6');
        reportHeader.addClass('report-header6');
        institutionName.addClass('institutionName6');
        institutionAddress.addClass('institutionAddress6');
        passingYear.addClass('passingYear6');
        studentDetail.addClass('studentDetail6');
        resultTable.addClass('result-table6');
        td.addClass('td6');
        th.addClass('th6');
        gradeSection.addClass('grade-section6');
        signatureSection.addClass('signature-section6');
    });
    $('#card6').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container7');
        reportHeader.addClass('report-header7');
        institutionName.addClass('institutionName7');
        institutionAddress.addClass('institutionAddress7');
        passingYear.addClass('passingYear7');
        studentDetail.addClass('studentDetail7');
        resultTable.addClass('result-table7');
        td.addClass('td7');
        th.addClass('th7');
        gradeSection.addClass('grade-section7');
        signatureSection.addClass('signature-section7');
    });

    $('#card7').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container8');
        reportHeader.addClass('report-header8');
        institutionName.addClass('institutionName8');
        institutionAddress.addClass('institutionAddress8');
        passingYear.addClass('passingYear8');
        studentDetail.addClass('studentDetail8');
        resultTable.addClass('result-table8');
        td.addClass('td8');
        th.addClass('th8');
        gradeSection.addClass('grade-section8');
        signatureSection.addClass('signature-section8');
    });
    $('#card8').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container9');
        reportHeader.addClass('report-header9');
        institutionName.addClass('institutionName9');
        institutionAddress.addClass('institutionAddress9');
        passingYear.addClass('passingYear9');
        studentDetail.addClass('studentDetail9');
        resultTable.addClass('result-table9');
        td.addClass('td9');
        th.addClass('th9');
        gradeSection.addClass('grade-section9');
        signatureSection.addClass('signature-section9');
    });
    $('#card9').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container10');
        reportHeader.addClass('report-header10');
        institutionName.addClass('institutionName10');
        institutionAddress.addClass('institutionAddress10');
        passingYear.addClass('passingYear10');
        studentDetail.addClass('studentDetail10');
        resultTable.addClass('result-table10');
        td.addClass('td10');
        th.addClass('th10');
        gradeSection.addClass('grade-section10');
        signatureSection.addClass('signature-section10');
    });

    $('#card10').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container11');
        reportHeader.addClass('report-header11');
        institutionName.addClass('institutionName11');
        institutionAddress.addClass('institutionAddress11');
        passingYear.addClass('passingYear11');
        studentDetail.addClass('studentDetail11');
        resultTable.addClass('result-table11');
        td.addClass('td11');
        th.addClass('th11');
        gradeSection.addClass('grade-section11');
        signatureSection.addClass('signature-section11');
    });

    $('#card11').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container12');
        reportHeader.addClass('report-header12');
        institutionName.addClass('institutionName12');
        institutionAddress.addClass('institutionAddress12');
        passingYear.addClass('passingYear12');
        studentDetail.addClass('studentDetail12');
        resultTable.addClass('result-table12');
        td.addClass('td12');
        th.addClass('th12');
        gradeSection.addClass('grade-section12');
        signatureSection.addClass('signature-section12');
    });

    $('#card13').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container13');
        reportHeader.addClass('report-header13');
        institutionName.addClass('institutionName13');
        institutionAddress.addClass('institutionAddress13');
        passingYear.addClass('passingYear13');
        studentDetail.addClass('studentDetail13');
        resultTable.addClass('result-table13');
        td.addClass('td5');
        th.addClass('th5');
        gradeSection.addClass('grade-section13');
        signatureSection.addClass('signature-section13');
    });

    $('#card14').click(function () {
        // removeClass
        reportContainer.removeClass();
        reportHeader.removeClass();
        institutionName.removeClass();
        institutionAddress.removeClass();
        passingYear.removeClass();
        studentDetail.removeClass();
        resultTable.removeClass();
        td.removeClass();
        th.removeClass();
        gradeSection.removeClass();
        signatureSection.removeClass();

        // addClass
        reportContainer.addClass('report-container4');
        reportHeader.addClass('report-header4');
        institutionName.addClass('institutionName4');
        institutionAddress.addClass('institutionAddress4');
        passingYear.addClass('passingYear4');
        studentDetail.addClass('studentDetail4');
        resultTable.addClass('result-table4');
        td.addClass('td4');
        th.addClass('th4');
        gradeSection.addClass('grade-section4');
        signatureSection.addClass('signature-section4');
    });
});
