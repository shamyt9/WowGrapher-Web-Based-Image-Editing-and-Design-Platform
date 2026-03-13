<?php
include ("include/connection.php");

// Generate OTP and activation code
$otp_str = str_shuffle("0123456789");
$otp = substr($otp_str, 0, 6);
$act_str = rand(100000, 10000000);
$activation = str_shuffle("abcdefghijklmnopqrstuvwxyz" . $act_str);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hey_Coder</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/userlogin.css">
    <style>
        .file-input-container {
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            font-size: 200px;
            cursor: pointer;
        }

        .file-input-label {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="custom-modal">
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log
                    In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <div class="sign-in-htm">
                        <div class="form-box login">
                            <form action="saveuserlogin.php" method="POST">
                                <div class="input-box">
                                    <span class="icon"><i class="fa fa-envelope register-icon"
                                            aria-hidden="true"></i></span>
                                    <input type="email" required name="email">
                                    <label>Email</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon"><i class="fa fa-key register-icon" aria-hidden="true"></i></span>
                                    <input type="password" required name="password">
                                    <label>Password</label>
                                </div>
                                <div class="remember-forgot">
                                    <label><input type="checkbox">Remember me</label>
                                    <a href="#">Forgot Password?</a>
                                </div>
                                <button type="submit" class="login-btn" name="login">Login</button>
                                <div class="login-register">
                                    <p>Don't have an account? <label for="tab-2" class="already">Sign up</label></p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="sign-up-htm">
                        <div class="form-box login">
                            <form action="savesignup.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="otp" value="<?php echo $otp; ?>">
                                <input type="hidden" name="activation_code" value="<?php echo $activation; ?>">

                                <div class="file-input-container">
                                    <input type="file" name="profileimage" id="profileImage" class="file-input">
                                    <label for="profileImage" class="file-input-label">Choose Profile Image</label>
                                </div>

                                <div class="input-box">
                                    <span class="icon"><i class="fa fa-user register-icon"
                                            aria-hidden="true"></i></span>
                                    <input type="text" required name="username">
                                    <label>Name</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon"><i class="fa fa-envelope register-icon"
                                            aria-hidden="true"></i></span>
                                    <input type="email" required name="useremail">
                                    <label>Email</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon"><i class="fa fa-key register-icon" aria-hidden="true"></i></span>
                                    <input type="password" required name="userpassword">
                                    <label>Password</label>
                                </div>
                                <div class="input-box">
                                    <span class="icon"><i class="fa fa-key register-icon" aria-hidden="true"></i></span>
                                    <input type="password" required name="confirm-password">
                                    <label>Confirm Password</label>
                                    <span class="password-error" style="color: red;"></span>
                                </div>
                                <div class="remember-forgot">
                                    <label><input type="checkbox">Remember me</label>
                                </div>
                                <button type="submit" class="login-btn" name="signup">Signup</button>
                                <div class="login-register">
                                    <p>Already have an account? <label for="tab-1" class="already">Log In</label></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function validatePassword() {
                var password = $("input[name='userpassword']").val();
                var confirmPassword = $("input[name='confirm-password']").val();

                if (password != confirmPassword) {
                    $("input[name='confirm-password']").addClass("error");
                    $(".password-error").text("Passwords do not match");
                    return false;
                } else {
                    $("input[name='confirm-password']").removeClass("error");
                    $(".password-error").text("");
                    return true;
                }
            }

            $("input[name='userpassword'], input[name='confirm-password']").keyup(validatePassword);

            $("form").submit(function (event) {
                if (!validatePassword()) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>