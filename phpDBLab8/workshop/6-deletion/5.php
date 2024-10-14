<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<html>
<head><meta charset="utf-8">
        <style>
                table,td, th {
                        border: 1px solid black;}
        </style>

    <link
    rel="stylesheet"
    href="/~cs6520159/meth-shop/src/css/output.css"
  />
</head>
<body class="p-4">

  <h1 class="text-4xl py-8">All User</h1>

  <form action="show-detail.php" method="get">
    <label for="seach-user">search user</label>
    <input type="text" class="border-2 border-black my-4" name="username">
    <button type="submit" class="bg-green-200 p-2 rounded-md hover:bg-green-300"> search </button>
  </form>
  
  <div class="flex gap-4">
    <?php
     $email = '%'.$_GET["email"].'%';
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
    ?>
       <div class="border-2 border-black p-2 
                   flex flex-col">
         <p><span class="font-bold">name :</span> <?=$row ["name"]?></p>
         <p><span class="font-bold">address : </span> <?=$row ["address"]?></p>
         <p><span class="font-bold">email : </span><?=$row ["email"]?></p>
         <p><span class="font-bold">username : </span><?=$row ["username"]?></p>

         <a href="./show-detail.php?username=<?=$row["username"]?>" class="w-fit">
          <img src="../../member_photo/<?=$row["username"]?>.jpg" width="100"/>
         </a>
       </div>
        
    <?php } ?>
  </div>
</body>
</html>