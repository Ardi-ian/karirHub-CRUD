<?php require "../config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kelola Lowongan - KarirHub Admin</title>
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
        <li><a href="../index.php">Lihat Website</a></li>
      </ul>
    </nav>
  </header>

  <main class="section container">
    <div class="admin-toolbar">
      <div class="section-title" style="margin-bottom:0;">
        <p class="label">Panel Admin</p>
        <h2>Kelola Data Lowongan</h2>
      </div>
      <a class="btn btn-primary" href="tambah.php">+ Tambah Lowongan</a>
    </div>

    <?php if (isset($_GET["status"])): ?>
      <?php
        $pesan = "";
        if ($_GET["status"] === "tambah")  $pesan = "Data lowongan berhasil ditambahkan.";
        if ($_GET["status"] === "edit")    $pesan = "Data lowongan berhasil diperbarui.";
        if ($_GET["status"] === "hapus")   $pesan = "Data lowongan berhasil dihapus.";
      ?>
      <?php if ($pesan): ?>
        <div class="alert alert-success"><?= $pesan ?></div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Judul Posisi</th>
            <th>Nama Perusahaan</th>
            <th>Tipe Pekerjaan</th>
            <th>Deadline</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM lowongan ORDER BY id DESC";
          $hasil = mysqli_query($koneksi, $query);

          if ($hasil && mysqli_num_rows($hasil) > 0) {
              while ($data = mysqli_fetch_assoc($hasil)) {
                  $deadline = date("d F Y", strtotime($data["deadline"]));
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($data["judul_posisi"]) . "</td>";
                  echo "<td>" . htmlspecialchars($data["nama_perusahaan"]) . "</td>";
                  echo "<td>" . htmlspecialchars($data["tipe_pekerjaan"]) . "</td>";
                  echo "<td>" . $deadline . "</td>";
                  echo "<td class='admin-actions'>";
                  echo "<a class='btn btn-edit' href='edit.php?id=" . $data["id"] . "'>Edit</a>";
                  echo "<a class='btn btn-danger' href='hapus.php?id=" . $data["id"] . "' onclick=\"return confirm('Yakin ingin menghapus lowongan ini?');\">Hapus</a>";
                  echo "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>Belum ada data lowongan.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
