<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<!DOCTYPE html>
<html lang="en">

<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php"; ?>

<body class="    flex">


  <aside class="w-48 bg-[#232f3e] h-dvh overflow-y-auto p-4 flex-none">
    <img src="../../assets/breaking-bad.png" alt="" class="w-40">
    <div class="uk-margin">

    </div>

    <ul class="uk-list uk-list-disc" id="menu">
        <li class=" hover:text-slate-600"> 
            <a href="../../index.php" class="uk-link-muted">home</a>
        </li>

        <li> workshop
          <ul class="uk-list uk-list-decimal" id="workshow-menu">
            <script src="http://202.44.40.193/~cs6520159/meth-shop/components/menu-components.js"></script>
          </ul>
        </li>
    </ul> 
  </aside>

  <content class="p-4 h-dvh grow overflow-y-auto">





    <div class="flex justify-between">
      <h1 class="text-4xl font-bold py-4">Workshop 4: Search User by user name</h1>
      <div class="uk-margin">


      <form action="./4.php" method="get" class="uk-search uk-search-default">
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
          <img src="../../assets/member_photo/<?=$row["username"]?>.jpg" class="mx-auto py-4 w-40 h-48 object-scale-down"/>
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






