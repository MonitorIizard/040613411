<script>
  function fetchOrder( username ) {
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = showResult;
    bindingUsername = username;

    console.log(username);
    const url = `/~cs6520159/meth-shop/src/query/my-order.php?for=ajax&username=${username}`

    httpRequest.open("GET", url);
    httpRequest.send();
  }

  async function  showResult() {
    const state = httpRequest.readyState;
    const status = httpRequest.status;
    if ( state == 4 && status == 200 ) {
      // document.getElementById('result').innerHTML = httpRequest.responseText;
      const text = httpRequest.response;
      const json = await JSON.parse(text);
      const result = document.getElementById(bindingUsername+'-result');

      console.log(json);
      json.map(row => {
        const tr = document.createElement('tr');

        const tdPname = document.createElement('td');
        tdPname.innerHTML = row.pname;

        const tdQuantity = document.createElement('td');
        tdQuantity.innerHTML = row.quantity;

        const tdOrdDate = document.createElement('td');
        tdOrdDate.innerHTML = row.ord_date;

        const tdStatus = document.createElement('td');
        tdStatus.innerHTML = row.status;

        const tdCost = document.createElement('td');
        tdCost.innerHTML = row.cost;

        tr.appendChild(tdPname);
        tr.appendChild(tdQuantity);
        tr.appendChild(tdOrdDate);
        tr.appendChild(tdStatus);
        tr.appendChild(tdCost);
        result.appendChild(tr);
      });
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
      <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue">Orders</h1>
    </div>

    <?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php"; 
      $stmt = $pdo->prepare('SELECT * from member');
      $stmt->execute();

      while( $row = $stmt->fetch() ) {
    ?>
      <button uk-toggle="target: #<?= $row['username']?>" type="button" onclick="fetchOrder('<?= $row['username']?>')"><?= $row['username']?></button>
      
      <div class="shadow-lg" id="<?= $row['username']?>" hidden>
      <table class="uk-table uk-table-divider text-black
                    shadow-sm">
        <thead class="bg-primary-blue  ">
          <th><span class="font-bold">product name</span></th>
          <th><span class="font-bold">quantity</span></th>
          <th><span class="font-bold">order date</span></th>
          <th><span class="font-bold">status</span></th>
          <th><span class="font-bold">cost</span></th>
        </thead>
        <tbody id="<?= $row['username']?>-result">
        </tbody>
      </table>
    </div>
    <br>
    <?php } ?>
  </content>
</body>

</html>







