<?php 
require_once("connect.php");
$id=$_GET['id'];
$sql = "SELECT i.*,t.groupId FROM `items` i INNER JOIN `types` t ON i.typeId = t.id WHERE i.id='$id'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
}else{
  $row = null ;
}

print json_encode($row,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>