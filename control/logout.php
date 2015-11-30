<?php
/**
 * Created by PhpStorm.
 * User: nz
 * Date: 2015-11-25
 * Time: 9:19 PM
 */
unset($_SESSION);
unset($_POST);
if(!isset($_SESSION["username"]))
{
    require_once("views/login.php");
    require_once("views/signup.php");
}