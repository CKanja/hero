<?php

session_start();

include("connection.php");
include("functions.php");

// check if users has used clicked on post button
// user SERVER to check
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];


    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //read from the database

        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";

        // get results

        $result = mysqli_query($con, $query);

        if ($result) {

            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header('location: view.php');
                    die;
                }
            }
        }
        echo "Wrong username or password";
    } else {
        echo "please enter some valid information";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>LogIn</title>
</head>

<body>

    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid #aaa;
            width: 100%;

        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: cornflowerblue;
            border: none;
        }

        #box {
            background-color: aquamarine;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color:white">Login</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">SignUp</a><br><br>

        </form>



    </div>



</body>

</html>