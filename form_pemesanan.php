<?php  
include 'koneksi.php';

$cek_in = $_POST['cek_in'];
$cek_out = $_POST['cek_out'];
$jml_kamar = $_POST['jml_kamar'];
$nm_pemesan = $_POST['nm_pemesan'];
$email_pemesan = $_POST['email_pemesan'];
$hp_pemesan = $_POST['hp_pemesan'];
$id_kamar = $_POST['id_kamar'];
$nik = $_POST['nik'];
$jumlah_tamu = $_POST['jumlah_tamu'];
$cekStok = mysqli_query($koneksi, "select * from kamar where id_kamar = '$id_kamar'");

$dataKamar = mysqli_fetch_assoc($cekStok);

if($cekStok->num_rows > 0){
    $total = $dataKamar['stok'] - $jml_kamar;
    //mengirim ke databases
    $pesan = mysqli_query($koneksi, "INSERT INTO pemesanan values('','$cek_in','$cek_out','$jml_kamar','$nm_pemesan','$email_pemesan','$hp_pemesan','$id_kamar','1','$nik','$jumlah_tamu')");
    if($pesan){
        mysqli_query($koneksi, "UPDATE kamar SET stok='$total' where id_kamar='$id_kamar'");
    }else{
        die("gagal pesan kamar");
    }
}else{
    $total_kamar = $dataKamar['stok'];
    //mengirim ke databases
    $pesan = mysqli_query($koneksi, "INSERT INTO pemesanan values('','$cek_in','$cek_out','$jml_kamar','$nm_pemesan','$email_pemesan','$hp_pemesan','$id_kamar','1','$nik','$jumlah_tamu')");
    if($pesan){
        mysqli_query($koneksi, "UPDATE kamar SET stok='$total_kamar' where id_kamar='$id_kamar'");
    }else{
        die("gagal pesan kamar");
    }
}

//Sesudah Menginput Di alihkan Ke halaman index
header("location:cetak_bukti.php");


?>