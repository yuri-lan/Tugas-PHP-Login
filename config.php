<?php
$host = "localhost";
$user = "root";
$pass = ""; // Biasanya kosong di XAMPP
$db   = "db_login";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>