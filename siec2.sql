-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Cze 2015, 22:25
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siec2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datarejestracji` int(11) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `haslo` varchar(128) DEFAULT NULL,
  `ranga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `datarejestracji`, `login`, `haslo`, `ranga`) VALUES
(1, NULL, 'admin', 'fe80ef80e324d1499dc3137074792025', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `dateadd` int(11) DEFAULT NULL,
  `mac` varchar(17) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `devtype` varchar(333) DEFAULT NULL,
  `devname` varchar(333) DEFAULT NULL,
  `opis` text,
  `stan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `dateadd`, `mac`, `ip`, `devtype`, `devname`, `opis`, `stan`) VALUES
(1, 1, 1, '1', '1', '1', '1', '1', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `linuxlogs`
--

CREATE TABLE IF NOT EXISTS `linuxlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(333) DEFAULT NULL,
  `changeDate` int(11) DEFAULT NULL,
  `command` varchar(333) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `linuxlogs`
--

INSERT INTO `linuxlogs` (`id`, `title`, `changeDate`, `command`, `content`) VALUES
(1, 'Last -5 ', 3245345, 'last -5', 'admin\r\nroot\r\npawel\r\nadmin\r\nadsmin'),
(2, 'tail -5 dmesg', 354543, 'tail -5 dmesg', 'logd f gfd gf sd\r\nsag fdsgh fdjgdfg fg\r\nhj jh hk hgh dfhjd g\r\nghf hg gkh ghfdsgf asd gh \r\nsdfg dfsg hsdh gf hs');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `panellogs`
--

CREATE TABLE IF NOT EXISTS `panellogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dateadd` int(11) DEFAULT NULL,
  `title` varchar(177) DEFAULT NULL,
  `content` text,
  `author` varchar(177) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `panellogs`
--

INSERT INTO `panellogs` (`id`, `dateadd`, `title`, `content`, `author`) VALUES
(1, 45435243, 'Dhcp reload', 'dhcp was reloadaed because you need to ...costam', 'system'),
(2, 45435243, 'Dhcp reload', 'dhcp was reloadaed because you need to ...costam', 'system'),
(3, 45435243, 'Dhcp reload', 'dhcp was reloadaed because you need to ...costam', 'system');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state` int(1) DEFAULT NULL,
  `command` varchar(256) NOT NULL,
  `service` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `services`
--

INSERT INTO `services` (`id`, `state`, `command`, `service`) VALUES
(1, 1, 'ps aux | pgrep dhcpd', 'DHCPD'),
(2, 1, 'ps aux | pgrep crond', 'CRON'),
(3, 1, 'iptables -L -n', 'IPTABLES'),
(4, 1, 'ps aux | pgrep mysqld', 'MySQL'),
(5, 1, 'ps aux | pgrep httpd', 'Apache2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `intval` int(11) DEFAULT NULL,
  `descr` text,
  `textval` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `datarejestracji` int(11) DEFAULT NULL,
  `imie` varchar(64) DEFAULT NULL,
  `nazwisko` varchar(64) DEFAULT NULL,
  `pomieszczenie` varchar(64) DEFAULT NULL,
  `wydzial` varchar(333) DEFAULT NULL,
  `kierunek` varchar(333) DEFAULT NULL,
  `stan` int(11) DEFAULT NULL,
  `login` varchar(64) DEFAULT NULL,
  `haslo` varchar(256) DEFAULT NULL,
  `oplata` int(11) DEFAULT NULL,
  `datawaznoscikonta` int(11) DEFAULT NULL,
  `portyonof` int(11) DEFAULT NULL,
  `porty` text,
  `downloadhttp` int(11) DEFAULT NULL,
  `downloadall` int(11) DEFAULT NULL,
  `upload` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `datarejestracji`, `imie`, `nazwisko`, `pomieszczenie`, `wydzial`, `kierunek`, `stan`, `login`, `haslo`, `oplata`, `datawaznoscikonta`, `portyonof`, `porty`, `downloadhttp`, `downloadall`, `upload`) VALUES
(2, 1434890478, 'PaweÅ‚', 'Czubak', '234', 'WEEIA', 'Informatyka', 1, 'pawel33317', 'fe80ef80e324d1499dc3137074792025', 0, 1442666478, 0, '0', 0, 0, 0),
(5, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 1, 'pawel2', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(6, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 1, 'pawel24', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(7, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 1, 'pawel243', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(8, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 0, 'pawel24s4', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(9, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 1, 'nowyaaa', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1443038162, 0, '0', 0, 0, 0),
(10, 1434578803, 'dfdf', 'pawel2', '1123', 'weeia', 'pawel', 0, 'pawel2t4', '343d9040a671c45832ee5381860e2996', 0, 1443038861, 0, '0', 0, 0, 0),
(11, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 2, 'pawel34qwe', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(12, NULL, 'adam', 'kowalski', '222', 'dfsd', 'ekonomia', 1, 'adam', NULL, 1, 1443039014, 1, '0', 0, 0, 0),
(15, NULL, 'adam', 'kowalski', '222', 'dfsd', 'ekonomia', 1, 'adam2', NULL, 1, 1443039259, 1, '0', 0, 0, 0),
(17, NULL, 'adam', 'kowalski', '222', 'dfsd', 'ekonomia', 1, 'adam222', NULL, 1, 1443039455, 1, '0', 0, 0, 0),
(18, NULL, 'adam', 'kowalski', '222', 'dfsd', 'ekonomia', 1, 'mama', NULL, 1, 1443039470, 1, '0', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
