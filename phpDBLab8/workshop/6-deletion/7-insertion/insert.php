<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>

<?php 
  $stmt= $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
   $stmt->bindParam(1, $_POST['username']);
   $stmt->bindParam(2, $_POST['password']);
   $stmt->bindParam(3, $_POST['name']);
   $stmt->bindParam(4, $_POST['address']);
   $stmt->bindParam(5, $_POST['mobile']);
   $stmt->bindParam(6, $_POST['email']);
  $stmt->execute();

  header("Location: ../8-show-detail/show-detail.php?username=".$_POST['username']);
?>

<html>
  <head> <meta charset="UTF-8"></head>
  <body>
    เพิ่มสินค้าสำเร็จ
  </body>

</html>



