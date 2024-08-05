<?php

include("connection.php");

$p = $_POST["p"];

if (empty($p)) {
    echo ("Please enter the platform name");
} elseif (strlen($p) > 20) {
    echo ("Your platform name less than 20 charecters");
} else {
    $rs = Database::search("SELECT * FROM `platform` WHERE `platform_type` = '".$p."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo("your platform name is already exists");
    } else {

        Database::iud("INSERT INTO `platform` (`platform_type`) VALUES ('".$p."') ");
        echo("Success");
    }
    
}