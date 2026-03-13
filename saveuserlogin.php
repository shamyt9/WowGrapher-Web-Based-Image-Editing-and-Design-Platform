<?php
session_start();
include ("include/connection.php");

if (isset($_POST['login'])) {
    $useremail = mysqli_real_escape_string($connect, $_POST['email']);
    $userpassword = $_POST['password'];

    // Retrieve the user data from the database
    $userdata = "SELECT * FROM accounttable WHERE email = ?";
    $stmt = $connect->prepare($userdata);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['userPassword'];

        // Verify the entered password with the hashed password
        if (password_verify($userpassword, $hashedPassword)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['userPassword'] = $row['userPassword'];
            $_SESSION['pimage'] = $row['image'];
            $_SESSION['feedback'] = $row['review'];
            echo "<script>alert('Your login successful'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Wrong id or password'); window.location='userlogin.php';</script>";
        }
    } else {
        echo "<script>alert('Wrong id or password'); window.location='userlogin.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('not connected');</script>";
}

$connect->close();
?>