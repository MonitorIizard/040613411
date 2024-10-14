<?php 
  session_start();
?>

<aside class="w-60 bg-[#232f3e] h-dvh overflow-y-auto p-4 flex-none text-white">
  <?php 
    if ( !isset($_SESSION['username']) ) {
      echo '<a href="/~cs6520159/meth-shop/src/pages/login.php">
        <button class="uk-button bg-primary-blue hover:bg-blue-300
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
      echo '<a href="/~cs6520159/meth-shop/src/handle/logout.php">
        <button class="uk-button bg-primary-blue hover:bg-blue-300
                      w-full h-fit my-8
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
        ?>
        <p class="pb-4 flex items-center gap-4 my-auto">
            <img src="/~cs6520159/meth-shop/src/assets/svgs/user.svg" 
                alt="s" width="20" 
                uk-svg>
            <?php echo 'Username:  ' . $_SESSION['username']  ?>
        </p>
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
        <?php 
      }
      ?>
  
<?php 

  if( $_SESSION['role'] == 'admin' ) {

  ?>

  <ul class="uk-list uk-list-disc py-4" id="menu">
    <li class="hover:text-slate-600">
      <a
        href="/~cs6520159/meth-shop/src/pages/admin/index.php"
        class="uk-link-muted"
        >member</a
      >
    </li>

    <li class="hover:text-slate-600">
      <a
        href="/~cs6520159/meth-shop/src/pages/admin/drug-shop.php"
        class="uk-link-muted"
        >drug-shop</a
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
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/01-table-lists/index.php"
            class="uk-link-muted"
            >table</a
          >
        </li>

        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/02-members-list"
            class="uk-link-muted"
            >members list</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/03-member-list-with-pictures"
            class="uk-link-muted"
            >with pictures</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/04-search-user"
            class="uk-link-muted"
            >search by username</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/05-detail"
            class="uk-link-muted"
            >detail</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/06-deletion"
            class="uk-link-muted"
            >deletion</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/07-insertion"
            class="uk-link-muted"
            >insertion</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/08-redirect-after-create"
            class="uk-link-muted"
            >show detail when insert new member</a
          >
        </li>
        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/09-edit-member"
            class="uk-link-muted"
            >edit member</a
          >
        </li>

        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/10-ajax-2-search-username"
            class="uk-link-muted"
            >ajax-2-search-username</a
          >
        </li>

        <li class="hover:text-slate-600">
          <a
            href="/~cs6520159/meth-shop/src/pages/admin/workshop/11-json"
            class="uk-link-muted"
            >json</a
          >
        </li>
      </ul>
        </div>

      <li class="hover:text-slate-600">
        <a
          href="/~cs6520159/meth-shop/src/pages/admin/orders.php"
          class="uk-link-muted"
          >orders</a
        >
      </li>
    

    </li>
  </ul>

<?php 
        } else {
?>

<ul class="uk-list uk-list-disc p-4" id="menu">
  <li class="hover:text-slate-600">
    <a
      href="/~cs6520159/meth-shop/src/pages/customer/my-order.php"
      class="uk-link-muted"
      >my-order</a
    >
  </li>
</ul>


<?php 
        } 
?>

</aside>