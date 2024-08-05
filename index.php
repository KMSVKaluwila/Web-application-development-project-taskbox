<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In / Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="sass/animated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    /* Media query for large screens */
    @media (min-width: 1200px) {
        body {
            overflow: hidden;
        }
    }

    body {
        overflow-x: hidden;
        /* Hide horizontal scrollbar */
    }
</style>

<body>

    <!-- notifications -->
    <div class="notifications"></div>
    <!-- notifications -->

    <!-- signINBOX -->
    <div class="left-side animate-bottom" id="signINBox">

        <div class="row justify-content-center p-5">

            <h2 class="col-12 text-center mt-4"><?php include("taskboxlogo.php") ?></h2>
            <p class="col-12 text-center">T A S K B O X C O M M U N I T Y</p>

            <div class="form-group col-12 col-md-8 mt-4">
                <input type="email" class="form-control" id="email" placeholder="Your email address">
            </div>

            <div class="form-group col-12 col-md-8 mt-4">
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>

            <div class="form-group col-12 col-md-8 mt-4">
                <label><input type="checkbox" id="RememberMe"> Remember me</label>
            </div>

            <div class="col-12 col-md-8 d-flex justify-content-center mt-4">
                <button class="btn btn-primary col-12" onclick="signIn();">Log in</button>
            </div>

            <div class="row mt-4">
                <p class="mt-2 col-12 text-center"><a href="forgetPassword.php">Forgot password?</a></p>
                <p class="mt-3 col-12 text-center">Don’t have an account? <a href="" onclick="changeView(); return false;">Sign up</a></p>
            </div>

        </div>
    </div>

    <!-- signUPBOX -->
    <div class="left-side d-none animate-bottom" id="signUPBox">

        <div class="row col-lg-10 mt-3 px-lg-4 p-4">

            <h2 class="col-12 text-center mt-2">Create New Account</h2>
            <p class="col-12 text-center">W E L C O M E T O T A S K B O X</p>

            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname">
            </div>

            <div class="form-group col-12 col-md-6 mt-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname">
            </div>

            <div class="form-group col-12 mt-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" placeholder="Enter your mobaile number">
            </div>

            <div class="form-group col-12 mt-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email2" placeholder="Enter your email">
            </div>

            <div class="form-group col-12 mt-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password2" placeholder="Enter your password">
            </div>

            <div class="col-12 mt-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="1">
                    <label class="form-check-label">
                        Male
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="2">
                    <label class="form-check-label">
                        Female
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="3">
                    <label class="form-check-label">
                        Other
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center mt-4">
                <button class="btn btn-primary col-lg-8" onclick="createAccount();">Create Account</button>
            </div>

            <p class="mt-3 col-12 text-center">Already have an account? <a href="" onclick="changeView(); return false;">Sign in</a></p>

        </div>
    </div>



    <div class="right-side d-none d-md-block">
        <video class="video-bg" autoplay muted loop>
            <source src="original-d5cd4a918feed72d8e75172af0459d47.mp4" type="video/mp4">
        </video>
        <a href="addminSignIn.php"><button class="round" title="Addmin login">&#9822;</button></a>
    </div>


    <script src="script.js"></script>
</body>

</html>