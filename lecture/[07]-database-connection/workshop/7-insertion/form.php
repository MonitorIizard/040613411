<?php include "../database-instance.php" ?>
<html>
<head><meta charset="utf-8">
        <style>
                table,td, th {
                        border: 1px solid black;}
        </style>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-4">
  <h1 class="text-4xl py-8 ">Add Users</h1>

  <form action="./insert.php" class="grid grid-cols-2 grid-rows-4 gap-4" method="post">
    <div class="flex items-center gap-2">
      <label for="name">
        name
      </label>
      <input type="text" name="name" id="name"  class="border-2"">
    </div>

    <div class="flex items-center gap-2">
      <label for="username">
        username
      </label>
      <input type="text" name="username" id="username"  class="border-2">
    </div>

    <div class="flex items-center gap-2">
      <label for="password">
        passsword
      </label>
      <input type="password" name="password" id="password"  class="border-2">
    </div>

    <div class="col-span-2 gap-2">
      <label for="address">
        address
      </label>
      <textarea name="address" id="address" class="border-2 w-full">
      </textarea>
    </div>

    <div class="flex items-center gap-2">
      <label for="mobile">
        mobile
      </label>
      <input type="tel" name="mobile"  class="border-2">
    </div>


    <div class="flex items-center gap-2">
      <label for="email
      ">email</label>
      <input type="email" name="email"  class="border-2">
    </div>

    
    <div class="cols-span-2">
      <button type="submit"
              class="bg-red-200 p-2 rounded-md hover:bg-red-300 h-fit"> 
        + Add user
      </button>
    </div>
  </form>
</body>
</html>