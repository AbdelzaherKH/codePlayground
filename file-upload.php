<!DOCTYPE html>
<html>
<head>
    <title>PDF File Upload</title>
</head>
<body>

<?php
$uploadDir = 'uploads/'; // Directory where uploaded files will be stored

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded
    if (!empty($_FILES['pdfFile']['name'])) {
        $targetFile = $uploadDir . basename($_FILES['pdfFile']['name']);
        $uploadOk = true;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is a PDF
        if ($fileType !== 'pdf') {
            echo "Only PDF files are allowed.";
            $uploadOk = false;
        }

        // Check if the file is not too large
        if ($_FILES['pdfFile']['size'] > 5 * 1024 * 1024) { // 5 MB
            echo "File size is too large. Maximum file size is 5MB.";
            $uploadOk = false;
        }

        // Check if the file was uploaded successfully
        if ($uploadOk) {
            if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $targetFile)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading the file.";
            }
        }
    } else {
        echo "Please choose a file to upload.";
    }
}
?>

<h2>Upload a PDF File</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="pdfFile" accept=".pdf">
    <input type="submit" value="Upload">
</form>

</body>
</html>
