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

  <h1 class="text-4xl py-8">User</h1>
  <div class="flex gap-4">
    <?php
     $email = '%'.$_GET["email"].'%';
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
    ?>
       <div class="border-2 border-black p-2 
                   flex flex-col items-center justify-center">
         <p>ชื่อสมาชิก : <?=$row ["name"]?></p>
         <p><?=$row ["address"]?></p>
         <p><?=$row ["email"]?></p>

         <a href="./show-detail.php">
          <img src="../../member_photo/<?=$row["username"]?>.jpg" width="100"/>
         </a>
       </div> 
    <?php } ?>
  </div>

  <button class="bg-green-200 p-2 rounded-md hover:bg-green-300"> <a href="../index.php">back</a> </button>
</body>
</html>