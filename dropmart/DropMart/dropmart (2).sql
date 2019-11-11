-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 09:21 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dropmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin1@sliit.lk', '123'),
(2, 'admin2@sliit.lk', '456');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `address`, `image`) VALUES
(1, 'withu', 'withu@sliit.lk', '123', 'wellawatta', 'img/img1.jpg'),
(2, 'ram', 'ram@sliit.lk', '456', 'wellawatta', 'img/img2.jpg'),
(3, 'guga', 'guga@sliit.lk', '789', 'wellawatte', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderId`, `product`, `qty`) VALUES
(1, 544848484, 1, 32),
(2, 544848484, 2, 311),
(3, 544848484, 3, 123),
(4, 1178316271, 1, 4),
(5, 1178316271, 9, 1),
(6, 1178316271, 10, 2),
(7, 808146843, 9, 1),
(8, 214556165, 2, 5),
(9, 214556165, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNo` int(11) DEFAULT NULL,
  `customer` int(11) NOT NULL,
  `deliveryAddress` varchar(150) NOT NULL,
  `telephoneNo` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `partner` int(11) DEFAULT NULL,
  `deliveryStatus` tinyint(1) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNo`, `customer`, `deliveryAddress`, `telephoneNo`, `email`, `partner`, `deliveryStatus`, `created`, `modified`) VALUES
(1, 544848484, 1, 'xxxx', '123', NULL, 1, 1, '0000-00-00', '0000-00-00'),
(2, 1178316271, 2, 'wellawatta', '0777422671', 'john@cena.lk', 1, 0, '2019-11-10', '2019-11-10'),
(3, 808146843, 2, 'tom street', '', '', 1, 0, '2019-11-11', '2019-11-11'),
(4, 214556165, 1, 'tom street', '0777422671', '', 1, 0, '2019-11-11', '2019-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `partnerName` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `partnerName`, `address`, `username`, `password`) VALUES
(1, 'TomX', 'tom street', 'tomY', '$2a$10$YnZsIEUslOhLMeXflhOBEuUTqFtv0r9qcqpMhgIFyY/6aoOvR7OXy'),
(2, 'Laughfs', 'Laughfs, Wellawatte', 'Laughfs', 'Laughfs123'),
(3, 'Arpico', 'Arpico, Wellawatte', 'Arpico', 'Arpico123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(30) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `category`, `image`) VALUES
(1, 'Coopoliva Extra Virgin Olive Oil 1L', 2950, 'grocery', 'images/Grocery/Coopoliva Extra Virgin Olive Oil 1L.jpeg'),
(2, 'Finagle Sandwich Bread 600G', 190, 'grocery', 'images/Grocery/Finagle Sandwich Bread 600G.jpeg'),
(3, 'Fingle Burger Bread 2S', 85, 'grocery', 'images/Grocery/Fingle Burger Bread 2S.jpeg'),
(4, 'Fingle Cream Buns 2S', 50, 'grocery', 'images/Grocery/Fingle Cream Buns 2S.jpeg'),
(5, 'Fingle Kurakkan Diet Bread 270G', 160, 'grocery', 'images/Grocery/Fingle Kurakkan Diet Bread 270G.jpeg'),
(6, 'Green Apple 1kg', 520, 'fruits', 'images/Fruits/greenApple.jpg'),
(7, 'Wood Apple 1kg', 100, 'fruits', 'images/Fruits/woodapple.jpg'),
(8, 'Mandarin 1kg', 650, 'fruits', 'images/Fruits/mandarin.jpg'),
(9, 'Coconut', 60, 'vegetables', 'images/Vegetables/Coconut.jpeg'),
(10, 'Bell Pepper Green 100g', 250, 'vegetables', 'images/Vegetables/Bell Pepper Green.jpeg'),
(11, 'Linna 1kg', 490, 'fish', 'images/Fish/linna.jpg'),
(12, 'Beef Cubes 1kg', 1440, 'meat', 'images/Meat/Beef Cubes.jpeg'),
(13, 'Bbq Spare Ribs Sheet 1kg', 2710, 'meat', 'images/Meat/Bbq Spare Ribs Sheet.jpeg'),
(14, 'Prawns Medium 1kg', 1740, 'fish', 'images/Fish/mediumPrawns.jpg'),
(15, 'Seer Fish Slices 1kg', 2190, 'fish', 'images/Fish/seerfishSlices.jpg'),
(16, 'Sudaya 1kg', 110, 'fish', 'images/Fish/sudaya.jpg'),
(17, 'Thalapath (Koppara) 1kg', 1260, 'fish', 'images/Fish/thalapath.jpg'),
(18, 'Thalapath Small 1kg', 1340, 'fish', 'images/Fish/thalapathSmall.jpg'),
(19, 'Tuna Fish 1kg', 1140, 'fish', 'images/Fish/tuna.jpg'),
(20, 'Axe Oil 5Ml', 180, 'pharmaceuticals', 'images/Pharmaceuticals/Axe Oil 5Ml.jpg'),
(21, 'Axe Oil 28Ml', 600, 'pharmaceuticals', 'images/Pharmaceuticals/Axe Oil 28Ml.jpg'),
(22, 'Baraka Black Seed Oil 100 Mll', 512, 'pharmaceuticals', 'images/Pharmaceuticals/Baraka Black Seed Oil 100 Mll.jpg'),
(23, 'Baraka Cod Liver Oil Caps 60S', 360, 'pharmaceuticals', 'images/Pharmaceuticals/Baraka Cod Liver Oil Caps 60S.jpg'),
(24, 'Baraka Diabsol Caps 30S', 393, 'pharmaceuticals', 'images/Pharmaceuticals/Baraka Diabsol Caps 30S.jpg'),
(25, 'Baraka Gotukola Caps 60S', 240, 'pharmaceuticals', 'images/Pharmaceuticals/Baraka Gotukola Caps 60S.jpg'),
(26, 'Baraka Joint Safe Caps 30S', 360, 'pharmaceuticals', 'images/Pharmaceuticals/Baraka Joint Safe Caps 30S.jpg'),
(27, 'Baraka Karapincha Plus 60S', 240, 'pharmaceuticals', 'images/Pharmaceuticals/Baraka Karapincha Plus 60S.jpg'),
(28, 'Calgo Low Calorie Sweetener 100G', 452, 'pharmaceuticals', 'images/Pharmaceuticals/Calgo Low Calorie Sweetener 100G.jpg'),
(29, 'Dettol Liquid 210Ml', 260, 'pharmaceuticals', 'images/Pharmaceuticals/Dettol Liquid 210Ml.jpg'),
(30, 'Eno Antacids Orange 25G', 150, 'pharmaceuticals', 'images/Pharmaceuticals/Eno Antacids Orange 25G.jpg'),
(31, 'CARGILLS 1L VANILA CHOC MIX', 600, 'dairy', 'images/Dairy/CARGILLS 1L VANILA CHOC MIX.jpg'),
(33, 'Elephant House Chocolate Ice Cream 4L', 1500, 'dairy', 'images/Dairy/Elephant House Chocolate Ice Cream 4L.jpg'),
(34, 'Elephant House Vanila Ice Cream 2L', 640, 'dairy', 'images/Dairy/Elephant House Vanila Ice Cream 2L.jpg'),
(35, 'Elephant House WONDER BAR VANILA', 58, 'dairy', 'images/Dairy/Elephant House WONDER BAR VANILA.jpg'),
(36, 'fullcreamAmbewela200ml', 180, 'dairy', 'images/Dairy/fullcreamAmbewela200ml.jpg'),
(37, 'goatmilk190ml', 210, 'dairy', 'images/Dairy/goatmilk190ml.jpg'),
(38, 'fullcreamLakspray1kg', 659, 'dairy', 'images/Dairy/fullcreamLakspray1kg.jpg'),
(39, 'kotmaleprocesscheese100g', 314, 'dairy', 'images/Dairy/kotmaleprocesscheese100g.jpg'),
(40, 'Chicken Breast Meat Boneless', 710, 'meat', 'images/Meat/Chicken Breast Meat Boneless.jpeg'),
(41, 'Chicken Drumsticks Skin On', 644, 'meat', 'images/Meat/Chicken Drumsticks Skin On.jpeg'),
(42, 'Chicken Drumsticks Skinless', 500, 'meat', 'images/Meat/Chicken Drumsticks Skinless.jpeg'),
(43, 'Chicken Full Breast Skinless', 800, 'meat', 'images/Meat/Chicken Full Breast Skinless.jpeg'),
(44, 'Chicken Gizzard', 524, 'meat', 'images/Meat/Chicken Gizzard.jpeg'),
(45, 'Chicken Liver', 710, 'meat', 'images/Meat/Chicken Liver.jpeg'),
(46, 'Chicken Wings', 325, 'meat', 'images/Meat/Chicken Wings.jpeg'),
(47, 'Local Mutton For Curry', 3000, 'meat', 'images/Meat/Local Mutton For Curry.jpeg'),
(48, 'Capsicum 1Kg', 350, 'vegetables', 'images/Vegetables/Capsicum.jpeg'),
(49, 'beetroot 1kg', 200, 'vegetables', 'images/Vegetables/beetroot.jpeg'),
(50, 'Big Onions 1Kg', 260, 'vegetables', 'images/Vegetables/Big Onions.jpeg'),
(51, 'Adidas Deodrant Spray Team Force 150Ml', 720, 'household', 'images/Household/Adidas Deodrant Spray Team Force 150Ml.jpg'),
(52, 'Adidas Edt Dynamic Pulse 100Ml', 1750, 'household', 'images/Household/Adidas Edt Dynamic Pulse 100Ml.jpg'),
(53, 'Adidas Team Force Edt 100Ml', 1750, 'household', 'images/Household/Adidas Team Force Edt 100Ml.jpg'),
(54, 'Axe Body Spray Click 150Ml', 588, 'household', 'images/Household/Axe Body Spray Click 150Ml.jpg'),
(55, 'Bic Comfort Gel Fresh Foam 200Ml', 900, 'household', 'images/Household/Bic Comfort Gel Fresh Foam 200Ml.jpg'),
(56, 'Comfort Fabric Conditioner Blue 860Ml', 866, 'household', 'images/Household/Comfort Fabric Conditioner Blue 860Ml.jpg'),
(57, 'Comfort Fabric Conditioner Pink 860Ml', 866, 'household', 'images/Household/Comfort Fabric Conditioner Pink 860Ml.jpg'),
(58, 'Farlin Plastic Feeding Bottle 240Ml', 352, 'household', 'images/Household/Farlin Plastic Feeding Bottle 240Ml.jpg'),
(59, 'Flora Toilet Rolls 10S', 250, 'household', 'images/Household/Flora Toilet Rolls 10S.jpg'),
(60, 'kelloggs Chocos 375 G', 745, 'grocery', 'images/Grocery/kelloggs Chocos 375 G.jpeg'),
(61, 'Kelloggs Corn Flakes 475G', 745, 'grocery', 'images/Grocery/Kelloggs Corn Flakes 475G.jpeg'),
(62, 'Fortune Vegetable Oil 2L', 650, 'grocery', 'images/Grocery/Fortune Vegetable Oil 2L.jpeg'),
(63, 'Marmite Large 210G', 350, 'grocery', 'images/Grocery/Marmite Large 210G.jpeg'),
(64, 'redGrapes 1Kg', 1100, 'fruits', 'images/Fruits/redGrapes.jpg'),
(65, 'melon 1Kg', 100, 'fruits', 'images/Fruits/melon.jpg'),
(66, 'redApple 1Kg', 520, 'fruits', 'images/Fruits/redApple.jpg'),
(67, 'greenpears 1Kg', 890, 'fruits', 'images/Fruits/greenpears.jpg'),
(68, 'budMango 1Kg', 190, 'fruits', 'images/Fruits/budMango.jpg'),
(69, 'Coca Cola Pet 2L', 210, 'beverages', 'images/Beverages/Coca Cola Pet 2L.jpeg'),
(70, 'Sprite Pet 2L', 210, 'beverages', 'images/Beverages/Sprite Pet 2L.jpeg'),
(71, 'Red Bull Energy Drink 355Ml', 350, 'beverages', 'images/Beverages/Red Bull Energy Drink 355Ml.jpeg'),
(72, 'Sustagen Chocolate 400G', 2100, 'beverages', 'images/Beverages/Sustagen Chocolate 400G.jpeg'),
(73, 'Anchor Milk Powder 1Kg Pkt', 790, 'beverages', 'images/Beverages/Anchor Milk Powder 1Kg Pkt.jpeg'),
(74, 'Kist Juice Apple 1L', 444, 'beverages', 'images/Beverages/Kist Juice Apple 1L.jpeg'),
(75, 'Kist Juice Orange 1L', 400, 'beverages', 'images/Beverages/Kist Juice Orange 1L.jpeg'),
(76, 'Horlicks 400G Carton Pack', 525, 'beverages', 'images/Beverages/Horlicks 400G Carton Pack.jpeg'),
(77, 'Lipton Ceylonta Tea 400G', 645, 'beverages', 'images/Beverages/Lipton Ceylonta Tea 400G.jpeg'),
(78, 'Green Chilies 1Kg', 210, 'vegetables', 'images/Vegetables/Green Chilies.jpeg'),
(79, 'Green Cucumber 1Kg', 363, 'vegetables', 'images/Vegetables/Green Cucumber.jpeg'),
(80, 'Green Beaans 1Kg', 250, 'vegetables', 'images/Vegetables/Green Beaans.jpeg'),
(81, 'seerfishSlices 1Kg', 680, 'fish', 'images/Fish/seerfishSlices.jpg\r\n'),
(82, 'MediumPrawns 1Kg', 1050, 'fish', 'images/Fish/mediumPrawns.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `weeklydeals`
--

CREATE TABLE `weeklydeals` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weeklydeals`
--

INSERT INTO `weeklydeals` (`id`, `product`, `percentage`) VALUES
(1, 20, 10),
(3, 22, 5),
(4, 49, 5),
(5, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer`),
  ADD KEY `partner` (`partner`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeklydeals`
--
ALTER TABLE `weeklydeals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `weeklydeals`
--
ALTER TABLE `weeklydeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weeklydeals`
--
ALTER TABLE `weeklydeals`
  ADD CONSTRAINT `weeklydeals_ibfk_1` FOREIGN KEY (`product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
