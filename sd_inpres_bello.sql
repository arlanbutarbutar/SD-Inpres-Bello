-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2022 pada 00.53
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd_inpres_bello`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_guru` int(15) NOT NULL,
  `id_siswa` int(15) NOT NULL,
  `id_mapel` int(15) NOT NULL,
  `tanggal` varchar(35) NOT NULL,
  `status` char(25) NOT NULL,
  `id_kelas` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `password` varchar(75) NOT NULL,
  `hak_akses` int(11) NOT NULL DEFAULT 2,
  `jabatan` varchar(75) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nuptk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `no_tlp`, `password`, `hak_akses`, `jabatan`, `nik`, `status`, `nuptk`) VALUES
(1, '0', 'admin', '-', '-', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', 1, 'Admin', '12345678', 'Admin', '0'),
(11, '199311282019032013', 'Noviana Katarina Paula Gulo', 'Perempuan', '082113553456', '$2y$10$iNNaXr/Or9trsHwWTtIjUeqksn48g5ocmehbqNR.Zl8em/EFXfjSq', 2, 'Guru Mapel', '5371026811930004', 'PNS', '4460771672130063'),
(12, '0', 'Semi Yun Herlin Ledoh', 'Perempuan', '081235636336', '$2y$10$Hwd6nyQf026.9gTJkK8DO.HxBoZgr4Ee4T4hjdQpmOhDYLo7zIKCG', 2, 'Guru Mapel', '5371026209850003', 'Guru Honor', '7254763665130123'),
(13, '0', 'Jekson', 'Laki-Laki', '085246262864', '$2y$10$359RKHVRUdRvalhuD4au9e8nIl3e4FHJ..ZZ6oRJgRdaryW.RPFTS', 2, 'Guru Mapel', '537103230', 'Guru Honor', '575576766');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `jam` time NOT NULL DEFAULT current_timestamp(),
  `hari` varchar(10) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahunajar` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_guru`, `semester`, `tahunajar`) VALUES
(5, '1 A', 11, 1, 2022),
(6, '1 B', 12, 1, 2022),
(7, '3 A', 13, 1, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(7, 'IPA'),
(8, 'IPS'),
(9, 'Penjaskes'),
(10, 'Mulok'),
(11, 'Matematika'),
(12, 'TIK'),
(13, 'Bahasa Indonesia'),
(15, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_ulangan` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `ket_nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_mapel`, `nilai_tugas`, `nilai_ulangan`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `ket_nilai`) VALUES
(9, 11, 7, 70, 80, 95, 85, 83, 'B'),
(10, 12, 7, 50, 65, 60, 45, 55, 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `password` varchar(75) NOT NULL,
  `jenis_kelamin` varchar(35) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nama_siswa`, `nisn`, `password`, `jenis_kelamin`, `ttl`, `nama_ibu`, `nik`) VALUES
(11, 5, 'ABRAHAM LATU SEDU', '3159108937', '$2y$10$4ii3Kw2H/hfcQl0FFv9aPePNxXybKjK6jc2A3ApkuMAFWXL4aOGY2', 'Laki-Laki', 'Kupang, 23 Jun 2022', 'VULDENSIA LAMATOK AN', '5371020301150002'),
(12, 6, 'Agnesia Micharuny Zacharia', '3143294136', '$2y$10$VfBJApxAEzemY7EPoaJzeuSaP59TsKxrxbbYu4iUE5glKScY79N4m', 'Perempuan', 'sabu, 23 Jun 2022', 'Sance Taopan', '5301115708140001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
