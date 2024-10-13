<?php include "../database-instance.php" ?>

<?php 
  $stmt = $pdo->prepare("DELETE FROM member WHERE username = ? ");
  $stmt->bindParam(1, $_GET["username"]);
  echo $_GET["username"];
  
  if ( $stmt->execute() ) {
    header("Location: ". $_SERVER['HTTP_REFERER']);
  };
?>