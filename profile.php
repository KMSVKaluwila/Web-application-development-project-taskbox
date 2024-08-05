<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($user)) {

    $rs = Database::search("SELECT * FROM `user` WHERE user.`userID` = '" . $user["userID"] . "'");
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Profile</title>

        <style>
            body {
                overflow: hidden;
                /* Hide scrollbars */
                display: flex;
                justify-content: center;
                height: 100vh;
                align-items: center;
            }
        </style>

    </head>

    <body>
        <!-- homeNavBar -->
        <?php include("navbarHome.php"); ?>
        <!-- homeNavBar -->

        <div class="container">
            <div class="row">

                <div class="col-4 m-auto">
                    <div class="d-flex justify-content-center">
                        <img src="<?php

                                    if (!empty($d["img_path"])) {
                                        echo ($d["img_path"]);
                                    } else {
                                        echo ("img\logo\pngwing.com (1).png");
                                    }

                                    ?>" height="150px" id="i">
                    </div>
                    <div class="mt-2">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control" placeholder="no file chosen" id="imageuploader">
                    </div>
                    <div class="my-2">
                        <button class="btn btn-warning col-12" onclick="uploadimage();">Upload Profile Image</button>
                    </div>

                    <div class="my-5">
                        <button class="btn btn-primary col-12" onclick="updatedata();">Upload Profile Details</button>
                    </div>
                </div>


                <div class="row col-8 my-5">
                    <div class="offset-2 col-10 mt-4">
                        <h3 class="text-center mb-5">Profile Details</h3>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label class="form-label">First name</label>
                                <input type="text" class="form-control" value="<?php echo ($d["fname"]); ?>" id="fname">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last name</label>
                                <input type="text" class="form-control" value="<?php echo ($d["lname"]); ?>" id="lname">
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo ($d["email"]); ?>" id="email">
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Mobile</label>
                            <input type="email" class="form-control" value="<?php echo ($d["mobile"]); ?>" id="mobile">
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" value="<?php echo ($d["password"]); ?>" id="password">
                            </div>
                        </div>
                        <h5 class="mt-4">Shipping Address</h5>
                        <div class="row mt-3">
                            <div class="col-3">
                                <label class="form-label">NO :</label>
                                <input type="text" class="form-control" value="<?php echo ($d["no"]); ?>" id="no">
                            </div>
                            <div class="col-9">
                                <label class="form-label">Line 01</label>
                                <input type="text" class="form-control" value="<?php echo ($d["line_01"]); ?>" id="add01">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label">Line 02</label>
                            <input type="text" class="form-control" value="<?php echo ($d["line_02"]); ?>" id="add02">
                        </div>
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
    header("Location: index.php");
}

?>