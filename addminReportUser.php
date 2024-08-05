<?php

session_start();
include("connection.php");

if (isset($_SESSION["a"])) {

    $rs =  Database::search("SELECT * FROM `user` INNER JOIN `usertype` ON user.usertype_usertypeID = usertype.usertypeID INNER JOIN `gander` ON user.gander_ganderID = gander.ganderID ORDER BY `userID` ASC");

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
                <h3 class="text-center">User Repot</h3>

                <div class="mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobail No</th>
                                <th scope="col">Gander</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();

                            ?>

                                <tr>
                                    <td><?php echo ($d["userID"]); ?></td>
                                    <td><?php echo ($d["fname"]); ?></td>
                                    <td><?php echo ($d["lname"]); ?></td>
                                    <td><?php echo ($d["email"]); ?></td>
                                    <td><?php echo ($d["mobile"]); ?></td>
                                    <td><?php echo ($d["ganderType"]); ?></td>
                                    <td><?php echo ($d["userType"]); ?></td>
                                    <td>
                                        <?php

                                        if ($d["status"] == 1) {
                                            echo '<span class="text-primary">Active</span>';
                                        } else {
                                            echo '<span class="text-danger">Inactive</span>';
                                        }

                                        ?>
                                    </td>
                                </tr>

                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="container d-flex justify-content-center mt-5" id="div1">
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