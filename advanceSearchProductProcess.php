<?php

include("connection.php");

$pageno = 0;

$page = $_POST["pg"];
$platform = $_POST["p"];
$genre = $_POST["g"];
$age = $_POST["age"];
$deve = $_POST["deve"];
$pub = $_POST["pub"];
$minPrice = 0;
$maxPrice = $_POST["max"];

$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON stock.`product_pro_ID` = product.`pro_ID`
INNER JOIN `agerating` ON product.`agerating_age_ID` = agerating.`age_ID` INNER JOIN `developer`
ON product.`developer_developer_ID` = developer.`developer_ID` INNER JOIN `genre` ON product.`genre_genre_ID` = genre.`genre_ID`
INNER JOIN `platform` ON product.`platform_plat_ID` = platform.`plat_ID`
INNER JOIN `publisher` ON product.`publisher_pub_ID` = publisher.`pub_ID` ";



//search by platform
if ($status == 0 && $platform != 0) {
    //1st time search by platform (Where)
    $q .= "WHERE platform.`plat_ID` = '" . $platform . "'";
    $status = 1;
    //2st time search by platform (And)
} elseif ($status != 0 && $platform  != 0) {
    $q .= "AND platform.`plat_ID` = '" . $color . "'";
}

// Search by genre
if ($status == 0 && $genre != 0) {
    //1st time search by genre (Where)
    $q .= "WHERE genre.`genre_ID` = '" . $genre . "'";
    $status = 1;
    //2st time search by genre (And)
} elseif ($status != 0 && $genre != 0) {
    $q .= "AND genre.`genre_ID` = '" . $genre . "'";
}

//search by agerating
if ($status == 0 && $age != 0) {
    //1st time search by agerating (Where)
    $q .= "WHERE agerating.`age_ID` = '" . $age . "'";
    $status = 1;
    //2st time search by agerating (And)
} elseif ($status != 0 && $age != 0) {
    $q .= "AND agerating.`age_ID` = '" . $age . "'";
}

//search by developer
if ($status == 0 && $deve != 0) {
    //1st time search by size (Where)
    $q .= "WHERE developer.`developer_ID` = '" . $deve . "'";
    $status = 1;
    //2st time search by size (And)
} elseif ($status != 0 && $deve  != 0) {
    $q .= "AND developer.`developer_ID` = '" . $deve . "'";
}

//search by publisher
if ($status == 0 && $pub != 0) {
    //1st time search by publisher (Where)
    $q .= "WHERE publisher.`pub_ID` = '" . $pub . "'";
    $status = 1;
    //2st time search by publisher (And)
} elseif ($status != 0 && $pub != 0) {
    $q .= "AND publisher.`pub_ID` = '" . $pub . "'";
}

//search by min price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE stock.`price` >= '" . $minPrice . "' ORDER BY stock.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND stock.`price` >= '" . $minPrice . "' ORDER BY stock.`price` ASC";
    }
}

//SEARCH BY MAX PRICE
if (!empty($maxPrice) && empty($minPrice)) {
    if ($status == 0) {
        $q .= "WHERE stock.`price` <= '" . $maxPrice . "' ORDER BY stock.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND stock.`price` <= '" . $maxPrice . "' ORDER BY stock.`price` ASC";
    }
}

//SEARCH BY PRICE range
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE stock.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY stock.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND stock.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY stock.`price` ASC";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";

$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {

?>
    <div class="d-flex flex-column justify-content-center mt-5 align-items-center">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any matches for your search them..</p>

    </div>

    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>

        <!-- card 1 -->
        <div class="col-6 col-lg-3 my-3">
            <div class="card h-100" style="width: 15rem;">
                <a href="singleProductView.php?s=<?php echo ($d["stock_ID"]); ?>"><img class="card-img-top" src="<?php echo ($d["path"]); ?>"></a>
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title"><?php echo ($d["pro_name"]); ?></h6>
                    <p class="card-text">LKR: <?php echo ($d["price"]); ?></p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-center">
                            <a href="singleProductView.php?s=<?php echo ($d["stock_ID"]); ?>"><button class="btn btn-primary">View Product</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    ?>

    <!-- pagination  -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                    <?php

                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                <?php
                    }
                }

                ?>





                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="advSearchProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
    </div>

<?php
}
