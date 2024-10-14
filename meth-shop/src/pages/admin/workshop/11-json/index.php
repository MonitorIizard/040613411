<script>
  async function getData() {
    const response = await fetch('/~aws/JSON/priv_hos.json');
    const objectData = await response.json();
    console.log( objectData );
    const hospitalData = objectData.features;

    const resultCase1 = document.getElementById('result-case-1');
    const resultCase2 = document.getElementById('result-case-2');
    const resultCase3 = document.getElementById('result-case-3');
    
    hospitalData.map( (row) => {
      
      const hospitalName = `${row.properties.name}`;
      const bed = `${row.properties.num_bed}`;
      const td1 = document.createElement('td');
      td1.innerHTML = hospitalName;
      
      const td2 = document.createElement('td');
      td2.innerHTML = bed;

      const tr = document.createElement('tr');
      tr.appendChild(td1);
      tr.appendChild(td2);

      if ( bed < 30 ) {
        resultCase1.appendChild(tr);
      }else if ( bed < 90 ) {
        resultCase2.appendChild(tr);
      } else {
        resultCase3.appendChild(tr);
      }

      }
    )
  }

  getData();
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
      <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue">Workshop: 11</span> JSON-hospital</h1>
    </div>

      <div class="flex gap-4">
        <div>
          <h2 class="text-2xl"> < 30 </h2>
          <table id="result-case-1" >
            <thead>
              <th>Name</th>
              <th>Bed</th>
            </thead>
          </table>
        </div>
        <hr>
        <div>
          <h2 class="text-2xl"> < 60 </h2>
          <table id="result-case-2" >
            <thead>
              <th>Name</th>
              <th>Bed</th>
            </thead>
          </table>
        </div>
        <hr>
        <div>
          <h2 class="text-2xl"> < 90 </h2>
          <table id="result-case-3" >
            <thead>
              <th>Name</th>
              <th>Bed</th>
            </thead>
          </table>
        </div>
      </div>
  </content>
</body>

</html>







