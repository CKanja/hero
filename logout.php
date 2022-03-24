<?php
session_start();

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

header("location: view_unauthorised.php");
die;
