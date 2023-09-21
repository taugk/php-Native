<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    // Lakukan query untuk menghapus data berdasarkan nama
    $delete_sql = "DELETE FROM akun_siswa WHERE nama = '$nama'";
    $delete_query = mysqli_query($conn, $delete_sql);

    if ($delete_query) {
        // Data berhasil dihapus
        echo '<script>alert("Siswa Berhasil Dihapus"); window.location = "siswa.php";</script>';
        exit();
    } else {
        // Terjadi kesalahan saat menghapus data
        echo "Gagal menghapus data.";
    }
}
?>
