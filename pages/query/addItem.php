<?php
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

require('connect.php');

$sql =  "INSERT INTO
`items`(
  `productBarcode`,
  `itemName`,
  `typeId`,
  `itemBrand`,
  `itemDetail`,
  `sellerCompany`,
  `unitCount`,
  `price`,
  `lowerLimit`,
  `upperLimit`,
  `storageLocation`,
  `amount`,
  `expireDate`,
  `expireNotice`,
  `itemActive`
)
VALUES
(
  '$productBarcode',
  '$itemName',
  '$typeId',
  '$itemBrand',
  '$itemDetail',
  '$sellerCompany',
  '$unitCount',
  '$price',
  '$lowerLimit',
  '$upperLimit',
  '$storageLocation',
  '$amount',
  '$expireDate',
  '$expireNotice',
  '1'
) ";

if(mysqli_query($conn,$sql)){
  $addResult = array("status"=>true,"message"=>"เพิ่มเวชภัณฑ์เรียบร้อยแล้ว");
}else{
  $addResult = array("status"=>false,"message"=>mysqli_error($conn));
}
print json_encode($addResult,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);

?>