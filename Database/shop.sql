-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2018 at 08:26 AM
-- Server version: 5.7.18
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `trn` varchar(255) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `c_person` varchar(40) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `trn`, `phone`, `fax`, `email`, `c_person`, `adress`, `status`) VALUES
(1, 'C_abc', '487789779879877879', '879283444234234', '45352342323534534', 'faflkdfgj@mail', 'cvvc', 'kjakjgfhafklfg fdakgljhadflgjk hadfg\r\nadfgadfgadf gad\r\nf dad g ', 'Active'),
(2, 'c_xy', '34j3141341354354531513', '777777777777777', '8888888888888', 'djhaksdf@kj', 'dddd', 'kljdsfhgd daf afjkasdhf akjfha f kjlahd kjh h  ajldfhakljfhalkjfha kljh lkjhlkjhlkjhklajhf kjh lakjhf lkajh f', 'Active'),
(3, 'c_sff', '32452345234523542352', '554564', '68468', '46@fsfsd', 'sfsdfsd', 'kjdsfkjah akljdfh askjhfasdk jhd ', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `cus_total_tran`
--

CREATE TABLE `cus_total_tran` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(40) NOT NULL,
  `trn` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `total` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `net_total` varchar(255) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `delivary_invoice_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_total_tran`
--

INSERT INTO `cus_total_tran` (`id`, `cus_name`, `trn`, `date`, `total`, `discount`, `vat`, `net_total`, `payment`, `delivary_invoice_no`) VALUES
(1, 'C_abc', '487789779879877879', '2018-04-01', '621.25', '200', '31.0625', '452.3125', 'CASH', '7987987987987987987955'),
(2, 'c_xy', '34j3141341354354531513', '2018-04-01', '952.5', '100', '47.625', '900.125', 'CREDIT', '777777777777776');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `username`, `pass`) VALUES
(1, 'admin@mail.com', 'admin', '123'),
(2, 'manager@mail.comm', 'managerr', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `Product_code` varchar(30) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `Product_code`, `unit`, `price`) VALUES
(2, 'Potato', 'jdf34sa', 'KG', '100.25'),
(3, 'Tomato', 'kj4334', 'KG', '50.5'),
(4, 'Egg', '34c324', 'Pices', '10'),
(5, 'Brokly', 'jhg87', 'KG', '30');

-- --------------------------------------------------------

--
-- Table structure for table `product_by_cus`
--

CREATE TABLE `product_by_cus` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `Product_code` varchar(30) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `price` varchar(30) NOT NULL,
  `cus_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_by_cus`
--

