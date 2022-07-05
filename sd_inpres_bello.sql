-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2022 pada 22.50
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
  `status_hadir` char(25) NOT NULL,
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
(34, '0', 'Delmy Paril  Matsor Unu', 'Perempuan', '089129381929', '$2y$10$1Ss5nj1KXlBlOhiaLOiOaeWhwzD0hdPl4vRtWMkfdp.E4NGqcgkr6', 2, 'Guru Mapel', '5371046904830006', 'CPNS', '3761761662130152');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Wakil Kepala Sekolah'),
(3, 'Guru Mapel'),
(4, 'Penjaga Sekolah');

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
(41, 10, 7, '07:30:00', '10:00:00', 'Selasa'),
(42, 5, 10, '07:57:00', '08:57:00', 'Rabu');

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
(5, '1A', 11, 1, 2022),
(6, '1B', 12, 1, 2022),
(9, '2A', 12, 2, 2022),
(10, '2B', 13, 2, 2022),
(11, '3A', 14, 2, 2022),
(12, '3B', 15, 2, 2022),
(13, '4A', 15, 2, 2022),
(14, '4B', 16, 2, 2022),
(15, '5A', 17, 2, 2022),
(16, '5B', 18, 2, 2022),
(17, '6A', 19, 2, 2022),
(18, '6B', 20, 2, 2022);

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
  `ket_nilai` varchar(10) NOT NULL DEFAULT '-',
  `tgl_nilai` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_mapel`, `nilai_tugas`, `nilai_ulangan`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `ket_nilai`, `tgl_nilai`) VALUES
(29, 12, 8, 0, 0, 0, 0, 0, '-', '2022-07-06 02:56:18'),
(31, 12, 9, 0, 0, 0, 0, 0, '-', '2022-07-06 03:01:30'),
(32, 13, 8, 0, 0, 0, 0, 0, '-', '2022-07-06 03:01:36'),
(33, 15, 8, 0, 0, 0, 0, 0, '-', '2022-07-06 03:01:42');

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
  `nik` varchar(50) NOT NULL,
  `status_siswa` int(11) NOT NULL DEFAULT 1,
  `tgl_lulus` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nama_siswa`, `nisn`, `password`, `jenis_kelamin`, `ttl`, `nama_ibu`, `nik`, `status_siswa`, `tgl_lulus`) VALUES
