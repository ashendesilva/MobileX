<?php

include "connection.php";

$cat = $_POST["c"];
//echo ($cat);

if (empty($cat)) {
    echo ("Please Enter Your Category");
} else if (strlen($cat) > 20){
    echo ("Your Category Should be less than 20 Characters");
} else{
    // echo ("Success");

    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '".$cat."'");
    $num = $rs->num_rows;
    //echo($num);

    if ($num > 0) {
        echo ("Your Category is Already Exist");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('".$cat."')");
        echo("Success");
    }
}


?>