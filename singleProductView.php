<?php

include("connection.php");
$stockID = $_GET['s'];

if (isset($stockID)) {

    $q = "SELECT * FROM `stock` INNER JOIN `product` ON stock.`product_pro_ID` = product.`pro_ID`
INNER JOIN `agerating` ON product.`agerating_age_ID` = agerating.`age_ID` INNER JOIN `developer`
ON product.`developer_developer_ID` = developer.`developer_ID` INNER JOIN `genre` ON product.`genre_genre_ID` = genre.`genre_ID`
INNER JOIN `platform` ON product.`platform_plat_ID` = platform.`plat_ID`
INNER JOIN `publisher` ON product.`publisher_pub_ID` = publisher.`pub_ID` WHERE stock.`stock_ID` = '" . $stockID . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <title>Online Store</title>
    </head>

    <body class="singleProductViewBody">
        <!-- home-navbar -->
        <?php include("navbarHome.php") ?>
        <!-- home-navbar -->

        <div class="row col-8 shadow p-4 bg-body-tertiary rounded-2 m-auto">
            <div class="col-6">
                <img src="<?php echo ($d["path"]) ?>" width="300px" class="rounded rounded-2">
            </div>
            <div class="col-6">
                <h2 class="mt-3 text-info-emphasis"><?php echo ($d["pro_name"]) ?></h2>
                <h6 class="mt-3">Genre: <?php echo ($d["genre_typ"]) ?></h6>
                <h6 class="mt-3">Platform: <?php echo ($d["platform_type"]) ?></h6>
                <h6 class="mt-3">Developer: <?php echo ($d["developer_name"]) ?></h6>
                <h6 class="mt-3">Publisher: <?php echo ($d["publisher_name"]) ?></h6>
                <h6 class="mt-3">Age Rating: <?php echo ($d["age"]) ?></h6>
                <p class="mt-3"><?php echo ($d["description"]) ?></p>
                <div class="row mt-5">
                    <div class="col-2">
                        <input type="text" placeholder="Qty" class="form-control" id="qty">
                    </div>
                    <div class="col-6 mt-2">
                        <h6 class="text-info-emphasis">Available Quantity : <?php echo ($d["qut"]) ?></h6>
                    </div>
                    <h5 class="mt-3">price : <?php echo ($d["price"]) ?></h5>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary col-6" onclick="addtoCart('<?php echo ($d['stock_ID']) ?>');">Add to cart</button>
                        <button class="btn btn-warning col-6 ms-2" onclick="buyNow('<?php echo ($d['stock_ID']) ?>');">Buy now</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
}


?>