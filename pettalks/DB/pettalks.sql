-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2023 at 01:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pettalks`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `quantity`, `price`, `variation_id`) VALUES
(30, 6, 1, 100, 42),
(40, 9, 1, 120, 43),
(41, 2, 1, 100, 42),
(61, 2, 1, 120, 43);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(17, 'Dog'),
(18, 'Cat'),
(19, 'Birds'),
(20, 'Pisces'),
(24, 'Miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivered_to` varchar(255) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivered_to`, `phone_no`, `address`, `pay_method`, `pay_status`, `order_status`, `order_date`, `order_note`) VALUES
(7, 7, 'Bryan May', '45', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-24', ''),
(8, 7, 'Bryan May', '412', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-24', ''),
(9, 2, 'Harry Potter', '123', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', ''),
(10, 2, 'Harry Potter', '12345', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', ''),
(11, 10, 'Bryan May', '345678', '23', 'Debit or Credit', 0, 0, '2023-05-25', ''),
(12, 11, 'Harry Potter', '12345', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', ''),
(13, 11, 'Bryan May', '1234', '23 adelaide', 'Debit or Credit', 1, 1, '2023-05-25', ''),
(14, 7, 'Harry Potter', '420865127', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', 'asdgjsgfs'),
(15, 7, 'Bryan May', '420865127', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', 'asjdgasdg'),
(16, 7, 'Harry Potter', '356898', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', 'gruyriultu'),
(17, 7, 'Harry Potter', '12312234', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', 'efsdfsd'),
(18, 7, 'dog', '1234', '332 Daigonal road', 'Debit or Credit', 0, 0, '2023-05-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `variation_id`, `quantity`, `price`) VALUES
(8, 7, 42, 1, 100),
(9, 8, 42, 1, 100),
(10, 8, 43, 1, 120),
(11, 9, 42, 1, 100),
(12, 10, 42, 1, 100),
(13, 11, 42, 1, 100),
(14, 11, 43, 3, 120),
(15, 11, 47, 4, 125),
(16, 12, 42, 1, 100),
(17, 12, 43, 1, 120),
(18, 13, 44, 3, 150),
(19, 14, 42, 1, 100),
(20, 14, 44, 1, 150),
(21, 15, 42, 1, 100),
(22, 15, 44, 1, 150),
(23, 16, 45, 1, 150),
(24, 17, 43, 1, 120),
(25, 17, 46, 1, 100),
(26, 17, 45, 1, 150),
(27, 18, 42, 1, 100),
(28, 18, 43, 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `uploaded_date` date NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `unit_price`, `uploaded_date`, `category_id`, `product_desc`) VALUES
(36, 'Ultamino for Dogs', './uploads/dog1.jpg', 100, '2023-05-24', 17, 'Lorem ipsum........'),
(37, 'Pro Plan Veterinary', './uploads/dog2.jpg', 120, '2023-05-24', 17, 'Lorem ipsum........'),
(38, 'Urinary Care', './uploads/dog3.jpg', 150, '2023-05-24', 17, 'Lorem ipsum........'),
(39, 'Shrimp Pellets', './uploads/fish1.jpg', 150, '2023-05-24', 20, 'Lorem ipsum........'),
(40, 'Multi Cat Diffuser', './uploads/cat 1.jpg', 100, '2023-05-24', 18, 'Lorem ipsum........'),
(42, 'Fruit Blend w Natural Flavors', './uploads/bird1.jpg', 125, '2023-05-24', 19, 'Lorem ipsum........');

-- --------------------------------------------------------

--
-- Table structure for table `product_size_variation`
--

CREATE TABLE `product_size_variation` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size_variation`
--

INSERT INTO `product_size_variation` (`variation_id`, `product_id`, `size_id`, `stock_quantity`) VALUES
(42, 36, 15, -4),
(43, 37, 15, -2),
(44, 38, 15, 0),
(45, 39, 15, 3),
(46, 40, 15, 4),
(47, 42, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_desc` text NOT NULL,
  `review_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `product_id`, `review_desc`, `review_date`) VALUES
(4, 6, 36, 'Nice product', '2023-05-24'),
(6, 2, 36, 'Good product!', '2023-05-25'),
(7, 2, 36, 'This is an amazing product!', '2023-05-25'),
(8, 11, 37, 'I love this product!', '2023-05-25'),
(9, 7, 36, 'Hello! This is a nice product...', '2023-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`) VALUES
(15, 'Small'),
(16, 'Medium'),
(17, 'Large'),
(19, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `registered_at` date NOT NULL DEFAULT current_timestamp(),
  `contact_no` varchar(10) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `user_password`, `isAdmin`, `registered_at`, `contact_no`, `user_address`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$f6TwL5mGXbzGwZGLS7ZbV.TQ.nC2u6JgrnIS9uZElcXEODzXGGfsm', 1, '2022-03-10', '0420865127', 'Adelaide'),
(6, 'Matt', 'Matt123@gmail.com', '$2y$10$g5Cc9DNDnf9mvA2prUjoZOqfzmmFjNTfD5I4pYOMWM8Qu4/7xyO62', 1, '2023-05-24', '1234', 'Adelaide'),
(7, 'pettalks', 'dog123@gmail.com', '$2y$10$hiFybaHAvRKnHLYE.SkWnO5yERl2jKMlcdHZ1ICZy3C.h3oc3Ubwu', 0, '2023-05-24', '123', 'Adelaide'),
(8, 'Sandeep', 'thapasandeep661@gmail.com', '$2y$10$HHpczisOvX/7uqTFemHuNuGhPLR6LMHrzNxMLhhSivbjxD6ibgJlm', 0, '2023-05-24', '0420865127', '75 Hender Avenue, Klemzig, 5087'),
(9, 'lmak99', 'tmgkunshang69@gmail.com', '$2y$10$5s8GhSksD0vo.4xX49iGgOOMrhHJoN9PEm6RkWga1lzhCrGzGtoUa', 0, '2023-05-25', '1234', 'Adelaide'),
(10, 'sample', 'sample@gmail.com', '$2y$10$Tocee17D7AKJbPTqjSbo1Oed7QAVOq2kFCd.N422oA1QJ85pjz9WK', 0, '2023-05-25', '043421345', '75 Hender Avenue, Klemzig, 5087'),
(11, 'cat', 'cat123@gmail.com', '$2y$10$5gfIyiTI561w1IqknUSCm.W5Ft8wZ4IJEcJ1zXmsUG9MD.82LDY3m', 0, '2023-05-25', '1234', 'Adelaide');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `uc_uv` (`user_id`,`variation_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD UNIQUE KEY `uc_ps` (`product_id`,`size_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_size_variation` (`variation_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `product_size_variation`
--
ALTER TABLE `product_size_variation`
  ADD CONSTRAINT `product_size_variation_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_size_variation_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
