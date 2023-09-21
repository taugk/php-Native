<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id_daftar'])) {
    $id_daftar = $_GET['id_daftar'];

    // Lakukan query untuk menghapus data berdasarkan id_daftar
    $delete_sql = "DELETE FROM daftar WHERE id_daftar = '$id_daftar'";
    $delete_query = mysqli_query($conn, $delete_sql);

    if ($delete_query) {
        // Data berhasil dihapus
        echo '<script>alert("Pendaftar Berhasil Dihapus"); window.location = "pendaftaran.php";</script>';
        exit();
    } else {
        // Terjadi kesalahan saat menghapus data
        echo "Gagal menghapus data.";
    }
}
?>
