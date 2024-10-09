<?php
  $pdo=new PDO("mysql:host=localhost; dbname=sec1_8;charset=utf8","Wstd8","az02MP6a");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $showTables = $pdo->prepare("SHOW TABLES;");

  $showTables->execute();

  echo $showTables
?>