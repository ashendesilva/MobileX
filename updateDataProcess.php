<?php
include "connection.php";
session_start();
$user = $_SESSION["e"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$uname = $_POST["u"];
$mobile = $_POST["m"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];
$city = $_POST["c"];
$pcode = $_POST["p"];

// echo ($pcode);


// Validation checks
if (empty($fname)) {
    echo ("Please Enter Your First Name");
} else if (strlen($fname) > 20) {
    echo ("Your First Name Should be less than 20 Characters");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} else if (strlen($lname) > 20) {
    echo ("Your Last Name Should be less than 20 Characters");
} else if (empty($uname)) {
    echo ("Please Enter Your Username");
} else if (strlen($uname) > 20) {
    echo ("Your Username Should be less than 20 Characters");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile");
} else if (strlen($mobile) != 10) {
    echo ("Your mobile Number must contain 10 Characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your Mobile Number is Invalid");
} else if (empty($line1)){
    echo ("Please Enter Your Address Line 1");
} elseif (strlen($line1) > 50){
    echo ("Your Address Line 1 Should be less than 50 Characters");
} else if (empty($line2)){
    echo ("Please Enter Your Address Line 2");
} elseif (strlen($line2) > 50){
    echo ("Your Address Line 2 Should be less than 50 Characters");
} elseif (empty($city)){ 
    echo ("Please Enter Your City");
} elseif (strlen($city) > 20){ 
    echo ("Your City Should be less than 20 Characters");
} elseif (empty($pcode)){ 
    echo ("Please Enter Your Postal Code");
} else{

    // Update the database
    Database::iud("UPDATE `user` SET `fname` ='".$fname."',`lname` ='".$lname."',`username` ='".$uname."',`mobile` ='".$mobile."',
    `line_1` ='".$line1."',`line_2` ='".$line2."',`city` ='".$city."',`p_code` ='".$pcode."' WHERE `id` = '".$user["id"]."'");

    // Fetch the updated user data
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

    // Update the session with the new data
    $_SESSION["e"] = $d;
    echo("Success"); 
}

?> 