-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 07 2022 г., 05:24
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yktkid`
--

-- --------------------------------------------------------

--
-- Структура таблицы `parents`
--

CREATE TABLE `parents` (
  `id` int(255) NOT NULL,
  `namep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surnamep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymicp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userpicp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'defaultUP.png',
  `emailp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwordp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `parents`
--

INSERT INTO `parents` (`id`, `namep`, `surnamep`, `patronymicp`, `userpicp`, `emailp`, `passwordp`) VALUES
(1, 'Андрей', 'Егоров', 'Васильевич', 'defaultUP.png', 'andrey.ger@mail.ru', 'microlab'),
(3, 'Нарыйаана', 'Егорова', 'Иннокентьевна', 'defaultUP.png', 'nari.egorova@mail.ru', 'nari.tads');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
