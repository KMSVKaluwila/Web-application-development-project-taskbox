<?php


session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
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

        <!-- Navbar -->
        <?php include("addminNavBar.php"); ?>
        <!-- Navbar -->


        <div class="col-10">

            <h3 class="text-center">P R O D U C T M A N A G M E N T</h3>


            <div class="row mt-5">
                <!-- Platform registation -->
                <div class="col-4 offset-1">
                    <div>
                        <label class="form-label">Platform</label>
                        <input type="text" class="form-control mb-3" id="Platform">
                    </div>

                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary col-12" onclick="PlatformReg();">Platform Register</button>
                    </div>
                </div>
                <!-- Platform registation -->

                <!-- Genre registation -->
                <div class="col-4 offset-1">
                    <div>
                        <label class="form-label">Genre</label>
                        <input type="text" class="form-control mb-3" id="Genre">
                    </div>

                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary col-12" onclick="GenreReg();">Genre Register</button>
                    </div>
                </div>
                <!-- Genre registation -->
            </div>

            <div class="row mt-5">
                <!-- Age Rating registation -->
                <div class="col-4 offset-1">
                    <div>
                        <label class="form-label">Age Rating</label>
                        <input type="text" class="form-control mb-3" id="AgeRating">
                    </div>

                    <div class="d-none" id="msgDiv3">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary col-12" onclick="AgeReg();">Age Rating Register</button>
                    </div>
                </div>
                <!-- Age Rating registation -->

                <!-- Developer registation -->
                <div class="col-4 offset-1">
                    <div>
                        <label class="form-label">Developer</label>
                        <input type="text" class="form-control mb-3" id="Developer">
                    </div>

                    <div class="d-none" id="msgDiv4">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary col-12" onclick="DeveloperReg();">Developer Register</button>
                    </div>
                </div>
                <!-- Developer registation -->
                 
            </div>

            <div class="row mt-5">
                <!-- Publisher registation -->
                <div class="col-4 offset-1">
                    <div>
                        <label class="form-label">Publisher</label>
                        <input type="text" class="form-control mb-3" id="Publisher">
                    </div>

                    <div class="d-none" id="msgDiv5">
                        <div class="alert alert-danger" id="msg5"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary col-12" onclick="PublisherReg();">Publisher Register</button>
                    </div>
                </div>
                <!-- Publisher registation -->

            </div>


        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("Your not a valid Addmin.");
}

?>