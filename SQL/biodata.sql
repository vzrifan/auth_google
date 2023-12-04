-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2023 pada 00.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `NAMA` varchar(30) NOT NULL,
  `NIM` varchar(20) NOT NULL,
  `PRODI` varchar(30) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `HP` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `GENDER` varchar(20) NOT NULL,
  `USERNAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`NAMA`, `NIM`, `PRODI`, `ALAMAT`, `HP`, `EMAIL`, `GENDER`, `USERNAME`) VALUES
('Rifan', '1313622011', 'Ilmu Komputer', 'Jalan', '0821', 'vzrifan@gmail.com', 'Laki-laki', 'Rifan Prayoga Manik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
