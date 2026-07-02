<?php
require "config/koneksi.php";

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

$query = "SELECT * FROM lowongan WHERE id = ?";
$stmt  = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);
$data  = mysqli_fetch_assoc($hasil);

if (!$data) {
    // Data tidak ditemukan, kembali ke halaman utama
    header("Location: index.php");
    exit;
}

$gaji     = "Rp " . number_format($data["gaji_min"], 0, ",", ".") . " - Rp " . number_format($data["gaji_max"], 0, ",", ".");
$deadline = date("d F Y", strtotime($data["deadline"]));

// persyaratan & tahapan_seleksi disimpan per baris (dipisah \n), diubah jadi <li>
$listPersyaratan = array_filter(array_map("trim", explode("\n", $data["persyaratan"])));
$listTahapan      = array_filter(array_map("trim", explode("\n", $data["tahapan_seleksi"])));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($data["judul_posisi"]) ?> - KarirHub</title>
  <link rel="icon" href="assets/img/logo.svg" type="image/svg+xml" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <header class="page-header">
    <nav class="nav container">
      <a href="index.php" class="brand">
        <img src="assets/img/logo.svg" alt="Logo KarirHub" />
        <span>KarirHub</span>
      </a>

      <ul class="menu">
        <li><a href="index.php#lowongan">Lowongan</a></li>
        <li><a href="#apply">Quick Apply</a></li>
      </ul>
    </nav>
  </header>

  <main class="section container detail-layout">
    <article class="detail-card">
      <a class="back-link" href="index.php#lowongan">← Kembali ke daftar lowongan</a>

      <p class="label">Halaman Detail</p>
      <h1><?= htmlspecialchars($data["judul_posisi"]) ?></h1>

      <div class="job-meta">
        <span><?= htmlspecialchars($data["nama_perusahaan"]) ?></span>
        <span><?= htmlspecialchars($data["tipe_pekerjaan"]) ?></span>
        <span><?= $gaji ?></span>
        <span>Deadline: <?= $deadline ?></span>
      </div>

      <h2>Deskripsi Pekerjaan</h2>
      <p><?= nl2br(htmlspecialchars($data["deskripsi"])) ?></p>

      <h2>Persyaratan</h2>
      <ul>
        <?php foreach ($listPersyaratan as $item): ?>
          <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
      </ul>

      <h2>Tahapan Seleksi</h2>
      <ol>
        <?php foreach ($listTahapan as $item): ?>
          <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
      </ol>

      <h2>Profil Perusahaan</h2>
      <p><?= nl2br(htmlspecialchars($data["profil_perusahaan"])) ?></p>
    </article>

    <aside class="apply-card" id="apply">
      <h2>Quick Apply</h2>
      <p class="muted">Isi data singkat berikut untuk melamar posisi ini.</p>

      <form action="#" method="post">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="nama@email.com" />

        <label for="telepon">No. Telepon</label>
        <input type="tel" id="telepon" name="telepon" placeholder="08xxxxxxxxxx" />

        <label for="pesan">Pesan Singkat</label>
        <textarea id="pesan" name="pesan" rows="5" placeholder="Tulis pesan singkat"></textarea>

        <button type="button">Kirim Lamaran</button>
      </form>

      <p class="note">
        Form ini belum menyimpan data karena fokus fitur CRUD ada di data lowongan.
      </p>
    </aside>
  </main>
</body>
</html>
