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

    <body class="adminSigninBody" onload="loadChart();">
        <!-- nav bar -->
        <?php
        include "adminNavBar.php";
        ?>
        <!-- nav bar -->
<!-- chart -->

<div style="width: 400px;  background-color: white;">
    <h3 class="text-center mt-3">Most Selling Product</h3>
    <canvas class="mb-3" id="myChart"></canvas>
</div>

<!-- chart -->
        

      



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    // Login
    echo ("YOUR NOT A VALID ADMIN");
}


?>

