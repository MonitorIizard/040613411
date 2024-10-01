<?php include "../../database-instance.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/core.iife.js" type="module"></script>
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/icon.iife.js" type="module"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://202.44.40.193/~cs6520159/meth-shop/global.css">

  <style>
    body {
      font-family: "Inter", sans-serif;
    }
  </style>

</head>

<body class="text-white bg-black flex">


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
        <div class="uk-card uk-card-secondary w-60 h-96 p-4 bg-[#146eb4] text-sm">
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






