<!DOCTYPE html>
<html>
<head>
    <title>Document Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <div class="container">
        <h1>Upload Document</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <input type="file" name="document" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <h2>Uploaded Documents</h2>
        <ul class="list-group">
            <?php
                $files = scandir("uploads");
                foreach ($files as $file) {
                    if ($file !== "." && $file !== "..") {
                        echo "<li class='list-group-item'><a href='uploads/$file' target='_blank'>$file</a></li>";
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>
