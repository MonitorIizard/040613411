<?php include "../database-instance.php" ?>
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
  <h1 class="text-4xl py-8 font-bold">Add Users</h1>

  <form action="./insert.php" class="flex flex-col gap-4" method="post" enctype="multipart/form-data">
    <div class="flex flex-col ">
      <label for="name" class="font-bold">
        name:
      </label>
      <input type="text" name="name" id="name"  class="border-2 rounded-md p-1 pl-2">
    </div>

    <div class="flex flex-col">
      <label for="username" class="font-bold">
        username :
      </label>
      <input type="text" name="username" id="username"   class="border-2 rounded-md p-1 pl-2">
    </div>

    <div class="flex flex-col ">
      <label for="password" class="font-bold">
        passsword :
      </label>
      <input type="password" name="password" id="password"   class="border-2 rounded-md p-1 pl-2">
    </div>

    <div class="flex flex-col "">
      <label for="address" class="font-bold">
        address :
      </label>
      <textarea name="address" id="address"  class="border-2 rounded-md p-1 pl-2">
      </textarea>
    </div>

    <div class="flex flex-col ">
      <label for="mobile" class="font-bold">
        mobile :
      </label>
      <input type="tel" name="mobile"   class="border-2 rounded-md p-1 pl-2">
    </div>


    <div class="flex flex-col">
      <label for="email" class="font-bold">email :</label>
      <input type="email" name="email"   class="border-2 rounded-md p-1 pl-2">
    </div>

    <div class="flex gap-4">
      <label for="fileToUpload" class="font-bold">
        Profile Picture :
      </label>
      <input type="file" name="fileToUpload" id="fileToUpload"
             onchange="loadFile(event)">
    </div>

    <script>
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>
    
    <img id="output" src="https://www.nasco.co.th/wp-content/uploads/2022/06/placeholder.png" 
         class="w-full h-80 object-scale-down">

    <div class="cols-span-2">
      <button type="submit"
              class="bg-red-200 p-2 rounded-md hover:bg-red-300 h-fit
                     font-bold"> 
        + Add user
      </button>
    </div>

  </form>
</body>
</html>