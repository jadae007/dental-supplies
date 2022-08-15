<?php 
if(isset($_GET['group']) && $_GET['group'] != "all"){
  $gId = $_GET['group'];
  $groupId = "AND g.id = '$gId'";
}else{
  $groupId = "";
}

require_once("connect.php");
$sql = "SELECT t.id AS typeId , t.typeName,t.active AS typeActive,g.id AS groupId ,g.groupName, g.startLetter,g.active AS groupActive  FROM `types` t 
  INNER JOIN groups g ON t.groupId = g.id
  WHERE g.active = 1 $groupId";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['typeObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['typeObj'] = null ;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>