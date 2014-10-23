-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2014 at 02:08 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=790 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga_beli`, `harga_jual`, `stok`) VALUES
(123, 'Buku', 1500, 2000, 10),
(258, 'Mouse', 50000, 55000, 10),
(456, 'Kertas A4', 5000, 5500, 12),
(789, 'Keyboard', 40000, 45000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_barang`, `qty`, `total_harga`, `tgl`, `setor`) VALUES
(14, 123, 2, 3000, '2014-10-20', 1),
(15, 456, 2, 10000, '2014-10-20', 1),
(16, 123, 2, 3000, '2014-10-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penyetor` varchar(50) NOT NULL,
  `tgl_jual` date NOT NULL,
  `tgl_setor` date NOT NULL,
  `total_jual` int(100) NOT NULL,
  `total_setor` int(100) NOT NULL,
  `selisih` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `setor`
--

INSERT INTO `setor` (`id`, `penyetor`, `tgl_jual`, `tgl_setor`, `total_jual`, `total_setor`, `selisih`) VALUES
(2, 'admin', '2014-10-20', '2014-10-23', 13000, 10000, -3000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