(11, 5, 'ABRAHAM LATU SEDU', '3159108937', '$2y$10$neuExTBL85HFbzk11Imgle6HHW3QfOFGbzcVE87dsO07M6dFAmIYu', 'Laki-Laki', 'Kupang, 23 Jun 2022', 'VULDENSIA LAMATOK AN', '5371020301150002', 1, '2022-07-02 12:22:42'),
(12, 6, 'Agnesia Micharuny Zacharia', '3143294136', '$2y$10$twhTxt662vOgYf2ptT7wieHcdzBALbDuKSZX318KdFMCGCQSuTVq6', 'Perempuan', 'sabu, 23 Jun 2022', 'Sance Taopan', '5301115708140001', 1, '2022-07-02 12:22:42'),
(13, 6, 'Angevin Tillo  Fransesco Hoinbala', '0147919826', '$2y$10$frJWDhRGQ6gk20k.rbrg8.o7CKMsLFfA3UaGWTIn/Xt6YfcdHuiue', 'Laki-Laki', 'Kupang, 14 Oct 2014', 'Jerni  Takesan', '5371021402140002', 1, '2022-07-02 12:22:42'),
(14, 5, 'Ariel Arianto Lay', '3152746002', '$2y$10$Uy8m9r7OXvaRZ7b0TyHnyOwHFlRbmqXhu2pZ755pAABTjVNQGRYh6', 'Laki-Laki', 'Rote, 10 Apr 2015', 'Ester Riwo  Buky', '5371021004150003', 1, '2022-07-02 12:22:42'),
(15, 6, 'Bar Wiliam Kornalius  Tuan', '3157074876', '$2y$10$OrXyPfUupf1DlLGwEfifgOHomrSAwoqhuk5mKkNOiEgC6gUxO0xUa', 'Laki-Laki', 'Sabu, 21 Feb 2015', 'Santi  Nainatun', '5371022101150003', 1, '2022-07-02 12:22:42'),
(16, 6, 'Benyamin Paulus  Alokafani', '3154857585', '$2y$10$mvZT3jfWtyN4HUiz8Ktdl.Cqd38BuhFzhvlt1nFJqyihnI7TsHtcS', 'Laki-Laki', 'Rote, 23 Jun 2015', 'Yosina  Kause', '5371020306150006', 1, '2022-07-02 12:22:42'),
(17, 5, 'CHELOMITA PUTRI  OLIVIERA POY', '0144596542', '$2y$10$4L/gdl9v6A/Jt1mlVz5Q/u6mYNjW3InAh.Q34ywQBLCGnxhK66WUy', 'Perempuan', 'Sabu, 10 Apr 2014', 'SANTI  PATTIPELO HY', '5314024410140001', 1, '2022-07-02 12:22:42'),
(18, 6, 'Daut Ariston Tefa', '3152261703', '$2y$10$ppHI2NEBIqQzFpYy963nEOdlp19mou3a40f.tchX8blDplSPasTZe', 'Laki-Laki', 'Atambua, 11 Aug 2015', 'Santi Sette', '5371021108150003', 1, '2022-07-02 12:22:42'),
(19, 5, 'DELOGANER AVENS  MALAIBANA', '3146077422', '$2y$10$H7wj2Vhg3YhMmYUBPeyqyu5NJZFM8GofV6WQE.i6ty319RvOitQRu', 'Laki-Laki', 'Kupang, 18 Dec 2014', 'ESTER  PADAMAI', '5371041812140003', 1, '2022-07-02 12:22:42'),
(20, 5, 'DINA FRANSISKA  SALLU', '3157424262', '$2y$10$J8QF7e9i/xgfuMHYY.6TY.5IcNE3li0qYsixL9h7/QJ37xsfi21l6', 'Perempuan', 'Soe, 14 Jan 2015', 'FERDERIKA FALLO', '5371025401150002', 1, '2022-07-02 12:22:42'),
(21, 5, 'Elando Alan Wielawa', '3159676673', '$2y$10$WMZE2xRvytO4M3grc0bf/.fqRcV30yCwGx0gyLIKLHNbSA9t/mY56', 'Laki-Laki', 'Sabu, 07 Feb 2014', 'Yandri  Sepriana  Mauboi', '5371020702150003', 1, '2022-07-02 12:22:42'),
(22, 5, 'FRANSISKO ASANAB', '3158269759', '$2y$10$sCowrf5rxums.jlFU91sIuW/MFc71tDI2h13QcBJ8aCC8pGdzTMeq', 'Laki-Laki', 'Kupang, 02 Mar 2014', 'YULIANA  BAITANU', '5371020203150004', 1, '2022-07-02 12:22:42'),
(23, 6, 'FRANSISKUS  RICHARDO LAKA  NABUTAEK', '3158289480', '$2y$10$BIGNAatP1UZQsm5E.1G0buZCxVnUQ1EuIokWuTKPLs/QWMzwUVNCO', 'Laki-Laki', 'Sabu, 09 Apr 2015', 'MARIA  IMELDA  ITA', '5301160904150001', 1, '2022-07-02 12:22:42'),
(24, 5, 'GHERALDIEN KETIE  RIWU KAHO', '3159940760', '$2y$10$.BNovS2KRyvHjvv5GlMEN.U.EvlpZwmnD0S1/F/Bl23x7bEYZvWSS', 'Perempuan', 'Sabu, 21 Jul 2015', 'YULIANA  HENUKH', '5371036107150004', 1, '2022-07-02 12:22:42'),
(25, 6, 'FIONA MARSANDA  TOTO', '3159632047', '$2y$10$G/ESVEKH37Zf61VkcAraAutc1xsIjLZ12KmYRlkGaKk6Tj7lQSTNS', 'Perempuan', 'Rote, 02 Apr 2015', 'WELHELMI NA TOTO', '5371024204150002', 1, '2022-07-02 12:22:42'),
(26, 5, 'Anastasya Cendana  Sinamur', '0147234965', '$2y$10$mP74dpuAZHnH7ztywFvliegYmc0oQp3gmI91Mi/3R4.mL5Ai8JZYa', 'Perempuan', 'Surabaya, 30 Aug 2014', 'Natalia Sri  Maryani', '5371027008140003', 1, '2022-07-02 12:22:42'),
(27, 5, 'ANJANA CITRA  MELIAN TALAN', '0141183199', '$2y$10$Fm55FgbfuE/hVYKkMgJoFOk655YJRoLU.9S3QGKShUMQ4qA/pHIvm', 'Perempuan', 'Rote, 02 May 2015', 'RINCE  MANU', '5302074602140002', 1, '2022-07-02 12:22:42'),
(28, 9, 'ANTIKA BILIU', '3149570982', '$2y$10$7S.C3iyUHbqOB51YYx9Mru3i9wJChZPah9Wak.4yIWcITY2a/sePG', 'Perempuan', 'Rote, 02 Aug 2014', 'AXAMINA  TUALAKA', '5371024208140004', 1, '2022-07-02 12:22:42'),
(29, 5, 'CHAROLIN BENZA  MAHODIM', '0137027224', '$2y$10$MhP8PJz6eqbhAViTacZCh.G2gTM/bgVw0oW25DvTm5dika19/6i1y', 'Perempuan', 'Kupang, 13 Apr 2013', 'ADRIANA  BENGANG', '5371057103130001', 1, '2022-07-02 12:22:42'),
(30, 5, 'CRIS AGUNG TUAN', '3134679797', '$2y$10$Z90YElYWwTvv7YHOtp1cCeKDMSH819YP42ydYeylMkh5V/k4E8Geu', 'Laki-Laki', 'Kupang, 29 Mar 2013', 'DAMARIS  HAELEKE', '5371022903130006', 1, '2022-07-02 12:22:42'),
(31, 5, 'DEMSI SESFAO', '0136879884', '$2y$10$9egN3aPhVHjfU1h1UYmsHu7IpKpU/jDqiDRtuG7SUgSY2Gm2/uPA6', 'Laki-Laki', 'Kupang, 22 May 2013', 'ERSYLINA  HERVIANA  NENO', '5371022205130002', 1, '2022-07-02 12:22:42'),
(32, 6, 'CRISSANTOS AGUNG  RAGA SAE', '3137727252', '$2y$10$P0c84n7kDdRc/jK62qEzjOVXBHo5tPath6ZwQHNNDbLCRaCp3q4ya', 'Laki-Laki', 'Kupang, 29 Mar 2013', 'ERNESTA  NDOYA', '5316042903130001', 1, '2022-07-02 12:22:42'),
(33, 6, 'ABNER DEVANDRI  ADITYA MANDALA', '0115433333', '$2y$10$AD7NKn5ONTN/cI9Qtd8XwOgdaEjZolnDxXRQquvDLmaZzZZ7CtkGO', 'Laki-Laki', 'Kupang, 30 May 2011', 'YULIANA  FAOT', '5371023005110002', 1, '2022-07-02 12:22:42'),
(34, 6, 'Abraham Joseph More  Ghale', '0117536548', '$2y$10$898ChPU73Ya1leJuLeWq5.UMADl/d4ruDybpZNxrM3CK76QMpv1bW', 'Laki-Laki', 'Atambua, 30 Dec 2011', 'Yasinta  Maria  Seran', '5371043012110001', 1, '2022-07-02 12:22:42'),
(35, 5, 'Ade Marlino Neno', '0126208122', '$2y$10$WdKc1r9uFaGo7TZ6Nbmbgude4D6kgsa2PFDCmtZlrfsGfzVN89VSe', 'Laki-Laki', 'Atambua, 28 Jun 2012', 'Adriana  Hoinbala', '5371022806120006', 1, '2022-07-02 12:22:42'),
(36, 5, 'Adrianus benu', '0123646027', '$2y$10$LG7OMDi/GuV9nD62KeiG/Of/eKq7teGgG3qhgHvFTxNAo9K4O/dZS', 'Laki-Laki', 'Kupang, 20 Aug 2012', 'Katarina Ta  ek', '5371022008120003', 1, '2022-07-02 12:22:42'),
(37, 5, 'AEEKUNU LEMAN  AKUNUT', '0121102363', '$2y$10$CZ9U9Z4uHv4qkUg5RNY3wut7Eqbhet0gMQbS/p4/EAEKE9oik6bkG', 'Laki-Laki', 'Rote, 03 Nov 2012', 'AISA', '3578160311120001', 1, '2022-07-02 12:22:42'),
(38, 5, 'AGUSTINUS JULIO  TALAN', '3127336522', '$2y$10$mXMqiFuAr/SyaHQWpsShgerEwPtNB10a2H2VJlz/Z.u6pi1k7buiW', 'Laki-Laki', 'Kupang, 16 Jul 2012', 'RINCE  MANU', '5302071607120001', 1, '2022-07-02 12:22:42'),
(39, 6, 'ALVIAN LIONEL  AMTIRAN', '0122262578', '$2y$10$hGTrmswZMY3pqfzz6Ep96.7zohtMVAxbpRh/DLCqKTBHuW.wyaN.W', 'Laki-Laki', 'Kupang, 02 Aug 2012', 'ELEN  MARLINA  LETELAY', '5371020208120001', 1, '2022-07-02 12:22:42'),
(40, 5, 'CAROLINA CEYSELA  OBESI BIFEL', '0108170005', '$2y$10$bBacg4fh0BKGp2rcYg..keq76fCMzuJwnGIc4CWyj6NcxEywWvCrW', 'Perempuan', 'Kupang, 09 Dec 2010', 'MARGARET HA MBURU', '5371024912100002', 1, '2022-07-02 12:22:42'),
(41, 5, 'CICILIA GORETTI MUNI', '0116303502', '$2y$10$fgbmqZr3WsX8lzXFHyKC0e6OZZGR8nVLsQavNE.rUoAZxyugUyrrq', 'Perempuan', 'Kupang, 08 Jan 2018', 'YULIANA  TUAN', '5371024801110002', 1, '2022-07-02 12:22:42'),
(42, 6, 'DELIS KRISTIANI  TAKESAN', '0111433566', '$2y$10$OW/VWMYTsH.a4r.FKenJ2OO70Tdi3QaxpuGSF22HWoWR0A2EZKvfq', 'Perempuan', 'Kupang, 02 Dec 2011', 'ROSALINA  TUAN', '5371024212110002', 1, '2022-07-02 12:22:42'),
(43, 6, 'DISON EMANUEL BRIA', '0092155533', '$2y$10$pfOyV8ov7.RqN.6pPMPuqeMH/ksJVdxaNNTjPDeAFxt9Wchmnlho.', 'Laki-Laki', 'Atambua, 26 Oct 2009', 'MARTEDA  BANA', '5371022610090003', 1, '2022-07-02 12:22:42'),
(44, 6, 'FANNY SAFIRA  TUNMUNI', '0119730430', '$2y$10$xUyeJIU0uWfXkh5S8xMQzeM7bpC3rDHsE5lFzROrw8DBg7wedRGsW', 'Perempuan', 'Kupang, 24 Feb 2011', 'Yuliana  Getreda', '5301116402110001', 1, '2022-07-02 12:22:42'),
(45, 6, 'ALFONS YESAYA  MANUS', '0093658020', '$2y$10$VXJLkJlMEWZd3fC5tg.vZe2UbuUN4lRvl8hA8FsZ9rzYHMgmFIZUK', 'Laki-Laki', 'Kupang, 27 Apr 2009', 'FUNANCI  ABI  MANUS', '5371022704090003', 1, '2022-07-02 12:22:42'),
(46, 5, 'ALMA SETTE', '0102720574', '$2y$10$XIZhx2WCcWkn1UsQDnPS3uIGttHuPJSrYs8b4B1UqFyACRKnzfoRq', 'Laki-Laki', 'Kupang, 17 Aug 2010', 'YOIRI  RITALEN  FALLO', '5371025708100003', 1, '2022-07-02 18:54:28'),
(47, 5, 'ANDHIKA FANGGI', '0097695624', '$2y$10$pxcjO1vC2eZO71IsemAa9ekI7VUlxxowdU5Zql0A0Eu2BqZXbVj7a', 'Laki-Laki', 'Rote, 19 Aug 2009', 'ELIADA  LALUS', '5371021908090003', 1, '2022-07-02 12:22:42'),
(48, 10, 'ANGGA APRIANTO  MISSA', '0097494086', '$2y$10$EPtzMKqaYDuhEe3L9giFK.tL4FKrRGNAYALb.9OpJYJmnSWsINCnS', 'Laki-Laki', 'Kefa, 11 Feb 2009', 'MENCI  TUALAKA', '5371021104090002', 1, '2022-07-02 12:22:42'),
(49, 5, 'ARVEN MILLO PUTRA  NDOLU', '0108857074', '$2y$10$kF/J/p9RWvnhd0Vniyw./epPcUM0TUTqeR9nD/8ls3IiKFj/AGnzW', 'Laki-Laki', 'Rote, 09 Feb 2010', 'APLONIA  MAU', '5371020902100004', 1, '2022-07-02 12:22:42'),
(50, 6, 'Awelpedroz Puru Duli', '0103309760', '$2y$10$fjzh.YF4X9bHcqUN0iJwve0YyYZ2suonn.OnPagoI/Vnl8tzqChwu', 'Laki-Laki', 'Sabu, 25 May 2010', 'Bonevita  Palang  Keda', '5371042505100003', 1, '2022-07-02 12:22:42'),
(51, 6, 'REANOLDA MESI', '94039203', '$2y$10$j6T/O6aKsWloGiokZVSM0ucTQQYr0xI9fZcA4C5u5JGwbSKJYOBAG', 'Laki-Laki', 'Kupang, 12 Dec 2012', 'mesi', '987654', 1, '2022-07-02 12:22:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_guru`
--

CREATE TABLE `status_guru` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_guru`
--

INSERT INTO `status_guru` (`id_status`, `status`) VALUES
(1, 'Guru Honor'),
(2, 'CPNS'),
(3, 'PNS');

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
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

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
-- Indeks untuk tabel `status_guru`
--
ALTER TABLE `status_guru`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `status_guru`
--
ALTER TABLE `status_guru`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
