<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php";
  include "/home/std/cs6520159/public_html/meth-shop/src/handle/check/login.php";
?>


<!DOCTYPE html>
<html lang="en">

<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php"; ?>

<body class="  bg-white flex">


  <div>
    <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/sidebar.php"; ?>
  </div>

  <content class="p-4 h-dvh grow overflow-y-auto">
    <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue"><?php echo $_SESSION['username']?>'s orders</h1>

    <div class="shadow-lg">
      <table class="uk-table uk-table-divider text-black
                    shadow-sm">
        <thead class="bg-primary-blue  ">
          <th><span class="font-bold">product name</span></th>
          <th><span class="font-bold">quantity</span></th>
          <th><span class="font-bold">order date</span></th>
          <th><span class="font-bold">status</span></th>
          <th><span class="font-bold">cost</span></th>
        </thead>
        <tbody>
          <?php include "/home/std/cs6520159/public_html/meth-shop/src/query/my-order.php";
            while( $row = $stmt->fetch() ) {
          ?>
            <tr>
              <td><?php echo $row['pname']?></td>
              <td><?php echo $row['quantity']?></td>
              <td><?php echo $row['ord_date']?></td>
              <?php if($row['status']=='pay') {
                    echo '<td class="text-green-500">';
                  } else if ($row['status']=='wait') {
                    echo '<td class="text-blue-500">';
                  } else {
                    echo '<td class="text-yellow-600">';
                  }
                  ?><?php echo $row['status']?></td>
              <td><?php echo $row['cost']?></td>
            </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
    </div>
  </content>
</body>

</html>





