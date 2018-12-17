-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 17 2018 г., 10:08
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ingenerblog2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title_art` varchar(256) NOT NULL,
  `id_Cat` int(11) NOT NULL,
  `id_pod_Cat` int(11) DEFAULT NULL,
  `pub_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0',
  `text_art` text NOT NULL,
  `img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title_art`, `id_Cat`, `id_pod_Cat`, `pub_date`, `views`, `text_art`, `img`) VALUES
(1, 'Зачем нужны ГОСТы?', 1, 1, '2018-07-05 07:34:30', 48, 'ГОСТ — это государственный стандарт, который формулирует требования государства к качеству продукции, работ и услуг, имеющих межотраслевое значение. ГОСТы устанавливаются на основе применения современных достижений науки, технологий и практического опыта с учетом последних редакций международных стандартов или их проектов. \nСистема ГОСТов была разработана и запущена еще в СССР. С 1992 года государственный стандарт Российской Федерации имеет обозначение ГОСТ Р. Он подтверждает, что продукция прошла проверку и отвечает всем требованиям безопасности. В 2003 году государственные стандарты, принятые Госстандартом России до 1 июля 2003 года, признаны национальными.', 'gosts.jpg'),
(2, 'Что такое интеграл?', 1, 2, '2018-07-05 07:36:56', 106, 'Интеграл — одно из важнейших понятий математического анализа, которое возникает при решении задач о нахождении площади под кривой, пройденного пути при неравномерном движении, массы неоднородного тела, и тому подобных, а также в задаче о восстановлении функции по её производной (неопределённый интеграл). Упрощённо интегралачяа можно представить как аналог суммы для бесконечного числа бесконечно малых слагаемых. В зависимости от пространства, на котором задана подынтегральная функция, интеграл может быть — двойной, тройной, криволинейный, поверхностный и так далее; также существуют разные подходы к определению интеграла — различают интегралы Римана, Лебега, Стилтьеса и другие.\r\nИнтеграл — одно из важнейших понятий математического анализа, которое возникает при решении задач о нахождении площади под кривой, пройденного пути при неравномерном движении, массы неоднородного тела, и тому подобных, а также в задаче о восстановлении функции по её производной (неопределённый интеграл). Упрощённо интеграл можно представить как аналог суммы для бесконечного числа бесконечно малых слагаемых. В зависимости от пространства, на котором задана подынтегральная функция, интеграл может быть — двойной, тройной, криволинейный, поверхностный и так далее; также существуют разные подходы к определению интеграла — различают интегралы Римана, Лебега, Стилтьеса и другие.', 'integral.jpg'),
(3, 'Статья без текста', 1, 2, '2018-12-16 20:51:47', 0, '', 'iframe2.png'),
(4, 'Что такое интеграл 2?', 1, 2, '2018-12-16 20:53:16', 12, 'Интеграл — одно из важнейших понятий математического анализа, которое возникает при решении задач о нахождении площади под кривой, пройденного пути при неравномерном движении, массы неоднородного тела, и тому подобных, а также в задаче о восстановлении функции по её производной (неопределённый интеграл). Упрощённо интегралачяа можно представить как аналог сумм', 'integral.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Cat`
--

CREATE TABLE `Cat` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Cat`
--

INSERT INTO `Cat` (`id`, `title`) VALUES
(1, 'Уроки/статьи'),
(2, 'Программы'),
(3, 'Книги'),
(4, 'Фильмы');

-- --------------------------------------------------------

--
-- Структура таблицы `FavoritesArt`
--

CREATE TABLE `FavoritesArt` (
  `id_fav` int(11) NOT NULL,
  `id_art` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `FavoritesArt`
--

INSERT INTO `FavoritesArt` (`id_fav`, `id_art`, `id_user`) VALUES
(84, 2, 5),
(123, 4, 1),
(124, 1, 1),
(132, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `podCat`
--

CREATE TABLE `podCat` (
  `id` int(11) NOT NULL,
  `title_pod_cat` varchar(256) NOT NULL,
  `id_Cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `podCat`
--

INSERT INTO `podCat` (`id`, `title_pod_cat`, `id_Cat`) VALUES
(1, 'Чертежи', 1),
(2, 'Математика', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `name` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `Login` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `token_res_pass` varchar(256) DEFAULT NULL,
  `TrueEmail` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `img` varchar(256) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`name`, `id`, `Login`, `email`, `pass`, `token`, `token_res_pass`, `TrueEmail`, `time`, `img`) VALUES
('Олег', 1, 'Oleg', 'OlegLaban@yandex.by', '$2y$10$1Q8huZA2Y96nyo5WVA5YHutd4ft9zVxa6aa/Po5CM1YnNFa7O/pfC', 'NULL', NULL, 1, 1531984759, '9706466d0310720b7330b550c04995ad'),
('Oleg', 5, 'Gelo', 'oleg19432@gmail.com', '$2y$10$DQdhhPLy.vlFD45i8plWdeMYY.nC1WkQGapUQELVjYHV3cpCKFRQW', 'NULL', NULL, 1, 1532334666, '04a2935319132914b93c7cd195310e56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Cat`
--
ALTER TABLE `Cat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `FavoritesArt`
--
ALTER TABLE `FavoritesArt`
  ADD PRIMARY KEY (`id_fav`);

--
-- Индексы таблицы `podCat`
--
ALTER TABLE `podCat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Cat`
--
ALTER TABLE `Cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `FavoritesArt`
--
ALTER TABLE `FavoritesArt`
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT для таблицы `podCat`
--
ALTER TABLE `podCat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
