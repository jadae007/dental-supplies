<?php 
require_once("connect.php");
$group = $_GET['group'];
$type = $_GET['type'];

if($group == "all" && $type == "all"){
  $sql = "SELECT
  i.*,
  t.typeName,
  t.active AS typeActive,
  g.id AS groupId,
  g.groupName,
  g.startLetter,
  g.active AS groupActive
  FROM
  `items` i
  INNER JOIN `types` t ON i.typeId = t.id
  INNER JOIN `groups` g ON t.groupId = g.id
  WHERE itemActive = '1'";
}elseif ($group == "all" && $type != "all") {
  $sql = "SELECT
  i.*,
  t.typeName,
  t.active AS typeActive,
  g.id AS groupId,
  g.groupName,
  g.startLetter,
  g.active AS groupActive
  FROM
  `items` i
  INNER JOIN `types` t ON i.typeId = t.id
  INNER JOIN `groups` g ON t.groupId = g.id
  WHERE i.typeId = '$type' AND itemActive = '1'";
}elseif ($group != "all" && $type == "all") {
  $sql = "SELECT
  i.*,
  t.typeName,
  t.active AS typeActive,
  g.id AS groupId,
  g.groupName,
  g.startLetter,
  g.active AS groupActive
  FROM
  `items` i
  INNER JOIN `types` t ON i.typeId = t.id
  INNER JOIN `groups` g ON t.groupId = g.id
  WHERE g.id = '$group' AND itemActive = '1'";
}else{
  $sql = "SELECT
  i.*,
  t.typeName,
  t.active AS typeActive,
  g.id AS groupId,
  g.groupName,
  g.startLetter,
  g.active AS groupActive
  FROM
  `items` i
  INNER JOIN `types` t ON i.typeId = t.id
  INNER JOIN `groups` g ON t.groupId = g.id
  WHERE g.id = '$group' AND i.typeId = '$type' AND itemActive = '1'";
}

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['itemsObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['itemsObj'] = null ;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>