<?php
session_start();

if (isset($_SESSION["e"])) {
    $_SESSION["e"] = null;
    session_destroy();
    echo "Sign Out Success";
}
?>
