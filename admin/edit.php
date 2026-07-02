<?php
require "../config/koneksi.php";

$id = isset($_GET["id"]) ? (int) $_GET["id"] : 0;

$query = "SELECT * FROM lowongan WHERE id = ?";
$stmt  = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$hasil = mysqli_stmt_get_result($stmt);
$data  = mysqli_fetch_assoc($hasil);

if (!$data) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Lowongan - KarirHub Admin</title>
  <link rel="icon" href="../assets/img/logo.png" type="image/svg+xml" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
  <header class="page-header">
    <nav class="nav container">
      <a href="../index.php" class="brand">
        <img src="../assets/img/logo.png" alt="Logo KarirHub" />
        <span>KarirHub Admin</span>
      </a>
      <ul class="menu">
        <li><a href="index.php">Kelola Data</a></li>
      </ul>
    </nav>
  </header>

  <main class="section container">
    <a class="back-link" href="index.php">← Kembali ke daftar</a>

    <div class="section-title">
      <p class="label">Panel Admin</p>
      <h2>Edit Lowongan</h2>
    </div>

    <form class="form-card" action="proses_edit.php" method="post">
      <input type="hidden" name="id" value="<?= $data['id'] ?>" />

      <div class="form-group">
        <label for="judul_posisi">Judul Posisi</label>
        <input type="text" id="judul_posisi" name="judul_posisi" value="<?= htmlspecialchars($data['judul_posisi']) ?>" required />
      </div>

      <div class="form-group">
        <label for="nama_perusahaan">Nama Perusahaan</label>
        <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="<?= htmlspecialchars($data['nama_perusahaan']) ?>" required />
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
          <select id="tipe_pekerjaan" name="tipe_pekerjaan" required>
            <?php foreach (["Full-time", "Remote", "Hybrid"] as $opsi): ?>
              <option value="<?= $opsi ?>" <?= $data['tipe_pekerjaan'] === $opsi ? "selected" : "" ?>><?= $opsi ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="deadline">Deadline</label>
          <input type="date" id="deadline" name="deadline" value="<?= $data['deadline'] ?>" required />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="gaji_min">Gaji Minimum (Rp)</label>
          <input type="number" id="gaji_min" name="gaji_min" min="0" value="<?= $data['gaji_min'] ?>" required />
        </div>

        <div class="form-group">
          <label for="gaji_max">Gaji Maksimum (Rp)</label>
          <input type="number" id="gaji_max" name="gaji_max" min="0" value="<?= $data['gaji_max'] ?>" required />
        </div>
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi Pekerjaan</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
      </div>

      <div class="form-group">
        <label for="persyaratan">Persyaratan <span class="muted">(satu poin per baris)</span></label>
        <textarea id="persyaratan" name="persyaratan" rows="4" required><?= htmlspecialchars($data['persyaratan']) ?></textarea>
      </div>

      <div class="form-group">
        <label for="tahapan_seleksi">Tahapan Seleksi <span class="muted">(satu poin per baris)</span></label>
        <textarea id="tahapan_seleksi" name="tahapan_seleksi" rows="4" required><?= htmlspecialchars($data['tahapan_seleksi']) ?></textarea>
      </div>

      <div class="form-group">
        <label for="profil_perusahaan">Profil Perusahaan</label>
        <textarea id="profil_perusahaan" name="profil_perusahaan" rows="4" required><?= htmlspecialchars($data['profil_perusahaan']) ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
  </main>
</body>
</html>
