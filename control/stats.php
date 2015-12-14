<?php
require_once("model/word.php");
$words=getWords($_SESSION['userId'],5);
//print_r($words);
var_dump($words);

