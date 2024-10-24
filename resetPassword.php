<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Mobile X | Reset Password</title>
</head>

<body class="">




    <div class="container d-flex justify-content-center align-items-center min-vh-100">


        <div class="row border rounded-5 p-3 bg-white shadow box-area">


            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bgnimg"></div>


            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Welcome to Newtech</h2>
                        <h4>Reset Password</h4>
                    </div>
                    <div class="d-none">
                        <input type="hidden" id="vcode" value="<?php echo ($_GET["vcode"]) ?>"/>
                    </div>

                    


                    <div class="input-group mb-2">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" id="np">
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password" id="np2">
                    </div>
                    <div class="d-none" id="msgDiv">
                        <div class="alert" id="msg"></div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" onclick="resetPassword();">Update</button>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>

</html>