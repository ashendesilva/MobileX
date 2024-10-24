<?php

session_start();

if (isset($_SESSION["a"])) {
    // load page

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="light">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Admin Dashboad</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="adminSigninBody" onload="loadUser();">
        <!-- nav bar -->
        <?php
        include "adminNavBar.php";
        ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center usermanagement bname">User Management</h2>



            <div class="mt-5">
                <div class="container">

                    <div class="row d-flex justify-content-end mt-5 mb-5">
                        <div class="d-none" id="msgDiv" onclick="reload();">
                            <div class="alert alert-danger" id="msg"></div>
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" placeholder="User Id" id="uid" />
                        </div>

                        <button class="btn btn-primary col-2" onclick="updateUserStatus();">Change Status</button>
                    </div>

                    <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider" id="tb">
                            <!-- Table row -->
                            <!-- Table row -->
                        </tbody>
                    </table>

                    </div>

                    
                </div>

            </div>
        </div>


       <!-- Footer -->
   
        <!-- footer -->


        <script src="script.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    // Login
    echo ("YOUR NOT A VALID ADMIN");
}


?>