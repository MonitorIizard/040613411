<?php
  include "../database-instance.php";
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM member WHERE username=? AND password = ? ");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();

  $row = $stmt->fetch();

  if ( !empty($row)) {
    $_SESSION['username']=$row["username"];
    setcookie("login_status", 1, time(), '/');
    header("location: /~cs6520159/meth-shop/index.php");
  } else {
    setcookie("login_status", 0, time() + 20, '/');
    header("location: ".$_SERVER["HTTP_REFERER"]);
  }
?>
