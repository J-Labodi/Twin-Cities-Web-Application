-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: dsa_twincities
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (123,'Museum '),(124,'Airport'),(125,'Theatre '),(126,'Stadium');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `city_id` int NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city_geo_lat` float NOT NULL,
  `city_geo_long` float NOT NULL,
  `area_km` float(4,1) NOT NULL,
  `population` int NOT NULL,
  `gdp_in_usd` bigint NOT NULL,
  `currency` tinytext NOT NULL,
  `language` varchar(50) NOT NULL,
  `time_zone` tinytext NOT NULL,
  `max_temp` tinyint NOT NULL,
  `min_temp` tinyint NOT NULL,
  `asml` bigint NOT NULL,
  `city_website_link` varchar(2000) NOT NULL,
  `city_image_link` varchar(2000) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1111,'Birmingham','England','West Midlands',52.4945,-1.88767,267.8,1149000,121100000000,'GBP','English','GMT',42,-21,140,'https://en.wikipedia.org/wiki/Birmingham\r\n','https://www.visitbritain.com/sites/default/files/consumer/paragraphs-bundles/image-header-with-text/view_over_birmingham_city_centre_at_dusk_vb34156177.jpg'),(2222,'Chicago','United States','Illinois',41.8978,-87.6249,606.1,2746388,618600000000,'USD\r\n','English','CST\r\n',41,-27,182,'https://en.wikipedia.org/wiki/Chicago \r\n','https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/2008-06-10_3000x1000_chicago_skyline.jpg/1200px-2008-06-10_3000x1000_chicago_skyline.jpg');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image` (
  `image_id` int NOT NULL,
  `image_description` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `city_id` int NOT NULL,
  `place_id` int NOT NULL,
  `Image_link` varchar(2000) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (99983,'picture of The Logan Theatre','The Logan Theatre',2222,117,'https://pbs.twimg.com/profile_images/1120414020/IMG00041-20100726-0906_400x400.jpg'),(99984,'picture of Regal Webster Place','Regal Webster Place',2222,116,'https://fastly.4sqi.net/img/general/600x600/38289314_K7mc-RGt6vGSf0i00pY0p3MHxHGwiOqKRzu05uuIjKU.jpg'),(99985,'picture of AMC River East 21','AMC River East 21',115,2222,'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/O%27Hare_from_ISS_12-06-2019.jpg/375px-O%27Hare_from_ISS_12-06-2019.jpg'),(99986,'picture of ODEON Broadway Plaza','ODEON Broadway Plaza',1111,114,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMn5E-OpWJRS-_n1FbduenER5hSmiuFIkRmA&usqp=CAU'),(99987,'picture of Cineworld Cinema','Cineworld Cinema',1111,113,'https://filmbirmingham.co.uk/wp-content/uploads/2020/06/cineworld.jpg'),(99988,'picture of Electric Cinema','Electric Cinema',1111,112,'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/ElectricCinema.jpg/270px-ElectricCinema.jpg'),(99989,'picture of Wrigley Field','Wrigley Field',2222,111,'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Wrigley_Field_2018_-_42195054760.jpg/300px-Wrigley_Field_2018_-_42195054760.jpg'),(99990,'picture of United Centre','United Centre',2222,110,'https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/United_Center_pano.jpg/300px-United_Center_pano.jpg\r\n'),(99991,'picture of St Andrew\'s Stadium','St Andrew\'s Stadium',1111,109,'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/TiltonRoadEnd01.JPG/250px-TiltonRoadEnd01.JPG'),(99992,'picture of Villa Park Stadium','Villa Park Stadium',1111,107,'https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Villa_Park.jpg/300px-Villa_Park.jpg'),(99993,'picture of Midway International Airport','Midway International Airport',2222,107,'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Midway_Airport_Airfield.jpg/220px-Midway_Airport_Airfield.jpg'),(99994,'picture of O\'Hare International Airport','O\'Hare International Airport',2222,106,'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/O%27Hare_from_ISS_12-06-2019.jpg/375px-O%27Hare_from_ISS_12-06-2019.jpg'),(99995,'picture of Field Museum\r\n','Field Museum\r\n',2222,105,'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Field_Museum_of_Natural_History.jpg/300px-Field_Museum_of_Natural_History.jpg'),(99996,'picture of Chicago History Museum','Chicago History Museum',2222,104,'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Chicago_History.JPG/220px-Chicago_History.JPG'),(99997,'picture of Birmingham Museum and Art Gallery','Birmingham Museum and Art Gallery',1111,102,'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Birmingham_Museum_and_Art_Gallery_from_the_Central_Library.jpg/220px-Birmingham_Museum_and_Art_Gallery_from_the_Central_Library.jpg'),(99998,'picture of Thinktank museum ','Thinktank',1111,101,'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Thinktank_Science_Garden.jpg/220px-Thinktank_Science_Garden.jpg'),(99999,'picture of Birmingham Airport','Birmingham Airport',1111,103,'https://djx5h8pabpett.cloudfront.net/wp-content/uploads/sites/4/2020/01/28132647/1_The-main-entrance-at-Birmingham-Airport.jpg');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place_has_catergory`
--

DROP TABLE IF EXISTS `place_has_catergory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `place_has_catergory` (
  `place_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place_has_catergory`
--

LOCK TABLES `place_has_catergory` WRITE;
/*!40000 ALTER TABLE `place_has_catergory` DISABLE KEYS */;
INSERT INTO `place_has_catergory` VALUES (101,123),(102,123),(103,124),(104,123),(105,123),(106,124),(107,124),(108,126),(109,126),(110,126),(111,126),(112,125),(113,125),(114,125),(115,125),(116,125),(117,125);
/*!40000 ALTER TABLE `place_has_catergory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poi`
--

DROP TABLE IF EXISTS `poi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poi` (
  `place_id` int NOT NULL,
  `city_id` int NOT NULL,
  `capacity` int DEFAULT NULL,
  `poi_geo_lat` float NOT NULL,
  `poi_geo_long` float NOT NULL,
  `name` varchar(50) NOT NULL,
  `established` date NOT NULL,
  `poi_description` varchar(1024) NOT NULL,
  `poi_website_link` varchar(2000) NOT NULL,
  `image_link` varchar(2000) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poi`
--

LOCK TABLES `poi` WRITE;
/*!40000 ALTER TABLE `poi` DISABLE KEYS */;
INSERT INTO `poi` VALUES (101,1111,NULL,52.4825,-1.88733,'Thinktank','2001-02-01','Thinktank, Birmingham (formerly known as simply Thinktank) is a science museum in Birmingham, England. Opened in 2001, it is part of Birmingham Museums Trust and is located within the Millennium Point complex on Curzon Street, Digbeth','maps-redirect/thinktank-museum.html','https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Thinktank_Science_Garden.jpg/220px-Thinktank_Science_Garden.jpg'),(102,1111,NULL,52.4801,-1.90345,'Birmingham Museum and Art Gallery','1885-02-01','Birmingham Museum and Art Gallery is a museum and art gallery in Birmingham, England. It has a collection of international importance covering fine art, ceramics, metalwork, jewellery, natural history, archaeology, ethnography, local history and industrial history. The museum/gallery is run by Birmingham Museums Trust, the largest independent museums trust in the United Kingdom, which also runs eight other museums around the city. Entrance to the Museum and Art Gallery is free, but some major exhibitions in the Gas Hall incur an entrance fee.','maps-redirect/birmingham-museum-art-gallery.html','https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Birmingham_Museum_and_Art_Gallery_from_the_Central_Library.jpg/220px-Birmingham_Museum_and_Art_Gallery_from_the_Central_Library.jpg'),(103,1111,NULL,52.4537,-1.73239,'Birmingham Airport','1939-02-01','Birmingham Airport (IATA: BHX, ICAO: EGBB), formerly Birmingham International Airport, is an international airport located 7 nautical miles (13 km; 8.1 mi) east-southeast of Birmingham city centre, 9.5 nautical miles (17.6 km; 10.9 mi) west-northwest of Coventry slightly north of Bickenhill village in the Metropolitan Borough of Solihull, England. Officially opened as Elmdon Airport on 8 July 1939, the airport was requisitioned by the Air Ministry during Second World War and used by both the Royal Air Force (RAF) and the Royal Navy as RAF Elmdon. It was largely used for flight training and wartime production purposes.','maps-redirect/birmingham-airport.html','https://djx5h8pabpett.cloudfront.net/wp-content/uploads/sites/4/2020/01/28132647/1_The-main-entrance-at-Birmingham-Airport.jpg'),(104,2222,NULL,41.9117,-87.6316,'Chicago History Museum','1856-02-01','Much of the Chicago Historical Society\'s first collection was destroyed in the Great Chicago Fire in 1871, but the museum rose from the ashes like the city. Among its many documents which were lost in the fire was Abraham Lincoln\'s final draft of the Emancipation Proclamation. After the fire, the Society began collecting new materials, which were stored in a building owned by J. Young Scammon, a prominent lawyer and member of the society. However, the building and new collection were again destroyed by fire in 1874. The Chicago Historical Society built a fireproof building on its pre-1871 building-site at 632 North Dearborn Street. The replacement building opened in 1896 and housed the society for thirty-six years.','maps-redirect/chicago-history-museum.html','https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Chicago_History.JPG/220px-Chicago_History.JPG'),(105,2222,NULL,41.8661,-87.617,'Field Museum ','1893-02-01','The Field Museum of Natural History (FMNH), also known as The Field Museum, is a natural history museum in Chicago, Illinois, and is one of the largest such museums in the world. The museum is a popular natural-history museum for the size and quality of its educational and scientific programs, as well as due to its extensive scientific-specimen and artifact collections. The permanent exhibitions, which attract up to two million visitors annually, include fossils, current cultures from around the world, and interactive programming demonstrating today\'s urgent conservation needs.','maps-redirect/field-museum.html','https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Field_Museum_of_Natural_History.jpg/300px-Field_Museum_of_Natural_History.jpg'),(106,2222,NULL,41.9797,-87.9068,'O\'Hare International Airport','1944-02-01','O\'Hare International Airport (IATA: ORD, ICAO: KORD, FAA LID: ORD), typically referred to as O\'Hare Airport, Chicago O\'Hare, or simply O\'Hare, is an international airport located on the Northwest Side of Chicago, Illinois, 14 miles (23 km) northwest of the Loop business district. Operated by the Chicago Department of Aviation and covering 7,627 acres (3,087 ha), O\'Hare has non-stop flights to 228 destinations in North America, South America, Europe, Africa, Asia and Oceania as of 2018.','maps-redirect/ohare-international-airport.html','https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/O%27Hare_from_ISS_12-06-2019.jpg/375px-O%27Hare_from_ISS_12-06-2019.jpg'),(107,2222,NULL,41.7869,-87.7504,'Chicago Midway International Airport','1927-02-01','Chicago Midway International Airport (IATA: MDW, ICAO: KMDW, FAA LID: MDW), typically referred to as Midway Airport, Chicago Midway, or simply Midway, is a major commercial airport on the Southwest side of Chicago, Illinois, located approximately 12 miles (19 km) from the Loop business district. Established in 1927, Midway served as Chicago\'s primary airport until the opening of O\'Hare International Airport in 1955. Today, Midway is one of the busiest airports in the nation, the second-busiest airport in the Chicago metropolitan area and the state of Illinois, and serving 20,844,860 passengers in 2019. ','maps-redirect/midway-international-airport.html','https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Midway_Airport_Airfield.jpg/220px-Midway_Airport_Airfield.jpg'),(108,1111,42095,52.5092,-1.88477,'Villa Park','1897-02-01','Villa Park is a football stadium in Aston, Birmingham, England, with a seating capacity of 42,749. It has been the home of Premier League side Aston Villa since 1897. The ground is less than a mile from both Witton and Aston railway stations and has hosted sixteen England internationals at senior level, the first in 1899 and the most recent in 2005. Villa Park has hosted 55 FA Cup semi-finals, more than any other stadium. In 1897, Aston Villa moved into the Aston Lower Grounds, a sports ground in a Victorian amusement park in the former grounds of Aston Hall, a Jacobean stately home.','maps-redirect/villa-park-stadium.html','https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Villa_Park.jpg/300px-Villa_Park.jpg'),(109,1111,29409,52.4758,-1.86816,'St Andrew\'s','1906-02-01','St Andrew\'s is an association football stadium in the Bordesley district of Birmingham, England. It has been the home ground of Birmingham City Football Club for more than a century. From 2018 to 2021, it was known for sponsorship reasons as St Andrew\'s Trillion Trophy Stadium. Constructed and opened in 1906 to replace the Muntz Street ground, which had become too small to meet the club\'s needs, the original St Andrew\'s could hold an estimated 75,000 spectators, housed in one grandstand and a large uncovered terrace.','maps-redirect/standrews-stadium.html','https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/TiltonRoadEnd01.JPG/250px-TiltonRoadEnd01.JPG'),(110,2222,23500,41.8809,-87.6742,'United Centre','1944-02-01','United Center is an indoor arena on the Near West Side of Chicago, Illinois, United States. It is home to the Chicago Bulls of the National Basketball Association (NBA) and the Chicago Blackhawks of the National Hockey League (NHL). It is named after its corporate sponsor United Airlines, which has been based in Chicago since 2007 and has a hub at the O\'Hare International Airport. With a capacity of nearly 21,000, the United Center is the largest arena by capacity in the NBA, and second largest arena by capacity in the NHL.','https://www.unitedcenter.com/\r\n','https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/United_Center_pano.jpg/300px-United_Center_pano.jpg\n'),(111,2222,41649,41.9486,-87.6553,'Wrigley Field','1914-02-01','Wrigley Field /ˈrɪɡli/ is a Major League Baseball (MLB) stadium located on the North Side of Chicago, Illinois. It is the home of the Chicago Cubs, one of the city\'s two MLB franchises. It first opened in 1914 as Weeghman Park for Charles Weeghman\'s Chicago Whales of the Federal League, which folded after the 1915 baseball season.','https://www.mlb.com/cubs/ballpark','https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Wrigley_Field_2018_-_42195054760.jpg/300px-Wrigley_Field_2018_-_42195054760.jpg\n'),(112,1111,NULL,52.4768,-1.89871,'Electric Cinema','1909-02-01','The Electric is a cinema in Birmingham, England. It opened in Station Street in 1909, showing its first silent film on 27 December of that year, and as of 2022 is thought to be the oldest working cinema in the country. It predates its namesake, the Electric Cinema in Notting Hill, London, by around two months. Originally called the Electric Theatre, the cinema has undergone a number of name changes since its opening, but returned as The Electric in October 1993. The cinema closed at the start of the COVID-19 pandemic in 2020, with the owner making most of its staff redundant. In January 2022 it the cinema reopened under new ownership.','maps-redirect/electric-cinema.html','https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/ElectricCinema.jpg/270px-ElectricCinema.jpg'),(113,1111,NULL,52.5074,-1.89358,'Cineworld Cinema','1929-02-01','Cineworld Birmingham - Broad Street is a 12 screen cinema with a Starbucks and licensed bar, situated in the heart of the city with a large car park and a range of restaurants and other leisure activities nearby. the Middle East, the Indian subcontinent, North America, and the Caribbean. Birmingham Airport is an operating base for Jet2.com, Ryanair and TUI Airways.','maps-redirect/birmingham-cineworld.html','https://i2-prod.birminghammail.co.uk/incoming/article18701747.ece/ALTERNATES/s615b/2_IFP_BEM_010820cinema009JPG.jpg'),(114,1111,NULL,52.4739,-1.92183,'ODEON Broadway Plaza','1928-02-01','ODEON Broadway Plaza has 12 luxury screens, including a state-of-the-art iSense screen, all with stunning RealD 3D. Every seat on every row at ODEON Luxe Birmingham Broadway Plaza has been expertly designed so you can relax and recline during your film. Treat yourself to superior comfort with our recliner seats, and soothing hot drinks with our Costa Cafe culture.\r\n\r\n','maps-redirect/odeon-broadway-plaza.html','https://img.tagvenue.com/resize/34/42/widen-1680-noupsize;5666-odeon-luxe-birmingham-broadway-plaza-venue.jpg'),(115,2222,NULL,41.8913,-87.6191,'AMC River East 21','1920-02-01','This theater opened November 1, 2002, one block over from the late, great McClurg Court Cinemas. The new twenty one screen movie theater is equipped with stadium seating, digital picture, closed captioning/DVS, digital surround sound, automated box office and a VIP special events program.','maps-redirect/amc-river-east-21.html','https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/O%27Hare_from_ISS_12-06-2019.jpg/375px-O%27Hare_from_ISS_12-06-2019.jpg'),(116,2222,NULL,41.9226,-87.6653,'Regal Webster Place','1989-02-01','Opened on July 20, 1988 as an eight screener in the Webster Place shopping center (located on Webster Avenue, off Lincoln Parks Clybourn Avenue Corridor), the theater was built for M and R Amusements, but that local chain was acquired by Loews not long after the multiplex opened. In 1998, three more screens were added, increasing the theatre to eleven screens. In 2006, the Webster Place became part of the Kerasotes chain. The Webster Place received a much-needed remodeling in fall of 2007. On May 25, 2010, it was taken over by Regal Entertainment. AMC acquired certain Kerasotes theatre locations, including this one, then sold them on to Regal.','maps-redirect/regal-webster-place.html','https://fastly.4sqi.net/img/general/600x600/38289314_K7mc-RGt6vGSf0i00pY0p3MHxHGwiOqKRzu05uuIjKU.jpg'),(117,2222,NULL,41.9318,-87.7077,'The Logan Theatre','1915-02-01','Located in the heart of the Logan Square neighborhood. The Paramount Theatre opened on November 23, 1915 with Douglas Fairbanks in â€œThe Lambâ€ & Charles Murray in â€œA Game Old Knightâ€. It was operated by the Lubliner & Trinz circuit. It had seating for 988 in orchestra level and was equipped with a Weickhardt organ. In 1929 it was taken over by Essaness and renamed Logan Theatre. The Logan Theatre was converted into a four-screen, independently-run multiplex seating a total of about 975. It screens second-run commercial features. It was closed in fall of 2011 for renovations to be carried out. It reopened March 17, 2012, the theatre now has comfortable new seating for 595, enhanced sound system, new screens and digital projectors, expanded and remodeled concession and cafÃ© area, Art Deco style details, a new bar & lounge and offering great prices for mid-run movies, independent films and local film festivals.','maps-redirect/logan-theatre.html','https://pbs.twimg.com/profile_images/1120414020/IMG00041-20100726-0906_400x400.jpg');
/*!40000 ALTER TABLE `poi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-28 16:13:33
