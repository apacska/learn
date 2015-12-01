<?php
/**
 * Created by PhpStorm.
 * User: nz
 * Date: 2015-11-25
 * Time: 9:19 PM
 */
session_destroy();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '';
header("Location: http://$host$uri/$extra");