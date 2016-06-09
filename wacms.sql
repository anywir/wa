-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 09 2016 р., 17:24
-- Версія сервера: 5.6.26-log
-- Версія PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `wacms`
--

-- --------------------------------------------------------

--
-- Структура таблиці `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_autor` int(11) NOT NULL,
  `tema` char(250) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп даних таблиці `news`
--

INSERT INTO `news` (`id`, `id_autor`, `tema`, `text`, `date`) VALUES
(1, 1, 'first news', 'this is a first news in my  site', '2016-06-08 21:00:00'),
(2, 1, 'second news', 'second news in my site is this now', '2016-06-08 21:00:00'),
(3, 0, 'third news', 'jhfde;wqkj fh;wkjehf;kjw', '2016-06-09 12:17:13'),
(4, 1, 'third news', 'wsws wef wef qwefef qwef', '2016-06-09 12:17:39'),
(5, 1, '2 32f 234f234', ' gsdfgwer gwer gwer gwer', '2016-06-09 12:20:02');

-- --------------------------------------------------------

--
-- Структура таблиці `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(24) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `user_login`
--

INSERT INTO `user_login` (`id`, `login`, `password`) VALUES
(1, 'adm', 'b09c600fddc573f117449b3723f23d64');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
