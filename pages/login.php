<?php session_start(); ?>

<!DOCTYPE html>

<head>
  <link
    rel="stylesheet"
    href="https://unpkg.com/franken-ui@1.1.0/dist/css/core.min.css"
  />
  <script
    src="https://unpkg.com/franken-ui@1.1.0/dist/js/core.iife.js"
    type="module"
  ></script>
  <script
    src="https://unpkg.com/franken-ui@1.1.0/dist/js/icon.iife.js"
    type="module"
  ></script>
  <link
    rel="stylesheet"
    href="/~cs6520159/meth-shop/src/css/output.css"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="http://202.44.40.193/~cs6520159/meth-shop/src/global.css"
  />
</head>

<body class="bg-black text-white flex items-center justify-center h-dvh">

  <form class="uk-form-hotizontal bg-[#146eb4]
               w-96 p-4
               my-auto mx-auto" 
               action="http://202.44.40.193/~cs6520159/meth-shop/handle/login.php"
               method="post">
    <h1 class="text-2xl font-bold flex justify-center">Login</h1>

    <img src="http://202.44.40.193/~cs6520159/meth-shop/assets/svgs/gas-mask.svg"
                          width="100"
                          height=""
                          uk-svg 
                          class="mx-auto py-4"/>

    <div class="uk-margin">
      <label class="uk-form-label" for="form-horizontal-text">Username</label>
      <div class="uk-form-controls">
        <input
          class="uk-input"
          id="form-stacked-text"
          type="text"
          name="username"
          placeholder=""
        />
      </div>
    </div>

    <div class="uk-margin">
      <label class="uk-form-label" for="form-horizontal-text">Password</label>
      <div class="uk-form-controls">
        <input
          class="uk-input"
          id="form-stacked-text"
          type="text"
          placeholder=""
          name="password"
        />
      </div>
    </div>

    <button class="uk-button bg-[#ff9900] hover:bg-orange-300 mb-4" type="submit">
      login
    </button>

    <br>

    <a href="" class="uk-link">
      new account
    </a>

    <?php 
      if (isset($_COOKIE['login_status']) && $_COOKIE["login_status"] == 0) {
        echo '<p class="text-red-500 font-bold">wrong username or password</p>';
      }
    ?>
  </form>  

</body>



