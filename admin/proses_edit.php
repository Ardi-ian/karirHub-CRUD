<?php
require "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id                 = (int) $_POST["id"];
$judul_posisi       = trim($_POST["judul_posisi"]);
$nama_perusahaan    = trim($_POST["nama_perusahaan"]);
$tipe_pekerjaan     = trim($_POST["tipe_pekerjaan"]);
$gaji_min           = (int) $_POST["gaji_min"];
$gaji_max           = (int) $_POST["gaji_max"];
$deadline           = trim($_POST["deadline"]);
$deskripsi          = trim($_POST["deskripsi"]);
$persyaratan        = trim($_POST["persyaratan"]);
$tahapan_seleksi    = trim($_POST["tahapan_seleksi"]);
$profil_perusahaan  = trim($_POST["profil_perusahaan"]);

$query = "UPDATE lowongan SET
            judul_posisi = ?,
            nama_perusahaan = ?,
            tipe_pekerjaan = ?,
            gaji_min = ?,
            gaji_max = ?,
            deadline = ?,
            deskripsi = ?,
            persyaratan = ?,
            tahapan_seleksi = ?,
            profil_perusahaan = ?
          WHERE id = ?";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param(
    $stmt,
    "sssiisssssi",
    $judul_posisi,
    $nama_perusahaan,
    $tipe_pekerjaan,
    $gaji_min,
    $gaji_max,
    $deadline,
    $deskripsi,
    $persyaratan,
    $tahapan_seleksi,
    $profil_perusahaan,
    $id
);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?status=edit");
    exit;
} else {
    die("Gagal memperbarui data: " . mysqli_error($koneksi));
}
