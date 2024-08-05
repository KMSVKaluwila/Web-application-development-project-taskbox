<?php

include("connection.php");
$cartID = $_POST["c"];

Database::iud("DELETE FROM `cart` WHERE cart.`cart_id` = '" . $cartID . "'");

echo "The iterm is deleting successfully.";