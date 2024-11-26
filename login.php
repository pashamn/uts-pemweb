<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    $find = mysqli_num_rows($query);

    if ($find == 1){
        // Fetch user data
        $user = mysqli_fetch_assoc($query);

        // Set session variables
        $_SESSION['username'] = $user['username'];
        $_SESSION['login'] = true;

        echo '<script>alert("Login Sukses");</script>';
        echo '<script>location="index.php";</script>';
    } else {
        echo '<script>alert("Login Gagal");</script>';
        echo '<script>location="login.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PakaiBaju</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/logo2.png"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="container vh-100 d-flex justify-content-center align-items-center">
          <div class="row w-100">
              <div class="col-md-4 offset-md-4">
                  <div class="card shadow-lg p-4">
                      <!-- <h3 class="text-center mb-4">Login TokoBaju</h3> -->
                      <div class="text-center mb-4">
                        <img src="assets/img/kaiadmin/pakaibajudark.png" alt="PakaiBaju" style="max-width: 150px;">
                      </div>
                      <form method="post">
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-user"></i> <!-- ganti dengan ikon yang diinginkan -->
                              </span>
                              <input
                                type="text"
                                class="form-control"
                                name="username"
                                placeholder="Enter Username"
                                aria-label="Username"
                                aria-describedby="basic-addon1" required
                              />
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-lock"></i> 
                              </span>
                              <input
                                type="password"
                                class="form-control"
                                name="password"
                                placeholder="Enter Password"
                                aria-label="password"
                                aria-describedby="basic-addon1" required
                              />
                            </div>
                          </div>
                          <div class="d-flex justify-content-center">
                            <button name="login" type="submit" class="btn btn-primary btn-lg w-100 btn-round" style="max-width: 200px;">Login</button>
                          </div>
                          
                      </form>

                  </div>
              </div>
          </div>
      </div>

    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>
  </body>
</html>
