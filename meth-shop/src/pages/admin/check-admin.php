<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<?php session_start(); ?>

<?php 
  if($_SESSION['role'] != 'admin') {
    header('location:/~cs6520159/meth-shop/src/pages/login.php');
  };
?>