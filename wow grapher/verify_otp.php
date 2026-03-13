<?php
include("include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp_entered = mysqli_real_escape_string($connect, $_POST['otp']);
    $activation_code = mysqli_real_escape_string($connect, $_POST['activation_code']);

    // Query to fetch user details by activation code
    $query = "SELECT * FROM accounttable WHERE activationCode = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $activation_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $stored_otp = $user['verification_otp'];

        // Verify OTP
        if ($otp_entered === $stored_otp) {
            // Update user status to active (you can customize this part)
            $update_query = "UPDATE accounttable SET status = 'active' WHERE activationCode = ?";
            $stmt_update = $connect->prepare($update_query);
            $stmt_update->bind_param("s", $activation_code);
            if ($stmt_update->execute()) {
                echo '<script>alert("Your account is verified. You can now login.");</script>';
                // Redirect to login page or any other page
                header('Location: userlogin.php');
                exit();
            } else {
                echo '<script>alert("Failed to update account status.");</script>';
            }
        } else {
            echo '<script>alert("Invalid OTP. Please try again."); history.go(-1);</script>';
        }
    } else {
        echo '<script>alert("Invalid activation code.");</script>';
    }

    $stmt->close();
    $stmt_update->close();
    $connect->close();
} else {
    header('Location: email_verify.php'); // Redirect if accessed directly
    exit();
}
?>