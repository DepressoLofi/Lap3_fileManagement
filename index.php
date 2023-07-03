<!DOCTYPE html>
<html>


<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background-color:#bdc3c7;">
    <?php require("uptodate.php") ?>


    <div class="container">
        <h1 class="mb-3">File Manager</h1>
        <div class="row">
            <div class="col-8">

                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter file name" name="searchName" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="submit">Search</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-3">
                <div class="upload-container">

                    <form method="post" enctype="multipart/form-data">
                        <div class="custom-file mb-3">
                            <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
                            <label class="custom-file-label" for="fileToUpload">Choose File</label>

                        </div>
                        <button type="submit" class="btn btn-warning">Upload</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="upload-status"><?php include('upload.php'); ?></div>


    </div>


    <div class="list-container">

        <div class="d-flex ml-5">
            <a href="index.php"><button class="btn btn-warning border border-dark"><i class="fa-sharp fa-solid fa-rotate-right fa-xl" style="color: #000000;"></i></button></a>
            <h2 class=" ml-2">List of Files</h2>
        </div>



        <div class="tableFixHead border border-dark border-3">


            <table class='table table-striped bg-white'>
                <thead class="thead-dark">
                    <tr>
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>

        </div>
        <?php require_once('file_list.php') ?>
        </table>

    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('fileToUpload').addEventListener('change', function(event) {
            var input = event.target;
            var fileName = input.files[0].name;
            var label = input.nextElementSibling;
            label.innerText = fileName;
        });
    </script>
</body>

</html>