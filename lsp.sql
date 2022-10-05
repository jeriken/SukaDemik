-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2022 pada 03.19
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nid` bigint(20) NOT NULL,
  `nama_dsn` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nid`, `nama_dsn`, `jenkel`) VALUES
(123, 'Agus Mulyanto', 'Laki-laki'),
(345, 'Elon Musk', 'Laki-laki'),
(678, 'Luo Yi', 'Perempuan'),
(789, 'Jack Ma', 'Laki-laki'),
(911, 'Sumarsono', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `nid` bigint(20) NOT NULL,
  `idm` bigint(20) NOT NULL,
  `idw` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nim`, `nid`, `idm`, `idw`) VALUES
(1, 19106050024, 123, 222, 1),
(12, 19106050026, 123, 434, 2),
(13, 19106050012, 789, 222, 4),
(14, 19106050024, 123, 345, 3),
(15, 19106040024, 678, 678, 2),
(16, 18106050024, 123, 187, 3),
(17, 19106050045, 123, 187, 5),
(18, 19106050056, 123, 348, 1),
(19, 19106050012, 123, 348, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` bigint(20) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `password`, `semester`, `jenkel`, `jurusan`) VALUES
(18106050024, 'Salsabela', 'ngetes', 14, 'Perempuan', 'Ilmu Kesehatan Masyarakat'),
(19106040024, 'Pradika Rifai', 'ngetes', 9, 'Laki-laki', 'Ilmu Hukum'),
(19106050012, 'Rofif Agna', 'ngetes', 6, 'Laki-laki', 'Teknik Informatika'),
(19106050024, 'Muhammad Razin M', 'ngetes', 7, 'Laki-laki', 'Informatika'),
(19106050026, 'Feli Andana', 'ngetes', 11, 'Perempuan', 'Ekonomi Syariah'),
(19106050044, 'Bayu Aji Wicaksono', 'ngetes', 4, 'Laki-laki', 'Teknik Informatika'),
(19106050045, 'Ridhayani', 'ngetes', 7, 'Perempuan', 'Teknik Informatika'),
(19106050056, 'Muhammad Irfan', 'ngetes', 11, 'Laki-laki', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `idm` bigint(11) NOT NULL,
  `nid` bigint(20) NOT NULL,
  `idw` bigint(20) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`idm`, `nid`, `idw`, `nama_mk`, `semester`, `sks`) VALUES
(187, 789, 3, 'Dunia Utopia', 4, 5),
(222, 123, 1, 'Pemrograman Web', 7, 4),
(345, 345, 4, 'Trading Crypto', 7, 4),
(348, 911, 5, 'Pemrograman Android', 7, 3),
(434, 123, 2, 'Belajar Saham', 6, 4),
(456, 911, 1, 'Jaringan', 4, 2),
(678, 678, 4, 'Teleport ke Rumput', 5, 3),
(789, 789, 2, 'Rahasia Elit Global', 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `idw` bigint(20) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`idw`, `waktu`, `hari`, `ruangan`) VALUES
(1, '07.00-09.00', 'Senin', 'FST-404'),
(2, '07.00-09.00', 'Jumat', 'FST-303'),
(3, '13.00-15.00', 'Senin', 'FST-101'),
(4, '09.30-11.00', 'Selasa', 'FST-303'),
(5, '09.30-11.00', 'Kamis', 'FST-301'),
(6, '16.00-17.30', 'Jumat', 'FST-309');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`,`nid`,`idm`),
  ADD KEY `nid` (`nid`),
  ADD KEY `idm` (`idm`),
  ADD KEY `nim_2` (`nim`,`nid`,`idm`),
  ADD KEY `idw` (`idw`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`idm`),
  ADD KEY `idw` (`idw`),
  ADD KEY `nid` (`nid`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`idw`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `idw` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `dosen` (`nid`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`idm`) REFERENCES `matkul` (`idm`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`idw`) REFERENCES `waktu` (`idw`);

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`idw`) REFERENCES `waktu` (`idw`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matkul_ibfk_2` FOREIGN KEY (`nid`) REFERENCES `dosen` (`nid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
