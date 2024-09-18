<html>
  <body>
    <?php
      $co untry = $_POST["country"];
      $language = $_POST["lang"];
      echo "You are from " . $country . ".<br>";
      echo "You preferred " . $language . " language.";
    ?>
  </body>
</html>