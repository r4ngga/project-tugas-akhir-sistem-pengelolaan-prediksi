-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2021 pada 04.36
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oncomputer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(100) NOT NULL,
  `id_kategori` varchar(100) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `harga_beli` int(50) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `spesifikasi` text NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga_beli`, `harga_jual`, `spesifikasi`, `stok`) VALUES
('B001', 'KAT0002', 'RAM V Gen', 400000, 450000, '4Gb', 6),
('B002', 'KAT0002', 'Flashdisk Toshiba 64Gb', 90000, 95000, '64GB', 1),
('B003', 'KAT0003', 'Canon 930 Inkjet', 1000000, 1200000, 'Ukuran kertas A4', 3),
('B004', 'KAT0002', 'Mouse Logitech G203', 65000, 85000, 'Non Wireless', 4),
('B005', 'KAT0002', 'Nvidia Geforce GT 730', 850000, 950000, 'Processor Core 2 duo/Amd A8, RAM 2GB, 500HD', 3),
('B006', 'KAT0003', 'Epson 650 Pixma', 650000, 750000, 'Resolution 4500 x 1100 dpi, Ukuran kertas A4, A5', 0),
('B007', 'KAT0002', 'Robot Speaker RS170 Black', 85000, 90000, 'Non Wireless', 2),
('B008', 'KAT0002', 'VGA Nvidia Rtx', 750000, 900000, 'RAM DDR3', 0),
('B009', 'KAT0003', 'Canon E410', 850000, 900000, 'Resolusi 1780x1250', 2),
('B010', 'KAT0002', 'Keyboard Logitech K120', 100000, 110000, 'Non Wireless', 5),
('B011', 'KAT0002', 'Nvidia GTX 1080', 876000, 914000, 'RAM 4GB, 500HD', 4),
('B012', 'KAT0002', 'Robot USB Mini Fan RT-BF07 White', 70000, 75000, 'Non Wireless', 9),
('B013', 'KAT0002', 'Orico Hard Drive Enclosure 2.5', 80000, 85000, 'Non Wireless, Fragile', 5),
('B014', 'KAT0007', 'Kabel HDMI Jaring 3M Plastik', 25000, 27500, 'HDMI', 4),
('B015', 'KAT0007', 'Kabel VGA STD 1.5MM', 15000, 19000, 'VGA, LCD', 4),
('B016', 'KAT0007', 'Cooling Pad N19', 65000, 70000, 'Non Wireless, External', 1),
('B017', 'KAT0007', 'Joystick Single Itech Black', 50000, 60000, 'Non Wireless', 8),
('B018', 'KAT0007', 'Joystick Double Itech Black', 80000, 85000, 'Non Wireless', 3),
('B019', 'KAT0002', 'Hard disk SATA 500GB', 150000, 200000, '500GB', 4),
('B020', 'KAT0002', 'Hard disk SATA 1TB', 350000, 450000, '1TB', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brg_keluar`
--

