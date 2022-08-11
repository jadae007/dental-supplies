<?php 
require_once("connect.php");
$id = $_POST['id'];
if($_POST['status'] == "true"){
  $active = 1;
}else{
  $active = 0;
}
$sql = "UPDATE `groups` SET `active`='$active' WHERE id = '$id'";
if(mysqli_query($conn,$sql)){
  echo json_encode(array("status"=>true,"message"=>"อัพเดทสถานะเรียบร้อยแล้ว"),JSON_UNESCAPED_UNICODE);
}else{
  echo json_encode(array("status"=>false,"message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);
?>