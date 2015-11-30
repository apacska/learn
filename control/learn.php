<?php
if(isset($_SESSION["username"]))
{
    require_once('views/learn.php');
}
else require_once("mainpage.php");