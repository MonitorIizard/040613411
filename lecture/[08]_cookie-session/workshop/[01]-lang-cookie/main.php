<html>
  <body>
  <?php
     if ( !isset($_COOKIE['lang']) ) {
      echo "Welcome to my website! Click here for a tour";
     }

    $lang = $_COOKIE['lang'];
    if ($lang == 'en' ) {
      echo "Hello Welcome have room.";
    } else if ($lang == 'th' ) {
      echo "สวัสดีครับ ผม";
    }
  ?> 
  </body>
</html>