-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2023 at 07:13 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ArtByYou`
--

-- --------------------------------------------------------

--
-- Table structure for table `About`
--

CREATE TABLE `About` (
  `AboutID` int(11) NOT NULL,
  `HomePage` text NOT NULL,
  `Story` text NOT NULL,
  `AboutImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `About`
--

INSERT INTO `About` (`AboutID`, `HomePage`, `Story`, `AboutImage`) VALUES
(1, 'A community of artists coming together to share personal work and consignment pieces for the general public. Do you have what it takes?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.', 'files/about/allArt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Artists`
--

CREATE TABLE `Artists` (
  `ArtistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ArtistImage` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Artists`
--

INSERT INTO `Artists` (`ArtistID`, `Name`, `ArtistImage`, `Type`, `Description`) VALUES
(1, 'Joe Anderson', 'files/artists/joe.jpg', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque consequat mauris facilisis porta egestas. Mauris quis elementum est, eu vestibulum mi. Quisque hendrerit enim viverra cursus consectetur. Quisque porta semper placerat. Donec nec mi quis nunc blandit imperdiet nec sed augue. Mauris tempus odio nec purus elementum facilisis. Mauris nulla orci, placerat at condimentum eget, tempus quis ante. Nulla non orci eget arcu dapibus scelerisque. Sed consequat mauris non enim tristique egestas.'),
(2, 'Pete Sanderson', 'files/artists/pete.jpg', 'Animal lover', 'Integer suscipit quis odio eget porttitor. Fusce sit amet aliquet velit. Integer et turpis consequat, pharetra nulla id, dignissim arcu. Vestibulum finibus odio non fringilla dignissim. Mauris eu laoreet velit. Nam sit amet eros a orci rhoncus fringilla sed vel ipsum. Etiam vehicula urna id purus aliquam lacinia. Nunc faucibus sit amet nulla auctor auctor. Morbi facilisis scelerisque porttitor. Aliquam molestie augue vel mi consectetur, sit amet auctor turpis gravida. Aenean mollis nisl vitae libero elementum cursus. '),
(3, 'Mary Major', 'files/artists/mary.jpg', 'Photographer', 'Donec tincidunt, dolor ultrices dignissim maximus, sem ex auctor nisi, a sollicitudin purus augue vel nibh. Proin aliquet nisi sagittis faucibus dictum. Maecenas consequat, lectus eu hendrerit vestibulum, mi sapien dignissim lacus, eu convallis nisl mi quis dui. Donec ac pulvinar metus, in mattis mauris. Suspendisse finibus iaculis turpis at ornare. Ut aliquam tellus at ipsum ultrices aliquet. Suspendisse vulputate eros quis nisi viverra, sit amet scelerisque nisi commodo. Sed et convallis massa. Nulla eget augue vel massa eleifend molestie tincidunt porttitor tellus. '),
(4, 'Sue Kass', 'files/artists/sue.jpg', 'Pottery', 'Aliquam arcu nulla, dignissim ac malesuada ac, suscipit ac leo. Etiam et aliquet orci. Donec varius ac nunc vitae placerat. In tellus augue, sodales ut magna in, vulputate scelerisque ligula. Suspendisse sagittis tincidunt diam, non cursus purus lacinia at. Mauris lacus ante, accumsan in laoreet vitae, gravida ut libero. Fusce vestibulum elit sit amet mauris ornare tempor. Nulla sed porta dui. Nam posuere eros odio, sed dignissim ligula condimentum ut.'),
(5, 'Tina Vax', 'files/artists/tina.jpg', 'Pottery', 'Sed non feugiat arcu. Fusce risus augue, ultricies hendrerit aliquam sit amet, hendrerit sed augue. Curabitur facilisis semper congue. Nunc eu urna viverra, imperdiet elit in, luctus lacus. Nullam ullamcorper pharetra ultrices. Integer fermentum, ligula at lacinia lobortis, arcu mi tincidunt ipsum, eu dapibus nulla lectus sed odio. Donec faucibus pulvinar posuere. Donec tincidunt est vel metus suscipit, eget elementum lectus lobortis.'),
(6, 'Alan Doyle', 'files/artists/alan.jpg', 'Photographer', 'Etiam vehicula urna id purus aliquam lacinia. Nunc faucibus sit amet nulla auctor auctor. Morbi facilisis scelerisque porttitor. Aliquam molestie augue vel mi consectetur, sit amet auctor turpis gravida. Aenean mollis nisl vitae libero elementum cursus. Aliquam venenatis massa consequat feugiat ultricies. Nunc non tincidunt velit, sit amet varius orci. Proin ac tincidunt ligula. Nam fringilla iaculis commodo. Ut non purus sem.'),
(7, 'Carl Palmer', 'files/artists/carl.jpg', 'Textiles', 'Quisque porta semper placerat. Donec nec mi quis nunc blandit imperdiet nec sed augue. Mauris tempus odio nec purus elementum facilisis. Mauris nulla orci, placerat at condimentum eget, tempus quis ante. Nulla non orci eget arcu dapibus scelerisque. Sed consequat mauris non enim tristique egestas. Praesent fringilla ipsum mollis, convallis mi vitae, tincidunt sem. Vivamus nunc purus, volutpat nec viverra in, dictum vel leo. Sed magna nisi, dignissim euismod malesuada quis, hendrerit eget ante.'),
(8, 'Jane Lester', 'files/artists/jane.jpg', 'Painter', 'Ut aliquam tellus at ipsum ultrices aliquet. Suspendisse vulputate eros quis nisi viverra, sit amet scelerisque nisi commodo. Sed et convallis massa. Nulla eget augue vel massa eleifend molestie tincidunt porttitor tellus. Vestibulum luctus ultrices enim in facilisis. Proin sed turpis consequat, volutpat turpis et, molestie odio. Vivamus lectus justo, sodales elementum mi sit amet, imperdiet auctor mauris. Etiam luctus nibh quam, ac vestibulum eros facilisis vitae. Pellentesque ac dictum arcu. Etiam pretium, tortor fringilla porttitor scelerisque, magna risus cursus massa, et congue augue ligula in metus.');

-- --------------------------------------------------------

--
-- Table structure for table `Artwork`
--

CREATE TABLE `Artwork` (
  `ArtID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ArtImage` varchar(50) NOT NULL,
  `ThemeID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Artwork`
--

INSERT INTO `Artwork` (`ArtID`, `Title`, `ArtImage`, `ThemeID`, `ArtistID`) VALUES
(1, 'Arctic Fox', 'files/Animals/ArcticFox.jpg', 1, 2),
(2, 'Bird Family', 'files/Animals/BirdFamily.jpg', 1, 2),
(3, 'Flying Away', 'files/Animals/FlyingAway.jpg', 1, 6),
(4, 'Reindeer Dog', 'files/Animals/ReindeerDog.jpg', 1, 2),
(5, 'Swan On River', 'files/Animals/SwanOnRiver.jpg', 1, 6),
(6, 'Floral', 'files/Flowers/Floral.jpg', 4, 3),
(7, 'Orange Bundle', 'files/Flowers/OrangeBundle.jpg', 4, 1),
(8, 'Purple Haze', 'files/Flowers/PurpleHaze.jpg', 4, 1),
(9, 'Sunflower Painting', 'files/Flowers/SunflowerPainting.jpg', 4, 8),
(10, 'Yellow Flowers', 'files/Flowers/YellowFlowers.jpg', 4, 3),
(11, 'Yellow Flowers 2', 'files/Flowers/YellowFlowers2.jpg', 4, 3),
(12, 'Avocado Toast', 'files/Food/AvocadoToast.jpg', 3, 1),
(13, 'Croissant', 'files/Food/Croissant.jpg', 3, 3),
(14, 'Spicy Meal', 'files/Food/SpicyMeal.jpg', 3, 3),
(15, 'Sweet Tooth', 'files/Food/SweetTooth.jpg', 3, 1),
(16, 'Truffles', 'files/Food/Truffles.jpg', 3, 1),
(17, 'Bowls', 'files/Pottery/Bowls.jpg', 5, 4),
(18, 'Cups', 'files/Pottery/Cups.jpg', 5, 4),
(19, 'Miniature Cups', 'files/Pottery/MinatureCups.jpg', 5, 4),
(20, 'Pots', 'files/Pottery/Pots.jpg', 5, 5),
(21, 'Vases', 'files/Pottery/Vases.jpg', 5, 5),
(22, 'Bracelets', 'files/Textiles/Bracelets.jpg', 2, 7),
(23, 'Bracelets2', 'files/Textiles/Bracelets2.jpg', 2, 7),
(24, 'Fabric', 'files/Textiles/Fabric.jpg', 2, 7),
(25, 'Saree', 'files/Textiles/Saree.jpg', 2, 7),
(26, 'Sweater', 'files/Textiles/Sweater.jpg', 2, 7),
(27, 'Kayak', 'files/Water/Kayak.jpg', 6, 6),
(28, 'On The Shore', 'files/Water/OnTheShore.jpg', 6, 8),
(29, 'Orca', 'files/Water/Orca.jpg', 6, 2),
(30, 'Sail Boat', 'files/Water/SailBoat.jpg', 6, 3),
(31, 'Stones By The Shore', 'files/Water/StonesByTheShore.jpg', 6, 6),
(32, 'Underwater', 'files/Water/Underwater.jpg', 6, 8),
(37, 'Dog', 'files/Animals/Dog.jpg', 1, 2),
(38, 'Shark', 'files/Water/Shark.jpg', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Signin`
--

CREATE TABLE `Signin` (
  `UserID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Themes`
--

CREATE TABLE `Themes` (
  `ThemeID` int(11) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `ThemeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Themes`
--

INSERT INTO `Themes` (`ThemeID`, `Theme`, `ThemeImage`) VALUES
(1, 'Animals', 'files/Animals/SwanOnRiver.jpg'),
(2, 'Textiles', 'files/Textiles/Saree.jpg'),
(3, 'Food', 'files/Food/AvocadoToast.jpg'),
(4, 'Flowers', 'files/Flowers/PurpleHaze.jpg'),
(5, 'Pottery ', 'files/Pottery/Pots.jpg'),
(6, 'Water', 'files/Water/Underwater.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `About`
--
ALTER TABLE `About`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `Artists`
--
ALTER TABLE `Artists`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `Artwork`
--
ALTER TABLE `Artwork`
  ADD PRIMARY KEY (`ArtID`),
  ADD KEY `fk_artists` (`ArtistID`),
  ADD KEY `fk_themes` (`ThemeID`);

--
-- Indexes for table `Signin`
--
ALTER TABLE `Signin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `fk_ArtistID` (`ArtistID`);

--
-- Indexes for table `Themes`
--
ALTER TABLE `Themes`
  ADD PRIMARY KEY (`ThemeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `About`
--
ALTER TABLE `About`
  MODIFY `AboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Artists`
--
ALTER TABLE `Artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Artwork`
--
ALTER TABLE `Artwork`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Signin`
--
ALTER TABLE `Signin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Themes`
--
ALTER TABLE `Themes`
  MODIFY `ThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Artwork`
--
ALTER TABLE `Artwork`
  ADD CONSTRAINT `fk_artists` FOREIGN KEY (`ArtistID`) REFERENCES `Artists` (`ArtistID`),
  ADD CONSTRAINT `fk_themes` FOREIGN KEY (`ThemeID`) REFERENCES `Themes` (`ThemeID`);

--
-- Constraints for table `Signin`
--
ALTER TABLE `Signin`
  ADD CONSTRAINT `fk_ArtistID` FOREIGN KEY (`ArtistID`) REFERENCES `Artists` (`ArtistID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
