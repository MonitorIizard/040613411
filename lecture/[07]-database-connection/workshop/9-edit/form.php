<?php include "../../database-instance.php" ?>
<html>
<head><meta charset="utf-8">
        <style>
                table,td, th {
                        border: 1px solid black;}
        </style>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php $stmt=$pdo->prepare("SELECT * FROM member WHERE username=?");
      $stmt->bindParam(1,$_GET['username']);
      $stmt->execute();
      $member=$stmt->fetch();
?>

<body class="p-4">
  <h1 class="text-4xl py-8 font-bold">Edit Users</h1>

  <form action="./handle.php" class="flex flex-col gap-4" method="post">
    <div class="flex flex-col ">
      <label for="name" class="font-bold">
        name:
      </label>
      <input type="text" name="name" id="name"  class="border-2 rounded-md p-1 pl-2" value="<?=$member['name']?>">
    </div>

    <div class="flex flex-col">
      <label for="username" class="font-bold">
        username :
      </label>
      <input type="text" name="username" id="username"   class="border-2 rounded-md p-1 pl-2" value="<?=$member['username']?>">
    </div>

    <div class="flex flex-col ">
      <label for="password" class="font-bold">
        passsword :
      </label>
      <input type="password" name="password" id="password"   class="border-2 rounded-md p-1 pl-2" value="<?=$member['password']?>">
    </div>

    <div class="flex flex-col "">
      <label for="address" class="font-bold">
        address :
      </label>
      <textarea name="address" id="address"  class="border-2 rounded-md p-1 pl-2">
        <?=$member['address']?>"
      </textarea>
    </div>

    <div class="flex flex-col ">
      <label for="mobile" class="font-bold">
        mobile :
      </label>
      <input type="tel" name="mobile"   class="border-2 rounded-md p-1 pl-2" value="<?=$member['mobile']?>">
    </div>


    <div class="flex flex-col">
      <label for="email" class="font-bold">email</label>
      <input type="email" name="email"   class="border-2 rounded-md p-1 pl-2" value="<?=$member['email']?>">
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

    <div class="cols-span-2">
      <button type="submit"
              class="bg-blue-200 p-2 rounded-md hover:bg-blue-300 h-fit
                     font-bold"> 
        ^ Edit user
      </button>
    </div>
  </form>
</body>
</html>