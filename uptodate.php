<?php
require('connect.php');
$clearSql = "TRUNCATE TABLE files";
mysqli_query($conn, $clearSql);



$folderPath = "C:/xampp/htdocs/Lap3_fileManagement/Uploads";


$files = scandir($folderPath);
foreach ($files as $file) {
    if ($file === '.' || $file === '..') {
        continue;
    }

    $fileName = $file;
    $filePath = $folderPath . '/' . $file;
    $fileSize = filesize($filePath);

    $sql = "INSERT INTO files (filename, size) VALUES ('$fileName', '$fileSize')";
    mysqli_query($conn, $sql);
}
