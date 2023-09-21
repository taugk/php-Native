<?php 

session_start();

if (!isset($_SESSION['nis']) || !isset($_SESSION['nama'])) {
  header('Location: login.php');
  exit();
}

include 'koneksi.php';

$query=mysqli_query($conn, "select * from beasiswa");

$nis = $_SESSION['nis'];
$nama = $_SESSION['nama'];
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
                <a href="home.php" class="nav-item nav-link text-white active">Pilihan beasiswa</a>
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
    <div class="container">
      <?php while ($row = mysqli_fetch_assoc($query)): ?>
        <div class="card mb-2 custom-card">
          <div class="card-header">
            <h5 class="card-title"><?= $row['nama_beasiswa']?></h5>
          </div>
          <div class="card-body" style="max-height: 200px; overflow-y: auto;">
            <article class="card-text"><?= $row['deskripsi']?></article>
          </div>
          <div class="card-footer">
            <a href="daftar.php" class="btn btn-primary">Daftar</a>
          </div>
        </div>
      <?php endwhile; ?>
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
