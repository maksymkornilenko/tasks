-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 08 2020 г., 21:36
-- Версия сервера: 5.6.47-log
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `edit_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `text`, `status`, `edit_admin`) VALUES
(1, 'test12', 'ms@ml.ru\r\n', 'test1', 1, 1),
(2, 'test2', 'nb@gb.com\r\n', 'test2', 0, 1),
(5, 'test12', '', 'ewqreter', 0, 0),
(6, 'test12', '', 'eqwrewtterter', 0, 0),
(7, 'asdqwe', '', 'qwrffdsdsgthf', 0, 0),
(8, 'xzcdas', '', 'qetweterte', 0, 0),
(9, 'cxzvhrthty', '', 'ertuy46utyjjj', 0, 0),
(10, 'asdqwe', 'ms@ml.ru', 'qweqweqw', 0, 0),
(11, 'test12', 'kornilenkoms@mail.ru', 'eqwrew3432543', 0, 0),
(12, 'test12', 'kornilenkoms@mail.ru', 'куцукеу55464654745', 0, 0),
(13, 'test12', 'kornilenkoms@mail.ru', 'gdhryujtyityjukukiu', 0, 0),
(14, 'test12', 'kornilenkoms@mail.ru', 'gdhryujtyityjukukiu', 0, 0),
(15, 'asdqwe', 'nb@gb.com', 'rewt4543665464', 0, 0),
(16, 'qewerewrrt', '321@mail.com', '435eetertyrtry', 0, 0),
(17, 'asdqwe', '321@mail.com', 'eqwrewterteryrt', 0, 0),
(18, 'asdqwe', 'nb@gb.com', 'ewrtget43ty5yyrth', 0, 0),
(19, 'asdqwe', 'kornilenkoms@mail.ru', 'ewwtewt45345435', 0, 0),
(20, 'asdqwe', 'kornilenkoms@mail.ru', 'ewwtewt45345435', 0, 0),
(21, 'xzcdas', 'ms@ml.ru', 'rwtret363654z45', 0, 0),
(22, 'test12', 'kornilenkoms@mail.ru', 'fsgergtrtthrzht', 0, 0),
(23, 'xzcdas', 'kornilenkoms@mail.ru', 'drewtere', 0, 0),
(24, 'test12', 'example123@com.ua', 'xydfdsgffd', 0, 0),
(25, 'asdqwe', 'nb@gb.com', 'ffdhhgfj', 0, 0),
(26, 'test12', 'kornilenkoms@mail.ru', 'fdsgstrterztruzrt', 0, 0),
(27, 'test12', 'kornilenkoms@mail.ru', 'dafsgdzerzerz', 0, 0),
(28, 'asdqwe', 'kornilenkoms@mail.ru', '43534643', 0, 0),
(29, 'test12', 'kornilenkoms@mail.ru', '432543643', 0, 0),
(30, 'test12', 'kornilenkoms@mail.ru', '432543643', 0, 0),
(31, 'asdqwe', '321@mail.com', 'ferehtyky;ikjtyhjtyj', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `full_name`, `email`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
