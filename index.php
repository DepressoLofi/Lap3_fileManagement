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

        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Size</th>
                    <th>Upload Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php require_once('file_list.php') ?>

    </div>




    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>