<?php
require_once('connect.php');
$folderPath = "C:/xampp/htdocs/Lap3_fileManagement/Uploads";

$categories = [
    'image' => ['jpg', 'jpeg', 'png', 'gif'],
    'document' => ['pdf', 'doc', 'docx', 'txt'],
    'video' => ['mp4', 'avi', 'mov'],
    'Audio'=> ['mp3' , 'wav' , 'm4a' ,  'wma']
    'Unknown' => ['max' , 'obj' ,  '3dm']
    'Web files' => ['asp' , 'aspx', 'html' , 'php']
];

foreach ($categories as $category => $extensions) {
    $categoryPath = $folderPath . '/' . $category;
    if (!is_dir($categoryPath)) {
        mkdir($categoryPath);
    }

    foreach ($extensions as $extension) {
        $files = glob($folderPath . '/*.' . $extension);

        foreach ($files as $file) {
            $newFilePath = $categoryPath . '/' . basename($file);
            rename($file, $newFilePath);
        }
    }
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if a file is selected
if (isset($_FILES["fileToUpload"])) {
  $file = $_FILES["fileToUpload"];
  
  if ($file["error"] === UPLOAD_ERR_OK) {
    // Proceed with the upload
    if ($_FILES["fileToUpload"]["size"] > 0) {
      echo "File uploaded successfully!";

       // Display file preview
       echo "<br>";
       echo "File Preview:";
       echo "<br>";
       echo "<iframe src=\"preview.php?file=$target_file\"></iframe>";

      // Your code for handling the uploaded file
    } else {
      echo "Sorry, the uploaded file is empty.";
      $uploadOk = 0;
    }
  } else {
    echo "Error uploading file.";
    $uploadOk = 0;
  }
} else {
  echo "Please select a file.";
  $uploadOk = 0;
}

// Check if file already exists
if ($uploadOk == 1 && file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
// Move the uploaded file to the target directory and save metadata to the database if no errors occurred
if ($uploadOk == 1) {
  $sourceFile = $_FILES["fileToUpload"]["tmp_name"];
  if (move_uploaded_file($sourceFile, $target_file)) {
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $size = $_FILES["fileToUpload"]["size"];

    // Insert file metadata into the database
    $sql = "INSERT INTO files (filename, size) VALUES ('$filename', $size)";
    if (mysqli_query($conn, $sql)) {
      echo "The file " . $filename . " has been uploaded successfully.";
    } else {
      echo "Error uploading file: " . mysqli_error($conn);
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>