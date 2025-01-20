<?php

// Ambil data dari form
$nik = $_POST['nik'];
$nama_lengkap = $_POST['nama_lengkap'];

// Format data yang akan dicocokkan
$format = "$nik|$nama_lengkap";

// Baca file config.txt
$data = @file('config.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Jika file tidak ditemukan atau kosong
if ($data === false || empty($data)) {
    echo "<script>
        alert('Data tidak ditemukan. Silakan daftar terlebih dahulu.');
        window.location.assign('../register.php');
    </script>";
    exit();
}

// Cek apakah data cocok
if (in_array($format, $data)) {
    session_start();
    $_SESSION['nik'] = $nik;
    $_SESSION['nama_lengkap'] = $nama_lengkap;

    // Redirect ke halaman user
    header("Location: ../user.php");
    exit();
} else {
    // Jika login gagal
    echo "<script>
        alert('Login gagal! NIK dan Nama Lengkap tidak ditemukan.');
        window.location.assign('../index.php');
    </script>";
    exit();
}
?>
