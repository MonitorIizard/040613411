<?php include "../database-instance.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
  <?php
  $stmt = $pdo->prepare("SELECT * FROM product");
  $stmt->execute();
  while ($row = $stmt->fetch()) {
  ?>
   <tr>
     <td><?=$row ["pid"]?></td>
     <td><?=$row ["pname"]?></td>
     <td><?=$row ["pdetail"]?></td>
     <td><?=$row ["price"]?> บาท</td>
   </tr>
  <?php } ?>
</body>
</html>