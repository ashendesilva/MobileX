<?php

session_start();
include "connection.php";

$user = $_SESSION["e"];

if (isset($user)) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mobile X | Cart</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body onload="loadCart();">
        <?php
        include "navbar.php";
        ?>
        <div class="mb-3 mt-3 container" >
        <a href="index.php"><button class="btn btn-dark">Back To Home</button></a>
    </div>
        <div id="cartBody">

        </div>
        

        <?php include "footer.php"; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>

<?php

} else {
    header("location: signin.php");
}


?>