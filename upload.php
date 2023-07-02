<?php
// Check if a file is selected
if (isset($_FILES["fileToUpload"])) {
  require_once('connect.php');
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;

  // Check if the file already exsited
  if (file_exists($target_file)) {
    echo "<p class='text-danger font-weight-bold'>Sorry, file already exists.</p>";
    $uploadOk = 0;
  }
  // Move the uploaded file to the target directory and save metadata to the database if no errors occurred
  if ($uploadOk == 1) {
    $sourceFile = $_FILES["fileToUpload"]["tmp_name"];
    if (move_uploaded_file($sourceFile, $target_file)) {
      $filename = basename($_FILES["fileToUpload"]["name"]);
      $size = $_FILES["fileToUpload"]["size"];

      include('uptodate.php');
      echo "<p class='text-success font-weight-bold'>The file " . $filename . " has been uploaded successfully.</p>";
    } else {
      echo "<p class='text-danger font-weight-bold'>Sorry, there was an error uploading your file.</p>";
    }
  }
}
