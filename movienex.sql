-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 25 2023 г., 01:06
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `movienex`
--
CREATE DATABASE `movienex`;
USE `movienex`;
-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `film_id` varchar(255) NOT NULL,
  `film_poster` varchar(512) NOT NULL,
  `film_title` varchar(255) NOT NULL,
  `film_price` varchar(255) NOT NULL,
  `film_type` varchar(255) NOT NULL,
  `film_year` varchar(255) NOT NULL,
  `user_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`film_id`, `film_poster`, `film_title`, `film_price`, `film_type`, `film_year`, `user_Id`) VALUES
('tt0042192', 'https://m.media-amazon.com/images/M/MV5BYmE1M2Y3NTYtYTI0Mi00N2JlLTkzMzItOTY1MTlhNWNkMDgzXkEyXkFqcGdeQXVyMTUzMDUzNTI3._V1_SX300.jpg', 'All About Eve', '', 'movie', '1950', 24),
('tt0842926', 'https://m.media-amazon.com/images/M/MV5BMjE4NTMwNDg5MF5BMl5BanBnXkFtZTcwNDY2ODE0Mw@@._V1_SX300.jpg', 'The Kids Are All Right', '', 'movie', '2010', 24),
('tt1016150', 'https://m.media-amazon.com/images/M/MV5BMzM4ZDJhYjYtZGY5Ny00NTk0LWI4ZTYtNjczZDFiMGI2ZjEzXkEyXkFqcGdeQXVyNjc5NjEzNA@@._V1_SX300.jpg', 'All Quiet on the Western Front', '', 'movie', '2022', 24),
('tt6710474', 'https://m.media-amazon.com/images/M/MV5BYTdiOTIyZTQtNmQ1OS00NjZlLWIyMTgtYzk5Y2M3ZDVmMDk1XkEyXkFqcGdeQXVyMTAzMDg4NzU0._V1_SX300.jpg', 'Everything Everywhere All at Once', '', 'movie', '2022', 24),
('tt7395114', 'https://m.media-amazon.com/images/M/MV5BZmE1NmVmN2EtMjZmZC00YzAyLWE4MWEtYjY5YmExMjUxODU1XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SX300.jpg', 'The Devil All the Time', '', 'movie', '2020', 24),
('tt0042192', 'https://m.media-amazon.com/images/M/MV5BYmE1M2Y3NTYtYTI0Mi00N2JlLTkzMzItOTY1MTlhNWNkMDgzXkEyXkFqcGdeQXVyMTUzMDUzNTI3._V1_SX300.jpg', 'All About Eve', '$63,463', 'movie', '1950', 25),
('tt0074119', 'https://m.media-amazon.com/images/M/MV5BOWI2YWQxM2MtY2U4Yi00YjgzLTgwNzktN2ExNTgzNTIzMmUzXkEyXkFqcGdeQXVyMTAwMzUyOTc@._V1_SX300.jpg', 'All the President\'s Men', '$70,600,000', 'movie', '1976', 25),
('tt0116705', 'https://m.media-amazon.com/images/M/MV5BMmJlYzViNzctMjQ1Ni00ZWQ4LThkN2YtMzI2ZGU5Nzk0NTAyXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg', 'Jingle All the Way', '$60,592,389', 'movie', '1996', 25),
('tt2250912', 'https://m.media-amazon.com/images/M/MV5BNTk4ODQ1MzgzNl5BMl5BanBnXkFtZTgwMTMyMzM4MTI@._V1_SX300.jpg', 'Spider-Man: Homecoming', '$334,201,140', 'movie', '2017', 25),
('tt6710474', 'https://m.media-amazon.com/images/M/MV5BYTdiOTIyZTQtNmQ1OS00NjZlLWIyMTgtYzk5Y2M3ZDVmMDk1XkEyXkFqcGdeQXVyMTAzMDg4NzU0._V1_SX300.jpg', 'Everything Everywhere All at Once', '$77,191,785', 'movie', '2022', 25),
('tt7395114', 'https://m.media-amazon.com/images/M/MV5BZmE1NmVmN2EtMjZmZC00YzAyLWE4MWEtYjY5YmExMjUxODU1XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SX300.jpg', 'The Devil All the Time', 'N/A', 'movie', '2020', 25),
('tt0042192', 'https://m.media-amazon.com/images/M/MV5BYmE1M2Y3NTYtYTI0Mi00N2JlLTkzMzItOTY1MTlhNWNkMDgzXkEyXkFqcGdeQXVyMTUzMDUzNTI3._V1_SX300.jpg', 'All About Eve', '', 'movie', '1950', 28),
('tt1016150', 'https://m.media-amazon.com/images/M/MV5BMzM4ZDJhYjYtZGY5Ny00NTk0LWI4ZTYtNjczZDFiMGI2ZjEzXkEyXkFqcGdeQXVyNjc5NjEzNA@@._V1_SX300.jpg', 'All Quiet on the Western Front', '', 'movie', '2022', 28),
('tt6710474', 'https://m.media-amazon.com/images/M/MV5BYTdiOTIyZTQtNmQ1OS00NjZlLWIyMTgtYzk5Y2M3ZDVmMDk1XkEyXkFqcGdeQXVyMTAzMDg4NzU0._V1_SX300.jpg', 'Everything Everywhere All at Once', '', 'movie', '2022', 28),
('tt7395114', 'https://m.media-amazon.com/images/M/MV5BZmE1NmVmN2EtMjZmZC00YzAyLWE4MWEtYjY5YmExMjUxODU1XkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SX300.jpg', 'The Devil All the Time', '', 'movie', '2020', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `library`
--

CREATE TABLE `library` (
  `film_id` varchar(255) NOT NULL,
  `film_poster` varchar(512) NOT NULL,
  `film_title` varchar(255) NOT NULL,
  `film_price` varchar(255) NOT NULL,
  `film_type` varchar(255) NOT NULL,
  `film_year` varchar(255) NOT NULL,
  `user_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`film_id`, `film_poster`, `film_title`, `film_price`, `film_type`, `film_year`, `user_Id`) VALUES
