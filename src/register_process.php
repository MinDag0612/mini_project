<?php
    include 'db.php'; 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hoTen = $_POST['hoTen'] ?? '';
        $ngaySinh = $_POST['ngaySinh'] ?? '';
        $gioiTinh = $_POST['gioiTinh'] ?? '';
        $mssv = $_POST['mssv'] ?? '';
        $email = $_POST['email'] ?? '';
        $pass = $_POST['pass'] ?? '';
    
        // Không lấy email và password để đưa vào JSON
        // Tạo mảng
        $data = [
            'hoTen' => $hoTen,
            'ngaySinh' => $ngaySinh,
            'gioiTinh' => $gioiTinh,
            'mssv' => $mssv
        ];

        // Chuyển thành JSON
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);

        $jsonSafe = pg_escape_literal($conn, $json);
        $emailSafe = pg_escape_literal($conn, $email);
        $passSafe = pg_escape_literal($conn, $pass);
    

        $sql = "INSERT INTO account (userdata, email, pass) values ($jsonSafe, $emailSafe, $passSafe)";

        $result = pg_query($conn, $sql);
        if ($result) {
            session_start();
            $_SESSION['sign-up-success'] = "done";
            header("Location: index.php");
            exit();
        } else {
            echo "Lỗi khi thêm dữ liệu: " . pg_last_error($conn);
        }
    }

    
    
?>