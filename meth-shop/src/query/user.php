<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php";
  session_start();

  $username = '%'.$_GET['username'].'%';

  $stmt = $pdo->prepare('SELECT * FROM member WHERE username LIKE ?;');
    $stmt->bindParam(1, $_GET['username']);
    $stmt->execute();

    $results = $stmt->fetchAll();
    $json = json_encode($results);
    echo $json;
?>


