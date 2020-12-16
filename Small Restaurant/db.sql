-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 مايو 2019 الساعة 23:12
-- إصدار الخادم: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_des` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address_des`, `note`) VALUES
(10, 28, ' riffa, Road 2 , Bldg 3, FLat 4', ''),
(12, 29, ' araad .2325.23.apr22', ' next to arad shcool'),
(13, 38, ' lgdsgfhxjghk/.lf', ' notes,mabye no notes at all'),
(14, 35, '  hidd,2252,23,2', '  next to hiddshcool'),
(15, 29, ' dsffsdf', 'fsfsd');

-- --------------------------------------------------------

--
-- بنية الجدول `commenter`
--

CREATE TABLE `commenter` (
  `cid` int(11) NOT NULL,
  `commenterId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `commenter`
--

INSERT INTO `commenter` (`cid`, `commenterId`, `itemId`, `comment`, `date`) VALUES
(19, 28, 7, '   hello guys', '2019-05-24 09:08:05'),
(20, 28, 7, '   hello hello can you hear me as I..etc', '2019-05-24 09:17:10'),
(21, 28, 1, '   okay', '2019-05-24 09:52:48'),
(22, 28, 10, '  very sweet dish', '2019-05-24 10:31:09'),
(23, 31, 1, ' the best pasta restaurant   on the earth', '2019-05-24 10:56:58'),
(25, 32, 1, '   awesome, thanks express pasta', '2019-05-24 11:01:21'),
(26, 28, 3, ' so good', '2019-05-24 12:32:55'),
(27, 28, 3, '   hi', '2019-05-24 12:33:34'),
(28, 35, 1, '    just great  ...', '2019-05-24 22:41:36'),
(29, 29, 1, '   ', '2019-05-25 21:24:50');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `customer_messages`
--

CREATE TABLE `customer_messages` (
  `MessageID` int(4) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(150) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `customer_messages`
--

INSERT INTO `customer_messages` (`MessageID`, `Name`, `Email`, `Subject`, `Message`) VALUES
(2, 'Saif Ghallab', 'saif.ghallab@gmail.com', 'test', 'test test'),
(3, 'Saif Ghallab', 'saif.ghallab@gmail.com', 'test', 'test test'),
(4, 'Saif Ghallab', 'saif.ghallab@gmail.com', 'test', 'test test'),
(5, 'Saif Ghallab', 'saif.ghallab@gmail.com', 'test', 'test test'),
(6, 'Saif Ghallab', 'saif.ghallab@gmail.com', 'test', 'test test'),
(7, 'Saif Ghallab', 'saif.ghallab@gmail.com', 'test', 'test test'),
(8, 'Saif Saleh Ghallab', 'saif.ghallab@gmail.com', 'asddsa', 'asdadasdasdas'),
(9, 'Saif Saleh Ghallab', 'saif.ghallab@gmail.com', 'asddsa', 'asdadasdasdas'),
(10, 'sdfsda', 'saif.ghallab@gmail.com', 'dfsdf', 'sdfsdf'),
(11, 'sdfsda', 'saif.ghallab@gmail.com', 'dfsdf', 'sdfsdf'),
(12, 'Saif Saleh Ghallab', 'saif.ghallab@gmail.com', 'moharaq', 'sdsdsdsd'),
(13, 'Saif Saleh Ghallab', 'saif.ghallab@gmail.com', 'moharaq', 'sdsdsdsd');

-- --------------------------------------------------------

--
-- بنية الجدول `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_des` varchar(300) NOT NULL,
  `price` decimal(6,3) NOT NULL,
  `item_cat` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `menu`
--

INSERT INTO `menu` (`item_id`, `item_name`, `item_des`, `price`, `item_cat`, `img`) VALUES
(1, 'Texas Fries', 'Texas Fries is a new way of introducing potatoes to Texas style. It is served with meat, sauce and cheese with Mexican spices, and eaten with nachos', '1.600', 'Hot Starters', 'imgs/Hot Starters/Texas Fries.jpg'),
(3, 'Dynamit Shrimp', 'Shrimp or prawns of high value seafood where certified as rich as mineral phosphorus, iron, copper and magnesium, in addition to vitamins', '2.500', 'Hot Starters', 'imgs/Hot Starters/Dynamit Shrimp.jpg'),
(4, 'Golden Fried Prawns', 'It is one of the types of seafood useful to human health, characterized by rich many important elements such as phosphorus is very important to humans, and shrimp is also tasty taste and beautiful colors', '2.700', 'Hot Starters', 'imgs/Hot Starters/Golden Fried Prawns.jpg'),
(5, 'Quesadilla', 'Quesadilla. Is a meal made from flour or corn with a cheese mixture containing vegetables, forming a crescent. This dish originated in Mexico.', '2.200', 'Hot Starters', 'imgs/Hot Starters/Quesadilla.jpg'),
(6, 'Creamy Vegetable Wraps', 'Vegetable Tortilla Roll Ups with cream cheese filling spread on tortillas, topped with veggies and cheese. Slice and serve.', '2.500', 'Hot Starters', 'imgs/Hot Starters/Creamy Vegetable Wraps.jpg'),
(7, 'Cheese Balls', 'When cream cheese and the happy hostess met, a magical cocktail party food was born. we are talking about the cheese ball.', '1.500', 'Hot Starters', 'imgs/Hot Starters/Cheese Balls.jpg'),
(8, 'Cheese Chopsticks', '', '1.500', 'Hot Starters', 'imgs/Hot Starters/Cheese Chopsticks.jpg'),
(9, 'Dynamite Chicken', '', '1.500', 'Hot Starters', 'imgs/Hot Starters/Dynamite Chicken.jpg'),
(10, 'Buffalo Wings', '', '1.800', 'Hot Starters', 'imgs/Hot Starters/Buffalo Wings.jpg'),
(11, 'Loaded Cheese Fries', '', '1.200', 'Hot Starters', 'imgs/Hot Starters/Loaded Cheese Fries.jpg'),
(12, 'Mashed Potato', '', '1.200', 'Hot Starters', 'imgs/Hot Starters/Mashed Potato.jpg'),
(13, 'Chicken and cheese salad', '', '2.000', 'Cold Starters', 'imgs/Cold Starters/Chicken and cheese salad.jpg'),
(14, 'Pasta Express Salad', '333333333333333', '2.000', 'Cold Starters', 'imgs/Cold Starters/Pasta Express Salad.jpg'),
(15, 'Chicken Caesar Salad', '', '1.200', 'Cold Starters', 'imgs/Cold Starters/Chicken Caesar Salad.jpg'),
(16, 'Mushroom Soup', '', '1.000', 'Soup', 'imgs/Soup/Mushroom Soup.jpg'),
(17, 'Chicken Soup', '', '1.000', 'Soup', 'imgs/Soup/Chicken Soup.jpg'),
(18, 'Everything Pasta', '', '2.200', 'Pasta', 'imgs/Pasta/Everything Pasta.jpg'),
(19, 'Chicken Pasta', '', '1.900', 'Pasta', 'imgs/Pasta/Chicken Pasta.jpg'),
(20, 'Shrimp Pasta', '', '2.200', 'Pasta', 'imgs/Pasta/Shrimp Pasta.jpg'),
(21, 'Sausage Pasta', '', '1.800', 'Pasta', 'imgs/Pasta/Sausage Pasta.jpg'),
(22, 'Vegetable Pasta', '', '1.700', 'Pasta', 'imgs/Pasta/Vegetable Pasta.jpg'),
(23, 'Mini Burger Beff', '', '1.800', 'Burger', 'imgs/Burger/Mini Burger Beff.jpg'),
(24, 'Cheese Beef Burger Meal', '', '2.500', 'Burger', 'imgs/Burger/Cheese Beef Burger Meal.jpg'),
(25, 'Cheese Beef Burger', '', '1.800', 'Burger', 'imgs/Burger/Cheese Beef Burger Meal.jpg'),
(28, 'Grill Chicken Breast With', '', '2.600', 'International Dishes', 'imgs/Burger/Cheese Beef Burger Meal.jpg'),
(29, 'Mini Fillet Steak', '', '4.200', 'International Dishes', 'imgs/International Dishes/Mini Fillet Steak.jpg'),
(30, 'Fettuccine Crusted Chicken', '', '2.900', 'International Dishes', 'imgs/International Dishes/Fettuccine Crusted Chicken.jpg'),
(31, 'Spaghetii With Cherry Tomato', '', '2.200', 'International Dishes', 'imgs/International Dishes/Spaghetii With Cherry Tomato.jpg'),
(32, 'Chicken Kiev', '', '2.700', 'International Dishes', 'imgs/International Dishes/Chicken Kiev.jpg'),
(33, 'Mojito Cocktali', '', '1.200', 'Mocktalis', 'imgs/Mocktalis/Mojito Cocktali.jpg'),
(34, 'Mojito Strawberry', '', '1.300', 'Mocktalis', 'imgs/Mocktalis/Mojito Strawberry.jpg'),
(35, 'Cherry Coke', '', '1.300', 'Mocktalis', 'imgs/Mocktalis/Cherry Coke.jpg'),
(36, 'Shirley Temple', '', '1.100', 'Mocktalis', 'imgs/Mocktalis/Shirley Temple.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `img` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `offers`
--

INSERT INTO `offers` (`id`, `img`) VALUES
(1, 'offer/1.PNG'),
(2, 'offer/2.png');

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `data_time` datetime NOT NULL,
  `total` decimal(6,3) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address_id`, `data_time`, `total`, `payment_method`, `status`) VALUES
