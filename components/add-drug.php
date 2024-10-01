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

<button class="uk-button bg-[#ff9900] hover:bg-orange-300" uk-toggle="target: #addDrug">+ Add Drug</button>

<div id="addDrug" class="uk-flex-top" uk-modal>
  <div class="uk-modal-body uk-margin-auto-vertical uk-modal-dialog">
    <button class="uk-modal-close-default" type="button" uk-close></button>

    <form class="border-none overflow-y-auto h-75dvh" 
          action="http://202.44.40.193/~cs6520159/meth-shop/handle/add-drug.php" enctype="multipart/form-data" 
          method="post">

      <legend class="uk-legend">Picture</legend>

      <img 
        id="output" 
        src="https://www.nasco.co.th/wp-content/uploads/2022/06/placeholder.png"
        class="w-full h-80 object-scale-down">

      <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
          <input 
            onchange="loadFileEdit(event)" 
            type="file" 
            name="fileToUpload" 
            id="fileToUpload"
            aria-label="Custom controls" />
          <input class="uk-form-width-medium uk-input" type="text" placeholder="Select file"
            aria-label="Custom controls" disabled />
        </div>
      </div>

      <script>
        var loadFileEdit = function (event) {
          var output = document.getElementById("output");
          output.src = URL.createObjectURL(event.target.files[0]);
          console.log(URL.createObjectURL(event.target.files[0]));
        };
      </script>

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


      <button class="uk-button bg-[#232f3e] hover:bg-blue-800  mt-4 w-full" type="submit">
       Add Drug
      </button>

    </form>

    <button class="uk-button bg-[#f2f2f2] hover:bg-slate-300 mt-4 w-full uk-modal-close text-black">
      Cancel
    </button>
  </div>
</div>