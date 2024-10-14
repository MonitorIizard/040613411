<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>

<head>
  <link rel="stylesheet" href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css" />
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/core.iife.js" type="module"></script>
  <script src="https://unpkg.com/franken-ui@1.1.0/dist/js/icon.iife.js" type="module"></script>
  <link
    rel="stylesheet"
    href="/~cs6520159/meth-shop/src/css/output.css"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://202.44.40.193/~cs6520159/meth-shop/src/global.css">
</head> 

<button class="uk-button w-full bg-[#232f3e] hover:bg-orange-300" 
        uk-toggle="target: #<?= $row["pname"]?>"
        type="submit"
        name="editDrug"
        value="<?=$row["pname"]?>"
        id="editMemberButton"
        > Edit drug</button>

<div id="<?=$row["pname"] ?>" class="uk-flex-top" uk-modal>
  <div class="uk-modal-body uk-margin-auto-vertical uk-modal-dialog text-white">
    <button class="uk-modal-close-default" type="button" uk-close></button>

    <form class="border-none overflow-y-auto h-75dvh" 
          action="/~cs6520159/meth-shop/src/handle/edit/drug.php" enctype="multipart/form-data" 
          method="post">

      <legend class="uk-legend">Picture</legend>

      <img 
        id="<?php echo $row["username"]?>" 
        src="http://202.44.40.193/~cs6520159/<?= $row["img_path"]?>"
        class="w-full h-80 object-scale-down">

      <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
          <input 
            onchange='loadFileEdit(event)' 
            type="file" 
            name="fileToUpload" 
            id="fileToUpload<?php echo $row["username"]?>"
            aria-label="Custom controls" />
          <input class="uk-form-width-medium uk-input" type="text" placeholder="Select file"
            aria-label="Custom controls" disabled />
        </div>
      </div>

      <div class="uk-margin">
        <input class="uk-input" type="hidden" aria-label="Input" name="pid" value="<?= $row["pid"]?>"/>
      </div>

      <legend class="uk-legend">name:</legend>

      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="pname" value="<?= $row["pname"]?>"/>
      </div>


      <legend class="uk-legend">detail</legend>

      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="pdetail"  value="<?= $row["pdetail"]?>" require/>
      </div>

      <legend class="uk-legend">price</legend>

      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="price"  value="<?= $row["price"]?>" require/>
      </div>


      <button class="uk-button bg-[#232f3e] hover:bg-blue-800  mt-4 w-full" type="submit" value="submit">
        Edit drug
      </button>

    </form>

    <button class="uk-button  bg-primary-gray hover:bg-slate-300 mt-4 w-full uk-modal-close text-black">
      Cancel
    </button>
  </div>
</div>