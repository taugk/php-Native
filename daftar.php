<?php 
session_start();

if (!isset($_SESSION['nis']) || !isset($_SESSION['nama'])) {
  header('Location: login.php');
  exit();
}

$nis = $_SESSION['nis'];
$nama = $_SESSION['nama'];
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                <a href="home.php" class="nav-item nav-link text-white">Pilihan beasiswa</a>
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


  <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh; margin-top:10px; margin-bottom:50px; height:fit-content;">
  <div class="card " style="width: 400px;">
    <div class="card-body">
          <form method="post" action="proses_daftar.php" enctype="multipart/form-data">
              <div class="text-center mt-2">
                <h6>Form Pendaftaran beasiswa</h6>
              </div>

              <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input
              type="text"
              class="form-control"
              id="nama"
              name="nama"
              value="<?php echo $nama; ?>"
              placeholder="Masukkan Nama Lengkap"
              required
            />
              </div>

               <div class="form-group">
            <label for="email">Email</label>
            <input
              type="text"
              class="form-control"
              id="email"
              name="email"
              placeholder="Masukkan email"
              required
            />
          </div>
          <div class="form-group">
            <label for="nis">Nomor induk siswa</label>
            <input
              type="text"
              class="form-control"
              id="nis"
              name="nis"
              value="<?php echo $nis;?>"
              placeholder="Masukkan nomor induk siswa"
              required
            />
          </div>

          <div class="form-group">
            <label for="nope">Nomor Hp</label>
            <input
              type="text"
              class="form-control"
              id="nope"
              name="nope"
              placeholder="Masukkan Nomor Hp"
              required
            />
          </div>
          <div class="form-group">
            <label for="smt">Semester saat ini</label>
            <select class="form-control" id="smt" name="smt" required>
              <option value="null">---Pilih Semester---</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>

          <div class="form-group">
            <label for="ipk">Ipk terakhir</label>
            <input
              type="number"
              step="0.01"
              class="form-control"
              id="ipk"
              name="ipk"
              placeholder="example : 3.50"
              required
            />
          </div>

          <div class="form-group">
            <label for="beasiswa">Pilihan Beasiswa</label>
            <select class="form-control" id="beasiswa" name="beasiswa" required>
              <option value="pilih">---Pilih Beasiswa---</option>
              <option value="A">Akademik</option>
              <option value="NA">Non Akademik</option>
            </select>
          </div>
          <div class="form-group">
            <label for="bks">Upload berkas syarat</label>
            <input type="file" class="form-control" name="bks" id="bks" accept=".pdf" required/>
          </div>


              <div class="text-center">
              <button type="submit" class="btn btn-primary mt-2 mb-2" id="btnSubmit">Daftar</button>
          <button type="reset" class="btn btn-warning mt-2 ms-5 mb-2">Batal</button>
              </div>
              
            </form>
          </div>
        </div>


        <script>
          document.getElementById('btnSubmit').addEventListener('click', function(event) {
            var ipk = parseFloat(document.getElementById('ipk').value);
            if (ipk < 3.0) {
              document.getElementById('beasiswa').disabled = true;
              document.getElementById('bks').disabled = true;
              alert('Anda tidak memenuhi syarat untuk memilih beasiswa dan mengunggah berkas.');
              event.preventDefault(); 
            }
            });
          </script>
        
         
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
