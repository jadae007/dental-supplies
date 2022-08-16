<?php
session_start();
if(!isset($_SESSION['loginId']) || !isset($_SESSION['role']) || !isset($_SESSION['fullname'])){
  header("Location:index");
}
