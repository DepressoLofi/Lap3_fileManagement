<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['name']; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <?php
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        echo "<h1>  $name </h1>";
        $target_dir = "uploads/";
        $target_file = $target_dir . $name;

        echo "<br>";
        echo "<div class='container'>";
        echo "File Preview:";
        echo "<br>";
        echo "<div class='embed-responsive embed-responsive-21by9'>
                <iframe class='embed-responsive-item' src='preview.php?file=$target_file' allowfullscreen></iframe>
                </div>";
        echo "</div>";
    }

    ?>


</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</html>