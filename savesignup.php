<?php
include("include/connection.php");

if (isset($_POST['signup'])) {

    // Get form data safely
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $useremail = mysqli_real_escape_string($connect, $_POST['useremail']);
    $otp = $_POST['otp'];
    $activation_code = $_POST['activation_code'];

    // Hash password
    $userpassword = password_hash($_POST['userpassword'], PASSWORD_BCRYPT);

    // ===============================
    // CHECK IF EMAIL EXISTS
    // ===============================
    $existEmail = "SELECT * FROM accounttable WHERE email = ?";
    $stmt = $connect->prepare($existEmail);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $selectRow = $result->fetch_assoc();

        if ($selectRow['status'] == 'active') {
            echo "<script>alert('Email already registered!'); window.location.href='userlogin.php';</script>";
            exit();
        }
    }

    // ===============================
    // INSERT USER INTO DATABASE
    // ===============================
    $userdata = "INSERT INTO accounttable (name, email, userPassword, verification_otp, activationCode)
                 VALUES (?, ?, ?, ?, ?)";

    $stmt = $connect->prepare($userdata);
    $stmt->bind_param("sssss", $username, $useremail, $userpassword, $otp, $activation_code);

    if ($stmt->execute()) {

        // ===============================
        // SEND EMAIL USING PHP MAIL()
        // ===============================
        $subject = "Account Activation";
        $message = "
            <h2>Welcome $username</h2>
            <p>Your OTP is: <b>$otp</b></p>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: noreply@yourwebsite.com";

        mail($useremail, $subject, $message, $headers);

        // Redirect to verification page
        header("Location: email_verify.php?code=" . $activation_code);
        exit();

    } else {
        echo "<script>alert('Failed to create account. Please try again.');</script>";
    }

    $stmt->close();
    $connect->close();
}
?>