$(document).ready(function () {
    var canvas = document.getElementById('previewCanvas');
    var ctx = canvas.getContext('2d');
    var img = new Image();

    $('#uploadInput').on('change', function (e) {
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function (event) {
            img.onload = function () {
                canvas.width = img.width;
                canvas.height = img.height;
                drawImageWithTransformations(); // Draw the image with transformations
            };
            img.src = event.target.result;
        };

        reader.readAsDataURL(file);
    });

    function drawImageWithTransformations() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.save(); // Save the current state of the context

        // Apply opacity
        var opacityVal = $('#opacity').val() / 100;
        ctx.globalAlpha = opacityVal; // Set opacity

        // Apply rotation
        var rotationVal = ($('#rotation').val() * Math.PI) / 180; // Convert degrees to radians
        ctx.translate(canvas.width / 2, canvas.height / 2); // Translate to the center of the canvas
        ctx.rotate(rotationVal); // Rotate the canvas
        ctx.drawImage(img, -img.width / 2, -img.height / 2); // Draw the image

        ctx.restore(); // Restore the saved state (removes the translation and rotation)

        // Apply other image processing tools
        var brightnessVal = $('#brightness').val() / 100;
        var contrastVal = $('#contrast').val() / 100;
        var saturationVal = $('#saturation').val() / 100;
        var vignetteVal = $('#vignette').val() / 100;
        var blurVal = $('#blur').val();
        var invertVal = $('#invert').val(); // Get inversion value

        ctx.filter = 'brightness(' + brightnessVal + ')';
        ctx.drawImage(canvas, 0, 0); // Draw the image after applying brightness filter
        ctx.filter = 'contrast(' + contrastVal + ')';
        ctx.drawImage(canvas, 0, 0); // Draw the image after applying contrast filter
        ctx.filter = 'saturate(' + saturationVal + ')';
        ctx.drawImage(canvas, 0, 0); // Draw the image after applying saturation filter
        ctx.filter = 'blur(' + blurVal + 'px)';
        ctx.drawImage(canvas, 0, 0); // Draw the image after applying blur filter

        // Apply inversion effect
        if (invertVal > 0) {
            ctx.filter = 'invert(' + invertVal + '%)';
            ctx.drawImage(canvas, 0, 0); // Draw the image after applying inversion filter
        }

        // Apply vignette effect
        var gradient = ctx.createRadialGradient(
            canvas.width / 2,
            canvas.height / 2,
            0,
            canvas.width / 2,
            canvas.height / 2,
            canvas.width / 2
        );
        gradient.addColorStop(0, 'rgba(0, 0, 0, 0)');
        gradient.addColorStop(1, 'rgba(0, 0, 0, ' + vignetteVal + ')');
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.globalAlpha = 1; // Reset opacity for future drawing
        ctx.filter = 'none'; // Reset filter for future drawing
    }

    $(
        '#brightness, #contrast, #saturation, #vignette, #opacity, #blur, #rotation, #invert'
    ).on('input', function () {
        drawImageWithTransformations(); // Redraw the image with transformations when any input changes
    });

    $('#downloadBtn').on('click', function () {
        var download = document.createElement('a');
        download.href = canvas.toDataURL();
        download.download = 'enhanced_image.png';
        download.click();
    });
});
