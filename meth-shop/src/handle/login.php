<?php
  include "../database-instance.php";
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM member WHERE username=? AND password = ? ");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();

  $row = $stmt->fetch();

  $role = $row["role"];
  $_SESSION['role'] = $role;
  $_SESSION['username'] = $row["username"];

  if ( !empty($row)) {
    if ( $role == 'admin') {
      header("location: /~cs6520159/meth-shop/src/pages/admin/index.php");
    } else {
      header("location: /~cs6520159/meth-shop/src/pages/index.php");
    }
  } else {
    setcookie("login_status", 0, time() + 20, '/');
    header("location: ".$_SERVER["HTTP_REFERER"]);
  }
?>
