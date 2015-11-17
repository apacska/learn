<?php
global $db;
require_once("config.php");
if(!isset($db)){
    $config=$_CONFIG['db'];
    $db=mysqli_connect($config['host'],$config['user'],$config['password'],$config['db']);
    mysqli_set_charset($db,$config['charset']);
}
function userQuery($query){
    global $db;
    return mysqli_query($db,$query);
}
function userExists($user){
    $query="SELECT * FROM `user` WHERE `user`.`user` LIKE '$user'";
    $result=userQuery($query);
    if(!$result)return true;
    $rows=mysqli_num_rows($result);
    return $rows>0;
}
function userAdd($userData){
    $user=$userData['user'];
    $password=$userData['password'];
    $password=md5($password);
    if(userExists($user))return false;
    $query="INSERT INTO `user` (`user`,`password`) VALUES ('$user','$password')";
    $result=userQuery($query);
    return $result!=null;
}
function userCheck($user,$password){
    $password=md5($password);
    $query="SELECT * FROM `user` WHERE `user`='$user' AND `password`='$password'";
    $result=userQuery($query);
    $rows=mysqli_num_rows($result);
    return $rows!=0;
}