<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fruit</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">

  <style>
    body{
      font-family: "Afacad Flux", sans-serif;
      font-optical-sizing: auto;
      font-weight: <weight>;
      font-style: normal;
      font-variation-settings;
      "slnt" 0;
    }
  </style>

  <script>
    function calculate() {
      httpRequest = new XMLHttpRequest();
      httpRequest.onreadystatechange = showResult;

      const mangoPrice = document.getElementById('mango').value * 30;
      const orangePrice = document.getElementById('orange').value * 70;
      const bananaPrice = document.getElementById('banana').value * 30;

      const totalPrice = mangoPrice + orangePrice + bananaPrice;

      const url = `calculate-price.php?price=${totalPrice}`

      httpRequest.open("GET", url);
      httpRequest.send();
    }

    function showResult() {
      const state = httpRequest.readyState;
      const status = httpRequest.status;
      if ( state == 4 && status == 200 ) {
        document.getElementById('result').innerHTML = httpRequest.responseText;
      }
    }
  </script>

</head>
<body class="p-4">
  <h1 class="text-2xl font-bold">Order record</h1>
  
  <form action="" class="flex flex-col gap-2 py-4">
    <div class="flex items-center gap-2">
      <label for="mango">Mango 30Bath / KG</label>
      <input id="mango"
             type="number" class="border-2 border-black rounded-md p-2"
             onkeyup="calculate()">kg.
    </div>
    <div class="flex items-center gap-2">
      <label for="orange">Orange 70Bath / KG</label>
      <input id="orange"
             type="number" class="border-2 border-black rounded-md p-2"
             onkeyup="calculate()">kg.
    </div>
    <div class="flex items-center gap-2">
      <label for="banana">Banana 30Bath / Bunch</label>
      <input id="banana"
             type="number" class="border-2 border-black rounded-md p-2"
             onkeyup="calculate()">bunch.
    </div>
  </form>
  
  <p id="result" class="font-bold"></p>

</body>
</html>