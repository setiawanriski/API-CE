-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Apr 2022 pada 08.38
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_computereducation`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_anggota` varchar(50) NOT NULL,
  `lahir` varchar(100) NOT NULL,
  `nomer_hp` varchar(30) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id`, `nama`, `no_anggota`, `lahir`, `nomer_hp`, `prodi`, `alamat`, `jabatan`) VALUES
(5, 'Abdul Rozak', 'ce. 20.21.064', 'Cirebon, 10 Mei 200', '08889776', 'Teknik Informatika', 'Gunung jati', 'Anggota'),
(6, 'Miftah', 'ce. 20.21.090', 'Cirebon, 11 Mei 2001', '08889776677344', 'Teknik Informatika', 'Sumber', 'Pengurus'),
(7, 'Lucky saputra', 'ce. 20.21.031', 'Cirebon, 17 Januari 2002', '08889776', 'Teknik Informatika', 'Luwung', 'Pengurus'),
(8, 'Danu herdiasyah', 'ce. 20.21.089', 'Cirebon, 19 Mei 2001', '0888977656', 'Teknik Informatika', 'Sumber', 'Anggota'),
(9, 'Lucky herdiansyah', 'ce. 20.21.0673', 'Cirebon, 13 Mei 2001', '0888977667733', 'Teknik Informatika', 'Gunung jati', 'Pengurus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_file`
--

CREATE TABLE `tbl_data_file` (
  `id` int(11) NOT NULL,
  `judul` varchar(160) NOT NULL,
  `nama_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas`
--

CREATE TABLE `tbl_kas` (
  `id` int(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `jumlah_kas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kas`
--

INSERT INTO `tbl_kas` (`id`, `bulan`, `jumlah_kas`) VALUES
(1, 'Januari', 2000000),
(2, 'Februari', 3000000),
(5, 'Maret', 4000000),
(6, 'April', 1000000),
(7, 'Mei', 2000000),
(13, 'Juni', 1000000),
(14, 'agustus', -4000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ketum`
--

CREATE TABLE `tbl_ketum` (
  `id` int(10) NOT NULL,
  `visi` varchar(50) NOT NULL,
  `misi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ketum`
--

INSERT INTO `tbl_ketum` (`id`, `visi`, `misi`) VALUES
(2, 'mensejahterakan', 'mmsmnn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_proker`
--

CREATE TABLE `tbl_proker` (
  `id` int(50) NOT NULL,
  `nama_proker` varchar(200) NOT NULL,
  `stat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_proker`
--

INSERT INTO `tbl_proker` (`id`, `nama_proker`, `stat`) VALUES
(1, 'Makra', 0),
(8, 'PAB', 1),
(21, 'ML', 0),
(22, 'Mubes', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rolename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `nama`, `username`, `password`, `rolename`) VALUES
(1, 'Lucky saputra', 'lucky', '8cb2237d0679ca88db6464eac60da96345513964', 'admin'),
(2, 'Ketua umum', 'ketum', '8cb2237d0679ca88db6464eac60da96345513964', 'admin'),
(3, 'rosmel', 'rosmel', '8cb2237d0679ca88db6464eac60da96345513964', 'sekertaris'),
(4, 'wulan', 'wulan', '8cb2237d0679ca88db6464eac60da96345513964', 'bendahara'),
(5, 'Setiawan-Ar', 'admin', '0192023a7bbd73250516f069df18b500', 'superuser');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_anggota` (`no_anggota`);

--
-- Indeks untuk tabel `tbl_data_file`
--
ALTER TABLE `tbl_data_file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_kas`
--
ALTER TABLE `tbl_kas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_ketum`
--
ALTER TABLE `tbl_ketum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_proker`
--
ALTER TABLE `tbl_proker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_data_file`
--
ALTER TABLE `tbl_data_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas`
--
ALTER TABLE `tbl_kas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_ketum`
--
ALTER TABLE `tbl_ketum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_proker`
--
ALTER TABLE `tbl_proker`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
