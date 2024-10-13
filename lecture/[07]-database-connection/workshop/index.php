<?php include "../database-instance.php" ?>
<html>
<head><meta charset="utf-8">
        <style>
                table,td, th {
                        border: 1px solid black;}
        </style>

    <link
    rel="stylesheet"
    href="/~cs6520159/meth-shop/output.css"
  />
</head>

<script>
  function confirmDelete(username) {
    const answer = confirm("Are you sure to delete " + username );
    if ( answer ) {
      document.location=`./6-deletion/6.php?username=${username}`;
    }
  }
</script>

<body class="p-4">

  <h1 class="text-4xl py-8">All User</h1>

  <div class="flex justify-between items-center my-4">
    <form action="./5-search-by-username/show-detail.php" method="get" class="">
      <label for="seach-user">search user</label>
      <input type="text" class="border-2 border-black" name="username">
      <button type="submit" class="bg-green-200 p-2 rounded-md hover:bg-green-300"> search </button>
    </form>

    <button class="bg-red-200 p-2 rounded-md hover:bg-red-300 h-fit"> 
      <a href="./7-insertion/form.php">
        + Add user
      </a>
    </button>
  </div>
  
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

         <a href="./5-search-by-username/show-detail.php?username=<?=$row["username"]?>" class="w-fit mx-auto py-4">
          <img src="../member_photo/<?=$row["username"]?>.jpg" width="100"/>
         </a>


    
          <button class="bg-red-200 p-2 rounded-md hover:bg-red-300"
            onClick="confirmDelete('<?php echo $row["username"] ?>')">
              delete
          </button>
   
    
       </div>
        
    <?php } ?>
  </div>
</body>
</html>