$(document).ready(function () {
    // !---------------------------------WORKING CANVAS VARIABLE------------------------------
    var a = $('#working-canvas');
    // !--------------------------------------------------------------------------------------
    var profilePhoto = $('#profile');
    var mainEditingContainer = $('.main-editing-container');
    // !---------------------------------FOR TEXT LOCK AND UNLOCK----------------------------------------------
    const lockTextPosition = document.getElementById('lockTextPosition');
    const textUnlocked = document.getElementById('textUnlocked');
    // !---------------------------IMAGE WIDTH AND HEIGHT VARIABLE------------------------------------------------------------
    const widthSlider = document.getElementById('widthSlider');
    const heightSlider = document.getElementById('heightSlider');
    const widthValue = document.getElementById('widthValue');
    const heightValue = document.getElementById('heightValue');
    var ImageDefaultSize = document.getElementById('ImageDefaultSize');
    // !---------------------------IMAGE BORDER WIDTH AND RADIUS------------------------------------------------------
    const radiusSlider = document.getElementById('radiusSlider');
    const radiusValue = document.getElementById('radiusValue');
    const borderWidthSlider = document.getElementById('borderWidthSlider');
    const borderWidthValue = document.getElementById('borderWidthValue');
    const borderColor = document.getElementById('borderColor');
    const imageBorderStyle = document.getElementById('imageBorderStyle');
    // !----------------------------IMAGE SHADOW VARIABLES--------------------------------------------------------
    const boxShadowX = document.getElementById('boxShadowX');
    const boxShadowXValue = document.getElementById('boxShadowXValue');
    const boxShadowY = document.getElementById('boxShadowY');
    const boxShadowYValue = document.getElementById('boxShadowYValue');
    const boxShadowBlur = document.getElementById('boxShadowBlur');
    const boxShadowBlurValue = document.getElementById('ShadowBlurValue');
    const boxShadowColor = document.getElementById('boxShadowColor');
    // !-------------------------IMAGE EFFECTS VARIABLES------------------------------------------------------------
    const imageBlurSlider = document.getElementById('imageBlurSlider');
    const imageBlurValue = document.getElementById('imageBlurValue');
    const brightnessSlider = document.getElementById('brightnessSlider');
    const brightnessValue = document.getElementById('brightnessValue');
    const saturationSlider = document.getElementById('saturationSlider');
    const contrastSlider = document.getElementById('contrastSlider');

    const opacitySlider = document.getElementById('opacitySlider');

    const saturationValue = document.getElementById('saturationValue');
    const contrastValue = document.getElementById('contrastValue');
    const I_opacityValue = document.getElementById('opacityValue');
    // !-------------------------------IMAGE ROTATION VARIABLE ---------------------------------------------------
    var flipRight = document.getElementById('flipRight');

    var flipTop = document.getElementById('flipTop');
    var imageRotateSlider = document.getElementById('imageRotateSlider');
    var imageRotateValue = document.getElementById('imageRotateValue');

    // !GET ID OF THAT IMAGE -------------------------------------------------------------------------------------
    let selectedImageId = null; // Variable to store the ID of the selected image

    // ?---------------------------------UNDO FUNCTIONALITY----------------------------------------------------
    let historyStack = [];

    function recordState() {
        const canvasState = $('#working-canvas').html();
        const layersState = $('#layersList').html();
        historyStack.push({
            canvasState: canvasState,
            layersState: layersState,
        });
    }

    function undo() {
        if (historyStack.length > 0) {
            const lastState = historyStack.pop();
            $('#working-canvas').html(lastState.canvasState);
            $('#layersList').html(lastState.layersState);
        }
    }

    $('#undoButton').on('click', function () {
        undo();
    });

    $(document).keydown(function (event) {
        if (event.ctrlKey && event.key === 'z') {
            event.preventDefault(); // Prevent the default action (undo in the browser)
            undo(); // Call the undo function
        }
    });

    // ?----------------------------------------------------------------------------------------------------------------
    //!--------------------------------------ADD TEXT BOX AND STYLING TEXT---------------------------------------------
    function addTextBox() {
        recordState();
        var activeClass = false;

        var uniqueId = 'Text-Layer' + new Date().getTime();

        // Create a textbox
        var newTextbox = $(
            '<div class="added-textbox" id="' +
                uniqueId +
                '" style="background:none;font-size:1.5rem;border:2px solid black;padding:10px;z-index:auto;" contentEditable>Enter Your Text Here...</div>'
        );
        // Create a corresponding layer with a delete icon
        var layerBox = $(
            '<li class="layerBox"  draggable="true" style="cursor:pointer;user-select:none;z-index:auto;"  id="layer-' +
                uniqueId +
                '" >' +
                uniqueId +
                ' <i class="delete-icon fa-solid fa-trash" style="cursor: pointer; color: red;"></i></li>'
        );
        layerBox.on('dragstart', function (e) {
            e.originalEvent.dataTransfer.setData('text/plain', uniqueId);
            setTimeout(() => {
                layerBox.addClass('dragging');
            }, 0);
        });

        // Add dragover event listener for layerBox
        layerBox.on('dragover', function (e) {
            e.preventDefault();
        });
        // Add dragend event listener for layerBox
        layerBox.on('dragend', function () {
            setTimeout(() => {
                layerBox.removeClass('dragging');
            }, 0);
        });
        layerBox.on('drop', function (e) {
            e.preventDefault();
            const draggedUniqueId =
                e.originalEvent.dataTransfer.getData('text/plain');
            const droppedUniqueId = $(this).attr('id').replace('layer-', '');

            const draggedElement = $('#layer-' + draggedUniqueId);
            const droppedElement = $(this);

            // Reposition the elements in DOM
            if (draggedElement.index() < droppedElement.index()) {
                droppedElement.after(draggedElement);
            } else {
                droppedElement.before(draggedElement);
            }
            // Update z-index of images based on layerBox order
            updateZIndex();
        });

        // Add border when clicked
        newTextbox.on('click', function () {
            // Set border for the clicked textbox
            $(this).css('border', '1px dotted #000');

            // Highlight the corresponding layer
            $('.layerBox').css('background-color', ''); // Reset all layers
            $('#layer-' + uniqueId).css('background-color', 'orange'); // Highlight corresponding layer

            activeClass = true;
            $('#textEdit').css('display', 'flex');
            $('#imageEdit').css('display', 'none');
        });

        layerBox.on('click', function () {
            // Highlight the corresponding textbox
            $('.added-textbox').css('border', '2px solid black'); // Reset all textboxes
            $('#' + uniqueId).css('border', '1px dotted #000'); // Highlight corresponding textbox

            // Highlight the layer
            $('.layerBox').css('background-color', ''); // Reset all layers
            $(this).css('background-color', 'red'); // Highlight the clicked layer

            activeClass = true;
            $('#textEdit').css('display', 'flex');
            $('#imageEdit').css('display', 'none');
        });

        // Delete the textbox and layer when the delete icon is clicked
        layerBox.find('.delete-icon').on('click', function (event) {
            event.stopPropagation(); // Prevent the layer click event from triggering
            // Record the current state before deleting
            recordState();
            // Remove the textbox and layer
            $('#' + uniqueId).remove();
            layerBox.remove();
            // Update z-index of remaining images
            updateZIndex();
        });
        // Update z-index initially
        updateZIndex();

        //! Remove border when clicked outside the div
        a.on('click', function (event) {
            if (!$(event.target).closest('.added-textbox').length) {
                newTextbox.css('border', 'none');
                activeClass = false;
                $('#textEdit').css('display', 'none');
                $('.layerBox').css('background-color', ''); // Reset all layers
            }
        });

        a.append(newTextbox);
        $('#layersList').append(layerBox);

        $('#fontSize').change(function () {
            var size = $(this).val();
            if (activeClass) {
                if (size === 'custom') {
                    $('#customSize').show();
                } else {
                    $('#customSize').hide();
                    newTextbox.css('font-size', size + 'rem');
                }
                recordState();
            }
        });

        $('#customSize').change(function () {
            if (activeClass) {
                var customSize = $(this).val();
                newTextbox.css('font-size', customSize + 'rem');
                recordState();
            }
        });

        $('#fontFamily').change(function () {
            if (activeClass) {
                var fontFamily = $(this).val();
                newTextbox.css('font-family', fontFamily);
                recordState();
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
                recordState();
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
                recordState();
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
                recordState();
            }
        });
        $('#strikethrough').click(function () {
            if (activeClass) {
                $(this).toggleClass('strike');

                if ($(this).hasClass('strike')) {
                    newTextbox.css('text-decoration', 'line-through');
                } else {
                    newTextbox.css('text-decoration', 'none');
                }
                recordState();
            }
        });

        $('#fontColor').change(function () {
            if (activeClass) {
                var fontColor = $('#fontColor').val();
                newTextbox.css('color', fontColor);
                recordState();
            }
        });
        $('#textBackground').change(function () {
            if (activeClass) {
                var fontbgColor = $('#textBackground').val();
                var BackgroundOpacityValue = $('#textBackgroundOpacity').val();
                newTextbox.css(
                    'background-color',
                    convertHexToRGBA(fontbgColor, BackgroundOpacityValue)
                );
                recordState();
            }
        });

        $('#textBackgroundOpacity').on('input change', function () {
            if (activeClass) {
                var fontbgColor = $('#textBackground').val();
                var BackgroundOpacityValue = $('#textBackgroundOpacity').val();
                $('#BackgroundOpacityValue').val(BackgroundOpacityValue);
                newTextbox.css(
                    'background-color',
                    convertHexToRGBA(fontbgColor, BackgroundOpacityValue)
                );
                recordState();
            }
        });

        $('#BackgroundRoundnessRange').on('input change', function () {
            if (activeClass) {
                var BackgroundRoundnessValue = $(
                    '#BackgroundRoundnessRange'
                ).val();
                $('#BackgroundRoundnessValue').val(
                    BackgroundRoundnessValue + 'px'
                );
                newTextbox.css(
                    'border-radius',
                    BackgroundRoundnessValue + 'px'
                );
                recordState();
            }
        });

        $('#textBackgroundPaddingRange').on('input change', function () {
            if (activeClass) {
                var BackgroundPaddingValue = $(
                    '#textBackgroundPaddingRange'
                ).val();
                $('#BackgroundPaddingValue').val(BackgroundPaddingValue + 'px');
                newTextbox.css('padding', BackgroundPaddingValue + 'px');
                recordState();
            }
        });

        // ! TEXT STROKE CODING
        $('#strokeColor').change(function () {
            if (activeClass) {
                var strokeColor = $('#strokeColor').val();
                var strokeWidth = $('#strokeWidth').val();
                newTextbox.css(
                    '-webkit-text-stroke',
                    strokeWidth + 'px ' + strokeColor
                );
                recordState();
            }
        });

        $('#strokeWidth').on('input change', function () {
            if (activeClass) {
                var strokeColor = $('#strokeColor').val();
                var strokeWidth = $('#strokeWidth').val();
                $('#strokeWidthValue').val(strokeWidth + 'px');
                newTextbox.css(
                    '-webkit-text-stroke',
                    strokeWidth + 'px ' + strokeColor
                );
                recordState();
            }
        });

        // ! TEXT HOLLOW CODING
        $('#hollowColor').change(function () {
            if (activeClass) {
                var hollowColor = $('#hollowColor').val();
                var hollowWidth = $('#hollowWidth').val();
                newTextbox.css({
                    color: 'transparent',
                    '-webkit-text-stroke': hollowWidth + 'px ' + hollowColor,
                });
                recordState();
            }
        });

        $('#hollowWidth').on('input change', function () {
            if (activeClass) {
                var hollowColor = $('#hollowColor').val();
                var hollowWidth = $('#hollowWidth').val();
                $('#hollowWidthValue').val(hollowWidth + 'px');
                newTextbox.css({
                    color: 'transparent',
                    '-webkit-text-stroke': hollowWidth + 'px ' + hollowColor,
                });
                recordState();
            }
        });

        // ! TEXT SHADOW CODING
        function updateTextShadow() {
            if (activeClass) {
                var shadowColor = $('#shadowColor').val();
                var shadowOffset = $('#shadowOffset').val();
                var shadowBlur = $('#shadowBlur').val();
                var shadowTransparency = $('#shadowTransparent').val();
                var shadowDirection = $('#shadowDirrection').val();
                var radians = shadowDirection * (Math.PI / 180);
                var xOffset = shadowOffset * Math.cos(radians);
                var yOffset = shadowOffset * Math.sin(radians);
                var rgbaShadowColor = convertHexToRGBA(
                    shadowColor,
                    shadowTransparency
                );
                var shadowValue =
                    xOffset +
                    'px ' +
                    yOffset +
                    'px ' +
                    shadowBlur +
                    'px ' +
                    rgbaShadowColor;

                newTextbox.css('text-shadow', shadowValue);
                recordState();
            }
        }

        $('#shadowColor').change(updateTextShadow);
        $('#shadowOffset').on('input change', function () {
            $('#shadowOffsetValue').val($(this).val() + 'px');
            updateTextShadow();
        });
        $('#shadowBlur').on('input change', function () {
            $('#shadowBlurValue').val($(this).val() + 'px');
            updateTextShadow();
        });
        $('#shadowTransparent').on('input change', function () {
            $('#shadowTransparentValue').val($(this).val());
            updateTextShadow();
        });
        $('#shadowDirrection').on('input change', function () {
            $('#shadowDirrectionValue').val($(this).val() + '°');
            updateTextShadow();
        });

        // ! TEXT GLOW EFFECTS CODING
        function updateGlowEffect() {
            if (activeClass) {
                var textColor = $('#glowColor').val();
                var outlineColor = $('#glowOutlineColor').val();
                var glowOffset = $('#glowOffset').val();
                var shadowValue = `0px 0px ${glowOffset}px ${textColor}`;
                newTextbox.css({
                    color: textColor,
                    '-webkit-text-stroke': `1px ${outlineColor}`,
                    'text-shadow': shadowValue,
                });
                recordState();
            }
        }

        $('#glowColor').change(function () {
            updateGlowEffect();
        });

        $('#glowOutlineColor').change(function () {
            updateGlowEffect();
        });

        $('#glowOffset').on('input change', function () {
            $('#glowOffsetValue').val($(this).val() + 'px');
            updateGlowEffect();
        });

        // Initialize with default values
        updateGlowEffect();

        $('#fontNone').click(function () {
            if (activeClass) {
                var currentFontColor = newTextbox.css('color');
                newTextbox.css({
                    'background-color': '',
                    '-webkit-text-stroke': '',
                    'text-shadow': '',
                    'border-radius': '',
                    padding: '',
                    color: currentFontColor, // Keep the font color
                });
                recordState();
            }
        });

        // Function to convert hex color to RGBA
        function convertHexToRGBA(hex, opacity) {
            hex = hex.replace('#', '');
            var r = parseInt(hex.substring(0, 2), 16);
            var g = parseInt(hex.substring(2, 4), 16);
            var b = parseInt(hex.substring(4, 6), 16);

            return 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
        }

        //!===================FOR ENABLING TEXT DRAG OPTION====================================
        var isMoving = false;
        var isEditing = false;
        var offsetX, offsetY;
        var editedTextbox = null;

        function canMove() {
            return !$('#textUnlocked').hasClass('lockTextPositionShow');
        }

        // Moving the text box
        newTextbox.mousedown(function (event) {
            if (activeClass && canMove() && !isEditing) {
                isMoving = true;
                offsetX = event.pageX - $(this).offset().left;
                offsetY = event.pageY - $(this).offset().top;
                editedTextbox = $(this);
            }
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
            } else {
                isMoving = false; // Disable dragging on click
            }
        });

        // Prevent dragging during text editing
        newTextbox.on('mousedown', '[contenteditable=true]', function (event) {
            event.stopPropagation();
        });

        // Handle key events to allow normal text editing
        newTextbox.keydown(function (event) {
            // Allow Enter key and backspace during text editing
            if (isEditing && (event.which === 13 || event.which === 8)) {
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

        // Text opacity adjustment
        $('.textTransparencyRange').on('input change', function () {
            if (editedTextbox) {
                var opacityValue = $(this).val(); // Retrieve the opacity value from the range input
                editedTextbox.css('opacity', opacityValue);
            }
        });

        //======================================================================================================
    }
    //!----------------------------------------------------------------------------------------------------------------

    //? >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> FOR SHOWING TEXT FORMATTING TOOL<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    $('.format-text').click(function () {
        var textEditDisplay = $('#textEdit').css('display');

        $(this).toggleClass(' formatTextHover');
        if ($(this).hasClass('formatTextHover')) {
            $('#imageEdit').css('display', 'none');
            $('#textEdit').css('display', 'flex');
            $('.format-Image').removeClass('formatTextHover');
        } else {
            $('#textEdit').css('display', 'none');
        }
    });
    //? >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    //* ************************************For HANDLING IMAGE EDITING TOOLS CONTAINER*******************************

    $('.format-Image').click(function () {
        $(this).toggleClass('formatTextHover');

        if ($(this).hasClass('formatTextHover')) {
            $('#imageEdit').css('display', 'flex');
            $('.format-text').removeClass('formatTextHover');
            $('#textEdit').css('display', 'none');
        } else {
            $('#imageEdit').css('display', 'none');
        }
    });
    //* ************************************For HANDLING IMAGE EDITING TOOLS CONTAINER*******************************

    //!===========================CLICK EVENT TO ADD TEXT BOX========================================================
    $('.add-text').click(function () {
        addTextBox();
    });
    //!==============================================================================================================

    $('#sizeButton').click(function () {
        $('#popupBox').toggleClass('show');
    });

    // Hide the popup when the "Close" button is clicked
    $('#closeButton').click(function () {
        $('#popupBox').removeClass('show');
    });
    $('#canvasWidthHeight').hide();
    $('#manualSize').click(function () {
        $('#canvasWidthHeight').slideDown();
    });
    $('#manualSize').mouseleave(function () {
        $('#canvasWidthHeight').slideUp();
    });
    $('#setSize').click(function () {
        var canvasWidth = $('#canvasWidth').val();
        var canvasHeight = $('#canvasHeight').val();
        if (canvasWidth > 1300 || canvasHeight > 750) {
            $('#sizeError').css('display', 'block');
        } else {
            a.css({
                width: canvasWidth + 'px',
                height: canvasHeight + 'px',
                borderRadius: '0',
            });
            $('.workingAreaShadow').css({
                width: canvasWidth + 'px',
                height: canvasHeight + 'px',
                borderRadius: '0',
            });
            $('#sizeError').css('display', 'none');

            $('#canvasWidthHeight').hide();
            $('#popupBox').removeClass('show');
        }
    });

    $('#youtubeThumbnail').click(function () {
        a.css({ width: '1280', height: '720', borderRadius: '0' });
        $('.workingAreaShadow').css({
            width: '1280',
            height: '720',
            borderRadius: '0',
        });
        $('#canvasWidth').val('');
        $('#canvasHeight').val('');
        $('#sizeError').css('display', 'none');

        $('#popupBox').removeClass('show');
    });
    $('#youtubeBanner').click(function () {
        a.css({ width: '1280', height: '720', borderRadius: '0' });
        $('.workingAreaShadow').css({
            width: '1280',
            height: '720',
            borderRadius: '0',
        });
        $('#canvasWidth').val('');
        $('#canvasHeight').val('');
        $('#sizeError').css('display', 'none');
        $('#popupBox').removeClass('show');
    });
    $('#instagramPost').click(function () {
        a.css({ width: '750', height: '750', borderRadius: '0' });
        $('.workingAreaShadow').css({
            width: '750',
            height: '750',
            borderRadius: '0',
        });
        $('#canvasWidth').val('');
        $('#canvasHeight').val('');
        $('#sizeError').css('display', 'none');
        $('#popupBox').removeClass('show');
    });

    $('#logoSize').click(function () {
        a.css({ width: '650', height: '650', borderRadius: '0' });
        $('.workingAreaShadow').css({
            width: '650',
            height: '650',
            borderRadius: '0',
        });
        $('#canvasWidth').val('');
        $('#canvasHeight').val('');
        $('#sizeError').css('display', 'none');
        $('#popupBox').removeClass('show');
    });

    $('#idCardSize').click(function () {
        a.css({ width: '854', height: '480', borderRadius: '0' });
        $('.workingAreaShadow').css({
            width: '854',
            height: '480',
            borderRadius: '0',
        });
        $('#canvasWidth').val('');
        $('#canvasHeight').val('');
        $('#sizeError').css('display', 'none');
        $('#popupBox').removeClass('show');
    });
    $('#instagramStory').click(function () {
        a.css({ width: '405px', height: '720px', borderRadius: '0%' });
        $('.workingAreaShadow').css({
            width: '405px',
            height: '720px',
            borderRadius: '0%',
        });
        $('#canvasWidth').val('');
        $('#canvasHeight').val('');
        $('#sizeError').css('display', 'none');
        $('#popupBox').removeClass('show');
    });

    // !========================FOR CHANGING BACKGROUND COLOR AND GRADIENT COLOR =================================
    $('#backgroundForCanvas').on('change', function () {
        var backgroundForCanvas = $('#backgroundForCanvas').val();
        if (backgroundForCanvas == 1) {
            $('.backgroundColorCont').css('display', 'block');
            $('#selectCustomBg').css('display', 'none');
            $('#wowTemplateContainer').css('display', 'none');
        } else if (backgroundForCanvas == 2) {
            $('.backgroundColorCont').css('display', 'none');
            $('#selectCustomBg').css('display', 'block');
            $('#wowTemplateContainer').css('display', 'none');
        } else if (backgroundForCanvas == 3) {
            $('.backgroundColorCont').css('display', 'none');
            $('#selectCustomBg').css('display', 'none');
            $('#wowTemplateContainer').css('display', 'block');
        }
    });

    backgroundForCanvas;
    //?USING BACKGROUND SOLID COLOR------------------------

    $('#bgcolor').change(function () {
        var bgColor = $(this).val();
        a.css('background', bgColor);
    });

    //? USING BACKGROUND GRADIENT COLOR----------------------
    $('#gradientBg1').click(function () {
        a.css('background-image', 'linear-gradient(to bottom, red, yellow)');
    });
    $('#gradientBg2').click(function () {
        a.css('background-image', 'linear-gradient(to bottom, yellow, green)');
    });
    $('#gradientBg3').click(function () {
        a.css(
            'background-image',
            'linear-gradient(to top,rgb(255, 128, 23),rgb(0, 255, 0))'
        );
    });
    $('#gradientBg4').click(function () {
        a.css('background-image', 'linear-gradient(45deg, green, blue)');
    });
    $('#gradientBg5').click(function () {
        a.css(
            'background-image',
            'linear-gradient(45deg, rgb(5, 255, 234), rgb(255, 0, 0))'
        );
    });
    $('#gradientBg6').click(function () {
        a.css(
            'background-image',
            'linear-gradient(45deg,rgb(5, 255, 234),rgb(255, 234, 0))'
        );
    });

    $('#gradientBg7').click(function () {
        a.css(
            'background-image',
            'linear-gradient(45deg,rgb(158, 0, 225), rgb(0, 183, 255))'
        );
    });
    $('#gradientBg8').click(function () {
        a.css(
            'background-image',
            'linear-gradient(45deg,rgb(225, 0, 176),rgb(0, 183, 255))'
        );
    });
    $('#gradientBg9').click(function () {
        a.css(
            'background-image',
            'linear-gradient(45deg,rgb(56, 232, 255),rgb(0, 133, 185))'
        );
    });
    $('#gradientBg10').click(function () {
        a.css(
            'background-image',
            'linear-gradient(45deg,rgb(185, 56, 255),rgb(71, 185, 0))'
        );
    });
    $('#gradientBg11').click(function () {
        a.css(
            'background-image',
            'radial-gradient(circle,rgb(56, 232, 255),rgb(0, 133, 185))'
        );
    });
    $('#gradientBg12').click(function () {
        a.css(
            'background-image',
            'radial-gradient(circle,rgb(241, 189, 255),rgb(255, 0, 238))'
        );
    });

    //?=================================CANVAS BORDER SETTING===================================================
    $('.canvasBorderRadius').change(function () {
        var CanvasBorderRadius = $(this).val();
        a.css('border-radius', CanvasBorderRadius + 'px');
        $('.workingAreaShadow').css('border-radius', CanvasBorderRadius + 'px');
    });
    $('.canvasBorderWidth').change(function () {
        var CanvasBorderWidth = $(this).val();
        a.css('border-width', CanvasBorderWidth + 'px');
        $('.workingAreaShadow').css('border-width', CanvasBorderWidth + 'px');
    });
    $('#CanvasColor').change(function () {
        var CanvasBorderColor = $(this).val();

        a.css('border-color', CanvasBorderColor);
        $('.workingAreaShadow').css('border-color', CanvasBorderColor);
    });
    $('.canvasBorderImage').change(function () {
        var CanvasBorderImage = this;

        a.css('border-color', 'transparent');

        if (CanvasBorderImage.files && CanvasBorderImage.files[0]) {
            var imagereader = new FileReader();

            imagereader.onload = function (e) {
                a.css('border-image', 'url(' + e.target.result + ') 30 repeat');
            };

            imagereader.readAsDataURL(CanvasBorderImage.files[0]);
        }
    });

    $('.canvasBorderStyle').change(function () {
        var CanvasBorderStyle = $(this).val();
        a.css('border-style', CanvasBorderStyle);
    });

    //?====================================END OF CANVAS BORDER RADIUS================================================

    //! *********************************** TO DOWNLOAD THE PROJECT ************************************************
    function downloadImage() {
        html2canvas($('#working-canvas')[0]).then(function (canvas) {
            var dataURL = canvas.toDataURL('image/jpeg');
            var a = $('<a>').attr({
                href: dataURL,
                download: 'image.jpg',
            });
            $('body').append(a);
            a[0].click();
            a.remove();
        });
    }
    $('#downloadBtn').on('click', downloadImage);

    //! ***********************************************************************************************************

    //?->->->->->->->->->->->->->->->->->->->->FOR CANVAS BACKGROUND->->->->->->->>->->->->->->->->->->->->->->->->->

    //*--------FOR APPLYING BACKEND IMAGES TO CANVAS
    $('.card').click(function () {
        $(this).css('outline', '2px solid black');
    });
    $('.img').click(function () {
        var clickedImageUrl = $(this).attr('src');
        $('#change').click(function () {
            a.css({
                'background-image': 'url(' + clickedImageUrl + ')',
                'background-size': 'cover',
                'background-repeat': 'no-repeat',
            });
        });
    });
    //*------------------------------------------------

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
                    'background-image': 'url(' + e.target.result + ')',
                    'background-size': 'cover',
                    'background-repeat': 'no-repeat',
                });
            };

            customFileReader.readAsDataURL(customBg);
        }
    });
    //?->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->>->->->->->->->->->->->->->->->->->
    // !-------------------FOR IMAGE ADDING TO CANVAS -----------------------------------------
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
        recordState();
        // Create a unique ID for each image and its corresponding layer
        const uniqueId = 'Image-Layer-' + new Date().getTime();

        // Create the image element
        const img = new Image();
        img.src = imageUrl;
        img.classList.add('draggable', 'resizable');
        img.style.zIndex = 1;
        img.id = uniqueId;
        document.querySelector('#working-canvas').appendChild(img);

        // Create the resize handle
        const resizeHandle = document.createElement('div');
        resizeHandle.classList.add('resize-handle');
        img.appendChild(resizeHandle);

        // Create the corresponding layer with a delete icon

        const layerBox = $(
            '<li class="layerBox" draggable="true" style="cursor:pointer;user-select:none;z-index:1;" id="layer-' +
                uniqueId +
                '">' +
                uniqueId +
                ' <span class="delete-icon" style="cursor: pointer; color: red;">&#10006;</span></li>'
        );
        // Add dragstart event listener for layerBox

        layerBox.on('dragstart', function (e) {
            e.originalEvent.dataTransfer.setData('text/plain', uniqueId);
            setTimeout(() => {
                layerBox.addClass('dragging');
            }, 0);
        });

        // Add dragover event listener for layerBox
        layerBox.on('dragover', function (e) {
            e.preventDefault();
        });

        // Add dragend event listener for layerBox
        layerBox.on('dragend', function () {
            setTimeout(() => {
                layerBox.removeClass('dragging');
            }, 0);
        });
        // Add drop event listener for layerBox
        // Add drop event listener for layerBox
        layerBox.on('drop', function (e) {
            e.preventDefault();
            const draggedUniqueId =
                e.originalEvent.dataTransfer.getData('text/plain');
            const droppedUniqueId = $(this).attr('id').replace('layer-', '');

            const draggedElement = $('#layer-' + draggedUniqueId);
            const droppedElement = $(this);

            // Reposition the elements in DOM
            if (draggedElement.index() < droppedElement.index()) {
                droppedElement.after(draggedElement);
            } else {
                droppedElement.before(draggedElement);
            }

            // Update z-index of images based on layerBox order
            updateZIndex();
        });

        // Add event listener to the image to highlight the corresponding layer
        img.addEventListener('click', function (e) {
            selectedImageId = img.id; // Store the ID of the clicked image
            console.log('Selected Image ID: ', selectedImageId);
            // Set border for the clicked image
            document
                .querySelectorAll('.draggable')
                .forEach((el) => (el.style.outline = '1px solid black'));
            img.style.outline = '3px dotted #000';
            // Highlight the corresponding layer
            document
                .querySelectorAll('.layerBox')
                .forEach((el) => (el.style.backgroundColor = ''));
            document.getElementById('layer-' + uniqueId).style.backgroundColor =
                'green';

            // Show image edit tools
            document.getElementById('textEdit').style.display = 'none';
            document.getElementById('imageEdit').style.display = 'flex';

            widthSlider.value = img.clientWidth;
            widthValue.value = img.clientWidth;
            heightSlider.value = img.clientHeight;
            heightValue.value = img.clientHeight;
            //?==============GET BORDER RADIUS =============================
            var computedStyle = window.getComputedStyle(img);

            radiusValue.value = computedStyle.getPropertyValue('border-radius');
            radiusSlider.value =
                computedStyle.getPropertyValue('border-radius');

            //?===========GET IMAGE FILER BLUR=========================
            var filterValue = computedStyle.getPropertyValue('filter');
            var blurValue = filterValue.match(/blur\((\d+px)\)/)?.[1] || '0px';

            imageBlurValue.value = blurValue;
            imageBlurSlider.value = parseInt(blurValue);

            //?===========GET IMAGE FILER Brightness=========================

            // Get and set brightness filter value
            var brightnessValueMatch = filterValue.match(
                /brightness\((\d+(\.\d+)?%?)\)/
            );
            var brightnessValues = brightnessValueMatch
                ? brightnessValueMatch[1]
                : '0%';

            // Ensure brightnessValue is in a format that can be used
            if (brightnessValues.includes('%')) {
                brightnessSlider.value = parseFloat(brightnessValues);
            } else {
                brightnessSlider.value = parseFloat(brightnessValues) * 100;
            }

            // Set brightness values
            brightnessValue.value = brightnessValues;

            //?===========IMAGE SATURATION VALUE GET===================
            // Get and set saturation filter value
            var saturationValueMatch = filterValue.match(
                /saturate\((\d+(\.\d+)?%?)\)/
            );
            var saturationValues = saturationValueMatch
                ? saturationValueMatch[1]
                : '0%';

            // Ensure saturationValue is in a format that can be used
            if (saturationValues.includes('%')) {
                saturationSlider.value = parseFloat(saturationValues);
            } else {
                saturationSlider.value = parseFloat(saturationValues) * 100;
            }

            // Set saturation values
            saturationValue.value = saturationValues;
            //?===========get contrast value and set======================

            // Get and set contrast filter value
            var contrastValueMatch = filterValue.match(
                /contrast\((\d+(\.\d+)?%?)\)/
            );
            var contrastValues = contrastValueMatch
                ? contrastValueMatch[1]
                : '0%';

            // Ensure contrastValue is in a format that can be used
            if (contrastValues.includes('%')) {
                contrastSlider.value = parseFloat(contrastValues);
            } else {
                contrastSlider.value = parseFloat(contrastValues) * 100;
            }

            // Set contrast values
            contrastValue.value = contrastValues;

            //?===========FOR IMAGE OPACITY==================
            // Get opacity value from style
            var opacityValues = computedStyle.getPropertyValue('opacity');
            var opacity = parseFloat(opacityValues); // Parse opacity value
            opacitySlider.value = opacity;
            I_opacityValue.value = opacity;

            //?======FOR IMAGE ROTATE VALUES================
            // Extract the transform property value
            var transformValue = computedStyle.getPropertyValue('transform');
            var rotationMatch = transformValue.match(/rotate\(([^)]+)\)/);

            var rotationValue = rotationMatch ? rotationMatch[1] : '0deg';

            var rotationValueNumeric = parseFloat(rotationValue);

            imageRotateSlider.value = rotationValueNumeric;
            imageRotateValue.value = rotationValueNumeric;
        });

        // Add click event listener to the document
        a.on('click', function () {
            // Remove outline for all draggable elements
            document
                .querySelectorAll('.draggable')
                .forEach((el) => (el.style.outline = 'none'));
            // Hide image edit tools
            document.getElementById('imageEdit').style.display = 'none';
            selectedImageId = null; // Reset the selected image ID
        });

        // Ensure clicking on the parentDiv or img does not trigger the document click event
        img.addEventListener('click', function (event) {
            event.stopPropagation();
        });
        img.addEventListener('click', function (event) {
            event.stopPropagation();
        });

        // Highlight the image when the corresponding layer is clicked
        layerBox.on('click', function () {
            // Highlight the corresponding image
            document
                .querySelectorAll('.draggable')
                .forEach((el) => (el.style.outline = '2px solid black'));
            document.getElementById(uniqueId).style.outline = '1px dotted #000';

            // Highlight the layer
            document
                .querySelectorAll('.layerBox')
                .forEach((el) => (el.style.backgroundColor = ''));
            layerBox.css('background-color', 'green');

            // Show image edit tools
            document.getElementById('textEdit').style.display = 'none';
            document.getElementById('imageEdit').style.display = 'flex';
        });

        // Delete the image and layer when the delete icon is clicked
        layerBox.find('.delete-icon').on('click', function (event) {
            event.stopPropagation(); // Prevent the layer click event from triggering

            // Record the current state before deleting
            recordState();

            // Remove the image and layer
            document.getElementById(uniqueId).remove();
            layerBox.remove();
            // Update z-index of remaining images
            updateZIndex();
        });

        // Append the new layer to the layers list
        $('#layersList').append(layerBox);
        // Update z-index initially
        updateZIndex();
        // Make the image draggable and resizable
        makeDraggable(img);
        makeResizable(img, widthSlider, heightSlider, widthValue, heightValue);
        makeBorderRadius(img, radiusSlider, radiusValue);
        makeBorder(
            img,
            borderWidthSlider,
            borderColor,
            borderWidthValue,
            imageBorderStyle
        );

        makeBoxShadow(
            img,
            boxShadowX,
            boxShadowXValue,
            boxShadowY,
            boxShadowYValue,
            boxShadowBlur,
            boxShadowBlurValue,
            boxShadowColor
        );
        setupTextboxListeners(
            img,
            widthSlider,
            heightSlider,
            radiusSlider,
            borderWidthSlider,
            boxShadowX,
            boxShadowXValue,
            boxShadowY,
            boxShadowYValue,
            boxShadowBlur,
            boxShadowBlurValue,
            boxShadowColor
        );
        imageEffect(img);
    }

    // Function to update z-index of images based on layer box order
    function updateZIndex() {
        $('.layerBox').each(function (index) {
            const uniqueId = $(this).attr('id').replace('layer-', '');
            const imgElement = document.getElementById(uniqueId);
            const textBoxElement = document.getElementById('text-' + uniqueId);

            if (imgElement) {
                imgElement.style.zIndex = index + 1;
            }

            if (textBoxElement) {
                textBoxElement.style.zIndex = index + 1;
            }
        });
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
            const element = document.getElementById(selectedImageId);
            element.style.width = widthSlider.value + 'px';
            widthValue.value = widthSlider.value;
        });
        widthValue.addEventListener('input', function () {
            const element = document.getElementById(selectedImageId);
            element.style.width = widthValue.value + 'px';
            widthSlider.value = widthValue.value;
        });

        heightSlider.addEventListener('input', function () {
            const element = document.getElementById(selectedImageId);
            element.style.height = heightSlider.value + 'px';
            heightValue.value = heightSlider.value;
        });
        heightValue.addEventListener('input', function () {
            const element = document.getElementById(selectedImageId);
            element.style.height = heightValue.value + 'px';
            heightSlider.value = heightValue.value;
        });
        ImageDefaultSize.addEventListener('click', function () {
            const element = document.getElementById(selectedImageId);
            if (element) {
                const canvasP = document.getElementById('working-canvas');
                const canvasWidthDefault = canvasP.clientWidth;
                const canvasHeightDefault = canvasP.clientHeight;
                console.log(canvasWidthDefault, canvasHeightDefault);

                element.style.width = canvasWidthDefault + 'px';
                element.style.height = canvasHeightDefault + 'px';
            } else {
                alert('No Image Selected');
            }
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
    var imageDrag = false;
    //!IMAGE DRAG
    $('#imageUnlocked').click(function () {
        const element = document.getElementById(selectedImageId);

        if (element) {
            if (imageDrag) {
                imageDrag = false;
                $(element).draggable('destroy').resizable('destroy'); // Correct jQuery UI methods
                $(this).text('Lock');
            } else {
                imageDrag = true;
                $(element).draggable().resizable(); // Correct jQuery UI methods
                $(this).text('Unlock');
            }
        } else {
            console.error('Element with ID ' + selectedImageId + ' not found.');
        }
    });

    function makeBorderRadius(element, radiusSlider, radiusValue) {
        radiusSlider.addEventListener('input', function () {
            element = document.getElementById(selectedImageId);

            const radius = radiusSlider.value + '%';
            element.style.borderRadius = radius;
            radiusValue.value = radiusSlider.value;
        });
    }

    function makeBorder(
        element,
        borderWidthSlider,
        borderColor,
        borderWidthValue,
        imageBorderStyle
    ) {
        borderWidthSlider.addEventListener('input', function () {
            const borderWidth = borderWidthSlider.value + 'px';
            element = document.getElementById(selectedImageId);

            element.style.borderWidth = borderWidth;
            borderWidthValue.value = borderWidthSlider.value;
        });

        borderColor.addEventListener('input', function () {
            const getborderColor = borderColor.value;
            element = document.getElementById(selectedImageId);

            element.style.borderColor = getborderColor;
        });
        imageBorderStyle.addEventListener('change', function () {
            const AimageBorderStyle = imageBorderStyle.value;
            element = document.getElementById(selectedImageId);

            element.style.borderStyle = AimageBorderStyle;
        });
    }

    function makeBoxShadow(
        element,
        boxShadowX,
        boxShadowXValue,
        boxShadowY,
        boxShadowYValue,
        boxShadowBlur,
        boxShadowBlurValue,
        boxShadowColor
    ) {
        // Event listener for X-axis shadow adjustment
        boxShadowX.addEventListener('input', function () {
            boxShadowXValue.value = boxShadowX.value;
            updateBoxShadow();
        });

        // Event listener for Y-axis shadow adjustment
        boxShadowY.addEventListener('input', function () {
            boxShadowYValue.value = boxShadowY.value;
            updateBoxShadow();
        });

        // Event listener for blur radius adjustment
        boxShadowBlur.addEventListener('input', function () {
            boxShadowBlurValue.value = boxShadowBlur.value;
            updateBoxShadow();
        });
        boxShadowBlurValue.addEventListener('input', function () {
            boxShadowBlur.value = boxShadowBlurValue.value;
            updateBoxShadow();
        });

        // Event listener for shadow color adjustment
        boxShadowColor.addEventListener('input', function () {
            updateBoxShadow();
        });

        // Function to update box shadow styles
        function updateBoxShadow() {
            const boxShadowXValuePx = boxShadowX.value + 'px';
            const boxShadowYValuePx = boxShadowY.value + 'px';
            const boxShadowBlurValuePx = boxShadowBlur.value + 'px';
            const boxShadowColorValue = boxShadowColor.value;

            const boxShadow = `${boxShadowXValuePx} ${boxShadowYValuePx} ${boxShadowBlurValuePx} ${boxShadowColorValue}`;
            const element = document.getElementById(selectedImageId);

            element.style.boxShadow = boxShadow;
        }
    }

    function setupTextboxListeners() {
        widthValue.addEventListener('input', function () {
            const value = parseInt(widthValue.value, 10);
            if (!isNaN(value)) {
                widthSlider.value = Math.min(
                    Math.max(value, widthSlider.min),
                    widthSlider.max
                );
                const element = document.getElementById(selectedImageId);

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
                const element = document.getElementById(selectedImageId);

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
                const element = document.getElementById(selectedImageId);

                element.style.borderRadius = radiusSlider.value + '%';
            }
        });

        borderWidthValue.addEventListener('input', function () {
            const value = parseInt(borderWidthValue.value, 10);
            if (!isNaN(value)) {
                borderWidthSlider.value = Math.min(
                    Math.max(value, borderWidthSlider.min),
                    borderWidthSlider.max
                );
                const element = document.getElementById(selectedImageId);

                element.style.borderWidth = borderWidthSlider.value + 'px';
            }
        });

        boxShadowXValue.addEventListener('input', function () {
            const value = parseInt(boxShadowXValue.value, 10);
            if (!isNaN(value)) {
                boxShadowXSlider.value = Math.min(
                    Math.max(value, boxShadowXSlider.min),
                    boxShadowXSlider.max
                );
                updateBoxShadowvyValue();
            }
        });

        boxShadowYValue.addEventListener('input', function () {
            const value = parseInt(boxShadowYValue.value, 10);
            if (!isNaN(value)) {
                boxShadowYSlider.value = Math.min(
                    Math.max(value, boxShadowYSlider.min),
                    boxShadowYSlider.max
                );
                updateBoxShadowvyValue();
            }
        });

        boxShadowBlurValue.addEventListener('input', function () {
            updateBoxShadowvyValue();
        });

        function updateBoxShadowvyValue() {
            const boxShadowXValuePx = boxShadowXSlider.value + 'px';
            const boxShadowYValuePx = boxShadowYSlider.value + 'px';
            const boxShadowBlurValuePx = 0;
            boxShadowBlurValuePx = boxShadowBlurSlider.value + 'px';
            const boxShadowColorValue = boxShadowColor.value;

            const boxShadow = `${boxShadowXValuePx} ${boxShadowYValuePx} ${boxShadowBlurValuePx} ${boxShadowColorValue}`;
            const element = document.getElementById(selectedImageId);

            element.style.boxShadow = boxShadow;
        }
    }

    document.addEventListener('click', function (e) {
        const activeImage = document.querySelector('.activeImage');
        if (activeImage && !activeImage.contains(e.target)) {
            activeImage.classList.remove('activeImage');
        }
    });
    // ! ((((((((((((((()))))()()(()()IMAGE EFFECTS FUNCTION ((((((((((((((((((((((())))))))))))))
    function imageEffect(img) {
        imageBlurSlider.addEventListener('input', function () {
            const blurValue = imageBlurSlider.value;
            imageBlurValue.value = blurValue;
            const element = document.getElementById(selectedImageId);
            element.style.filter = `blur(${blurValue}px)`;
        });

        //? for Brightness of image====================================
        brightnessSlider.addEventListener('input', function () {
            const brightness = brightnessSlider.value;
            brightnessValue.value = brightness;
            const element = document.getElementById(selectedImageId);
            element.style.filter = `brightness(${brightness}%)`;
        });
        saturationSlider.addEventListener('input', function () {
            const saturation = saturationSlider.value;
            saturationValue.value = saturation;
            const element = document.getElementById(selectedImageId);

            element.style.filter = `saturate(${saturation}%)`;
        });
        contrastSlider.addEventListener('input', function () {
            const contrast = contrastSlider.value;
            contrastValue.value = contrast;
            const element = document.getElementById(selectedImageId);

            element.style.filter = `contrast(${contrast}%)`;
        });

        opacitySlider.addEventListener('input', function () {
            const opacity = opacitySlider.value;
            I_opacityValue.value = opacity;
            const element = document.getElementById(selectedImageId);

            element.style.opacity = opacity;
        });
        let isFlipped = false;

        flipRight.addEventListener('click', function () {
            const element = document.getElementById(selectedImageId);

            if (!isFlipped) {
                element.style.transform = 'rotateY(180deg)';
            } else {
                element.style.transform = 'rotateY(0deg)';
            }
            isFlipped = !isFlipped;
        });
        flipTop.addEventListener('click', function () {
            const element = document.getElementById(selectedImageId);

            if (!isFlipped) {
                element.style.transform = 'rotateX(-180deg)';
            } else {
                element.style.transform = 'rotateX(0deg)';
            }
            isFlipped = !isFlipped;
        });
        imageRotateSlider.addEventListener('input', function () {
            const element = document.getElementById(selectedImageId);
            var rotateValue = imageRotateSlider.value;
            imageRotateValue.value = rotateValue + 'deg';
            element.style.transform = 'rotate(' + rotateValue + 'deg)';
        });
    }
});
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
