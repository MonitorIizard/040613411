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
  <link
    rel="stylesheet"
    href="/~cs6520159/meth-shop/output.css"
  />
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


  <div>
    <?php include "../../components/sidebar.php"; ?>
  </div>

  <content class="p-4 h-dvh grow overflow-y-auto">
    <div class="flex justify-between">
      <h1 class="text-4xl font-bold py-4"><span class="text-[#146eb4]">Workshop 8:</span> Go to detail after add new member </h1>
      <div class="uk-margin">

        <div class="flex gap-4">
            <?php include "../../components/add-member.php"; ?>
            <?php include "../../components/search-box.php"; ?>
        </div>

      </div>
    </div>

    <div class="flex flex-wrap gap-4 mx-auto">
        <?php include "../../components/cards.php"?>
    </div>

  </content>
</body>

</html>







