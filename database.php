<?php
$server='localhost';  //127.0.0.1
$database='database';
$user='admin';
$password='@123a456#';

try{
    $connect= new PDO("mysql:host=$server;dbname=$database;$user;$password");
}catch(Exception $ex){
    echo $ex -> getMessage();
}
?>