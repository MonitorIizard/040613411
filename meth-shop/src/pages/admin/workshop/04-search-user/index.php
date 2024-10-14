<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/admin/check-admin.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php"; ?>

<body class="    flex">

  <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/sidebar.php"; ?>

  <content class="p-4 h-dvh grow overflow-y-auto">

    <div class="flex justify-between">
      <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue">Workshop 4:</span>  Search User by user name</h1>
      <div class="uk-margin">


      <form action="index.php" method="get" class="uk-search uk-search-default">
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
      <?php
        $username = '%'.$_GET["username"].'%';
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?;");
      $stmt->bindParam(1,$username);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
      ?>
        <div class="uk-card uk-card-secondary w-60 h-96 p-4 bg-primary-blue text-sm">
          <img src="/~cs6520159/meth-shop/src/assets/member_photo/<?=$row["username"]?>.jpg" class="mx-auto py-4 w-40 h-48 object-scale-down"/>
          <p><span class="text-black font-bold">username:</span> <?=$row ["username"]?></p>
          <p><span class="text-black font-bold">name:</span> <?=$row ["name"]?></p>
          <p><span class="text-black font-bold">addres:</span> <?=$row ["address"]?></p>
          <p><span class="text-black font-bold">email:</span> <?=$row ["email"]?></p>
          
        </div>
      <?php } ?>
    </div>
    

  </content>
</body>

</html>






