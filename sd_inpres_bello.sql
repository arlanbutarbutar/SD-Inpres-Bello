-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2022 pada 03.46
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
  `hak_akses` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `no_tlp`, `password`, `hak_akses`) VALUES
(1, '12345678', 'admin', '-', '-', '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', 1),
(5, '12345', 'Guru 1', 'Laki-Laki', '081111111111', '$2y$10$nx/NXeR8Oc9SJWh9vMvkceqAS2KIwzlkKuK1T0G5vv99b4HBThfRS', 2),
(6, '12346', 'Guru 2', 'Laki-Laki', '081111111111', '$2y$10$cJdjoPbZZu5bRY85RpnmY.bnEM.UpYd4PRISPirIMDo3JLui/xV.i', 2);

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

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `id_mapel`, `jam`, `hari`) VALUES
(4, 3, 2, '07:30:00', 'Senin'),
(5, 3, 4, '10:20:00', 'Rabu'),
(6, 4, 4, '09:30:00', 'Selasa');

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
(3, 'IPA 1', 5, 1, 2022),
(4, 'IPA 2', 6, 1, 2022);

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
(4, 'Fisika'),
(6, 'Kimia');

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
  `nilai_uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_mapel`, `nilai_tugas`, `nilai_ulangan`, `nilai_uts`, `nilai_uas`) VALUES
(5, 4, 4, 76, 80, 66, 95),
(6, 6, 2, 77, 78, 65, 85),
(7, 9, 2, 80, 85, 79, 88),
(8, 10, 2, 67, 86, 89, 92);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `password` varchar(75) NOT NULL,
  `jenis_kelamin` varchar(35) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nama_siswa`, `nis`, `password`, `jenis_kelamin`, `ttl`, `nama_ortu`) VALUES
(4, 3, 'Hans', '12345', '$2y$10$R3.mCcgGY57SiailrqVi8uFu4Sc9.jzsmJT7o8NNMheXEXN7DP0by', 'Laki-Laki', 'Kupang, 19 Jun 2022', 'Bambang'),
(6, 4, 'Eman', '21414', '$2y$10$jV1cFX3T4Aa3msQkeX6WpujAYGFzWR/M1GPxu4w/zHyfUG/4n5Oc.', 'Laki-Laki', 'Kupang, 19 Jun 2022', 'hen'),
(9, 3, 'Teo', '1313513', '$2y$10$ayK2G.RyRXd2fnS77PA0EOtq5uqHsy9cFSnJKeJgSV5vLO33upgv6', 'Laki-Laki', 'Soe, 19 Jun 2022', 'erigor'),
(10, 4, 'Ester', '5363524', '$2y$10$Ek3Mapw9F7.WO/ZToMSJ1u8WDDaOxITW7MxlgZa1l4xFRJe4h/4EW', 'Perempuan', 'Kefa, 19 Jun 2022', 'Rendi');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
