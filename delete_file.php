<?php

require_once('connect.php');

if (isset($_GET['id'])) {
  $fileId = $_GET['id'];


  $sql = "SELECT * FROM files WHERE id = $fileId";
  $result = mysqli_query($conn, $sql);
  $file = mysqli_fetch_assoc($result);

  if ($file) {
    $filename = $file['filename'];
    $filepath = "uploads/" . $filename;


    if (unlink($filepath)) {
      header('location:index.php');
    } else {
      echo "There was an error deleting the file.";
    }
  } else {
    echo "File not found.";
  }
}
