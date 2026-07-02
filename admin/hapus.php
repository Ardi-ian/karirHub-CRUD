<?php
require "../config/koneksi.php";

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

if ($id > 0) {
    $query = "DELETE FROM lowongan WHERE id = ?";
    $stmt  = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: index.php?status=hapus");
exit;
