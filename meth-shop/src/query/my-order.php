<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php";
  session_start();

  $stmt = $pdo->prepare('SELECT   product.pname AS pname,
                                  f.quantity AS quantity,
                                  f.ord_date AS ord_date,
                                  f.`status` AS status,
                                  ( product.price * f.quantity ) AS cost,
                                  f.name AS name,
                                  f.username AS username
                                FROM
                                  product
                                  INNER JOIN (
                                  SELECT
                                    item.pid,
                                    t.`status`,
                                    t.ord_date,
                                    t.ord_id,
                                    item.quantity,
                                    t.name,
                                    t.username
                                  FROM
                                    item
                                    INNER JOIN (
                                    SELECT
                                      member.name,
                                      orders.`status`,
                                      orders.ord_date,
                                      orders.ord_id,
                                      member.username
                                    FROM
                                      orders
                                      INNER JOIN member ON orders.username = member.username 
                                    WHERE
                                      member.username = ?
                                    ) t ON t.ord_id = item.ord_id 
                                  ) f ON f.pid = product.pid;
    ');

    
    if ( $_GET['for']=='ajax') {
      $stmt->bindParam(1, $_GET['username']);
      $stmt->execute();

      $results = $stmt->fetchAll();
      $json = json_encode($results);
      echo $json;
    } else {
      $username = $_SESSION['username'];
      $stmt->bindParam(1, $username, PDO::PARAM_STR);
      $stmt->execute();

    }
    
?>