CREATE TABLE `tb_brg_keluar` (
  `no_nota` varchar(50) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_pembeli` varchar(100) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `hasil_totalhrgjual` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_brg_keluar`
--

INSERT INTO `tb_brg_keluar` (`no_nota`, `id_user`, `id_pembeli`, `tgl_keluar`, `hasil_totalhrgjual`) VALUES
('NT-001', 'USR0003', 'anonim', '2020-06-13', '545000.00'),
('NT-0010', 'USR0003', 'anonim', '2020-08-06', '535000.00'),
('NT-0011', 'USR0003', 'anonim', '2020-08-10', '615000.00'),
('NT-0012', 'USR0003', 'anonim', '2020-08-13', '900000.00'),
('NT-0013', 'USR0003', 'anonim', '2020-08-14', '1285000.00'),
('NT-0014', 'USR0004', 'anonim', '2020-08-18', '950000.00'),
('NT-0015', 'USR0004', 'anonim', '2020-08-19', '70000.00'),
('NT-0016', 'USR0004', 'anonim', '2020-08-22', '477500.00'),
('NT-0017', 'USR0004', 'anonim', '2020-08-25', '114000.00'),
('NT-0018', 'USR0004', 'anonim', '2020-08-26', '137500.00'),
('NT-0019', 'USR0004', 'anonim', '2020-08-28', '155000.00'),
('NT-002', 'USR0003', 'anonim', '2020-06-27', '450000.00'),
('NT-0020', 'USR0004', 'anonim', '2020-08-29', '545000.00'),
('NT-0021', 'USR0004', 'anonim', '2020-09-01', '97500.00'),
('NT-0022', 'USR0003', 'anonim', '2020-09-03', '450000.00'),
('NT-0023', 'USR0003', 'anonim', '2020-09-05', '90000.00'),
('NT-0024', 'USR0004', 'anonim', '2020-09-07', '914000.00'),
('NT-0025', 'USR0004', 'anonim', '2020-09-10', '580000.00'),
('NT-0026', 'USR0003', 'anonim', '2020-09-11', '95000.00'),
('NT-0027', 'USR0003', 'anonim', '2020-09-16', '19000.00'),
('NT-0028', 'USR0003', 'anonim', '2020-09-18', '180000.00'),
('NT-0029', 'USR0003', 'anonim', '2020-09-21', '70000.00'),
('NT-003', 'USR0004', 'anonim', '2020-06-30', '560000.00'),
('NT-0030', 'USR0003', 'anonim', '2020-09-21', '85000.00'),
('NT-0031', 'USR0003', 'anonim', '2020-09-24', '450000.00'),
('NT-0032', 'USR0003', 'anonim', '2020-09-26', '19000.00'),
('NT-0033', 'USR0004', 'anonim', '2020-09-28', '200000.00'),
('NT-0034', 'USR0004', 'anonim', '2020-09-29', '95000.00'),
('NT-0035', 'USR0004', 'anonim', '2020-09-30', '155000.00'),
('NT-0036', 'USR0004', 'anonim', '2020-09-30', '200000.00'),
('NT-0037', 'USR0004', 'anonim', '2020-10-01', '160000.00'),
('NT-0038', 'USR0003', 'anonim', '2020-10-01', '1200000.00'),
('NT-0039', 'USR0003', 'anonim', '2020-10-02', '195000.00'),
('NT-004', 'USR0004', 'anonim', '2020-07-02', '635000.00'),
('NT-0040', 'USR0003', 'anonim', '2020-10-03', '950000.00'),
('NT-0041', 'USR0003', 'anonim', '2020-10-05', '450000.00'),
('NT-0042', 'USR0003', 'anonim', '2020-10-05', '95000.00'),
('NT-0043', 'USR0003', 'anonim', '2020-10-06', '19000.00'),
('NT-0044', 'USR0003', 'anonim', '2020-10-06', '85000.00'),
('NT-0045', 'USR0003', 'anonim', '2020-10-06', '200000.00'),
('NT-0046', 'USR0003', 'anonim', '2020-10-08', '450000.00'),
('NT-0047', 'USR0003', 'anonim', '2020-10-09', '75000.00'),
('NT-0048', 'USR0003', 'anonim', '2020-10-09', '85000.00'),
('NT-0049', 'USR0003', 'anonim', '2020-10-12', '155000.00'),
('NT-005', 'USR0004', 'anonim', '2020-07-08', '1850000.00'),
('NT-0050', 'USR0003', 'anonim', '2020-10-13', '450000.00'),
('NT-0051', 'USR0003', 'anonim', '2020-10-13', '19000.00'),
('NT-0052', 'USR0003', 'anonim', '2020-10-15', '85000.00'),
('NT-0053', 'USR0003', 'anonim', '2020-10-16', '95000.00'),
('NT-0054', 'USR0003', 'anonim', '2020-10-16', '19000.00'),
('NT-0055', 'USR0003', 'anonim', '2020-10-19', '90000.00'),
('NT-0056', 'USR0003', 'anonim', '2020-10-20', '122500.00'),
('NT-0057', 'USR0003', 'anonim', '2020-10-22', '110000.00'),
('NT-0058', 'USR0003', 'anonim', '2020-10-22', '130000.00'),
('NT-0059', 'USR0004', 'anonim', '2020-10-23', '85000.00'),
('NT-006', 'USR0004', 'anonim', '2020-07-23', '1800000.00'),
('NT-0060', 'USR0004', 'anonim', '2020-10-26', '145000.00'),
('NT-0061', 'USR0004', 'anonim', '2020-10-26', '450000.00'),
('NT-0062', 'USR0004', 'anonim', '2020-10-29', '85000.00'),
('NT-0063', 'USR0004', 'anonim', '2020-10-29', '90000.00'),
('NT-0064', 'USR0004', 'anonim', '2020-10-30', '535000.00'),
('NT-0065', 'USR0004', 'anonim', '2020-11-02', '450000.00'),
('NT-0066', 'USR0003', 'anonim', '2020-11-03', '60000.00'),
('NT-0067', 'USR0003', 'anonim', '2020-11-05', '90000.00'),
('NT-0068', 'USR0003', 'anonim', '2020-11-05', '450000.00'),
('NT-0069', 'USR0003', 'anonim', '2020-11-06', '137500.00'),
('NT-007', 'USR0004', 'anonim', '2020-07-25', '95000.00'),
('NT-0070', 'USR0003', 'anonim', '2020-11-09', '135000.00'),
('NT-0071', 'USR0003', 'anonim', '2020-11-11', '95000.00'),
('NT-0072', 'USR0003', 'anonim', '2020-11-11', '155000.00'),
('NT-0073', 'USR0003', 'anonim', '2020-11-12', '112500.00'),
('NT-0074', 'USR0004', 'anonim', '2020-11-14', '110000.00'),
('NT-0075', 'USR0004', 'anonim', '2020-11-17', '400000.00'),
('NT-0076', 'USR0003', 'anonim', '2020-11-20', '110000.00'),
('NT-0077', 'USR0003', 'anonim', '2020-11-23', '310000.00'),
('NT-0078', 'USR0003', 'PBL0002', '2020-11-25', '195000.00'),
('NT-0079', 'USR0003', 'anonim', '2020-11-26', '75000.00'),
('NT-008', 'USR0004', 'anonim', '2020-07-31', '295000.00'),
('NT-0080', 'USR0004', 'anonim', '2020-10-31', '380000.00'),
('NT-0081', 'USR0004', 'anonim', '2020-11-30', '475000.00'),
('NT-0082', 'USR0004', 'anonim', '2020-12-30', '285000.00'),
('NT-0083', 'USR0004', 'anonim', '2021-01-27', '285000.00'),
('NT-0084', 'USR0004', 'anonim', '2021-02-09', '190000.00'),
('NT-0085', 'USR0003', 'anonim', '2020-12-31', '2250000.00'),
('NT-0086', 'USR0003', 'anonim', '2021-01-27', '2700000.00'),
('NT-0087', 'USR0003', 'anonim', '2021-02-14', '1350000.00'),
('NT-0088', 'USR0003', 'anonim', '2020-12-22', '255000.00'),
('NT-0089', 'USR0003', 'anonim', '2021-01-27', '510000.00'),
('NT-009', 'USR0003', 'anonim', '2020-08-04', '1814000.00'),
('NT-0090', 'USR0003', 'anonim', '2021-02-18', '340000.00'),
('NT-0091', 'USR0003', 'anonim', '2020-12-13', '660000.00'),
('NT-0092', 'USR0003', 'anonim', '2021-01-03', '440000.00'),
('NT-0093', 'USR0003', 'anonim', '2021-02-20', '110000.00'),
('NT-0094', 'USR0003', 'anonim', '2020-12-06', '340000.00'),
('NT-0095', 'USR0003', 'anonim', '2021-01-07', '595000.00'),
('NT-0096', 'USR0003', 'anonim', '2021-02-19', '255000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brg_msk`
--

CREATE TABLE `tb_brg_msk` (
  `no_faktur` varchar(50) NOT NULL,
  `id_supplier` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `hasil_totalhrgbeli` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_brg_msk`
--

INSERT INTO `tb_brg_msk` (`no_faktur`, `id_supplier`, `id_user`, `tgl_masuk`, `hasil_totalhrgbeli`) VALUES
('NP-038', 'SPP0001', 'USR0002', '2020-07-23', '876000.00'),
('NP-039', 'SPP0002', 'USR0002', '2020-07-23', '12000000.00'),
('NP-040', 'SPP0001', 'USR0002', '2020-08-24', '3000000.00'),
('NP-041', 'SPP0002', 'USR0002', '2020-08-25', '6132000.00'),
('NP-042', 'SPP0002', 'USR0002', '2020-08-27', '1700000.00'),
('NP-043', 'SPP0001', 'USR0001', '2020-08-29', '65000.00'),
('NP-044', 'SPP0001', 'USR0002', '2020-08-13', '1752000.00'),
('NP-045', 'SPP0003', 'USR0001', '2020-08-26', '465000.00'),
('NP-046', 'SPP0003', 'USR0001', '2020-08-27', '750000.00'),
('NP-047', 'SPP0002', 'USR0001', '2020-09-16', '2000000.00'),
('NP-048', 'SPP0005', 'USR0001', '2020-09-18', '800000.00'),
('NT-049', 'SPP0002', 'USR0001', '2020-10-01', '120000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_brgkeluar`
--

CREATE TABLE `tb_detail_brgkeluar` (
  `no_urut_keluar` int(50) NOT NULL,
  `no_nota` varchar(50) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah_brgkeluar` int(10) NOT NULL,
  `total_harga_jual` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_brgkeluar`
--

INSERT INTO `tb_detail_brgkeluar` (`no_urut_keluar`, `no_nota`, `id_barang`, `harga_jual`, `harga_beli`, `jumlah_brgkeluar`, `total_harga_jual`) VALUES
(1, 'NT-001', 'B001', 450000, 400000, 1, '450000.00'),
(2, 'NT-001', 'B002', 95000, 90000, 0, '95000.00'),
(3, 'NT-002', 'B001', 450000, 400000, 1, '450000.00'),
(4, 'NT-003', 'B001', 450000, 400000, 1, '450000.00'),
(5, 'NT-003', 'B010', 110000, 100000, 1, '110000.00'),
(6, 'NT-004', 'B001', 450000, 400000, 1, '450000.00'),
(7, 'NT-004', 'B002', 95000, 90000, 0, '95000.00'),
(8, 'NT-004', 'B007', 90000, 85000, 1, '90000.00'),
(9, 'NT-005', 'B001', 450000, 400000, 2, '900000.00'),
(10, 'NT-005', 'B005', 950000, 850000, 1, '950000.00'),
(11, 'NT-006', 'B001', 450000, 400000, 2, '900000.00'),
(12, 'NT-006', 'B008', 900000, 750000, 1, '900000.00'),
(13, 'NT-007', 'B002', 95000, 90000, 0, '95000.00'),
(14, 'NT-008', 'B002', 95000, 90000, 0, '95000.00'),
(15, 'NT-008', 'B007', 90000, 85000, 1, '90000.00'),
(16, 'NT-008', 'B010', 110000, 100000, 1, '110000.00'),
(17, 'NT-009', 'B001', 450000, 400000, 2, '900000.00'),
(18, 'NT-009', 'B011', 914000, 876000, 1, '914000.00'),
(19, 'NT-0010', 'B001', 450000, 400000, 1, '450000.00'),
(20, 'NT-0010', 'B013', 85000, 80000, 1, '85000.00'),
(21, 'NT-0011', 'B001', 450000, 400000, 1, '450000.00'),
(22, 'NT-0011', 'B007', 90000, 85000, 1, '90000.00'),
(23, 'NT-0011', 'B012', 75000, 70000, 1, '75000.00'),
(24, 'NT-0012', 'B008', 900000, 750000, 1, '900000.00'),
(25, 'NT-0013', 'B003', 1200000, 1000000, 1, '1200000.00'),
(26, 'NT-0013', 'B013', 85000, 80000, 1, '85000.00'),
(27, 'NT-0014', 'B005', 950000, 850000, 1, '950000.00'),
(28, 'NT-0015', 'B016', 70000, 65000, 1, '70000.00'),
(29, 'NT-0016', 'B001', 450000, 400000, 1, '450000.00'),
(30, 'NT-0016', 'B014', 27500, 25000, 1, '27500.00'),
(31, 'NT-0016', 'B002', 95000, 90000, 0, '95000.00'),
(32, 'NT-0016', 'B015', 19000, 15000, 1, '19000.00'),
(33, 'NT-0018', 'B010', 110000, 100000, 1, '110000.00'),
(34, 'NT-0018', 'B014', 27500, 25000, 1, '27500.00'),
(35, 'NT-0019', 'B004', 85000, 65000, 1, '85000.00'),
(36, 'NT-0019', 'B016', 70000, 65000, 1, '70000.00'),
(37, 'NT-0020', 'B001', 450000, 400000, 1, '450000.00'),
(38, 'NT-0020', 'B002', 95000, 90000, 0, '95000.00'),
(39, 'NT-0021', 'B014', 27500, 25000, 1, '27500.00'),
(40, 'NT-0021', 'B016', 70000, 65000, 1, '70000.00'),
(41, 'NT-0022', 'B001', 450000, 400000, 1, '450000.00'),
(42, 'NT-0023', 'B007', 90000, 85000, 1, '90000.00'),
(43, 'NT-0024', 'B011', 914000, 876000, 1, '914000.00'),
(44, 'NT-0025', 'B001', 450000, 400000, 1, '450000.00'),
(45, 'NT-0025', 'B016', 70000, 65000, 1, '70000.00'),
(46, 'NT-0025', 'B017', 60000, 50000, 1, '60000.00'),
(47, 'NT-0026', 'B002', 95000, 90000, 0, '95000.00'),
(48, 'NT-0027', 'B015', 19000, 15000, 1, '19000.00'),
(49, 'NT-0028', 'B010', 110000, 100000, 1, '110000.00'),
(50, 'NT-0028', 'B016', 70000, 65000, 1, '70000.00'),
(51, 'NT-0029', 'B016', 70000, 65000, 1, '70000.00'),
(52, 'NT-0030', 'B018', 85000, 80000, 1, '85000.00'),
(53, 'NT-0031', 'B001', 450000, 400000, 1, '450000.00'),
(54, 'NT-0032', 'B015', 19000, 15000, 1, '19000.00'),
(55, 'NT-0033', 'B019', 200000, 150000, 1, '200000.00'),
(56, 'NT-0034', 'B002', 95000, 90000, 0, '95000.00'),
(57, 'NT-0035', 'B016', 70000, 65000, 1, '70000.00'),
(58, 'NT-0035', 'B018', 85000, 80000, 1, '85000.00'),
(59, 'NT-0036', 'B019', 200000, 150000, 1, '200000.00'),
(60, 'NT-0037', 'B012', 75000, 70000, 1, '75000.00'),
(61, 'NT-0037', 'B018', 85000, 80000, 1, '85000.00'),
(62, 'NT-0038', 'B003', 1200000, 1000000, 1, '1200000.00'),
(63, 'NT-0039', 'B004', 85000, 65000, 1, '85000.00'),
(64, 'NT-0039', 'B010', 110000, 100000, 1, '110000.00'),
(65, 'NT-0040', 'B005', 950000, 850000, 1, '950000.00'),
(66, 'NT-0041', 'B001', 450000, 400000, 1, '450000.00'),
(67, 'NT-0042', 'B002', 95000, 90000, 0, '95000.00'),
(68, 'NT-0043', 'B015', 19000, 15000, 1, '19000.00'),
(69, 'NT-0044', 'B018', 85000, 80000, 1, '85000.00'),
(70, 'NT-0045', 'B019', 200000, 150000, 1, '200000.00'),
(71, 'NT-0046', 'B020', 450000, 350000, 1, '450000.00'),
(72, 'NT-0047', 'B012', 75000, 70000, 1, '75000.00'),
(73, 'NT-0048', 'B004', 85000, 65000, 1, '85000.00'),
(74, 'NT-0049', 'B016', 70000, 65000, 1, '70000.00'),
(75, 'NT-0049', 'B018', 85000, 80000, 1, '85000.00'),
(76, 'NT-0050', 'B020', 450000, 350000, 1, '450000.00'),
(77, 'NT-0051', 'B015', 19000, 15000, 1, '19000.00'),
(78, 'NT-0052', 'B013', 85000, 80000, 1, '85000.00'),
(79, 'NT-0053', 'B002', 95000, 90000, 0, '95000.00'),
(80, 'NT-0054', 'B015', 19000, 15000, 1, '19000.00'),
(81, 'NT-0055', 'B007', 90000, 85000, 1, '90000.00'),
(82, 'NT-0056', 'B002', 95000, 90000, 0, '95000.00'),
(83, 'NT-0056', 'B014', 27500, 25000, 1, '27500.00'),
(84, 'NT-0057', 'B010', 110000, 100000, 1, '110000.00'),
(85, 'NT-0058', 'B016', 70000, 65000, 1, '70000.00'),
(86, 'NT-0058', 'B017', 60000, 50000, 1, '60000.00'),
(87, 'NT-0058', 'B018', 85000, 80000, 1, '85000.00'),
(88, 'NT-0060', 'B004', 85000, 65000, 1, '85000.00'),
(89, 'NT-0060', 'B017', 60000, 50000, 1, '60000.00'),
(90, 'NT-0061', 'B020', 450000, 350000, 1, '450000.00'),
(91, 'NT-0062', 'B013', 85000, 80000, 1, '85000.00'),
(92, 'NT-0063', 'B007', 90000, 85000, 1, '90000.00'),
(93, 'NT-0064', 'B018', 85000, 80000, 1, '85000.00'),
(94, 'NT-0064', 'B020', 450000, 350000, 1, '450000.00'),
(95, 'NT-0065', 'B001', 450000, 400000, 1, '450000.00'),
(96, 'NT-0066', 'B017', 60000, 50000, 1, '60000.00'),
(97, 'NT-0067', 'B007', 90000, 85000, 1, '90000.00'),
(98, 'NT-0068', 'B020', 450000, 350000, 1, '450000.00'),
(99, 'NT-0069', 'B010', 110000, 100000, 1, '110000.00'),
(100, 'NT-0069', 'B014', 27500, 25000, 1, '27500.00'),
(101, 'NT-0070', 'B012', 75000, 70000, 1, '75000.00'),
(102, 'NT-0070', 'B017', 60000, 50000, 1, '60000.00'),
(103, 'NT-0071', 'B002', 95000, 90000, 0, '95000.00'),
(104, 'NT-0072', 'B016', 70000, 65000, 1, '70000.00'),
(105, 'NT-0072', 'B018', 85000, 80000, 1, '85000.00'),
(106, 'NT-0073', 'B013', 85000, 80000, 1, '85000.00'),
(107, 'NT-0073', 'B014', 27500, 25000, 1, '27500.00'),
(108, 'NT-0074', 'B010', 110000, 100000, 1, '110000.00'),
(109, 'NT-0075', 'B019', 200000, 150000, 2, '400000.00'),
(111, 'NT-0076', 'B010', 110000, 100000, 1, '110000.00'),
(112, 'NT-0077', 'B010', 110000, 100000, 0, '110000.00'),
(113, 'NT-0077', 'B019', 200000, 150000, 1, '200000.00'),
(116, 'NT-0078', 'B004', 85000, 65000, 1, '85000.00'),
(117, 'NT-0078', 'B010', 110000, 100000, 1, '110000.00'),
(118, 'NT-0079', 'B012', 75000, 70000, 0, '75000.00'),
(119, 'NT-0080', 'B002', 95000, 90000, 4, '380000.00'),
(120, 'NT-0081', 'B002', 95000, 90000, 5, '475000.00'),
(121, 'NT-0082', 'B002', 95000, 90000, 3, '285000.00'),
(122, 'NT-0083', 'B002', 95000, 90000, 3, '285000.00'),
(123, 'NT-0084', 'B002', 95000, 90000, 2, '190000.00'),
(124, 'NT-0085', 'B001', 450000, 400000, 5, '2250000.00'),
(125, 'NT-0086', 'B001', 450000, 400000, 6, '2700000.00'),
(126, 'NT-0087', 'B001', 450000, 400000, 3, '1350000.00'),
(127, 'NT-0088', 'B004', 85000, 65000, 3, '255000.00'),
(128, 'NT-0089', 'B004', 85000, 65000, 6, '510000.00'),
(129, 'NT-0090', 'B004', 85000, 65000, 4, '340000.00'),
(130, 'NT-0091', 'B010', 110000, 100000, 6, '660000.00'),
(131, 'NT-0092', 'B010', 110000, 100000, 4, '440000.00'),
(132, 'NT-0093', 'B010', 110000, 100000, 1, '110000.00'),
(133, 'NT-0094', 'B018', 85000, 80000, 4, '340000.00'),
(134, 'NT-0095', 'B018', 85000, 80000, 7, '595000.00'),
(135, 'NT-0096', 'B018', 85000, 80000, 3, '255000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_brgmsk`
--

CREATE TABLE `tb_detail_brgmsk` (
  `no_urut_masuk` int(50) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `no_faktur` varchar(50) NOT NULL,
  `harga_beli` int(50) NOT NULL,
  `jumlah_brgmsk` int(10) NOT NULL,
  `total_harga_beli` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_brgmsk`
--

INSERT INTO `tb_detail_brgmsk` (`no_urut_masuk`, `id_barang`, `no_faktur`, `harga_beli`, `jumlah_brgmsk`, `total_harga_beli`) VALUES
(141, 'B011', 'NP-038', 876000, 1, '876000.00'),
(142, 'B008', 'NP-039', 750000, 2, '1500000.00'),
(143, 'B009', 'NP-039', 3500000, 3, '10500000.00'),
(144, 'B008', 'NP-040', 750000, 4, '3000000.00'),
(145, 'B011', 'NP-041', 876000, 2, '1752000.00'),
(146, 'B005', 'NP-042', 850000, 2, '1700000.00'),
(147, 'B004', 'NP-043', 65000, 1, '65000.00'),
(148, 'B011', 'NP-044', 876000, 2, '1752000.00'),
(149, 'B001', 'NP-045', 400000, 1, '400000.00'),
(150, 'B004', 'NP-045', 65000, 1, '65000.00'),
(151, 'B008', 'NP-046', 750000, 1, '750000.00'),
(152, 'B001', 'NP-047', 400000, 5, '2000000.00'),
(153, 'B001', 'NP-048', 400000, 2, '800000.00'),
(158, 'B012', 'NT-049', 70000, 1, '70000.00'),
(159, 'B017', 'NT-049', 50000, 1, '50000.00');

--
-- Trigger `tb_detail_brgmsk`
--
DELIMITER $$
CREATE TRIGGER `tambah_stokbarang` AFTER INSERT ON `tb_detail_brgmsk` FOR EACH ROW BEGIN
UPDATE tb_barang SET stok = stok + NEW.jumlah_brgmsk
WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_retur`
--

CREATE TABLE `tb_detail_retur` (
  `no_urut_kembali` int(50) NOT NULL,
  `kd_retur` varchar(50) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `jumlah_brgkembali` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_retur`
--

INSERT INTO `tb_detail_retur` (`no_urut_kembali`, `kd_retur`, `id_barang`, `harga_jual`, `jumlah_brgkembali`) VALUES
(20, 'RTR-0016', 'B002', 650000, 1),
(21, 'RTR-0016', 'B010', 500000, 1),
(22, 'RTR-0017', 'B006', 750000, 1),
(23, 'RTR-0017', 'B008', 900000, 1),
(24, 'RTR-0018', 'B002', 650000, 1),
(25, 'RTR-0019', 'B010', 110000, 1),
(27, 'RTR-020', 'B012', 75000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KAT0001', 'Software'),
('KAT0002', 'Hardware'),
('KAT0003', 'Printer'),
('KAT0004', 'Kamera'),
('KAT0005', 'Handphone'),
('KAT0006', 'Laptop'),
('KAT0007', 'Aksesoris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id_pembeli` varchar(100) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(225) NOT NULL,
  `notlp_pembeli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id_pembeli`, `nama_pembeli`, `alamat_pembeli`, `notlp_pembeli`) VALUES
('anonim', 'anonim', 'anonim', 'anonim'),
('PBL0001', 'Ridwan Adji K', 'Jl Wonosari KM 5 samping warung pecel lele', '082719397202'),
('PBL0002', 'Adil Rami', 'Jl Palagan Km 4 samping Hyarta', '082763954711');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_user` varchar(100) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `pasword` varchar(225) NOT NULL,
  `jenis_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_user`, `nama_pengguna`, `username`, `email`, `pasword`, `jenis_akses`) VALUES
('USR0001', 'rangga wisnu aji', 'r4ngga_wisnu', 'r4wis@gmail.com', '$2y$10$u35pWdoC.t7FCj9VW92c6uWb1exPuPQwGNx6ok/F3R8KL1YAfB7Si', 'admin'),
('USR0002', 'Joshua W', 'joshua4', 'joshua44@gmail.com', '$2y$10$fJrNFRfN4Nhl5N1tJVnKPuKFMdPvQReVs7Dl0C4zyZp2JKHDa7oe6', 'admin'),
('USR0003', 'wisnu mahardika', 'w1znu', 'w1snumhrdk@ymail.com', '$2y$10$9Htapw9LGLQGxlRoMqxJ6Ob24FMXja9w.n1N3g.NjK/qhA3U9XDsy', 'pengguna'),
('USR0004', 'Anang YRB', 'r0manB', 'anangr0manbl4@gmail.com', '$2y$10$9MlJZQeejEyQ.F44jEYjTOPkQb7wtTlafebNaUxNgp/fWWoHs1F.6', 'pengguna'),
('USR0005', 'Dedy Ardiansah', 'd3dy', 'd3dyasd@gmail.com', '$2y$10$.Wu.8PDt80w/H4Q4UN61fu87QteATc4qJAyWsNQRyc0ZoEWHcqzwi', 'pengguna'),
('USR0007', 'Umi Yuliana Etika', 'etika41', 'etika41uy@gmail.com', '$2y$10$GrWjlehfNrkDTQpX/da36OHo.qVeGSKyHHfDPNQ704l7Y1aBngnGG', 'pemilik'),
('USR0008', 'Falahuddin SR', 'f4lah', 'f4lahud@gmail.com', '$2y$10$raHev6SZTXUwJYmae6vXb.huYnBet3EF53huR3bMkp1l5mZQXd7oe', 'admin'),
('USR0009', 'Imelda Ayu', '1meld', '1melda@gmail.com', '$2y$10$5ZXH5JyyEA6w549jLFJYtuTv9j.qXI0aquu.vYOveuC01YLZ9rrs.', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prediksi`
--

CREATE TABLE `tb_prediksi` (
  `kd_prediksi` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `hasil_prediksi` varchar(100) NOT NULL,
  `bulan_prediksi` varchar(50) NOT NULL,
  `tahun_prediksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prediksi`
--

INSERT INTO `tb_prediksi` (`kd_prediksi`, `id_barang`, `hasil_prediksi`, `bulan_prediksi`, `tahun_prediksi`) VALUES
('PDR-9x1jPWJU', 'B018', '4.3', '03', '2021'),
('PDR-fcNZ6bwB', 'B004', '4.5', '03', '2021'),
('PDR-g0GXR8fW', 'B001', '4.1', '03', '2021'),
('PDR-lTFknaEI', 'B010', '2.4', '03', '2021'),
('PDR-MWZi7SQx', 'B002', '2.4', '03', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_retur`
--

CREATE TABLE `tb_retur` (
  `kd_retur` varchar(50) NOT NULL,
  `no_nota` varchar(50) NOT NULL,
  `id_pembeli` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `tgl_retur` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_retur`
--

INSERT INTO `tb_retur` (`kd_retur`, `no_nota`, `id_pembeli`, `id_user`, `tgl_retur`, `keterangan`) VALUES
('RTR-0016', 'NT-007', 'anonim', 'USR0003', '2020-09-16', 'rusak sebagian'),
('RTR-0017', 'NT-009', 'anonim', 'USR0003', '2020-09-05', 'ditelan kucing'),
('RTR-0018', 'NT-0011', 'anonim', 'USR0003', '2020-10-03', 'jelek banget'),
('RTR-0019', 'NT-0077', 'anonim', 'USR0003', '2020-11-05', 'terdapat tombol yang tidak berfungsi'),
('RTR-020', 'NT-0079', 'anonim', 'USR0003', '2020-11-28', 'fungsi nya tidak berjalan secara maksimal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` varchar(100) NOT NULL,
  `nama_supplier` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_tlp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_tlp`) VALUES
('SPP0001', 'Super Comp', 'Jl Bimasakti No 22, Yogyakarta', '088222000666'),
('SPP0002', 'Komputer 76', 'Jl. Cempaka 9-CC, Kentungan, Yogyakarta', '(0274) 885466'),
('SPP0003', 'Toko SumberMaju', 'Jl Magelang km 6', '087213039111'),
('SPP0004', 'PT Wook Global Technology', 'Jalan Boulevard Pantai Indah Kapuk No.1, RT.7/RW.2, Jakarta', '(021) 22511170'),
('SPP0005', 'Disass Computer', 'Jl. Sisingamangaraja No.81, Brontokusuman, Yogyakarta', '(0274) 382406');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_brg_keluar`
--
ALTER TABLE `tb_brg_keluar`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `tb_brg_msk`
--
ALTER TABLE `tb_brg_msk`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_detail_brgkeluar`
--
ALTER TABLE `tb_detail_brgkeluar`
  ADD PRIMARY KEY (`no_urut_keluar`),
  ADD KEY `no_nota` (`no_nota`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_detail_brgmsk`
--
ALTER TABLE `tb_detail_brgmsk`
  ADD PRIMARY KEY (`no_urut_masuk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indeks untuk tabel `tb_detail_retur`
--
ALTER TABLE `tb_detail_retur`
  ADD PRIMARY KEY (`no_urut_kembali`),
  ADD KEY `kd_retur` (`kd_retur`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_prediksi`
--
ALTER TABLE `tb_prediksi`
  ADD PRIMARY KEY (`kd_prediksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_retur`
--
ALTER TABLE `tb_retur`
  ADD PRIMARY KEY (`kd_retur`),
  ADD KEY `no_nota` (`no_nota`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detail_brgkeluar`
--
ALTER TABLE `tb_detail_brgkeluar`
  MODIFY `no_urut_keluar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_brgmsk`
--
ALTER TABLE `tb_detail_brgmsk`
  MODIFY `no_urut_masuk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_retur`
--
ALTER TABLE `tb_detail_retur`
  MODIFY `no_urut_kembali` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_brg_msk`
--
ALTER TABLE `tb_brg_msk`
  ADD CONSTRAINT `tb_brg_msk_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`),
  ADD CONSTRAINT `tb_brg_msk_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_pengguna` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_detail_brgmsk`
--
ALTER TABLE `tb_detail_brgmsk`
  ADD CONSTRAINT `tb_detail_brgmsk_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `tb_brg_msk` (`no_faktur`);

--
-- Ketidakleluasaan untuk tabel `tb_detail_retur`
--
ALTER TABLE `tb_detail_retur`
  ADD CONSTRAINT `tb_detail_retur_ibfk_1` FOREIGN KEY (`kd_retur`) REFERENCES `tb_retur` (`kd_retur`);

--
-- Ketidakleluasaan untuk tabel `tb_retur`
--
ALTER TABLE `tb_retur`
  ADD CONSTRAINT `tb_retur_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_pengguna` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
