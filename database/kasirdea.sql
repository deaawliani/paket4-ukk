-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2024 pada 07.52
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirdea`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_detailpenjualan`
--

CREATE TABLE `kasir_detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `penjualanID` int(11) NOT NULL,
  `produkID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_detailpenjualan`
--

INSERT INTO `kasir_detailpenjualan` (`DetailID`, `penjualanID`, `produkID`, `JumlahProduk`, `subtotal`) VALUES
(17, 22, 5, 2, '25000.00'),
(18, 23, 45, 1, '35000.00'),
(19, 24, 45, 1, '35000.00'),
(27, 33, 45, 2, '35000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_pelanggan`
--

CREATE TABLE `kasir_pelanggan` (
  `pelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `NoMeja` int(11) NOT NULL,
  `NoTelepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_pelanggan`
--

INSERT INTO `kasir_pelanggan` (`pelangganID`, `NamaPelanggan`, `NoMeja`, `NoTelepon`) VALUES
(17, 'alisya', 6, NULL),
(18, 'deaa', 23, NULL),
(19, 'deaa', 23, NULL),
(20, 'deaa', 21, NULL),
(27, 'dea', 8, NULL),
(28, 'dea awliani', 7, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_penjualan`
--

CREATE TABLE `kasir_penjualan` (
  `penjualanID` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `pelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_penjualan`
--

INSERT INTO `kasir_penjualan` (`penjualanID`, `TanggalPenjualan`, `total_harga`, `pelangganID`) VALUES
(17, '2024-02-27', '0.00', 0),
(18, '2024-02-27', '0.00', 0),
(19, '2024-02-27', '0.00', 0),
(20, '2024-02-27', '0.00', 0),
(21, '2024-02-27', '0.00', 0),
(22, '2024-02-27', '0.00', 0),
(23, '2024-02-27', '0.00', 0),
(24, '2024-02-28', '0.00', 0),
(25, '2024-02-28', '0.00', 0),
(26, '2024-02-28', '0.00', 0),
(27, '2024-02-28', '0.00', 0),
(28, '2024-02-28', '0.00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_produk`
--

CREATE TABLE `kasir_produk` (
  `produkID` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_produk`
--

INSERT INTO `kasir_produk` (`produkID`, `nama_produk`, `harga`, `stok`, `Foto`, `Terjual`) VALUES
(2, 'Spagheti', '20000.00', 67, '18022024151356.jpg', 3),
(8, 'salad buah', '25000.00', 67, '28022024073047.jpg', 0),
(45, 'ramen', '35000.00', 60, '27022024043324.jpg', 9),
(56, 'Nasi Kebuli', '38000.00', 48, '28022024013610.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_user`
--

CREATE TABLE `kasir_user` (
  `UserID` int(11) NOT NULL,
  `Nama_user` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_user`
--

INSERT INTO `kasir_user` (`UserID`, `Nama_user`, `Password`, `level`) VALUES
(7, 'deya', '202cb962ac59075b964b07152d234b70', 'admin'),
(111, 'nisa', '202cb962ac59075b964b07152d234b70', 'petugas'),
(1234, 'dea', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kasir_detailpenjualan`
--
ALTER TABLE `kasir_detailpenjualan`
  ADD PRIMARY KEY (`penjualanID`),
  ADD KEY `penjualanID` (`penjualanID`,`produkID`),
  ADD KEY `produkID` (`produkID`),
  ADD KEY `DetailID` (`DetailID`);

--
-- Indeks untuk tabel `kasir_pelanggan`
--
ALTER TABLE `kasir_pelanggan`
  ADD PRIMARY KEY (`pelangganID`);

--
-- Indeks untuk tabel `kasir_penjualan`
--
ALTER TABLE `kasir_penjualan`
  ADD PRIMARY KEY (`penjualanID`),
  ADD KEY `pelangganID` (`pelangganID`);

--
-- Indeks untuk tabel `kasir_produk`
--
ALTER TABLE `kasir_produk`
  ADD PRIMARY KEY (`produkID`);

--
-- Indeks untuk tabel `kasir_user`
--
ALTER TABLE `kasir_user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kasir_detailpenjualan`
--
ALTER TABLE `kasir_detailpenjualan`
  MODIFY `penjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kasir_penjualan`
--
ALTER TABLE `kasir_penjualan`
  MODIFY `penjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
