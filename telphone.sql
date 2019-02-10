-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 10 2019 г., 19:48
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phonebook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `telphone`
--

CREATE TABLE `telphone` (
  `id` int(11) UNSIGNED NOT NULL,
  `fio` varchar(100) NOT NULL,
  `telepfon` int(11) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `telphone`
--

INSERT INTO `telphone` (`id`, `fio`, `telepfon`, `address`) VALUES
(1, 'Каюмова С.А.', 507052, 'Блюхера 15'),
(2, 'Ивахненко Е.А.', 506030, 'Естая 22'),
(3, 'Бабаян Т.А.', 502030, 'Катаева 16'),
(4, 'Иванов И.И.', 500101, 'Ленина 12'),
(5, 'Сергеева Т.А.', 527766, 'Архангельская 12'),
(6, 'Сидоренко Н.Е.', 556290, 'Лесная 44');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `telphone`
--
ALTER TABLE `telphone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `telphone`
--
ALTER TABLE `telphone`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
