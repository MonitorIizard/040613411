<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/admin/check-admin.php" ?>
<!DOCTYPE html>
<html lang="en">

<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php"; ?>

<body class="    flex">

    <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/sidebar.php"; ?>
  

  <content class="p-4 h-dvh grow overflow-y-auto">
    <div class="flex justify-between">
    <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue">Workshop 6:</span> deletion </h1>
      <div class="uk-margin">


      <form action="<?php $_SERVER['PHP_SELF']?>" method="get" class="uk-search uk-search-default">
        <span uk-search-icon></span>
        <input
          class="uk-search-input"
          type="search"
          placeholder="Search by username"
          aria-label="Search"
          name="username"
        />
      </form>


    </div>
    </div>

    <div class="flex flex-wrap gap-4 mx-auto">
        <?php include "./cards-workshop6.php"?>
    </div>


  </content>
</body>

</html>






