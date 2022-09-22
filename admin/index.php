<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php");
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi UKK 2022 | Pemesanan Hotel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="" class="navbar-brand">
                    <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Aplikasi UKK Pemesanan Hotel</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="kamar.php" class="nav-link">Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="fasilitas.php" class="nav-link">Fasilitas Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="galeri.php" class="nav-link">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a href="user.php" class="nav-link">Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM kamar");
                                    $id_kamar = mysqli_num_rows($data);
                                    $dataf = mysqli_query($koneksi, "SELECT * FROM fasilitas_kamar");
                                    $id_fasilitas_kamar = mysqli_num_rows($dataf);
                                    $datag = mysqli_query($koneksi, "SELECT * FROM galeri");
                                    $id_galeri = mysqli_num_rows($datag);
                                    $datau = mysqli_query($koneksi, "SELECT * FROM user");
                                    $id_user = mysqli_num_rows($datau);

                                    $result = mysqli_query($koneksi, 'SELECT SUM(stok) AS stok_sum, SUM(jmlhkamar) AS jmlh_kamar FROM kamar'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['stok_sum'];
$sums = $row['jmlh_kamar'];
$disewa = $sums - $sum;
                                    ?>


                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php echo $id_kamar;
                                                ?></h3>

                                                <p>Data Kamar</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php echo $id_fasilitas_kamar;
                                                ?></h3>

                                                <p>Fasilitas</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-list-alt"></i>
                                            </div>
                                            <a href="fasilitas.php" class="small-box-footer">
                                                Lihat Data Fasilitas <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php echo $id_galeri;
                                                ?></h3>

                                                <p>Galeri</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-image"></i>
                                            </div>
                                            <a href="galeri.php" class="small-box-footer">
                                                Lihat Data Galeri <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php echo $id_user;
                                                ?></h3>

                                                <p>Users</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <a href="users.php" class="small-box-footer">
                                                Lihat Data User <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php
echo $sums;
                                                ?></h3>

                                                <p>Jumlah Kamar Hotel</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php 
echo $sum;
                                                ?></h3>

                                                <p>Stok Kamar Tersedia</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small card -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3><?php 
echo $disewa;
                                                ?></h3>

                                                <p>Kamar Disewa</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-home"></i>
                                            </div>
                                            <a href="kamar.php" class="small-box-footer">
                                                Lihat Data Kamar <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>