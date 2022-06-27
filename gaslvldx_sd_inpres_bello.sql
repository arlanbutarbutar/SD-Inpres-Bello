-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jun 2022 pada 02.53
-- Versi server: 10.3.35-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaslvldx_sd_inpres_bello`
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
  `status_hadir` char(25) NOT NULL,
  `id_kelas` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_guru`, `id_siswa`, `id_mapel`, `tanggal`, `status_hadir`, `id_kelas`) VALUES
(49, 11, 11, 8, '2022-06-26', 'Hadir', 5),
(50, 11, 11, 8, '2022-06-27', 'Tidak Hadir', 5);

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
(13, '0', 'Da\\\'i Kause', 'Laki-Laki', '085246262864', '$2y$10$91mgjbbQ7EkEzj.2eKbBV.HhN24fUyOMAVY4fQW1QAphl7REqB9Ca', 2, 'Guru Mapel', '5371021902870002', 'Guru Honor', '0'),
(14, '0', 'Elpionita  Lumban  Gaol', 'Perempuan', '08134252452', '$2y$10$AW9ibEH2Q0Aul3BK10dcOe38qf1cjf8W.BwrgvC71MDzQIjuA71Jq', 2, 'Guru Mapel', '2171126505950003', 'Guru Honor', '0'),
(15, '0', 'Kourius Emriatson Tbet', 'Laki-Laki', '082818288381', '$2y$10$QW32TMPJMUDgTbSBr3gULuCLsAErdXRGvUyqObNc3KD0wSALstKHm', 2, 'Guru Mapel', '5302220309950001', 'Guru Honor', '0'),
(16, '0', 'JOEL TUAN', 'Laki-Laki', '081283828374', '$2y$10$g/lNpR9L.SA9aBWxddL./uRX.tTcwuVtZ5spQsU7dTblgVAsS7l6i', 2, 'Penjaga Sekolah', '5371022302890002', 'Guru Honor', '0'),
(17, '0', 'Ferdiana Molle', 'Perempuan', '08181891028', '$2y$10$.JhEJL82Ln1xE/X6sPL1aeHIQQ3y81LIjw45W2eys1etk121U1UhG', 2, 'Guru Mapel', '5371026105960003', 'Guru Honor', '8853774675230042'),
(18, '0', 'Jekson Silvester Valantino Haga', 'Laki-Laki', '08188218281', '$2y$10$YGdsukjBHghsBkgTvPoHNu.ng/zXcwCc8lI/i39aFCnEXsGU5U2Le', 2, 'Guru Mapel', '5371032304890003', 'Guru Honor', '5755767668130232'),
(19, '0', 'Miriam Teroci Akunut', 'Perempuan', '08181829191', '$2y$10$I7RXoK655sD0lcn22gt41e0xrIrD/oM4HNfVEFZY6dWC8smXudOKG', 2, 'Guru Mapel', '5371026608800003', 'Guru Honor', '5158758659230103'),
(20, '0', 'Selfna Manus', 'Perempuan', '08182819291', '$2y$10$qnq148HaLm8XhLw3XGWT/.mOaxfDYl/z.k7ARyfxG07thaXAcjG2e', 2, 'Guru Mapel', '5371024402780004', 'Guru Honor', '3536756658300032'),
(21, '197302222006042017', 'Yosefna Harti', 'Perempuan', '08182819291', '$2y$10$pj6wclvaSEz4yGSwZTtJ..HRhLdKoUMyqoqRnxwNiAjsGX8QXBpAW', 2, 'Guru Mapel', '5371026202730004', 'PNS', '0554751652300022'),
(22, '0', 'ERWIN PENUN', 'Laki-Laki', '082817293839', '$2y$10$4D8C3U35wlOzBZpeC69Eluh.DvkarXCDTtZpVDwDWUsCOirqUcOJ.', 2, 'Guru Mapel', '5371012802880003', 'Guru Honor', '7560766667130192'),
(23, '197501232007011019', 'Yemori Tampani', 'Laki-Laki', '081827819281', '$2y$10$AreADwoANiOHQ2O8WcoxMeUN/W9nuZHz1DhJmyszbLrH5O9Wh/EAO', 2, 'Guru Mapel', '5371022301750003', 'PNS', '2455753656200002'),
(24, '199204102020122011', 'FRINCE KRESNA TAMOES', 'Laki-Laki', '081827182918', '$2y$10$tdBlitFv3SE7.upMLXUaUeLTkB3TfQXb4NAarFEPx/LgJ.vqjKRBS', 2, 'Guru Mapel', '5371065004920002', 'CPNS', '0742770671130142'),
(25, '197802262007012008', 'Sitti Khadijah Baso', 'Perempuan', '082817827839', '$2y$10$NdaJQB8AaHsFpKFJ5MQpW.0gga4eYP0Qm/92iTkSO99diKwWG3tKC', 2, 'Guru Mapel', '5371056602780001', 'PNS', '4558756658300012'),
(26, '196906121993041001', 'PASKALIS RANGGA', 'Laki-Laki', '081827819289', '$2y$10$T.YgBb.wxqv31xyC3UycbuCW8FwSHP0jduvM/NLMXBvLQQ6.J7bPS', 2, 'Guru Mapel', '5371031206690006', 'PNS', '7944747650200032'),
(27, '198502232011012018', 'Debrina Ade Foni Banu', 'Perempuan', '081819281928', '$2y$10$2Ii.RjCAcqB9Lcx9aYZb.uU9WnDC.PgTdNuaPEmraSla3CafQzK9u', 2, 'Guru Mapel', '5371036302850008', 'PNS', '2555763665210042'),
(28, '196408011986072002', 'Asnat Adel Tefbana', 'Perempuan', '085812764836', '$2y$10$7VRBRUYXu0XngUzQi4Db7uWwQcKxHeEiCR3azYedQJ.wB2i9kD5A2', 2, 'Kepala Sekolah', '5371044108640001', 'PNS', '3133742644300033'),
(29, '0', 'Asy Onalia Ferly Saefatu', 'Perempuan', '087812845864', '$2y$10$rzaHNMGx30WPnA0USXjZRumA9/aiNF4XhoJmtpyQElawxoV6pswtm', 2, 'Guru Mapel', '5371026810840002', 'Guru Honor', '3360762663230243'),
(30, '196712132000031003', 'Lusius Stef Mite', 'Laki-Laki', '082675834123', '$2y$10$kk4Z4WvG0oj.ipPDNyScoe8tQHMAy/kuDQRuHA1mBPr5kj2E1GQOy', 2, 'Guru Mapel', '5371021312670002', 'PNS', '1545745648200023'),
(31, '0', 'Yuliana Tuan', 'Perempuan', '08142365478', '$2y$10$iuIoV0BLAy22d6pzCovx3ulJVFpBo7f6IEABI3bpJ4oyH5KptnqUi', 2, 'Guru Mapel', '5371025605740002', 'Guru Honor', '5848751654300012'),
(32, '0', 'Erny  Suryanti  Bangngu,s. pd', 'Perempuan', '097567325778', '$2y$10$zp43kMJWaTMP0qhR6X5KRuntpsCxH9aVuLzTa0PcK8R19NPhO1Q8i', 2, 'Guru Mapel', '5371044701780012', 'Guru Honor', '6439756658300022'),
(33, '0', 'Delf  Bendalina Toh', 'Perempuan', '081234654168', '$2y$10$1Vn8h.9nnTA713ECl2VubOWxdjayX/qgiFDWgXPzsC1LArwjriDd2', 2, 'Guru Mapel', '5371035412850001', 'Guru Honor', '8546763664230193'),
(34, '0', 'Delmy Paril  Matsor Unu', 'Perempuan', '089129381929', '$2y$10$Ck4IOD9y65lZhIQseUfDGO.POcSOh0a6SL/361etxwDC.HkkcAKpe', 2, 'Guru Mapel', '5371046904830006', 'Guru Honor', '3761761662130152');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `jam_mulai` time NOT NULL DEFAULT current_timestamp(),
  `jam_akhir` time NOT NULL DEFAULT current_timestamp(),
  `hari` varchar(10) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `id_mapel`, `jam_mulai`, `jam_akhir`, `hari`) VALUES
