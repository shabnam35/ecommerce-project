-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 04:59 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project19`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `tcost` int(10) NOT NULL,
  `uname` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `orderid` int(50) NOT NULL,
  `tcost` int(10) NOT NULL,
  `uname` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `cardno` varchar(50) NOT NULL,
  `expdate` int(10) NOT NULL,
  `status` varchar(500) NOT NULL,
  `cvv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`orderid`, `tcost`, `uname`, `address`, `phone`, `mode`, `hname`, `cardno`, `expdate`, `status`, `cvv`) VALUES
(56537, -322, 'saman@gmail.com', 'jjgk', '2147483647', 'cash on delivery', '', '', 0, 'Delayed', 0),
(56538, 2156, 'saman@gmail.com', 'dfgvdfgfd dgvdfgvsd', '5464564564', 'cash on delivery', '', '', 0, 'Shipped', 0),
(56539, 1575, 'barun@gmail.com', 'dfhdf', '9857859789', 'dc', 'dfg', '1233', 1996, 'payment received,processing', 123);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phonenumber`, `email`, `message`) VALUES
(1, 'rsygrt', '5465467546', 'ghftgh@dfg.rt', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fed` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `name`, `phonenumber`, `email`, `fed`) VALUES
(1, 'trgerfgver', '4563463456', 'gfg@fgh.tfhtrfgh', ''),
(2, 'trgerfgver', '4563463456', 'gfg@fgh.tfhtrfgh', 'trhtg');

-- --------------------------------------------------------

--
-- Table structure for table `managecat`
--

