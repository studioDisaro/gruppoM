<?php
function openCon(){
  $paramConn = require "connection_param.php";
  $conn = new mysqli(
    $paramConn['mysql_host'],
    $paramConn['mysql_user'],
    $paramConn['mysql_password']
  );
  if ($conn->connect_error) {
    return($conn->connect_error);
  }else{
    return $conn;
  }
}
//CONNECTION DB
function openConDB(){
  $paramConn = require 'connection_param.php';
  $conn = new mysqli(
    $paramConn['mysql_host'],
    $paramConn['mysql_user'],
    $paramConn['mysql_password'],
    $paramConn['mysql_db']
  );

  if ($conn->connect_error) {
    return($conn->connect_error);
  }else{
    return $conn;
  }
}
?>