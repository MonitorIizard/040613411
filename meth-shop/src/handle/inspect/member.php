<?php include "../../database-instance.php" ?>

<head>
  <link rel="stylesheet" href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/core.iife.js" type="module"></script>
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/icon.iife.js" type="module"></script>
  <link
    rel="stylesheet"
    href="/~cs6520159/meth-shop/src/css/output.css"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://202.44.40.193/~cs6520159/meth-shop/src/global.css">
</head> 

<?php
      $username = $_GET["username"];
      $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?;");
      $stmt->bindParam(1,$username);
      $stmt->execute();
?>