<?php  
include '../koneksi.php';

$id_fasilitas = $_POST['id_fasilitas'];
$id_kamar = $_POST['id_kamar'];
$fasilitas = $_POST['fasilitas'];

mysqli_query($koneksi, "update fasilitas_kamar set id_kamar='$id_kamar', fasilitas='$fasilitas' where id_fasilitas='$id_fasilitas'");

header("location:fasilitas.php");
?>