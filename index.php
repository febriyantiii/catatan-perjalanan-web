<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Catatan Perjalanan | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   
    <a href=""><b>Aplikasi Catatan Perjalanan</b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Aplikasi</p>

      <form action="config/proses_login.php" method="post">
        <div class="input-group mb-3">
          <input type="number" name="nik" class="form-control" placeholder="Masukkan NIK" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
        </div>
      </form>
      <p class="mb-0">
        <a href="register.php" class="text-center">Belum punya akun? Klik disini!</a>
      </p>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

<script>
  // Validasi sederhana sebelum submit
  document.querySelector('form').addEventListener('submit', function (e) {
      const nik = document.querySelector('input[name="nik"]').value;
      const nama = document.querySelector('input[name="nama_lengkap"]').value;

      if (nik.length !== 16) {
          alert('NIK harus 16 digit.');
          e.preventDefault();
      } else if (!nama.trim()) {
          alert('Nama lengkap tidak boleh kosong.');
          e.preventDefault();
      }
  });
</script>
</body>
</html>
