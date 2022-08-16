<?php
require_once("connect.php");
$role = $_GET['role'];
if($role == 0){
  $sql = "SELECT `id`,`username`,`firstName`,`lastName`,`email`,`role`,`active` FROM `users` ORDER BY `role`";
}else{
  $sql = "SELECT `id`,`username`,`firstName`,`lastName`,`email`,`role`,`active` FROM `users` WHERE `role` >=1 ORDER BY `role`";
}
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['usersObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['usersObj'] = null ;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);