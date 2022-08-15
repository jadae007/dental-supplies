<?php
require_once("connect.php");

$sql = "SELECT id,username,firstName,lastName,email,role,active FROM users";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['usersObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['usersObj'] = null ;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);