<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<?php 
  $stmt=$pdo->prepare("DELETE FROM member WHERE username = ?");
  $stmt->bindParam(1, $_GET["username"]);

  if ( $stmt->execute() ) {
    header("Location: http://202.44.40.193/~cs6520159/phpDBLab8/workshop");
  }
?>