('25', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userId`, `login`, `email`, `salt`, `password`) VALUES
(21, 'Talgat', 'anurbbekov2@gmail.com', '379D6F7cdAb9F1f193Ad820De9dD15e6', 'ae49de501e985780fb0ea02dffb6597d8de75c36'),
(23, 'null', 'null', 'acDc7Be8a6549C7Eb9CbbcD5eFc6F33a', 'null'),
(24, 'tala', 'fixplay513@gmail.com', 'BfBF9cFf93eC0Af1e5E7d8aF05C34Ec3', '1a2b87d92febaa28d5e73796e1af28ab0697ca82'),
(25, 'Nur', 'anurbbekov111@gmail.com', '9b9bB556c2d26bBBe0dB1865cCa1c2aB', 'db7a057163f94a13a9d39e885fc068d615d599db'),
(26, 'DexMine', 'anurbbekov513@gmail.com', '3507C4506d40bE82fc45aAe6FA978A2a', '31859fb98ed0f49a42e7a4d077f5232713b709cb'),
(28, 'DexMine', 'anurbbekov3@gmail.com', 'C95607820FE1CF0a6A854A410b5CaCCC', 'b28bd5a4e68bfd4aff9c6e27605009adddc06f2a');

--
-- Триггеры `users`
--
DELIMITER $$
CREATE TRIGGER `hash_passwordInsert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    SET NEW.password = SHA1(CONCAT(NEW.salt, MD5(NEW.password)));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hash_passwordUpdate` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF NEW.password <> OLD.password THEN
        SET NEW.password = SHA1(CONCAT(NEW.salt, MD5(NEW.password)));
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `salt_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
   IF NEW.salt != OLD.salt THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Cannot update the salt value';
    END IF;
END
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD UNIQUE KEY `unique_film_per_user` (`user_Id`,`film_id`),
  ADD UNIQUE KEY `idx_unique_film_user` (`film_id`,`user_Id`);

--
-- Индексы таблицы `library`
--
ALTER TABLE `library`
  ADD UNIQUE KEY `unique_film_per_user` (`user_Id`,`film_id`) USING BTREE,
  ADD UNIQUE KEY `idx_unique_film_user` (`film_id`,`user_Id`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `users` ADD FULLTEXT KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
