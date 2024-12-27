<?php
$host = 'localhost';
$user = 'root'; // Ganti dengan username MySQL Anda
$pass = ''; // Ganti dengan password MySQL Anda
$dbname = 'cv_ailinda_2203010046';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
die("Koneksi gagal: " . $conn->connect_error);
}
?>