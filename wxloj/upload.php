<?php
$target_dir = "file/"; // 文件保存目录

// 检查是否有文件被上传
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['filesToUpload'])) {
    foreach ($_FILES['filesToUpload']['name'] as$i => $name) {
        if ($_FILES['filesToUpload']['error'][$i] == 0) {
            $target_file =$target_dir . basename($name); // 完整的文件路径
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // 获取文件类型

            // 检查文件是否已经存在
            if (file_exists($target_file)) {
                echo "文件 " . $name . " 已存在。<br>";
                continue;
            }

            // 检查文件大小
            if ($_FILES['filesToUpload']['size'][$i] > 50000000) { // 限制为50MB
                echo "文件 " . $name . " 太大。<br>";
                continue;
            }

            // 允许特定格式的文件（如果需要的话）
            // if($fileType != "jpg" &&$fileType != "png" && $fileType != "jpeg" &&$fileType != "gif" ) {
            //     echo "文件 " . $name . " 格式不正确。<br>";
            //     continue;
            // }

            // 尝试上传文件
            if (move_uploaded_file($_FILES['filesToUpload']['tmp_name'][$i], $target_file)) {
                echo "文件 " . htmlspecialchars($name) . " 已上传。<br>";
            } else {
                echo "文件 " . $name . " 上传出错。<br>";
            }
        }
    }
} else {
    echo "请选择文件上传。";
}
?>
