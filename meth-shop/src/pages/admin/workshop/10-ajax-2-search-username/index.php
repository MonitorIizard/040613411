<script>
  function fetchData( username ) {
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = showResult;
    bindingUsername = username;

    console.log(username);
    const url = `/~cs6520159/meth-shop/src/query/user.php?username=${username}`

    httpRequest.open("GET", url);
    httpRequest.send();
  }

  async function  showResult() {
    const state = httpRequest.readyState;
    const status = httpRequest.status;
    if ( state == 4 && status == 200 ) {
      // document.getElementById('result').innerHTML = httpRequest.responseText;
      const response = await JSON.parse(httpRequest.responseText);
      document.getElementById('profile-pic').src = `/~cs6520159/meth-shop/src/assets/member_photo/${response[0].username}`;
      document.getElementById('username').innerHTML = `<span class="text-black font-bold">username:</span> ${response[0].username}`;
      document.getElementById('name').innerHTML = `<span class="text-black font-bold">name:</span> ${response[0].name}`;
      document.getElementById('address').innerHTML = `<span class="text-black font-bold">address:</span> ${response[0].address}`;
      document.getElementById('email').innerHTML = `<span class="text-black font-bold">email:</span> ${response[0].email}`;
      console.log(response);
    }
  }
</script>

<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/admin/check-admin.php" ?>
<!DOCTYPE html>
<html lang="en">

<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php"; ?>

<body class="  flex">


  <div>
    <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/sidebar.php"; ?>
  </div>

  <content class="p-4 h-dvh grow overflow-y-auto">
    <div class="flex justify-between">
      <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue">Workshop: 10</span> ajax-search-username</h1>
    </div>

    <div class="py-4">
        <form action="" method="get" class="uk-search uk-search-default" onkeyup="fetchData(document.getElementById('username-input').value)">
          <span uk-search-icon></span>
          <input
            id="username-input"
            class="uk-search-input"
            type="search"
            placeholder="Search by username"
            aria-label="Search"
            name="username"
          />

      </form>
    </div>

    <div class="uk-card w-60 h-fit p-4 bg-primary-blue text-sm relative <?php if( $row['role']=='admin') { echo "hidden"; } ?> text-white">
        
      <img id="profile-pic" class="mx-auto py-4 w-40 h-48 object-scale-down"/>
      <p id="username"><span class="text-black font-bold">username:</span> </p>
      <p id="name"><span class="text-black font-bold">name:</span> </p>
      <p id="address"><span class="text-black font-bold">addres:</span> </p>
      <p id="email"><span class="text-black font-bold">email:</span></p>

    </div>
  </content>
</body>

</html>







