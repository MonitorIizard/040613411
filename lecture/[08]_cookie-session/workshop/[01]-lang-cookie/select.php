<?php
  $time = time() + 300;

  if (empty($_GET)) {
    setcookie('lang', 'th', $time);
  } else {
    setcookie('lang', $_GET['language'], $time );
  }

  header("location:./main.php");
?>