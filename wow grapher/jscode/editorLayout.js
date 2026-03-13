//!VARIABLE DECLARATION
var Elposition = document.getElementById('El-position');
var positionCont = document.getElementById('positionCont');
//?-----------------------------------------------------------------------------------------------
//*FOR CONT COLOR
var colorCont = document.getElementById('colorCont');
var fontColor = document.getElementById('fontColorShow');
//?-----------------------------------------------------------------------------------------------
//* FOR EFFECTS CONTAINER
var effectsCont = document.getElementById('effectsCont');
var effectsShow = document.getElementById('effectsShow');
//?-----------------------------------------------------------------------------------------------
//*FOR IMAGE SIZE CONTAINER
var ImageSize = document.getElementById('ImageSize');
var ImageSizeShow = document.getElementById('imageSizeShow');
//?-----------------------------------------------------------------------------------------------
//*FOR IMAGE BORDER
var ImageBorderShow = document.getElementById('imageBorderShow');
var imageBorderCont = document.getElementById('imageBorder');
//?-----------------------------------------------------------------------------------------------
//*FOR IMAGE Shadow
var ImageShadowShow = document.getElementById('imageShadowShow');
var imageShadow = document.getElementById('ImageShadow');
//?-----------------------------------------------------------------------------------------------
//*FOR IMAGE Effect
var ImageEffectShow = document.getElementById('imageEffectShow');
var imageEffect = document.getElementById('ImageEffect');
//?-----------------------------------------------------------------------------------------------
//*FOR IMAGE ROTATION
var ImageRotationShow = document.getElementById('imageRotateShow');
var imageRotation = document.getElementById('ImageRotation');
//?-----------------------------------------------------------------------------------------------
var canvasBackgroundBtn = document.getElementById('canvasBackgroundBtn');
var canvasBackgroundContainer = document.getElementById(
    'canvasBackgroundContainer'
);
var canvasBorderContainer = document.getElementById('canvasBorderContainer');
var addBorder = document.getElementById('addBorder');

const effectsTools = document.querySelector('.effectsTools');

const fontBgCol = document.getElementById('fontBgCol');
const fontStroke = document.getElementById('fontStroke');
const fontHollow = document.getElementById('fontHollow');
const fontNone = document.getElementById('fontNone');
const fontShadow = document.getElementById('fontShadow');
const fontGlow = document.getElementById('fontGlow');
const textTransparency = document.getElementById('textTransparency');
const lockTextPosition = document.getElementById('lockTextPosition');
const textUnlocked = document.getElementById('textUnlocked');
const imageUnlocked = document.getElementById('imageUnlocked');

//! MAIN CODING STARTS HERE

Elposition.addEventListener('click', function () {
    Elposition.classList.toggle('adds-ElpositionEdit');
    positionCont.classList.toggle('show-positionCont');
    colorCont.classList.remove('show-colorCont');
    //! effects
    effectsShow.classList.remove('add-effects');
    effectsCont.classList.remove('show-effects');
    ImageSize.classList.remove('add-imageSize');
    ImageBorder.classList.remove('add-imageBorder');
    imageShadow.classList.remove('add-imageShadow');
    imageEffect.classList.remove('add-imageEffect');
    imageRotation.classList.remove('show-ImageRotation');
});

fontColor.addEventListener('click', function () {
    Elposition.classList.remove('adds-ElpositionEdit');
    positionCont.classList.remove('show-positionCont');
    colorCont.classList.toggle('show-colorCont');

    //! effects
    effectsShow.classList.remove('add-effects');
    effectsCont.classList.remove('show-effects');
});

effectsShow.addEventListener('click', function () {
    effectsShow.classList.toggle('add-effects');
    effectsCont.classList.toggle('show-effects');
    colorCont.classList.remove('show-colorCont');
    Elposition.classList.remove('adds-ElpositionEdit');
    positionCont.classList.remove('show-positionCont');
});

//! SETTING EFFECTS ITEMS CLICK EVENT STYLE

