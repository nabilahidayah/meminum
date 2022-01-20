-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2021 pada 08.27
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `nama`, `gender`, `phone`, `alamat`, `created`, `updated`) VALUES
(1, 'Joni', 'L', '08765432199', 'Banyumanik', '2021-05-12 15:10:13', NULL),
(2, 'Putri', 'P', '08765439089', 'Tembalang', '2021-06-27 12:34:43', '2021-06-27 14:34:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`category_id`, `nama`, `created`, `updated`) VALUES
(7, 'Minuman', '2021-05-22 14:49:42', '2021-06-27 08:09:37'),
(8, 'Bahan Minum', '2021-05-22 14:50:02', '2021-08-13 13:57:13'),
(21, 'Bahan Alat', '2021-08-13 18:57:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `nama`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(1, 'A001', 'Milo', 7, 9, 5000, 8, NULL, '2021-05-21 20:13:36', '2021-06-26 08:25:52'),
(3, 'A002', 'Teh Tarik', 7, 9, 8000, 20, NULL, '2021-05-22 23:15:47', '2021-08-14 10:54:15'),
(4, 'A003', 'Jeruk', 7, 9, 7000, 4, 'item-210524_689c68c1a6.jpg', '2021-05-24 18:38:18', '2021-06-26 08:26:14'),
(8, 'A004', 'Bubuk Milo', 8, 5, 13000, 4, NULL, '2021-08-13 19:56:48', '2021-08-14 10:54:37'),
(9, 'A005', 'Bahan Teh', 8, 13, 8000, 0, NULL, '2021-08-13 19:57:57', '2021-08-14 10:56:08'),
(10, 'A006', 'Jeruk Peras', 8, 5, 10000, 0, NULL, '2021-08-13 19:58:34', '2021-08-14 10:50:17'),
(11, 'A007', 'Gula', 8, 5, 10000, 0, NULL, '2021-08-14 15:59:05', NULL),
(12, 'A008', 'Air', 8, 11, 6000, 0, NULL, '2021-08-14 15:59:45', NULL),
(13, 'A009', 'Es', 8, 12, 7000, 0, NULL, '2021-08-14 16:03:05', '2021-08-14 11:04:02'),
(14, 'A010', 'Sedotan', 21, 13, 6000, 0, NULL, '2021-08-14 16:03:53', NULL),
(15, 'A011', 'Gelas Platsik', 21, 13, 7500, 0, NULL, '2021-08-14 16:06:38', '2021-08-14 11:11:29'),
(16, 'A012', 'Tutup Gelas', 21, 13, 2000, 0, NULL, '2021-08-14 16:08:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `nama`, `created`, `updated`) VALUES
(5, 'Kilogram', '2021-05-17 14:22:42', '2021-06-27 15:08:23'),
(6, 'Buah', '2021-05-17 14:22:49', NULL),
(8, 'liter', '2021-06-14 20:24:57', NULL),
(9, 'mililiter', '2021-06-26 13:25:14', '2021-07-03 10:16:54'),
(11, 'Galon', '2021-08-13 18:58:03', NULL),
(12, 'Bungkus', '2021-08-13 18:58:18', NULL),
(13, 'Pack', '2021-08-13 18:58:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `nama`, `phone`, `alamat`, `deskripsi`, `created`, `updated`) VALUES
(1, 'Toko A', '082223344556', 'Banyumanik', NULL, '2021-05-10 13:42:07', '2021-07-30 14:17:57'),
(2, 'Toko B', '0834567891234', 'Tembalang', NULL, '2021-05-10 13:42:07', '2021-06-27 06:43:11'),
(4, 'Toko D', '0821333444555', 'Tunjungan', NULL, '2021-05-11 13:30:30', '2021-07-30 14:18:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(3, 'MP2106200001', NULL, 7000, 0, 7000, 10000, 3000, '', '2021-06-20', 1, '2021-06-20 19:46:54'),
(7, 'MP2106260001', NULL, 2500, 0, 2500, 3000, 500, '', '2021-06-26', 1, '2021-06-26 14:30:01'),
(8, 'MP2107130001', NULL, 5000, 0, 5000, 10000, 5000, '', '2021-07-13', 1, '2021-07-13 17:45:08'),
(9, 'MP2108210001', NULL, 5000, 0, 5000, 5000, 0, '', '2021-08-21', 1, '2021-08-21 12:45:53');

--
-- Trigger `t_sale`
--
DELIMITER $$
CREATE TRIGGER `del_detail` AFTER DELETE ON `t_sale` FOR EACH ROW BEGIN
 DELETE FROM t_sale_detail
 WHERE sale_id = OLD.sale_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(1, 1, 4, 7000, 1, 0, 7000),
(3, 3, 4, 7000, 1, 0, 7000),
(7, 7, 3, 2500, 1, 0, 2500),
(8, 8, 1, 5000, 1, 0, 5000),
(9, 9, 1, 5000, 1, 0, 5000);

--
-- Trigger `t_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `t_sale_detail` FOR EACH ROW BEGIN 
UPDATE p_item SET stock = stock - NEW.qty 
WHERE item_id = NEW.item_id; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_return` AFTER DELETE ON `t_sale_detail` FOR EACH ROW BEGIN 
UPDATE p_item SET stock = stock + OLD.qty 
WHERE item_id = OLD.item_id; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `harga`, `date`, `created`, `user_id`) VALUES
(1, 1, 'in', 'Kulakan', 2, 20, 0, '2021-05-28', '2021-05-28 14:51:40', 1),
(2, 4, 'in', 'Kulakan', 4, 5, 0, '2021-05-28', '2021-05-28 17:25:19', 1),
(5, 4, 'in', 'Rusak', NULL, 3, 0, '2021-05-30', '2021-05-30 18:37:33', 1),
(6, 4, 'in', 'Rusak', NULL, 2, 0, '2021-05-30', '2021-05-30 18:44:09', 1),
(8, 4, 'out', 'Rusak', NULL, 5, 0, '2021-05-30', '2021-05-30 21:39:54', 1),
(9, 1, 'in', 'Kulakan', 2, 6, 0, '2021-05-30', '2021-05-30 21:40:57', 1),
(11, 1, 'in', 'Kulakan', 1, 5, 0, '2021-05-30', '2021-05-30 21:44:48', 1),
(12, 1, 'out', 'Rusak', NULL, 5, 0, '2021-05-30', '2021-05-30 21:45:07', 1),
(17, 3, 'in', 'Kulakan', 1, 10, 0, '2021-06-26', '2021-06-26 14:29:34', 1),
(18, 3, 'in', 'Kulakan', 1, 20, 0, '2021-06-27', '2021-06-27 20:15:57', 1),
(19, 3, 'out', 'Rusak', NULL, 9, 0, '2021-06-27', '2021-06-27 20:22:19', 1),
(21, 8, 'in', 'Rusak', 1, 4, 30000, '2021-08-14', '2021-08-14 16:14:14', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `alamat`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Nabila', 'Tirto Agung', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Ari', 'Nganjuk', 2),
(4, 'Nono', '8cb2237d0679ca88db6464eac60da96345513964', 'Nono', 'Banyumanik', 2),
(5, 'Nini', '8cb2237d0679ca88db6464eac60da96345513964', 'Nini', 'tmblng', 2),
(6, 'kasir3', '7c222fb2927d828af22f592134e8932480637c0d', 'Ninu', 'sumeru', 2),
(7, 'Admin2', '75491a6ee17cc31bd0735749232ceb281107b44a', 'Fafa', 'ssss', 1),
(10, 'test1', '7c222fb2927d828af22f592134e8932480637c0d', 'sfsfg', 'kkkkkk', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indeks untuk tabel `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
