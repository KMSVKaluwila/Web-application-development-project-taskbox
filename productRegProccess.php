<?php

include("connection.php");

$name = $_POST["n"];
$p = $_POST["p"];
$g = $_POST["g"];
$a = $_POST["a"];
$deve = $_POST["deve"];
$pub = $_POST["pub"];
$dis = $_POST["dis"];


if (empty($name)) {
    echo ("Please enter your product name");
} elseif (strlen($name) > 100) {
    echo ("The product name shoud be less than 30 charectarse");
} elseif (empty($p)) {
    echo ("Please enter the Platform");
} elseif (empty($g)) {
    echo ("Please enter the Genre");
} elseif (empty($a)) {
    echo ("Please enter the Agerating");
} elseif (empty($deve)) {
    echo ("Please enter the Developer");
} elseif (empty($pub)) {
    echo ("Please enter the Publisher");
} elseif (strlen($dis) > 200) {
    echo ("Your discription shoud be less than 200 charecters.");
} elseif (empty($_FILES["img"])) {
    echo ("Please upload your product image.");
} else {
    //echo("success");

    $rs = Database::search("SELECT * FROM `product` WHERE product.`pro_name` = '" . $name . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("The product is already exist");
    } else {

        $path = "resources/productimage//" . uniqid() . ".png";
        move_uploaded_file($_FILES["img"]["tmp_name"], $path);

        Database::iud("INSERT INTO `product` (`pro_name`, `description`, `path`, `publisher_pub_ID`, `platform_plat_ID`, `genre_genre_ID`, `developer_developer_ID`, `agerating_age_ID`)
        VALUES ('" . $name . "', '" . $dis . "', '" . $path . "', '" . $pub . "', '" . $p . "', '" . $g . "', '" . $deve . "', '" . $a . "')");

        echo ("Success");
    }
}
