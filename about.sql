-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Feb 2018 pada 10.20
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokosandal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `ID` int(11) NOT NULL,
  `DESKRIPSI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`ID`, `DESKRIPSI`) VALUES
(1, '					Fashion to me has become very disposable; I wanted to get back to craft, to clothes that could last. Confidence. If you have it, you can make anything look good. Elegance isn’t solely defined by what you wear. It’s how you carry yourself, how you speak, what you read. I don’t care about money. I really don’t care. I just want to do what I do. The great thing about fashion is that it always looks forward.\r\n\r\nBeauty is perfect in its imperfections, so you just have to go with the imperfections. I have my permanent muses and my muses of the moment. I get ideas about what’s essential when packing my suitcase. It is important to be chic. Men don’t want another man to look at their woman because they don’t know how to handle it.					');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
