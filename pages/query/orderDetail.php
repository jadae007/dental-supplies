<?php
$id = $_GET['orderId'];
require_once('connect.php');
$sql = "SELECT
od.*,
i.itemName
FROM
`order_detail` od
INNER JOIN `items` i ON od.itemId = i.id
WHERE
od.orderId = '$id'";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['detailObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['detailObj'] = null ;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
