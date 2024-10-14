<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>
<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/admin/check-admin.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "/home/std/cs6520159/public_html/meth-shop/src/pages/header.php"; ?>

<body class="text-black flex">
  <?php include "/home/std/cs6520159/public_html/meth-shop/src/components/sidebar.php"; ?>

  <content class="p-4 h-dvh grow overflow-y-auto">

    <h1 class="text-4xl font-bold py-4"><span class="text-primary-blue">Workshop 2:</span>  Member Lists </h1>
    
    <div class="mx-auto w-full">
    <?php
  $stmt = $pdo->prepare("SELECT * FROM member;");
  $stmt->execute();
  while ($row = $stmt->fetch()) {
  ?>
     <p>ชื่อสมาชิก : <?=$row ["name"]?></p>
     <p><?=$row ["address"]?></p>
     <p><?=$row ["email"]?></p>
	<hr>
  <?php } ?>
    </div>
    




    <h2 class="text-2xl font-bold py-4"> Code </h2>
    


    <iframe class="mx-auto"
  src="https://carbon.now.sh/embed?bg=rgba%28171%2C+184%2C+195%2C+1%29&t=seti&wt=none&l=auto&width=680&ds=true&dsyoff=20px&dsblur=68px&wc=true&wa=true&pv=56px&ph=56px&ln=false&fl=1&fm=Hack&fs=14px&lh=133%25&si=false&es=2x&wm=false&code=%253C%253Fphp%250A%2520%2520%2524stmt%2520%253D%2520%2524pdo-%253Eprepare%28%2522SELECT%2520*%2520FROM%2520member%253B%2522%29%253B%250A%2520%2520%2524stmt-%253Eexecute%28%29%253B%250A%2520%2520while%2520%28%2524row%2520%253D%2520%2524stmt-%253Efetch%28%29%29%2520%257B%250A%2520%2520%253F%253E%250A%2520%2520%2520%2520%2520%253Cp%253E%25E0%25B8%258A%25E0%25B8%25B7%25E0%25B9%2588%25E0%25B8%25AD%25E0%25B8%25AA%25E0%25B8%25A1%25E0%25B8%25B2%25E0%25B8%258A%25E0%25B8%25B4%25E0%25B8%2581%2520%253A%2520%253C%253F%253D%2524row%2520%255B%2522name%2522%255D%253F%253E%253C%252Fp%253E%250A%2520%2520%2520%2520%2520%253Cp%253E%253C%253F%253D%2524row%2520%255B%2522address%2522%255D%253F%253E%253C%252Fp%253E%250A%2520%2520%2520%2520%2520%253Cp%253E%253C%253F%253D%2524row%2520%255B%2522email%2522%255D%253F%253E%253C%252Fp%253E%250A%2509%253Chr%253E%250A%2520%2520%253C%253Fphp%2520%257D%2520%253F%253E"
  style="width: 563px; height: 372px; border:0; transform: scale(1); overflow:hidden;"
  sandbox="allow-scripts allow-same-origin">
</iframe>


  </content>
</body>

</html>


