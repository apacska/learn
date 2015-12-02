<?php

require_once("/model/user.php");
require_once("model/other.php");

if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $userData = [
        'user' => $user,
        'password' => $password
    ];
    if (userAdd($userData)) {
        $_SESSION["username"] = $user;
        redirect();
    } else {
        echo "userAdd error!";
    }
} else require_once("views/signup.php");