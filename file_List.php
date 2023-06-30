<?php

require_once('connect.php');
  $sql = "SELECT * FROM files";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "File Name: " . $row["filename"] . "<br>";
      echo "Size: " . $row["size"] . "<br>";
      echo "Upload Date: " . $row["upload_date"] . "<br><br>";
    }
  } else {
    echo "No files found.";
  }
?>
