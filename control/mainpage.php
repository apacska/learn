<?php
if(!isset($_SESSION['username']))
{
    require_once("login.php");
    require_once("signup.php");
}
else require_once("learn.php");