<?php include "/home/std/cs6520159/public_html/meth-shop/src/database-instance.php" ?>

<?php
  if (!is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
    $stmt = $pdo->prepare("UPDATE product
                          SET
                          pname=?,
                          pdetail=?,
                          price=?
                          WHERE pid=?");
    $stmt->bindParam(1, $_POST['pname']);
    $stmt->bindParam(2, $_POST['pdetail']);
    $stmt->bindParam(3, $_POST['price']);
    $stmt->bindParam(4, $_POST['pid']);
    $stmt->execute();

    header("location: ".$_SERVER['HTTP_REFERER']);
  } else {
    $stmt = $pdo->prepare("UPDATE product
                          SET
                          pname=?,
                          pdetail=?,
                          price=?,
                          img_path=?
                          WHERE pid=?");
    $stmt->bindParam(1, $_POST['pname']);
    $stmt->bindParam(2, $_POST['pdetail']);
    $stmt->bindParam(3, $_POST['price']);
    $stmt->bindParam(4, $img_path);
    $stmt->bindParam(5, $_POST['pid']);

  $imageFileType = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
  $target_dir="/home/std/cs6520159/public_html/meth-shop/src/assets/product_photo/";
  $target_file = $target_dir . $_POST['pname'].'.' . $imageFileType;
  echo "target file = ".$target_file."<br>";
  echo $_FILES["fileToUpload"]["tmp_name"]."<br>";
  $uploadOk = 1;

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
    unlink($target_file);
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
    $img_path = "/assets/product_photo/".$_POST['pname'].'.' . $imageFileType;

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && $stmt->execute()) {  
      // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      header("location: ".$_SERVER['HTTP_REFERER']);
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  }
  
?>

