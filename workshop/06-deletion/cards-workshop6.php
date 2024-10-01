<?php include "../../database-instance.php" ?>

<head>
  <link rel="stylesheet" href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/core.iife.js" type="module"></script>
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/icon.iife.js" type="module"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://202.44.40.193/~cs6520159/meth-shop/global.css">
</head> 

<?php
      $username = '%'.$_GET["username"].'%';
      if ($_GET["filter"]) {
        $username = $_GET["username"];
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?;");  
      } else {
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?;");
      }
      $stmt->bindParam(1,$username);
      $stmt->execute();
      while ($row = $stmt->fetch()) {
?>
        <div class="uk-card w-60 h-96 p-4 bg-[#146eb4] text-sm relative">
          
          <a href="<?= $_SERVER['PHP_SELF']."?username=".$row["username"]?>&filter=true">
            <img src="../../assets/member_photo/<?=$row["username"]?>.jpg" class="mx-auto py-4 w-40 h-48 object-scale-down"/>
          </a>
          <p><span class="text-black font-bold">username:</span> <?=$row ["username"]?></p>
          <p><span class="text-black font-bold">name:</span> <?=$row ["name"]?></p>
          <p><span class="text-black font-bold">addres:</span> <?=$row ["address"]?></p>
          <p><span class="text-black font-bold">email:</span> <?=$row ["email"]?></p>

          <div class="absolute bottom-0 w-11/12 left-1/2 -translate-x-1/2">
            
            <a href="#modal-center" uk-toggle>
              <button class="uk-button bg-red-600 hover:bg-red-500  my-4 w-full" onClick='confirmDelete("<?php echo $row["username"] ?>")''>Delete Member</button>

              <script> 
                function confirmDelete( username ) {
                  const confirm = document.getElementById("confirmDelete");
                  confirm.setAttribute('href', "http://202.44.40.193/~cs6520159/meth-shop/handle/deletion.php?username="+username);
                }
              </script>
            </a>
          </div>
        </div>

<?php } ?>

<div id="modal-center" class="uk-flex-top" uk-modal>
          <div class="uk-modal-body uk-margin-auto-vertical uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>

            <p class="text-center">
              “It is only the dead who do not return.”
              <br>
              Beyond this point, is a point of no return.
            </p>

            <a id="confirmDelete uk-modal-close">
                <button class="uk-button bg-red-600 hover:bg-red-500  mt-4 w-full"> 
                  Confirm Delete
                </button>

                <button class="uk-button bg-[#f2f2f2] hover:bg-slate-300 mt-4 w-full uk-modal-close text-black"> 
                  Cancel
                </button>
            </a>
          </div>
        </div>