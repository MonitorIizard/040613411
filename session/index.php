<?php include "database-instance.php";
      include session_start(); ?>


<?php 
  $_SESSION["username"] = "Admin";
  $_SESSION["password"] = "";
  echo $_SESSION["profile"];
?>