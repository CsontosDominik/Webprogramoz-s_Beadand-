-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3308
-- Létrehozás ideje: 2020. Ápr 27. 11:53
-- Kiszolgáló verziója: 8.0.18
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `wpbeadando`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `csalad_nev` varchar(64) NOT NULL,
  `kereszt_nev` varchar(64) NOT NULL,
  `email` varchar(250) NOT NULL,
  `jelszo` varchar(250) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`csalad_nev`, `kereszt_nev`, `email`, `jelszo`, `id`, `permission`) VALUES
('teszt', 'teszt', '0101@gmail.com', '1e5846ef94fa77238cc471e82aaf74a178134e14', 1, 1),
('teszt2', 'teszt2', 'abcdefghijok01@gmail.com', '2f712f2b4c17b108f5961465d36a19c98301c173', 2, 2),
('Akinek', 'Nincsennek Jogai', 'teszt01@teszt.com', '2f712f2b4c17b108f5961465d36a19c98301c173', 3, 0),
('teszt3', 'teszt3', 'teszt03@teszt.com', '0250a3ced6fb10378b66c124834a517446f03748', 4, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `felh_nev` varchar(40) NOT NULL,
  `tema` varchar(20) NOT NULL,
  `tema_szoveg` varchar(250) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`felh_nev`, `tema`, `tema_szoveg`, `id`) VALUES
('Ras', 'Programozás', 'Fárasztó, de mindig kifizetődik.', 1),
('Ras', 'Tanulás', 'Emiatt lett oda a kalkulus Zh-m', 2),
('Darkshade', 'Re:Tanulás', 'Átérzem az enyém is így járt', 3),
('Darkshade', 'Megtetszett idézet', 'Részegsége csodálatos tünyeménnyé hatalmasodott, mint az aurora borealis, ha teljes ívében kibontakozik a sarki égen.', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
