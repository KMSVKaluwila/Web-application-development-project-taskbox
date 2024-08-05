<?php

session_start();
include("connection.php");

if (isset($_SESSION["a"])) {

    $rs =  Database::search("SELECT * FROM `product` INNER JOIN `agerating` ON product.`agerating_age_ID` = agerating.`age_ID`
INNER JOIN `developer` ON product.`developer_developer_ID` = developer.`developer_ID`
INNER JOIN `genre` ON product.`genre_genre_ID` = genre.`genre_ID`
INNER JOIN `platform` ON product.`platform_plat_ID` = platform.`plat_ID`
INNER JOIN `publisher` ON product.`publisher_pub_ID` = publisher.`pub_ID` ORDER BY product.`pro_ID` ASC");

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
                <h3 class="text-center">Product Repot</h3>

                <div class="mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Platform</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Age Rating</th>
                                <th scope="col">Developer</th>
                                <th scope="col">Publisher</th>
                                <th scope="col">Disription</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo ($d["pro_ID"]); ?></td>
                                    <td><?php echo ($d["pro_name"]); ?></td>
                                    <td><?php echo ($d["platform_type"]); ?></td>
                                    <td><?php echo ($d["genre_typ"]); ?></td>
                                    <td><?php echo ($d["age"]); ?></td>
                                    <td><?php echo ($d["developer_name"]); ?></td>
                                    <td><?php echo ($d["publisher_name"]); ?></td>
                                    <td style="width: 20%;"><?php echo ($d["description"]); ?></td>
                                    <td><img src="<?php echo ($d["path"]); ?>" height="100"></td>
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