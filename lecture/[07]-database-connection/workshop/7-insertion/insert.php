<?php include "../../database-instance.php" ?>

<?php 
  $stmt= $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
   $stmt->bindParam(1, $_POST['username']);
   $stmt->bindParam(2, $_POST['password']);
   $stmt->bindParam(3, $_POST['name']);
   $stmt->bindParam(4, $_POST['address']);
   $stmt->bindParam(5, $_POST['mobile']);
   $stmt->bindParam(6, $_POST['email']);
  $stmt->execute();

  $imageFileType = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
  $target_dir="../../member_photo/";
  $target_file = $target_dir . $_POST['username'].'.' . $imageFileType;
  echo "target file = ".$target_file."<br>";
  echo $_FILES["fileToUpload"]["tmp_name"]."<br>";
  $uploadOk = 1;

  // Check if image file is a actual image or fake image

  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  // header("Location: ../8-show-detail/show-detail.php?username=".$_POST['username']);
?>

<html>
  <head> <meta charset="UTF-8"></head>
  <body>
    Add user successfully.
    <h1>Hello world</h1>
  </body>

</html>



