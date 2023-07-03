<?php
require_once('connect.php');
if (isset($_GET['searchName'])) {
    $search = $_GET['searchName'];
    $sql = "SELECT * FROM files WHERE filename LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM files";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        $filesize = $row["size"];
        $fsize = "";
        if ($row["size"] < 1024) {
            $fsize = 1 . "kb";
        }
        if (1024 <= $row["size"] && $row["size"] <= 1000000) {
            $filesize /= 1024;
            $fsize = round($filesize, 1) . ' kb';
        } elseif ($row["size"] >= 1000000) {
            $filesize /= 1000000;
            $fsize = round($filesize, 1) . ' mb';
        }  // file size unit 
        echo "<tr>";
        echo "<td><a href='previewpage.php?name=$row[filename]'>" . $row["filename"] . "</a></td>";
        echo "<td>" . $fsize . "</td>";
        echo "<td>" . $row["category"] . "</td>"; // Add the Category column
        echo "<td>
            <a href='Uploads/" . $row["filename"] . "' class='btn btn-success' download>Download</a> 
            <a href='delete_file.php?id=$row[id]' onclick='return confirm(\"Are you sure you want to delete this file?\")' class='btn btn-danger'>Delete</a> 
        </td>";
        echo "</tr>";
    }
    echo "</tbody>";
} else {
    echo "<tr><td colspan=\"4\"><p>No files found.</p></td></tr>";
}
