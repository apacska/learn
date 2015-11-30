<?php

require_once("/model/user.php");

if(!isset($_SESSION['username'])) require_once("views/signup.php");
else {
    if (isset($_POST['user']) && isset($_POST['password'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $userData = [
            'user' => $user,
            'password' => $password
        ];
        if (userAdd($userData)) {
            echo "Success!";
        } else {
            echo "userAdd error!";
        }
    } else echo "Please fill all of the fields!";
}