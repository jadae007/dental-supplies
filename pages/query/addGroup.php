<?php
require("connect.php");
$groupName = trim($_POST['groupName']);
$startLetter = trim($_POST['startLetter']);

$sqlCheck = "SELECT * FROM groups WHERE groupName ='$groupName' OR startLetter = '$startLetter'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck) >0){
  $addResult = array("status"=>false,"message"=>"มีกลุ่มหรืออักษรเริ่มต้นนี้ในระบบแล้ว!!");
}else{
  $sql = "INSERT INTO `groups`(`groupName`, `startLetter`) VALUES ('$groupName','$startLetter')";
  if(mysqli_query($conn,$sql)){
    $addResult = array("status"=>true,"message"=>"เพิ่มกลุ่มเวชภัณฑ์เรียบร้อยแล้ว");
  }else{
    $addResult = array("status"=>false,"message"=>mysqli_error($conn));
  }
}

print json_encode($addResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
