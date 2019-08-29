-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2019 pada 12.46
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
('B0001', 'M02', 'S02', 'J01', 'Swallows', 80, 100, 70000, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kode_customer` char(10) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama_customer`, `alamat`, `no_telp`) VALUES
('K0001', 'Erik', 'Jember', '08981231212'),
('K0002', 'Umum', '-', '-');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan_barang`
--

CREATE TABLE `detail_penjualan_barang` (
  `kode_detail_pb` int(11) NOT NULL,
  `no_faktur_penjualan` char(10) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `sub_total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan_barang`
--

INSERT INTO `detail_penjualan_barang` (`kode_detail_pb`, `no_faktur_penjualan`, `kode_barang`, `jumlah_barang`, `sub_total_harga`) VALUES
(22, 'FK000001', 'B0001', 10, 800000),
(23, 'FK000002', 'B0001', 1, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan_service`
--

CREATE TABLE `detail_penjualan_service` (
  `kode_detail_ps` int(11) NOT NULL,
  `kode_wo` char(10) NOT NULL,
  `kode_service` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_penjualan_service`
--

INSERT INTO `detail_penjualan_service` (`kode_detail_ps`, `kode_wo`, `kode_service`) VALUES
(11, 'WO0001', 'SV01');

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
(19, 'PB000001', 'B0001', 22, 1540000),
(20, 'PB000001', 'B0001', 11, 770000);

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
('J01', 'Ban luar');

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
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_plat` char(10) NOT NULL,
  `nama_kendaraan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`no_plat`, `nama_kendaraan`) VALUES
('P 8728 UX', 'Kijang 2003');

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
('MK001', 'Supriyadi', 'Lumajang', '08922235462');

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
('M02', 'Honda'),
('M03', 'Banluar');

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
  `status_login` char(1) NOT NULL,
  `session_id` varchar(26) NOT NULL DEFAULT 'kosong',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`kode_pegawai`, `kode_jenis_p`, `nama_pegawai`, `alamat`, `no_telp`, `username`, `password`, `status_login`, `session_id`, `last_login`) VALUES
('PG001', 'JP01', 'Admin', 'Jember', '0897986985695', 'admin', '$2y$10$7iu93OUOh4eMeBiaj6TNlukLcWpXVFxlAv0X5nj2BtCmvOc6eTRC6', '1', '2f36vrt5uisulau893o2lmi2aj', '2019-08-29 10:38:06'),
('PG002', 'JP03', 'Gudang', 'Lumajang', '08982827293', 'gudang', '$2y$10$rl/E1tukpYN08rQkvOdVNefLlBO/IMM2QXvRhJuPTmRdUkf4.WNXm', '0', '', '0000-00-00 00:00:00'),
('PG003', 'JP02', 'Kasir', 'Asdasda123', '0897765674', 'kasir', '$2y$10$rcBpHopudMljVRA3tadU6.tRhe638.VM/Renbbq4tOwNgLg/LwF5y', '0', 'kosong', '2019-08-29 09:57:19'),
('PG004', 'JP04', 'Cs', 'Bondowoso', '08362763728', 'cs', '$2y$10$UIRnus12hxGWHsrIpDU2OOAMpCDyX15qXVFxcmHzYPqSdGvlWQzvS', '0', '', '0000-00-00 00:00:00');

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
('NFP000001', 'PG003', 'S001', '2019-08-27 14:43:15', 2310000, 0, 2310000, 9000000, 6690000, '1');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur_penjualan` char(10) NOT NULL,
  `kode_customer` char(10) NOT NULL,
  `kode_pegawai` char(5) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_harga` int(11) NOT NULL,
  `potongan_harga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`no_faktur_penjualan`, `kode_customer`, `kode_pegawai`, `tgl_transaksi`, `total_harga`, `potongan_harga`, `bayar`, `kembalian`, `status`) VALUES
('FK000001', 'K0002', 'PG003', '2019-08-27 14:18:25', 800000, 0, 900, 0, '0'),
('FK000002', 'K0001', 'PG003', '2019-08-27 14:24:08', 170000, 0, 20000, 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_wo`
--

CREATE TABLE `penjualan_wo` (
  `id_detail_service` int(11) NOT NULL,
  `no_faktur_penjualan` varchar(10) NOT NULL,
  `kode_wo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_wo`
--

INSERT INTO `penjualan_wo` (`id_detail_service`, `no_faktur_penjualan`, `kode_wo`) VALUES
(6, 'FK000002', 'WO0001');

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
('PB000001', '2019-08-27 14:06:15', '1');

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
(8, 'NFP000001', 'PB000001');

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
('SV01', 'Ganti ban', 90000);

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
('S001', 'Wings', 'Jember', 'wing@gmail.com', '0897985875');

-- --------------------------------------------------------

--
-- Struktur dari tabel `work_order`
--

CREATE TABLE `work_order` (
  `kode_wo` char(10) NOT NULL,
  `kode_customer` char(5) NOT NULL,
  `no_plat` char(10) NOT NULL,
  `kode_mekanik` char(5) NOT NULL,
  `tgl_wo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_wo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `work_order`
--

INSERT INTO `work_order` (`kode_wo`, `kode_customer`, `no_plat`, `kode_mekanik`, `tgl_wo`, `status_wo`) VALUES
('WO0001', 'K0001', 'P 8728 UX', 'MK001', '2019-08-27 14:24:09', '1');

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
-- Indeks untuk tabel `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  ADD PRIMARY KEY (`kode_detail_pb`);

--
-- Indeks untuk tabel `detail_penjualan_service`
--
ALTER TABLE `detail_penjualan_service`
  ADD PRIMARY KEY (`kode_detail_ps`);

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
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_plat`);

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
-- Indeks untuk tabel `penjualan_wo`
--
ALTER TABLE `penjualan_wo`
  ADD PRIMARY KEY (`id_detail_service`);

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
  MODIFY `kode_detail_penggajian` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_penggajian_m`
--
ALTER TABLE `detail_penggajian_m`
  MODIFY `kode_detail_pm` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan_barang`
--
ALTER TABLE `detail_penjualan_barang`
  MODIFY `kode_detail_pb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan_service`
--
ALTER TABLE `detail_penjualan_service`
  MODIFY `kode_detail_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  MODIFY `kode_detail_permintaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `penjualan_wo`
--
ALTER TABLE `penjualan_wo`
  MODIFY `id_detail_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `kode_po` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
