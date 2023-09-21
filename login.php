<?php 
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body class="bg-primary">

    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card my-5">
            <form
              class="card-body cardbody-color p-lg-5"
             method="post" action="cek_login.php"
            >
              <div class="text-center">
                <h1>Login Siswa</h1>
              </div>

              <div class="mb-3">
                <label for="nis" class="form-label">Nomor induk siswa</label>
                <input
                  type="text"
                  class="form-control"
                  id="nis"
                  name="nis"
                  aria-describedby="nis"
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
                />
              </div>
              <div class="text-center">
                <button
                  type="submit"
                  class="btn btn-primary px-5 mb-2 w-100 mt-2"
                >
                  Login
                </button>
                <a
                  href="masuk.php"
                  class="btn btn-warning mb-5 w-100"
                  
                >
                  Cancel
                </a>
              </div>
              <a href="register.php">DAFTAR</a>
            </form>
          </div>
        </div>
      </div>
    </div>
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
  </body>
</html>
