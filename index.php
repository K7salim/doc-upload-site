<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload Site</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h1 class="mb-4">📄 Document Upload</h1>

        <form action="upload.php" method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="mb-3">
                <input type="file" name="document" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <h2 class="mb-3">🗂️ Uploaded Files</h2>
        <ul class="list-group">
            <?php
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $files = array_diff(scandir($uploadDir), array('.', '..'));

                if (count($files) === 0) {
                    echo "<li class='list-group-item'>No documents uploaded yet.</li>";
                } else {
                    foreach ($files as $file) {
                        echo "<li class='list-group-item'><a href='uploads/$file' target='_blank'>$file</a></li>";
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>
