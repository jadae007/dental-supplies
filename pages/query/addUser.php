<?php
require_once("connect.php");
$username = mysqli_escape_string($conn,trim($_POST['username']));
$password = mysqli_escape_string($conn,trim($_POST['password']));
$confirmPassword = mysqli_escape_string($conn,trim($_POST['confirmPassword']));
$email = mysqli_escape_string($conn,trim($_POST['email']));
$firstname = mysqli_escape_string($conn,trim($_POST['firstname']));
$lastname = mysqli_escape_string($conn,trim($_POST['lastname']));
$role = mysqli_escape_string($conn,trim($_POST['role']));
if($password == $confirmPassword){
  $key = "dentalsuppliesknh";
  $hash_login_password = hash_hmac('sha256', $password, $key);
  $sqlCheck = "SELECT * FROM `users` WHERE username ='$username'";
  $resultCheck = mysqli_query($conn,$sqlCheck);
  if(mysqli_num_rows($resultCheck) >0){
    $addResult = array("status"=>false,"message"=>"มีผู้ใช้นี้ในระบบแล้ว!!");
  }else{
    $sql = "INSERT INTO `users`(`username`, `password`, `firstName`, `lastName`, `email`, `role`, `active`) VALUES 
    ('$username','$hash_login_password','$firstname','$lastname','$email','$role','1')";
    if(mysqli_query($conn,$sql)){
      $addResult = array("status"=>true,"message"=>"เพิ่มผู้ใช้เรียบร้อยแล้ว");
    }else{
      $addResult = array("status"=>false,"message"=>mysqli_error($conn));
    }
  }
}else{
  $addResult = array("status"=>false,"message"=>"password ไม่ถูกต้อง!!");
}

print json_encode($addResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>