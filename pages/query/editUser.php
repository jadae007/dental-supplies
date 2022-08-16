<?php
require("connect.php");
$id = trim($_POST['userId']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$role = trim($_POST['role']);

$sqlCheck = "SELECT * FROM users WHERE username ='$username' AND id != '$id'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck) >0){
  $editResult = array("status"=>false,"message"=>"มีผู้ใช้นี้ในระบบแล้ว!!");
}else{
  $sql = "UPDATE `users` SET `username`='$username',`firstName`='$firstname',`lastName`='$lastname',`email`='$email',`role`='$role' WHERE id = '$id'";
  if(mysqli_query($conn,$sql)){
    $editResult = array("status"=>true,"message"=>"แก้ไขผู้ใช้เรียบร้อยแล้ว");
  }else{
    $editResult = array("status"=>false,"message"=>mysqli_error($conn));
  }
}

print json_encode($editResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
