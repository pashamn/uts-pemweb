<?php
 require "session.php";
 include 'koneksi.php'; // Koneksi ke database
 // Check if form was submitted
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $ukuran = $_POST['ukuran'];
    $warna = $_POST['warna'];
    $id_supplier = $_POST['id_supplier'];

    // Menyimpan data ke database
    $sql = "INSERT INTO produk (nama, harga, ukuran, warna, id_supplier) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nama, $harga, $ukuran, $warna, $id_supplier);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = 'tables/produk.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data'); window.location.href = 'tambah_produk.php';</script>";
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
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo">
              <img
                src="assets/img/kaiadmin/pakaibaju.png"
                alt="navbar brand"
                class="navbar-brand"
                height="33"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">

                <a href="index.php">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class=""></span>
                </a>
                <!-- <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.php">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div> -->
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>


              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#produk">
                  <i class="fas fa-box-open"></i>
                  <p>Produk</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="produk">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="tables/produk.php">
                        <span class="sub-item">Produk</span>
                      </a>
                    </li>
                    <li>
                      <a href="tables/stok.php">
                        <span class="sub-item">Stok</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#order">
                  <i class="fas fa-shopping-cart"></i>
                  <p>Order</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="order">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="tables/order.php">
                        <span class="sub-item">Pesanan</span>
                      </a>
                    </li>
                     
                     <!-- <li>
                      <a href="tables/pengiriman.php">
                        <span class="sub-item">Pengiriman</span>
                      </a>
                    </li> -->
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                  <i class="fas fa-table"></i>
                  <p>Tables</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="tables/pelanggan.php">
                        <span class="sub-item">Pelanggan</span>
                      </a>
                    </li>
                    <li>
                      <a href="tables/supplier.php">
                        <span class="sub-item">Supplier</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> 

            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.php" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            
          </nav>
          <!-- End Navbar -->
        </div>
        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h4 class="page-title">Data Produk</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                  <a href="index.php">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                <li class="nav-item">
                  <a href="tables/produk.php">Produk</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                <li class="nav-item">
                  <a href="#">Tambah Data</a>
                </li>
              </ul>
            </div>

            <div class="card">
              <div class="card-header">
                <div class="card-title">Tambah Data</div>
              </div>
              <form method="post" class="shadow p-4 rounded">
              
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="nama">Produk</label>
                    <input
                        type="text"
                        class="form-control"
                        id="nama"
                        name="nama"
                        placeholder="Masukan Nama" required
                    />
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input
                        type="number"
                        class="form-control"
                        id="harga"
                        name="harga"
                        placeholder="Masukan Harga" required
                    />
                  </div>
                  <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input
                        type="text"
                        class="form-control"
                        id="ukuran"
                        name="ukuran"
                        placeholder="Masukan Ukuran" required
                    />
                  </div>
                  <div class="form-group">
                    <label for="warna">Warna</label>
                    <input
                        type="text"
                        class="form-control"
                        id="warna"
                        name="warna"
                        placeholder="Masukan Warna" required
                    />
                  </div>
                  <div class="form-group">
                    <label for="defaultSelect">Default Select</label>
                    <select class="form-select form-control" id="id_supplier" name="id_supplier" required>
                      <option value="">Pilih Supplier</option>
                      <?php
                      $result = $conn->query("SELECT * FROM supplier");
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_supplier'] . "'>" . $row['nama_supplier'] . "</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>

                  <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='tables/pelanggan.php';">Cancel</button>
                  </div>

                </div>
              </from>
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