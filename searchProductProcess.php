<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];
// echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = 
`product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;
// echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
// echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

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
        <div class="card mb-4 mt-3 productbox " style="width: 18rem;">

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
