-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 23. říj 2017, 17:06
-- Verze serveru: 10.1.26-MariaDB
-- Verze PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `katarina`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `admin`
--

CREATE TABLE `admin` (
  `login` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabulky `clenove_teamu`
--

CREATE TABLE `clenove_teamu` (
  `id_teamu` int(11) DEFAULT NULL,
  `login_clena` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `clenove_teamu`
--

INSERT INTO `clenove_teamu` (`id_teamu`, `login_clena`) VALUES
(39, 'xroman01'),
(39, 'xgirou01'),
(39, 'xprovo01'),
(14, 'xellio01'),
(14, 'xneuvi01'),
(14, 'xgudas01'),
(10, 'xgosti01'),
(10, 'xneuvi01'),
(10, 'xwealj01'),
(11, 'xmanni01'),
(11, 'xellio01'),
(11, 'xmacdo01'),
(13, 'xcoutu01'),
(13, 'xhaggr01'),
(13, 'xsanhe01'),
(14, 'xprovo01'),
(14, 'xleier01'),
(15, 'xpatri01'),
(15, 'xkonec01'),
(16, 'xneuvi01'),
(16, 'xmorin01'),
(16, 'xgudas01'),
(16, 'xroman01'),
(17, 'xyoung01'),
(17, 'xjones01'),
(18, 'xroone01'),
(18, 'xrashf01'),
(19, 'xraffl01'),
(19, 'xlaugh01'),
(19, 'xrashf01'),
(20, 'xweise01'),
(20, 'xfilpp01'),
(20, 'xkonec01'),
(21, 'xshawl01'),
(21, 'xjones01'),
(22, 'xhaggr01'),
(23, 'xgosti01'),
(23, 'xellio01'),
(17, 'xroman01');

-- --------------------------------------------------------

--
-- Struktura tabulky `informace`
--

CREATE TABLE `informace` (
  `id_informace` int(11) NOT NULL,
  `pocet_bodu` int(11) DEFAULT NULL,
  `reseni` varchar(100) DEFAULT NULL,
  `datum_hodnoceni` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hodnotici` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `informace`
--

INSERT INTO `informace` (`id_informace`, `pocet_bodu`, `reseni`, `datum_hodnoceni`, `hodnotici`) VALUES
(1, 4, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 1),
(2, 2, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 5),
(3, 4, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 4),
(4, 0, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 3),
(5, 3, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 2),
(6, 5, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 1),
(7, 5, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 5),
(8, 4, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 4),
(9, 0, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 3),
(10, 3, 'http://www.fit.vutbr.cz/IDS/aasdsdf', '2017-10-19 09:44:49', 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `predmet`
--

CREATE TABLE `predmet` (
  `id_predmet` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `id_cvicici` int(11) DEFAULT NULL,
  `id_prednasejici` int(11) DEFAULT NULL,
  `id_garant` int(11) NOT NULL,
  `kapacita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `predmet`
--

INSERT INTO `predmet` (`id_predmet`, `nazev`, `id_cvicici`, `id_prednasejici`, `id_garant`, `kapacita`) VALUES
(1, 'Databázové systémy', 2, 1, 1, 100),
(2, 'Matematika 1', 2, 1, 1, 20),
(3, 'Fyzika 3', 3, 1, 1, 30),
(4, 'Právní minimum', 5, 1, 1, 40),
(5, 'Základy programování', 4, 1, 1, 50),
(6, 'Informační systémy', 10, 3, 6, 250),
(7, 'Modelování­ a simulace', 15, 3, 8, 150),
(8, 'Síťové aplikace a správa sítí', 10, 13, 12, 100),
(9, 'Tvorba uživatelských rozhraní', 9, 1, 6, 150),
(10, 'Počítačová komunikace a sítě', NULL, NULL, 2, 150),
(11, 'Principy programovacích jazyků a OOP', NULL, 8, 9, 200),
(12, 'Tvorba webových stránek', 13, 6, 1, 165),
(13, 'Matematika 2', NULL, 3, 3, 125),
(14, 'Pokročilé asemblery', NULL, 1, 5, 250),
(15, 'Programovací­ seminář', 7, NULL, 4, 75),
(16, 'Skriptovací jazyky', NULL, 8, 6, 80),
(17, 'Elektronika pro informační technologie', NULL, 8, 8, 90),
(18, 'Úvod do softwarového inženýrství', NULL, 7, 7, 120),
(19, 'Operační systémy', NULL, NULL, 4, 200),
(20, 'Typografie a publikování­', NULL, NULL, 3, 125),
(21, 'Algoritmy', NULL, 4, 2, 150),
(22, 'Formální­ jazyky a překladače', NULL, 5, 5, 175);

-- --------------------------------------------------------

--
-- Struktura tabulky `prihlasena_varianta`
--

CREATE TABLE `prihlasena_varianta` (
  `id_resitel` int(11) NOT NULL,
  `id_varianta` int(11) NOT NULL,
  `odevzdane_reseni` varchar(100) DEFAULT NULL,
  `info_reseni` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `prihlasena_varianta`
--

INSERT INTO `prihlasena_varianta` (`id_resitel`, `id_varianta`, `odevzdane_reseni`, `info_reseni`) VALUES
(1, 1, NULL, NULL),
(11, 2, NULL, NULL),
(11, 4, NULL, NULL),
(11, 12, NULL, NULL),
(11, 14, NULL, NULL),
(11, 22, NULL, NULL),
(12, 10, NULL, NULL),
(12, 13, NULL, NULL),
(12, 15, NULL, NULL),
(12, 22, NULL, NULL),
(13, 7, NULL, NULL),
(13, 17, NULL, NULL),
(13, 20, NULL, NULL),
(13, 21, NULL, NULL),
(14, 2, NULL, NULL),
(14, 4, NULL, NULL),
(14, 7, NULL, NULL),
(14, 9, NULL, NULL),
(14, 11, NULL, NULL),
(14, 13, NULL, NULL),
(14, 16, NULL, NULL),
(14, 22, NULL, NULL),
(15, 3, NULL, NULL),
(15, 5, NULL, NULL),
(15, 7, NULL, NULL),
(15, 10, NULL, NULL),
(15, 11, NULL, NULL),
(15, 13, NULL, NULL),
(15, 17, NULL, NULL),
(15, 22, NULL, NULL),
(18, 2, NULL, NULL),
(18, 4, NULL, NULL),
(18, 11, NULL, NULL),
(18, 14, NULL, NULL),
(19, 3, NULL, NULL),
(19, 4, NULL, NULL),
(19, 11, NULL, NULL),
(19, 14, NULL, NULL),
(20, 2, NULL, NULL),
(20, 4, NULL, NULL),
(20, 7, NULL, NULL),
(20, 10, NULL, NULL),
(20, 11, NULL, NULL),
(20, 14, NULL, NULL),
(20, 17, NULL, NULL),
(20, 24, NULL, NULL),
(20, 25, NULL, NULL),
(21, 2, NULL, NULL),
(21, 4, NULL, NULL),
(21, 7, NULL, NULL),
(21, 8, NULL, NULL),
(21, 11, NULL, NULL),
(21, 13, NULL, NULL),
(21, 19, NULL, NULL),
(21, 24, NULL, NULL),
(22, 2, NULL, NULL),
(22, 4, NULL, NULL),
(22, 7, NULL, NULL),
(22, 8, NULL, NULL),
(22, 11, NULL, NULL),
(22, 14, NULL, NULL),
(22, 19, NULL, NULL),
(22, 25, NULL, NULL),
(23, 2, NULL, NULL),
(23, 4, NULL, NULL),
(23, 7, NULL, NULL),
(23, 8, NULL, NULL),
(23, 12, NULL, NULL),
(23, 14, NULL, NULL),
(23, 19, NULL, NULL),
(23, 25, NULL, NULL),
(24, 2, NULL, NULL),
(24, 4, NULL, NULL),
(24, 7, NULL, NULL),
(24, 8, NULL, NULL),
(24, 11, NULL, NULL),
(24, 14, NULL, NULL),
(24, 19, NULL, NULL),
(24, 24, NULL, NULL),
(25, 7, NULL, NULL),
(25, 9, NULL, NULL),
(25, 16, NULL, NULL),
(25, 24, NULL, NULL),
(26, 7, NULL, NULL),
(26, 9, NULL, NULL),
(26, 16, NULL, NULL),
(26, 24, NULL, NULL),
(38, 6, NULL, NULL),
(38, 7, NULL, NULL),
(38, 18, NULL, NULL),
(38, 27, NULL, NULL),
(39, 2, NULL, NULL),
(39, 4, NULL, NULL),
(39, 12, NULL, NULL),
(39, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `projekt`
--

CREATE TABLE `projekt` (
  `id_projekt` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `popis` varchar(100) NOT NULL,
  `maximum_bodu` int(11) NOT NULL,
  `minimum_bodu` int(11) NOT NULL,
  `zadavatel` int(11) DEFAULT NULL,
  `predmet` int(11) NOT NULL,
  `datum_odevzdani` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datum_prihlaseni` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `projekt`
--

INSERT INTO `projekt` (`id_projekt`, `nazev`, `popis`, `maximum_bodu`, `minimum_bodu`, `zadavatel`, `predmet`, `datum_odevzdani`, `datum_prihlaseni`) VALUES
(1, 'IDS 1', 'http://www.fit.vutbr.cz/IDS/asdfsdf', 5, 3, 1, 1, '2018-01-12 21:02:10', '2017-11-17 10:44:48'),
(2, 'IDS 2', 'http://www.fit.vutbr.cz/IDS/ssgfbsdf', 5, 0, 2, 1, '2018-01-27 10:44:48', '2017-11-18 10:44:48'),
(3, 'IDS 3', 'http://www.fit.vutbr.cz/IDS/fgfgfsdf', 5, 0, 3, 1, '2018-01-29 13:22:22', '2017-11-19 10:44:48'),
(4, 'IDS 4', 'http://www.fit.vutbr.cz/IDS/asghghgf', 5, 0, 1, 1, '2018-01-29 21:02:57', '2017-11-20 10:44:48'),
(5, 'IZP 1. projekt', 'http://www.fit.vutbr.cz/IZP/vfsds', 10, 0, 1, 5, '2017-11-03 23:54:59', '2017-10-27 22:00:00'),
(6, 'ASM 1. projekt', 'Popis projektu k předmětu pokročilé asemblery', 20, 5, 1, 14, '2017-12-13 23:50:39', '2017-10-27 22:00:00'),
(7, 'IZP 2. projekt', 'http://www.fit.vutbr.cz/IZP/vfsds', 10, 0, 12, 5, '2017-11-24 23:52:03', '2017-10-22 22:00:00'),
(8, 'IMS projekt', 'PrvnĂ­ projekt do pĹ™edmÄ›tu IMS', 30, 5, 2, 7, '2017-11-24 23:31:53', '2017-10-27 22:00:00'),
(9, 'IOS 1. projekt', 'PrvnĂ­ projekt do pĹ™edmÄ›tu IOS', 15, 0, 13, 19, '2017-11-12 23:00:00', '2017-10-27 22:00:00'),
(10, 'IOS 2. projekt', 'DruhĂ˝ projekt do pĹ™edmÄ›tu IOS', 15, 0, 13, 19, '2017-12-12 23:00:00', '2017-11-14 23:00:00'),
(11, 'ITU projekt', 'Projekt do předmětu ITU', 40, 10, 6, 9, '2018-02-16 23:45:36', '2017-11-15 23:00:00'),
(12, 'ISA projekt', 'Projekt do pĹ™edmÄ›tu ISA', 20, 0, 13, 8, '2017-10-27 22:00:00', '2017-12-09 23:00:00'),
(13, 'IIS projekt', 'Projekt do pĹ™edmÄ›tu IIS', 35, 5, 3, 6, '2017-10-22 22:45:50', '2017-12-09 23:00:00'),
(14, 'IPK 1.projekt', 'PrvnĂ­ projekt do pĹ™edmÄ›tu IIS', 10, 0, 2, 10, '2017-10-27 22:00:00', '2017-12-09 23:00:00'),
(15, 'IPK 2.projekt', 'DruhĂ˝ projekt do pĹ™edmÄ›tu IIS', 20, 0, 2, 10, '2017-10-27 22:00:00', '2017-12-09 23:00:00'),
(16, 'IPP 1.projekt', 'PrvnĂ­ projekt do pĹ™edmÄ›tu IPP', 10, 0, 8, 11, '2017-10-27 22:00:00', '2017-12-09 23:00:00'),
(17, 'IPP 2.projekt', 'DruhĂ˝ projekt do pĹ™edmÄ›tu IPP', 10, 0, 8, 11, '2017-10-27 22:00:00', '2017-12-09 23:00:00'),
(18, 'ITW 1.projekt', 'PrvnĂ­ projekt do pĹ™edmÄ›tu ITW', 15, 0, 1, 12, '2017-10-27 22:00:00', '2017-12-09 23:00:00'),
(19, 'ITW 2.projekt', 'DruhĂ˝ projekt do pĹ™edmÄ›tu ITW', 20, 0, 1, 12, '2017-10-27 22:00:00', '2017-12-09 23:00:00'),
(20, 'ITW 3.projekt', 'TĹ™etĂ­ projekt do pĹ™edmÄ›tu ITW', 30, 0, 1, 12, '2017-10-27 22:00:00', '2017-12-09 23:00:00');

-- --------------------------------------------------------

--
-- Struktura tabulky `resitel`
--

CREATE TABLE `resitel` (
  `id_resitel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `resitel`
--

INSERT INTO `resitel` (`id_resitel`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39);

-- --------------------------------------------------------

--
-- Struktura tabulky `student`
--

CREATE TABLE `student` (
  `id_resitel` int(11) NOT NULL,
  `jmeno` varchar(25) NOT NULL,
  `prijmeni` varchar(25) NOT NULL,
  `titul` varchar(25) DEFAULT NULL,
  `login` varchar(8) NOT NULL,
  `rodne_cislo` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `student`
--

INSERT INTO `student` (`id_resitel`, `jmeno`, `prijmeni`, `titul`, `login`, `rodne_cislo`, `password`) VALUES
(14, 'Sean', 'Couturier', '', 'xcoutu01', 2147483647, '4b08cf0fa43959e11a013ca49f87c891'),
(31, 'Brian', 'Elliott', '', 'xellio01', 101871564, 'f3e90601eccd6469dbc1425aa8971fe3'),
(16, 'Valtteri', 'Filppula', '', 'xfilpp01', 1403951456, 'ad91be9525472ce49cf459b6ca0a8997'),
(11, 'Claude', 'Giroux', '', 'xgirou01', 1101974459, '123456'),
(26, 'Shayne', 'Gostisbehere', '', 'xgosti01', 912945115, 'ae446c3689e02a3157955a867a5958f6'),
(29, 'Radko', 'Gudas', '', 'xgudas01', 1211356448, '76a597628da0a34df0369b7f833d245b'),
(25, 'Robert', 'Hagg', '', 'xhaggr01', 309985165, 'f4de71c58d68ff76b6be83b88cc63678'),
(2, 'David', 'Hel', '', 'xhelda00', 2147483647, 'a'),
(1, 'Milan', 'Hruban', '', 'xhruba08', 2147483647, 'a'),
(34, 'Phil', 'Jones', '', 'xjones01', 2105795166, '25f9e794323b453885f5181f1b624d0b'),
(3, 'Michal', 'Kohout', '', 'xkohou00', 2147483647, 'a'),
(17, 'Travis', 'Konecny', '', 'xkonec01', 1310991325, '8231fb8c8b04b789c185d5a2af03a850'),
(20, 'Scott', 'Laughton', '', 'xlaugh01', 2147483647, '4b08cf0fa43959e11a013ca49f87c891'),
(22, 'Taylor', 'Leier', '', 'xleier01', 2147483647, 'e388c1c5df4933fa01f6da9f92595589'),
(24, 'Andrew', 'MacDonald', 'Bc', 'xmacdo01', 605901321, '9d466d1f15b15a7b9019fc453b14528b'),
(30, 'Brandon', 'Manning', '', 'xmanni01', 305616877, '9979680301c340eddc64e9c081496b4d'),
(28, 'Samuel', 'Morin', '', 'xmorin01', 1111995513, 'da58bb7377b993822c0e7e409dedbb3d'),
(32, 'Michal', 'Neuvirth', '', 'xneuvi01', 211971616, '3df087ab575d229342f6ed790ef080d5'),
(18, 'Nolan', 'Patrick', '', 'xpatri01', 1704871556, 'c44a471bd78cc6c2fea32b9fe028d30a'),
(23, 'Ivan', 'Provorov', 'Bc', 'xprovo01', 701971562, 'c7fe6a21fbbeb9e3f078fb6be6670cfb'),
(21, 'Michael', 'Raffl', '', 'xraffl01', 1909981353, 'b220013c5830f214ab0101ddd205b267'),
(37, 'Marcus', 'Rashford', '', 'xrashf01', 209974465, 'fa8abe1381c84744c34bebfb61d89f89'),
(38, 'Juan', 'Roman', '', 'xroman01', 1501950145, 'e10adc3949ba59abbe56e057f20f883e'),
(36, 'Wayne', 'Rooney', '', 'xroone01', 512861515, '84bc43abf4363c80b64719c0c3afc6cf'),
(27, 'Travis', 'Sanheim', 'Bc', 'xsanhe01', 609995161, '48b62dff7522d670b13d2614a4107c60'),
(35, 'Luke', 'Shaw', 'Bc', 'xshawl01', 30494315, '2727b83d6913882def3ca8c64314f26a'),
(13, 'Wayne', 'Simmonds', '', 'xsimmo01', 1012871245, '065f7ed2c6421cd873003769e60a929a'),
(12, 'Jakub', 'Voráček', '', 'xvorac01', 1201974459, '4b08cf0fa43959e11a013ca49f87c891'),
(15, 'Jordan', 'Weal', '', 'xwealj01', 2147483647, 'd9ec5f5e78aa7174e466f1ba50846627'),
(19, 'Dale', 'Weise', '', 'xweise01', 2147483647, '25d55ad283aa400af464c76d713c07ad'),
(33, 'Ashley', 'Young', '', 'xyoung01', 212876165, '98dae0e08c01f9e64dc3f9650eb5a714');

-- --------------------------------------------------------

--
-- Struktura tabulky `tym`
--

CREATE TABLE `tym` (
  `id_resitel` int(11) NOT NULL,
  `nazev_tymu` varchar(30) NOT NULL,
  `login_vedouciho` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `tym`
--

INSERT INTO `tym` (`id_resitel`, `nazev_tymu`, `login_vedouciho`) VALUES
(39, 'Dream team', 'xroman01'),
(11, 'Flyers', 'xgirou01'),
(13, 'Rangers', 'xsimmo01'),
(14, 'Blackhawks', 'xcoutu01'),
(15, 'Flames', 'xwealj01'),
(16, 'Panthers', 'xfilpp01'),
(17, 'Bolts', 'xkonec01'),
(18, 'Coyotes', 'xpatri01'),
(19, 'Penguins', 'xweise01'),
(20, 'Bruins', 'xlaugh01'),
(21, 'Leafs', 'xraffl01'),
(22, 'Senators', 'xleier01'),
(23, 'Jets', 'xprovo01'),
(24, 'Blues', 'xmacdo01');

-- --------------------------------------------------------

--
-- Struktura tabulky `varianta`
--

CREATE TABLE `varianta` (
  `id_varianta` int(11) NOT NULL,
  `nazev` varchar(50) NOT NULL,
  `maximum_resitelu` int(11) NOT NULL,
  `popis` varchar(100) NOT NULL,
  `studentu_v_tymu` int(11) NOT NULL,
  `vedouci` int(11) NOT NULL,
  `projekt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `varianta`
--

INSERT INTO `varianta` (`id_varianta`, `nazev`, `maximum_resitelu`, `popis`, `studentu_v_tymu`, `vedouci`, `projekt`) VALUES
(1, 'První varianta', 10, 'http://www.fit.vutbr.cz/IDS/aasdsdf', 5, 1, 1),
(2, 'Druhá varianta', 10, 'http://www.fit.vutbr.cz/IDS/agffgsdf', 5, 1, 1),
(3, 'Třetí varianta', 10, 'http://www.fit.vutbr.cz/IDS/ffffsdf', 5, 1, 1),
(4, 'První varianta', 10, 'http://www.fit.vutbr.cz/IDS/sdsdsdf', 5, 1, 2),
(5, 'Druhá varianta', 10, 'http://www.fit.vutbr.cz/IDS/qweqfsdf', 5, 1, 2),
(6, 'První­ varianta', 50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo interdum rhoncus. ', 1, 15, 5),
(7, 'První varianta', 50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo interdum rhoncus. ', 1, 3, 6),
(8, 'První varianta', 50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo interdum rhoncus. ', 1, 1, 7),
(9, 'Druhá varianta', 50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo interdum rhoncus. ', 1, 15, 6),
(10, 'Třetí varianta', 50, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec commodo interdum rhoncus. ', 1, 10, 6),
(11, 'První varianta', 10, 'První varianta 3. projektu do IDS', 5, 1, 3),
(12, 'Druhá varianta', 10, 'Druhá varianta 3. projektu do IDS', 5, 1, 3),
(13, 'První varianta', 10, 'První varianta 4. projektu do IDS', 5, 1, 4),
(14, 'Druhá varianta', 10, 'Druhá varianta 4. projektu do IDS', 5, 1, 4),
(15, 'Výroba másla v ČR', 30, 'popis projektu do předmětu modelování a simulace', 1, 1, 8),
(16, 'Doprava zboží nebo osob', 30, 'popis projektu do předmětu modelování a simulace', 1, 1, 8),
(17, 'Služby, infrastruktura a energetika', 30, 'popis projektu do předmětu modelování a simulace', 1, 1, 8),
(18, 'Počítačové služby', 30, 'popis projektu do předmětu modelování a simulace', 1, 1, 8),
(19, 'Celulární automaty', 30, 'popis projektu do předmětu modelování a simulace', 1, 1, 8),
(20, 'První varianta', 150, 'Popis prvního projektu do předmětu IOS', 1, 13, 9),
(21, 'První varianta', 150, 'Popis druhého projektu do předmětu IOS', 1, 13, 10),
(22, 'Hra had', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(23, 'Hra šachy', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(24, 'Hra dáma', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(25, 'Hra lodě', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(26, 'Program na výuku psaní všemi 10', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(27, 'Výuka slovíček', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(28, 'Program na úpravu videa', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(29, 'Program na úpravu fotek', 5, 'Popis varianty k projektu ITU', 1, 6, 11),
(30, 'Textový editor', 5, 'Popis varianty k projektu ITU', 1, 6, 11);

-- --------------------------------------------------------

--
-- Struktura tabulky `vyucujici`
--

CREATE TABLE `vyucujici` (
  `id_vyucujici` int(11) NOT NULL,
  `login` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jmeno` varchar(50) NOT NULL,
  `titul` varchar(25) DEFAULT NULL,
  `kontakt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `vyucujici`
--

INSERT INTO `vyucujici` (`id_vyucujici`, `login`, `password`, `jmeno`, `titul`, `kontakt`) VALUES
(1, 'ykaspa00', 'vyucujici', 'Gary Kasparov', '', 123456798),
(2, 'ykasaa00', 'vyucujici', 'Magnus Carlsen', '', 123123123),
(3, 'yksdpa00', 'vyucujici', 'Hikaru Nakamura', '', 123123123),
(4, 'ykassd20', 'vyucujici', 'Boris Spasky', '', 123131233),
(5, 'yasdpa00', 'vyucujici', 'Pavel Eljanov', '', 123456787),
(6, 'ycarua00', '8d788385431273d11e8b43bb78f3aa41', 'Fabiano Caruana', 'PhD', 608799826),
(7, 'ysowes00', '8d788385431273d11e8b43bb78f3aa41', 'Wesley So', 'doc', 2147483647),
(8, 'yaroni00', '4590b324b362dd9ae10123e1ce5d8324', 'Levon Aronian', 'PhD', 478656211),
(9, 'yfisch00', 'c05f63db211c6ef25b6877b0ea723f34', 'Bobby Fischer', 'PhD', NULL),
(10, 'ykarja00', '2c5293ce7fdd324f20a39dced4135f28', 'Sergej Karjakin', 'CSc', NULL),
(11, 'ykarpo00', '2b16e0b9e7cbcbe95dd5dbbe2643bd8c', 'Anatolij Karpov', 'PhD', 887565684),
(12, 'yhakst00', 'c83b2d5bb1fb4d93d9d064593ed6eea2', 'Dave Hakstol', 'Ing', 515648894),
(13, 'yhexta00', 'cc0b044bf6d02448f2ff41b8c422be5d', 'Ron Hextall', 'prof', 651684686),
(14, 'ynakam00', '0d9c21cce1ef15529e302df9845fa591', 'Hikaru Nakamura', '', 465465432),
(15, 'ygiria00', '68eeb3e1ab51e3442b9ad94be9ecc7c1', 'Anish Giri', 'prof', 316516513);

-- --------------------------------------------------------

--
-- Struktura tabulky `zapsany_predmet`
--

CREATE TABLE `zapsany_predmet` (
  `login` varchar(8) NOT NULL,
  `id_predmet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `zapsany_predmet`
--

INSERT INTO `zapsany_predmet` (`login`, `id_predmet`) VALUES
('xcoutu01', 1),
('xcoutu01', 3),
('xcoutu01', 4),
('xcoutu01', 7),
('xcoutu01', 16),
('xellio01', 1),
('xellio01', 2),
('xellio01', 9),
('xellio01', 10),
('xellio01', 11),
('xellio01', 12),
('xellio01', 14),
('xellio01', 17),
('xellio01', 19),
('xfilpp01', 1),
('xfilpp01', 3),
('xfilpp01', 8),
('xfilpp01', 13),
('xfilpp01', 18),
('xgirou01', 1),
('xgirou01', 3),
('xgirou01', 5),
('xgirou01', 6),
('xgirou01', 12),
('xgirou01', 13),
('xgosti01', 1),
('xgosti01', 12),
('xgosti01', 14),
('xgudas01', 1),
('xgudas01', 3),
('xgudas01', 6),
('xgudas01', 11),
('xgudas01', 13),
('xgudas01', 21),
('xhaggr01', 1),
('xhaggr01', 2),
('xhaggr01', 7),
('xhaggr01', 11),
('xhruba08', 1),
('xhruba08', 2),
('xhruba08', 4),
('xjones01', 1),
('xjones01', 2),
('xjones01', 11),
('xjones01', 12),
('xjones01', 15),
('xjones01', 20),
('xjones01', 21),
('xkonec01', 1),
('xkonec01', 5),
('xkonec01', 9),
('xkonec01', 13),
('xkonec01', 19),
('xkonec01', 20),
('xkonec01', 21),
('xlaugh01', 1),
('xlaugh01', 6),
('xlaugh01', 7),
('xlaugh01', 16),
('xlaugh01', 17),
('xlaugh01', 20),
('xlaugh01', 21),
('xleier01', 1),
('xleier01', 3),
('xleier01', 5),
('xleier01', 9),
('xleier01', 12),
('xleier01', 13),
('xleier01', 18),
('xleier01', 19),
('xmacdo01', 1),
('xmacdo01', 2),
('xmacdo01', 3),
('xmacdo01', 6),
('xmacdo01', 7),
('xmacdo01', 11),
('xmacdo01', 12),
('xmanni01', 1),
('xmanni01', 2),
('xmanni01', 7),
('xmanni01', 13),
('xmanni01', 17),
('xmorin01', 1),
('xmorin01', 2),
('xmorin01', 4),
('xmorin01', 5),
('xmorin01', 8),
('xmorin01', 12),
('xmorin01', 14),
('xmorin01', 20),
('xmorin01', 21),
('xneuvi01', 1),
('xneuvi01', 2),
('xneuvi01', 3),
('xneuvi01', 5),
('xneuvi01', 15),
('xneuvi01', 18),
('xpatri01', 1),
('xpatri01', 4),
('xpatri01', 6),
('xpatri01', 12),
('xpatri01', 14),
('xpatri01', 15),
('xpatri01', 19),
('xprovo01', 1),
('xprovo01', 2),
('xprovo01', 3),
('xprovo01', 7),
('xprovo01', 8),
('xprovo01', 10),
('xprovo01', 19),
('xprovo01', 20),
('xraffl01', 1),
('xraffl01', 3),
('xraffl01', 5),
('xraffl01', 7),
('xraffl01', 9),
('xraffl01', 10),
('xraffl01', 15),
('xrashf01', 1),
('xroman01', 1),
('xroman01', 2),
('xroman01', 3),
('xroman01', 5),
('xroman01', 6),
('xroman01', 7),
('xroman01', 8),
('xroman01', 9),
('xroman01', 12),
('xroman01', 14),
('xroman01', 18),
('xsanhe01', 1),
('xsanhe01', 2),
('xsanhe01', 4),
('xsanhe01', 10),
('xsanhe01', 12),
('xsanhe01', 14),
('xsanhe01', 21),
('xsimmo01', 1),
('xsimmo01', 2),
('xsimmo01', 3),
('xsimmo01', 7),
('xsimmo01', 9),
('xsimmo01', 20),
('xsimmo01', 22),
('xvorac01', 1),
('xwealj01', 1),
('xwealj01', 6),
('xwealj01', 7),
('xwealj01', 10),
('xwealj01', 11),
('xwealj01', 16),
('xwealj01', 17),
('xweise01', 1),
('xweise01', 2),
('xweise01', 3),
('xweise01', 6),
('xweise01', 11),
('xweise01', 12),
('xyoung01', 1),
('xyoung01', 7),
('xyoung01', 16);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login`);

--
-- Klíče pro tabulku `clenove_teamu`
--
ALTER TABLE `clenove_teamu`
  ADD KEY `FK_team` (`id_teamu`);

--
-- Klíče pro tabulku `informace`
--
ALTER TABLE `informace`
  ADD PRIMARY KEY (`id_informace`),
  ADD KEY `FK_hodnotici` (`hodnotici`);

--
-- Klíče pro tabulku `predmet`
--
ALTER TABLE `predmet`
  ADD PRIMARY KEY (`id_predmet`),
  ADD KEY `FK_prednasejici` (`id_prednasejici`),
  ADD KEY `FK_cvicici` (`id_cvicici`),
  ADD KEY `FK_garant` (`id_garant`);

--
-- Klíče pro tabulku `prihlasena_varianta`
--
ALTER TABLE `prihlasena_varianta`
  ADD UNIQUE KEY `id_resitel` (`id_resitel`,`id_varianta`),
  ADD KEY `FK_reseni` (`info_reseni`),
  ADD KEY `FK_id_varianta` (`id_varianta`);

--
-- Klíče pro tabulku `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`id_projekt`),
  ADD KEY `FK_zadavatel` (`zadavatel`),
  ADD KEY `FK_predmet` (`predmet`);

--
-- Klíče pro tabulku `resitel`
--
ALTER TABLE `resitel`
  ADD PRIMARY KEY (`id_resitel`);

--
-- Klíče pro tabulku `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `FK_student` (`id_resitel`);

--
-- Klíče pro tabulku `tym`
--
ALTER TABLE `tym`
  ADD KEY `FK_tym` (`id_resitel`);

--
-- Klíče pro tabulku `varianta`
--
ALTER TABLE `varianta`
  ADD PRIMARY KEY (`id_varianta`),
  ADD KEY `FK_vedouci` (`vedouci`),
  ADD KEY `FK_projekt` (`projekt`);

--
-- Klíče pro tabulku `vyucujici`
--
ALTER TABLE `vyucujici`
  ADD PRIMARY KEY (`id_vyucujici`);

--
-- Klíče pro tabulku `zapsany_predmet`
--
ALTER TABLE `zapsany_predmet`
  ADD UNIQUE KEY `login` (`login`,`id_predmet`),
  ADD KEY `FK_id_predmet` (`id_predmet`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `informace`
--
ALTER TABLE `informace`
  MODIFY `id_informace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pro tabulku `predmet`
--
ALTER TABLE `predmet`
  MODIFY `id_predmet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pro tabulku `projekt`
--
ALTER TABLE `projekt`
  MODIFY `id_projekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pro tabulku `resitel`
--
ALTER TABLE `resitel`
  MODIFY `id_resitel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pro tabulku `varianta`
--
ALTER TABLE `varianta`
  MODIFY `id_varianta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pro tabulku `vyucujici`
--
ALTER TABLE `vyucujici`
  MODIFY `id_vyucujici` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `informace`
--
ALTER TABLE `informace`
  ADD CONSTRAINT `FK_hodnotici` FOREIGN KEY (`hodnotici`) REFERENCES `vyucujici` (`id_vyucujici`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
