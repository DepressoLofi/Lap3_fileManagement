<!DOCTYPE html>

<html>

<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php require("uptodate.php") ?>


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




    <div class="list-container">

        <h2 class="mx-5">List of Files</h2>


        <div class="tableFixHead">


            <table class='table table-striped'>
                <thead class="thead-dark">
                    <tr>
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Action</th>
                    </tr>
                </thead>

        </div>
        <?php require_once('file_list.php') ?>
        </table>

    </div>






    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>