<?php
require_once("model/word.php");

if (isset($_POST['word1']) && isset($_POST['word2'])) {
    $word1 = $_POST['word1'];
    //$word2 = $_POST['word2'];
    $i=0;
    while($i<count($_SESSION['words']))
    {
        $word2=$_SESSION['lang2'][$i];
        if($word1 == $word2) echo "Helyes!";
        else echo "Helytelen!";
        ++$i;
    }

} else require_once("views/addword.php");