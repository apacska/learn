<?php
require_once "config.php";
if(!isset($db)){
    $config=$_CONFIG['db'];
    $db=mysqli_connect($config['host'],$config['user'],$config['password'],$config['db']);
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
function wordAdd($wordData){
    $lang1=$wordData['lang1'];
    $lang2=$wordData['lang2'];
    $user=$wordData['user'];
    $query="INSERT INTO `word` (user,lang1,lang2) VALUES ($user,'$lang1','$lang2')";
    return wordQuery($query)!=false;
}
function wordGet($user,$n=30){
    $words=[];
    $query="SELECT `id` FROM `word` WHERE `user`=$user LIMIT $n ORDER BY `priority` DESC";
    $result=wordQuery($query);
    if(!$result)return $words;
    while($row=mysql_fetch_assoc($result)) $words[]=$row['id'];
    return $words;
}
function wordCheck($lang1,$lang2){
    $query="SELECT * FROM `word` WHERE `lang1`='$lang1' AND lang2='$lang2'";
    $result=wordQuery($query);
    if(!$result)return false;
    $rows=mysqli_num_rows($result);
    return $rows>0; 
}
?>