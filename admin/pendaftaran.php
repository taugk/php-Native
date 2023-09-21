<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
$username = $_SESSION['username'];
include '../koneksi.php';

$query=mysqli_query($conn, "select * from daftar order by tgl_daftar desc");
$no=1;
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
                <a href="siswa.php" class="nav-item nav-link text-white"">Siswa</a>
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

    <!-- table -->
    <div class="container-fluid mt-5">
    <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Tanggal daftar</th>
                      <th>Nama </th>
                      <th>NIS</th>
                      <th>Email</th>
                      <th>No Hp</th>
                      <th>Semester</th>
                      <th>IPK</th>
                      <th>Jenis Beasiswa</th>
                      <th>Berkas</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $row['tgl_daftar'];?></td>
                      <td><?php echo $row['nama'];?></td>
                      <td><?php echo $row['nis'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['no_hp'];?></td>
                      <td><?php echo $row['semester'];?></td>
                      <td><?php echo $row['ipk'];?></td>
                      <td><?php echo $row['pil_beasiswa'];?></td>
                      <td>
                      <a href="../assets/file/<?= $row['berkas']; ?>"><?= $row['berkas']; ?></a><br>
                      </td>
                      <td>
                          <form method="post" action="update_status.php">
                              <input type="hidden" name="id_daftar" value="<?php echo $row['id_daftar']; ?>">
                              <select name="status" class="form-control">
                                  <option value="B" <?php if ($row['status'] == 'B') echo 'selected'; ?>>Belum Diproses</option>
                                  <option value="D" <?php if ($row['status'] == 'D') echo 'selected'; ?>>Diterima</option>
                                  <option value="T" <?php if ($row['status'] == 'T') echo 'selected'; ?>>Ditolak</option>
                              </select>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                      </td>
                      <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="hapus_daftar.php?id_daftar=<?php echo $row['id_daftar']; ?>" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                    <?php endwhile;?>
                  </tbody>
                </table>
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
