<?php
require "session.php";
// Koneksi ke database

// // Mendapatkan id_produk dari URL
// $id_stok = $_GET['id_stok'];

// // Mengambil data stok berdasarkan id_stok
// $sql = "SELECT * FROM stok WHERE id_stok = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $id_stok);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     $data = $result->fetch_assoc();
// } else {
//     echo "Data Stok tidak ditemukan.";
//     exit;
// }

// // Memproses form update jika data dikirim
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $id_produk = $_POST['id_produk'];
//     $jmlh_stok = $_POST['jmlh_stok'];
//     $tgl_update = $_POST['tgl_update'];


//     // Update data stok
//     $update_sql = "UPDATE stok SET id_produk = ?, jmlh_stok = ?, tgl_update = ? WHERE id_stok = ?";
//     $stmt = $conn->prepare($update_sql);
//     $stmt->bind_param("issi", $id_produk, $jmlh_stok, $tgl_update, $id_stok);

//     if ($stmt->execute()) {
//         echo '<script>alert("Berhasil Mengubah Data Stok");</script>';
//         echo '<script>location="tables/stok.php"</script>';
//     } else {
//         echo '<script>alert("Gagal Mengubah Data Stok");</script>';
//         echo '<script>location="edit_stok.php?id_stok=' . $id_stok . '"</script>';
//     }
// }
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
              <h4 class="page-title">Data Pesanan</h4>
              <ul class="breadcrumbs">
                <li class="nav-home">
                  <a href="index.php">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                <li class="nav-item">
                  <a href="tables/order.php">Pesanan</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                <li class="nav-item">
                  <a href="#">Detail</a>
                </li>
              </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <?php
                        include 'koneksi.php'; 
                        $query = "SELECT `order`.*, pelanggan.*, SUM(detail_order.jumlah) AS total_quantity 
                                FROM `order` 
                                JOIN pelanggan ON `order`.id_pelanggan = pelanggan.id_pelanggan
                                JOIN detail_order ON `order`.id_order = detail_order.id_order
                                WHERE `order`.id_order='$_GET[id]'
                                GROUP BY `order`.id_order";

                        // Eksekusi query
                        $result = $conn->query($query);

                        // Periksa apakah hasil ada
                        if ($result->num_rows > 0) {
                            // Loop hasil dan tampilkan data
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="mb-3">';
                                echo '<p><strong>Nama:</strong> ' . htmlspecialchars($row["nama"]) . '</p>';
                                echo '<p><strong>Telepon:</strong> ' . htmlspecialchars($row["no_tlpn"]) . '</p>';
                                echo '<p><strong>Email:</strong> ' . htmlspecialchars($row["email"]) . '</p>';
                                echo '<p><strong>Total Pesanan:</strong> ' . number_format($row["total_quantity"]) . '</p>';
                                echo '<p><strong>Tanggal Pesanan:</strong> ' . htmlspecialchars($row["tgl_pemesanan"]) . '</p>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p class="text-muted">Tidak ada data Pesanan</p>';
                        }
                        ?>
                      </div>
                      <div class="col-md-6 col-lg-4">
                          <?php
                          $query = "SELECT * FROM pembayaran WHERE id_order = '$_GET[id]'";

                          // Eksekusi query
                          $result = $conn->query($query);

                          // Periksa apakah hasil ada
                          if ($result->num_rows > 0) {
                              // Loop hasil dan tampilkan data
                              while($row = $result->fetch_assoc()) {
                                  echo '<div class="mb-3">';
                                  echo '<p><strong>Metode Pembayaran:</strong> ' . htmlspecialchars($row["metode_pembayaran"]) . '</p>';
                                  echo '<p><strong>Tanggal Pembayaran:</strong> ' . htmlspecialchars($row["tgl_pembayaran"]) . '</p>';
                                  echo '<p><strong>Status:</strong> ' . htmlspecialchars($row["status_pembayaran"]) . '</p>';;
                              }
                          } else {
                              echo '<p class="text-muted">Tidak ada data Pesanan</p>';
                          }
                          ?>
                      </div>

                    </div>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Query untuk mengambil data dari tabel
                            $sql = "SELECT detail_order.*, produk.* FROM detail_order 
                            JOIN produk ON detail_order.id_produk = produk.id_produk
                            WHERE detail_order.id_order='$_GET[id]'";
                            $result = $conn->query($sql);

                            $grandTotal = 0; // Inisialisasi total keseluruhan
                            if ($result->num_rows > 0) {
                                $no = 1;
                                while($row = $result->fetch_assoc()) {
                                    $total = $row["harga"] * $row["jumlah"];
                                    $grandTotal += $total; // Tambahkan total ke grandTotal

                                    echo "<tr>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $row["nama"] . "</td>";
                                    echo "<td>" . $row["ukuran"] . "</td>";
                                    echo "<td>" . $row["warna"] . "</td>";
                                    echo "<td>Rp" . number_format($row["harga"], 0, ',', '.') . "</td>";
                                    echo "<td>" . $row["jumlah"] . "</td>";
                                    echo "<td>Rp" . number_format($total, 0, ',', '.') . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-right"><strong>Total Harga:</strong></td>
                                <td><strong>Rp<?php echo number_format($grandTotal, 0, ',', '.'); ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- Menampilkan total keseluruhan -->
                    <!-- <div class="mt-3">
                        <p><strong>Total Harga:</strong> Rp<?php echo number_format($grandTotal, 0, ',', '.'); ?></p>
                    </div> -->
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