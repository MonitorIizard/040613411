<?php include "../database-instance.php" ?>

<?php 
  $stmt = $pdo->prepare("DELETE FROM product WHERE pid = ? ");
  $stmt->bindParam(1, $_GET["pid"]);

  $files = glob("../assets/product_photo/" . $_GET['pname'] . ".*");

  foreach ( $files as $file ) {
    unlink($file);
  }

  if ( $stmt->execute() ) {
    header("Location: ". $_SERVER['HTTP_REFERER']);
  };
?>