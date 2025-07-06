<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $fileName = basename($_FILES['document']['name']);
    $targetPath = $uploadDir . $fileName;

    // Optional: Check file type, size, etc.
    if (move_uploaded_file($_FILES['document']['tmp_name'], $targetPath)) {
        header("Location: index.php?success=1");
    } else {
        echo "Upload failed!";
    }
} else {
    header("Location: index.php");
}
