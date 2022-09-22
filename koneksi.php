<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_hotel_fahry";
$koneksi = mysqli_connect($host,$user,$pass,$db);
if (!$koneksi){
    die("Koneksi dengan databse gagal: " .mysqli_connect_error());
}


?>