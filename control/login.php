<?php
require_once("model/user.php");

//if(!isset($_SESSION['username']))require_once("views/login.php");
//else {
    echo 'Request method: '.$_SERVER["REQUEST_METHOD"]."<br>";
    if (isset($_POST['user']) && isset($_POST['password'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        if (userCheck($user, $password)) {
            $_SESSION["username"] = $user;
            var_dump($_SESSION);
            echo "Siker!";
            /*$host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'control/learn.php';
            header("Location: http://$host$uri/$extra");
            exit;*/
        } else {
            echo "login error!";
        }
    } else require_once("views/login.php");
//}