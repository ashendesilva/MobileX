<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>MobileX | Sign Up</title>
</head>

<body>


    <div class="container d-flex justify-content-center align-items-center min-vh-100">


        <div class="row border rounded-5 p-3 bg-white shadow box-area">


            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bgnimg"></div>


            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Welcome to MobileX</h2>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="First Name" id="fname">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Last Name" id="lname">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email" id="email">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Mobile" id="mobile">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" id="password">
                    </div>
                    <div class="d-none" id="msgDiv">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" onclick="signUp();">Sign Up</button>
                    </div>


                    <div class="mb-3">
                        <a href="signin.php"><button class="btn btn-lg btn-outline-secondary w-100 fs-6">Already have an account? Sign In</button></a>
                    </div>


                </div>
            </div>

        </div>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>

</html>