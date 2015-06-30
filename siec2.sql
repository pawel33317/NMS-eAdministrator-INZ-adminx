-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Cze 2015, 11:29
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
  `user_id` int(10) unsigned DEFAULT NULL,
  `dateadd` int(11) DEFAULT NULL,
  `mac` varchar(17) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `devtype` varchar(333) DEFAULT NULL,
  `devname` varchar(333) DEFAULT NULL,
  `opis` text,
  `stan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Zrzut danych tabeli `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `dateadd`, `mac`, `ip`, `devtype`, `devname`, `opis`, `stan`) VALUES
(1, 2, 1, '1', '1', '1', '1', '1', 0),
(2, 2, 1, '1', '10.0.0.2', '234', '1', '1', 0),
(3, 2, 1, '1', '1', '1', '1', '1', 0),
(14, 10, 1, '1', '1', '1', '1', '1', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `linuxlogs`
--

INSERT INTO `linuxlogs` (`id`, `title`, `changeDate`, `command`, `content`) VALUES
(2, 'tail -5 dmesg', 354543, 'tail -5 dmesg', 'logd f gfd gf sd\r\nsag fdsgh fdjgdfg fg\r\nhj jh hk hgh dfhjd g\r\nghf hg gkh ghfdsgf asd gh \r\nsdfg dfsg hsdh gf hs'),
(3, 'Last -5 ', 3245345, 'last -5', 'admin\r\nroot\r\npawel\r\nadmin\r\nadsmin\r\nlalal');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `panellogs`
--

INSERT INTO `panellogs` (`id`, `dateadd`, `title`, `content`, `author`) VALUES
(1, 45435243, 'Dhcp reload', 'dhcp was reloadaed because you need to ...costam', 'system'),
(2, 45435243, 'Dhcp reload', 'dhcp was reloadaed because you need to ...costam', 'system'),
(4, 45435243, 'Dhcp reload', 'dhcp was reloadaed because you need to ...costam', 'system'),
(5, 1435342848, 'Usuniecie uzytkownika ', 'Usuniecie uzytkownika 12 adam', 'admin'),
(6, 1435348680, 'Usuniecie uzytkownika ', 'Usuniecie uzytkownika 15 adam2', 'root@localhost'),
(7, 1435601688, 'Usuniecie uzytkownika ', 'Usuniecie uzytkownika 12 pawel', 'root@localhost'),
(8, 1435601694, 'Usuniecie uzytkownika ', 'Usuniecie uzytkownika 8 pawel24s4', 'root@localhost'),
(9, 45435243, 'Dhcp reload', 'dhcp was reloadaed because you need to ...costam', 'system');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `message` varchar(30) NOT NULL,
  `operacja` varchar(11) NOT NULL,
  `performdate` int(11) DEFAULT NULL,
  `dateadd` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2477 ;

--
-- Zrzut danych tabeli `queue`
--

INSERT INTO `queue` (`id`, `type`, `message`, `operacja`, `performdate`, `dateadd`) VALUES
(1, '1', 'dhcp', '1', 1435582238, 1435582238),
(2, '1', 'firewall', '1', 1435582252, 1435582252),
(3, '1', 'cron', '2', 1435582458, 1435582458),
(4, '2', 'new device', 'reloadConfi', 1435585103, 1435585103),
(5, '2', 'new device', 'reloadConfi', 1435585145, 1435585145),
(6, '3', 'service states', 'refresh sta', 1435585747, 1435585747),
(7, '3', 'service states', 'refresh sta', 1435585752, 1435585752),

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
(4, 0, 'ps aux | pgrep mysqld', 'MySQL'),
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
  UNIQUE KEY `login` (`login`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `datarejestracji`, `imie`, `nazwisko`, `pomieszczenie`, `wydzial`, `kierunek`, `stan`, `login`, `haslo`, `oplata`, `datawaznoscikonta`, `portyonof`, `porty`, `downloadhttp`, `downloadall`, `upload`) VALUES
(2, 1434890478, 'PaweÅ‚', 'Czubak', '234', 'WEEIA', 'Informatyka', 1, 'pawel33317', 'fe80ef80e324d1499dc3137074792025', 0, 1442666478, 0, '0', 0, 0, 0),
(5, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 2, 'pawel2', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(6, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 1, 'pawel24', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(7, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 1, 'pawel243', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1442354803, 0, '0', 0, 0, 0),
(9, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 2, 'nowyaaa', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1443038162, 0, '0', 0, 0, 0),
(10, 1434578803, 'dfdf', 'pawel2', '1123', 'weeia', 'pawel', 1, 'pawel2t4', '343d9040a671c45832ee5381860e2996', 0, 1443038861, 1, '1-55;80;53;81;', 0, 0, 0),
(11, 1434578803, 'pawel', 'pawel2', '111', 'weeia', 'pawel', 1, 'pawel34qwe', 'a741cdf4d61e1083064d813a5a1ec8aa', 0, 1443351589, 1, '88;56;33;22;1-20;', 0, 0, 0);

--
-- Wyzwalacze `users`
--
DROP TRIGGER IF EXISTS `UsersDevicesDelete`;
DELIMITER //
CREATE TRIGGER `UsersDevicesDelete` BEFORE DELETE ON `users`
 FOR EACH ROW begin
INSERT INTO panellogs (dateadd, title, content, author) VALUES 
(UNIX_TIMESTAMP(), 'Usuniecie uzytkownika ', CONCAT('Usuniecie uzytkownika ', OLD.id, ' ', OLD.login), USER());


delete from devices where user_id = OLD.id;

end
//
DELIMITER ;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
