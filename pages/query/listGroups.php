<?php 
require_once("connect.php");
$sql = "SELECT * FROM `groups`";

if(isset($_GET['dropdown']) && $_GET['dropdown'] == "yes"){
  $sql = "SELECT * FROM `groups` WHERE active = 1";
}
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['groupObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['groupObj'] = null ;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>