<?php 
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nis']) || !isset($_SESSION['nama'])) {
  header('Location: login.php');
  exit();
}

$nis = $_SESSION['nis'];
$nama = $_SESSION['nama'];




$query = mysqli_query($conn, "SELECT * FROM daftar WHERE nis = '$nis'");
$no=1;


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav text-center align-items-center flex-fill">
                <a href="home.php" class="nav-item nav-link text-white">Pilihan Beasiswa</a>
                <a href="daftar.php" class="nav-item nav-link text-white"">Daftar</a>
                <a href="hasil.php" class="nav-item nav-link text-white"">Hasil</a>
            </div>
            <div class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg class="svg-inline--fa fa-user fa-fw" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path></svg><!-- <i class="fas fa-user fa-fw"></i> Font Awesome fontawesome.com --></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <h6 class="p-2">Hallo, <?php echo $nama;?></h6>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>
    <!-- Navbar end -->


    
    <?php $row = mysqli_fetch_assoc($query) ?>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
      <div class="card w-50 mb-5">
      <h1>Data Pendaftaran</h1>
    <hr>
        <div class="card-body">
          <div class="row ms-auto">
        <div class="col-sm-5">
          Nama  <br>
          Nomor Induk Siswa  <br>
          Email  <br>
          Nomor Hp  <br>
          Semester  <br>
          IPK  <br>
          Jenis Beasiswa <br>
          Tanggal Pendaftaran  <br>
          Berkas <br>
          Status  <br>
        </div>
        <div class="col-sm-6">
          : <?= $row['nama'];?> <br>
          : <?= $nis;?><br>
          : <?= $row['email']?><br>
          : <?= $row['no_hp'];?><br>
          : <?= $row['semester'];?><br>
          : <?= $row['ipk'];?><br>
          : <?php
          $status = $row['pil_beasiswa'];
          if ($status == 'A') {
            echo "Akademik";
          } elseif ($status == 'NA') {
            echo "Non Akademik";
          } else {
            echo "Tidak ada yang dipilih";
          }
          ?><br>
          : <?= $row['tgl_daftar'];?><br>
          : <a href="assets/file/<?= $row['berkas']; ?>"><?= $row['berkas']; ?></a><br>
          : <?php
          $status = $row['status'];
          if ($status == 'B') {
            echo '<span class="badge bg-warning text-dark">Belum Diverifikasi</span>';
          } elseif ($status == 'D') {
            echo '<span class="badge bg-success">Diterima</span>';
          } elseif ($status == 'T') {
            echo '<span class="badge bg-danger">Ditolak</span>';
          } else {
            echo '<span class="badge bg-secondary">Status tidak valid</span>';
          }
          ?>

        </div>
          <a href="#" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
        </div>
        <!-- Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Isi form update di sini -->
                    <form method="post" action="proses_update.php">
                      <!-- Masukkan elemen-elemen form update di sini -->
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'];?>">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nomor induk siswa (NIS):</label>
                        <input type="text" class="form-control" id="nis" name="nnis" value="<?= $nis?>">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $row['email']?>">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">No. Hp:</label>
                        <input type="text" class="form-control" id="nope" name="nope" value="<?= $row['no_hp']?>">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Semester:</label>
                        <select class="form-control" id="smt" name="smt" aria-valuenow="<?= $row['semester']?>">
                          <option value="null">---Pilih Semester---</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">IPK:</label>
                        <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" value="<?= $row['ipk']?>">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Jenis beasiswa:</label>
                        <select class="form-control" id="beasiswa" name="beasiswa" required>
                          <option value="pilih">---Pilih Beasiswa---</option>
                          <option value="A">Akademik</option>
                          <option value="NA">Non Akademik</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">berkas:</label>
                        <input type="file" class="form-control" id="bks" name="bks" value="download.php?filename=<?= $row['berkas']; ?>-daftar.pdf">
                      </div>
                      
                      <!-- Tambahkan elemen-elemen form lainnya sesuai kebutuhan -->
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>
      <!-- Footer -->
      <footer class="navbar fixed-bottom navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid text-center">
          <span class="navbar-text mx-auto">Ini adalah footer</span>
        </div>
      </footer>
      <!-- footer end -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

  </body>
</html>
