<?php
// =========================================================
// File koneksi database
// Sesuaikan $user dan $pass jika pengaturan MySQL kamu beda
// =========================================================

$host    = "localhost";
$user    = "root";
$pass    = "";
$nama_db = "karirhub";

$koneksi = mysqli_connect($host, $user, $pass, $nama_db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");