CREATE TABLE `managecat` (
  `catid` int(10) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catpic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managecat`
--

INSERT INTO `managecat` (`catid`, `catname`, `catpic`) VALUES
(925753, 'Birthday Gifts', '1563048365th (36).jpg'),
(925754, 'Anniversary Gifts', '1563048396th.jpg'),
(925755, 'Relationship Gifts', '1563048423images.jpg'),
(925756, 'Festival Gifts', '1563048449download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `managesubcat`
--

CREATE TABLE `managesubcat` (
  `subid` int(10) NOT NULL,
  `catid` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `subpic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managesubcat`
--

INSERT INTO `managesubcat` (`subid`, `catid`, `name`, `subpic`) VALUES
(198764, 925753, 'Soft Toys & Teddys', '1563122345th (1).jpg'),
(198765, 925753, 'Mugs', '1563122431th (2).jpg'),
(198766, 925753, 'Watches', '1563122744th (3).jpg'),
(198767, 925754, 'Jewellery', '1563122869th (4).jpg'),
(198768, 925754, 'Chocolates', '1563122914th (5).jpg'),
(198769, 925754, 'Watches', '1563123003th (6).jpg'),
(198770, 925755, 'For Him', '1563123217th (7).jpg'),
(198771, 925755, 'For Her', '1563123283th (8).jpg'),
(198772, 925756, 'Sweets', '1563123385download (2).jpg'),
(198773, 925756, 'Other Gifts', '1563123873images (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

CREATE TABLE `orderhistory` (
  `ohid` int(50) NOT NULL,
  `oid` int(50) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `tcost` int(10) NOT NULL,
  `uname` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`ohid`, `oid`, `pid`, `name`, `image`, `price`, `quantity`, `tcost`, `uname`) VALUES
(69747, 56537, 6789546, 'Stuffed toy 3 Feet Cute Blue Fur & Heart Teddy Bear - 92 cm  (sky blue)', '15631249174-feet-cute-blue-fur-heart-teddy-bear-120-stuffed-toy-original-imafbu3nruqfhsev.jpeg', -161, 2, -322, 'saman@gmail.com'),
(69748, 56538, 6789546, 'Stuffed toy 3 Feet Cute Blue Fur & Heart Teddy Bear - 92 cm  (sky blue)', '15631249174-feet-cute-blue-fur-heart-teddy-bear-120-stuffed-toy-original-imafbu3nruqfhsev.jpeg', 539, 4, 2156, 'saman@gmail.com'),
(69749, 56539, 6789559, 'Skylofts Acrylic Teddy Bear Chocolate Gift Pack Bars  (72 g)', '156313170672-acrylic-teddy-bear-chocolate-gift-pack-skylofts-original-imaffwfr37qsdume.jpeg', 225, 7, 1575, 'barun@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(100) NOT NULL,
  `catid` int(100) NOT NULL,
  `subid` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `discount` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prodpic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `catid`, `subid`, `name`, `price`, `discount`, `stock`, `description`, `prodpic`) VALUES
(6789546, 925753, 198764, 'Stuffed toy 3 Feet Cute Blue Fur & Heart Teddy Bear - 92 cm  (sky blue)', 539, 8, 46, 'We are here for provide to your little ones this year by presenting them an adorable soft toy This soft toy into their bedroom will give them endless hours of fun filled playtime Crafted with perfection using the finest materials this Teddy has striking features Instill a love for wildlife and introduce your children to the world of animals with this furry little plush toy Features Non-toxic and soft fabric Soft and Cuddly filling Recommended Age Group 6 + Years.', '15631249174-feet-cute-blue-fur-heart-teddy-bear-120-stuffed-toy-original-imafbu3nruqfhsev.jpeg'),
(6789547, 925753, 198764, 'TEDDY BEAR 1.5 Feet Cap Teddy ', 295, 6, 50, '\"Deals India brings to you an adorable Deals indiaTEDDY BEAR 1.5 Feet Cap Teddy Very Beautiful High Quality Huggable Valentine & Birthday Gifts Lovable Special Gift ( Multicolor 38.5 Cm ) - 38.5 Cm - 38.5 cm (Red) Delight your little ones this year by presenting them with an adorable soft toy.', '15631250441-5-feet-cute-cap-teddy-bear-soft-stuffed-plush-toy-valentine-original-imaf7gzjr6rxkb6z.jpeg'),
(6789548, 925753, 198764, 'Gifteria Grey Elephant with baby - 40 cm  (Grey)', 290, 6, 50, 'Gifteria brings to you its wide range of soft toys that include animal figures, teddy bears, soft toys bags, kids pillow and much more.', '1563125132grey-elephant-with-baby-40-gifteria-original-imaeg9d2ggddswy6.jpeg'),
(6789549, 925753, 198765, 'GiftOwl Happy Birthday Cake Ceramic Coffee for Friend, Girlfriend & BoyFriend Glossy Finish With Vibrant Print Ceramic Mug  (350 ml)', 190, 10, 50, 'Coffee Mug\r\nMicrowave Safe\r\nColor: Multicolor\r\nCeramic\r\nTheme: Festivals & Occasions\r\nCapacity: 350 ml', '1563125532happy-birthday-cake-ceramic-coffee-mug-for-friend-girlfriend-original-imaffj9qfaz4z3ep.jpeg'),
(6789550, 925753, 198765, 'GiftOwl Best Birthday ', 270, 9, 50, 'Coffee Mug\r\nMicrowave Safe\r\nColor: Multicolor\r\nCeramic\r\nTheme: Festivals & Occasions\r\nCapacity: 350 ml', '1563125733best-birthday-to-my-son-ceramic-coffee-mug-for-friend-girlfriend-original-imaffj9qdjpjyka7.jpeg'),
(6789551, 925753, 198765, 'OddClick Happy Birthdy Mug', 299, 15, 50, 'Coffee Mug\r\nMicrowave Safe\r\nColor: Blue\r\nCeramic\r\nTheme: Graffiti & Art\r\nCapacity: 300 ml', '1563125847happy-birthdy-motu-for-motu-friend-motu-brother-motu-bff-original-imafbu73z6qjj8zy.jpeg'),
(6789552, 925753, 198766, 'LCS-8075 BLUE DIAL DAY & DATE FUNCTIONING Analog Watch - For Men', 499, 20, 50, 'Water resistant.Casual Watch', '15631341494054-pk-fogg-original-imafcvznm4fecqgn.jpeg'),
(6789553, 925753, 198766, 'PH-1331 Pack Of 2 Unique Combo Analog Watch - For Men', 275, 5, 50, 'Water resistant.Casual Watch.Leather strap.', '1563126176ph-1331-pack-of-2-unique-polo-hunter-original-imafgqu4ggjyfqxg.jpeg'),
(6789554, 925753, 198766, 'LCS-8404 ORIGINAL GOLD PLATED DAY & DATE FUNCTIONING Analog Watch - For Men', 569, 15, 50, 'Sports,party,wedding,casual Watch', '1563126290lcs-8404-lois-caron-original-imafcgbj8cwjra3r.jpeg'),
(6789555, 925754, 198767, 'Alloy Jewel Set  (Gold)', 223, 30, 50, 'Apara Fashion Jewelry brings to you the Exquisite, Fine crated Classic Designer Jewelry to Enhance your Natural Graceful Elegance. Women Love Jewelry as it not only enhances their beauty, but also gives them the social confidence. Festivals and celebrations are part of Indian culture and women like to traditionally dress themselves with latest trends in Jewelry and Apara exactly fulfills that need for the occasion. The Jewelry is made keeping in mind the Women ; who is today modern yet connected', '1563126467n71789gldpm1250-d1-sukkhi-original-imafa2taekcjqfkm.jpeg'),
(6789556, 925754, 198767, 'Alloy Jewel Set  (Gold)', 388, 10, 50, 'Apara Fashion Jewelry brings to you the Exquisite, Fine crated Classic Designer Jewelry to Enhance your Natural Graceful Elegance. Women Love Jewelry as it not only enhances their beauty, but also gives them the social confidence. Festivals and celebrations are part of Indian culture and women like to traditionally dress themselves with latest trends in Jewelry and Apara exactly fulfills that need for the occasion. The Jewelry is made keeping in mind the Women ; who is today modern yet connected', '1563126541ag1842-atasi-international-original-imafa2tvgjrzpnsu.jpeg'),
(6789557, 925754, 198767, 'Alloy Jewel Set  (Multicolor)', 388, 8, 50, 'Apara Fashion Jewelry brings to you the Exquisite, Fine crated Classic Designer Jewelry to Enhance your Natural Graceful Elegance. Women Love Jewelry as it not only enhances their beauty, but also gives them the social confidence. Festivals and celebrations are part of Indian culture and women like to traditionally dress themselves with latest trends in Jewelry and Apara exactly fulfills that need for the occasion. The Jewelry is made keeping in mind the Women ; who is today modern yet connected', '1563126662ag1688-atasi-international-original-imafa2qrafzny3su.jpeg'),
(6789558, 925754, 198768, 'Midiron Beautiful Pink Heart Tin Box Gift Pack with 15 Chocolate Bars', 389, 10, 50, 'Midiron presents Luxury Black Chocolate with tin heart box.', '156312690315-beautiful-pink-heart-tin-box-gift-pack-with-15-chocolate-bars-original-imafegkf22fz7eya.jpeg'),
(6789559, 925754, 198768, 'Skylofts Acrylic Teddy Bear Chocolate Gift Pack Bars  (72 g)', 225, 20, 43, 'Midiron presents Luxury Black Chocolate with tin heart box. Midiron Chocolate Gift pack is for your every special occasion and best gift for Birthday', '156313170672-acrylic-teddy-bear-chocolate-gift-pack-skylofts-original-imaffwfr37qsdume.jpeg'),
(6789560, 925754, 198768, 'Jainco Star Chocolates Book Box Chocolate Gift Pack Caramels  (280)', 1109, 8, 50, 'Midiron presents Luxury Black Chocolate with tin heart box. Midiron Chocolate Gift pack is for your every special occasion and best gift for Birthday', '1563131824280-book-box-chocolate-gift-pack-jainco-star-chocolates-original-imaetq4g6uqnejph.jpeg'),
(6789561, 925754, 198769, 'Laxmi Jewel Analogue Dial Mens Watch', 299, 5, 50, 'Water resistance depth: 50 meters\r\nRemove plastic at crown to start the watch', '1563132092lcs-8075-lois-caron-original-imaf8hy265hwft5k.jpeg'),
(6789562, 925754, 198769, 'Skmei Analog-Digital Black Dial Mens Watch - 1155 Gold', 429, 10, 50, '6 months manufacturer warranty on manufacturing defects', '156313219877085pp01-sonata-original-imaf3kgxtancyr6h.jpeg'),
(6789563, 925754, 198769, 'Espoir Analog Blue Dial Mens Watch-ES81940', 299, 15, 50, 'Water Resistance Depth: 3 meters\r\n6 months manufacturer warranty on manufacturing defects', '1563132300ls2804-limestone-original-imafgeayzhjhpb9f.jpeg'),
(6789564, 925755, 198770, 'Watch', 599, 6, 50, 'Water Resistance Depth: 3 meters\r\n6 months manufacturer warranty on manufacturing defects', '156313238777085pp01-sonata-original-imaf3kgxtancyr6h.jpeg'),
(6789565, 925755, 198770, 'Shirt', 899, 15, 50, 'Care Instructions: machine wash\r\nFit Type: slim fit\r\nColor: White\r\nMaterial: Cotton\r\nMachine wash\r\nFit: Slim Fit\r\nPattern: Printed', '1563132540xxl-tblwtshirtful-sh4-tripr-original-imaf9ajwb3mfbhmh.jpeg'),
(6789566, 925755, 198770, 'Jeans', 799, 40, 50, 'Skinny fit\r\nHand wash\r\nMade in India', '156313262932-mss19jn144-metronaut-original-imafhcej6znbzhek.jpeg'),
(6789567, 925755, 198771, 'Flowers', 599, 40, 50, 'Showpiece, Artificial Flower, Soft Toy', '1563132779cute-teddy-with-gold-rose-for-valentines-anniversary-birthdays-original-imafbe4ghregmpwz.jpeg'),
(6789568, 925755, 198771, 'Jewellery', 1700, 35, 50, 'shiny and classy\r\nstrong and durable', '1563132881ag1688-atasi-international-original-imafa2qrafzny3su.jpeg'),
(6789569, 925755, 198771, 'Watch', 999, 45, 50, 'Anuradha Art Jewelry brings to you the Exquisite, Fine crated Classic Designer Jewelry to Enhance your Natural Graceful Elegance.', '1563132983new-genva-platinum-sl-0068-cosmic-original-imaf6k72zfaxjhqg.jpeg'),
(6789570, 925756, 198772, 'Chocholik Sweets', 799, 17, 50, 'Presenting a Unique Gift Box with lovely Wishes', '1563133094108-diwali-sweets-may-festival-of-diwali-illuminate-you-life-original-imaey825qfqbwfye.jpeg'),
(6789571, 925756, 198772, 'Haldirams Nagpur Soan Papdi, 1kg', 230, 27, 50, 'National brand\r\nUsed finest quality ingredients\r\nSuitable for all', '1563133247500-sp-soan-papdi-soan-papdi-haldiram-original-imaevmsawtzcue2v.jpeg'),
(6789572, 925756, 198772, 'Ghasitaram Gifts Diwali Gifts Pure Kaju Katlis Box, 200g', 299, 13, 50, 'National brand\r\nUsed finest quality ingredients\r\nSuitable for all', '1563133436th (9).jpg'),
(6789573, 925756, 198773, 'Flowers', 50, 5, 50, 'Length: 35.5 inch\r\nType: Orchids\r\nMaterial: Plastic', '1563133508white-pink-orchids-flower-35-5-inch-pack-of-1-endecor-original-imafdxnwtg3rk2rt.jpeg'),
(6789574, 925756, 198773, 'Perfumes', 877, 25, 50, 'Fragrance Classification: Eau de Parfum\r\nFragrance Family: Oriental\r\nFragrance Segment: Premium\r\nQuantity: 100 ml\r\nIdeal For: Men', '1563133585100-mediterranean-groove-eau-de-parfum-skinn-by-titan-men-original-imaf9yxtr8uuqtuk.jpeg'),
(6789575, 925756, 198773, 'Dinner Set', 2499, 40, 50, 'Color: White\r\nCapacity: Veg Bowl - 190 ml, Soup Bowl - 280 ml, Serving Bowl - 800 ml', '1563133668httc27dn1mimgb-larah-original-imaf9cxzaphuzmhj.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Name` varchar(50) NOT NULL,
  `Phone Number` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Name`, `Phone Number`, `Gender`, `Username`, `Password`, `user`) VALUES
('barun', '9857859789', 'male', 'barun@gmail.com', '123', 'user'),
('garry', '9857859789', 'male', 'garry@gmail.com', '321', 'admin'),
('lovish', '9857859789', 'male', 'lovish@gmail.com', '123', 'user'),
('saman', '9857859789', 'male', 'saman@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `managecat`
--
ALTER TABLE `managecat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `managesubcat`
--
ALTER TABLE `managesubcat`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `orderhistory`
--
ALTER TABLE `orderhistory`
  ADD PRIMARY KEY (`ohid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `orderid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56540;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managecat`
--
ALTER TABLE `managecat`
  MODIFY `catid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=925757;

--
-- AUTO_INCREMENT for table `managesubcat`
--
ALTER TABLE `managesubcat`
  MODIFY `subid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198774;

--
-- AUTO_INCREMENT for table `orderhistory`
--
ALTER TABLE `orderhistory`
  MODIFY `ohid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69750;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6789576;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
