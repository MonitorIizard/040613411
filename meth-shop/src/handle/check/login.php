<?php session_start(); ?>

<?php 
  if( empty($_SESSION['username'])) {
    header('location:/~cs6520159/meth-shop/src/pages/login.php');
  };
?>