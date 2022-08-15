<?php
require("connect.php");
$typeName = trim($_POST['typeName']);
$groupId = trim($_POST['modalSelectGroup']);

$sqlCheck = "SELECT * FROM types WHERE typeName ='$typeName'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck) >0){
  $addResult = array("status"=>false,"message"=>"มีกลุ่มหรืออักษรเริ่มต้นนี้ในระบบแล้ว!!");
}else{
  $sql = "INSERT INTO `types`(`typeName`, `groupId`) VALUES ('$typeName','$groupId')";
  if(mysqli_query($conn,$sql)){
    $addResult = array("status"=>true,"message"=>"เพิ่มกลุ่มเวชภัณฑ์เรียบร้อยแล้ว");
  }else{
    $addResult = array("status"=>false,"message"=>mysqli_error($conn));
  }
}

print json_encode($addResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
