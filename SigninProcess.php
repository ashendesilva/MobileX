<?php

session_start();
include "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

// echo($email);

if (empty($email)) {
    echo("Please Enter Your Email");
} else if(empty($password)){
    echo("Please Enter Your Password");
} else{
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '". $email ."' 
    AND `password` = '". $password ."'");

    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();


    if ($num == 1) {

        if ($d["status"] == 1) {
            echo("Success");

            $_SESSION["e"] = $d;

            if ($rememberme == "true") {
                //set cookie

                setcookie("email",$email, time()+(60*60*24*365));
                setcookie("password",$password, time()+(60*60*24*365));

            } else {
                //Destroy cookie

                setcookie("email", "", -1);
                setcookie("password", "", -1);


            }
            

        } else {
            echo("Inactive User");
        }
        
        
    } else {
        echo("Invalid Email OR Password");
    }
    
}


?>