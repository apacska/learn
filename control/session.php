<?php
require_once("model/word.php");
require_once("model/other.php");
if (isset($_POST['word1']) && isset($_POST['word2']))
{
    $word1 = $_POST['word1'];
    $word2 = $_POST['word2'];
    $i=$_SESSION['wordId'];
    $wordId=$_SESSION['words'][$i];
    ++$_SESSION['wordId'];
    $dbWord2=wordLang2($wordId);
    if($word2==$dbWord2)
    {
        wordSuccess($wordId);
        if($i<count($_SESSION['words'])-1) require_once "views/session.php";
        else require_once "control/learn.php";
    }
    else
    {
        wordFail($wordId);
        if($i<count($_SESSION['words'])-1) require_once "views/session.php";
        else require_once "control/learn.php";
    }
}
else require_once("views/addword.php");