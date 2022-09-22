<?php 
include '../koneksi.php';

$id_fasilitas=$_GET['id_fasilitas'];

mysqli_query($koneksi, "delete from fasilitas_kamar where id_fasilitas='$id_fasilitas'");

header("location:fasilitas.php");
?>