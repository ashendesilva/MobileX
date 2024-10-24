<?php

session_start();

?>

<?php

include("connection.php");


$rs = Database::search("SELECT * FROM `product` INNER JOIN `stock` ON  `product`.`id` =`stock`.`product_id`");
$num = $rs->num_rows;




$brand = Database::search("SELECT * FROM `brand`");
$brandnum = $brand->num_rows;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile X | Product</title>
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



    <!-- <br /><br> -->
    <!-- product view  -->


    <!-- <hr class="container"> -->

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







    </div>



    




    <!-- paginetion -->

    <div class="d-flex justify-content-center mt-5 mb-3">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">2</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- paginetion -->



    <?php include "footer.php"; ?>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>