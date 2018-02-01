-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2017 at 04:43 AM
-- Server version: 5.5.55-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k6273075_tokosandal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `USER_NAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `USER_NAME`, `PASSWORD`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `NAMA_CUSTOMER` varchar(400) NOT NULL,
  `USERNAME` varchar(400) NOT NULL,
  `PASSOWORD` varchar(400) NOT NULL,
  `EMAIL` varchar(400) NOT NULL,
  `ALAMAT` text NOT NULL,
  `FLAG_DEL` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `NAMA_CUSTOMER`, `USERNAME`, `PASSOWORD`, `EMAIL`, `ALAMAT`, `FLAG_DEL`) VALUES
(1, 'nama', 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'alamat', 0),
(2, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 0),
(3, 'b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'bb', 'b', 0),
(4, 'nama update', 'username update', 'd41d8cd98f00b204e9800998ecf8427e', 'email update', 'alamat update', 0),
(5, 'nama update2', 'username update2', 'd41d8cd98f00b204e9800998ecf8427e', 'email update2', 'alamat update2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ID` int(11) NOT NULL,
  `NAMA_PRODUK` varchar(50) NOT NULL,
  `TYPE_PRODUK` varchar(50) NOT NULL,
  `KETERANGAN` text,
  `GAMBAR1` text,
  `GAMBAR2` text,
  `GAMBAR3` text,
  `FLAG_DEL` int(11) DEFAULT '0',
  `HARGA` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ID`, `NAMA_PRODUK`, `TYPE_PRODUK`, `KETERANGAN`, `GAMBAR1`, `GAMBAR2`, `GAMBAR3`, `FLAG_DEL`, `HARGA`) VALUES
(1, 'SANDAL SATU', '1', 'KETERANGAN SANDAL SATU', 'gambar1_2017_07_02_22_25_42_arafuru-red-1.jpg', 'gambar2_2017_07_02_22_25_42_arafuru-red-5.jpg', 'gambar3_2017_07_02_22_25_42_arafuru-red-6.jpg', 0, 30000),
(2, 'SANDAL DUA', '2', 'KETERANGAN SANDAL DUA', 'gambar1_2017_07_02_22_22_19_arafuru-green-1.jpg', 'gambar2_2017_07_02_22_22_19_arafuru-green-5.jpg', 'gambar3_2017_07_02_22_22_19_arafuru-green-6.jpg', 0, 400000),
(3, 'KARIMATA', '1', 'asd', 'gambar1_2017_07_05_22_02_34_arafuru-grey-1.jpg', 'gambar2_2017_07_05_22_02_34_arafuru-grey-2.jpg', 'gambar3_2017_07_05_22_02_34_arafuru-grey-6.jpg', 0, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `produk_detail`
--

CREATE TABLE `produk_detail` (
  `ID` int(11) NOT NULL,
  `PRODUK_ID` int(11) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `UKURAN` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_detail`
--

INSERT INTO `produk_detail` (`ID`, `PRODUK_ID`, `STOK`, `UKURAN`) VALUES
(1, 1, 7, 32),
(2, 1, 2, 34),
(3, 1, 44, 56),
(4, 1, 0, 55);

-- --------------------------------------------------------

--
-- Table structure for table `produk_type`
--

CREATE TABLE `produk_type` (
  `ID` int(11) NOT NULL,
  `NAMA_TYPE` varchar(400) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_type`
--

INSERT INTO `produk_type` (`ID`, `NAMA_TYPE`) VALUES
(1, 'DEFAULT'),
(2, 'CUSTOM');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_produk_stok`
-- (See below for the actual view)
--
CREATE TABLE `v_produk_stok` (
`PRODUK_ID` int(11)
,`NAMA_PRODUK` varchar(50)
,`TYPE_PRODUK` varchar(50)
,`KETERANGAN` text
,`GAMBAR1` text
,`GAMBAR2` text
,`GAMBAR3` text
,`FLAG_DEL` int(11)
,`HARGA` int(11)
,`PRODUK_DETAIL_ID` int(11)
,`UKURAN` int(11)
,`STOK` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_produk_stok`
--
DROP TABLE IF EXISTS `v_produk_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`k6273075`@`localhost` SQL SECURITY DEFINER VIEW `v_produk_stok`  AS  select `P`.`ID` AS `PRODUK_ID`,`P`.`NAMA_PRODUK` AS `NAMA_PRODUK`,`P`.`TYPE_PRODUK` AS `TYPE_PRODUK`,`P`.`KETERANGAN` AS `KETERANGAN`,`P`.`GAMBAR1` AS `GAMBAR1`,`P`.`GAMBAR2` AS `GAMBAR2`,`P`.`GAMBAR3` AS `GAMBAR3`,`P`.`FLAG_DEL` AS `FLAG_DEL`,`P`.`HARGA` AS `HARGA`,`PD`.`ID` AS `PRODUK_DETAIL_ID`,`PD`.`UKURAN` AS `UKURAN`,`PD`.`STOK` AS `STOK` from (`produk` `P` join `produk_detail` `PD`) where (`P`.`ID` = `PD`.`PRODUK_ID`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `FLAG_DEL` (`FLAG_DEL`);

--
-- Indexes for table `produk_detail`
--
ALTER TABLE `produk_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `produk_type`
--
ALTER TABLE `produk_type`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk_detail`
--
ALTER TABLE `produk_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk_type`
--
ALTER TABLE `produk_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
