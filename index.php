<?php require "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KarirHub - Portal Lowongan Kerja</title>
  <link rel="icon" href="assets/img/logo.png" type="image/svg+xml" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <header class="header">
    <nav class="nav container">
      <a href="index.php" class="brand">
        <img src="assets/img/logo.png" alt="Logo KarirHub" />
        <span>KarirHub</span>
      </a>

      <ul class="menu">
        <li><a href="#lowongan">Lowongan</a></li>
        <li><a href="#kategori">Kategori</a></li>
        <li><a href="#kontak">Kontak</a></li>
        <li><a href="admin/index.php">Kelola Data</a></li>
      </ul>
    </nav>

    <section class="hero container">
      <div class="hero-text">
        <p class="label">Portal Lowongan Kerja</p>
        <h1>Temukan pekerjaan yang sesuai dengan minat dan keahlianmu.</h1>
        <p>
          KarirHub membantu pencari kerja melihat daftar lowongan, informasi perusahaan,
          tipe pekerjaan, gaji, deadline, dan detail posisi secara praktis.
        </p>

        <form class="search-box" action="#lowongan">
          <input type="text" placeholder="Cari posisi atau perusahaan" />
          <select>
            <option>Semua Tipe</option>
            <option>Full-time</option>
            <option>Remote</option>
            <option>Hybrid</option>
          </select>
          <button type="submit">Cari</button>
        </form>
      </div>

      <div class="hero-image">
        <img src="assets/img/orang.png" alt="Ilustrasi daftar lowongan kerja" />
      </div>
    </section>
  </header>

  <main>
    <section class="section container" id="kategori">
      <div class="section-title">
        <p class="label">Kategori</p>
        <h2>Kategori pekerjaan populer</h2>
      </div>

      <div class="category-grid">
        <article>
          <h3>Teknologi</h3>
          <p>Web Developer, UI/UX Designer, Data Analyst</p>
        </article>
        <article>
          <h3>Administrasi</h3>
          <p>Staff Admin, Customer Service, Data Entry</p>
        </article>
        <article>
          <h3>Marketing</h3>
          <p>Digital Marketing, Content Creator, Sales</p>
        </article>
      </div>
    </section>

    <section class="section section-light" id="lowongan">
      <div class="container">
        <div class="section-title">
          <p class="label">Halaman List</p>
          <h2>Daftar lowongan kerja</h2>
          <p class="muted">
            Tabel berisi judul posisi, nama perusahaan, tipe pekerjaan, gaji, dan deadline.
          </p>
        </div>

        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Judul Posisi</th>
                <th>Nama Perusahaan</th>
                <th>Tipe Pekerjaan</th>
                <th>Gaji</th>
                <th>Deadline</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM lowongan ORDER BY id DESC";
              $hasil = mysqli_query($koneksi, $query);

              if ($hasil && mysqli_num_rows($hasil) > 0) {
                  while ($data = mysqli_fetch_assoc($hasil)) {
                      // Tentukan class badge sesuai tipe pekerjaan
                      $badgeClass = "badge";
                      if ($data["tipe_pekerjaan"] === "Remote")  $badgeClass .= " remote";
                      if ($data["tipe_pekerjaan"] === "Hybrid")  $badgeClass .= " hybrid";

                      $gaji = "Rp " . number_format($data["gaji_min"], 0, ",", ".")
                            . " - Rp " . number_format($data["gaji_max"], 0, ",", ".");

                      $deadline = date("d F Y", strtotime($data["deadline"]));

                      echo "<tr>";
                      echo "<td>" . htmlspecialchars($data["judul_posisi"]) . "</td>";
                      echo "<td>" . htmlspecialchars($data["nama_perusahaan"]) . "</td>";
                      echo "<td><span class='" . $badgeClass . "'>" . htmlspecialchars($data["tipe_pekerjaan"]) . "</span></td>";
                      echo "<td>" . $gaji . "</td>";
                      echo "<td>" . $deadline . "</td>";
                      echo "<td><a class='link-detail' href='detail.php?id=" . $data["id"] . "'>Lihat</a></td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='6'>Belum ada data lowongan.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>

        <p class="note">
          Data diambil langsung dari database. Ingin menambah / mengubah / menghapus lowongan?
          Buka menu <a class="link-detail" href="admin/index.php">Kelola Data</a>.
        </p>
      </div>
    </section>
  </main>

  <footer class="footer" id="kontak">
    <div class="container footer-content">
      <div>
        <h2>KarirHub</h2>
        <p>Portal lowongan kerja sederhana untuk menampilkan informasi pekerjaan.</p>
      </div>
      <div>
        <p>Email: muhamadnurardi@gmail.com</p>
        <p>Telepon: 0857-7804-4530</p>
      </div>
    </div>
  </footer>
</body>
</html>
