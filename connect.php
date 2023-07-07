<?php

$servername = "localhost:3307";
$user = "root";
$pass = "";
$db = "pwaprojekt";

$dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());

if ($dbc) {
    echo "Connected successfully";
}

?>