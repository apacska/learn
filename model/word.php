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
    $query="SELECT `id` FROM `word` WHERE `user`=$user ORDER BY `priority` DESC LIMIT $n";
    $result=wordQuery($query);
    if(!$result)return $words;
    while($row=mysqli_fetch_assoc($result)) $words[]=$row['id'];
    return $words;
}
function wordLang1($id){
    $query="SELECT `lang1` FROM `word` WHERE `id`=$id";
    $result=wordQuery($query);
    if(mysqli_num_rows($result)==0)return "";
    $row=mysqli_fetch_assoc($result);
    return $row['lang1'];
}
function wordLang2($id){
    $query="SELECT `lang2` FROM `word` WHERE `id`=$id";
    $result=wordQuery($query);
    if(mysqli_num_rows($result)==0)return "";
    $row=mysqli_fetch_assoc($result);
    return $row['lang2'];
}
function wordFail($id){
    $query="UPDATE `word` SET `priority`=`priority`/2-1 WHERE `id`=$id";
    wordQuery($query);
}
function wordSuccess($id){
    $query="UPDATE `word` SET `priority`=`priority`/2+1 WHERE `id`=$id";
    wordQuery($query);
}
?>