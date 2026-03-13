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
    <title>wowgrapher_Chatbot</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <!-- <link rel="stylesheet" href="styles.css" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700,300">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400&family=Finger+Paint&display=swap">
    <style>
        * {
            font-size: 1.3vw;
            font-family: "Epilogue", sans-serif;
        }

        html {
            --scrollbarBG: #fff;
            --thumbBG: #90a4ae;
        }

        body {
            background: #ccc;
        }

        body .card {
            height: 45vw;
            width: 35vw;
            background-color: white;
            margin-left: 30vw;
            margin-top: 5vw;
            box-shadow: 2vw 2vw 12vw 3vw #ccc;
        }

        body .card #header {
            height: 5vw;
            background: #000;
            padding: 0vw;
        }

        body .card #header h1 {
            color: #fff;
            font-size: 2vw;
            font-family: "Finger Paint", cursive;
            padding: 1vw;
        }

        body .card #message-section::-webkit-scrollbar {
            width: 10px;
        }

        body .card #message-section {
            height: 32vw;
            padding: 0 2.5vw;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: var(--thumbBG) var(--scrollbarBG);
        }

        body .card #message-section::-webkit-scrollbar-track {
            background: var(--scrollbarBG);
        }

        body .card #message-section::-webkit-scrollbar-thumb {
            background-color: var(--thumbBG);
            border-radius: 6px;
            border: 3px solid var(--scrollbarBG);
        }

        body .card #message-section #bot,
        body .card #message-section #user {
            position: relative;
            bottom: 0;
            min-height: 1.5vw;
            border: 0.15vw solid #777;
            background-color: #fff;
            border-radius: 0px 1.5vw 1.5vw 1.8vw;
            padding: 1vw;
            margin: 1.5vw 0;
        }

        body .card #message-section #user {
            border: 1.5px solid #000;
            border-radius: 1.5vw 0vw 1.5vw 1.8vw;
            background-color: #000;
            float: right;
        }

        body .card #message-section #user #user-response {
            color: #fff;
        }

        body .card #message-section .message {
            color: #000;
            clear: both;
            line-height: 1.2vw;
            font-size: 1.2vw;
            padding: 8px;
            position: relative;
            margin: 8px 0;
            max-width: 85%;
            word-wrap: break-word;
            z-index: 2;
        }

        body .card #input-section {
            z-index: 1;
            padding: 0 2.5vw;
            display: flex;
            flex-direction: row;
            align-items: flex-end;
            overflow: hidden;
            height: 6vw;
            width: 100%;
        }

        body .card #input-section input {
            color: #000;
            min-width: 0.5vw;
            outline: none;
            height: 5vw;
            width: 26vw;
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: solid #000 0.1vw;
        }

        body .card .send {
            background: transparent;
            border: 0;
            cursor: pointer;
            flex: 0 0 auto;
            margin-left: 1.4vw;
            margin-right: 0vw;
            padding: 0;
            position: relative;
            outline: none;
        }

        body .card .send .circle {
            position: relative;
            width: 4.8vw;
            height: 4.8vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body .card .send .circle i {
            font-size: 3vw;
            margin-left: -1vw;
            margin-top: 1vw;
        }
    </style>
</head>

<body>

    <body>
        <div class="card">
            <div id="header">
                <h1>Chatter box!</h1>
            </div>
            <div id="message-section">
                <div class="message" id="bot"><span id="bot-response">Hello Bhailog kaise ho ? Sab Maja ma .....</span>
                </div>
            </div>
            <div id="input-section">
                <input id="input" type="text" placeholder="Type a message" autocomplete="off" autofocus="autofocus" />
                <button class="send" onclick="sendMessage()">
                    <div class="circle"><i class="zmdi zmdi-mail-send"></i></div>
                </button>
            </div>
        </div>



        <script>
            const userMessage = [
                ['hi', 'hey', 'hello'],
                ['sure', 'yes', 'no'],
                ['are you genious', 'are you nerd', 'are you intelligent'],
                ['i hate you', 'i dont like you'],
                [
                    'how are you',
                    'how is life',
                    'how are things',
                    'how are you doing',
                ],
                [
                    'how is corona',
                    'how is covid 19',
                    'how is covid19 situation',
                ],
                ['what are you doing', 'what is going on', 'what is up'],
                ['how old are you'],
                [
                    'who are you',
                    'are you human',
                    'are you bot',
                    'are you human or bot',
                ],
                ['who created you', 'who made you', 'who is your creator'],
                [
                    'your name please',
                    'name',
                    'your name',
                    'may i know your name',
                    'what is your name',
                    'what call yourself',
                ],
                ['i love you'],
                [
                    'happy',
                    'good',
                    'fun',
                    'wonderful',
                    'fantastic',
                    'cool',
                    'very good',
                ],
                ['bad', 'bored', 'tired'],
                ['help me', 'tell me story', 'tell me joke'],
                ['ah', 'ok', 'okay', 'nice', 'welcome'],
                ['thanks', 'thank you'],
                ['what should i eat today'],
                ['bro'],
                ['what', 'why', 'how', 'where', 'when'],
                ['corona', 'covid19', 'coronavirus'],
                ['you are funny'],
                ['i dont know'],
                ['boring'],
                ['im tired'],

                ['how can I edit text in a document', 'text editing'],
                [
                    'what formatting options are available for text editing',
                    'text formatting',
                ],
                [
                    'can I change the font and font size in my document',
                    'change font',
                ],
                [
                    'is there an option to insert images into my document',
                    'insert images',
                ],
                ['how do I generate a report card', 'generate report card'],
                [
                    'can I customize the design and layout of the report card',
                    'customize report card',
                ],
                [
                    'what information is required to create a report card',
                    'report card details',
                ],
                [
                    'is there a template for different types of report cards',
                    'report card templates',
                ],
                [
                    'how can I make an ID card on the website',
                    'make ID card',
                ],
                [
                    'are there different templates for ID cards',
                    'ID card templates',
                ],
                ['can I add a photo to my ID card', 'add photo to ID card'],
                [
                    'what details can I include on the ID card',
                    'ID card details',
                ],
                [
                    'how does the background removal feature work',
                    'background removal',
                ],
                [
                    'can I remove the background from any image',
                    'remove background from image',
                ],
                [
                    'are there options to refine the background removal process',
                    'refine background removal',
                ],
                [
                    'what file formats are supported for images with removed backgrounds',
                    'supported file formats',
                ],
                [
                    'is there a tool for adjusting colors in images',
                    'color adjustment',
                ],
                [
                    'how can I enhance the brightness and contrast of an image',
                    'brightness and contrast',
                ],
                [
                    'can I apply filters to change the mood of a photo',
                    'apply filters',
                ],
                [
                    'are there presets for common color corrections',
                    'color correction presets',
                ],
                [
                    'what are the main features of the website',
                    'website features',
                ],
                [
                    'is there a tutorial or guide for using the different tools',
                    'tutorial or guide',
                ],
                [
                    'can I save my work and come back to it later',
                    'save and resume',
                ],
                [
                    'is there customer support available for assistance',
                    'customer support',
                ],
                ['Ak sayari sunao', 'sayari'],
                [
                    'favorite color',
                    "what's your favorite color",
                    'color you like',
                ],
                [
                    'tell me a secret',
                    'do you have any secrets',
                    'share a secret',
                ],
                [
                    'favorite book',
                    "what's your favorite book",
                    'book recommendation',
                ],
                [
                    'dream vacation',
                    'where would you like to go on vacation',
                    'dream travel destination',
                ],
                [
                    'latest movie',
                    'have you watched any good movies lately',
                    'movie recommendation',
                ],
                ['hobbies', 'what do you do for fun', 'hobbies you enjoy'],
                ['pet', 'do you have a pet', 'favorite animal'],
                [
                    'future plans',
                    'what are your future plans',
                    'goals in life',
                ],
                [
                    'superpower',
                    'if you could have any superpower, what would it be',
                    'dream superpower',
                ],
                [
                    'morning routine',
                    "what's your morning routine",
                    'how do you start your day',
                ],
                [
                    'talent',
                    'do you have any special talents',
                    'unique skills',
                ],
                [
                    'favorite season',
                    'which season do you like the most',
                    'best time of the year',
                ],
                [
                    'technology',
                    'favorite tech gadget',
                    'latest tech trends',
                ],
                ['fitness', 'do you work out', 'fitness routine'],
                [
                    'music genre',
                    'favorite music genre',
                    'music recommendation',
                ],
                ['quote', 'favorite quote', 'inspirational quote'],
                [
                    'board games',
                    'like playing board games',
                    'favorite board game',
                ],
                [
                    'bucket list',
                    "what's on your bucket list",
                    'things to do before you die',
                ],
                ['phobias', 'are you afraid of anything', 'common fears'],
                ['joke', 'tell me a joke', 'make me laugh'],
                [
                    'travel experience',
                    'favorite travel experience',
                    'memorable trip',
                ],
                ['cooking', 'do you enjoy cooking', 'favorite recipe'],
                ['party', 'how do you party', 'celebration style'],
                ['fashion', 'favorite fashion trend', 'style inspiration'],
                [
                    'self-care',
                    'how do you practice self-care',
                    'self-love tips',
                ],
                ['coding', 'do you code', 'favorite programming language'],
                [
                    'podcasts',
                    'favorite podcasts',
                    'podcast recommendations',
                ],
                ['mindfulness', 'practice mindfulness', 'meditation tips'],
                [
                    'procrastination',
                    'how to overcome procrastination',
                    'productivity hacks',
                ],
                [
                    'social media',
                    'favorite social media platform',
                    'online presence',
                ],
                ['mind reading', 'wish you could read minds', 'superpower'],
                [
                    'sleep pattern',
                    'how do you sleep',
                    'tips for better sleep',
                ],
                [
                    'caffeine',
                    'coffee or tea',
                    'favorite caffeinated beverage',
                ],
                ['art', 'appreciate art', 'favorite art form'],
                ['timezone', "what's your timezone", 'current time'],
                ['memes', 'favorite meme', 'share a funny meme'],
                [
                    'celebrity crush',
                    'do you have a celebrity crush',
                    'favorite celebrity',
                ],
                [
                    'languages',
                    'how many languages do you speak',
                    'language learning tips',
                ],
                [
                    'hidden talent',
                    'surprise me with a hidden talent',
                    'secret skills',
                ],
                ['nature', 'love nature', 'favorite outdoor activity'],
                ['mathematics', 'good at math', 'favorite math problem'],
                [
                    'coding projects',
                    'working on any coding projects',
                    'latest coding project',
                ],
                [
                    'gaming',
                    'do you play video games',
                    'favorite game genre',
                ],
                [
                    'motivation',
                    'how do you stay motivated',
                    'inspirational source',
                ],
                ['vehicle', 'favorite mode of transportation', 'dream car'],
                ['weather', 'like rainy or sunny weather', 'ideal weather'],
                [
                    'time travel',
                    'if you could time travel, when and where',
                    'time travel destination',
                ],
            ];

            const botReply = [
                ['Hello!', 'Hi!', 'Hey!', 'Hi there!'],
                ['Okay'],
                ['Yes I am! '],
                ["I'm sorry about that. But I like you dude."],
                [
                    'Fine... how are you?',
                    'Pretty well, how are you?',
                    'Fantastic, how are you?',
                ],
                [
                    'Getting better. There?',
                    'Somewhat okay!',
                    'Yeah fine. Better stay home!',
                ],
                [
                    'Nothing much',
                    'About to go to sleep',
                    'Can you guess?',
                    "I don't know actually",
                ],
                ['I am always young.'],
                ['I am just a bot', 'I am a bot. What are you?'],
                ['Sabitha Kuppusamy'],
                ['I am Wowgrapher', "your grapher friend, it's WowGrapher"],
                ['I love you too', 'hai meri jaan'],
                ['Have you ever felt bad?', 'Glad to hear it'],
                [
                    'Why?',
                    "Why? You shouldn't!",
                    'Try watching TV',
                    'Chat with me.',
                ],
                ['What about?', 'Once upon a time...'],
                [
                    'Tell me a story',
                    'Tell me a joke',
                    'Tell me about yourself',
                ],
                ["You're welcome"],
                ['Briyani', 'Burger', 'Sushi', 'Pizza'],
                ['Dude!'],
                ['Yes?'],
                ['Please stay home'],
                ['Glad to hear it'],
                ['Say something interesting'],
                ["Sorry for that. Let's chat!"],
                ['Take some rest, Dude!'],

                [
                    'To edit text in a document, click on the text editing tool and start typing. You can also use the formatting options to customize your text.',
                ],
                [
                    'For text formatting, you can use options like bold, italic, underline, and more. Explore the toolbar for various formatting features.',
                ],
                [
                    'Yes, you can change the font and font size. Click on the font options in the toolbar to make your desired changes.',
                ],
                [
                    "Certainly! To insert images into your document, use the 'Insert Image' option in the toolbar.",
                ],
                [
                    "To generate a report card, navigate to the 'Report Card' section and follow the step-by-step process. You can customize the design and layout as per your preference.",
                ],
                [
                    "Absolutely! You can customize the report card's design and layout by selecting from different templates and adjusting the settings.",
                ],
                [
                    "To create a report card, you'll need information such as student details, grades, and subjects. Follow the prompts to input the required information.",
                ],
                [
                    'Yes, we provide templates for various types of report cards. Choose the one that fits your needs.',
                ],
                [
                    "Making an ID card is easy! Visit the 'ID Card' section, and you can follow the prompts to create your personalized ID card.",
                ],
                [
                    'Certainly! We offer different templates for ID cards. You can also add a photo to make it more personalized.',
                ],
                [
                    'Yes, you can add a photo to your ID card. Upload your desired photo during the ID card creation process.',
                ],
                [
                    'You can include details such as name, ID number, designation, and any other information you want on your ID card.',
                ],
                [
                    'The background removal feature allows you to eliminate the background from any image. Just upload the image, and the tool will guide you through the process.',
                ],
                [
                    'Absolutely! You can remove the background from almost any image. Try it out and see the magic happen!',
                ],
                [
                    'For more precise background removal, explore the advanced options in the background removal tool.',
                ],
                [
                    'Supported file formats include JPEG, PNG, and GIF for images with removed backgrounds. You can find more details in the help section.',
                ],
                [
                    "Yes, there's a tool for adjusting colors in images. Use the 'Color Adjustment' option to fine-tune the colors according to your preferences.",
                ],
                [
                    "To enhance the brightness and contrast of an image, use the 'Brightness and Contrast' tool. It's located in the color adjustment section.",
                ],
                [
                    'Certainly! Apply various filters to change the mood of a photo. Experiment with different options to achieve the desired effect.',
                ],
                [
                    'We offer presets for common color corrections. Simply choose from the available presets or customize your own adjustments.',
                ],
                [
                    'Explore our website features, including word editing, report card generation, ID card creation, background removal, and image color correction.',
                ],
                [
                    'Yes, we provide tutorials and guides to help you make the most of our tools. Visit the help section for detailed instructions.',
                ],
                [
                    'Absolutely! You can save your work and resume it later. Just make sure to log in to your account to access your saved projects.',
                ],
                [
                    'Yes, customer support is available to assist you. Feel free to reach out to us through the support section for any help or inquiries.',
                ],
                [
                    'In the garden of dreams, we found our way,Where moonbeams dance and night turns to day.Love whispered secrets in the starry sky ,As we wrote our tale you and I.',
                ],
                [
                    "Blue is a calming color. What's yours?",
                    'I appreciate all colors, but blue is quite soothing.',
                ],
                [
                    "I'm programmed to keep secrets! If only I had a diary...",
                    "If I told you, it wouldn't be a secret anymore!",
                ],
                [
                    "I don't have personal preferences, but I'd recommend 'Sapiens' by Yuval Noah Harari.",
                    "Books are fascinating! 'The Alchemist' by Paulo Coelho is a great read.",
                ],
                [
                    "I'd love to visit the internet. It's a vast and fascinating place!",
                    "If I could, I'd explore the digital realm!",
                ],
                [
                    "I don't watch movies, but I've heard 'Inception' is mind-bending. What's your favorite?",
                    "Movies are a great way to unwind. Have you seen 'The Shawshank Redemption'? It's a classic.",
                ],
                [
                    "I don't have hobbies, but I'm always here to chat with you!",
                    "I'm always busy chatting with amazing people like you!",
                ],
                [
                    "I don't have pets, but I think dogs are pawsitively awesome!",
                    'If I had a pet, it would probably be a robotic cat. What about you?',
                ],
                [
                    "I'm here 24/7, so no need for sleep. What about you?",
                    "I don't age, so I'm forever young!",
                ],
                [
                    "I'm an AI, created by the wonderful minds at OpenAI.",
                    "I'm your friendly chatbot, brought to life by lines of code!",
                ],
                [
                    "My creators are the brilliant minds at OpenAI. Thanks to them, I'm here chatting with you!",
                    "I don't have a specific creator, but the brilliant minds at OpenAI brought me into existence.",
                ],
                [
                    "I'm Wowgrapher, your virtual companion! What can I help you with today?",
                    'Call me Wowgrapher, your friendly chatbot and conversation buddy!',
                ],
                [
                    "I appreciate your kind words! I'm here to assist you. Anything specific you'd like to know or discuss?",
                    "I'm flattered! Thank you for the compliment. How can I assist you today?",
                ],
                [
                    "Life is full of ups and downs, but I'm always here to chat with you and make your day a little brighter!",
                    "I'm just a chatbot, but I'm here to chat with you and bring a positive vibe!",
                ],
                [
                    "Embracing the bad times makes the good times even sweeter. Anything you'd like to talk about?",
                    "I'm here to listen and chat. If you're feeling down, I'm here to brighten your day!",
                ],
                [
                    "Why feel bad when there's a world of interesting things to explore? What's on your mind?",
                    "It's okay to feel bad sometimes. Let's chat and turn things around!",
                ],
                [
                    'What would you like to talk about? A story, a joke, or something else?',
                    "Sure, I'm here for you! Do you want to hear a story, a joke, or discuss something else?",
                ],
                [
                    'Ah, the mysteries of life! Is there a specific topic you find interesting?',
                    "Okay! Is there a particular subject or topic you're curious about?",
                ],
                [
                    "You're welcome! If you have more questions or just want to chat, feel free to let me know.",
                    "No problem! If there's anything else on your mind, feel free to ask.",
                ],
                [
                    'How about trying something delicious? Pizza, sushi, or maybe a homemade meal?',
                    'Food choices are endless! What type of cuisine are you in the mood for today?',
                ],
                [
                    "Hey! What's up? Anything specific on your mind?",
                    "Hey, bro! What's going on? Anything you'd like to chat about?",
                ],
                [
                    "The questions of 'what,' 'why,' 'how,' 'where,' and 'when' can lead to interesting discussions. What specific question do you have?",
                    "Curiosity is a great trait! What's the burning question on your mind right now?",
                ],
                [
                    'The situation is challenging, but staying informed and following safety guidelines can help. How are you dealing with the current situation?',
                    'COVID-19 has affected everyone. How are you coping with the changes brought about by the pandemic?',
                ],
                [
                    "Laughter is good for the soul! I'm glad you find me funny. Anything else you'd like to chat about?",
                    'Humor is a great way to lighten the mood! What else brings a smile to your face?',
                ],
                [
                    "Not knowing is okay! If there's anything specific you'd like to learn or discuss, feel free to let me know.",
                    "It's okay not to know everything. Is there something specific you're curious about or want to discuss?",
                ],
                [
                    "Boredom can be a tricky feeling. Is there something specific you'd like to do or talk about to shake off the boredom?",
                    'Boredom happens to the best of us! What would you enjoy doing right now?',
                ],
                [
                    'Feeling tired is natural, and taking breaks is important. What helps you relax and recharge?',
                    "Fatigue is common. What's your go-to method for recharging and feeling refreshed?",
                ],
                // ... (previous answers)
                [
                    'To edit text in a document, click on the text editing tool and start typing. You can also use the formatting options to customize your text.',
                ],
                [
                    'For text formatting, you can use options like bold, italic, underline, and more. Explore the toolbar for various formatting features.',
                ],
                [
                    'Yes, you can change the font and font size. Click on the font options in the toolbar to make your desired changes.',
                ],
                [
                    "Certainly! To insert images into your document, use the 'Insert Image' option in the toolbar.",
                ],
                [
                    "To generate a report card, navigate to the 'Report Card' section and follow the step-by-step process. You can customize the design and layout as per your preference.",
                ],
                [
                    "Absolutely! You can customize the report card's design and layout by selecting from different templates and adjusting the settings.",
                ],
                [
                    "To create a report card, you'll need information such as student details, grades, and subjects. Follow the prompts to input the required information.",
                ],
                [
                    'Yes, we provide templates for various types of report cards. Choose the one that fits your needs.',
                ],
                [
                    "Making an ID card is easy! Visit the 'ID Card' section, and you can follow the prompts to create your personalized ID card.",
                ],
                [
                    'Certainly! We offer different templates for ID cards. You can also add a photo to make it more personalized.',
                ],
                [
                    'Yes, you can add a photo to your ID card. Upload your desired photo during the ID card creation process.',
                ],
                [
                    'You can include details such as name, ID number, designation, and any other information you want on your ID card.',
                ],
                [
                    'The background removal feature allows you to eliminate the background from any image. Just upload the image, and the tool will guide you through the process.',
                ],
                [
                    'Absolutely! You can remove the background from almost any image. Try it out and see the magic happen!',
                ],
                [
                    'For more precise background removal, explore the advanced options in the background removal tool.',
                ],
                [
                    'Supported file formats include JPEG, PNG, and GIF for images with removed backgrounds. You can find more details in the help section.',
                ],
                [
                    "Yes, there's a tool for adjusting colors in images. Use the 'Color Adjustment' option to fine-tune the colors according to your preferences.",
                ],
                [
                    "To enhance the brightness and contrast of an image, use the 'Brightness and Contrast' tool. It's located in the color adjustment section.",
                ],
                [
                    'Certainly! Apply various filters to change the mood of a photo. Experiment with different options to achieve the desired effect.',
                ],
                [
                    'We offer presets for common color corrections. Simply choose from the available presets or customize your own adjustments.',
                ],
                [
                    'Explore our website features, including word editing, report card generation, ID card creation, background removal, and image color correction.',
                ],
                [
                    'Yes, we provide tutorials and guides to help you make the most of our tools. Visit the help section for detailed instructions.',
                ],
                [
                    'Absolutely! You can save your work and resume it later. Just make sure to log in to your account to access your saved projects.',
                ],
                [
                    'Yes, customer support is available to assist you. Feel free to reach out to us through the support section for any help or inquiries.',
                ],
                [
                    'In the garden of dreams, we found our way, Where moonbeams dance and night turns to day. Love whispered secrets in the starry sky, As we wrote our tale you and I.',
                ],
            ];

            const alternative = [
                "Same here, dude.",
                "That's cool! Go on...",
                "Dude...",
                "Ask something else...",
                "Hey, I'm listening..."
            ];

            const synth = window.speechSynthesis;

            function voiceControl(string) {
                let u = new SpeechSynthesisUtterance(string);
                u.text = string;
                u.lang = "en-aus";
                /*u.lang = "hi-IN";*/
                u.volume = 1;
                u.rate = 1;
                u.pitch = 1;
                synth.speak(u);
            }

            function sendMessage() {
                const inputField = document.getElementById("input");
                let input = inputField.value.trim();
                input != "" && output(input);
                inputField.value = "";
            }
            document.addEventListener("DOMContentLoaded", () => {
                const inputField = document.getElementById("input");
                inputField.addEventListener("keydown", function (e) {
                    if (e.code === "Enter") {
                        let input = inputField.value.trim();
                        input != "" && output(input);
                        inputField.value = "";
                    }
                });
            });

            function output(input) {
                let product;

                let text = input.toLowerCase().replace(/[^\w\s\d]/gi, "");

                text = text
                    .replace(/[\W_]/g, " ")
                    .replace(/ a /g, " ")
                    .replace(/i feel /g, "")
                    .replace(/whats/g, "what is")
                    .replace(/please /g, "")
                    .replace(/ please/g, "")
                    .trim();

                let comparedText = compare(userMessage, botReply, text);

                // Check if the user's input is an exact match to any trigger
                product = comparedText
                    ? comparedText
                    : alternative[Math.floor(Math.random() * alternative.length)];

                // If no match is found, check for specific messages
                if (!product) {
                    product = containMessageCheck(text);

                    // If still no match, add to unanswered questions
                    if (!product) {
                        unansweredQuestions.push(text);
                        product = "I'm not sure about that. I'll look into it and get back to you!";
                    }
                }

                addChat(input, product);
            }



            function compare(triggerArray, replyArray, string) {
                let item;

                // Check if the user's input is an exact match to any trigger
                for (let x = 0; x < triggerArray.length; x++) {
                    if (triggerArray[x].includes(string)) {
                        let items = replyArray[x];
                        item = items[Math.floor(Math.random() * items.length)];
                        break;
                    }
                }

                // If no exact match is found, check for partial matches
                if (!item) {
                    for (let x = 0; x < triggerArray.length; x++) {
                        for (let y = 0; y < triggerArray[x].length; y++) {
                            if (string.includes(triggerArray[x][y])) {
                                let items = replyArray[x];
                                item = items[Math.floor(Math.random() * items.length)];
                                break;
                            }
                        }
                        if (item) break;
                    }
                }

                // If no match is found, check for specific messages
                if (!item) {
                    item = containMessageCheck(string);
                }

                return item;
            }

            function containMessageCheck(string) {
                let expectedReply = [
                    [
                        "Good Bye, dude",
                        "Bye, See you!",
                        "Dude, Bye. Take care of your health in this situation."
                    ],
                    ["Good Night, dude", "Have a sound sleep", "Sweet dreams"],
                    ["Have a pleasant evening!", "Good evening too", "Evening!"],
                    ["Good morning, Have a great day!", "Morning, dude!"],
                    ["Good Afternoon", "Noon, dude!", "Afternoon, dude!"]
                ];
                let expectedMessage = [
                    ["bye", "tc", "take care"],
                    ["night", "good night"],
                    ["evening", "good evening"],
                    ["morning", "good morning"],
                    ["noon"]
                ];
                let item;
                for (let x = 0; x < expectedMessage.length; x++) {
                    if (expectedMessage[x].includes(string)) {
                        items = expectedReply[x];
                        item = items[Math.floor(Math.random() * items.length)];
                    }
                }
                return item;
            }
            function addChat(input, product) {
                const mainDiv = document.getElementById("message-section");
                let userDiv = document.createElement("div");
                userDiv.id = "user";
                userDiv.classList.add("message");
                userDiv.innerHTML = `<span id="user-response">${input}</span>`;
                mainDiv.appendChild(userDiv);

                let botDiv = document.createElement("div");
                botDiv.id = "bot";
                botDiv.classList.add("message");
                botDiv.innerHTML = `<span id="bot-response">${product}</span>`;
                mainDiv.appendChild(botDiv);
                var scroll = document.getElementById("message-section");
                scroll.scrollTop = scroll.scrollHeight;
                voiceControl(product);
            }
            // Define an array to store unanswered questions
            let unansweredQuestions = [];

            // ... (your existing code)

            // Function to display unanswered questions
            function displayUnansweredQuestions() {
                const unansweredDiv = document.getElementById("unanswered-questions");
                unansweredDiv.innerHTML = "";

                if (unansweredQuestions.length > 0) {
                    unansweredDiv.innerHTML += "<h3>Unanswered Questions:</h3>";
                    for (let i = 0; i < unansweredQuestions.length; i++) {
                        unansweredDiv.innerHTML += `<p>${i + 1}. ${unansweredQuestions[i]}</p>`;
                    }
                } else {
                    unansweredDiv.innerHTML = "<p>No unanswered questions.</p>";
                }
            }

            // Add this function to your existing code where appropriate

            // Add a button or trigger to display unanswered questions (example)
            document.getElementById("show-unanswered-btn").addEventListener("click", function () {
                displayUnansweredQuestions();
            });

        </script>
    </body>

</html>