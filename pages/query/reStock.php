<?php
require_once('connect.php');
$itemId = $_POST['modalItemId'];
$quantity = $_POST['quantity'];
$userId = $_POST['userId'];
$sqlCheck = "SELECT id,amount FROM items WHERE id = '$itemId'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck)>0){
  $row = mysqli_fetch_array($resultCheck,MYSQLI_ASSOC);
  $currentAmount = $row['amount'];
  $newAmount =  $currentAmount + $quantity;
  $sqlRestock = "UPDATE items SET amount='$newAmount' WHERE id = '$itemId'";
  if(mysqli_query($conn,$sqlRestock)){
    $sqlInsert = "INSERT INTO `restock`(
       `itemId`, `quantity`, `userId`, `restockDate`
      ) VALUES (
      '$itemId','$quantity','$userId',NOW()
      )";
    if(mysqli_query($conn,$sqlInsert)){
      $restockResult = array("status"=>true,"message"=>"เติมสต็อกเรียบร้อยแล้ว");
    }else{
      $restockResult =  array("status"=>false,"message"=>mysqli_error($conn));
    }
  }else{
    $restockResult =  array("status"=>false,"message"=>mysqli_error($conn));
  }
}else{
  $restockResult = array("status"=>false,"message"=>"ไม่พบเวชภัณฑ์นี้ในระบบ");
}

print json_encode($restockResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);