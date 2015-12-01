<?php
	session_start();
	require_once("views/header.php");
	require_once("model/config.php");
	if(!isset($_POST['page'])) require_once('control/mainpage.php');
	else if($_POST['page']=='login')require_once("control/login.php");
	else if($_POST['page']=='signup')require_once("control/signup.php");
	else if($_POST['page']=='logout')require_once("control/logout.php");
	else if($_POST['page']=='addword')require_once("control/addword.php");
	else if($_POST['page']=='newSession')require_once("control/newSession.php");
?>