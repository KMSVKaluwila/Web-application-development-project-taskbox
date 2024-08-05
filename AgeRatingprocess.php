<?php

include("connection.php");

$a = $_POST["a"];

if (empty($a)) {
    echo ("Please enter the AgeRating");
} elseif (strlen($a) > 20) {
    echo ("Your AgeRating less than 20 charecters");
} else {
    $rs = Database::search("SELECT * from `agerating` WHERE agerating.`age` = '".$a."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo("your AgeRating is already exists");
    } else {

        Database::iud("INSERT INTO `agerating` (agerating.`age`) VALUES ('".$a."') ");
        echo("Success");
    }
    
}