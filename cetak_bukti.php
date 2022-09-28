<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Hotel</title>

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
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
            <div class="container">
                <a href="" class="navbar-brand">
                    <img src="assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Hotel Syariah Aini</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
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
                        <div class="col-sm-12">
                            <h1 class="m-0">Bukti Pesanan</h1>
                            <button onclick="cetak()" class="btn btn-success float-left" style="margin-left: 5px;"><i
                                    class="fas fa-print"></i> Print
                            </button>
                            <form method="GET" action="form_pesanan.php" style="text-align:right;">
                                <a href="index.php" class="small-box-footer">
                                    home <i class="fas fa-arrow-circle-right"></i>
                                </a>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                    <!-- <form method="GET" action="pesanan.php" style="text-align:left;">
                        <label>Filter : </label>
                        <input type="date" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; }?>">
                        <button type="submit" class="btn btn-sm btn-primary">filter</button>
                    </form>
                    <form method="GET" action="pesanan.php" style="text-align:left;">
                        <label>Search : </label>
                        <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; }?>">
                        <button type="submit" class="btn btn-sm btn-primary">search</button>
                    </form>
-->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->




            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-body">
                                <div class="scroll">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Nama Pemesan</th>
                                                <th>NIK</th>
                                                <th>Tanggal Cek In</th>
                                                <th>Tanggal Cek Out</th>
                                                <th>Tipe Kamar</th>
                                                <th>Jumlah Kamar</th>
                                                <th>Harga</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    include 'koneksi.php';
                    if(isset($_GET['cari'])){
                        $pencarian = $_GET['cari'];
                        $query = "select * from pemesanan where nm_pemesan like '%".$pencarian."%' or cek_in like '%".$pencarian."%' or cek_out like '%".$pencarian."%' or nik like '%".$pencarian."%'";

                      }
                      else {$query = "select * from pemesanan";
                      } 
                    
                    $data = mysqli_query($koneksi, "SELECT * FROM pemesanan ORDER BY id_pesanan DESC");
                 $d = mysqli_fetch_array($data); 
                    
                      ?>
                                            <tr>
                                                <td><?php echo $d['nm_pemesan']; ?></td>
                                                <td><?php echo $d['nik']; ?></td>
                                                <td><?php echo $d['cek_in']; ?></td>
                                                <td><?php echo $d['cek_out']; ?></td>
                                                <td>
                                                    <?php 
                          $kamar = mysqli_query($koneksi, "SELECT * FROM kamar");
                          while ($a = mysqli_fetch_array($kamar)) {
                            if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                                    <?php echo $a['tipe_kamar']; ?>
                                                    <?php
                            }
                          }
                          ?>
                                                </td>
                                                <td>
                                                    <?php 
                          $kamar = mysqli_query($koneksi, "select * from pemesanan");
                          while ($a = mysqli_fetch_array($kamar)) {
                            if ($a['id_pesanan'] == $d['id_pesanan']) { ?>
                                                    <?php echo $a['jml_kamar']; ?>
                                                    <?php
                            }
                          }
                          ?>
                                                </td>
                                                <td>
                                                    <?php 
                          $kamar = mysqli_query($koneksi, "select * from kamar");
                          while ($a = mysqli_fetch_array($kamar)) {
                            if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                                    <?php echo $a['harga']; ?>
                                                    <?php
                            }
                          }
                          ?>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <script type="text/javascript">
        function cetak() {
            window.addEventListener("load", window.print());
        }
        </script>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

        <!-- To the right -->

        <!-- Default to the left -->

        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <!-- <style>
        .scroll {
            height: 400px;
            overflow: scroll;
        }
        </style> -->
</body>

</html>
