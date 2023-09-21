<?php
include 'koneksi.php';
session_start();

if (isset($_POST['nis']) && isset($_POST['pass'])) {
    $nis = $_POST['nis'];
    $password = $_POST['pass'];

    $hash = md5($password);

    // Buat query untuk mengecek apakah username dan password cocok dengan database
    $query = "SELECT * FROM akun_siswa WHERE nis='$nis' AND password='$hash'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika data cocok, berarti login sukses
        $row = mysqli_fetch_assoc($result); // Ambil data pengguna
        $_SESSION['nis'] = $nis;
        $_SESSION['nama'] = $row['nama'];
        echo '<script>alert("Login berhasil!"); window.location = "home.php";</script>';
        exit();
    } else {
        // Jika data tidak cocok, berarti login gagal
        header('Location: login.php?pesan=gagal');
        exit();
    }
} else {
    // Jika username atau password tidak ada dalam POST, berarti akses tidak valid
    header('Location: login.php?pesan=belum_login');
    exit();
}
?>

