<?php

include "connection.php";

$color = $_POST["cl"];
// echo($color);


if (empty($color)) {
    echo ("Please Enter Your Color");
} else if (strlen($color) > 20){
    echo ("Your Color Should be less than 20 Characters");
} else{
    // echo ("Success");

    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '".$color."'");
    $num = $rs->num_rows;
    //echo($num);

    if ($num > 0) {
        echo ("Your Color is Already Exist");
    } else {
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$color."')");
        echo("Success");
    }
}

?>