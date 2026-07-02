-- =========================================================
-- Database untuk KarirHub
-- Cara pakai: import file ini lewat phpMyAdmin
-- (New > Import > pilih file ini > Go)
-- =========================================================

CREATE DATABASE IF NOT EXISTS karirhub;
USE karirhub;

CREATE TABLE IF NOT EXISTS lowongan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul_posisi VARCHAR(150) NOT NULL,
  nama_perusahaan VARCHAR(150) NOT NULL,
  tipe_pekerjaan ENUM('Full-time','Remote','Hybrid') NOT NULL DEFAULT 'Full-time',
  gaji_min INT NOT NULL,
  gaji_max INT NOT NULL,
  deadline DATE NOT NULL,
  deskripsi TEXT,
  persyaratan TEXT,
  tahapan_seleksi TEXT,
  profil_perusahaan TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data contoh (sama seperti tampilan awal KarirHub)
INSERT INTO lowongan
(judul_posisi, nama_perusahaan, tipe_pekerjaan, gaji_min, gaji_max, deadline, deskripsi, persyaratan, tahapan_seleksi, profil_perusahaan)
VALUES
('Junior Web Developer', 'PT Nusantara Digital', 'Full-time', 5000000, 7000000, '2026-05-30',
 'PT Nusantara Digital membuka lowongan untuk posisi Junior Web Developer. Kandidat akan membantu proses pembuatan website perusahaan, memperbaiki tampilan halaman, serta bekerja sama dengan tim desain dan backend.',
 'Memahami dasar HTML, CSS, dan JavaScript.\nMampu membuat tampilan website yang rapi dan responsif.\nMemahami penggunaan Git menjadi nilai tambah.\nBersedia bekerja secara full-time di kantor.',
 'Seleksi berkas lamaran.\nTes kemampuan dasar pemrograman web.\nWawancara dengan tim HR dan user.',
 'PT Nusantara Digital adalah perusahaan yang bergerak di bidang pengembangan aplikasi, website company profile, dan sistem informasi untuk kebutuhan bisnis lokal.'),

('UI/UX Designer', 'Kreativa Studio', 'Remote', 4500000, 6500000, '2026-06-12',
 'Kreativa Studio mencari UI/UX Designer untuk merancang tampilan aplikasi dan website klien.',
 'Menguasai Figma.\nMemahami prinsip dasar UX research.\nMemiliki portofolio desain minimal 3 project.',
 'Seleksi portofolio.\nTes studi kasus desain.\nWawancara dengan tim kreatif.',
 'Kreativa Studio adalah agensi desain digital yang melayani klien startup dan UMKM.'),

('Staff Administrasi', 'CV Makmur Jaya', 'Full-time', 3200000, 4200000, '2026-06-20',
 'CV Makmur Jaya membutuhkan staff administrasi untuk mengelola dokumen dan data perusahaan.',
 'Minimal lulusan SMA/SMK sederajat.\nTeliti dan disiplin.\nMenguasai Microsoft Office.',
 'Seleksi berkas.\nWawancara langsung.',
 'CV Makmur Jaya bergerak di bidang distribusi barang kebutuhan sehari-hari.'),

('Digital Marketing', 'Bright Media', 'Hybrid', 4000000, 5500000, '2026-06-25',
 'Bright Media mencari Digital Marketing untuk mengelola konten dan iklan media sosial.',
 'Memahami dasar SEO dan SEM.\nBerpengalaman mengelola media sosial.\nKreatif dalam membuat konten.',
 'Seleksi berkas.\nTes praktik membuat konten.\nWawancara.',
 'Bright Media adalah agensi marketing digital untuk brand lokal dan nasional.');
