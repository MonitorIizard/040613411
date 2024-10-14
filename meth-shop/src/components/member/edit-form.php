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
  <link rel="stylesheet" href="/~cs6520159/meth-shop/src/global.css">
</head> 

<button class="uk-button w-full bg-[#232f3e] hover:bg-orange-300" 
        uk-toggle="target: #<?= $row["username"]?>"
        type="submit"
        name="editMemeber"
        value="<?php $row["username"]?>"
        id="editMemberButton"
        > edit member</button>

<div id="<?=$row["username"] ?>" class="uk-flex-top" uk-modal>
  <div class="uk-modal-body uk-margin-auto-vertical uk-modal-dialog text-white">
    <button class="uk-modal-close-default" type="button" uk-close></button>

    <form class="border-none overflow-y-auto h-75dvh" 
          action="/~cs6520159/meth-shop/src/handle/edit/member.php" enctype="multipart/form-data" 
          method="post">

      <legend class="uk-legend">Profile</legend>

      <img 
        id="fileToUpload<?php echo $row["username"]?>output" 
        src="/~cs6520159/meth-shop/assets/member_photo/<?= $row["username"]?>"
        class="w-full h-80 object-scale-down">

      <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
          <input 
            onchange="loadFileEdit(event)" 
            type="file" 
            name="fileToUpload" 
            id="fileToUpload<?php echo $row["username"]?>"
            aria-label="Custom controls" />
          <input class="uk-form-width-medium uk-input" type="text" placeholder="Select file"
            aria-label="Custom controls" disabled />
        </div>
      </div>

      <script>
        var loadFileEdit = function (event) {
          var output = document.getElementById(event.target.id + "output");
          output.src = URL.createObjectURL(event.target.files[0]);
        };
      </script>

      <legend class="uk-legend">Username</legend>

      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="username" value="<?= $row["username"]?>" disabled/>
      </div>

      <div class="uk-margin">
        <input class="uk-input" type="hidden" aria-label="Input" name="username" value="<?= $row["username"]?>"/>
      </div>

      <legend class="uk-legend">Password</legend>

      <div class="uk-margin">
        <input class="uk-input" type="password" aria-label="Input" name="password"  value="<?= $row["password"]?>" require/>
      </div>

      <legend class="uk-legend">Name</legend>

      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="name" value="<?= $row["name"]?>" require />
      </div>

      <legend class="uk-legend">Telephone number</legend>

      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="mobile" value="<?= $row["mobile"]?>" require/>
      </div>

      <legend class="uk-legend">Email</legend>

      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="email" value="<?= $row["email"]?>" require/>
      </div>

      <div class="uk-margin">
        <textarea
          class="uk-textarea"
          rows="5"
          placeholder="address"
          aria-label="Textarea"
          name="address"
        ><?= $row["address"]?></textarea>
      </div>


      <button class="uk-button bg-primary-blue hover:bg-blue-800  mt-4 w-full" type="submit">
        edit member
      </button>

    </form>

    <button class="uk-button  bg-primary-gray hover:bg-slate-300 mt-4 w-full uk-modal-close text-black">
      Cancel
    </button>
  </div>
</div>