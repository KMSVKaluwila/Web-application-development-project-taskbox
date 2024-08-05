<?php

session_start();
include("connection.php");

$em = $_POST["em"];
$pw = $_POST["pw"];
$rm = $_POST["rm"];

if (empty($em)) {
    echo ("Please enter your user email.");
} elseif (empty($pw)) {
    echo ("Please enter your password");
} elseif (strlen($pw) < 5 or strlen($pw) > 45) {
    echo ("Your password must cantain 5-45 charectares ");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $em . "' AND `password` = '" . $pw . "' ");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc(); 

    if ($num == 1) {
        # home page
        if ($d["status"] == 1) {

            echo ("Success");

            $_SESSION["u"] = $d;

            if ($rm == true) {

                setcookie("useremail", $em, time() + (60 * 60 * 24 * 365));
                setcookie("password", $pw, time() + (60 * 60 * 24 * 365));
            } else {
                setcookie("useremail", "", -1);
                setcookie("password", "", -1);
            }
        } else {

            echo ("Inactive user");
        }
    } else {
        echo ("Invalid your user email or password.");
    }

    // if ($rs) {
    //     $num = $rs->num_rows;
    //     if ($num > 0) {
    //         $d = $rs->fetch_assoc();
    //         // Debugging step
    //         var_dump($d); // This will display the content of $d
    //         // Use $d['column_name'] to access individual elements
    //     } else {
    //         echo "No user found.";
    //     }
    // } else {
    //     echo "Query failed.";
    // }
}