(27, 28, 10, '2019-05-24 12:44:58', '13.800', 'cash', 'waiting'),
(28, 38, 13, '2019-05-24 21:50:41', '66.500', 'card', 'waiting'),
(29, 38, 13, '2019-05-24 21:53:50', '4.600', 'cash', 'waiting'),
(30, 35, 14, '2019-05-24 22:46:29', '47.600', 'cash', 'waiting'),
(34, 35, 14, '2019-05-24 22:50:34', '47.600', 'cash', 'waiting'),
(35, 35, 14, '2019-05-24 22:50:40', '47.600', 'cash', 'waiting'),
(36, 35, 14, '2019-05-24 22:53:14', '47.600', 'cash', 'waiting');

-- --------------------------------------------------------

--
-- بنية الجدول `order_item`
--

CREATE TABLE `order_item` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `Request` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `order_item`
--

INSERT INTO `order_item` (`item_id`, `order_id`, `qty`, `Request`) VALUES
(1, 27, 1, ' '),
(1, 28, 1, ' '),
(1, 29, 1, ' '),
(1, 30, 7, ' '),
(1, 34, 7, ' '),
(1, 35, 7, ' '),
(1, 36, 7, ' '),
(3, 27, 1, ' '),
(3, 28, 7, 'dfs '),
(3, 29, 1, ' '),
(3, 30, 6, ' '),
(3, 34, 6, ' '),
(3, 35, 6, ' '),
(3, 36, 6, ' '),
(4, 27, 1, ' '),
(4, 28, 9, ' '),
(4, 30, 1, ' '),
(4, 34, 1, ' '),
(4, 35, 1, ' '),
(4, 36, 1, ' '),
(5, 27, 1, ' '),
(5, 28, 7, 'dsfssdsdd '),
(5, 30, 1, ' '),
(5, 34, 1, ' '),
(5, 35, 1, ' '),
(5, 36, 1, ' '),
(7, 30, 9, ' '),
(7, 34, 9, ' '),
(7, 35, 9, ' '),
(7, 36, 9, ' '),
(11, 27, 1, ' '),
(23, 27, 1, 'no Salad '),
(33, 28, 6, 'gfgd '),
(33, 30, 1, ' '),
(33, 34, 1, ' '),
(33, 35, 1, ' '),
(33, 36, 1, ' '),
(34, 27, 1, ' with ice'),
(34, 30, 1, ' '),
(34, 34, 1, ' '),
(34, 35, 1, ' '),
(34, 36, 1, ' ');

