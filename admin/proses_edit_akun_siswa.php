<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $password = $_POST['pass'];

    // Hash password menggunakan MD5
    $hashed_password = md5($password);

    // Query untuk mengupdate data siswa
    $query = "UPDATE akun_siswa SET nama = '$nama', password = '$hashed_password' WHERE nis = '$nis'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Data berhasil diupdate, redirect ke halaman siswa.php
        echo '<script>alert("Data berhasil diubah!"); window.location = "siswa.php";</script>';
        exit();
    } else {
        // Terjadi kesalahan saat mengupdate data
        echo "Gagal mengupdate data siswa.";
    }
} else {
    // Metode request selain POST tidak diizinkan
    echo "Metode request tidak valid.";
}
?>
