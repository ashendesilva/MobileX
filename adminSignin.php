<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Mobile X | Admin Sign In</title>
</head>
<body class="adminSigninBody ">

    <div class="adminsignIn_Box">
        <h2 class="adminlogin">Admin Login</h2>

        <div class="mt-5">
        <input type="text" class="form-control border-black bg-transparent" placeholder="Username" id="un"/>
        </div>

        <div class="mt-3 mb-3">
        
        <input type="password" class="form-control border-black bg-transparent" placeholder="Password" id="pw"/>
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class=" mt-4">
            <button class="btn btn-dark col-12" onclick="adminSignin();">Sign In</button>
        </div>



        
    </div>

    <!-- Footer -->
    <div class="fixed-bottom col-12">
            <p class="text-center text-light">&copy; 2024 MobileX.com || All Right Reserve</p>
        </div>
        <!-- footer -->
    
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="script.js"></script>
</body>
</html>