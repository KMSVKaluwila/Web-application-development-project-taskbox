<?php

include("connection.php");

$cartId = $_POST["c"];
$newQty = $_POST["q"];

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON cart.`stock_stock_ID` = stock.`stock_ID`
WHERE cart.`cart_id` = '".$cartId."'");

$num = $rs->num_rows;
if ($num > 0) {

    $d = $rs->fetch_assoc();

    if ($d["qut"] >= $newQty) {
        Database::iud("UPDATE `cart` SET cart.`cart_qty` = '".$newQty."' WHERE cart.`cart_id` = '".$cartId."'");
        echo "success";
    } else {
        echo "Your product qauntitiy exceeded";
    }
    
} else {
    echo "cart iterm not found";
}