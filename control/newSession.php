<?php
require_once("model/word.php");

if (isset($_POST['numberOfWords'])) {
    $numberOfWords = $_POST['numberOfWords'];
    $userId = $_SESSION['userId'];
    $words = wordGet($userId,$numberOfWords);
    $_SESSION['words'] = $words;
    var_dump($_SESSION['words']);
    var_dump($_POST);
} else require_once("views/newSession.php");