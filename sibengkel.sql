-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14 Agu 2019 pada 19.21
-- Versi Server: 10.1.38-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(5) NOT NULL,
  `kode_merk` varchar(3) NOT NULL,
  `kode_satuan` varchar(3) NOT NULL,
  `kode_jenis` varchar(3) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_limit` int(11) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_merk`, `kode_satuan`, `kode_jenis`, `nama_barang`, `stock`, `stock_limit`, `harga_pokok`, `harga_jual`) VALUES
('B0003', 'M01', 'S01', 'J03', 'Roda Vario', 12, 20000, 9000, 50000),
('B0004', 'M02', 'S01', 'J03', 'Oli Yamaxz', 12, 22, 22222, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` char(5) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama_customer`, `alamat`, `no_telp`) VALUES
('K0001', 'kika', 'jember', '0812312323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kode_detail_penjualan` int(11) NOT NULL,
  `no_faktur_penjualan` char(10) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `potongan_penjualan` int(11) NOT NULL,
  `sub_total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kode_detail_penjualan`, `no_faktur_penjualan`, `kode_barang`, `jumlah_barang`, `potongan_penjualan`, `sub_total_harga`) VALUES
(1, 'FK000001', 'B0003', 1, 0, 50000),
(2, 'FK000001', 'B0004', 3, 0, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kode_jenis` varchar(3) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_jenis`, `nama_jenis`) VALUES
('J01', 'setir'),
('J02', 'peleng'),
('J03', 'Oli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pegawai`
--

CREATE TABLE `jenis_pegawai` (
  `kode_jenis_p` char(4) NOT NULL,
  `nama_jenis_p` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pegawai`
--

INSERT INTO `jenis_pegawai` (`kode_jenis_p`, `nama_jenis_p`) VALUES
('JP01', 'asdasd11133'),
('JP02', 'asd'),
('JP03', 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `kode_merk` varchar(3) NOT NULL,
  `nama_merk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`kode_merk`, `nama_merk`) VALUES
('M01', 'Asusxxxas'),
('M02', 'Yamaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `kode_pegawai` char(5) NOT NULL,
  `kode_jenis_p` char(4) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status_login` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `kode_jenis_p`, `nama_pegawai`, `alamat`, `no_telp`, `status_login`) VALUES
('PG002', 'JP01', 'kika33', 'asd', '80123', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur_penjualan` char(10) NOT NULL,
  `kode_pegawai` char(5) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_harga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`no_faktur_penjualan`, `kode_pegawai`, `tgl_transaksi`, `total_harga`, `bayar`, `kembalian`, `status`) VALUES
('FK000001', 'PG002', '2019-08-14 12:20:41', 110000, 120000, 10000, 'sukses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `kode_satuan` varchar(3) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`kode_satuan`, `nama_satuan`) VALUES
('S01', 'pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `kode_service` varchar(5) NOT NULL,
  `nama_service` varchar(30) NOT NULL,
  `tarif_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`kode_service`, `nama_service`, `tarif_harga`) VALUES
('SV01', 'Ganti Oli', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `kode_suplier` char(4) NOT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`kode_suplier`, `nama_suplier`, `alamat`, `kontak_person`, `telp`) VALUES
('S001', '1111', '333', '222', '444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`kode_detail_penjualan`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `jenis_pegawai`
--
ALTER TABLE `jenis_pegawai`
  ADD PRIMARY KEY (`kode_jenis_p`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`kode_merk`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode_pegawai`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur_penjualan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`kode_service`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kode_suplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `kode_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
