<?php

session_start();
include("connection.php");

if (isset($_SESSION["a"])) {

    $rs =  Database::search("SELECT * FROM `stock` INNER JOIN `product` ON stock.`product_pro_ID` = product.`pro_ID` ORDER BY stock.`stock_ID` ASC");
    $num = $rs->num_rows;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Repot</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
        </style>
    </head>

    <body>
        <div class="container">
            <a href="addminRepot.php">
                <img src="img\logo\pngegg.png" height="90px" class="mt-3">
            </a>
        </div>

        <div class="container-fluid">
            <div class="mt-1" id="printArea">
                <h3 class="text-center">Stock Repot</h3>

                <div class="mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Stock ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quatity</th>
                                <th scope="col">Unit Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo ($d["stock_ID"]); ?></td>
                                    <td><?php echo ($d["pro_name"]); ?></td>
                                    <td><?php echo ($d["qut"]); ?></td>
                                    <td><?php echo ($d["price"]); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container d-flex justify-content-center my-5" id="div1">
                <button class="btn btn-primary col-4" onclick="buttonPrint();">Print</button>
            </div>
        </div>




        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("Your not valid addmin");
}

?>