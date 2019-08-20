-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 20, 2019 at 04:57 PM
-- Server version: 10.1.38-MariaDB-0ubuntu0.18.04.1
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(30) NOT NULL,
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
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_merk`, `kode_satuan`, `kode_jenis`, `nama_barang`, `stock`, `stock_limit`, `harga_pokok`, `harga_jual`) VALUES
('B0003', 'M01', 'S01', 'J03', 'Roda Vario', 12, 20000, 9000, 50000),
('B0004', 'M02', 'S01', 'J03', 'Oli Yamaxz', 12, 22, 22222, 20000),
('B0005', 'M02', 'S01', 'J02', 'wwfrw', 213, 123, 1223, 123);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kode_customer` char(5) NOT NULL,
  `no_plat` char(10) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kode_customer`, `no_plat`, `nama_customer`, `alamat`, `no_telp`) VALUES
('K0001', 'N 7779 UB', 'Safri', 'dassd', 'q3431243432'),
('K0002', 'N 9988 UX', 'ASD', 'asd', '1212'),
('K0003', 'P 8988 UX', 'rizal', 'jember', '089621835685'),
('K0004', 'N 9988 PO', 'Abda', 'Lumajang', '089781623124'),
('K0005', '', '', '', ''),
('K0006', 'N 9998 UB', 'Abda', 'Lumajang', '0897969212');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penggajian`
--

