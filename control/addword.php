<?php
require_once("model/word.php");
require_once("model/other.php");

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
        redirect();
    } else {
        echo "addword error!".mysqli_error();
    }
} else require_once("views/addword.php");