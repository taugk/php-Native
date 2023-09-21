<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $tgl_daftar = date("Y-m-d");
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $nis = isset($_POST['nis']) ? $_POST['nis'] : '';
    $nope = isset($_POST['nope']) ? $_POST['nope'] : '';
    $smt = isset($_POST['smt']) ? $_POST['smt'] : '';
    $ipk_input = isset($_POST['ipk']) ? $_POST['ipk'] : '';
    $ipk = floatval($ipk_input);
    $beasiswa = isset($_POST['beasiswa']) ? $_POST['beasiswa'] : '';
    $status = "B";

    $bks = isset($_FILES['bks']['name']) ? $_FILES['bks']['name'] : '';
    $tmp_berkas = isset($_FILES['bks']['tmp_name']) ? $_FILES['bks']['tmp_name'] : '';

    // Memeriksa apakah semua input yang diperlukan ada
    if (empty($nama) || empty($email) || empty($nis) || empty($nope) || empty($smt) || empty($ipk_input) || empty($beasiswa) || empty($bks) || empty($tmp_berkas)) {
        echo '<script>alert("Semua input harus diisi!"); window.location = "daftar.php";</script>';
        exit();
    }

    $file_info = pathinfo($bks);
    $file_extension = isset($file_info['extension']) ? strtolower($file_info['extension']) : '';

    $allowed_extensions = array('pdf');

    if (in_array($file_extension, $allowed_extensions)) {
        $rename = $nis ."-daftar."  . $file_extension;
        
        $folder = "assets/file/";
        $target_file = $folder . $rename;

        if (move_uploaded_file($tmp_berkas, $target_file)) {
            // Ekstensi file diizinkan dan file berhasil diunggah
            $sql = "INSERT INTO daftar (tgl_daftar, nis, nama, email, no_hp, semester, ipk, pil_beasiswa, berkas, status) 
                VALUES ('$tgl_daftar', '$nis', '$nama', '$email', '$nope', '$smt', '$ipk', '$beasiswa', '$rename', '$status')";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo '<script>alert("Pendaftaran berhasil!"); window.location = "hasil.php";</script>';
                exit();
            } else {
                echo '<script>alert("Pendaftaran gagal!"); window.location = "daftar.php";</script>';
            }
        } else {
            echo "Gagal upload file";
        }
    } else {
        echo "File dengan ekstensi ini tidak diizinkan.";
    }
}
?>
