<?php
include '../koneksi.php';

if (isset($_POST['username']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // Buat query untuk mengecek apakah username dan password cocok dengan database
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika data cocok, berarti login sukses
        session_start();
        $_SESSION['username'] = $username;
        echo '<script>alert("Login berhasil!"); window.location = "dashboard.php";</script>';
    } else {
        // Jika data tidak cocok, berarti login gagal
        echo '<script>alert("Login Gagal!"); window.location = "login.php";</script>';
    }
} else {
    // Jika username atau password tidak ada dalam POST, berarti akses tidak valid
    header('Location: login.php?pesan=belum_login');
}
?>
