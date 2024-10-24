<?php

include "connection.php";

$uid = $_POST["u"];

//echo($uid);

if (empty($uid)) {
    echo ("PLEASE ENTER YOUR USER ID");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$uid."' AND `user_type_id` = '2'" );
    $num = $rs->num_rows;
    //echo ("$num");

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["status"] == 1) {
            
            Database::iud("UPDATE `user` SET `status` = '2' WHERE `id` = '".$uid."'");

            echo ("Deactive");
        }

        if ($d["status"] == 2){

            Database::iud("UPDATE `user` SET `status` = '1' WHERE `id` = '".$uid."'");

            echo ("Active");
        }
    } else {
        echo ("Invalid User Id");
        
    }
    
}


?>