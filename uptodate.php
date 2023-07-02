<?php
require_once('connect.php');

$clearSql = "TRUNCATE TABLE files";
mysqli_query($conn, $clearSql);

$folderPath = "C:/xampp/htdocs/Lap3_fileManagement/Uploads";

$categories = [
    'images' => ['jpg', 'jpeg', 'png', 'gif'],
    'documents' => ['pdf', 'doc', 'docx', 'txt'],
    'videos' => ['mp4', 'avi', 'mov'],
];

$files = scandir($folderPath);
foreach ($files as $file) {
    if ($file === '.' || $file === '..') {
        continue;
    }

    $fileName = $file;
    $filePath = $folderPath . '/' . $file;
    $fileSize = filesize($filePath);

    $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $fileCategory = '';

    foreach ($categories as $category => $extensions) {
        if (in_array($fileExtension, $extensions)) {
            $fileCategory = $category;
            break;
        }
    }

    $sql = "INSERT INTO files (filename, size, category) VALUES ('$fileName', $fileSize, '$fileCategory')";
    mysqli_query($conn, $sql);
}
?>

