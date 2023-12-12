-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2023 pada 17.59
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_ilkom`
--

CREATE TABLE `mahasiswa_ilkom` (
  `semester` varchar(15) NOT NULL,
  `kelas` int(11) NOT NULL,
  `kode_mk` int(9) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(2) NOT NULL,
  `nilai` text NOT NULL,
  `bobot` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_ilkom`
--

INSERT INTO `mahasiswa_ilkom` (`semester`, `kelas`, `kode_mk`, `nama_mk`, `sks`, `nilai`, `bobot`) VALUES
('1 2021/2022', 1000000011, 31451134, 'Kalkulus Differensial', 3, 'A-', '11.2'),
('2 2021/2022', 1000000045, 13357532, 'Struktur Data dan Algoritma', 3, 'A', '11.1'),
('1 2022/2023', 1000000057, 12439853, 'Data Raya dan Pemrograman', 3, 'B', '9.4'),
('2 2021/2022', 1000000076, 11243578, 'Aljabar Linier', 3, 'C+', '5.8'),
('1 2022/2023', 1000000446, 47795327, 'Komputer Grafik', 3, 'A-', '10.6'),
('1 2022/2023', 1000000679, 57568432, 'Metode Numerik', 3, 'D', '4.8'),
('2 2021/2022', 1300000076, 23258790, 'Pengantar Teori Graph', 3, 'B+', '10.4'),
('1 2021/2022', 1313600000, 31451120, 'Bahasa Inggris', 2, 'B-', '6.3'),
('1 2021/2022', 1313600001, 31451123, 'Pengantar TIK', 2, 'B+', '7.9'),
('1 2021/2022', 1313600002, 31451121, 'Olimpisme', 2, 'A+', '9'),
('1 2021/2022', 1313600003, 31451122, 'Bahasa Indonesia', 2, 'A-', '7.6'),
('1 2021/2022', 1313600004, 31451124, 'Pendidikan Pancasila', 2, 'B', '6.1'),
('1 2021/2022', 1313600005, 31451133, 'Dasar-dasar Pemrograman', 3, 'A+', '12.1'),
('1 2021/2022', 1313600006, 31451126, 'Statistika dan Probabilitas', 3, 'A', '12'),
('2 2021/2022', 1313600007, 23131242, 'Pendidikan Kewarganegaraan', 2, 'A-', '7.9'),
('2 2021/2022', 1313600009, 21312487, 'Pendidikan Agama Islam', 2, 'A+', '9'),
('1 2021/2022', 1313600014, 31451125, 'Matematika Diskrit', 3, 'B-', '6.5'),
('1 2022/2023', 1313600018, 214153543, 'Perancangan dan Pemrograman Web', 3, 'A+', '12.5'),
('1 2022/2023', 1313600097, 467658334, 'Interaksi Manusia', 3, 'C+', '6.3'),
('2 2022/2023', 1313600099, 12435435, 'Desain dan Analisis Algoritma', 3, 'A+', '12.5'),
('2 2022/2023', 1313600546, 12423546, 'Logika dan Penalaran Ilmiah', 3, 'B', '9'),
('2 2022/2023', 1313600753, 23235436, 'Teori Informasi', 2, 'A', '8.7'),
('2 2022/2023', 1313605467, 314511233, 'Rekayasa Perangkat Lunak', 3, 'A-', '11.1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa_ilkom`
--
ALTER TABLE `mahasiswa_ilkom`
  ADD PRIMARY KEY (`kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_ilkom`
--
ALTER TABLE `mahasiswa_ilkom`
  MODIFY `kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313605468;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