effectsTools.addEventListener('click', function (event) {
    const target = event.target;
    if (target.tagName === 'P') {
        const allParagraphs = effectsTools.querySelectorAll('p');
        allParagraphs.forEach((paragraph) => {
            paragraph.style.boxShadow = 'none';
            paragraph.style.borderColor = 'black';
        });
        target.style.boxShadow = '3px 3px 10px red,inset 2px 2px 2px black';
        target.style.borderColor = 'red';
    }
});
// ! Click event on none for opening none tools
fontNone.addEventListener('click', function () {
    document.querySelector('.Itemhollow').classList.remove('ItemhollowShow');
    document.querySelector('.Itemstroke').classList.remove('fontStrokeShow');
    document.querySelector('.ItemBg').classList.remove('ItemBgShow');
    document.querySelector('.Itemglow').classList.remove('fontGlowShow');
    document.querySelector('.Itemshadow').classList.remove('ItemshadowShow');
});

// ! Click event on fontBgCol for opening bgitem tools
fontBgCol.addEventListener('click', function () {
    document.querySelector('.ItemBg').classList.toggle('ItemBgShow');
    document.querySelector('.ItemBg').classList.remove('fontStrokeShow');
    document.querySelector('.Itemhollow').classList.remove('ItemhollowShow');
    document.querySelector('.Itemglow').classList.remove('fontGlowShow');
    document.querySelector('.Itemshadow').classList.remove('ItemshadowShow');
});
// ! Click event on FONTSTROKE for opening FONTSTROKE tools
fontStroke.addEventListener('click', function () {
    document.querySelector('.Itemstroke').classList.toggle('fontStrokeShow');
    document.querySelector('.ItemBg').classList.remove('ItemBgShow');
    document.querySelector('.Itemhollow').classList.remove('ItemhollowShow');
    document.querySelector('.Itemglow').classList.remove('fontGlowShow');
    document.querySelector('.Itemshadow').classList.remove('ItemshadowShow');
});

// ! Click event on fontHollow for opening fontHollow tools
fontHollow.addEventListener('click', function () {
    document.querySelector('.Itemhollow').classList.toggle('ItemhollowShow');
    document.querySelector('.Itemstroke').classList.remove('fontStrokeShow');
    document.querySelector('.ItemBg').classList.remove('ItemBgShow');
    document.querySelector('.Itemglow').classList.remove('fontGlowShow');
    document.querySelector('.Itemshadow').classList.remove('ItemshadowShow');
});
// ! Click event on fontShadow for opening fontShadow tools
fontShadow.addEventListener('click', function () {
    document.querySelector('.Itemshadow').classList.toggle('ItemshadowShow');
    document.querySelector('.Itemhollow').classList.remove('ItemhollowShow');
    document.querySelector('.Itemstroke').classList.remove('fontStrokeShow');
    document.querySelector('.ItemBg').classList.remove('ItemBgShow');
    document.querySelector('.Itemglow').classList.remove('fontGlowShow');
});
// ! Click event on fontGlow for opening fontGlow tools
fontGlow.addEventListener('click', function () {
    document.querySelector('.Itemglow').classList.toggle('fontGlowShow');
    document.querySelector('.Itemshadow').classList.remove('ItemshadowShow');
    document.querySelector('.Itemhollow').classList.remove('ItemhollowShow');
    document.querySelector('.Itemstroke').classList.remove('fontStrokeShow');
    document.querySelector('.ItemBg').classList.remove('ItemBgShow');
});

//! To enable text transparency slider
textTransparency.addEventListener('click', function () {
    document
        .querySelector('.textTransparencyRange')
        .classList.toggle('textTransparencyRangeShow');
});

//! TEXT LOCK AND UNLOCK SYSTEM

lockTextPosition.addEventListener('click', function () {
    textUnlocked.classList.toggle('lockTextPositionShow');
    textUnlocked.classList.toggle('textUnlocked');
    if (textUnlocked.classList.contains('lockTextPositionShow')) {
        textUnlocked.innerText = 'Locked';
        textLock = true;
    } else {
        textUnlocked.innerText = 'Unlocked';
        textLock = false;
    }
});

