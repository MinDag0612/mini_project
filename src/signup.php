<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100 m-5">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <h2 class="mb-4 text-center">Đăng ký tài khoản</h2>
            <form action="register_process.php" method="POST">

                <!-- Họ tên -->
                <div class="mb-3">
                    <label for="hoTen" class="form-label">Họ tên</label>
                    <input type="text" class="form-control" id="hoTen" placeholder="Nhập họ tên" name="hoTen">
                </div>

                <!-- Ngày sinh -->
                <div class="mb-3">
                    <label for="ngaySinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngaySinh" name="ngaySinh">
                </div>

                <!-- Giới tính -->
                <div class="mb-3">
                    <label class="form-label">Giới tính</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioiTinh" id="nam" value="Nam">
                            <label class="form-check-label" for="nam">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioiTinh" id="nu" value="Nữ">
                            <label class="form-check-label" for="nu">Nữ</label>
                        </div>
                    </div>
                </div>

                <!-- Mã số sinh viên -->
                <div class="mb-3">
                    <label for="mssv" class="form-label">Mã số sinh viên</label>
                    <input type="text" class="form-control" id="mssv" placeholder="Nhập MSSV" name="mssv">
                </div>

                <!-- Nhóm Email + Password -->
                <div class="border rounded p-3 mb-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="pass">
                    </div>
                    <div class="alert alert-secondary" role="alert">
                        <strong>Note:</strong> This just email and passwword <strong>for this page</strong>
                    </div>

                </div>

                <!-- Nút đăng ký -->
                <button type="submit" class="btn btn-primary w-100">Đăng ký</button>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {
      const hoTen = document.getElementById("hoTen").value.trim();
      const ngaySinh = document.getElementById("ngaySinh").value;
      const mssv = document.getElementById("mssv").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const gioiTinhNam = document.getElementById("nam").checked;
      const gioiTinhNu = document.getElementById("nu").checked;

      // Kiểm tra các trường bắt buộc
      if (!hoTen || !ngaySinh || !mssv || !email || !password || (!gioiTinhNam && !gioiTinhNu)) {
        e.preventDefault(); // Chặn gửi form
        alert("Vui lòng nhập đầy đủ tất cả các thông tin.");
      }
    });
  });
</script>

</html>