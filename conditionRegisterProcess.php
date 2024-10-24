<?php

include "connection.php";

$condition = $_POST["c"];
// echo($condition);


if (empty($condition)) {
    echo ("Please Enter Your Condition");
} else if (strlen($condition) > 20){
    echo ("Your Condition Should be less than 20 Characters");
} else{
    // echo ("Success");

    $rs = Database::search("SELECT * FROM `condition` WHERE `condition_name` = '".$condition."'");
    $num = $rs->num_rows;
    //echo($num);

    if ($num > 0) {
        echo ("Your Condition is Already Exist");
    } else {
        Database::iud("INSERT INTO `condition` (`condition_name`) VALUES ('".$condition."')");
        echo("Success");
    }
}

?>