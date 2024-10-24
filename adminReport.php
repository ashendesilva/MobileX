<?php

session_start();

if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Admin Reports</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body class="adminSigninBody">
        <!-- nav bar -->
        <?php
        include "adminNavBar.php";
        ?>
        <!-- nav bar -->

        <div class="">
            <h2 class="text-center productmanagement bname">Reports</h2>

            <div class="adminReg_Box mt-5">

                <div class="d-grid gap-2  mx-auto">
                    <a href="adminStockReport.php"><button class="btn btn-dark mb-4 col-12" type="button">Stock Report</button></a>
                    <a href="adminProductReport.php"> <button class="btn btn-dark mb-4 col-12" type="button">Product Report</button></a>
                    <a href="adminUserReport.php"><button class="btn btn-dark col-12" type="button">User Report</button></a>
                </div>
            </div>

        </div>









        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("YOUR NOT A VALID ADMIN");
}

?>