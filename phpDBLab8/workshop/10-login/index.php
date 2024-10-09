<html>
   <script src="https://cdn.tailwindcss.com"></script>
<body>
<form action="./check-login.php" method="POST" class="flex flex-col w-1/2">
   <lable class="font-bold">
      Username:
   </lable> 
   <input type="text" name="username" class="border-black border-2 rounded-md"><br>

   <label for="" class="font-bold">
      Password:
   </label> 
   <input type="password" name="password" class="border-black border-2 rounded-md"><br>
   <button type="submit" value="Login" class="bg-green-200 hover:bg-green-400 border-2 rounded-md">
      Login
   </button>
</form>
</body>
</html>
