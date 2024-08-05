<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sass/animated.css">
    <link rel="stylesheet" href="sass/lodered.css">
    <title>Addmin Sign In</title>
    <style>
        .signINBOX {
            background-color: #ffffff;
        }

        body {
            background-color: #F5F9FF;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }
    </style>
</head>

<body onload="myFunction();">
    
    <!-- loadsppiner -->
    <?php include("loadspping.php") ?>
    <!-- loadsppiner -->

    <!-- notifications -->
    <div class="notifications"></div>
    <!-- notifications -->

    <div class="container" id="myDiv">
        <div class="row d-flex justify-content-center">
            <h5 class="text-center mb-4">T A S K B O X A D M I N</h5>
            <!-- signINBOX -->
            <div class="signINBOX col-lg-5 border border-1 rounded rounded-2 py-5 animate-bottom">
                <div class="row justify-content-center">

                    <div class="col-12">
                        <h3 class="text-center mt-4"><?php include("taskboxlogo.php") ?></h3>
                    </div>

                    <div class="form-group col-10 mt-4">
                        <input type="email" class="form-control" id="email" placeholder="Your email address">
                    </div>

                    <div class="form-group col-10 mt-4">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                    <div class="form-group col-10 mt-4">
                        <label><input type="checkbox" id="RememberMe"> Remember me</label>
                    </div>

                    <div class="col-8 d-flex justify-content-center mt-4">
                        <button class="btn btn-primary col-6" onclick="addminlogIn();">Log in</button>
                    </div>

                </div>
            </div>

        </div>
    </div>



    <a href="index.php"><button class="round">&#9822;</button></a>


    <script src="script.js"></script>
</body>

</html>