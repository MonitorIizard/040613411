<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>

<?php 
  $stmt = $pdo->prepare("DELETE FROM member WHERE username = ? ");
  $stmt->bindParam(1, $_GET["username"]);
  
  $files = glob("/home/std/cs6520159/public_html/meth-shop/src/assets/member_photo/" . $_GET['username'] . ".*");

  foreach ( $files as $file ) {
    unlink($file);
  }
  if ( $stmt->execute() ) {
    header("Location: ". $_SERVER['HTTP_REFERER']);
  };
?>