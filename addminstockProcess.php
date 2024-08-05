<?php


include("connection.php");

$selectp = $_POST["selectP"];
$qut = $_POST["qut"];
$price = $_POST["unit"];

// echo $selectp;
// echo $qut;
// echo $unit;

if (empty($selectp)) {
    echo "Please select your product.";
}elseif (empty($qut)) {
    echo "Please enter product quantity.";
}elseif (!is_numeric($qut)) {
    echo "Onliy number can be enter for the quantity.";
}elseif (empty($price)) {
    echo "Please enter the unit price.";
}elseif (!is_numeric($price)) {
    echo "Onliy number can be enter for the product unit price.";
}else {
    // echo "Success";
    $rs = Database::search("SELECT * FROM `stock` WHERE `stock_ID` = '".$selectp."' AND `price` = '".$price."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();
    
    if ($num == 1) {
        $newQty = $d["qty"] + $qut;
        Database::iud("UPDATE `stock` SET stock.`qut` = '".$newQty."' WHERE stock.`product_pro_ID` = '".$d["id"]."'");
        echo("Stock updated successfuly.");
    }else {
        Database::iud("INSERT INTO `stock` (`price`,`qut`,`product_pro_ID`) VALUES ('".$price."','".$qut."','".$selectp."')");
        echo("NEW STOCK ADDED SUCCESSFULY");
    }
}

?>