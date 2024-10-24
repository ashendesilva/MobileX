<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];

$brand = $_POST["b"];
$color = $_POST["co"];
$condition = $_POST["c"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

// echo($maxPrice);


$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}


$q = "SELECT * 
FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `condition` ON `product`.`condition_id` = `condition`.`condition_id`  ";

//search by brand
if ($status == 0 && $brand != 0) {
    //1st time search by brand (Where)
    $q .= "WHERE `brand`.`brand_id` = '" . $brand . "' ";
    $status = 1;
    //2st time search by brand (And)
} elseif ($status != 0 && $brand  != 0) {
    $q .= "AND `brand`.`brand_id` = '" . $brand . "' ";
}

// Search by color

if ($status == 0 && $color != 0) {
    //1st time search by color (Where)
    $q .= "WHERE `color`.`color_id` = '" . $color . "' ";
    $status = 1;
    //2st time search by color (And)
} elseif ($status != 0 && $color  != 0) {
    $q .= "AND `color`.`color_id` = '" . $color . "' ";
}



//search by condition
if ($status == 0 && $condition != 0) {
    //1st time search by condition (Where)
    $q .= "WHERE `condition`.`condition_id` = '" . $condition . "' ";
    $status = 1;
    //2st time search by condition (And)
} elseif ($status != 0 && $condition  != 0) {
    $q .= "AND `condition`.`condition_id` = '" . $condition . "' ";
}

//search by min price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price`>= '" . $minPrice . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND `stock`.`price`>= '" . $minPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}

//SEARCH BY MAX PRICE

if (!empty($maxPrice) && empty($minPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price`<= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND `stock`.`price`<= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}

//SEARCH BY  PRICE range
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";

$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    # code...

?>
    <div class="d-flex flex-column justify-content-center mt-5 align-items-center">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any matches for your search them..</p>

    </div>

    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
        ?>

        <!-- card  -->
        <div class="card mb-4 mt-3 productbox container" style="width: 18rem;">

        <a href="singleProduct.php?s=<?php echo $d["stock_id"]; ?>"><img src="<?php echo $d["path"]; ?>" class="card-img-top" alt="..." style="padding-inline: 15px;   cursor: pointer;"></a>

                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"><?php echo $d["name"] ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="text-align: center;">RS. <?php echo $d["price"] ?></li>
                    <a href="singleProduct.php?s=<?php echo $d["stock_id"]; ?>"  class="nav-link">
                    <li class="list-group-item"><button  class="btn btn-dark d-block" style="margin-inline: auto;">Buy Now</button></li>
                </a>
                </ul>
                <div class="card-body d-flex justify-content-center">
                    <a href="#" class="card-link"><img src="Image/icon/icons8-heart-32.png" alt=""></i></a>
                </div>

            </div>

        <?php
    }

    ?>

<?php
}

?>