(27, 6, 8, '08:00:00', '10:00:00', 'Senin'),
(28, 5, 7, '08:00:00', '10:00:00', 'Senin'),
(29, 9, 9, '08:00:00', '10:00:00', 'Senin'),
(30, 10, 10, '08:00:00', '10:00:00', 'Senin'),
(32, 11, 12, '08:00:00', '10:00:00', 'Senin'),
(33, 12, 13, '08:00:00', '10:00:00', 'Senin'),
(34, 13, 16, '08:00:00', '10:00:00', 'Senin'),
(35, 14, 17, '08:00:00', '10:00:00', 'Senin'),
(36, 15, 7, '08:00:00', '09:00:00', 'Senin'),
(37, 16, 8, '08:00:00', '10:00:00', 'Senin'),
(38, 17, 12, '08:00:00', '09:00:00', 'Senin'),
(39, 18, 17, '08:00:00', '10:00:00', 'Senin'),
(40, 5, 17, '07:00:00', '09:00:00', 'Selasa'),
(41, 10, 7, '07:30:00', '10:00:00', 'Selasa');

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
(7, '3 A', 13, 1, 2022),
(8, '5', 14, 1, 2022),
(9, '2A', 12, 2, 2022),
(10, '2B', 13, 2, 2022),
(11, '3A', 14, 2, 2022),
(12, '3B', 15, 2, 2022),
(13, '4A', 15, 2, 2022),
(14, '4B', 16, 2, 2022),
(15, '5A', 17, 2, 2022),
(16, '5B', 18, 2, 2022),
(17, '6A', 19, 2, 2022),
(18, '6B', 20, 2, 2022),
(19, '6A', 11, 2, 2022);

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
(10, 'PKN'),
(11, 'Matematika'),
(12, 'TIK'),
(13, 'Bahasa Indonesia'),
(16, 'Bahasa Inggris'),
(17, 'Pendidikan Agama');

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
(9, 11, 8, 80, 80, 95, 88, 86, 'B'),
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
(11, 5, 'ABRAHAM LATU SEDU', '3159108937', '$2y$10$neuExTBL85HFbzk11Imgle6HHW3QfOFGbzcVE87dsO07M6dFAmIYu', 'Laki-Laki', 'Kupang, 23 Jun 2022', 'VULDENSIA LAMATOK AN', '5371020301150002'),
(12, 6, 'Agnesia Micharuny Zacharia', '3143294136', '$2y$10$twhTxt662vOgYf2ptT7wieHcdzBALbDuKSZX318KdFMCGCQSuTVq6', 'Perempuan', 'sabu, 23 Jun 2022', 'Sance Taopan', '5301115708140001'),
(13, 6, 'Rendi', '5122462', '$2y$10$isIxA3lqGRsTlW6kg08LSuSAfT8HO1W1woREn9REpm6ug9BqMwK0a', 'Laki-Laki', 'Bandung, 26 Jun 2022', 'Santi', '235225');

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
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absensi_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absensi_ibfk_4` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
