<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Admin Dashboad | Product Management</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="adminSigninBody">
        <!-- nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center productmanagement bname">Product Management</h2>

            <div class="row" style="justify-content: center; align-items: center;">

                <!-- brand register -->
                

                <div class="border col-4  mt-4 ">
                    <div class=" ">
                    <label for="form-label" class="mb-3 mt-3 bname">Brand Name :</label>
                    <input type="text" class="form-control mb-3" id="brand" />

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                    <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                    <button class="btn btn btn-primary col-12 mb-3" onclick="brandReg();">Brand Register</button>
                    </div>
                    </div>
                    
                </div>
                
                <!-- brand register -->



                <!-- color register -->
                

                <div class="border col-4  mt-4 offset-1">
                    <div class=" ">
                    <label for="form-label" class="mb-3 mt-3 bname">Color :</label>
                    <input type="text" class="form-control mb-3" id="color" />

                    <div class="d-none" id="msgDiv3" onclick="reload();">
                    <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-4">
                    <button class="btn btn-primary col-12 mb-3" onclick="colorReg();">Color Register</button>
                    </div>
                    </div>
                    
                </div>
                <!-- color register -->

            </div>

            <div class="row mt-5" style="justify-content: center; align-items: center;">
                

                <!-- condition register -->
                

                <div class="border col-4 mt-4 ">
                    <div class=" ">
                    <label for="form-label" class="mb-3 mt-3 bname">Condition :</label>
                    <input type="text" class="form-control mb-3" id="condition" />

                    <div class="d-none" id="msgDiv4" onclick="reload();">
                    <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-4">
                    <button class="btn btn btn-primary col-12 mb-3" onclick="conditionReg();">Condition Register</button>
                    </div>
                    </div>
                    
                </div>
                <!-- condition register -->


            </div>

        </div>


       
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("YOU ARE NOT A VALID ADMIN");
}


?>