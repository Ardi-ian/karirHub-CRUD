<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Lowongan - KarirHub Admin</title>
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
      <h2>Tambah Lowongan Baru</h2>
    </div>

    <form class="form-card" action="proses_tambah.php" method="post">
      <div class="form-group">
        <label for="judul_posisi">Judul Posisi</label>
        <input type="text" id="judul_posisi" name="judul_posisi" required />
      </div>

      <div class="form-group">
        <label for="nama_perusahaan">Nama Perusahaan</label>
        <input type="text" id="nama_perusahaan" name="nama_perusahaan" required />
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
          <select id="tipe_pekerjaan" name="tipe_pekerjaan" required>
            <option value="Full-time">Full-time</option>
            <option value="Remote">Remote</option>
            <option value="Hybrid">Hybrid</option>
          </select>
        </div>

        <div class="form-group">
          <label for="deadline">Deadline</label>
          <input type="date" id="deadline" name="deadline" required />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="gaji_min">Gaji Minimum (Rp)</label>
          <input type="number" id="gaji_min" name="gaji_min" min="0" required />
        </div>

        <div class="form-group">
          <label for="gaji_max">Gaji Maksimum (Rp)</label>
          <input type="number" id="gaji_max" name="gaji_max" min="0" required />
        </div>
      </div>

      <div class="form-group">
        <label for="deskripsi">Deskripsi Pekerjaan</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
      </div>

      <div class="form-group">
        <label for="persyaratan">Persyaratan <span class="muted">(satu poin per baris)</span></label>
        <textarea id="persyaratan" name="persyaratan" rows="4" placeholder="Contoh:&#10;Memahami dasar HTML, CSS, JavaScript&#10;Mampu bekerja dalam tim" required></textarea>
      </div>

      <div class="form-group">
        <label for="tahapan_seleksi">Tahapan Seleksi <span class="muted">(satu poin per baris)</span></label>
        <textarea id="tahapan_seleksi" name="tahapan_seleksi" rows="4" placeholder="Contoh:&#10;Seleksi berkas&#10;Tes kemampuan&#10;Wawancara" required></textarea>
      </div>

      <div class="form-group">
        <label for="profil_perusahaan">Profil Perusahaan</label>
        <textarea id="profil_perusahaan" name="profil_perusahaan" rows="4" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Simpan Lowongan</button>
    </form>
  </main>
</body>
</html>
