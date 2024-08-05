<?php

include "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="sass/animated.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="sweetalert2.all.min.js"></script>
    <title>TackBox Home</title>
    <style>
        body {
            background: #F5F9FF;
        }

        .price-range {
            margin-top: 20px;
        }

        .slider-label {
            display: flex;
            justify-content: space-between;
        }

        .custom-range {
            width: 100%;
        }

        /******** Chrome, Safari, Opera and Edge Chromium styles ********/
        /* slider track */
        input[type="range"]::-webkit-slider-runnable-track {
            background-color: #334155;
            border-radius: 0.5rem;
            height: 0.5rem;
        }

        /* slider thumb */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            /* Override default look */
            appearance: none;
            margin-top: -4px;
            /* Centers thumb on the track */
            background-color: #808080;
            border-radius: 0.5rem;
            height: 1rem;
            width: 1rem;
        }

        input[type="range"]:focus::-webkit-slider-thumb {
            outline: 3px solid #808080;
            outline-offset: 0.125rem;
        }

        .checked {
            color: orange;
        }

        .mostly-customized-scrollbar {
            display: block;
            /* width: 10em; */
            overflow: auto;
            height: 2em;
            /* padding: 1em; */
            /* margin: 1em auto; */
            outline: 2px cornflowerblue;
        }

        /* Demonstrate a "mostly customized" scrollbar
 * (won't be visible otherwise if width/height is specified) */
        .mostly-customized-scrollbar::-webkit-scrollbar {
            width: 5px;
            height: 8px;
            background-color: #334155;
            /* or add it to the track */
        }

        /* Add a thumb */
        .mostly-customized-scrollbar::-webkit-scrollbar-thumb {
            background: #2563eb;
        }

        @media (min-width: 1024px) {
            .sidebar {
                position: fixed;
            }
        }

        .sidebar {
            height: 100%;
            background-color: #ffffff;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
    </style>
</head>

<body onload="loadProduct(0);">

    <!-- navbar home -->
    <?php include("navbarHome.php") ?>
    <!-- navbar home -->

    <div class="container-fluid">
        <div class="row">

            <!-- side-bar -->
            <div class="sidebar col-lg-3 ps-3 mostly-customized-scrollbar">
                <div class="col-12 mt-5 d-flex justify-content-center" style="background-color: #ffffff;">
                    <video class="embed-responsive-item" autoplay loop muted style="width: 200px; height: auto;">
                        <source src="original-d5cd4a918feed72d8e75172af0459d47.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="col-12" style="background-color: #ffffff;">
                    <div class="row">

                        <div class="col-12 ms-auto">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Search..." id="product" onkeyup="searchProduct(0);">
                            </div>
                        </div>

                        <div class="col-12 ms-auto mt-4">
                            <label class="form-label">Platform</label>
                            <select class="form-select" id="Platform">
                                <option value="0">Select Platform</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `platform`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo $d["plat_ID"]; ?>"><?php echo $d["platform_type"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 ms-auto mt-4">
                            <label class="form-label">Genre</label>
                            <select class="form-select" id="Genre">
                                <option value="0">Select Genre</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `genre`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo $d["genre_ID"]; ?>"><?php echo $d["genre_typ"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 ms-auto mt-4">
                            <label class="form-label">Age Rating</label>
                            <select class="form-select" id="Ager">
                                <option value="0">Select Age</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `agerating`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo $d["age_ID"]; ?>"><?php echo $d["age"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 ms-auto mt-4">
                            <label class="form-label">Developer</label>
                            <select class="form-select" id="Developer">
                                <option value="0">Select Developer</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `developer`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo $d["developer_ID"]; ?>"><?php echo $d["developer_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 ms-auto mt-4">
                            <label class="form-label">Publisher</label>
                            <select class="form-select" id="Publisher">
                                <option value="0">Select Publisher</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `publisher`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {
                                    $d = $rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo $d["pub_ID"]; ?>"><?php echo $d["publisher_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>


                        <div class="col-12 ms-auto">
                            <div class="price-range">
                                <form>
                                    <div class="form-group">
                                        <h6 class="mb-4">Price Range</h6>
                                        <div class="slider-label">
                                            <span id="minPrice">0</span>
                                            <span id="currentPrice">50000</span>
                                            <span id="maxPrice">100000</span>
                                        </div>
                                        <input type="range" class="custom-range" id="priceRange" min="0" max="100000" step="1000" value="50000" oninput="updatePrice(this.value)">
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-12 ms-auto mt-5 mb-3 d-flex justify-content-center">
                            <button class="btn btn-primary btn-sm col-8 my-2" onclick="advSearchProduct(0);">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- side-bar -->

            <div class="offset-lg-3 col-lg-9 mt-5">
                <div class="row d-flex mt-5">


                    <!-- load product -->
                    <div class="row">
                        <div class="col-12">
                            <div class="row mt-3 ms-1 justify-content-center" id="pid">

                                <!-- cart -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <script src="script.js"></script>
        <script src="bootstrap.min.js"></script>
</body>

</html>