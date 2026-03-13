<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>

        <title>Document</title>
        <style>
            body {
                background: linear-gradient(
                    to left,
                    rgb(255, 208, 120),
                    rgb(252, 160, 90),
                    rgb(255, 133, 133)
                );
            }
            .form1Update {
                /*border: 2px solid white;*/
                box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2),
                    -2px -4px 8px rgba(0, 0, 0, 0.2);
                padding: 20px;
                width: 60vmin;
                border-radius: 20px;
                left: 0;
                right: 0;
                margin: 5% auto;
            }
            .updateDetails {
                font-size: 5vmin;
                text-align: center;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                text-transform: uppercase;
                font-weight: bold;
            }
            .updateInput {
                background-color: transparent;
                color: white;
                font-size: 20px;
                padding: 2px 2px 2px 5px;
                width: 100%;

                margin-top: 5px;
                margin-bottom: 5px;
                border-radius: 20px;
                border: 2px solid white;
            }
            .updateFormLabel {
                color: rgb(44, 44, 44);
                font-weight: bold;
                font-size: 20px;
                box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
                padding: 5px;
                margin-top: 10px;
                margin-bottom: 5px;
            }
            .submitForm {
                font-size: 20px;
                padding: 5px;
                border-radius: 10px;
                box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2),
                    -2px -4px 8px rgba(0, 0, 0, 0.2);
                cursor: pointer;
                margin-top: 30px;
                background: none;
                outline: none;
                color: white;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                text-transform: uppercase;
                font-weight: bold;

                width: 100%;
                background-color: rgb(0, 173, 61);
            }
            .submitForm:hover {
                background-color: brown;
            }

            @media (max-width: 600px) {
                body {
                    padding: 10px;
                }
                .form1Update {
                    width: 100%;
                }
                .updateInput {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="form1Update">
            <p class="updateDetails">Update Detail Form</p>
            <form
                action="updatePersonalDetail.php"
                method="POST"
                enctype="multipart/form-data"
            >
                <!-- profile Image -->
                <label for="profileImage" class="updateFormLabel"
                    >ProFile Image:</label
                >
                <br />
                <input
                    type="file"
                    name="profileImage"
                    id="profileImage"
                    class="updateInput"
                />
                <br />

                <!-- name -->
                <label for="name" class="updateFormLabel">User Name:</label>
                <br />
                <input type="text" name="username" class="updateInput" />

                <!-- email -->
                <br />
                <label for="name" class="updateFormLabel">User Email:</label>
                <br />
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="updateInput"
                />
                <br />
                <!-- password -->
                <label for="password" class="updateFormLabel">Password:</label>
                <br />
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="updateInput"
                />
                <br />
                <!-- confirm password -->
                <label for="confirmPassword" class="updateFormLabel"
                    >Confirm Password:</label
                >
                <br />
                <input
                    type="text"
                    name="confirmPassword"
                    id="confirmPassword"
                    class="updateInput"
                />
                <br />
                <button class="submitForm">Update</button>
            </form>
        </div>
    </body>
</html>
