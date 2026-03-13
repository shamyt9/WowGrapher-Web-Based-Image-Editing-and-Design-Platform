<?php
session_start();
include ("include/connection.php");

$created = $_SESSION['email'];
if ($created) {

} else {
    header("Location:userlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account Verification</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ==============================BOXICON LINKS============================= -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- ================REMIXICON LINK================================ -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg,
                    rgb(3, 231, 252),
                    rgb(138, 222, 255));


            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .Vcontainer {

            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.1), inset 2px 2px 1px white;
            text-align: center;
            width: 40vmin;
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        img.profile {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 2px solid white;
        }

        input[type='password'] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background: none;
            font-size: 20px;
        }

        .submit-button {
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;

        }

        .submit-button:hover {
            background: white;
            color: black;
        }

        .emailDisplay {
            font-size: 20px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <?php include ("include/header.php"); ?>
    <div class="Vcontainer">
        <h2>Verify That It's You</h2>

        <img src='backendimages/<?php echo $_SESSION["pimage"]; ?>' alt="Profile Photo" class="profile" />
        <h3>
            <?php echo $_SESSION['username']; ?>
        </h3>
        <p class="emailDisplay">
            <?php echo $_SESSION['email']; ?>
        </p>
        <form action="backendCode/veriefyPassword.php" method="post">
            <input type="password" placeholder="Enter your password" required name="verifyPassword" />
            <br><br>
            <button type="submit" class="submit-button" name="submit">Verify</button>

        </form>
    </div>
</body>

</html>