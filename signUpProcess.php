<?php

include("connection.php");

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$m = $_POST["mb"];
$e = $_POST["e"];
$pw = $_POST["pw"];
$gen = $_POST["gen"];

if (empty($fn)) {
    echo "Please enter your first name.";
} elseif (strlen($fn) > 20) {
    echo "Your first name should be less than 20 characters.";
} elseif (empty($ln)) {
    echo "Please enter your last name.";
} elseif (strlen($ln) > 20) {
    echo "Your last name should be less than 20 characters.";
} elseif (empty($m)) {
    echo ("Please enter your mobile number.");
} elseif (strlen($m) != 10) {
    echo ("Your mobile shoud be 10 nimbers");
} elseif (!preg_match("/0[2,7]{1}[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $m)) {
    echo ("The mobile number is invalid");
} elseif (empty($e)) {
    echo "Please provaid your email address.";
} elseif (strlen($e) > 100) {
    echo "Your email address should be less than 100 characters.";
} elseif (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    echo "The email address you have entered is invalid.";
} elseif (empty($pw)) {
    echo "Please enter your password.";
} elseif (strlen($pw) < 5 || strlen($pw) > 45) {
    echo "Your password must be between 5 and 20 characters.";
} elseif ($gen == 'undefined') {
    echo "Please select your gender.";
} else {

    $rs = Database::search("SELECT * FROM taskbox.`user` WHERE user.email = '" . $e . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo "Your email address already exists.";
    } else {
        Database::iud("INSERT INTO `user` (`fname`, `lname`, `mobile`, `email`, `status`, `password`, `gander_ganderID`, `usertype_usertypeID`)
        VALUES ('" . $fn . "', '" . $ln . "', '".$m."', '" . $e . "', '1', '" . $pw . "', '" . $gen . "', '2')");
        echo "Success";
    }
}
