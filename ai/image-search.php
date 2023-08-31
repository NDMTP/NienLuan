<?php
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

    // Mở tệp "data.txt" để đọc
    $myfile = fopen("data.txt", "r");

    // Kiểm tra xem tệp đã mở thành công chưa
    if ($myfile) {
        while (!feof($myfile)) {
            $line = trim(fgets($myfile)); // Lấy dòng và loại bỏ khoảng trắng
            if (!empty($line)) { // Kiểm tra xem dòng có dữ liệu không
                echo '<img src="' . $imageDirectory . $line . '" alt="Image"><br>';
            }
        }

        fclose($myfile); // Đóng tệp sau khi sử dụng
    } else {
        echo "Không thể mở tệp data.txt";
    }
?>
