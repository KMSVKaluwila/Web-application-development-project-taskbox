<?php

session_start();

if (isset($_SESSION["a"])) {


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashbord</title>
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

    <body class="addminbody" onload="loadchart();">

        <!-- NarBar -->
        <?php include("addminNavBar.php"); ?>
        <!-- NarBar -->

        <div style="width: 500px;">
            <h2 class="text-center">The most sold product</h2>
        </div>


        <!-- chart js -->
        <div style="width: 500px;">
            <canvas id="myChart"></canvas>
        </div>
        <!-- chart js -->





        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>

    </html>

<?PHP

} else {
    echo ("Your not a valide Addmin");
}


?>