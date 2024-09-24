<?php include "../../database-instance.php"?>

<?php
  $stmt = $pdo->prepare("UPDATE member 
                         SET 
                         password=?,
                         name=?,
                         address=?,
                         mobile=?,
                         email=?
                         WHERE username=?");
  $stmt->bindParam(6, $_POST['username']);
  $stmt->bindParam(1, $_POST['password']);
  $stmt->bindParam(2, $_POST['name']);
  $stmt->bindParam(3, $_POST['address']);
  $stmt->bindParam(4, $_POST['mobile']);
  $stmt->bindParam(5, $_POST['email']);

  if($stmt->execute()){
    echo "Member".$_POST['username']."has been updated";
  }
?>