CREATE TABLE `detail_penggajian` (
  `kode_detail_penggajian` int(8) NOT NULL,
  `kode_penggajian` char(9) NOT NULL,
  `kode_pegawai` char(5) NOT NULL,
  `periode_gaji` varchar(10) NOT NULL,
  `jumlah_hari_kerja` tinyint(3) NOT NULL,
  `total_gaji` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penggajian`
--

INSERT INTO `detail_penggajian` (`kode_detail_penggajian`, `kode_penggajian`, `kode_pegawai`, `periode_gaji`, `jumlah_hari_kerja`, `total_gaji`) VALUES
(1, 'PGJ000001', 'PG002', 'Januari', 30, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penggajian_m`
--

CREATE TABLE `detail_penggajian_m` (
  `kode_detail_pm` int(8) NOT NULL,
  `kode_penggajian` char(9) NOT NULL,
  `kode_mekanik` char(5) NOT NULL,
  `periode_gaji` varchar(10) NOT NULL,
  `jumlah_hari_kerja` tinyint(3) NOT NULL,
  `total_gaji` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penggajian_m`
--

INSERT INTO `detail_penggajian_m` (`kode_detail_pm`, `kode_penggajian`, `kode_mekanik`, `periode_gaji`, `jumlah_hari_kerja`, `total_gaji`) VALUES
(1, 'PGJ000001', 'MK001', 'Januari', 30, 1500),
(2, 'PGJ000001', 'MK002', 'Januari', 30, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan_barang`
--

CREATE TABLE `detail_penjualan_barang` (
  `kode_detail_pb` int(11) NOT NULL,
  `no_faktur_penjualan` char(10) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `sub_total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan_barang`
--

INSERT INTO `detail_penjualan_barang` (`kode_detail_pb`, `no_faktur_penjualan`, `kode_barang`, `jumlah_barang`, `sub_total_harga`) VALUES
(1, 'FK000001', 'B0003', 1, 0),
(2, 'FK000001', 'B0004', 3, 0),
(9, 'FK000002', 'B0004', 3, 60000),
(10, 'FK000003', 'B0004', 1, 20000),
(11, 'FK000003', 'B0003', 2, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan_service`
--

CREATE TABLE `detail_penjualan_service` (
  `kode_detail_ps` int(11) NOT NULL,
  `kode_wo` char(10) NOT NULL,
  `kode_service` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan_service`
--

INSERT INTO `detail_penjualan_service` (`kode_detail_ps`, `kode_wo`, `kode_service`) VALUES
(1, 'WO0005', 'SV01'),
(2, 'WO0005', 'SV02'),
(3, 'WO0006', 'SV01'),
(4, 'WO0007', 'SV02'),
(5, 'WO0007', 'SV01');

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `kode_detail_permintaan` int(8) NOT NULL,
  `kode_permintaan` char(8) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `jumlah_barang` smallint(5) NOT NULL,
  `sub_total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`kode_detail_permintaan`, `kode_permintaan`, `kode_barang`, `jumlah_barang`, `sub_total_harga`) VALUES
(9, 'PB000001', 'B0003', 5, 45000),
(10, 'PB000001', 'B0004', 2, 44444),
(11, 'PB000002', 'B0005', 3, 3669),
(12, 'PB000002', 'B0003', 2, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kode_jenis` varchar(3) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_jenis`, `nama_jenis`) VALUES
('J01', 'Oli'),
('J02', 'Ban luar'),
('J03', 'Ban Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pegawai`
--

CREATE TABLE `jenis_pegawai` (
  `kode_jenis_p` char(4) NOT NULL,
  `nama_jenis_p` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pegawai`
--

INSERT INTO `jenis_pegawai` (`kode_jenis_p`, `nama_jenis_p`) VALUES
('JP01', 'Admin'),
('JP02', 'Kasir'),
('JP03', 'Gudang'),
('JP04', 'Cs');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_plat` char(10) NOT NULL,
  `nama_kendaraan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no_plat`, `nama_kendaraan`) VALUES
('', ''),
('N 7779 UB', 'Avanza'),
('N 9988 PO', 'Rush'),
('N 9988 UX', 'asdg'),
('N 9998 UB', 'Pajeros'),
('P 8988 UX', 'Pajero');

-- --------------------------------------------------------

--
-- Table structure for table `kode_detail_pm`
--

CREATE TABLE `kode_detail_pm` (
  `kode_detail_pm` int(8) NOT NULL,
  `kode_penggajian` char(9) NOT NULL,
  `kode_mekanik` char(5) NOT NULL,
  `periode_gaji` varchar(10) NOT NULL,
  `jumlah_hari_kerja` tinyint(3) NOT NULL,
  `total_gaji` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `kode_mekanik` char(5) NOT NULL,
  `nama_mekanik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`kode_mekanik`, `nama_mekanik`, `alamat`, `no_telp`) VALUES
('MK001', 'kakaka', 'jemenbr', '1809087312'),
('MK002', 'kekeke', 'asda', 'sdasd');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `kode_merk` varchar(3) NOT NULL,
  `nama_merk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`kode_merk`, `nama_merk`) VALUES
('M01', 'Yamaha'),
('M02', 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `kode_jenis_p`, `nama_pegawai`, `alamat`, `no_telp`, `username`, `password`, `status_login`) VALUES
('PG001', 'JP01', 'asd', 'asdasda', 'asdsad', 'asdss', '$2y$10$kYur/fK.ZD/keVhijEjvVev.MEN7QPQJJTGYWzgcM83Ck8S2kIbZ6', '0'),
('PG002', 'JP02', 'Kika123', 'Jember', '123124', 'kasir', '$2y$10$/Kf1OGnFXWkPAwoQEymuhORed7QhC7peB1bZ630kLUd/b5bF50W.K', '0'),
('PG003', 'JP01', 'dani', 'jamber', '0897986985695', 'dani', '$2y$10$WV8g0fnkFJ4.kfiz2NbsPO0Nk2JXsiatHrPQwnNCSiqdJ0zWZOVT.', '0'),
('PG004', 'JP02', 'Iyek', 'Asd', '0809898', 'iyek', '$2y$10$pJrI0ehIBfS.ntcPP3PcMemHQvyoCI24zAGQXS/tTNxN9KuW6GiCy', '1'),
('PG005', 'JP03', 'Ali', 'Jember', '08968585', 'gudang', '$2y$10$heOCWvq.A7VpHGVCS14Fj./dctD/VjFbz9e1Lf.WwuIcwPQ2zIBsy', '0'),
('PG006', 'JP04', 'Cs', 'Asdasd', '1213423', 'cs', '$2y$10$nmRHQsReWr6SaLiOQSwEmukGSpk3WGWJBhkTyRe8vf6eah6FuylhW', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_faktur_pembelian` char(9) NOT NULL,
  `kode_pegawai` char(5) NOT NULL,
  `kode_suplier` char(4) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sub_total` int(10) NOT NULL,
  `potongan` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_faktur_pembelian`, `kode_pegawai`, `kode_suplier`, `tgl_transaksi`, `sub_total`, `potongan`, `total_harga`, `bayar`, `kembalian`, `status`) VALUES
('NFP000001', 'PG002', 'S001', '2019-08-18 19:16:15', 89444, 9444, 80000, 100000, 20000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `kode_penggajian` char(9) NOT NULL,
  `kode_pegawai` char(5) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_penggajian` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`kode_penggajian`, `kode_pegawai`, `tgl_transaksi`, `total_penggajian`, `bayar`, `kembalian`, `status`) VALUES
('PGJ000001', 'PG003', '2019-08-20 00:11:38', 4500, 5000, 500, '1');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur_penjualan` char(10) NOT NULL,
  `kode_pegawai` char(5) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_harga` int(11) NOT NULL,
  `potongan_harga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_faktur_penjualan`, `kode_pegawai`, `tgl_transaksi`, `total_harga`, `potongan_harga`, `bayar`, `kembalian`, `status`) VALUES
('FK000001', 'PG002', '2019-08-14 12:20:41', 110000, 0, 120000, 10000, 'sukses'),
('FK000002', 'PG004', '2019-08-20 09:17:54', 60000, 0, 99999, 100000, '0'),
('FK000003', 'PG004', '2019-08-20 09:41:35', 120000, 0, 998889, 100000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_wo`
--

CREATE TABLE `penjualan_wo` (
  `id_detail_service` int(11) NOT NULL,
  `no_faktur_penjualan` varchar(10) NOT NULL,
  `kode_wo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_wo`
--

INSERT INTO `penjualan_wo` (`id_detail_service`, `no_faktur_penjualan`, `kode_wo`) VALUES
(1, 'FK000004', 'WO0005'),
(2, 'FK000002', 'WO0007');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `kode_permintaan` char(8) NOT NULL,
  `tgl_permintaan` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_barang`
--

INSERT INTO `permintaan_barang` (`kode_permintaan`, `tgl_permintaan`, `status`) VALUES
('PB000001', '2019-08-17 20:48:52', '1'),
('PB000002', '2019-08-17 20:53:16', '0');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `kode_po` int(8) NOT NULL,
  `no_faktur_pembelian` char(9) NOT NULL,
  `kode_permintaan` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`kode_po`, `no_faktur_pembelian`, `kode_permintaan`) VALUES
(2, 'NFP000001', 'PB000001');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `kode_satuan` varchar(3) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`kode_satuan`, `nama_satuan`) VALUES
('S01', 'Pcs'),
('S02', 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `kode_service` varchar(5) NOT NULL,
  `nama_service` varchar(30) NOT NULL,
  `tarif_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`kode_service`, `nama_service`, `tarif_harga`) VALUES
('SV01', 'Ganti Oli', 90000),
('SV02', 'Ganti ban dalam', 3222);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `kode_suplier` char(4) NOT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`kode_suplier`, `nama_suplier`, `alamat`, `kontak_person`, `telp`) VALUES
('S001', 'Toko Agung Sakti', 'asdasd', 'dasdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `work_order`
--

CREATE TABLE `work_order` (
  `kode_wo` char(10) NOT NULL,
  `kode_customer` char(5) NOT NULL,
  `kode_mekanik` char(5) NOT NULL,
  `tgl_wo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_wo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_order`
--

INSERT INTO `work_order` (`kode_wo`, `kode_customer`, `kode_mekanik`, `tgl_wo`, `status_wo`) VALUES
('WO0001', '', 'MK001', '2019-08-16 12:27:43', '0'),
('WO0002', 'K0002', 'MK001', '2019-08-16 12:29:05', '0'),
('WO0003', 'K0001', 'MK001', '2019-08-17 08:56:56', '0'),
('WO0004', 'K0002', 'MK002', '2019-08-17 08:57:31', '0'),
('WO0005', 'K0003', 'MK001', '2019-08-17 08:59:22', '0'),
('WO0006', 'K0001', 'MK001', '2019-08-20 09:04:01', '1'),
('WO0007', 'K0006', 'MK001', '2019-08-20 09:17:55', '1');

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
-- Indexes for table `detail_penggajian`
--
ALTER TABLE `detail_penggajian`
  ADD PRIMARY KEY (`kode_detail_penggajian`);

--
-- Indexes for table `detail_penggajian_m`
--
ALTER TABLE `detail_penggajian_m`
  ADD PRIMARY KEY (`kode_detail_pm`);

--
-- Indexes for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  ADD PRIMARY KEY (`kode_detail_pb`);

--
-- Indexes for table `detail_penjualan_service`
--
ALTER TABLE `detail_penjualan_service`
  ADD PRIMARY KEY (`kode_detail_ps`);

--
-- Indexes for table `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD PRIMARY KEY (`kode_detail_permintaan`);

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
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indexes for table `kode_detail_pm`
--
ALTER TABLE `kode_detail_pm`
  ADD PRIMARY KEY (`kode_detail_pm`);

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode_pegawai`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_faktur_pembelian`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`kode_penggajian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur_penjualan`);

--
-- Indexes for table `penjualan_wo`
--
ALTER TABLE `penjualan_wo`
  ADD PRIMARY KEY (`id_detail_service`);

--
-- Indexes for table `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`kode_permintaan`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`kode_po`);

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
-- AUTO_INCREMENT for table `detail_penggajian`
--
ALTER TABLE `detail_penggajian`
  MODIFY `kode_detail_penggajian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_penggajian_m`
--
ALTER TABLE `detail_penggajian_m`
  MODIFY `kode_detail_pm` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  MODIFY `kode_detail_pb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `detail_penjualan_service`
--
ALTER TABLE `detail_penjualan_service`
  MODIFY `kode_detail_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  MODIFY `kode_detail_permintaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kode_detail_pm`
--
ALTER TABLE `kode_detail_pm`
  MODIFY `kode_detail_pm` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penjualan_wo`
--
ALTER TABLE `penjualan_wo`
  MODIFY `id_detail_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `kode_po` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
