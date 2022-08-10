<?php
session_start();
if(!isset($_SESSION['loginId'])){
  header("Location:index");
}else{
  $s_cid = $_SESSION['cid'];
  $s_token = $_SESSION['token'];
}

