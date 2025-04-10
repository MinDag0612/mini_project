<?php
    include 'db.php'; 
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT userdata FROM account WHERE email = '$email' AND pass = '$pass'";
    $userdata = pg_query($conn, $sql);
    if ($userdata && pg_num_rows($userdata) > 0){
        $result = pg_fetch_assoc(pg_query($conn, $sql));
        $name = json_decode($result['userdata'], true)['hoTen'];
        $ngaySinh = json_decode($result['userdata'], true)['ngaySinh'];
        $mssv = json_decode($result['userdata'], true)['mssv'];
        $gioitinh = json_decode($result['userdata'], true)['gioiTinh'];
    }
    else {
        session_start();
        $_SESSION['err'] = "Wrong email or password";
        header("location: index.php");
        exit();
    }
?>

<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <title>Thẻ Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container py-5">
      
      <div class="row justify-content-center g-4">

        <!-- Thẻ 1: Kiểu truyền thống -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-primary">Thẻ Sinh Viên</h5>
              <p><strong>Họ tên:</strong> <?= $name ?></p>
              <p><strong>Ngày sinh:</strong> <?= $ngaySinh ?></p>
              <p><strong>MSSV:</strong> <?= $mssv ?></p>
              <p><strong>Giới tính:</strong> <?= $gioitinh ?></p>
            </div>
          </div>
        </div>

        <!-- Thẻ 2: Màu gradient + icon -->
        <div class="col-md-4">
          <div class="card text-white" style="background: linear-gradient(135deg, #4facfe, #00f2fe);">
            <div class="card-body">
              <h4 class="card-title">🎓 Thẻ Sinh Viên</h4>
              <p>👤 <strong>Họ tên:</strong> <?= $name ?></p>
              <p>🎂 <strong>Ngày sinh:</strong> <?= $ngaySinh ?></p>
              <p>🆔 <strong>MSSV:</strong> <?= $mssv ?></p>
              <p>⚧️ <strong>Giới tính:</strong> <?= $gioitinh ?></p>
            </div>
          </div>
        </div>

        <!-- Thẻ 3: Phong cách kỹ thuật/dark -->
        <div class="col-md-4">
          <div class="card text-white bg-dark">
            <div class="card-header bg-success">🔐 Student ID</div>
            <div class="card-body">
              <p><strong>Name:</strong> <span class="text-success"><?= $name ?></span></p>
              <p><strong>DOB:</strong> <?= $ngaySinh ?></p>
              <p><strong>MSSV:</strong> <?= $mssv ?></p>
              <p><strong>Sex:</strong> <?= $gioitinh ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