-- --------------------------------------------------------

--
-- بنية الجدول `rating`
--

CREATE TABLE `rating` (
  `ratingID` int(11) NOT NULL,
  `raterID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `rating`
--

INSERT INTO `rating` (`ratingID`, `raterID`, `itemID`, `value`) VALUES
(43, 29, 1, 1),
(44, 29, 1, 5),
(45, 29, 1, 3),
(46, 29, 1, 2),
(47, 29, 1, 1),
(48, 29, 1, 2),
(49, 29, 1, 2),
(50, 38, 1, 5),
(51, 38, 1, 5),
(52, 38, 1, 5),
(53, 38, 1, 5),
(54, 38, 1, 1),
(55, 38, 1, 1),
(56, 38, 1, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `replier`
--

CREATE TABLE `replier` (
  `rid` int(11) NOT NULL,
  `replierId` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `reply` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `replier`
--

INSERT INTO `replier` (`rid`, `replierId`, `cid`, `itemId`, `comment`, `reply`, `date`) VALUES
(27, 28, 19, 7, '   hello guys', '    Iam replying to myself', '2019-05-24 09:25:17'),
(32, 35, 25, 1, '   awesome, thanks express pasta', '    yupe,its good', '2019-05-24 14:30:45'),
(33, 35, 23, 1, ' the best pasta restaurant   on the earth', '    agree', '2019-05-24 22:41:21');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone_number` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userPic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `name`, `user_type`, `password`, `phone_number`, `email`, `userPic`) VALUES
(28, 'abdulla', 'abdulla', 'customer', '202cb962ac59075b964b07152d234b70', 36770978, 'a.khallouf@outlook.com', 'users_mgs/defaultPic.png'),
(29, 'jubran', 'jubran2', 'admin', '202cb962ac59075b964b07152d234b70', 33232332, 'jubran@outlook.com', 'users_mgs/defaultPic.png'),
(30, 'staff', 'satff', 'staff', '202cb962ac59075b964b07152d234b70', 36032983, 'saif@outlook.com', 'users_mgs/defaultPic.png'),
(31, 'naif', 'naif ', 'satff', '202cb962ac59075b964b07152d234b70', 33481293, 'Dragon@outlook.com', 'users_mgs/defaultPic.png'),
(32, 'maz', 'maz', 'customer', '202cb962ac59075b964b07152d234b70', 36128324, 'maz@yahoo.com', 'users_mgs/defaultPic.png'),
(33, 'abood', 'abdullah khallouf', 'customer', '60474c9c10d7142b7508ce7a50acf414', 36770978, 'a.khallouf@outlook.com', 'users_mgs/defaultPic.png'),
(35, 'selena12', 'selena gomez', 'customer', '60474c9c10d7142b7508ce7a50acf414', 36032983, 'selo@outlook.com', 'users_mgs/user_35.jpeg'),
(36, 'deno', 'emilia clarke', 'customer', '60474c9c10d7142b7508ce7a50acf414', 33481293, 'motherofDragons@outlook.com', 'users_mgs/user_31.jpeg'),
(37, 'taylo', 'taylor swift', 'customer', '60474c9c10d7142b7508ce7a50acf414', 36128324, 'taylo@yahoo.com', 'users_mgs/user_32.jpeg'),
(38, 'saif', 'Mr Saif', 'customer', '3d186804534370c3c817db0563f0e461', 34315074, 'saif.ghallab@gmail.com', 'users_mgs/defaultPic.png');

