<?php
  $pdo=new PDO("mariadb:host=202.44.40.193; dbname=sec1_8;charset=utf8","Wstd8","az02MP6a");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $showTables = $pdo->prepare("SHOW TABLES;");

  $showTables->execute();

  echo $showTables
?>