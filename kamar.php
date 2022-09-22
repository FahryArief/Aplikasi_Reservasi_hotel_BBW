<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App UKOM 2022</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark ">
            <div class="container">
                <a href="assets/index3.html" class="navbar-brand">
                    <img src="assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Website Pemesanan Hotel</span>
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
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="kamar.php" class="nav-link">Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a href="fasilitas.php" class="nav-link">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">login</a>
                        </li>

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
                            <h1 class="m-0"> Hotel Syariah Aini</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="content">
                <div class="container">
                    <?php
                    include 'koneksi.php';
                            $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
                            $result = mysqli_query($koneksi, $query);
                                    if (!$result) {
                               die("query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                                        } 
                                $no = 1;
                                    while($row = mysqli_fetch_assoc($result)){

                                        ?>
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card-body card-outline">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <h5><b> Kamar : </b><br> <?php echo $row['no_kamar']; ?></h5>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5> <b>Fasilitas : </b> <br> <?php 
                              $fasilitas_kamar = mysqli_query($koneksi, "select * from fasilitas_kamar");
                              while ($a = mysqli_fetch_array($fasilitas_kamar)) {
                                if ($a['id_kamar'] == $row['id_kamar']) { ?>
                                                            <?php echo $a['fasilitas']; ?>
                                                            <?php
                                }
                              }
                              ?></h5>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><b> Jumlah Kamar : </b><?php echo $row['jmlhkamar']; ?></h5>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><b> Stok Kamar : </b><?php echo $row['stok']; ?></h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><b> Harga : </b> <?php echo $row['harga']; ?></h5>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body card-outline">
                                            <img class="d-block" src="admin/gambar/<?php echo $row['foto']; ?>"
                                                width="400">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <?php $no++; }?>
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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
</body>

</html>