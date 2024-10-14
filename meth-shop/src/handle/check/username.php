<?php 
  include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php"; 

  $stmt = $pdo->prepare('SELECT username FROM member WHERE username= ? ');
  $stmt->bindParam(1, $_GET['username']);
  $stmt->execute();

  $row = $stmt->fetch();

  if ( !empty($row) ) {
    echo "This username have already been used.";
  }
?>

