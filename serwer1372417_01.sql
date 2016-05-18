-- phpMyAdmin SQL Dump
-- version home.pl
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2013 at 05:48 PM
-- Server version: 5.5.32-log
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `serwer1372417_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `lft`, `rght`, `name`, `page_id`) VALUES
(1, NULL, 1, 10, 'O nas', 4),
(3, 1, 8, 9, 'Kim jesteśmy', 0),
(4, 1, 6, 7, 'Nasza Misja', 0),
(5, 1, 2, 3, 'Ustawy', 0),
(11, NULL, 11, 20, 'Nasze działania', 0),
(12, NULL, 21, 26, 'Oferta', 0),
(13, NULL, 27, 32, 'Dla klienta', 0),
(14, NULL, 33, 38, 'Kontakt', 0),
(17, 11, 18, 19, 'Specjalizacja', 2),
(21, 11, 14, 15, 'Projekty', 3),
(22, 11, 12, 13, 'Szkolenia', 5),
(23, 12, 24, 25, 'Praca socjalna', 0),
(24, 12, 22, 23, 'Dlaczego warto', 0),
(25, 13, 30, 31, 'Referencje', 0),
(26, 13, 28, 29, 'Zapytanie ofertowe', 0),
(27, 14, 36, 37, 'Dane firmy', 0),
(28, 14, 34, 35, 'Przedstawiciel regionalny', 0),
(29, 1, 4, 5, 'Status', 2),
(30, 11, 16, 17, 'Współpraca', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `body`, `created`, `modified`) VALUES
(2, 'Dbalosaosbcmajcks jsna scasjc asc mam ', '\r\n    Trzeba było zakryć twarz, zmienić głos i podać nieprawdziwe nazwisko Kaczki, a nie byłoby żadnego zakopu i od razu główna. A tak, zginie w odmętach wykopaliska.\r\n\r\nRayearth\r\n\r\n    bondzo 3 godz. temu +42	 \r\n\r\n    @Rayearth: dokładnie, trzeba pilnować wykopaliska, bo widzę, że dużo ciekawych znalezisk zostaje w pizdu zakopane, pewna grupa na wykopie nie śpi.\r\n\r\nbondzo\r\n\r\n    Filipix 2 godz. temu -9	 \r\n\r\n    @bondzo: Właśnie. Kategoria polityka powinna być podzielona przynajmniej na dwie grupy: Tusk i Kaczyński. i była by sprawa rozwiązana.\r\n    Albo chociaż znaleziska z prezesem dodawać w nocy. Gdy "pewna grupa" śpi?\r\n\r\nFilipix\r\n\r\n    niewiemcowymyslic 2 godz. temu -5	 \r\n\r\n    @Rayearth: Nie zginie!\r\n\r\nniewiemcowymyslic\r\n\r\n    KapitanKompot 2 godz. temu via Android -11	 \r\n    pokaż komentarz \r\n\r\nKapitanKompot\r\n\r\n    kamzikowy 2 godz. temu +5	 \r\n\r\n    @Filipix: no nie da się ukryć, że ty jesteś w tej grupie lewicowej szarańczy, która wspólnym widzimisię decyduje co mają na wykopie czytać inni\r\n\r\nkamzikowy\r\n\r\n    Filipix 2 godz. temu -6	 \r\n\r\n    @kamzikowy: :D Co do szarańczy to się zgodzę. Do reszty też bo i ty masz bordo. Ale lewicowej to sobie wypraszam.\r\n\r\nFilipix\r\n\r\n    kamzikowy 2 godz. temu +1	 \r\n\r\n    @Filipix: sorry gregory, ale to ty masz kumpli takich jak mq1, ghostface czy Kamill. Przecież to albo lewica, albo lewica udająca centrystów. Widzę, żeCiebie też trzeba zaliczyć do tej drugiej grupy.\r\n\r\nkamzikowy\r\n\r\n    Filipix 2 godz. temu -11	 \r\n    pokaż komentarz \r\n\r\nFilipix\r\n\r\n    kamzikowy 2 godz. temu -1	 \r\n\r\n    @Filipix:\r\n\r\n    Robaki w mózgu sugerują że jesteś Ryu. Szybko multikonto zbudowałeś.', '2013-03-09 22:49:58', '2013-03-10 00:28:01'),
(3, 'Batrosz xDxD!!!oneone!!!', 'Bartek to jest xD afro jak u murzyna <img src="http://static.yafud.pl/images/logo.png" />', '2013-03-10 22:32:02', '2013-03-13 17:26:32'),
(4, 'srarararararara', 'jdswpkjlengakjengklanbvklhbvqkjlnbv', '2013-04-06 20:23:12', '2013-04-06 20:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `sidebox`
--

CREATE TABLE IF NOT EXISTS `sidebox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `context` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sidebox`
--

INSERT INTO `sidebox` (`id`, `name`, `context`) VALUES
(1, 'Facebook', ''),
(2, 'Bartek', 'nowy <b>habemus papas</b>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'estidi', '7aaf2d7f0b660d50dfd480dbfd9f2b1915e64623', 'admin', '2013-03-16 14:26:50', '2013-03-16 14:26:50'),
(2, 'bartek', 'af1b5cede3daf6f19a72796e70c1fed770ef83c6', 'admin', '2013-04-06 20:17:37', '2013-06-07 00:27:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
