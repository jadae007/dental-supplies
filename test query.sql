SELECT
  od.*,
  i.itemName
FROM
  `order_detail` od
  INNER JOIN `items` i ON od.itemId = i.id
WHERE
  od.orderId = '$id'