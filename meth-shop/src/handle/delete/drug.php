<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>

<?php 
  $stmt = $pdo->prepare("DELETE FROM product WHERE pid = ? ");
  $stmt->bindParam(1, $_GET["pid"]);

  $files = glob("/home/std/cs6520159/public_html/meth-shop/src/assets/product_photo/" . $_GET['pname'] . ".*");

  if ( $stmt->execute() ) {
    foreach ( $files as $file ) {
      unlink($file);
    }
    
    header("Location: ". $_SERVER['HTTP_REFERER']);
  };
?>