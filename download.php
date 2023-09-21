<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    // Mendapatkan filename berdasarkan parameter GET
    $filename = isset($_GET['filename']) ? $_GET['filename'] : '';

    // Memeriksa apakah filename yang diberikan valid
    if (!empty($filename)) {
        // Direktori penyimpanan berkas
        $folder = "../assets/file/";

        // Memeriksa apakah berkas ada di server
        $file_path = $folder . $filename;

        if (file_exists($file_path)) {
            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

            // Set header untuk memulai unduhan
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));

            // Membaca berkas dan mengirimkannya ke output
            readfile($file_path);
            exit();
        } else {
            echo '<script>alert("Berkas tidak ada"); window.location = "hasil.php";</script>';
        }
    } else {
        echo "Nama berkas tidak valid.";
    }
}
?>
