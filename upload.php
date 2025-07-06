<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $file = $_FILES['document'];
    $fileName = basename($file['name']);
    $targetPath = $uploadDir . $fileName;

    // Optional: allow only certain file types
    $allowedTypes = ['pdf', 'doc', 'docx', 'txt'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($fileExt, $allowedTypes)) {
        echo "❌ File type not allowed.";
        exit;
    }

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        header("Location: index.php?success=1");
        exit;
    } else {
        echo "❌ Upload failed.";
    }
} else {
    header("Location: index.php");
    exit;
}
