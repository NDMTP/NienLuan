<!DOCTYPE html>
<html>
<head>
    <title>TensorFlow Web Page</title>
</head>
<body>

<h1>TensorFlow Web Page</h1>

<?php
// Gọi mã Python từ tệp app.py và in kết quả
$python_script = 'python3 C:\xampp\htdocs\NienLuan\kaggle_ai\app.py'; // Thay đổi thành đường dẫn thực tế
$output = shell_exec($python_script);
echo "<pre>$output</pre>";
?>

</body>
</html>
