-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2022 pada 09.55
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `password` varchar(75) NOT NULL,
  `hak_akses` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `no_tlp`, `password`, `hak_akses`) VALUES
(1, '12345678', 'admin', '-', '-', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', 1),
(5, '12345', 'Guru 1', 'Laki-Laki', '081111111111', '$2y$10$nx/NXeR8Oc9SJWh9vMvkceqAS2KIwzlkKuK1T0G5vv99b4HBThfRS', 1),
(6, '12346', 'Guru 2', 'Perempuan', '081111111111', '$2y$10$cJdjoPbZZu5bRY85RpnmY.bnEM.UpYd4PRISPirIMDo3JLui/xV.i', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran_siswa`
--

CREATE TABLE `jadwal_pelajaran_siswa` (
  `id_jad` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
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
(3, '2', 5, 1, 2022),
(4, '4', 6, 1, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_kehadiran_siswa`
--

CREATE TABLE `keterangan_kehadiran_siswa` (
  `id_ket` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `sakit` varchar(25) NOT NULL,
  `izin` varchar(25) NOT NULL,
  `tanpa_keterangan` varchar(25) NOT NULL,
  `kelakuan` varchar(100) NOT NULL,
  `kerajinan` varchar(100) NOT NULL,
  `kerapian` varchar(100) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Biologi'),
(3, 'Penjas'),
(4, 'Fisika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_ulangan` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_kelas`, `id_siswa`, `id_mapel`, `id_guru`, `nilai_tugas`, `nilai_ulangan`, `nilai_uts`, `nilai_uas`) VALUES
(2, 3, 4, 3, 6, 80, 90, 77, 75),
(3, 4, 5, 4, 6, 70, 75, 80, 95);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(35) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `nis`, `jenis_kelamin`, `ttl`, `nama_ortu`) VALUES
(4, 'an', '123', 'Laki-Laki', 'Kupang, 20 May 2022', 'es'),
(5, 'en', '145', 'Perempuan', 'Kupang, 04 May 2022', 'dor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jadwal_pelajaran_siswa`
--
ALTER TABLE `jadwal_pelajaran_siswa`
  ADD PRIMARY KEY (`id_jad`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `keterangan_kehadiran_siswa`
--
ALTER TABLE `keterangan_kehadiran_siswa`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran_siswa`
--
ALTER TABLE `jadwal_pelajaran_siswa`
  MODIFY `id_jad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keterangan_kehadiran_siswa`
--
ALTER TABLE `keterangan_kehadiran_siswa`
  MODIFY `id_ket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
