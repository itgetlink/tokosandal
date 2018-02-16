-- Only run when this view is error -- Amin Mutohar

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

CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_produk_stok`  AS  select `P`.`ID` AS `PRODUK_ID`,`P`.`NAMA_PRODUK` AS `NAMA_PRODUK`,`P`.`TYPE_PRODUK` AS `TYPE_PRODUK`,`P`.`KETERANGAN` AS `KETERANGAN`,`P`.`GAMBAR1` AS `GAMBAR1`,`P`.`GAMBAR2` AS `GAMBAR2`,`P`.`GAMBAR3` AS `GAMBAR3`,`P`.`FLAG_DEL` AS `FLAG_DEL`,`P`.`HARGA` AS `HARGA`,`PD`.`ID` AS `PRODUK_DETAIL_ID`,`PD`.`UKURAN` AS `UKURAN`,`PD`.`STOK` AS `STOK` from (`produk` `P` join `produk_detail` `PD`) where (`P`.`ID` = `PD`.`PRODUK_ID`) ;
