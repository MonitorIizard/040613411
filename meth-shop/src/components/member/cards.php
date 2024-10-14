<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>

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
        <div class="uk-card w-60 h-102 p-4 bg-primary-blue text-sm relative <?php if( $row['role']=='admin') { echo "hidden"; } ?> text-white">
          
          <a href="<?= $_SERVER['PHP_SELF']."?username=".$row["username"]?>&filter=true">
            <img src="/~cs6520159/meth-shop/src/assets/member_photo/<?=$row["username"]?>" class="mx-auto py-4 w-40 h-48 object-scale-down"/>
          </a>
          <p><span class="text-black font-bold">username:</span> <?=$row ["username"]?></p>
          <p><span class="text-black font-bold">name:</span> <?=$row ["name"]?></p>
          <p><span class="text-black font-bold">addres:</span> <?=$row ["address"]?></p>
          <p><span class="text-black font-bold">email:</span> <?=$row ["email"]?></p>

          
          <div class="absolute bottom-0 w-11/12 left-1/2 -translate-x-1/2 h-fit">
            
            <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/member/edit-form.php"; ?>
            
            <a href="#modal-center" uk-toggle>
              <button class="uk-button bg-red-600 hover:bg-red-500  my-4 w-full" onClick='confirmDelete("<?php echo $row["username"] ?>")''>Delete Member</button>

              <script> 
                function confirmDelete( username ) {
                  const confirm = document.getElementById("confirmDelete");
                  confirm.setAttribute('href', "/~cs6520159/meth-shop/src/handle/delete/member.php?username="+username);
                }
              </script>
            </a>
          </div>
        </div>

<?php } ?>

<div id="modal-center" class="uk-flex-top" uk-modal>
          <div class="uk-modal-body uk-margin-auto-vertical uk-modal-dialog
                      text-white">
            <button class="uk-modal-close-default" type="button" uk-close></button>

            <p class="text-center">
              “It is only the dead who do not return.”
              <br>
              Beyond this point, is a point of no return.
            </p>

            <a id="confirmDelete">
                <button class="uk-button bg-red-600 hover:bg-red-500  mt-4 w-full"> 
                  Confirm Delete
                </button>
            </a>
            <button class="uk-button  bg-primary-gray hover:bg-slate-300 mt-4 w-full uk-modal-close text-black"> 
              Cancel
            </button>
          </div>
        </div>