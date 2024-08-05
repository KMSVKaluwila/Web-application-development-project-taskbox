<?php

include("connection.php");

$a = $_POST["d"];

if (empty($a)) {
    echo ("Please enter the developer name");
} elseif (strlen($a) > 40) {
    echo ("Your developer name less than 20 charecters");
} else {
    $rs = Database::search("SELECT * from `developer` WHERE `developer_name` = '".$a."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo("your AgeRating is already exists");
    } else {

        Database::iud("INSERT INTO `developer` (developer.`developer_name`) VALUES ('".$a."') ");
        echo("Success");
    }
    
}