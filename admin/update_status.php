<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id_daftar'])) {
    $id_daftar = $_POST['id_daftar'];
    $status = $_POST['status'];

    // Lakukan pembaruan status berdasarkan id_daftar
    $update_sql = "UPDATE daftar SET status = '$status' WHERE id_daftar = '$id_daftar'";
    $update_query = mysqli_query($conn, $update_sql);

    if ($update_query) {
        // Status berhasil diperbarui
        header('Location: dashboard.php'); // Redirect ke halaman dashboard
        exit();
    } else {
        // Terjadi kesalahan saat memperbarui status
        echo "Gagal memperbarui status.";
    }
}
?>
