-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 16 Agu 2019 pada 20.02
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
  `stock` int(5) NOT NULL,
  `stock_limit` int(5) NOT NULL,
  `harga_pokok` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_merk`, `kode_satuan`, `kode_jenis`, `nama_barang`, `stock`, `stock_limit`, `harga_pokok`, `harga_jual`) VALUES
('B0003', 'M01', 'S01', 'J03', 'Roda Vario', 12, 20000, 9000, 50000),
('B0004', 'M02', 'S01', 'J03', 'Oli Yamaxz', 12, 22, 22222, 20000),
('B0005', 'M02', 'S01', 'J02', 'wwfrw', 213, 123, 1223, 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` char(5) NOT NULL,
  `no_plat` char(10) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `no_plat`, `nama_customer`, `alamat`, `no_telp`) VALUES
('K0001', '', 'Safri', 'dassd', 'q3431243432'),
('K0002', 'N 9988 UX', 'ASD', 'asd', '1212');

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
('J01', 'Oli'),
('J02', 'Ban luar'),
('J03', 'Ban Dalam');

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
('JP01', 'Admin'),
('JP02', 'Kasir'),
('JP03', 'Gudang'),
('JP04', 'Cs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik`
--

CREATE TABLE `mekanik` (
  `kode_mekanik` char(5) NOT NULL,
  `nama_mekanik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mekanik`
--

INSERT INTO `mekanik` (`kode_mekanik`, `nama_mekanik`, `alamat`, `no_telp`) VALUES
('MK001', 'kakaka', 'jemenbr', '1809087312'),
('MK002', 'kekeke', 'asda', 'sdasd');

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
('M01', 'Yamaha'),
('M02', 'Honda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `no_plat` char(10) NOT NULL,
  `nama_mobil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`no_plat`, `nama_mobil`) VALUES
('N 9988 UX', 'asdg');

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
  `username` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `status_login` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `kode_jenis_p`, `nama_pegawai`, `alamat`, `no_telp`, `username`, `password`, `status_login`) VALUES
('PG001', 'JP01', 'asd', 'asdasda', 'asdsad', 'asdss', '$2y$10$kYur/fK.ZD/keVhijEjvVev.MEN7QPQJJTGYWzgcM83Ck8S2kIbZ6', '0'),
('PG002', 'JP02', 'kika123', 'jember', '123124', 'kaka', '$2y$10$Pu5a1e7EeZKWkragSdNVoegn/g.2YTOLLvD1E6NAr9sStdjjsPGla', '0'),
('PG003', 'JP01', 'dani', 'jamber', '0897986985695', 'dani', '$2y$10$WV8g0fnkFJ4.kfiz2NbsPO0Nk2JXsiatHrPQwnNCSiqdJ0zWZOVT.', '0');

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
('S01', 'Pcs'),
('S02', 'Lusin');

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
('SV01', 'Ganti Oli', 90000),
('SV02', 'Ganti ban dalam', 3222);

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
('S001', 'Toko Agung Sakti', 'asdasd', 'dasdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_order`
--

CREATE TABLE `work_order` (
  `kode_wo` char(10) NOT NULL,
  `kode_customer` char(5) NOT NULL,
  `kode_mekanik` char(5) NOT NULL,
  `tgl_wo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_wo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `work_order`
--

INSERT INTO `work_order` (`kode_wo`, `kode_customer`, `kode_mekanik`, `tgl_wo`, `status_wo`) VALUES
('WO0001', '', 'MK001', '2019-08-16 12:27:43', '0'),
('WO0002', 'K0002', 'MK001', '2019-08-16 12:29:05', '0');

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
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`kode_mekanik`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`kode_merk`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_plat`);

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
-- Indexes for table `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`kode_wo`);

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
