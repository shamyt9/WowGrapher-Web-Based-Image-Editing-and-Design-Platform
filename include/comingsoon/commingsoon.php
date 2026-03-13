<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Coming Soon</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            .container {
                text-align: center;
            }

            h1 {
                color: #333;
                font-size: 2.5em;
                margin-bottom: 20px;
            }

            p {
                color: #666;
                font-size: 1.2em;
                margin-bottom: 30px;
            }

            .countdown {
                color: #444;
                font-size: 1.5em;
                margin-bottom: 30px;
            }

            /* Style the countdown timer */
            .countdown span {
                display: inline-block;
                margin: 0 10px;
                color: #fff;
                background-color: #333;
                padding: 10px;
                border-radius: 5px;
            }

            /* Style the subscribe button */
            .subscribe-btn {
                display: inline-block;
                padding: 10px 20px;
                font-size: 1.2em;
                color: #fff;
                background-color: #007bff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .subscribe-btn:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Coming Soon</h1>
            <p>Our website is currently under construction.</p>
            <div id="countdown" class="countdown">
                <span id="days">00</span> days <span id="hours">00</span> hours
                <span id="minutes">00</span> minutes
                <span id="seconds">00</span> seconds
            </div>
            <a href="#" class="subscribe-btn">Subscribe</a>
        </div>

        <script>
            // Set the date we're counting down to
            var countDownDate = new Date('Feb 28, 2024 00:00:00').getTime();

            // Update the countdown every 1 second
            var x = setInterval(function () {
                // Get the current date and time
                var now = new Date().getTime();

                // Calculate the remaining time
                var distance = countDownDate - now;

                // Calculate days, hours, minutes, and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                var minutes = Math.floor(
                    (distance % (1000 * 60 * 60)) / (1000 * 60)
                );
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the countdown
                document.getElementById('days').innerHTML = days;
                document.getElementById('hours').innerHTML = hours;
                document.getElementById('minutes').innerHTML = minutes;
                document.getElementById('seconds').innerHTML = seconds;

                // If the countdown is over, display a message
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById('countdown').innerHTML = 'Live Now';
                }
            }, 1000);
        </script>
    </body>
</html>