INSERT INTO `product_by_cus` (`id`, `product_name`, `Product_code`, `unit`, `price`, `cus_name`) VALUES
(2, 'Potato', 'jdf34', 'KG', '50', 'as'),
(3, 'Tomato', 'kj4334', 'KG', '', ''),
(4, 'Egg', '34c324', 'Pices', '20', 'as'),
(5, 'Brokly', 'jhg87', 'KG', '30', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_cus_total_tran`
--

CREATE TABLE `p_cus_total_tran` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(40) NOT NULL,
  `trn` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `total` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `net_total` varchar(255) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `delivary_invoice_no` varchar(255) NOT NULL,
  `cus_in_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_cus_total_tran`
--

INSERT INTO `p_cus_total_tran` (`id`, `cus_name`, `trn`, `date`, `total`, `discount`, `vat`, `net_total`, `payment`, `delivary_invoice_no`, `cus_in_date`) VALUES
(1, 's_abc', '89999999999999999', '2018-04-01', '2167', '275', '108.35', '2000.35', 'CASH', '324234', ''),
(2, 's_xyz', '3453245245345243524', '2018-04-01', '502.25', '17', '25.1125', '510.3625', 'CASH', '123123', '');

-- --------------------------------------------------------

--
-- Table structure for table `p_transaction`
--

CREATE TABLE `p_transaction` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cus_name` varchar(40) NOT NULL,
  `pd_name` varchar(40) NOT NULL,
  `pd_code` varchar(40) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `delivary_invoice_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_transaction`
--

INSERT INTO `p_transaction` (`id`, `date`, `cus_name`, `pd_name`, `pd_code`, `quantity`, `unit`, `payment`, `price`, `amount`, `invoice_no`, `delivary_invoice_no`) VALUES
(1, '2018-04-01', 's_abc', 'Potato', 'jdf34', '4', 'KG', 'CASH', '100.25', '401', '1', '324234'),
(2, '2018-04-01', 's_abc', 'Tomato', 'kj4334', '32', 'KG', 'CASH', '50.5', '1616', '1', '324234'),
(3, '2018-04-01', 's_abc', 'Egg', '34c324', '3', 'Pices', 'CASH', '10', '30', '1', '324234'),
(4, '2018-04-01', 's_abc', 'Brokly', 'jhg87', '4', 'KG', 'CASH', '30', '120', '1', '324234'),
(8, '2018-04-01', 's_xyz', 'Potato', 'jdf34', '3', 'KG', 'CASH', '100.25', '300.75', '2', '123123'),
(9, '2018-04-01', 's_xyz', 'Tomato', 'kj4334', '3', 'KG', 'CASH', '50.5', '151.5', '2', '123123'),
(14, '2018-04-01', 's_xyz', 'Egg', '34c324', '5', 'Pices', 'CASH', '10', '50', '2', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `p_transection_tmp`
--

CREATE TABLE `p_transection_tmp` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cus_name` varchar(40) NOT NULL,
  `pd_name` varchar(40) NOT NULL,
  `pd_code` varchar(40) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invoice_no` int(255) NOT NULL,
  `delivary_invoice_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `trn` varchar(255) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `c_person` varchar(40) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `trn`, `phone`, `fax`, `email`, `c_person`, `adress`, `type`) VALUES
(1, 's_abc', '89999999999999999', '5454544545454', '7878787878787878', 'kjhkjh@mail', 'dsfsf', 'sdfsdfkjnkjnkjn', '7897987'),
(2, 's_xyz', '3453245245345243524', '24234', '34534534', '3455345@mi', '23325345', 'sdkfgjkgj kljhg ljkhlkj ', '34534534');

-- --------------------------------------------------------

--
-- Table structure for table `sup_total_tran`
--

CREATE TABLE `sup_total_tran` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(40) NOT NULL,
  `trn` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `total` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `net_total` varchar(255) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `delivary_invoice_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `table_price`
-- (See below for the actual view)
--
CREATE TABLE `table_price` (
`product_name` varchar(30)
,`Product_code` varchar(30)
,`unit` varchar(10)
,`price` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cus_name` varchar(40) NOT NULL,
  `pd_name` varchar(40) NOT NULL,
  `pd_code` varchar(40) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `delivary_invoice_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `date`, `cus_name`, `pd_name`, `pd_code`, `quantity`, `unit`, `payment`, `price`, `amount`, `invoice_no`, `delivary_invoice_no`) VALUES
(1, '2018-04-01', 'C_abc', 'Potato', 'jdf34', '5', 'KG', 'CASH', '100.25', '501.25', '1', '7987987987987987987955'),
(2, '2018-04-01', 'C_abc', 'Egg', '34c324', '12', 'Pices', 'CASH', '10', '120', '1', '7987987987987987987955'),
(8, '2018-04-01', 'c_xy', 'Potato', 'jdf34', '8', 'KG', 'CREDIT', '100.25', '802', '2', '777777777777776'),
(9, '2018-04-01', 'c_xy', 'Egg', '34c324', '7', 'Pices', 'CREDIT', '10', '70', '2', '777777777777776'),
(10, '2018-04-01', 'c_xy', 'Tomato', 'kj4334', '1', 'KG', 'CREDIT', '50.5', '50.5', '2', '777777777777776'),
(11, '2018-04-01', 'c_xy', 'Brokly', 'jhg87', '1', 'KG', 'CREDIT', '30', '30', '2', '777777777777776');

-- --------------------------------------------------------

--
-- Table structure for table `transection_tmp`
--

CREATE TABLE `transection_tmp` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `cus_name` varchar(40) NOT NULL,
  `pd_name` varchar(40) NOT NULL,
  `pd_code` varchar(40) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `invoice_no` int(255) NOT NULL,
  `delivary_invoice_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `table_price`
--
DROP TABLE IF EXISTS `table_price`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `table_price`  AS  select `product_by_cus`.`product_name` AS `product_name`,`product_by_cus`.`Product_code` AS `Product_code`,`product_by_cus`.`unit` AS `unit`,`product_by_cus`.`price` AS `price` from `product_by_cus` where (`product_by_cus`.`cus_name` = 'as') union select `product`.`product_name` AS `product_name`,`product`.`Product_code` AS `Product_code`,`product`.`unit` AS `unit`,`product`.`price` AS `price` from `product` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);
ALTER TABLE `customer` ADD FULLTEXT KEY `name_2` (`name`);
ALTER TABLE `customer` ADD FULLTEXT KEY `name_3` (`name`);

--
-- Indexes for table `cus_total_tran`
--
ALTER TABLE `cus_total_tran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);
ALTER TABLE `product` ADD FULLTEXT KEY `product_name_2` (`product_name`);

--
-- Indexes for table `product_by_cus`
--
ALTER TABLE `product_by_cus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD UNIQUE KEY `product_name_4` (`product_name`),
  ADD KEY `product_name_3` (`product_name`),
  ADD KEY `product_name_6` (`product_name`);
ALTER TABLE `product_by_cus` ADD FULLTEXT KEY `product_name_2` (`product_name`);
ALTER TABLE `product_by_cus` ADD FULLTEXT KEY `product_name_5` (`product_name`);

--
-- Indexes for table `p_cus_total_tran`
--
ALTER TABLE `p_cus_total_tran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_transaction`
--
ALTER TABLE `p_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_transection_tmp`
--
ALTER TABLE `p_transection_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sup_total_tran`
--
ALTER TABLE `sup_total_tran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transection_tmp`
--
ALTER TABLE `transection_tmp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cus_total_tran`
--
ALTER TABLE `cus_total_tran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_by_cus`
--
ALTER TABLE `product_by_cus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_cus_total_tran`
--
ALTER TABLE `p_cus_total_tran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p_transaction`
--
ALTER TABLE `p_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `p_transection_tmp`
--
ALTER TABLE `p_transection_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sup_total_tran`
--
ALTER TABLE `sup_total_tran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transection_tmp`
--
ALTER TABLE `transection_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
