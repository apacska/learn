<?php
require_once("model/user.php");
require_once("model/other.php");

if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
        if (userCheck($user, $password)) {
            $_SESSION["username"] = $user;
            $_SESSION["userId"] = userId($user);
            redirect();
        } else {
            echo "login error!";
        }
} else require_once("views/login.php");