-- --------------------------------------------------------

--
-- بنية الجدول `websitetexts`
--

CREATE TABLE `websitetexts` (
  `textID` int(11) NOT NULL,
  `textName` varchar(100) NOT NULL,
  `textField` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `websitetexts`
--

INSERT INTO `websitetexts` (`textID`, `textName`, `textField`) VALUES
(1, 'homeP1', 'nappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women     '),
(2, 'days', 'Monday - Friday'),
(3, 'daysTime', '08.00 am - 10.00 pm'),
(4, 'SaturdayTime', '08.00 am - 11.00 pm'),
(5, 'SundayTime', '08.00 am - 11.00 pm'),
(6, 'address', 'Bahrain,arad Avenue 29 \r\n'),
(7, 'numbers1', '1798 9899 '),
(8, 'numbers2', '17888 9996'),
(9, 'logo', 'PastaExpress.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `commenterId` (`commenterId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_messages`
--
ALTER TABLE `customer_messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`item_id`,`order_id`),
  ADD KEY `order_item_ibfk_1` (`order_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratingID`),
  ADD KEY `raterID` (`raterID`),
  ADD KEY `itemID` (`itemID`);

--
-- Indexes for table `replier`
--
ALTER TABLE `replier`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `replierId` (`replierId`),
  ADD KEY `cid` (`cid`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `websitetexts`
--
ALTER TABLE `websitetexts`
  ADD PRIMARY KEY (`textID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `commenter`
--
ALTER TABLE `commenter`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_messages`
--
ALTER TABLE `customer_messages`
  MODIFY `MessageID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `replier`
--
ALTER TABLE `replier`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `websitetexts`
--
ALTER TABLE `websitetexts`
  MODIFY `textID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_ibfk_1` FOREIGN KEY (`commenterId`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `commenter_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `menu` (`item_id`);

--
-- القيود للجدول `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`raterID`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `menu` (`item_id`);

--
-- القيود للجدول `replier`
--
ALTER TABLE `replier`
  ADD CONSTRAINT `replier_ibfk_1` FOREIGN KEY (`replierId`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `replier_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `commenter` (`cid`),
  ADD CONSTRAINT `replier_ibfk_3` FOREIGN KEY (`itemId`) REFERENCES `menu` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
