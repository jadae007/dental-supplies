<?php 
require_once("connect.php");
$id = $_POST['id'];
$key = "dentalsuppliesknh";
$password = "1234";
$hash_login_password = hash_hmac('sha256', $password, $key);

$sql = "UPDATE users SET `password`='$hash_login_password' WHERE id = '$id'";
if(mysqli_query($conn,$sql)){
  $resetPasswordResult = array("status"=>true,"message"=>"รีเซ็ตรหัสผ่านเรียบร้อยแล้ว");
}else{
  $resetPasswordResult = array("status"=>false,"message"=>mysqli_error($conn));
}
print json_encode($resetPasswordResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>