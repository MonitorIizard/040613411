<?php 
  session_start();
?>

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
    href="/~cs6520159/meth-shop/src/global.css"
  />
</head>

<aside class="w-60 bg-[#232f3e] h-dvh overflow-y-auto p-4 flex-none text-white">
  <?php 
    if ( !isset($_SESSION['username']) ) {
      echo '<a href="/~cs6520159/meth-shop/pages/login.php">
        <button class="uk-button bg-[#146eb4] hover:bg-blue-300
                      w-full h-fit my-8
                      flex ">
                      <div class="w-full flex justify-between items-center px-2">
                        <img src="/~cs6520159/meth-shop/src/assets/svgs/login.svg"
                              width="30"
                              height=""
                              uk-svg />
                        <p>Login</p>
                      </div>
        </button>
      </a>';
    }else {
      echo '<a href="/~cs6520159/meth-shop/handle/logout.php">
        <button class="uk-button bg-[#146eb4] hover:bg-blue-300
                      w-full h-4 my-8
                      flex ">
                      <div class="w-full flex justify-between items-center px-2">
                        <img src="/~cs6520159/meth-shop/src/assets/svgs/login.svg"
                              width="30"
                              height=""
                              uk-svg />
                        <p>Logout</p>
                      </div>
        </button>
      </a>';
    };
  
  ?>

  <?php 
      if ( isset($_SESSION['username']) ) {
        echo '<p class="pb-4 flex items-center gap-4 my-auto">
                      <img src="/~cs6520159/meth-shop/src/assets/svgs/user.svg" 
                          alt="" width="20" 
                          uk-svg>
                    Username:  ' . $_SESSION['username'] .
              '</p>';
      }
  ?>

    

  <img
    src="/~cs6520159/meth-shop/src/assets/<?php 
          if ( isset($_SESSION['username']))  {
            echo "member_photo/".$_SESSION['username'];
          } else {
            echo "breaking-bad";
          };
        ?>"
    alt=""
    class="w-40 mx-auto"
  />

  <div class="uk-margin"></div>

  <ul class="uk-list uk-list-disc" id="menu">
    <li class="hover:text-slate-600">
      <a
        href="/~cs6520159/meth-shop/src/index.php"
        class="uk-link-muted"
        >admin/member</a
      >
    </li>

    <li class="hover:text-slate-600">
      <a
        href="/~cs6520159/meth-shop/src/drug-shop.php"
        class="uk-link-muted"
        >admin/drug-shop</a
      >
    </li>

    <li>
      <button class="uk-link" type="button">Workshop</button>

      <div
          class=" uk-drop bg-blue-500 rounded-md p-4"
          uk-drop="mode: click"
        >
        <ul class="uk-list uk-list-decimal" id="workshow-menu">
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/01-table-lists"
            class="uk-link-muted"
            >table</a
          >
        </li>

        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/02-members-list"
            class="uk-link-muted"
            >members list</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/03-member-list-with-pictures"
            class="uk-link-muted"
            >with pictures</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/04-search-user"
            class="uk-link-muted"
            >search by username</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/05-detail"
            class="uk-link-muted"
            >detail</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/06-deletion"
            class="uk-link-muted"
            >deletion</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/07-insertion"
            class="uk-link-muted"
            >insertion</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/08-redirect-after-create"
            class="uk-link-muted"
            >show detail when insert new member</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/workshop/09-edit-member"
            class="uk-link-muted"
            >edit member</a
          >
        </li>
      </ul>
        </div>

      <li class="hover:text-slate-600">
        <a
          href="/~cs6520159/meth-shop/pages/my-orders.php"
          class="uk-link-muted"
          >my-orders</a
        >
      </li>
      
    </li>
  </ul>
</aside>
