<?php

include("connection.php");
session_start();
$user = $_SESSION["u"];

$stockList = array();
$qtyList = array();

// if (isset($user["line_01"])) {
//     echo $user["line_01"];
// }else {
//     echo "not found";
// }

if (empty($user["no"] & $user["line_01"] & $user["line_02"])) {

    echo("Pleace enter your dilivary address in your profile");

} else {
    if (isset($_POST["cart"]) && $_POST["cart"] == "true") {
        //From cart
    
        $rs = Database::search("SELECT * FROM `cart` WHERE cart.`user_userID` = '" . $user['userID'] . "'");
        $num = $rs->num_rows;
    
        for ($i = 0; $i < $num; $i++) {
    
            $d = $rs->fetch_assoc();
            $stockList[] = $d["stock_stock_ID"];
            $qtyList[] = $d["cart_qty"];
        }
    
    } else {
        //"From buy now";
        $stockList[] = $_POST["stockID"];
        $qtyList[] = $_POST["qty"];
    }
    
    $merchant_id = "1227629";
    $merchant_secret = "MzA5MDIyOTM5NzUwNzY0MDQyNTMwNTYwOTExNTYxMTc2NDc1ODAx";
    $items = "";
    $NetTotal = 0;
    $currency = "LKR";
    $order_id = uniqid();
    
    for ($i = 0; $i < sizeof($stockList); $i++) {
    
        $rs2 = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON stock.`product_pro_ID` = product.`pro_ID` WHERE stock.`stock_ID` = '" . $stockList[$i] . "'");
    
        $d2 = $rs2->fetch_assoc();
        $stockQty = $d2["qut"];
    
        if ($stockQty >= $qtyList[$i]) {
            $items .= $d2["pro_name"];
    
            if ($i != sizeof($stockList) - 1) {
                $items .= ", ";
            }
    
            $NetTotal += (intval($d2["price"]) * intval($qtyList[$i]));
        } else {
            echo "Product has on available stock.";
        }
    }
    
    // delivary fee
    $NetTotal += 400;
    
    $hash = strtoupper(
        md5(
            $merchant_id .
                $order_id .
                number_format($NetTotal, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
        )
    );
    
    // // Fetch user details from the database to ensure all necessary fields are populated
    // $rs = Database::search("SELECT * FROM online_db.`user` WHERE user.id = '" . $user["id"] . "'");
    // $userData = $rs->fetch_assoc();
    
    $payment = array();
    $payment["sandbox"] = true;
    $payment["merchant_id"] = $merchant_id;
    $payment["first_name"] = $user["fname"];
    $payment["last_name"] = $user["lname"];
    $payment["email "] = $user["email"];
    $payment["phone"] = $user["mobile"];
    $payment["address"] = $user["no"] . ", " . $user["line_01"];
    $payment["city"] = $user["line_02"];
    $payment["country"] = "Sri Lanka";
    $payment["order_id"] = $order_id;
    $payment["items"] = $items;
    $payment["currency"] = $currency;
    $payment["amount"] = number_format($NetTotal, 2, '.', '');
    $payment["hash"] = $hash;
    $payment["return_url"] = "";
    $payment["cancel_url"] = "";
    $payment["notify_url "] = "";
    
    echo json_encode($payment);
    
}