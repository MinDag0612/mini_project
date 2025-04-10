<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 shadow" style="width: 22rem;">
    <h4 class="mb-4 text-center">Đăng nhập</h4>
    <form action="main.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="pass">
      </div>
      <button type="submit" class="btn btn-success w-100">Đăng nhập</button>
      <div class="d-flex justify-content-end mt-3">
        <span>no account ?</span>
        <a href="signup.php" class="mx-1">Sign up</a>
      </div>
    </form>
    <?php
        if (isset($_SESSION['err'])){
          echo '<div class="alert alert-danger mt-1" role="alert">
                <strong>Oh snap!</strong> Wrong email or password.
                </div>';
                unset($_SESSION['err']);
        }

        if(isset($_SESSION['sign-up-success'])){
          echo '<div class="alert alert-success mt-1" role="alert">
                <strong>Congratulation</strong> Please sign in !
                </div>';
          unset($_SESSION['sign-up-success']);
        }
    
    ?>
  </div>

</body>

</html>