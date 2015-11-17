<?php
require_once "config.php";
if(!isset($db)){
    $config=$_CONFIG['db'];
    $db=mysqli($config['host'],$config['user'],$config['password'],$config['db']);
    mysqli_set_charset($db,$config['charset']);
}
function wordQuery($query){
    global $db;
    return mysqli_query($db,$query);
}
function wordExists($lang1,$lang2){
    $query="SELECT * FROM `word` WHERE `lang1`='$lang1' AND `lang2`='$lang2'";
    $result=wordQuery($query);    
    if(!$result)return true;
    $rows=mysqli_num_rows($result);
    return $rows>0;
}
function wordAdd($lang1,$lang2){
    if(wordExists($lang1,$lang2))return;
    $query="INSERT INTO `word` (lang1,lang2) VALUES ('$lang1','$lang2')";
    return wordQuery($query)!=false;
}
function wordCheck($lang1,$lang2){
    $query="SELECT * FROM `word` WHERE `lang1`='$lang1' AND lang2='$lang2'";
    $result=wordQuery($query);
    if(!$result)return false;
    $rows=mysqli_num_rows($result);
    return $rows>0; 
}
?>