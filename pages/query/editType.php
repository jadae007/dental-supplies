<?php
require("connect.php");
$id = trim($_POST['typeId']);
$groupId = trim($_POST['modalSelectGroup']);
$typeName = trim($_POST['typeName']);

$sqlCheck = "SELECT * FROM types WHERE typeName ='$typeName' AND id != '$id'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck) >0){
  $editResult = array("status"=>false,"message"=>"มีประเภทนี้ในระบบแล้ว!!");
}else{
  $sql = "UPDATE `types` SET typeName='$typeName',groupId ='$groupId' WHERE id = '$id'";
  if(mysqli_query($conn,$sql)){
    $editResult = array("status"=>true,"message"=>"แก้ไขประเภทเวชภัณฑ์เรียบร้อยแล้ว");
  }else{
    $editResult = array("status"=>false,"message"=>mysqli_error($conn));
  }
}

print json_encode($editResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
