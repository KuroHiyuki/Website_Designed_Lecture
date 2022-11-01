-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 01, 2022 at 08:20 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ProductsId` int(100) NOT NULL,
  `ProductsName` varchar(100) NOT NULL,
  `ProductsCagetory` varchar(20) NOT NULL,
  `ProductsDetails` varchar(1000) NOT NULL,
  `ProductsPrice` int(100) NOT NULL,
  `ProductsImage` varchar(100) NOT NULL,
  `ProductsMadein` varchar(60) DEFAULT NULL,
  `ProductsExp` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ProductsId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductsId`, `ProductsName`, `ProductsCagetory`, `ProductsDetails`, `ProductsPrice`, `ProductsImage`, `ProductsMadein`, `ProductsExp`) VALUES
(0, 'Brown rice', 'Heathy foods', 'Brown rice is one of the whole grains, brown rice consists of bran fibers, rice germ and carbohydrate-rich endosperm.A whole grain and a good source of magnesium, phosphorus, vitamin B6,..., and manganese and does provide some fiber.\r\nBrown rice is one of the healthiest grains and reaps many health benefits. Regular intake of brown rice helps to improve blood vessel health, control weight, and nourish the skin from deep within. Nowadays, brown rice is often added to the diet because it is rich in nutrients but provides little energy. Compared to white rice and wheat, brown rice provides fewer calories but more fiber, vitamins, and quality. These portions will help you no longer and reduce your daily food intake.\r\n\r\nIn addition, brown rice contains low sugar, fat and energy, so it can reduce the accumulation of fatty tissue in the abdomen and support the weight loss process. In addition, brown rice does not contain gluten - a protein found in many other grains such as wheat and barley.', 29, 'images\\browrice.png', 'Viet Nam', '24 months'),
(1, 'Noodles', 'Heathy foods', 'Good for people with diabetes, overweight, create a feeling of fullness longer, support cholesterol control, reduces the risk of cancer, Promotes weight loss.\r\nEach type of dry vermicelli is modified from an ingredient with a color property, for example vermicelli made from a yellow ingredient. There are also vermicelli made from red brown rice, green moringa leaves, blue butterfly pea flowers, purple leaves, purple sweet potatoes, or gac fruit or mixed vermicelli from the above colors.', 35, 'images/noodle_4.png', 'Viet Nam', '24 months'),
(2, 'Granola', 'Healthy foods', 'Granola provides fiber mainly from oats and protein from nutritious nuts such as almonds, walnuts, macadamia nuts, pumpkin seeds...and imported dried fruits. Good for the digestive tract, blood pressure and heart.\r\nIngredients: 7 nuts\r\nExpiry date: 6 months from date of manufacture, no preservatives used. (Date is always new because products are imported continuously).\r\nOrigin: Imported from USA\r\nInstructions for use: Eat directly, use as a salad, good for pregnant women.\r\nStorage Instructions: Store in a cool, dry place, under normal conditions, away from direct light. After tearing the product packaging, should cover the product or put it in the refrigerator.\r\nWeight: 500g', 35, 'images/granola_3.png', 'Viet Nam', '24 months'),
(3, 'Ingrendient', 'Heathy foods', 'We provide color additives, food additives, sweeteners, preservatives and so on. Healthyfood is specialized in supply food additives and ingredients\r\nExtra Virgin Olive Oil - 100% Olive oil imported from Spain.\r\n* Extracted from the best standard olives according to modern European cold pressing technology.\r\n* Maximum retention of antioxidants Vitamin A, E to help prevent the aging process, good for skin and hair, smooth skin, restore damaged hair.', 19, 'images/ingredient_4.jpg', 'Viet Nam', '24 months');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `UserId` int(100) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserPhone` varchar(10) DEFAULT NULL,
  `UserBirthday` date DEFAULT NULL,
  `UserImage` varchar(100) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserId`, `UserName`, `UserEmail`, `UserPassword`, `UserPhone`, `UserBirthday`, `UserImage`) VALUES
(1, 'Phương', '030236200121@st.buh.edu.vn', '123456', '0909090909', '2002-09-02', 'images\\pic-1.png'),
(2, 'Quỳnh', '030236200131@st.buh.edu.vn', 'quynhcute', '0123456789', '2002-05-26', 'images\\pic-2.png'),
(3, 'Huyền', '030236200061@st.buh.edu.vn', 'huyenne', '0909080707', '2002-11-10', 'images\\pic-3.png'),
(4, 'Trang', '030236200180@st.buh.edu.vn', 'trangday', '0906060505', '2002-10-08', 'images\\pic-4.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
