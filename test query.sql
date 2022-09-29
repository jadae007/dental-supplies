SELECT
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
GROUP BY
  od.orderId