-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2021 pada 09.15
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webkas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `kode` int(11) NOT NULL,
  `keterangan` varchar(300) CHARACTER SET latin1 NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `jenis` varchar(20) CHARACTER SET latin1 NOT NULL,
  `keluar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`kode`, `keterangan`, `tgl`, `jumlah`, `jenis`, `keluar`) VALUES
(100, 'Honor Muadzin ', '2021-06-05', 0, 'keluar', 1200000),
(121, 'Gaji OB', '2021-06-12', 0, 'keluar', 345000),
(145, 'Agus ali', '2021-06-12', 125000, 'masuk', 0),
(176, 'Muhammad Zidane', '2021-06-10', 1000000, 'Masuk', 0),
(432, 'Abdul', '2021-06-04', 10000000, 'masuk', 0),
(555, 'H Abi', '2021-06-05', 25000, 'masuk', 0),
(565, 'Bu Ina', '2021-07-10', 512322, 'masuk', 0),
(12112, 'Gaji', '2021-06-03', 0, 'keluar', 1345666),
(12122, 'Honor Imam', '2021-06-18', 0, 'keluar', 50002);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'qq', '$2y$10$IheD8/7BkSWAr4LyUVDws.v0m7BqnKbq7L8EhdyoA77bpbtGfr7Bm', '2021-06-17 15:57:18'),
(2, 'admin', '$2y$10$TeF26wZ04eFvDKS2qmT3o.tfAoD4tIxeYM328NfG9EgvpgxoBbE22', '2021-06-17 16:22:29'),
(3, 'admin1', '$2y$10$m8NMAxsG3znpvkixZ9kq9uNZmfxdMJn32uGZo5BDTpWasCwkj.bGO', '2021-07-15 15:46:54'),
(4, 'dane', '$2y$10$KwZaXOKoK2rqhbU6bOJC3OufB.S.wrd2LqSjwqBwmjRCo8Lydb74.', '2021-07-30 15:30:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12123;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
