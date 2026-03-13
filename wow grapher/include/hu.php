<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Glassmorphism Footer</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f2f2f2;
            }
            .footer {
                background: rgba(255, 255, 255, 0.8);
                border-radius: 20px;
                box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
                padding: 40px;
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
            }
            .column {
                flex: 1;
                margin: 10px;
            }
            .feedback-form,
            .features,
            .social-links {
                background: rgba(255, 255, 255, 0.2);
                padding: 20px;
                border-radius: 10px;
                backdrop-filter: blur(10px);
                margin-bottom: 20px;
            }
            .feedback-form h3,
            .features h3,
            .social-links h3 {
                color: #333;
                font-size: 1.2rem;
                margin-bottom: 10px;
            }
            .feedback-form input[type='text'],
            .feedback-form input[type='email'],
            .feedback-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: none;
                border-radius: 5px;
                background-color: rgba(255, 255, 255, 0.5);
                box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s ease-in-out;
            }
            .feedback-form input[type='text']:focus,
            .feedback-form input[type='email']:focus,
            .feedback-form textarea:focus {
                outline: none;
                box-shadow: inset 0px 0px 8px rgba(0, 0, 0, 0.3);
            }
            .feedback-form textarea {
                resize: vertical;
                min-height: 100px;
            }
            .feedback-form button {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background-color: #4caf50;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s ease-in-out;
            }
            .feedback-form button:hover {
                background-color: #45a049;
            }
            .features ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            .features ul li {
                margin-bottom: 5px;
            }
            .social-links a {
                display: inline-block;
                margin-right: 10px;
                color: #333;
                text-decoration: none;
                transition: color 0.3s ease-in-out;
            }
            .social-links a:hover {
                color: #007bff;
            }
            @media screen and (max-width: 768px) {
                .column {
                    flex: 100%;
                }
            }
        </style>
    </head>
    <body>
        <footer class="footer">
            <div class="column">
                <div class="feedback-form">
                    <h3>Feedback Form</h3>
                    <form action="#" method="post">
                        <input
                            type="text"
                            name="name"
                            placeholder="Your Name"
                            required
                        />
                        <input
                            type="email"
                            name="email"
                            placeholder="Your Email"
                            required
                        />
                        <textarea
                            name="message"
                            placeholder="Your Message"
                            required
                        ></textarea>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="column">
                <div class="features">
                    <h3>Upcoming Features</h3>
                    <ul>
                        <li>Feature 1</li>
                        <li>Feature 2</li>
                        <li>Feature 3</li>
                        <li>Feature 4</li>
                    </ul>
                </div>
            </div>
            <div class="column">
                <div class="social-links">
                    <h3>Social Links</h3>
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Instagram</a>
                    <a href="#">LinkedIn</a>
                </div>
            </div>
        </footer>
    </body>
</html>
