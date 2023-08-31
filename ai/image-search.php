<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị Hình Ảnh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .image {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <h1>Kết quả Hình Ảnh</h1>

    <?php
    ob_start();
    // Lấy dữ liệu file
    $file = $_FILES["img"];

    // Kiểm tra xem file có phải là ảnh không
    if (!is_uploaded_file($file['tmp_name'])) {
        return false;
    }

    // Lấy tên file
    $filename = $file['name'];

    move_uploaded_file($file['tmp_name'], $filename);
    $new_filename = 'img_to_search.png';
    rename($filename, $new_filename);

    system('echo "yes" | python ai.py');

    $imageDirectory = '/NienLuan/assets/images/products/TC/';
    ob_end_clean();

    // Mở tệp "data.txt" để đọc
    $myfile = fopen("data.txt", "r");

    // Kiểm tra xem tệp đã mở thành công chưa
    if ($myfile) {
        while (!feof($myfile)) {
            $line = trim(fgets($myfile)); // Lấy dòng và loại bỏ khoảng trắng
            if (!empty($line)) { // Kiểm tra xem dòng có dữ liệu không
                $productCode = preg_replace('/\..*$/', '', $line); // Loại bỏ phần đuôi tệp ảnh
                echo '<a href="product-detail.php?id=' . $productCode . '"><img src="' . $imageDirectory . $line . '" alt="Image"></a><br>';
            }
        }

        fclose($myfile); // Đóng tệp sau khi sử dụng
    } else {
        echo "Không thể mở tệp data.txt";
    }
    ?>

</body>
</html>
