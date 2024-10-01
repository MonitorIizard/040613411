<?php include "../database-instance.php" ?>

<?php 
  $stmt = $pdo->prepare("DELETE FROM product WHERE pid = ? ");
  $stmt->bindParam(1, $_GET["pid"]);

  if ( $stmt->execute() ) {
    header("Location: ". $_SERVER['HTTP_REFERER']);
  };
?>