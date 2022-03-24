<?php

function check_login($con)
{
    // check if user if set
    if (isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];

        // check from the database
        $query = "SELECT *FROM users WHERE user_id = '$id' LIMIT 1";

        // read from the database/check if reslts is positive

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {


            // collect the data if available in db

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    // redirect to login
    header("location: login.php");
    die;
}

function random_num($length)
{
    $text = "";
    if ($length > 5) {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}
