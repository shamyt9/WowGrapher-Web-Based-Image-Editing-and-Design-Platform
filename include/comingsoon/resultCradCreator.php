<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Result Card Generator Coming Soon</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Arial', sans-serif;
                background: url('your_background_image.jpg') repeat;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                min-height: 100vh;
                position: relative;
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
                max-width: 800px;
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
            }

            p {
                font-size: 1.2em;
                margin-bottom: 30px;
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

            /* Card Styles */
            .result-cards-container {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
            }

            .result-card {
                color: #ffffff;
                padding: 20px;
                margin: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                max-width: 300px;
                text-align: center;
                flex: 1; /* Each card takes equal width */
            }

            .result-card h2 {
                font-size: 1.8em;
                margin-bottom: 10px;
            }

            .result-card p {
                font-size: 1.2em;
                margin-bottom: 15px;
            }

            .report-heading {
                font-size: 1.5em;
                margin-bottom: 15px;
            }

            .marks-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 15px;
            }

            .marks-table th,
            .marks-table td {
                border: 1px solid #ffffff;
                padding: 10px;
            }

            .marks-table th {
                background-color: #2c3e50;
            }

            .marks-table td {
                background-color: #34495e;
            }

            /* Gradient Background Colors and Borders */
            .result-card:nth-child(1) {
                background: linear-gradient(45deg, #ff9a9e, #fad0c4);
                border: 2px solid #ff6f61;
            }

            .result-card:nth-child(2) {
                background: linear-gradient(45deg, #a18cd1, #fbc2eb);
                border: 2px solid #9f8ed9;
            }

            .result-card:nth-child(3) {
                background: linear-gradient(45deg, #4facfe, #00f2fe);
                border: 2px solid #00c6fb;
            }
        </style>
    </head>

    <body>
        <div class="overlay"></div>

        <div class="coming-soon-container">
            <img src="../../img/idlogo.png" alt="Logo" class="logo" />
            <h1>Result Card Generator Coming Soon!</h1>
            <p>
                We are working on an exciting Result Card Generator feature.
                Stay tuned for updates!
            </p>

            <!-- Call to Action Button -->
            <button id="notifyButton" class="cta-button" onclick="notifyUser()">
                Get Notified
            </button>

            <!-- Result Card Views -->
            <div class="result-cards-container">
                <!-- Result Card 1 -->
                <div class="result-card">
                    <h2>School A</h2>
                    <p>Address: Street 1, City</p>
                    <p class="report-heading">Report Card</p>
                    <table class="marks-table">
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>
                        <tr>
                            <td>Math</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td>85</td>
                        </tr>
                        <tr>
                            <td>English</td>
                            <td>92</td>
                        </tr>
                    </table>
                    <p>Percentage: 89%</p>
                </div>

                <!-- Result Card 2 -->
                <div class="result-card">
                    <h2>School B</h2>
                    <p>Address: Street 2, City</p>
                    <p class="report-heading">Report Card</p>
                    <table class="marks-table">
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>
                        <tr>
                            <td>Math</td>
                            <td>88</td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td>94</td>
                        </tr>
                        <tr>
                            <td>English</td>
                            <td>90</td>
                        </tr>
                    </table>
                    <p>Percentage: 91%</p>
                </div>

                <!-- Result Card 3 -->
                <div class="result-card">
                    <h2>School C</h2>
                    <p>Address: Street 3, City</p>
                    <p class="report-heading">Report Card</p>
                    <table class="marks-table">
                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>
                        <tr>
                            <td>Math</td>
                            <td>95</td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td>87</td>
                        </tr>
                        <tr>
                            <td>English</td>
                            <td>93</td>
                        </tr>
                    </table>
                    <p>Percentage: 92%</p>
                </div>
            </div>

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
