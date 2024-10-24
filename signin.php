<?php
include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Mobile X | Sign In</title>
</head>

<body>

    <?php

    $email = "";
    $password = "";

    if (isset($_COOKIE["email"])) {
        $email = $_COOKIE["email"];
    }

    if (isset($_COOKIE["password"])) {
        $password = $_COOKIE["password"];
    }

    ?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">


        <div class="row border rounded-5 p-3 bg-white shadow box-area">


            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bgnimg"></div>


            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Welcome to MobileX</h2>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" id="email" value="<?php echo $email ?>">
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" id="pw" value="<?php echo $password ?>">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rm">
                            <label for="formCheck" class="form-check-label text-secondary">Remember Me</label>
                        </div>
                        <div class="forgot" >
                            <small><a href="forgetPassword.php" onclick="forgotPassword();">Forgot Password?</a></small>
                        </div>
                    </div>
                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" onclick="signIn();">Sign In</button>
                    </div>

                    <div class="mb-3">
                        <a href="signup.php"><button class="btn btn-lg btn-outline-secondary w-100 fs-6">Don't have account? Sign Up</button></a>
                    </div>

                </div>
            </div>

        </div>
    </div>

   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>

</html>