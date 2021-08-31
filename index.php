<form action="index.php" method="post" enctype="multipart/form-data">
    Select File:
    <input type="file" name="fileToUpload"/>
    <input type="submit" value="Upload Image" name="submit"/>
</form>

<form action="download.php" method="post">
    <input type="submit" value="Download file" name="submit"/>
</form>

<?php

uploadfile();
downloadfile();

function uploadfile() {
  if (key_exists('fileToUpload', $_FILES)) {
    $file_name = $_FILES['fileToUpload']['name'];
    $dir = getcwd() . '/' . $file_name;
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dir)) {
      echo "File uploaded successfully!";
    }
    else {
      echo "Sorry, file not uploaded, please try again!";
    }
  }

}

function downloadfile() {
  $file_path = getcwd() . '/ar.po';
  header('Content-Type: application/octet-stream');
  header("Content-Transfer-Encoding: Binary");
  header("Content-disposition: attachment; filename=\"" . basename($file_path) . "\"");
  readfile($file_path);

}

?>