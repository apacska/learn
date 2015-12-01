<?php
require_once("model/word.php");

if (isset($_POST['word1']) && isset($_POST['word2'])) {
    $word1 = $_POST['word1'];
    $word2 = $_POST['word2'];
    $userId = $_SESSION['userId'];
    $wordData =[
        'lang1' => $word1,
        'lang2' => $word2,
        'user' => $userId
    ];
    if (wordAdd($wordData)) {
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '';
        header("Location: http://$host$uri/$extra");
    } else {
        echo "addword error!";
    }
} else require_once("views/addword.php");