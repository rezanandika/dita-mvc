-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 06:34 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `jenis`) VALUES
(0, 'SUPER ADMIN'),
(1, 'ADMIN'),
(2, 'PENGEMUDI');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `id_kota_asal` int(11) NOT NULL,
  `id_kota_tujuan` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `id_kota_asal`, `id_kota_tujuan`, `harga`) VALUES
(3, 1, 3, 80000),
(4, 2, 3, 80000),
(5, 1, 1, 0),
(6, 2, 2, 0),
(7, 3, 3, 0),
(8, 4, 4, 0),
(9, 5, 5, 0),
(10, 6, 6, 0),
(11, 3, 2, 90000),
(12, 3, 1, 90000),
(13, 1, 6, 90000),
(14, 2, 6, 90000),
(15, 6, 2, 100000),
(16, 6, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_berangkat`
--

CREATE TABLE `jadwal_berangkat` (
  `id_jadwal` int(11) NOT NULL,
  `kode_jadwal` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `id_pemesanan` char(8) NOT NULL,
  `id_pengemudi` int(11) NOT NULL,
  `id_kota_asal` int(11) NOT NULL,
  `id_kota_tujuan` int(11) NOT NULL,
  `jumlah_pemesanan` int(11) NOT NULL,
  `status` char(2) NOT NULL,
  `waktu_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_berangkat`
--

INSERT INTO `jadwal_berangkat` (`id_jadwal`, `kode_jadwal`, `tanggal_berangkat`, `id_pemesanan`, `id_pengemudi`, `id_kota_asal`, `id_kota_tujuan`, `jumlah_pemesanan`, `status`, `waktu_order`) VALUES
(7, 1, '2019-12-03', '19PSN000', 6, 1, 2, 2, '1', '0000-00-00 00:00:00'),
(8, 1, '2019-12-03', '19PSN001', 6, 1, 2, 1, '1', '0000-00-00 00:00:00'),
(12, 1, '2019-12-03', '19PSN002', 6, 1, 2, 1, '1', '0000-00-00 00:00:00'),
(14, 2, '2019-12-03', '19PSN003', 6, 1, 2, 2, '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kota_asal`
--

CREATE TABLE `kota_asal` (
  `id_kota_asal` int(11) NOT NULL,
  `nama_kota_asal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota_asal`
--

INSERT INTO `kota_asal` (`id_kota_asal`, `nama_kota_asal`) VALUES
(1, 'BANTARKAWUNG'),
(2, 'BUMIAYU'),
(3, 'CIREBON'),
(4, 'KUNINGAN'),
(5, 'MAJALENGKA'),
(6, 'INDRAMAYU');

-- --------------------------------------------------------

--
-- Table structure for table `kota_tujuan`
--

CREATE TABLE `kota_tujuan` (
  `id_kota_tujuan` int(11) NOT NULL,
  `nama_kota_tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota_tujuan`
--

INSERT INTO `kota_tujuan` (`id_kota_tujuan`, `nama_kota_tujuan`) VALUES
(1, 'BANTARKAWUNG'),
(2, 'BUMIAYU'),
(3, 'CIREBON'),
(4, 'KUNINGAN'),
(5, 'MAJALENGKA'),
(6, 'INDRAMAYU');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` char(8) NOT NULL,
  `kode_jadwal` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `telp_pemesan` varchar(14) NOT NULL,
  `jumlah_pemesanan` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `id_kota_asal` int(11) NOT NULL,
  `id_kota_tujuan` int(11) NOT NULL,
  `lokasi_penjemputan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_pengemudi` int(11) DEFAULT NULL,
  `status` char(2) NOT NULL,
  `waktu_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_jadwal`, `nama_pemesan`, `telp_pemesan`, `jumlah_pemesanan`, `tanggal_berangkat`, `id_kota_asal`, `id_kota_tujuan`, `lokasi_penjemputan`, `harga`, `total_harga`, `id_pengemudi`, `status`, `waktu_order`) VALUES
('19PSN000', 0, 'reza nandika m', '6282329672695', 2, '2019-12-03', 1, 2, 'jl dr angka no.1 , purwokerto selatan', 0, 0, 6, '1', '2019-12-03 09:50:27'),
('19PSN001', 0, 'ebet', '6289602630090', 1, '2019-12-03', 1, 2, 'disana', 0, 0, 6, '1', '2019-12-03 09:51:23'),
('19PSN002', 0, 'edwin', '6281227136069', 1, '2019-12-03', 1, 2, 'disini', 0, 0, 6, '1', '2019-12-03 09:52:05'),
('19PSN003', 0, 'dyah', '628122995119', 2, '2019-12-12', 1, 2, 'margono', 0, 0, 0, '5', '2019-12-03 09:52:34'),
('19PSN004', 0, 'rere', '6282329672695', 2, '2019-12-10', 1, 3, 'disini', 80000, 160000, 0, '5', '2019-12-09 11:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `id_status` int(11) NOT NULL,
  `status` char(2) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`id_status`, `status`, `keterangan`) VALUES
(1, 'P', 'PROSES'),
(2, 'D', 'DITOLAK'),
(3, 'S', 'SELESAI'),
(4, 'DI', 'DITERIMA'),
(5, 'M', 'MASUK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `hak_akses`, `status`) VALUES
(1, '', 'superadmin123', 'qwerty123', 0, 1),
(2, 'admin ganteng', 'admin1', 'admin1', 1, 1),
(3, 'driver ganteng', 'driver', 'driver', 2, 1),
(4, '', 'admin2', 'admin2', 1, 1),
(6, 'reza', 'driver1', 'driver1', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jadwal_berangkat`
--
ALTER TABLE `jadwal_berangkat`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kota_asal`
--
ALTER TABLE `kota_asal`
  ADD PRIMARY KEY (`id_kota_asal`);

--
-- Indexes for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  ADD PRIMARY KEY (`id_kota_tujuan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `jadwal_berangkat`
--
ALTER TABLE `jadwal_berangkat`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kota_asal`
--
ALTER TABLE `kota_asal`
  MODIFY `id_kota_asal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  MODIFY `id_kota_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
