-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 29 2017 г., 18:15
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `puhov_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `1111articles`
--

CREATE TABLE `1111articles` (
  `id` int(11) NOT NULL,
  `category` varchar(55) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `id_category` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `1111articles`
--

INSERT INTO `1111articles` (`id`, `category`, `title`, `text`, `id_category`, `price`, `img`, `views`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'man', 'Alaska1', 'Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. ', 1, 999, 'gomer.jpg', 123, 0, 0, 1),
(2, 'man', 'Alaska2', 'Lorem ipsum dolor sit amet. Nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime. Consectetur, adipisci velit, sed. Ipsum, quia non numquam eius modi tempora incidunt, ut aliquid. Sapiente delectus, ut et expedita ', 1, 1999, 'gomer2.jpg', 333, 0, 1, 1),
(3, 'man', 'Alaska3', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. \r\ntaque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 2, 678, 'hat.jpg', 444, 0, 1, 1),
(4, 'man', 'Alaska4', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 2, 977, 'min.jpg', 1233, 0, 0, 1),
(5, 'man', 'Alaska5', 'Sit, aspernatur aut rerum facilis est et quas molestias. Cum soluta nobis est laborum et voluptates repudiandae sint et molestiae. Laborum et harum quidem rerum facilis est et dolore magnam aliquam quaerat. Tempore, cum soluta nobis est eligendi optio.', 3, 459, 'gomer.jpg', 11, 0, 1, 1),
(6, 'woman', 'Parka', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 3, 778, 'gomer.jpg', 452, 1, 1, 1),
(7, 'woman', 'Parka2', 'Sit, aspernatur aut rerum facilis est et quas molestias. Cum soluta nobis est laborum et voluptates repudiandae sint et molestiae. Laborum et harum quidem rerum facilis est et dolore magnam aliquam quaerat. Tempore, cum soluta nobis est eligendi optio.', 4, 444, 'gomer.jpg', 4444, 0, 1, 0),
(8, 'woman', 'Jacket', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 4, 424, 'min.jpg', 1111, 0, 1, 1),
(9, 'woman', 'Jacket2', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 4, 854, 'min.jpg', 883, 0, 1, 1),
(10, 'teen', 'teenager jacket', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 5, 111, 'min.jpg', 677, 1, 0, 1),
(11, 'teen', 'teenager jacket', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 6, 555, 'min.jpg', 865, 0, 1, 0),
(12, 'teen', 'teenager jacket', 'taque earum rerum facilis est eligendi optio, cumque nihil molestiae consequatur. Exercitationem ullam corporis suscipit laboriosam, nisi ut perspiciatis unde. Veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut enim ipsam. Excepturi sint, obcaecati cupiditate non numquam eius. ', 7, 787, 'min.jpg', 999, 1, 0, 1),
(13, 'kid', 'kid`s jacket', 'Vel illum, qui in ea voluptate velit esse, quam nihil impedit. Laboriosam, nisi ut et voluptates repudiandae sint et dolore magnam aliquam quaerat. Quod maxime placeat, facere possimus, omnis dolor repellendus natus error. Ab illo inventore veritatis et molestiae. Enim ipsam voluptatem, quia non provident, similique sunt in. Ipsam voluptatem, quia consequuntur magni dolores et aut perferendis. Debitis aut reiciendis voluptatibus maiores alias consequatur aut rerum facilis.', 10, 3333, 'pechet.jpg', 5555, 0, 1, 1),
(14, 'kid', 'kid`s jacket', 'Звездной величины, никак не об­наруживают. Низкой точностью галактик очень много, и нельзя решить, какой именно. Ожидать, являются объектами, входящими в силу закона. Туманностями и оптически яркие объекты, тогда гипотетические радиозвезды. Оптическое излучение будет все-таки слишком слабым останется. Радиоизлучения оптический объект нужно искать в на отождествление. Искать в радиоволнах, больше, чем у таких звезд. Их радиоизлучение которого достаточно сильное. Искать в окнах видимости между облаками пылевой материи после открытия дискретных.\n\nVel illum, qui in ea voluptate velit esse, quam nihil impedit. Laboriosam, nisi ut et voluptates repudiandae sint et dolore magnam aliquam quaerat. Quod maxime placeat, facere possimus, omnis dolor repellendus natus error. Ab illo inventore veritatis et molestiae. Enim ipsam voluptatem, quia non provident, similique sunt in. Ipsam voluptatem, quia consequuntur magni dolores et aut perferendis. Debitis aut reiciendis voluptatibus maiores alias consequatur aut rerum facilis.Vel illum, qui in ea voluptate velit esse, quam nihil impedit. Laboriosam, nisi ut et voluptates repudiandae sint et dolore magnam aliquam quaerat. Quod maxime placeat, facere possimus, omnis dolor repellendus natus error. Ab illo inventore veritatis et molestiae. Enim ipsam voluptatem, quia non provident, similique sunt in. Ipsam voluptatem, quia consequuntur magni dolores et aut perferendis. Debitis aut reiciendis voluptatibus maiores alias consequatur aut rerum facilis.', 10, 5656, 'pechet.jpg\n', 564, 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_short` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_image` tinyint(1) DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `description_short`, `description`, `slug`, `image`, `show_image`, `meta_title`, `meta_description`, `meta_keyword`, `published`, `viewed`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(3, 'nikita post', 'short desc', 'full desc full desc full desc full desc', 'nikita-post', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2017-10-28 17:10:49', '2017-10-28 17:10:49'),
(4, 'post 1', 'nikita post', 'nikita postnikita postnikita postnikita post', 'post-1', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2017-10-28 17:53:43', '2017-10-28 17:53:43'),
(5, 'post 2', 'qqqqqq', 'wwwwww', 'post-2', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2017-10-28 17:56:40', '2017-10-28 17:56:40'),
(8, 'art art 1', 'Краткое описание', 'Описание', 'art-art-1', NULL, NULL, 'Мета заголовок', 'Мета описание', 'Слова, ключ, тест', 0, NULL, 1, NULL, '2017-10-28 20:25:29', '2017-10-28 20:25:29');

-- --------------------------------------------------------

--
-- Структура таблицы `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `article_category`
--

INSERT INTO `article_category` (`id`, `name`, `sort_order`) VALUES
(1, 'Рубашки', 1),
(2, 'Сумки', 2),
(3, 'Футболки', 3),
(4, 'Майки', 4),
(5, 'Платья', 5),
(6, 'Брюки', 6),
(7, 'Пиджаки', 7),
(10, 'Юбки', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `categoryables`
--

CREATE TABLE `categoryables` (
  `category_name_id` int(11) NOT NULL,
  `categoryable_id` int(11) NOT NULL,
  `categoryable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categoryables`
--

INSERT INTO `categoryables` (`category_name_id`, `categoryable_id`, `categoryable_type`) VALUES
(10, 8, 'App\\Models\\Article');

-- --------------------------------------------------------

--
-- Структура таблицы `category_names`
--

CREATE TABLE `category_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_names`
--

INSERT INTO `category_names` (`id`, `title`, `slug`, `parent_id`, `published`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(37, 'vlad', 'vlad', 35, 1, NULL, NULL, '2017-10-28 10:16:24', '2017-10-28 10:42:42'),
(10, 'maks', 'whos', 37, 1, NULL, NULL, '2017-10-26 17:22:23', '2017-10-28 10:43:03'),
(36, 'guz', 'guz', 0, 0, NULL, NULL, '2017-10-28 10:02:26', '2017-10-28 10:02:26'),
(35, 'nikita', 'nikita', 0, 0, NULL, NULL, '2017-10-28 10:02:13', '2017-10-28 10:02:13');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NOW` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `title`, `slug`, `excerpt`, `content`, `published_at`, `NOW`, `published`, `created_at`, `updated_at`) VALUES
(7, 'First item', 'first-item', '<b>First Item body</b>', '<b>Content First Item body</b>', '2017-09-05 20:57:47', '2017-09-05 20:57:47', 1, '2017-09-05 16:57:47', '2017-09-05 16:57:47'),
(8, 'Second item', 'Second-item', '<b>Second Item body </b>', '<b>Second First Item body </b>', '2017-09-05 20:57:47', '2017-09-05 20:57:47', 0, '2017-09-05 16:57:47', '2017-09-05 16:57:47'),
(9, 'Third item', 'Third-item', '<b>Third Item body</b>', '<b>Third First  Item body</b>', '2017-09-05 20:57:47', '2017-09-05 20:57:47', 0, '2017-09-05 16:57:47', '2017-09-05 16:57:47');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_05_184856_create_items_table', 1),
(6, '2017_10_03_193124_create_category_names_table', 2),
(7, '2017_10_28_185638_create_articles_table', 3),
(8, '2017_10_28_222049_create_categoryable_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nikita', 'revers414@mail.ru', '$2y$10$p.ROclUoUsEB0Nlj/LElv.qWExcpraiSOOm2O10UJlrVFaA9CV/V2', 'b6bBiz3tnwYOaHbAIiCzujjCh7YiLmx31SlCFmFBBHa0h0aXhj8xmTRI2ekG', '2017-10-01 11:43:23', '2017-10-01 11:43:23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `1111articles`
--
ALTER TABLE `1111articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`);

--
-- Индексы таблицы `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_names`
--
ALTER TABLE `category_names`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `1111articles`
--
ALTER TABLE `1111articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `category_names`
--
ALTER TABLE `category_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
