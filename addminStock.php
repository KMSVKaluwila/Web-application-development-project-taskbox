<?php

session_start();
if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock - Admin panel</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">

        <style>
            body {
                display: flex;
                justify-content: center;
                height: 100vh;
                align-items: center;

                /* transform: scale(0.95);  */
                /* Change the scale to minimize the page */
                /* transform-origin: 50% 0%; */
                /* Ensure the scale transformation starts from the top-left corner */
            }
        </style>
    </head>

    <body class="addminbody">

        <!-- NarBar -->
        <?php include("addminNavBar.php"); ?>
        <!-- NarBar -->
        <!-- connection -->
        <?php include("connection.php"); ?>
        <!-- connection -->

        <div class="container mt-5">
            <div class="row">
                <h3 class="text-center my-4">S T O C K M A N A G E M E N</h3>


                <div class="col-6 mt-3">
                    <h5 class="text-center">Product Regisration</h5>
                    <div class="mt-4">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="row">
                        <div class="mt-3 col-6">
                            <label class="form-label">Platform</label>
                            <select class="form-select" id="Platform">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `platform`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["plat_ID"]); ?>"><?php echo ($d["platform_type"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label class="form-label">Genre</label>
                            <select class="form-select" id="Genre">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `genre`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["genre_ID"]); ?>"><?php echo ($d["genre_typ"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label class="form-label">Age Rating</label>
                            <select class="form-select" id="Age">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `agerating`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["age_ID"]); ?>"><?php echo ($d["age"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-6">
                            <label class="form-label">Developer</label>
                            <select class="form-select" id="Developer">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `developer`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["developer_ID"]); ?>"><?php echo ($d["developer_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mt-3 col-12">
                            <label class="form-label">Publisher</label>
                            <select class="form-select" id="Publisher">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `publisher`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($d["pub_ID"]); ?>"><?php echo ($d["publisher_name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Discription</label>
                        <textarea class="form-control" rows="5" id="dis"></textarea>
                    </div>



                </div>

                <div class="col-6 mt-3">

                    <div class="mt-5">
                        <label class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="img">
                    </div>

                    <div class="mt-3 mb-5">
                        <button class="btn btn-primary col-12" onclick="regProduct();">Product Regisration</button>
                    </div>

                    <h5 class="text-center">Stock Update</h5>

                    <div class="mt-3">
                        <label class="form-label">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($d["pro_ID"]); ?>"><?php echo ($d["pro_name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="unitprice">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary col-12" onclick="updateStock();">Update</button>
                    </div>

                </div>

            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php


} else {
    echo ("Your not a valide Addmin");
}

?>