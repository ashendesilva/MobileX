<?php

include("connection.php");

$productid = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["u"];

// echo ($productid);

if (empty($productid)) {
    echo ("Please Enter Product Name");
}else if (empty($qty)) {
    echo ("Please Enter Qty");
} else if (!is_numeric($qty)) {
    echo ("Only numbers can be entereed for Qty");
} else if (strlen($qty) > 10) {
    echo ("Your Qty Should be less than 10 Characters");
} else if (empty($price)) {
    echo ("Please Enter Price");
} else if (!is_numeric($price)) {
    echo ("Only numbers can be entereed for Price");
} else if (strlen($price) > 10) {
    echo ("Your Price Should be less than 10 Characters");
} else {
    // echo ("Success");

    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '". $productid ."' AND `price` = '". $price ."' ");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        // updat query
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '".$newQty."' WHERE `stock_id` = '". $d["stock_id"] ."' ");
        echo ("Stock Updated Successfully");

    } else{
        // insert query
        Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`) VALUES ('". $price ."','". $qty ."','". $productid ."') ");
        echo ("New Stock Added Successfully");
    }
}

?>
