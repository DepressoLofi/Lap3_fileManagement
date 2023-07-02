<?php
require_once('connect.php');
$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  echo "<tbody>";
  while ($row = mysqli_fetch_assoc($result)) {

    $filesize = $row["size"];
    if (1024 <= $row["size"] && $row["size"] <= 1000000) {
      $filesize /= 1024;
      $fsize = round($filesize, 1) . ' kb';
    } elseif ($row["size"] >= 1000000) {
      $filesize /= 1000000;
      $fsize = round($filesize, 1) . ' mb';
    }
    echo "<tr>";
    echo "<td>" . $row["filename"] . "</td>";
    echo "<td>" . $fsize . "</td>";
    echo "<td>
    <a href='Uploads/" . $row["filename"] . "' class='btn btn-success' download> Download</a> 
    <a href='delete_file.php?id=$row[id]' onclick='return confirm(\"Are you sure you want to delete this file?\")' class='btn btn-danger'>Delete</a> 
    </td>";
    echo "</tr>";
  }
  echo "</tbody>
        ";
} else {
  echo "<p>No files found.</p>";
}
