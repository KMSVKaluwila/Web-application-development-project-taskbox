<?php

include("connection.php");

$rs = Database::search("SELECT product.`pro_ID`, product.`pro_name`, SUM(order_iteam.`oi_qty`) AS `tatal_sold` FROM
`order_iteam` INNER JOIN `stock` ON order_iteam.`stock_stock_ID` = stock.`stock_ID`
INNER JOIN product ON stock.`product_pro_ID` = product.`pro_ID` GROUP BY product.`pro_ID`, product.`pro_name`
ORDER BY `tatal_sold` DESC LIMIT 5");

$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i=0; $i < $num; $i++) { 
    # code...
    $d = $rs->fetch_assoc();

    $labels[] = $d["pro_name"];
    $data[] = $d["tatal_sold"];
}

$json = array();
$json["lebals"] = $labels;
$json["data"] = $data;

echo json_encode($json);

?>