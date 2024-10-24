<?php

include "connection.php";
$stockId = $_GET["s"];

// echo ($stock_Id);

if (isset($stockId)) {

    $q = "SELECT * 
FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `condition` ON `product`.`condition_id` = `condition`.`condition_id` 
WHERE `stock`.`stock_id`='" . $stockId . "'";

    $rs = Database::search($q);
    $pr = $rs->num_rows;
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single Product View</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    </head>

    <body class="container-fluid">
        <?php
        include "navbar.php";

        ?>
         <div class="mb-2 mt-4 container" >
        <a href="index.php"><button class="btn btn-dark">Back To Home</button></a>
        </div>
        <div class="singleproduct container mt-5">

            <div>

                <div class="">
                    <img src="<?php echo $d["path"]; ?>" class="border" height="400px" alt="img">
                </div>

                <!-- <div class="row mt-3 mb-3 d-flex justify-content-center">
                <div class="row">
                    <div class="d-flex offs">
                        <img src="Image/productImg/iPhone-15-Black.jpg" class="border " width="120px" alt="img">
                        <img src="Image/productImg/iPhone-15-Black.jpg" class="border " width="120px" alt="img">
                    </div>
                </div>




            </div> -->


            </div>

            <div>
                <div class="">

                    <h2 class="fw-bold"><?php echo $d["name"]; ?></h2>
                    <hr>
                    <h4 class="mb-3" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;">Price: <?php echo $d["price"]; ?></h4>
                    <div>
                        <h5>
                            <p>Description: <?php echo $d["description"]; ?></p>

                        </h5>
                    </div>
                    <div>
                        <h5>
                            <p>Color: <?php echo $d["color_name"]; ?></p>

                        </h5>
                    </div>
                    <div>
                        <h5>
                            <p>Condition: <?php echo $d["condition_name"]; ?></p>

                        </h5>
                    </div>

                    <hr>


                    <div class="d-flex mt-3 ">
                        <div class="me-4">
                            <input type="number" style="width: 100px;" placeholder="Quentity" id="qty" />
                        </div>
                        <div>
                            <h6 class="text-danger">Available Quantity: <?php echo $d["qty"] ?></h6>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn" onclick="buyNow('<?php echo $d['stock_id'] ?>');" style="margin-inline: auto; background-color: #0F094F; color: white;">Buy Now</button>
                    </div>

                    <div class="card-body d-flex mt-4">
                        <button class="me-5" onclick="addtoCart('<?php echo $d['stock_id'] ?>');"><img src="Image/icon/icons8-cart-32.png" alt=""></button>
                        <button><img src="Image/icon/icons8-heart-32.png" alt=""></button>
                    </div>



                </div>
            </div>






        </div>


        <hr class="container">

        <div class="mb-2 mt-5 container">
            <h2>Products</h2>
        </div>

        <hr class="container">

        <div class="productview container" >

        <?php
        
$rs = Database::search("SELECT * FROM `product` INNER JOIN `stock` ON  `product`.`id` =`stock`.`product_id` ORDER BY `stock`.price DESC LIMIT 4");
$num3 = $rs->num_rows;
        
        ?>
        <?php

        for ($i = 0; $i < $num3; $i++) {

            $d = $rs->fetch_assoc();

        ?>


            <div class="card mb-4 mt-3 productbox" style="width: 18rem;">

                <a href="singleProduct.php?s=<?php echo $d["stock_id"]; ?>"><img src="<?php echo $d["path"]; ?>" class="card-img-top" alt="..." style="padding-inline: 15px;   cursor: pointer;"></a>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"><?php echo $d["name"] ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="text-align: center;">RS. <?php echo $d["price"] ?></li>
                    <a href="singleProduct.php?s=<?php echo $d["stock_id"]; ?>" class="nav-link">
                        <li class="list-group-item"><button class="btn btn-dark d-block" style="margin-inline: auto;">Buy Now</button></li>
                    </a>

                </ul>
                <div class="card-body d-flex justify-content-center">

                    <a href="#" class="card-link"><img src="Image/icon/icons8-heart-32.png" alt=""></i></a>
                </div>

            </div>

        <?php
        }

        ?>
    </div>


        <?php
        include "footer.php";
        ?>


        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="script.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>



<?php
} else {
    header("location: index.php");
}

?>