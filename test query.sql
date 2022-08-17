SELECT
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