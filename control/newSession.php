<?php
require_once("model/word.php");

if (isset($_POST['numberOfWords'])) {
    $numberOfWords = $_POST['numberOfWords'];
    $userId = $_SESSION['userId'];
    $words = wordGet($userId,$numberOfWords);
    $_SESSION['words'] = $words;
    $i=0;
    $lang1=[];
    $lang2=[];
    while($i<count($_SESSION['words']))
    {
        $wordId = $_SESSION['words'][$i];
        $lang1[$i] = wordLang1($wordId);
        ++$i;
    }
    $_SESSION['lang1']=$lang1;
    $_SESSION['wordId']=0;
    require_once('views/session.php');
} else require_once("views/newSession.php");