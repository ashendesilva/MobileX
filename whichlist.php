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

    <body onload="loadWhichlist();">
        <?php
        include "navbar.php";
        ?>
        <div class="mb-3 mt-3 container" >
        <a href="index.php"><button class="btn btn-dark">Back To Home</button></a>
    </div>
        


    <div style="display: flex; align-items: center; width: 700px;" class="cartbox p-3 mt-3 container">
            <div class="me-5"><img src="Resources/productImg/6660cfcfc997c.png" height="150px" alt=""></div>
            <div class="p-3 me-5">
                <div>
                    <h3>Iphone 11</h3>
                    <p class="mb-0">Color: White</p>
                    <p class="mb0">Condition: New</p>

                    <p style="font-size: 27px;"> LKR. 11233</p>
                </div>

            </div>

            

         



            <div class="d-flex align-items-center gap-2 me-5 ms-5">
                <button onclick="removeCart('<?php echo $d['cart_id'] ?>');"><img src="Image/icon/icons8-delete-32.png" alt=""></button>
            </div>
            <div class="d-flex align-items-center gap-2 me-5 ms-5">
                <button onclick="removeCart('<?php echo $d['cart_id'] ?>');"><img src="Image/icon/icons8-cart-32 (1).png" alt=""></button>
            </div>
        </div>





        <!-- cart items -->

    <?php
    }

    ?>





    <!-- checkout -->
    <hr>
    

    <div style="display: flex; align-items: center; width: 380px;" class="cartbox p-3 mt-3 container mb-5">
      
            <div>
                <a href="index.php"><button class="btn btn-dark" style="width: 350px;">Continue To Shoping</button></a>
            </div>
            
       
    </div>

    </div>
        

        <?php include "footer.php"; ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>

<?php



?>