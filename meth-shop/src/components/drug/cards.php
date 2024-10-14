<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>


<?php
      $productName = '%'.$_GET["pname"].'%';
      if ($_GET["filter"]) {
        $productName = $_GET["pid"];
        $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?;");  
      } else {
        $stmt = $pdo->prepare("SELECT * FROM product WHERE pname LIKE ?;");
      }
      $stmt->bindParam(1,$productName);
      $stmt->execute();
      while ($row = $stmt->fetch()) {
?>
        <div class="uk-card w-60 h-102 p-4 bg-primary-blue text-sm relative  text-white">
          
          <a href="<?= $_SERVER['PHP_SELF']."?pid=".$row["pid"]?>&filter=true">
            <img src="/~cs6520159/meth-shop/src<?php echo $row["img_path"] ?>" class="mx-auto py-4 w-40 h-48 object-scale-down"/>
          </a>
          <p><span class="text-black font-bold">name:</span> <?=$row ["pname"]?></p>
          <p><span class="text-black font-bold">detail:</span> <?=$row ["pdetail"]?></p>
          <p><span class="text-black font-bold">price:</span> <?=$row ["price"]?></p>

          <?php if( $_SESSION['role'] == 'admin') { ?>
          <div class="absolute bottom-0 w-11/12 left-1/2 -translate-x-1/2">
            
            <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/drug/edit-form.php"; ?>
            
            <a href="#modal-center" uk-toggle>
              <button class="uk-button bg-red-600 hover:bg-red-500  my-4 w-full" onClick='confirmDelete("<?php echo $row["pid"] ?>", "<?php echo $row["pname"] ?>")''>Delete</button>

              <script> 
                function confirmDelete( pid, pname ) {
                  const confirm = document.getElementById("confirmDelete");
                  confirm.setAttribute('href', "/~cs6520159/meth-shop/src/handle/delete/drug.php?pid="+pid+"&pname="+pname);
                }
              </script>
            </a>
          </div>
          <?php } else { ?>
            <div class="absolute bottom-0 w-11/12 left-1/2 -translate-x-1/2">
            
          </div>
          <?php } ?>
        </div>

<?php } ?>

<div id="modal-center" class="uk-flex-top text-white" uk-modal>
  <div class="uk-modal-body uk-margin-auto-vertical uk-modal-dialog">
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