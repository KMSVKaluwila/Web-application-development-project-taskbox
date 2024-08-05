<?php

include("connection.php");

$g = $_POST["g"];

if (empty($g)) {
    echo ("Please enter the genre name");
} elseif (strlen($g) > 20) {
    echo ("Your genre name less than 20 charecters");
} else {
    $rs = Database::search("SELECT * FROM `genre` WHERE `genre_typ` = '".$g."'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo("your genre name is already exists");
    } else {

        Database::iud("INSERT INTO `genre` (`genre_typ`) VALUES ('".$g."') ");
        echo("Success");
    }
    
}