<html>
   <link rel="stylesheet" href="../index.css">
   <script src="https://cdn.tailwindcss.com"></script>
<body>
<form action="check-login.php" method="POST" class="flex flex-col w-1/2">
   <lable class="font-bold">
      Username:
   </lable> 
   <input type="text" name="username"><br>

   <label for="" class="font-bold">
      Password:
   </label> 
   <input type="password" name="password"><br>
   <button type="submit" value="Login" class="bg-green-200 hover:bg-green-400">
      Login
   </button>
</form>
</body>
</html>
