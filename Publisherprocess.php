<?php

include("connection.php");

$a = $_POST["p"];

if (empty($a)) {
    echo ("Please enter the AgeRating");
} elseif (strlen($a) > 20) {
    echo ("Your AgeRating less than 20 charecters");
} else {
    $rs = Database::search("SELECT * from `publisher` WHERE publisher.`publisher_name` = '".$a."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo("your AgeRating is already exists");
    } else {

        Database::iud("INSERT INTO `publisher` (`publisher_name`) VALUES ('".$a."') ");
        echo("Success");
    }
    
}