-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 03:49 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `communitydeals`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `bookName` varchar(100) DEFAULT NULL,
  `authorName` varchar(50) NOT NULL,
  `publication` varchar(50) NOT NULL,
  `bookCategory` varchar(10) DEFAULT NULL,
  `MRP` decimal(5,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `edition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookName`, `authorName`, `publication`, `bookCategory`, `MRP`, `description`, `edition`) VALUES
(1, 'The Complete HTML and CS', 'Thomas A Powell', 'Wrox Publications', 'SCOPE', '500.00', 'Thomas A. Powell, The Complete Reference HTML & CSS 5th edition, 2010.', 5),
(2, 'JavaScript A Step by Step Learning', 'Steve Suehring', 'O''Reilly', 'SCOPE', '560.00', 'Steve Suehring, JavaScript A Step by Step, PHI, 2nd edition, 2010.', 2),
(3, 'Managment Information System', 'Kenneth C', 'Mc', 'SAS', '660.00', 'Kenneth C Laudon Jane P, Management Information System 12th Edition', 12),
(4, 'DataMining Concepts and Techniques', 'Maxwell', 'McGrath', 'SCOPE', '860.00', 'Data Mining Concepts and Techniques 2nd edition. Book for Data Mining', 2),
(5, 'Distributed Operating Systems and Algorithms', 'Randy Chow and Theodore Johnson', 'Addison- Wesley', 'SITE', '630.00', 'Randy Chow and Theodore Johnson. Distributed Operating Systems and Algorithms. Addison-\r\nWesley, 1997.', 1),
(6, 'Introduction to Operating Systems: Advanced Course', 'Mary Gorman S, Todd Stubbs S', 'Prentice Hall', 'SITE', '400.00', 'Mary Gorman S, Todd Stubbs S, Introduction to Operating Systems: Advanced Course,\r\n2001.', 4),
(7, 'Elements of Distributed Computing', 'Vijay K. Garg', 'Wiley & Sons', 'SITE', '650.00', 'Vijay K. Garg, Elements of Distributed Computing, Wiley & Sons, 2002', 2),
(8, 'Modern Operating Systems', 'Andrew Tanenbaum S', 'Tata McGraw-Hill', 'SITE', '900.00', 'Andrew Tanenbaum S, Modern Operating Systems,Tata McGraw-Hill, 2001', 6),
(9, 'Big Data Analytics:Turning Big Data into Big Money', 'Frank J Ohlhorst', 'Wiley and SAS Business Series', 'SITE', '730.00', 'Frank J Ohlhorst, “Big Data Analytics: Turning Big Data into Big Money”, Wiley and SAS\r\nBusiness Series, 2012', 1),
(10, 'Graph Theory', 'F.Harary', 'Addison Wesley', 'SAS', '200.00', 'F.Harary, Graph Theory, Addison Wesley/ Narosa (1998).', 1),
(11, 'Introduction to Graph Theory', 'West, D.B', 'PrenticeHall, Englewood Cliffs', 'SAS', '250.00', 'West, D.B, Introduction to Graph Theory, second ed., PrenticeHall,\r\nEnglewood\r\nCliffs, NJ, ( 2001).', 2),
(12, 'Self\r\nAssembled Nanostructures', 'Jin Zhang, Zhong-lin Wang, Jun Liu', 'Kluwer Academic - Plenum Publishers', 'SMEC', '360.00', 'Jin Zhang, Zhong-lin Wang, Jun Liu, Shaowei Chen and Gang-yu Liu, (2003), Self\r\nAssembled Nanostructures, Kluwer Academic/Plenum Publishers', 1),
(13, 'Hand book of Nanotechnology', 'Bharat Bhushan', 'Springer Hand Book', 'SMEC', '240.00', 'Hand book of Nanotechnology, (1999), Edited by Bharat Bhushan, Springer Hand\r\nBook.', 1),
(14, 'Introduction to Soft Matter', 'Ian W. Hamley', 'Wiley', 'SMEC', '350.00', 'Ian W. Hamley, “Introduction to Soft Matter”, Wiley (2007)', 1),
(15, 'Structured Fluids: Polymers, Colloids,\r\nSurfactants', 'T. A. Witten and P. A. Pincus', 'Oxford University Press, Oxford', 'SMEC', '500.00', 'T. A. Witten and P. A. Pincus, “Structured Fluids: Polymers, Colloids,\r\nSurfactants,” Oxford University Press, Oxford (2004).', 4),
(16, 'Surfactants and\r\nPolymers in Aqueous Solutions', 'B. Jonsson, B. Lindman', 'Wiley, Chichester', 'SMEC', '300.00', 'B. Jonsson, B. Lindman, K. Holmberg and B. Kronberg, “Surfactants and\r\nPolymers in Aqueous Solutions,” Wiley, Chichester (1998).', 1),
(17, 'International Economics', 'Francis Cherunilam', 'Princeton, University Press', 'SSL', '150.00', 'International Economics – Francis Cherunilam , Princeton, University Press', 1),
(18, 'International Finance: The Markets', 'Levi', 'McGraw Hill International Editions', 'SSL', '220.00', 'Levi, M.D. International Finance: The Markets and Financial Management of Multinational\r\nBusiness, 3rd Edition, McGraw Hill International Editions, Finance Series, 1996', 3),
(19, 'International Economics', 'H. L. Bhatia', 'Oxford University Press', 'SSL', '250.00', 'International Economics – H. L. Bhatia.Oxford University Press', 1),
(20, 'Operating system concepts', 'Silberschatz, P.B. Galvin & G. Gagne', 'John Wiley', 'SCOPE', '900.00', 'Silberschatz, P.B. Galvin & G. Gagne, Operating system concepts, John Wiley, 8th\r\nedition, 2011.', 8),
(21, 'Operating systems', 'W. Stallings', 'Prentice-Hall', 'SCOPE', '600.00', 'W. Stallings, Operating systems, Prentice-Hall, 7th edition, 2011.', 7),
(22, 'Marketing Metrics', 'Paul W.Farris et al', 'Pearson Education', 'VITBS', '250.00', 'Paul W.Farr is et al (2010) , Marketing Metrics, Pearson Education', 1),
(23, 'Industrial Robotics', 'Mikell P. Groover', 'Tata McGraw-Hill Publishers', 'SENSE', '600.00', 'Mikell P. Groover, “Industrial Robotics”, Tata McGraw-Hill Publishers.', 1),
(24, 'Introduction to Robotics, Mechanics and Control', 'John J. Craig', 'Addison Wesley Publishing Company', 'SENSE', '600.00', 'John J. Craig, “Introduction to Robotics, Mechanics and Control”, Addison Wesley\r\nPublishing Company.', 1),
(25, 'Antenna Theory - Analysis and Design', 'Balanis', 'John Wiley & Sons', 'SENSE', '300.00', 'Balanis, “Antenna Theory - Analysis and Design”, 3/e, John Wiley & Sons, 2005', 3),
(26, 'Antenna for all Applications', 'J.D.Krauss', 'Tata McGraw-Hill Publishers', 'SENSE', '300.00', 'J.D.Krauss, “Antenna for all Applications”, TMH, 4/e, 2010.', 4),
(27, 'Electrical Machinery', 'Fitzgerald A.E. Kingsly C.', 'McGraw Hill International Edition', 'SELECT', '500.00', 'Fitzgerald A.E. Kingsly C., Umans S.D., ‘Electrical Machinery’ 6th edition,\r\nMcGraw Hill International Edition, New York, 2002', 6),
(28, 'Electrical Machines', 'D.P.Kothari', 'Tata McGraw-Hill', 'SELECT', '550.00', 'D.P.Kothari, ‘Electrical Machines.’ 3rd edition, TMH, New Delhi 2004', 3),
(29, 'Advanced Microprocessors and Peripherals', 'A.K. Ray and K.M. Bhurchandi', 'Tata McGraw Hill', 'SCOPE', '300.00', 'A.K. Ray and K.M. Bhurchandi Advanced Microprocessors and Peripherals, 2nd\r\nedition, Tata McGraw Hill, 2006', 2),
(30, 'The Intel Micro processor 8086', 'Barry B Bray', 'PHI', 'SCOPE', '300.00', 'Barry B Bray, The Intel Micro processor 8086/8088, 80186,80286Arcitecture, programming and interfacing, PHI, 5th Edition,2005', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`,`edition`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_usertable_bookid` FOREIGN KEY (`bookId`) REFERENCES `masterproduct` (`masterId`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
