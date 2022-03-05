-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 12:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flickr_cache`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_cache`
--

CREATE TABLE `image_cache` (
  `image_id` int(11) NOT NULL,
  `id` varchar(1024) NOT NULL,
  `owner` varchar(1024) NOT NULL,
  `secret` varchar(1024) NOT NULL,
  `server` varchar(1024) NOT NULL,
  `farm` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `ispublic` int(11) NOT NULL,
  `isfriend` int(11) NOT NULL,
  `isfamily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_cache`
--

INSERT INTO `image_cache` (`image_id`, `id`, `owner`, `secret`, `server`, `farm`, `title`, `ispublic`, `isfriend`, `isfamily`) VALUES
(1, '51910289619', '136489517@N02', '448e94160f', '65535', 66, '87 002', 1, 0, 0),
(2, '51909002942', '136489517@N02', '7c2384ce80', '65535', 66, '11077', 1, 0, 0),
(3, '51909972211', '136489517@N02', '38ce116df6', '65535', 66, '11091', 1, 0, 0),
(4, '51909997071', '36844288@N00', '75587ca9b8', '65535', 66, 'The City of Birmingham and its surroundings : photographic album : nd [c1930]', 1, 0, 0),
(5, '51910074308', '39415781@N06', '2e182c720c', '65535', 66, 'Sir Antony Gormley\'s Iron: Man returns to Victoria Square', 1, 0, 0),
(6, '51908920342', '39415781@N06', '5cc583d828', '65535', 66, 'Sir Antony Gormley\'s Iron: Man returns to Victoria Square', 1, 0, 0),
(7, '51910206059', '39415781@N06', '9a44c658b2', '65535', 66, 'Sir Antony Gormley\'s Iron: Man returns to Victoria Square', 1, 0, 0),
(8, '51908920337', '39415781@N06', '652417a105', '65535', 66, 'Sir Antony Gormley\'s Iron: Man returns to Victoria Square', 1, 0, 0),
(9, '51909887791', '39415781@N06', '58969f7745', '65535', 66, 'Stand with Ukraine - Hill Street, Birmingham', 1, 0, 0),
(10, '51909124171', '38940360@N08', '5855c7a71c', '65535', 66, 'Perry Hall Park', 1, 0, 0),
(11, '51909098077', '26064072@N03', '6245d3dec2', '65535', 66, '2020 Grapes', 1, 0, 0),
(12, '51910061446', '26064072@N03', '903382f5ba', '65535', 66, '2020 Eastern Yellow Jacket (Vespula maculifrons) 2', 1, 0, 0),
(13, '51910017626', '26064072@N03', 'cc92948e5c', '65535', 66, '2020 Japanese Beetle (Popilla japonica) 3', 1, 0, 0),
(14, '51910629490', '26064072@N03', '48d1d1c862', '65535', 66, '2020 Orange Coneflower 3', 1, 0, 0),
(15, '51910629080', '26064072@N03', '6d01ec9c73', '65535', 66, '2020 Orange Coneflower 4', 1, 0, 0),
(16, '51909040792', '26064072@N03', '7894c44ae4', '65535', 66, '2020 Orange Coneflower 6', 1, 0, 0),
(17, '51909351631', '62285769@N00', '33be512fc2', '65535', 66, 'Chicago, South Grant Park, Garden, Looking North', 1, 0, 0),
(18, '51909462620', '11762120@N03', '91ecc48f23', '0', 0, 'MVI_0107', 1, 0, 0),
(19, '51909475115', '11762120@N03', '06ca55d789', '65535', 66, 'IMG_0020', 1, 0, 0),
(20, '51907873122', '11762120@N03', 'a144053400', '65535', 66, 'IMG_0052', 1, 0, 0),
(21, '51910279729', '136489517@N02', 'de9e3b4520', '65535', 66, 'Electric Memories', 1, 0, 0),
(22, '51910614045', '36844288@N00', '494b0814af', '65535', 66, 'The City of Birmingham and its surroundings : photographic album : nd [c1930] The Council House and The Town Hall', 1, 0, 0),
(23, '51910439788', '23566764@N04', 'ac5c28286c', '65535', 66, 'Railroad Underpass', 1, 0, 0),
(24, '51910859190', '146321178@N05', '5e22c4cbc5', '65535', 66, 'Chicago River, Wacker Drive', 1, 0, 0),
(25, '51912373601', '119605695@N07', '49e7f786ed', '65535', 66, 'ceefax 2015 26-02-2022 1', 1, 0, 0),
(26, '51912313238', '54799099@N00', '16149c6715', '65535', 66, 'Commonwealth Games 2022 Cultural Programme Launch - UB40', 1, 0, 0),
(27, '51912832700', '54799099@N00', '414ce29c6f', '65535', 66, 'Commonwealth Games 2022 Cultural Programme Launch - UB40 Blur', 1, 0, 0),
(28, '51912532529', '54799099@N00', 'cb8eaeb694', '65535', 66, 'Commonwealth Games 2022 Cultural Programme Launch - 4', 1, 0, 0),
(29, '51912832285', '54799099@N00', '83e1012f18', '65535', 66, 'Commonwealth Games 2022 Cultural Programme Launch - 3', 1, 0, 0),
(30, '51912213846', '54799099@N00', '582be0cefb', '65535', 66, 'Commonwealth Games 2022 Cultural Programme Launch - 1', 1, 0, 0),
(31, '51911153832', '30649408@N00', '2467df1e3a', '65535', 66, 'Around Lichfield, Staffordshire.', 1, 0, 0),
(32, '51911153792', '30649408@N00', '09966eed9d', '65535', 66, 'Around Lichfield, Staffordshire.', 1, 0, 0),
(33, '51912739455', '30649408@N00', 'b305d5dfb6', '65535', 66, 'Around Lichfield, Staffordshire.', 1, 0, 0),
(34, '51912217573', '30649408@N00', '4689c166c2', '65535', 66, 'Around Lichfield, Staffordshire.', 1, 0, 0),
(35, '51911398482', '23566764@N04', 'df8bf0ff03', '65535', 66, 'Former Pumping Station', 1, 0, 0),
(36, '51911911628', '33922643@N07', '0c6c7a2930', '65535', 66, 'untitled', 1, 0, 0),
(37, '51911747033', '23566764@N04', '91987123b1', '65535', 66, 'China Club Lofts', 1, 0, 0),
(38, '51912265120', '23566764@N04', '63a5dd7f56', '65535', 66, 'Railroad Tracks', 1, 0, 0),
(39, '51911746573', '23566764@N04', '6f2eed47cb', '65535', 66, 'Amtrak', 1, 0, 0),
(40, '51910197122', '94114564@N08', '45e46a5c7d', '65535', 66, 'Brent Move in Dallas', 1, 0, 0),
(41, '51911216854', '81217355@N00', '95d45ab6dd', '65535', 66, 'The \"El\"', 1, 0, 0),
(42, '51911135709', '76677346@N04', '7d935156de', '65535', 66, 'Indian Hill & Iron Range 5293 1950\'s', 1, 0, 0),
(43, '51910728628', '57328753@N04', '554a47788f', '65535', 66, '2021-12-18_23.51.40_1431', 1, 0, 0),
(44, '51909636502', '54623838@N06', '67ac9a4648', '65535', 66, 'Evan_McIntosh_2', 1, 0, 0),
(45, '51911406907', '119605695@N07', '702e47cbd9', '65535', 66, 'ceefax 2015 26-02-2022 2', 1, 0, 0),
(46, '51912831965', '54799099@N00', '5e46d71681', '65535', 66, 'Commonwealth Games 2022 Cultural Programme Launch - 2', 1, 0, 0),
(47, '51911221905', '54623838@N06', '9520b2af9a', '65535', 66, 'Evan_McIntosh_4', 1, 0, 0),
(48, '51910698203', '54623838@N06', '5ddc18ae1f', '65535', 66, 'The_Marias_8', 1, 0, 0),
(49, '51912438469', '30649408@N00', '3568a435b0', '65535', 66, 'Around Lichfield, Staffordshire.', 1, 0, 0),
(50, '51912217518', '30649408@N00', '366b70eed0', '65535', 66, 'Around Lichfield, Staffordshire.', 1, 0, 0),
(51, '51911153702', '30649408@N00', '6f28ec5226', '65535', 66, 'Around Lichfield, Staffordshire.', 1, 0, 0),
(52, '51912539373', '184891495@N03', '5bdee943e4', '65535', 66, '2022 Midwinter Meeting, President’s Dinner, February 26, 2022', 1, 0, 0),
(53, '51912608143', '184891495@N03', 'f8f9a04124', '65535', 66, '2022 Installation of Officers event, November 14, 2021', 1, 0, 0),
(54, '51912495686', '184891495@N03', '22b72e93bf', '65535', 66, '2022 Midwinter Meeting, President’s Dinner, February 26, 2022', 1, 0, 0),
(55, '51912495266', '184891495@N03', '3e3fcbb820', '65535', 66, '2022 Midwinter Meeting, President’s Dinner, February 26, 2022', 1, 0, 0),
(56, '51913080400', '184891495@N03', '72ea83bcc7', '65535', 66, '2022 Midwinter Meeting, President’s Dinner, February 26, 2022', 1, 0, 0),
(57, '51911491882', '184891495@N03', 'be5049bc4b', '65535', 66, '024-WisconsinBreakfast-022422.JPG', 1, 0, 0),
(58, '51913100310', '23766806@N00', '16f0bbcec2', '65535', 66, '02 - Moving about Birmingham', 1, 0, 0),
(59, '51913571013', '194080303@N04', 'd6eeb0bcc5', '65535', 66, 'West Midlands Police/Central Motorway Police Group BMW 330d, BX18 GZG (MW07).', 1, 0, 0),
(60, '51913795564', '194080303@N04', '27522e6242', '65535', 66, 'West Midlands Police BMW 330d, BX19 GKC (OPS200).', 1, 0, 0),
(61, '51913795409', '194080303@N04', '81f3160bb5', '65535', 66, 'West Midlands Police unmarked Vauxhall Corsa.', 1, 0, 0),
(62, '51913475486', '194080303@N04', '07d3e952f5', '65535', 66, 'Brand New West Midlands Police unmarked BMW 330d.', 1, 0, 0),
(63, '51913533459', '67570007@N08', 'ff2471db2d', '65535', 66, '', 1, 0, 0),
(64, '51913038849', '11086755@N00', 'c2596d557b', '65535', 66, 'Sumo oranges', 1, 0, 0),
(65, '51913570873', '194080303@N04', '3856a792f5', '65535', 66, 'West Midlands Police BMW 330d, AK16 ZRU (OPS18).', 1, 0, 0),
(66, '51914747047', '195058044@N02', 'c1a4b4f4e1', '65535', 66, 'Grand Central Networker', 1, 0, 0),
(67, '51914354887', '38940360@N08', '52395c1eff', '65535', 66, 'Tunnel at Livery Street', 1, 0, 0),
(68, '51915330473', '188340410@N03', 'e453a1d271', '65535', 66, 'Hair Removal Birmingham', 1, 0, 0),
(69, '51914791544', '16022034@N00', '18dbf47d85', '65535', 66, 'Chester Road, Erdington', 1, 0, 0),
(70, '51913504887', '16022034@N00', '184e7b4b1d', '65535', 66, 'Redcroft Drive, Erdington', 1, 0, 0),
(71, '51914791459', '16022034@N00', 'd081bb3fef', '65535', 66, 'Orphanage Road, Erdington', 1, 0, 0),
(72, '51914468396', '16022034@N00', 'db0ac8a731', '65535', 66, 'Holly Lane, Erdington', 1, 0, 0),
(73, '51914566483', '16022034@N00', '3a06bb2d4b', '65535', 66, 'Burnbank Grove, Erdington', 1, 0, 0),
(74, '51914989080', '131021490@N02', '402dd6bc2f', '65535', 66, 'Trolleybuses', 1, 0, 0),
(75, '51914571584', '54799099@N00', '519b06b4fb', '65535', 66, 'Extreme Covid Protection - 2', 1, 0, 0),
(76, '51914045882', '29819061@N00', '8914a333fa', '65535', 66, 'In Between Seasons', 1, 0, 0),
(77, '51916245240', '102448676@N08', '7c2235bfd1', '65535', 66, 'NS 4053 West', 1, 0, 0),
(78, '51915616123', '62285769@N00', '2e72c1f829', '65535', 66, 'Chicago Cultural Center, Sculpture', 1, 0, 0),
(79, '51915446971', '187302606@N08', 'd0fbe7aacf', '65535', 66, 'CHICAGO RIVER #2', 1, 0, 0),
(80, '51915145499', '27039089@N08', '4db262563a', '65535', 66, 'BRAT', 1, 0, 0),
(81, '51914302606', '161651075@N07', '6b8b7a9a1a', '65535', 66, 'DSC_0215', 1, 0, 0),
(82, '51913992136', '14136614@N03', '53127baf66', '65535', 66, 'SYKE', 1, 0, 0),
(83, '51913659903', '62285769@N00', 'c8ecd7a323', '65535', 66, 'Chicago, Garfield Park Conservatory, Ferns', 1, 0, 0),
(84, '51916552314', '36844288@N00', '05f1fbb63c', '65535', 66, 'Tradition and modernity in metalwork : Sir Lawrence Weaver : Birmingham Guild Ltd., Birmingham, UK : nd : c1928', 1, 0, 0),
(85, '51916390604', '80500956@N07', '7317692ee4', '65535', 66, 'World Peace', 1, 0, 0),
(86, '51915752569', '7889951@N07', 'f205cb4967', '65535', 66, 'Gorilla Riot', 1, 0, 0),
(87, '51916046545', '7889951@N07', 'd3d9b6aebb', '65535', 66, 'Doomsday Outlaw', 1, 0, 0),
(88, '51914566538', '16022034@N00', '9873664b26', '65535', 66, 'Silver Birch Road, Erdington', 1, 0, 0),
(89, '51916275013', '21929276@N02', '897ba40caa', '65535', 66, 'Rollin Rec', 1, 0, 0),
(90, '51915939536', '14136614@N03', 'e6c6e47958', '65535', 66, 'Guardian by Ava Grey', 1, 0, 0),
(91, '51915955754', '102448676@N08', '736165fd85', '65535', 66, 'NS 7574 East', 1, 0, 0),
(92, '51916521278', '83631655@N00', 'f80c7cafc0', '65535', 66, 'F-GSTD', 1, 0, 0),
(93, '51916962685', '157211248@N02', 'ff1e1e0c81', '65535', 66, 'Running Round at New Street.', 1, 0, 0),
(94, '51915364532', '157211248@N02', '93a000dd94', '65535', 66, 'Leaving New Street.', 1, 0, 0),
(95, '51916632924', '157211248@N02', '231e55ca2f', '65535', 66, 'Sunday  Birmingham New Street 1977.', 1, 0, 0),
(96, '51916046635', '7889951@N07', '3f5da752e0', '65535', 66, 'Voodoo Sioux', 1, 0, 0),
(97, '51916682649', '96739609@N00', '8fef0a8056', '65535', 66, 'Reds @ Cubs 9-2-1988', 1, 0, 0),
(98, '51915575201', '39415781@N06', '25e351ec84', '65535', 66, 'Iron: Man and the Town Hall in Victoria Square', 1, 0, 0),
(99, '51916526228', '14136614@N03', '2e0e619c29', '65535', 66, 'Rahmaan Statik', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_cache`
--
ALTER TABLE `image_cache`
  ADD PRIMARY KEY (`image_id`),
  ADD UNIQUE KEY `id` (`id`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_cache`
--
ALTER TABLE `image_cache`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
