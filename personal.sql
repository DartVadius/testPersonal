-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 15 2017 г., 00:11
-- Версия сервера: 5.7.16
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `personal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(2) UNSIGNED NOT NULL,
  `dept_title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_title`) VALUES
(1, 'dept1'),
(2, 'dept2'),
(3, 'dept3'),
(4, 'dept4');

-- --------------------------------------------------------

--
-- Структура таблицы `employes`
--

CREATE TABLE `employes` (
  `employes_id` int(5) UNSIGNED NOT NULL,
  `employes_name` varchar(255) NOT NULL,
  `employes_birthday` date DEFAULT NULL,
  `employes_dept_id` int(2) UNSIGNED NOT NULL,
  `employes_pos_id` int(5) UNSIGNED NOT NULL,
  `employes_salary` enum('hour','month') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employes`
--

INSERT INTO `employes` (`employes_id`, `employes_name`, `employes_birthday`, `employes_dept_id`, `employes_pos_id`, `employes_salary`) VALUES
(1, 'Vasya Pupkin', '1985-02-15', 1, 1, 'hour'),
(2, 'Petya Sydorov', '1981-02-15', 1, 2, 'month'),
(3, 'Pedro', '2000-02-05', 2, 3, 'hour'),
(4, 'Hose', '2000-02-05', 2, 3, 'month');

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `position_id` int(5) UNSIGNED NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `position_salary_hour` float UNSIGNED DEFAULT NULL,
  `position_salary_month` float UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`position_id`, `position_title`, `position_salary_hour`, `position_salary_month`) VALUES
(1, 'pos1', 5, 1500),
(2, 'pos2', 3, 1000),
(3, 'pos3', 10, 10000),
(4, 'pos4', 15, 15000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `dept_id_UNIQUE` (`dept_id`);

--
-- Индексы таблицы `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`employes_id`),
  ADD UNIQUE KEY `person_id_UNIQUE` (`employes_id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`),
  ADD UNIQUE KEY `position_id_UNIQUE` (`position_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dept`
--
ALTER TABLE `dept`
  MODIFY `dept_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `employes`
--
ALTER TABLE `employes`
  MODIFY `employes_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
