<?php

session_start();
include("connection.php");

$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM  `order_hitory` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice - taskbox</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body{
                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
                font-family: "Poppins", sans-serif;
            }
        </style>
    </head>

    <body>

        <!-- navbar -->
        <div class="container-fluid navbar d-flex justify-content-center">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="taskboxHome.php">TaskBox Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="buttonPrint();">Print Invoice</a>
                </li>
            </ul>
        </div>
        <!-- navbar -->

        <div class="container mb-4" id="printArea">
            <div class="border border-black p-5 rounded-2">
                <div class="row">
                    <div class="col-6">
                        <h3>Order ID #<?php echo ($d["ohid"]); ?></h3>
                        <h5><?php echo ($d["order_date"]); ?></h5>
                    </div>
                    <div class="col-6 text-end">
                        <h1>I N V O I C E</h1>
                        <h4>Online Store</h4>
                        <h5>0N.45, Karapikkada road,</h5>
                        <h5>Medawachchiya</h5>
                    </div>
                </div>

                <div>
                    <h4><?php echo ($user["fname"]); ?> <?php echo ($user["lname"]); ?></h4>
                    <h4><?php echo ($user["mobile"]); ?></h4>
                    <h5>No.<?php echo ($user["no"]); ?></h5>
                    <h5><?php echo ($user["line_01"]); ?></h5>
                    <h5><?php echo ($user["line_02"]); ?></h5>
                </div>

                <div class="px-5 mt-5">
                    <table class="table table-hover border border-1 border-black">
                        <thead>
                            <tr>
                                <th scope="col">Product name</th>
                                <th scope="col">Platform</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Agerating</th>
                                <th scope="col">Developer</th>
                                <th scope="col">Pblisher</th>
                                <th scope="col">Quantiy</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $rs2 = Database::search("SELECT * FROM `order_iteam` INNER JOIN `stock` ON order_iteam.`stock_stock_ID` = stock.`stock_ID`
                            INNER JOIN `product` ON stock.`product_pro_ID` = product.`pro_ID`
                            INNER JOIN `agerating` ON product.`agerating_age_ID` = agerating.`age_ID`
                            INNER JOIN `developer` ON product.`developer_developer_ID` = developer.`developer_ID`
                            INNER JOIN `genre` ON product.`genre_genre_ID` = genre.`genre_ID`
                            INNER JOIN `platform` ON product.`platform_plat_ID` = platform.`plat_ID`
                            INNER JOIN `publisher` ON product.`publisher_pub_ID` = publisher.`pub_ID`
                            WHERE order_iteam.`order_hitory_ohid` = '" . $orderHistoryId . "' ");

                            $num2 = $rs2->num_rows;
                            for ($i = 0; $i < $num2; $i++) {

                                $d2 = $rs2->fetch_assoc();

                            ?>

                                <tr>
                                    <td><?php echo ($d2["pro_name"]); ?></td>
                                    <td><?php echo ($d2["platform_type"]); ?></td>
                                    <td><?php echo ($d2["genre_typ"]); ?></td>
                                    <td><?php echo ($d2["age"]); ?></td>
                                    <td><?php echo ($d2["developer_name"]); ?></td>
                                    <td><?php echo ($d2["publisher_name"]); ?></td>
                                    <td><?php echo ($d2["oi_qty"]); ?></td>
                                    <td><?php echo ($d2["price"]) * ($d2["oi_qty"]); ?></td>
                                </tr>

                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-4">
                    <h6>Number of items: <span class="text-muted"><?php echo $num2; ?></span></h6>
                    <h6>Delivary fee: <span class="text-muted">500</span></h6>
                    <h5>Net total: <span class="text-primary">LKR <?php echo ($d["amount"]); ?></span></h5>
                </div>


            </div>
        </div>

        <script>
            function buttonPrint() {

                var orginalContainer = document.body.innerHTML;
                var printArea = document.getElementById("printArea").innerHTML;
                var btn = document.getElementById("btnprint");

                document.body.innerHTML = printArea;
                window.print();
                document.body.innerHTML = orginalContainer;
            }
        </script>
    </body>

    </html>

<?php


} else {
    header("Location: index.php");
}


?>