//! Image Size Show container Hide and Show
ImageSizeShow.addEventListener('click', function () {
    ImageSize.classList.toggle('add-imageSize');
    imageShadow.classList.remove('add-imageShadow');
    imageEffect.classList.remove('add-imageEffect');
    imageRotation.classList.remove('show-ImageRotation');

    ImageBorder.classList.remove('add-imageBorder');
    Elposition.classList.remove('adds-ElpositionEdit');
    positionCont.classList.remove('show-positionCont');
});
//! Image BORDER Show container Hide and Show
ImageBorderShow.addEventListener('click', function () {
    ImageBorder.classList.toggle('add-imageBorder');
    ImageSize.classList.remove('add-imageSize');
    imageShadow.classList.remove('add-imageShadow');
    imageEffect.classList.remove('add-imageEffect');
    imageRotation.classList.remove('show-ImageRotation');

    Elposition.classList.remove('adds-ElpositionEdit');
    positionCont.classList.remove('show-positionCont');
});

//! Image SHADOW Show container Hide and Show
ImageShadowShow.addEventListener('click', function () {
    imageShadow.classList.toggle('add-imageShadow');
    imageEffect.classList.remove('add-imageEffect');
    ImageBorder.classList.remove('add-imageBorder');
    ImageSize.classList.remove('add-imageSize');
    Elposition.classList.remove('adds-ElpositionEdit');
    positionCont.classList.remove('show-positionCont');
    imageRotation.classList.remove('show-ImageRotation');
});
//! Image EFFECTS Show container Hide and Show
ImageEffectShow.addEventListener('click', function () {
    imageEffect.classList.toggle('add-imageEffect');
    imageShadow.classList.remove('add-imageShadow');
    imageRotation.classList.remove('show-ImageRotation');

    ImageBorder.classList.remove('add-imageBorder');
    ImageSize.classList.remove('add-imageSize');
    Elposition.classList.remove('adds-ElpositionEdit');
    positionCont.classList.remove('show-positionCont');
});

// !IMAGE ROATION CONTAINER SHOW
ImageRotationShow.addEventListener('click', function () {
    imageRotation.classList.toggle('show-ImageRotation');
    imageEffect.classList.remove('add-imageEffect');
    imageShadow.classList.remove('add-imageShadow');

    ImageBorder.classList.remove('add-imageBorder');
    ImageSize.classList.remove('add-imageSize');
    Elposition.classList.remove('adds-ElpositionEdit');
    positionCont.classList.remove('show-positionCont');
});

//! IMAGE LOCK AND UNLOCK SYSTEM
if (!imageUnlocked.style.backgroundColor) {
    imageUnlocked.style.backgroundColor = 'rgb(52, 152, 219)';
    imageUnlocked.innerText = 'Unlocked';
}
imageUnlocked.addEventListener('click', function () {
    const blueColor = 'rgb(52, 152, 219)';
    const redColor = 'red';

    if (imageUnlocked.style.backgroundColor === blueColor) {
        imageUnlocked.style.backgroundColor = redColor;
        imageUnlocked.innerText = 'Locked';
    } else {
        imageUnlocked.style.backgroundColor = blueColor;
        imageUnlocked.innerText = 'Unlocked';
    }
});

// ! CANVAS BACKGROUNDS CONTAINER SHOW
canvasBackgroundBtn.addEventListener('click', function () {
    canvasBackgroundContainer.classList.toggle(
        'show_canvasBackgroundContainer'
    );
    canvasBorderContainer.classList.remove('show_canvasBorderContainer');
});

addBorder.addEventListener('click', function () {
    canvasBorderContainer.classList.toggle('show_canvasBorderContainer');
    canvasBackgroundContainer.classList.remove(
        'show_canvasBackgroundContainer'
    );
});
