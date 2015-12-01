<?php
require_once("model/user.php");

if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    if (userCheck($user, $password)) {
        $_SESSION["username"] = $user;
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '';
        header("Location: http://$host$uri/$extra");
    } else {
        echo "login error!";
    }
} else require_once("views/login.php");