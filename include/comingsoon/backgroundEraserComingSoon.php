<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Background Eraser Coming Soon</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Arial', sans-serif;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                overflow: hidden;
                /* Hide overflowing video content */
            }

            video {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -1;
                /* Place the video behind other content */
            }

            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
            }

            .coming-soon-container {
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border-radius: 8px;
                z-index: 1;
            }

            .logo {
                max-width: 150px;
                margin-bottom: 20px;
                border-radius: 50%;
            }

            h1 {
                font-size: 2.5em;
                margin-bottom: 10px;
                color: #fff;
            }

            p {
                font-size: 1.2em;
                margin-bottom: 30px;
                color: #fff;
            }

            .cta-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #3498db;
                color: #ffffff;
                text-decoration: none;
                font-size: 1.2em;
                border-radius: 5px;
                transition: background-color 0.3s ease;
                cursor: pointer;
            }

            .cta-button:hover {
                background-color: #2980b9;
            }

            .notification-on {
                background-color: #27ae60;
                transition: background-color 0.3s ease;
            }
        </style>
    </head>

    <body>
        <video autoplay muted loop>
            <source src="../../img/bgremover.mp4" type="video/mp4" />
            Your browser does not support the video tag.
        </video>

        <div class="overlay"></div>

        <div class="coming-soon-container">
            <img src="../../img/idlogo.png" alt="Logo" class="logo" />
            <h1>Background Eraser Coming Soon!</h1>
            <p>
                We are working on an exciting background eraser feature. Stay
                tuned for updates!
            </p>

            <!-- Call to Action Button -->
            <button id="notifyButton" class="cta-button" onclick="notifyUser()">
                Get Notified
            </button>

            <script>
                function notifyUser() {
                    alert('Notification On!');
                    var notifyButton = document.getElementById('notifyButton');
                    notifyButton.innerHTML = 'Notification On';
                    notifyButton.classList.add('notification-on');
                    notifyButton.disabled = true;
                }
            </script>
        </div>
    </body>
</html>
