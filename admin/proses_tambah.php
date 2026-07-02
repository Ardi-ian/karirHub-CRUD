<?php
require "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: tambah.php");
    exit;
}

$judul_posisi      = trim($_POST["judul_posisi"]);
$nama_perusahaan   = trim($_POST["nama_perusahaan"]);
$tipe_pekerjaan    = trim($_POST["tipe_pekerjaan"]);
$gaji_min          = (int) $_POST["gaji_min"];
$gaji_max          = (int) $_POST["gaji_max"];
$deadline          = trim($_POST["deadline"]);
$deskripsi         = trim($_POST["deskripsi"]);
$persyaratan       = trim($_POST["persyaratan"]);
$tahapan_seleksi   = trim($_POST["tahapan_seleksi"]);
$profil_perusahaan = trim($_POST["profil_perusahaan"]);

$query = "INSERT INTO lowongan
          (judul_posisi, nama_perusahaan, tipe_pekerjaan, gaji_min, gaji_max, deadline, deskripsi, persyaratan, tahapan_seleksi, profil_perusahaan)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param(
    $stmt,
    "sssiisssss",
    $judul_posisi,
    $nama_perusahaan,
    $tipe_pekerjaan,
    $gaji_min,
    $gaji_max,
    $deadline,
    $deskripsi,
    $persyaratan,
    $tahapan_seleksi,
    $profil_perusahaan
);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?status=tambah");
    exit;
} else {
    die("Gagal menyimpan data: " . mysqli_error($koneksi));
}
