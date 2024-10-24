<?php

session_start();

?>

<?php

include("connection.php");


$rs = Database::search("SELECT * FROM `product` INNER JOIN `stock` ON  `product`.`id` =`stock`.`product_id` ORDER BY `stock`.price ASC LIMIT 8");
$num = $rs->num_rows;




$brand = Database::search("SELECT * FROM `brand`");
$brandnum = $brand->num_rows;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile X | Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="container-fluid ">
    <?php
    include "navbar.php";

    ?>
    <?php
    include "navbar2.php";

    ?>

    <div style="display: flex; flex-wrap: wrap" id="pid" class="productview container">

    </div>

    <hr class="container">

    <div class="d-flex container">

        <div style="width: 40vw; padding-right: 40px;">

            <table class="table ">
                <thead>
                    <th class="border-bottom">Brands</th>
                </thead>
                <tbody style="cursor: pointer;">
                    <tr>
                        <?php



                        for ($i = 0; $i < $brandnum; $i++) {

                            $bd = $brand->fetch_assoc();
                            if ($bd["brand_name"] == "Apple") {
                        ?>
                    <tr>

                        <td href="#apple">
                            <?php echo $bd["brand_name"]; ?>

                        </td>
                        </a>

                    </tr>

                <?php
                            } else {
                ?>
                    <tr>
                        <td>
                            <?php echo $bd["brand_name"]; ?>

                        </td>

                    </tr>
            <?php
                            }
                        }

            ?>




            </tr>

                </tbody>

            </table>
        </div>

        <!-- carousel -->
        <div style="width: 60vw; ">

            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Resources/carousel/curcel1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Resources/carousel/carosel2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Resources/carousel/carsel3.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- carousel -->


    </div>

    <br /><br>
    <!-- product view  -->
    <div class="mb-2 container">
        <h2>Products</h2>
    </div>

    <hr class="container">

    <div class="productview container">
        <?php

        for ($i = 0; $i < $num; $i++) {

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






    <br /><br>


    <div class="mb-2 container">
        <h2>Apple</h2>
    </div>

    <hr class="container">

    <?php

    $apple_rs = Database::search("SELECT * FROM `product` INNER JOIN `stock` ON `product`.`id` = `stock`.`product_id` INNER JOIN 
                                `brand` ON `brand`.`brand_id`= `product`.`brand_id` WHERE `brand_name`='Apple' ORDER BY `stock`.`price` DESC LIMIT 4");

    $apple_num = $apple_rs->num_rows;

    ?>

    <div class="productview container">

        <?php

        for ($a = 0; $a < $apple_num; $a++) {

            $ap = $apple_rs->fetch_assoc();

        ?>


            <div class="card mb-4 mt-3 productbox" style="width: 18rem;">

                <a href="singleProduct.php?s=<?php echo $ap["stock_id"]; ?>"><img src="<?php echo $ap["path"]; ?>" class="card-img-top" alt="..." style="padding-inline: 15px;   cursor: pointer;"></a>

                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"><?php echo $ap["name"] ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="text-align: center;">RS. <?php echo $ap["price"] ?></li>
                    <a href="singleProduct.php?s=<?php echo $ap["stock_id"]; ?>" class="nav-link">
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



    <br /><br>


    <div class="mb-2 container">
        <h2>Samsung</h2>
    </div>

    <hr class="container">

    <?php

    $apple_rs = Database::search("SELECT * FROM `product` INNER JOIN `stock` ON `product`.`id` = `stock`.`product_id` INNER JOIN 
                                `brand` ON `brand`.`brand_id`= `product`.`brand_id` WHERE `brand_name`='Samsung' LIMIT 4");

    $apple_num = $apple_rs->num_rows;

    ?>

    <div class="productview container" id="apple">

        <?php

        for ($a = 0; $a < $apple_num; $a++) {

            $ap = $apple_rs->fetch_assoc();

        ?>


            <div class="card mb-4 mt-3 productbox" style="width: 18rem;">

                <a href="singleProduct.php?s=<?php echo $ap["stock_id"]; ?>"><img src="<?php echo $ap["path"]; ?>" class="card-img-top" alt="..." style="padding-inline: 15px;   cursor: pointer;"></a>

                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"><?php echo $ap["name"] ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="text-align: center;">RS. <?php echo $ap["price"] ?></li>
                    <a href="singleProduct.php?s=<?php echo $ap["stock_id"]; ?>" class="nav-link">
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







    <?php include "footer.php"; ?>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>