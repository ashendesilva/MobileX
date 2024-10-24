<?php

include "connection.php";

$pname = $_POST["pname"];
$brand  = $_POST["brand"];
$color  = $_POST["color"];
$condition  = $_POST["condition"];
$desc  = $_POST["desc"];




if (empty(($pname))) {
    echo ("Please Enter The Product Name");
} else if ($brand == "0") {
    echo ("Please Select a Brand");
} else if (empty($color)) {
    echo "Please Enter Color";
} else if (empty($condition)) {
    echo "Please Enter Condition";
} else if (empty($desc)) {
    echo "Please Enter Description";
} else {
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $path = "Resources/productImg/". uniqid(). ".png";
        move_uploaded_file($image["tmp_name"], $path);

        
        $rs = Database::search("SELECT * FROM `product` WHERE `name`='". $pname. "'");
        $num = $rs->num_rows;

        if ($num > 0) {

            echo ("Product has been already Registered");
        } else {
            Database::iud("INSERT INTO `product`(`name`,`description`,`path`,`brand_id`,
            `color_id`,`condition_id`) 
            VALUES('" . $pname . "','" . $desc . "','" . $path . "','" . $brand . "',
            '" . $color . "','" . $condition . "')");

            echo ("Success");
        }
    } else {
        echo ("Please Select a Product Image");
    }
}
