<?php
require('connect.php');
$id = trim($_POST['supplyId']);
$productBarcode = trim($_POST['productBarcode']);
$itemName = trim($_POST['itemName']);
$groupId = trim($_POST['modalSelectGroup']);
$typeId = trim($_POST['modalSelectType']);
$itemDetail = trim($_POST['itemDetail']);
$itemBrand = trim($_POST['itemBrand']);
$sellerCompany = trim($_POST['sellerCompany']);
$unitCount = trim($_POST['unitCount']);
$price = trim($_POST['price']);
$lowerLimit = trim($_POST['lowerLimit']);
$upperLimit = trim($_POST['upperLimit']);
$storageLocation = trim($_POST['storageLocation']);
$amount = trim($_POST['amount']);
$expireDate = trim($_POST['expireDate']);
$expireNotice = trim($_POST['expireNotice']);
$sqlCheck = "SELECT * FROM items WHERE id = '$id'";
$resultCheck  = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck) ==1){
  $sql = "UPDATE
    `items`
  SET
    `productBarcode` = '$productBarcode',
    `itemName` = '$itemName',
    `typeId` = '$typeId',
    `itemBrand` = '$itemBrand',
    `itemDetail` = '$itemDetail',
    `sellerCompany` = '$sellerCompany',
    `unitCount` = '$unitCount',
    `price` = '$price',
    `lowerLimit` = '$lowerLimit',
    `upperLimit` = '$upperLimit',
    `storageLocation` = '$storageLocation',
    `amount` = '$amount',
    `expireDate` = '$expireDate',
    `expireNotice` = '$expireNotice'
  WHERE
    id = '$id'";
  if(mysqli_query($conn,$sql)){
    $editResult = array("status"=>true,"message"=>"แก้ไขเวชภัณฑ์เรียบร้อยแล้ว");
  }else{
    $editResult = array("status"=>false,"message"=>mysqli_error($conn));
  }
}else{
  $editResult = array("status"=>false,"message"=>"ไม่พบเวชภัณฑ์นี้ในระบบ");
}
print json_encode($editResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
