-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2019 pada 02.15
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
('K0001', 'N 7779 UB', 'Safri', 'dassd', 'q3431243432'),
('K0002', 'N 9988 UX', 'ASD', 'asd', '1212'),
('K0003', 'P 8988 UX', 'rizal', 'jember', '089621835685');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penggajian`
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
-- Dumping data untuk tabel `detail_penggajian`
--

INSERT INTO `detail_penggajian` (`kode_detail_penggajian`, `kode_penggajian`, `kode_pegawai`, `periode_gaji`, `jumlah_hari_kerja`, `total_gaji`) VALUES
(1, 'PGJ000001', 'PG002', 'Januari', 30, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penggajian_m`
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
-- Dumping data untuk tabel `detail_penggajian_m`
--

INSERT INTO `detail_penggajian_m` (`kode_detail_pm`, `kode_penggajian`, `kode_mekanik`, `periode_gaji`, `jumlah_hari_kerja`, `total_gaji`) VALUES
(1, 'PGJ000001', 'MK001', 'Januari', 30, 1500),
(2, 'PGJ000001', 'MK002', 'Januari', 30, 2000);

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
-- Struktur dari tabel `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `kode_detail_permintaan` int(8) NOT NULL,
  `kode_permintaan` char(8) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `jumlah_barang` smallint(5) NOT NULL,
  `sub_total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`kode_detail_permintaan`, `kode_permintaan`, `kode_barang`, `jumlah_barang`, `sub_total_harga`) VALUES
(9, 'PB000001', 'B0003', 5, 45000),
(10, 'PB000001', 'B0004', 2, 44444),
(11, 'PB000002', 'B0005', 3, 3669),
(12, 'PB000002', 'B0003', 2, 18000);

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
-- Struktur dari tabel `kode_detail_pm`
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
('N 7779 UB', 'Avanza'),
('N 9988 UX', 'asdg'),
('P 8988 UX', 'Pajero');

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
('PG002', 'JP02', 'Kika123', 'Jember', '123124', 'kasir', '$2y$10$/Kf1OGnFXWkPAwoQEymuhORed7QhC7peB1bZ630kLUd/b5bF50W.K', '0'),
('PG003', 'JP01', 'dani', 'jamber', '0897986985695', 'dani', '$2y$10$WV8g0fnkFJ4.kfiz2NbsPO0Nk2JXsiatHrPQwnNCSiqdJ0zWZOVT.', '1'),
('PG004', 'JP02', 'Iyek', 'Asd', '0809898', 'iyek', '$2y$10$pJrI0ehIBfS.ntcPP3PcMemHQvyoCI24zAGQXS/tTNxN9KuW6GiCy', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
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
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`no_faktur_pembelian`, `kode_pegawai`, `kode_suplier`, `tgl_transaksi`, `sub_total`, `potongan`, `total_harga`, `bayar`, `kembalian`, `status`) VALUES
('NFP000001', 'PG002', 'S001', '2019-08-18 19:16:15', 89444, 9444, 80000, 100000, 20000, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
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
-- Dumping data untuk tabel `penggajian`
--

INSERT INTO `penggajian` (`kode_penggajian`, `kode_pegawai`, `tgl_transaksi`, `total_penggajian`, `bayar`, `kembalian`, `status`) VALUES
('PGJ000001', 'PG003', '2019-08-20 00:11:38', 4500, 5000, 500, '1');

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
-- Struktur dari tabel `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `kode_permintaan` char(8) NOT NULL,
  `tgl_permintaan` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_barang`
--

INSERT INTO `permintaan_barang` (`kode_permintaan`, `tgl_permintaan`, `status`) VALUES
('PB000001', '2019-08-17 20:48:52', '1'),
('PB000002', '2019-08-17 20:53:16', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE `purchase_order` (
  `kode_po` int(8) NOT NULL,
  `no_faktur_pembelian` char(9) NOT NULL,
  `kode_permintaan` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase_order`
--

INSERT INTO `purchase_order` (`kode_po`, `no_faktur_pembelian`, `kode_permintaan`) VALUES
(2, 'NFP000001', 'PB000001');

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
('WO0002', 'K0002', 'MK001', '2019-08-16 12:29:05', '0'),
('WO0003', 'K0001', 'MK001', '2019-08-17 08:56:56', '0'),
('WO0004', 'K0002', 'MK002', '2019-08-17 08:57:31', '0'),
('WO0005', 'K0003', 'MK001', '2019-08-17 08:59:22', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indeks untuk tabel `detail_penggajian`
--
ALTER TABLE `detail_penggajian`
  ADD PRIMARY KEY (`kode_detail_penggajian`);

--
-- Indeks untuk tabel `detail_penggajian_m`
--
ALTER TABLE `detail_penggajian_m`
  ADD PRIMARY KEY (`kode_detail_pm`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`kode_detail_penjualan`);

--
-- Indeks untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD PRIMARY KEY (`kode_detail_permintaan`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indeks untuk tabel `jenis_pegawai`
--
ALTER TABLE `jenis_pegawai`
  ADD PRIMARY KEY (`kode_jenis_p`);

--
-- Indeks untuk tabel `kode_detail_pm`
--
ALTER TABLE `kode_detail_pm`
  ADD PRIMARY KEY (`kode_detail_pm`);

--
-- Indeks untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`kode_mekanik`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`kode_merk`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_plat`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kode_pegawai`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_faktur_pembelian`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`kode_penggajian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur_penjualan`);

--
-- Indeks untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`kode_permintaan`);

--
-- Indeks untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`kode_po`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kode_satuan`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`kode_service`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`kode_suplier`);

--
-- Indeks untuk tabel `work_order`
--
ALTER TABLE `work_order`
  ADD PRIMARY KEY (`kode_wo`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penggajian`
--
ALTER TABLE `detail_penggajian`
  MODIFY `kode_detail_penggajian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_penggajian_m`
--
ALTER TABLE `detail_penggajian_m`
  MODIFY `kode_detail_pm` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `kode_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  MODIFY `kode_detail_permintaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kode_detail_pm`
--
ALTER TABLE `kode_detail_pm`
  MODIFY `kode_detail_pm` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `kode_po` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
