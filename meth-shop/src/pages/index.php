<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php"; ?>

<body class="  bg-white flex">

  <div>
    <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/sidebar.php"; ?>
  </div>

  <content class="p-4 h-dvh grow overflow-y-auto">
    <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue">Our merchandise</h1>

    <div class="flex gap-4 h-102">
      <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/drug/cards.php"; ?>
    </div>

  </content>
</body>

</html>







