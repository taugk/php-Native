<?php
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $pass = $_POST['pass'];

  $hash = md5($pass);

  $sql = "INSERT INTO akun_siswa (nis, nama, password) VALUES ('$nis', '$nama', '$hash')";
      
  $query = mysqli_query($conn, $sql);
  
  if($query){
    echo "<script>alert('Data Berhasil Disimpan');</script>";
    header('Location: login.php');
    exit();
  }else{
    echo "<script>alert('Gagal Menyimpan Data: " . mysqli_error($conn) . "');</script>";
    header('Location: register.php');
    exit();
  }
}
?>
