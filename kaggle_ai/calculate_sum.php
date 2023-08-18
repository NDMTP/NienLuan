<!-- calculate_sum.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Calculate Sum</title>
</head>
<body>
    <h1>Calculate Sum</h1>
    
    <form action="calculate_sum.php" method="POST">
        Number 1: <input type="text" name="num1"><br>
        Number 2: <input type="text" name="num2"><br>
        <input type="submit" value="Calculate">
    </form>
    
    <?php
$python_script = "C:/Users/Admin/AppData/Local/Programs/Python/Python311/python.exe"; // Đường dẫn đến trình thông dịch Python
$app_py_path = "C:/xampp/htdocs/NienLuan/kaggle_ai/app.py"; // Đường dẫn đến tệp app.py
$command = "$python_script $app_py_path";

$python_output = shell_exec($command);

echo $python_output;
?>

</body>
</html>
