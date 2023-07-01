<!DOCTYPE html>

<html>
<head>
  <title>File Upload</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="upload-container">
      <h2>Upload a File</h2>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="custom-file mb-3">
          <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload">
          <label class="custom-file-label" for="fileToUpload">Choose File</label>
      
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
    </div>
  </div>



  <div class="delete-container">
  <h2>Delete Files</h2>
  <?php
  require_once('connect.php');
  $sql = "SELECT * FROM files";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-striped'>
            <thead>
              <tr>
                <th>File Name</th>
                <th>Size</th>
                <th>Upload Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["filename"] . "</td>";
      echo "<td>" . $row["size"] . "</td>";
      echo "<td>" . $row["upload_date"] . "</td>";
      echo "<td><a href='delete_file.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this file?\")' class='btn btn-danger'>Delete</a></td>";
      echo "</tr>";
    }
    echo "</tbody>
          </table>";
  } else {
    echo "<p>No files found.</p>";
  }
  ?>
</div>




  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>