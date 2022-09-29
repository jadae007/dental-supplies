<?php
require_once('connect.php');
$startDate = $_GET['startDate'];
$endDate = $_GET['endDate'];
$sql = "SELECT
od.orderId,
COUNT(od.itemId) AS itemCount,
o.orderDate,
o.userId,
u.firstName,
u.lastName
FROM
`order_detail` od
INNER JOIN orders o ON o.id = od.orderId
INNER JOIN users u ON o.userId = u.id
WHERE o.orderDate BETWEEN '$startDate' AND '$endDate'
GROUP BY
od.orderId";

$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  $rows['historyObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['historyObj'] = null ;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);