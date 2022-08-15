<?php
require("connect.php");
$id = trim($_POST['groupId']);
$groupName = trim($_POST['groupName']);
$startLetter = trim($_POST['startLetter']);

$sqlCheck = "SELECT * FROM groups WHERE groupName ='$groupName'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck) >0){
  $editResult = array("status"=>false,"message"=>"มีกลุ่มนี้ในระบบแล้ว!!");
}else{
  $sql = "UPDATE `groups` SET `groupName`='$groupName' WHERE id = '$id'";
  if(mysqli_query($conn,$sql)){
    $editResult = array("status"=>true,"message"=>"แก้ไขกลุ่มเวชภัณฑ์เรียบร้อยแล้ว");
  }else{
    $editResult = array("status"=>false,"message"=>mysqli_error($conn));
  }
}

print json_encode($editResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
