-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2021 pada 05.58
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sembarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Admin', '111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_JENIS_BARANG` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NAMA_BARANG` varchar(25) DEFAULT NULL,
  `HARGA_BARANG` float DEFAULT NULL,
  `STOK_BARANG` varchar(20) DEFAULT NULL,
  `DESKRIPSI_BARANG` varchar(200) NOT NULL,
  `FOTO_BARANG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_JENIS_BARANG`, `ID_ADMIN`, `NAMA_BARANG`, `HARGA_BARANG`, `STOK_BARANG`, `DESKRIPSI_BARANG`, `FOTO_BARANG`) VALUES
(1, 0, NULL, 'HODDIE AHHA', 250000, '30', '    		    	', 'gr.jpg'),
(3, 0, NULL, 'JAS BATIK', 200000, '20', '    		    	', 'jasbatik.jpg'),
(4, 0, NULL, 'GAMIS', 150000, '30', '', ''),
(7, 0, NULL, 'ABAYA', 205000, '30', '', ''),
(9, 0, NULL, 'KAOS', 40000, '50', '', ''),
(10, 0, NULL, 'PIYAMA', 56000, '40', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `ID_BELI` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `ID_JENIS_BARANG` int(11) DEFAULT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `NAMA_PEMBELI` varchar(25) DEFAULT NULL,
  `ALAMAT_PEMBELI` varchar(50) DEFAULT NULL,
  `NO_TELEPON_PEMBELI` int(11) DEFAULT NULL,
  `HARGA_TOTAL` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `ID_JENIS_BARANG` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NAMA_JENIS_BARANG` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `ID_ONGKIR` int(11) NOT NULL,
  `NAMA_KOTA` varchar(100) NOT NULL,
  `TARIF_KOTA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `NAMA_PELANGGAN` varchar(50) NOT NULL,
  `ALAMAT_PELANGGAN` varchar(100) NOT NULL,
  `EMAIL_PELANGGAN` varchar(50) NOT NULL,
  `PASSWORD_PELANGGAN` varchar(50) NOT NULL,
  `NO_TLP_PELANGGAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `ALAMAT_PELANGGAN`, `EMAIL_PELANGGAN`, `PASSWORD_PELANGGAN`, `NO_TLP_PELANGGAN`) VALUES
(1, 'bruce', 'darjo', 'dada@gmail.com', '123', '12345565');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `ID_PEMBELIAN` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `ID_PEMBELIAN` int(11) NOT NULL,
  `ID_PELANGGAN` int(11) NOT NULL,
  `ID_ONGKIR` int(11) NOT NULL,
  `TANGGAL_PEMBELIAN` date NOT NULL,
  `TOTAL_PEMBELIAN` float NOT NULL,
  `NAMA_KOTA` varchar(100) NOT NULL,
  `TARIF` float NOT NULL,
  `ALAMAT_PENGIRIMAN` varchar(100) NOT NULL,
  `STATUS_PEMBELIAN` varchar(100) NOT NULL,
  `RESI_PEMBELIAN` varchar(50) NOT NULL,
  `DESKRIPSI_PEMBELIAN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `ID_PEMBELIAN_BARANG` int(11) NOT NULL,
  `ID_PEMBELIAN` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `RELATIONSHIP_2_FK` (`ID_ADMIN`),
  ADD KEY `RELATIONSHIP_6_FK` (`ID_JENIS_BARANG`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`ID_BELI`),
  ADD KEY `RELATIONSHIP_3_FK` (`ID_ADMIN`),
  ADD KEY `RELATIONSHIP_4_FK` (`ID_JENIS_BARANG`),
  ADD KEY `RELATIONSHIP_5_FK` (`ID_BARANG`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`ID_JENIS_BARANG`),
  ADD KEY `RELATIONSHIP_1_FK` (`ID_ADMIN`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`ID_ONGKIR`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`ID_PEMBELIAN`);

--
-- Indeks untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`ID_PEMBELIAN_BARANG`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `beli`
--
ALTER TABLE `beli`
  MODIFY `ID_BELI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `ID_JENIS_BARANG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `ID_ONGKIR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `ID_PEMBELIAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `ID_PEMBELIAN_BARANG` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
