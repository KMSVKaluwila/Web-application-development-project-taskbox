<?php

include("connection.php");
session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H:i:s"); // Corrected datetime format

    Database::iud("INSERT INTO `order_hitory` (`oid`, `order_date`, `amount`, `user_userID`) VALUES
    ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["userID"] . "')");

    $orderHistoryID = Database::$connection->insert_id;

    $rs = Database::search("SELECT * FROM `cart` WHERE cart.`user_userID` = '" . $user["userID"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        //insert order iterms
        $d = $rs->fetch_assoc();

        Database::iud("INSERT INTO `order_iteam` (`oi_qty`, `order_hitory_ohid`, `stock_stock_ID`) VALUES
        ('" . $d["cart_qty"] . "','" . $orderHistoryID . "','" . $d["stock_stock_ID"] . "')");

        $rs2 = Database::search("SELECT * FROM `stock` WHERE stock.`stock_ID` = '" . $d["stock_stock_ID"] . "'");
        $d2 = $rs2->fetch_assoc();

        $newqty = $d2["qut"] - $d["cart_qty"];
        Database::iud("UPDATE `stock` SET stock.`qut` = '" . $newqty . "' WHERE stock.`stock_ID` = '" . $d["stock_stock_ID"] . "'");
    }

    Database::iud("DELETE FROM `cart` WHERE cart.`user_userID` = '" . $user["userID"] . "'");
    // echo "success";

    $order = array();
    $order["res"] = "success";
    $order["order_id"] = $orderHistoryID;

    echo json_encode($order);
}
