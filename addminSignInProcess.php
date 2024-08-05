<?php

session_start();
include("connection.php");

$e = $_POST["e"];
$pw = $_POST["pw"];

if (empty($e)) {
    echo ("Please Provide Your Email Address.");
} elseif (strlen($e) > 100) {
    echo "Your email address should be less than 100 characters.";
} elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    echo "The email address you have entered is invalid.";
} elseif (empty($pw)) {
    echo ("Please Enter Your Password.");
} elseif (strlen($pw) < 5 or strlen($pw) > 20) {
    echo ("Your password must contain 5-20 characters.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $e . "' AND `password` = '" . $pw . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        $d = $rs->fetch_assoc();

        if ($d["usertype_usertypeID"] == 1) {

            echo ("Success");

            $_SESSION["a"] = $d;
        } else {
            echo ("You don't have an addmin account");
        }

    } else {

        echo ("The username and password is invalid");
    }
}
