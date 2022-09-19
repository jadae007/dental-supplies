<?php
require('connect.php');
$date = date("Y-m-d");
$data = $_POST['data'];
$userId = $data[0]['userId'];
$id = [];
$quantity = [];
$count = 0;

foreach ($data as $key => $value) {
 array_push($id,$value['id']);
 array_push($quantity,$value['quantity']);
}
$sqlInsertOrder = "INSERT INTO `orders`(`orderDate`, `userId`) VALUES ('$date','$userId ')";
if(mysqli_query($conn,$sqlInsertOrder)){
 $sqlCheckLastOrder = "SELECT id FROM `orders` ORDER BY `orders`.`id` DESC LIMIT 1";
 $resultCheckLastOrder = mysqli_query($conn,$sqlCheckLastOrder);
 $rowLastOrder = mysqli_fetch_array($resultCheckLastOrder,MYSQLI_ASSOC);
 $rowLastOrder = $rowLastOrder['id'];
 foreach ($id as $index => $value) {
  $sqlCheck = "SELECT id,itemName,amount FROM items WHERE itemActive ='1' AND id ='$value'";
  $result = mysqli_query($conn,$sqlCheck);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $rowId=$row['id'];
  $rowAmount = $row['amount'];
  $totalAmount = $rowAmount-$quantity[$index];
  if($totalAmount>=0){
    $sql = "UPDATE items SET `amount`=$totalAmount WHERE `id`='$rowId'";
    if(mysqli_query($conn,$sql)){
      $quantity2 = $quantity[$index];
      $sqlInsertOrderDetail = "INSERT INTO `order_detail`(`orderId`, `itemId`, `quantity`) VALUES ('$rowLastOrder','$rowId','$quantity2')";
      if(mysqli_query($conn,$sqlInsertOrderDetail)){
        $count++;
      }
    }
  }
}
}

$cutResult = array("status"=>true,"message"=>"เบิกเรียบร้อยแล้ว ".$count." รายการ");
print json_encode($cutResult,JSON_UNESCAPED_UNICODE);

mysqli_close($conn);