<?php
	session_start();
	//var_dump ($_SESSION);
	ob_start();
	/*ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);*/
	require_once("views/header.php");
	require_once("model/config.php");
	if(!isset($_POST['page'])) require_once('control/mainpage.php');
	else if($_POST['page']=='login')require_once("control/login.php");
	else if($_POST['page']=='signup')require_once("control/signup.php");
	else if($_POST['page']=='logout')require_once("control/logout.php");
	else if($_POST['page']=='addword')require_once("control/addword.php");
	else if($_POST['page']=='newSession')require_once("control/newSession.php");
	else if($_POST['page']=='session')require_once("control/session.php");
	else if($_POST['page']=='stats')require_once("control/stats.php");


	ob_end_flush();