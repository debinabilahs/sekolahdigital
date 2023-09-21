-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2023 pada 09.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahdigital_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_pangkal`
--

CREATE TABLE `det_pangkal` (
  `id_pangkal` int(4) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `id_tp` int(4) NOT NULL,
  `id_jurusan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `det_pangkal`
--

INSERT INTO `det_pangkal` (`id_pangkal`, `deskripsi`, `jumlah`, `id_tp`, `id_jurusan`) VALUES
(1, 'Uang Gedung', 2000000, 1, 1),
(2, 'SPP', 80000, 3, 6),
(3, 'Prakerin', 560000, 3, 6),
(4, 'Uang Gedung', 2000000, 3, 6),
(5, 'SPP', 80000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rk_bayar`
--

CREATE TABLE `rk_bayar` (
  `id_bayar` int(6) NOT NULL,
  `id_siswa` int(6) NOT NULL,
  `id_det` int(8) NOT NULL,
  `jml_bayar` int(8) NOT NULL,
  `id_users` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rk_pembayaran`
--

CREATE TABLE `rk_pembayaran` (
  `id_pembayaran` int(6) NOT NULL,
  `id_siswa` int(6) NOT NULL,
  `id_pangkal` int(4) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `id_users` int(4) DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `creted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rk_pembayaran`
--

INSERT INTO `rk_pembayaran` (`id_pembayaran`, `id_siswa`, `id_pangkal`, `jumlah`, `id_users`, `tgl_bayar`, `creted_at`) VALUES
(2, 1, 1, 100000, 1, '2022-12-16', '2022-12-16 23:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_agama`
--

CREATE TABLE `rs_agama` (
  `id_agama` int(4) NOT NULL,
  `nama_agama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_agama`
--

INSERT INTO `rs_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam2'),
(4, 'Hindu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_ekstra`
--

CREATE TABLE `rs_ekstra` (
  `id_ekstra` int(6) NOT NULL,
  `judul_ekstra` text NOT NULL,
  `status_ekstra` enum('Y','N') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `link_youtube` text NOT NULL,
  `link_drive` text NOT NULL,
  `open_link` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_guru` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_ekstra`
--

INSERT INTO `rs_ekstra` (`id_ekstra`, `judul_ekstra`, `status_ekstra`, `tgl_mulai`, `tgl_selesai`, `link_youtube`, `link_drive`, `open_link`, `deskripsi`, `id_guru`) VALUES
(1, 'Membuat WordPress', 'Y', '2022-11-23', '2022-11-25', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'ok', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_exam`
--

CREATE TABLE `rs_exam` (
  `id_exam` int(6) NOT NULL,
  `id_mapel` int(4) NOT NULL,
  `id_guru` int(4) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_guru`
--

CREATE TABLE `rs_guru` (
  `id_guru` int(6) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tmp_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `ttd` varchar(100) DEFAULT NULL,
  `aktif_guru` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_guru`
--

INSERT INTO `rs_guru` (`id_guru`, `nik`, `nama_guru`, `no_hp`, `email`, `tmp_lahir`, `tgl_lahir`, `username`, `password`, `foto`, `ttd`, `aktif_guru`) VALUES
(1, '200239876', 'Calita., S.Kom., MTCNA', '09876765', 'cs@gmail.com', 'Cirebon', '2022-11-23', 'admin', 'admin', '', '', 'Y'),
(4, NULL, 'fdasf', '32424', 'dfa@mail.com', 'fdas', '2022-12-13', 'admin', 'dfa', 'email expektasi.txt', NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_jadualmengajar`
--

CREATE TABLE `rs_jadualmengajar` (
  `id_jadual` int(6) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_mapel` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_guru` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_jadualmengajar`
--

INSERT INTO `rs_jadualmengajar` (`id_jadual`, `hari`, `jam_mulai`, `jam_selesai`, `id_mapel`, `id_kelas`, `id_guru`) VALUES
(1, 'Senin', '07:00:00', '00:00:00', 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_jawabexam`
--

CREATE TABLE `rs_jawabexam` (
  `id_jawab` int(6) NOT NULL,
  `id_soal` int(6) NOT NULL,
  `opsi_jawab` varchar(4) NOT NULL,
  `id_siswa` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_jurusan`
--

CREATE TABLE `rs_jurusan` (
  `id_jurusan` int(4) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_jurusan`
--

INSERT INTO `rs_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Tehnik Komputer Jaringan 233'),
(6, 'Rekayasa perangkat lunak terbaik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_kelas`
--

CREATE TABLE `rs_kelas` (
  `id_kelas` int(4) NOT NULL,
  `id_jurusan` int(4) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(35) NOT NULL,
  `wali_kelas` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_kelas`
--

INSERT INTO `rs_kelas` (`id_kelas`, `id_jurusan`, `kode_kelas`, `nama_kelas`, `wali_kelas`) VALUES
(1, 1, 'X-TKJ-1', 'X Tehnik Komputer Jaringan 1', 0),
(2, 1, 'X-TKJ-2', 'X Tehnik Komputer Jaringan 2', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_level`
--

CREATE TABLE `rs_level` (
  `id_level` int(4) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_level`
--

INSERT INTO `rs_level` (`id_level`, `nama_level`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_mapel`
--

CREATE TABLE `rs_mapel` (
  `id_mapel` int(4) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `icon_mapel` varchar(100) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `kkm` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_mapel`
--

INSERT INTO `rs_mapel` (`id_mapel`, `nama_mapel`, `icon_mapel`, `id_kelas`, `kkm`) VALUES
(1, 'Pemograman Web Dasar', '', 0, 0),
(2, 'Desain Grafis', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_materi`
--

CREATE TABLE `rs_materi` (
  `id_materi` int(6) NOT NULL,
  `judul_materi` text NOT NULL,
  `status_materi` enum('Y','N') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `link_youtube` text NOT NULL,
  `link_drive` text NOT NULL,
  `open_link` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_guru` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_materi`
--

INSERT INTO `rs_materi` (`id_materi`, `judul_materi`, `status_materi`, `tgl_mulai`, `tgl_selesai`, `link_youtube`, `link_drive`, `open_link`, `deskripsi`, `id_guru`, `id_kelas`, `created_at`) VALUES
(1, 'Membuat WordPress', 'Y', '2022-11-23', '2022-11-25', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'ok', 1, 0, '2022-12-15 08:00:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_notifikasi`
--

CREATE TABLE `rs_notifikasi` (
  `id_notif` int(6) NOT NULL,
  `id_guru` int(4) NOT NULL,
  `kode_notif` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_opsi`
--

CREATE TABLE `rs_opsi` (
  `id_opsi` int(6) NOT NULL,
  `pil_A` varchar(255) NOT NULL,
  `pil_B` varchar(255) NOT NULL,
  `pil_C` varchar(255) NOT NULL,
  `pil_D` varchar(255) NOT NULL,
  `pil_E` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_pelanggaran`
--

CREATE TABLE `rs_pelanggaran` (
  `id_pelanggaran` int(6) NOT NULL,
  `kategori_pelanggaran` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `id_siswa` int(6) NOT NULL,
  `tgl_pelanggaran` date DEFAULT NULL,
  `id_guru` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_pelanggaran`
--

INSERT INTO `rs_pelanggaran` (`id_pelanggaran`, `kategori_pelanggaran`, `catatan`, `id_siswa`, `tgl_pelanggaran`, `id_guru`) VALUES
(1, 'Sedang', 'terlambat ', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_ruang`
--

CREATE TABLE `rs_ruang` (
  `id_ruang` int(4) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_ruang`
--

INSERT INTO `rs_ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'R.01'),
(2, 'R.02'),
(3, 'R.03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_sekolah`
--

CREATE TABLE `rs_sekolah` (
  `id_sekolah` int(4) NOT NULL,
  `npsn` varchar(50) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `maps` text NOT NULL,
  `nama_kepalasekolah` varchar(60) NOT NULL,
  `nip_kepsek` varchar(35) NOT NULL,
  `logo_sekolah` varchar(100) NOT NULL,
  `aktif_sekolah` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_sekolah`
--

INSERT INTO `rs_sekolah` (`id_sekolah`, `npsn`, `nama_sekolah`, `alamat`, `no_telp`, `email`, `maps`, `nama_kepalasekolah`, `nip_kepsek`, `logo_sekolah`, `aktif_sekolah`) VALUES
(1, 'NP098546.2022', 'SMK Jagat Digital Cirebon', 'Perumahan Grand Imperium No. 99 Cirebon - Jawa Barat', '085224216499', 'csjagatgenius@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4846534483004!2d108.50055831537426!3d-6.710552395148564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee1b90f832aab%3A0x49f866bee5fbce32!2sPT.%20Java%20Genius%20All%20Technology!5e0!3m2!1sid!2sid!4v1668852857753!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Drs. Calita., S.Kom., MM', 'JG201901', 'jagat.png', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_siswa`
--

CREATE TABLE `rs_siswa` (
  `id_siswa` int(6) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_level` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_jurusan` int(4) NOT NULL,
  `id_ruang` int(4) NOT NULL,
  `id_agama` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_tp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_siswa`
--

INSERT INTO `rs_siswa` (`id_siswa`, `nis`, `nisn`, `nama_siswa`, `id_level`, `id_kelas`, `id_jurusan`, `id_ruang`, `id_agama`, `username`, `password`, `email`, `aktif`, `gambar`, `id_tp`) VALUES
(1, '20191001', '0987876', 'Iqbal Maulana R', 1, 1, 1, 1, 1, 'ical', 'admin', 'mm@mail.com', 'Y', '', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_soal`
--

CREATE TABLE `rs_soal` (
  `id_soal` int(6) NOT NULL,
  `id_exam` int(4) NOT NULL,
  `desk_soal` varchar(255) NOT NULL,
  `jawaban` varchar(4) NOT NULL,
  `id_opsi` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_tp`
--

CREATE TABLE `rs_tp` (
  `id_tp` int(4) NOT NULL,
  `tahun_pelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_tp`
--

INSERT INTO `rs_tp` (`id_tp`, `tahun_pelajaran`) VALUES
(1, '2020/2021'),
(3, '2021/2022'),
(4, '2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rs_tugas`
--

CREATE TABLE `rs_tugas` (
  `id_tugas` int(6) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `judul_tugas` text NOT NULL,
  `status_tugas` enum('Y','N') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `link_youtube` text NOT NULL,
  `link_drive` text NOT NULL,
  `open_link` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_guru` int(4) NOT NULL,
  `gbr_tugas` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rs_tugas`
--

INSERT INTO `rs_tugas` (`id_tugas`, `id_kelas`, `judul_tugas`, `status_tugas`, `tgl_mulai`, `tgl_selesai`, `link_youtube`, `link_drive`, `open_link`, `deskripsi`, `id_guru`, `gbr_tugas`, `created_at`) VALUES
(1, 0, 'Membuat WordPress', 'Y', '2022-11-23', '2022-11-25', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'https://ekin.jagatgenius.com/dashboard.php?page=kinerja', 'ok', 1, '', '2022-12-15 14:20:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` varchar(15) NOT NULL,
  `blokir` enum('Y','N') NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `nama_lengkap`, `email`, `no_hp`, `status`, `level`, `blokir`, `password`) VALUES
(1, 'admin', 'Administrator', 'admin@gmail.com', '098765', 'online', 'admin', 'N', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `det_pangkal`
--
ALTER TABLE `det_pangkal`
  ADD PRIMARY KEY (`id_pangkal`);

--
-- Indeks untuk tabel `rk_bayar`
--
ALTER TABLE `rk_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `rk_pembayaran`
--
ALTER TABLE `rk_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `rs_agama`
--
ALTER TABLE `rs_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `rs_ekstra`
--
ALTER TABLE `rs_ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indeks untuk tabel `rs_exam`
--
ALTER TABLE `rs_exam`
  ADD PRIMARY KEY (`id_exam`);

--
-- Indeks untuk tabel `rs_guru`
--
ALTER TABLE `rs_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `rs_jadualmengajar`
--
ALTER TABLE `rs_jadualmengajar`
  ADD PRIMARY KEY (`id_jadual`);

--
-- Indeks untuk tabel `rs_jawabexam`
--
ALTER TABLE `rs_jawabexam`
  ADD PRIMARY KEY (`id_jawab`);

--
-- Indeks untuk tabel `rs_jurusan`
--
ALTER TABLE `rs_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `rs_kelas`
--
ALTER TABLE `rs_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `rs_level`
--
ALTER TABLE `rs_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `rs_mapel`
--
ALTER TABLE `rs_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `rs_materi`
--
ALTER TABLE `rs_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `rs_notifikasi`
--
ALTER TABLE `rs_notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `rs_opsi`
--
ALTER TABLE `rs_opsi`
  ADD PRIMARY KEY (`id_opsi`);

--
-- Indeks untuk tabel `rs_pelanggaran`
--
ALTER TABLE `rs_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `rs_ruang`
--
ALTER TABLE `rs_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `rs_sekolah`
--
ALTER TABLE `rs_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `rs_siswa`
--
ALTER TABLE `rs_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `rs_soal`
--
ALTER TABLE `rs_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `rs_tp`
--
ALTER TABLE `rs_tp`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indeks untuk tabel `rs_tugas`
--
ALTER TABLE `rs_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `det_pangkal`
--
ALTER TABLE `det_pangkal`
  MODIFY `id_pangkal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rk_bayar`
--
ALTER TABLE `rk_bayar`
  MODIFY `id_bayar` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rk_pembayaran`
--
ALTER TABLE `rk_pembayaran`
  MODIFY `id_pembayaran` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rs_agama`
--
ALTER TABLE `rs_agama`
  MODIFY `id_agama` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rs_ekstra`
--
ALTER TABLE `rs_ekstra`
  MODIFY `id_ekstra` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rs_exam`
--
ALTER TABLE `rs_exam`
  MODIFY `id_exam` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rs_guru`
--
ALTER TABLE `rs_guru`
  MODIFY `id_guru` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rs_jadualmengajar`
--
ALTER TABLE `rs_jadualmengajar`
  MODIFY `id_jadual` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rs_jawabexam`
--
ALTER TABLE `rs_jawabexam`
  MODIFY `id_jawab` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rs_jurusan`
--
ALTER TABLE `rs_jurusan`
  MODIFY `id_jurusan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rs_kelas`
--
ALTER TABLE `rs_kelas`
  MODIFY `id_kelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rs_level`
--
ALTER TABLE `rs_level`
  MODIFY `id_level` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rs_mapel`
--
ALTER TABLE `rs_mapel`
  MODIFY `id_mapel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rs_materi`
--
ALTER TABLE `rs_materi`
  MODIFY `id_materi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rs_notifikasi`
--
ALTER TABLE `rs_notifikasi`
  MODIFY `id_notif` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rs_opsi`
--
ALTER TABLE `rs_opsi`
  MODIFY `id_opsi` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rs_pelanggaran`
--
ALTER TABLE `rs_pelanggaran`
  MODIFY `id_pelanggaran` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rs_ruang`
--
ALTER TABLE `rs_ruang`
  MODIFY `id_ruang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rs_sekolah`
--
ALTER TABLE `rs_sekolah`
  MODIFY `id_sekolah` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rs_siswa`
--
ALTER TABLE `rs_siswa`
  MODIFY `id_siswa` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rs_soal`
--
ALTER TABLE `rs_soal`
  MODIFY `id_soal` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rs_tp`
--
ALTER TABLE `rs_tp`
  MODIFY `id_tp` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rs_tugas`
--
ALTER TABLE `rs_tugas`
  MODIFY `id_tugas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
