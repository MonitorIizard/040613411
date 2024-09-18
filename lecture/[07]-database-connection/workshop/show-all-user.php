<?php include "../database-instance.php" ?>
  <html>
  <head><meta charset="utf-8"></head>
  <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->bindParam(1, $_GET["pid"]); 
    $stmt->execute(); 
  ?>

  <?php

    while ( $row = $stmt->fetch();) {
      ?>   
    
    <img src="" alt="">

    <?php } ?>
   

  </body>
</html>