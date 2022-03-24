<?php

$dbServer = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hero";

if (!$con = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName)) {
    die("failed to connect");
}
