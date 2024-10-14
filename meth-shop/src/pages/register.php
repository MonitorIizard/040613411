<script>
      var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        console.log("helloworld");
      };

      function checkUsername ( ) {
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = showResult;

        const username = document.getElementById('username').value;
        const url = `/~cs6520159/meth-shop/src/handle/check/username.php?username=${username}`

        httpRequest.open("GET", url);
        httpRequest.send();
      }

      function showResult() {
        const state = httpRequest.readyState;
        const status = httpRequest.status;
        if ( state == 4 && status == 200 ) {
          document.getElementById('username-warning').innerHTML = httpRequest.responseText;
        }
      } 

      function checkPassword() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if ( password != confirmPassword) {
          document.getElementById('password-warning').innerHTML = "password is not the same";
        }
      }

      
</script>

<?php session_start(); 
  include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php";
?>

<!DOCTYPE html>


<body class="  text-black flex items-center justify-center h-dvh w-full">

  <form class="border-none h-75dvh w-4/5 
               bg-white p-10
               flex"
    action="/~cs6520159/meth-shop/src/handle/add/member.php" enctype="multipart/form-data" method="post">

    <input type="hidden" value="register" name="from">
    <div class="w-1/2">
      <h1 class="uk-legend text-3xl text-primary-blue font-bold">New user</h1>
      <img id="output" src="https://www.nasco.co.th/wp-content/uploads/2022/06/placeholder.png"
        class="w-full h-80 object-scale-down my-10">
      <div class="uk-margin" uk-margin>
        <div uk-form-custom="target: true">
          <input onchange="loadFile(event)" type="file" name="fileToUpload" id="fileToUpload"
            aria-label="Custom controls" />
          <input class="uk-form-width-medium uk-input" type="text" placeholder="Select file" aria-label="Custom controls"
            disabled />
        </div>
      </div>
    </div>

    <div class="w-1/2">
      <legend class="uk-legend">Username</legend>
      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="username" 
               id="username"
               value="MOKMAARD" require 
               onkeyup="checkUsername()"/>
        <p class="text-red-500" id="username-warning"></p>
      </div>
      <legend class="uk-legend">Password</legend>
      <div class="uk-margin">
        <input class="uk-input" 
               id="password"
               type="password" aria-label="Input" name="password" value="12345" require  />
      </div>

      <legend class="uk-legend">Confirm Password</legend>
      <div class="uk-margin ">
        <input class="uk-input" 
               id="confirm-password"
               type="password" aria-label="Input" name="password" value="12345" require 
               onblur="checkPassword()"/>
               <p class="text-red-500" id="password-warning"></p>
      </div>

      <legend class="uk-legend">Name</legend>
      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="name" value="Mok Maard" require />
      </div>
      <legend class="uk-legend">Telephone number</legend>
      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="mobile" value="0863102395" require />
      </div>
      <legend class="uk-legend">Email</legend>
      <div class="uk-margin">
        <input class="uk-input" type="text" aria-label="Input" name="email" value="mokmaard@gmail.com" require />
      </div>
      <div class="uk-margin">
        <textarea class="uk-textarea" rows="5" placeholder="address" aria-label="Textarea"
          name="address">24/156</textarea>
      </div>
      <button class="uk-button bg-primary-blue hover:bg-blue-800  mt-4 w-full  " type="submit">
        Register
      </button>

      <a href="/~cs6520159/meth-shop/src/pages/login.php">
        <button class="uk-button bg-primary-orange hover:bg-orange-500  mt-4 w-full  " type="button">
          Back to login
        </button>
      </a>
    </div>

   
  </form>

  

</body>