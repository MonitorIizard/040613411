<?php include "../database-instance.php" ?>
  <html>
  <head><meta charset="utf-8"></head>
  <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->bindParam(1, $_GET["pid"]); 
    $stmt->execute(); 
  ?>
 <h1>All lists</h1>
  <?php

    while ( $row = $stmt->fetch();) {
      ?>   
    
      <img src="../member_photo/<?=$row["username"]?>.jpg" alt="">
      <p><?=$row["name"]?></p>
      <p><?=$row["email"]?></p>

    <?php } ?>
   

  </body>
</html>