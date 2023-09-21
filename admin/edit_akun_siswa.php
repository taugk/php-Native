<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['nis'])) {
    $nis = $_GET['nis']; 

    // Query untuk mengambil data siswa berdasarkan ID Daftar
    $query = "SELECT * FROM akun_siswa WHERE nis = '$nis'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {        
        echo "Data siswa tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Daftar tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"
      rel="stylesheet"
    />
    <link href="../css/styles.css" rel="stylesheet" />
    <script
      src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-primary bg-dark navbar-dark">
    <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav text-center align-items-center flex-fill">
                <a href="dashboard.php" class="nav-item nav-link text-white active">Home</a>
                <a href="pendaftaran.php" class="nav-item nav-link text-white active">Pendaftaran</a>
                <a href="diterima.php" class="nav-item nav-link text-white"">Diterima</a>
                <a href="admin.php" class="nav-item nav-link text-white"">Admin</a>
            </div>
            <div class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#fafafa}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg><!-- <i class="fas fa-user fa-fw"></i> Font Awesome fontawesome.com --></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <h6 class="p-2">Hallo, <?php echo $username;?></h6>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>
    <!-- Navbar end -->
    <div class="container-fluid mt-5">
      <!-- Tengah secara vertikal dan horizontal -->
      <div class="card my-5 mx-auto max-width-400">
        <div class="card-body">
          <!-- Formulir untuk mengedit data siswa -->
          <form method="post" action="proses_edit_akun_siswa.php">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input
                type="text"
                class="form-control"
                id="nama"
                name="nama"
                aria-describedby="nama"
                value="<?php echo $row['nama']; ?>"
              />
            </div>
            <div class="mb-3">
              <label for="nis" class="form-label">Nomor induk siswa</label>
              <input
                type="text"
                class="form-control"
                id="nis"
                name="nis"
                aria-describedby="nis"
                value="<?php echo $row['nis']; ?>"
                readonly
              />
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">Password</label>
              <input
                type="password"
                class="form-control"
                id="pass"
                name="pass"
                aria-describedby="pass"
                placeholder="Masukkan password baru jika ingin mengganti"
              />
            </div>
            <div class="text-center">
              <button
                type="submit"
                class="btn btn-primary px-5 mb-2 w-100 mt-2"
              >
                Simpan
              </button>
              <a href="siswa.php" class="btn btn-warning mb-5 w-100">
                Cancel
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
<!-- footer -->
<div id="layoutSidenav_content" class="pt-3">
        <footer class="py-4 bg-light mt-auto fixed-bottom">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">Copyright &copy; Your Website 2023</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="../js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="../js/datatables-simple-demo.js"></script>
  </body>
</html>

