<?php include "database-instance.php"; ?>

<?php 
  $stmt = $pdo->prepare("SELECT * from member WHERE username = ? and password = ?");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();
  $row = $stmt->fetch();
?>
