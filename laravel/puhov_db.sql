-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 31 2017 г., 00:21
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
  `description_short` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
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
(5, 'Что общего у разработки программного обеспечения с разработкой настольных игр?', 'Что общего у разработки программного обеспечения с разработкой настольных игр? Об этом лучше всех знает&nbsp;<strong>Сергей&nbsp;<a href="https://habrahabr.ru/users/milfgard/">Milfgard</a>&nbsp;Абдульманов</strong>&nbsp;который учился по специальности &laquo;математик-системный программист&raquo; и владел IT-компанией, а сейчас известен читателям Хабра постами в&nbsp;<a href="https://habrahabr.ru/company/mosigra">блоге</a>&nbsp;компании &laquo;Мосигра&raquo;.</p>', '<p>Что общего у разработки программного обеспечения с разработкой настольных игр? Об этом лучше всех знает&nbsp;<strong>Сергей&nbsp;<a href="https://habrahabr.ru/users/milfgard/">Milfgard</a>&nbsp;Абдульманов</strong>&nbsp;который учился по специальности &laquo;математик-системный программист&raquo; и владел IT-компанией, а сейчас известен читателям Хабра постами в&nbsp;<a href="https://habrahabr.ru/company/mosigra">блоге</a>&nbsp;компании &laquo;Мосигра&raquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Он будет завершать конференцию Joker своим&nbsp;<a href="https://jokerconf.com/2017/talks/5q8bvkqzy40q0g6qeuuwak/">кейноутом</a>&nbsp;&laquo;Как мы расширяли бутылочное горлышко разработки&raquo;, а в преддверии этой конференции мы задали ему ещё ряд вопросов о том, чем две индустрии похожи &mdash; и чем различаются.</p>\r\n\r\n<p><strong>Сергей</strong>: Короче, правильнее будет анонсировать тезис &laquo;как мы люто облажались&raquo;. Это чтобы вы не думали, что мы там новый аджайл придумали или что-то ещё. А ещё у нас тестировщики чуть не набили разработчикам морду. В частном порядке. Но это отдельная песня.</p>', 'post-2', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, '2017-10-28 17:56:40', '2017-10-30 20:04:42'),
(9, 'Про бэкапы, черную пятницу и коммуникации между людьми', '<p>13 октября мы провели вторую конференцию сообщества&nbsp;<a href="http://uptime.community/">Uptime</a>. В этот раз дата проведения выпала на пятницу 13-е, поэтому основная тема &mdash; аварии, и как с ними справляться. Это первый из серии постов про доклады с прошедшей конференции.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>У меня есть три страшные истории о том, как по нашей вине все сломалось, как мы это чинили, и что мы делаем теперь, чтобы это не повторилось.</p>', '<h1>Масштаб: количество алертов</h1>\r\n\r\n<p>13 октября мы провели вторую конференцию сообщества&nbsp;<a href="http://uptime.community/">Uptime</a>. В этот раз дата проведения выпала на пятницу 13-е, поэтому основная тема &mdash; аварии, и как с ними справляться. Это первый из серии постов про доклады с прошедшей конференции.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>У меня есть три страшные истории о том, как по нашей вине все сломалось, как мы это чинили, и что мы делаем теперь, чтобы это не повторилось.</p>\r\n\r\n<p>Мы работаем с 2008 года, нас сейчас 75 человек (Иркутск, Питер, Москва), мы занимаемся круглосуточной технической поддержкой, системным администрированием и девопсом для веб сайтов по всему миру. У нас 300 клиентов и 2000 серверов на поддержке.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Основная наша работа заключается в том, что если происходит какая-то проблема, мы должны за 15 минут прийти и исправить ее.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>В 2010 году было порядка 450 алертов в месяц в пике.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Эта маленькая красная линия &mdash; это то, сколько алертов у нас было до конца 2012 года.<br />\r\nВ 2015 году &mdash; в пике доходило до 100 000 алертов в месяц.<br />\r\nСейчас их приблизительно 130 000 &mdash; 140 000.</p>', 'pro-bekapy-chernuyu-pyatnitsu-i-kommunikatsi', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2017-10-30 19:50:59', '2017-10-30 20:00:57'),
(10, 'Transformer — новая архитектура нейросетей для работы с последовательностями', 'Необходимое предисловие: я решил попробовать современный формат несения света в массы и пробую стримить на YouTube про deep learning.   В частности, в какой-то момент меня попросили рассказать про attention, а для этого нужно рассказать и про машинный перевод, и про sequence to sequence, и про применение к картинкам, итд итп. В итоге получился вот такой стрим на час:', 'Необходимое предисловие: я решил попробовать современный формат несения света в массы и пробую стримить на YouTube про deep learning.   В частности, в какой-то момент меня попросили рассказать про attention, а для этого нужно рассказать и про машинный перевод, и про sequence to sequence, и про применение к картинкам, итд итп. В итоге получился вот такой стрим на час:Необходимое предисловие: я решил попробовать современный формат несения света в массы и пробую стримить на YouTube про deep learning.   В частности, в какой-то момент меня попросили рассказать про attention, а для этого нужно рассказать и про машинный перевод, и про sequence to sequence, и про применение к картинкам, итд итп. В итоге получился вот такой стрим на час:Необходимое предисловие: я решил попробовать современный формат несения света в массы и пробую стримить на YouTube про deep learning.   В частности, в какой-то момент меня попросили рассказать про attention, а для этого нужно рассказать и про машинный перевод, и про sequence to sequence, и про применение к картинкам, итд итп. В итоге получился вот такой стрим на час:', 'transformer-novaya-arkhitektura-neyroset', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2017-10-30 20:03:46', '2017-10-30 20:19:11'),
(11, 'Google Analytics API для маркетолога на практическом примере', 'Привет! По мотивам реализации одной из задач по анализу источников трафика решил написать статью-инструкцию для маркетологов. Это случай, когда маркетологам без Google Analytics API не обойтись. Статья пишется на благо веб-разработчикам, чтобы маркетологи не отвлекали по «всякой фигне».', 'Привет! По мотивам реализации одной из задач по анализу источников трафика решил написать статью-инструкцию для маркетологов. Это случай, когда маркетологам без Google Analytics API не обойтись. Статья пишется на благо веб-разработчикам, чтобы маркетологи не отвлекали по «всякой фигне».\r\n\r\nЗнакомимся с технологией на практическом примере. Поехали!\r\n\r\nЗадача\r\n\r\nЕсть около 150 000 пользователей, которые зарегистрированы на сайте. Нужно понять, из каких источников изначально пришли 1500 пользователей, которые купили продукт в октябре.\r\nДля привлечения лидов используется модель фримиум, цикл продажи может быть до 1 года.\r\n\r\nИз дополнительных настроек, на этапе интеграции Google Analytics, мы подключили UserID и дублировали его значение в Custom Dimension 1 (Scope: User), чтобы с UserID можно было взаимодействовать в отчетах.', 'google-analytics-api-dlya-marketologa-na', NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, '2017-10-30 20:18:33', '2017-10-30 20:18:33');

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
(43, 10, 'App\\Models\\Article'),
(40, 9, 'App\\Models\\Article'),
(44, 5, 'App\\Models\\Article');

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
(40, 'IT-инфраструктура', 'it-infrastruktura', 0, 1, 1, NULL, '2017-10-30 19:35:59', '2017-10-30 19:35:59'),
(42, 'Системное администрирование', 'sistemnoe-administrirovanie', 40, 1, 1, NULL, '2017-10-30 19:44:05', '2017-10-30 19:44:05'),
(45, 'Интернет-маркетинг', 'internet-marketing', 0, 1, 1, NULL, '2017-10-30 19:46:53', '2017-10-30 19:46:53'),
(44, 'Управление проектами', 'upravlenie-proektami', 0, 1, 1, NULL, '2017-10-30 19:44:58', '2017-10-30 19:44:58'),
(43, 'Машинное обучение', 'mashinnoe-obuchenie', 0, 1, 1, NULL, '2017-10-30 19:44:21', '2017-10-30 19:44:21'),
(41, 'Серверное администрирование', 'servernoe-administrirovanie', 40, 1, 1, 1, '2017-10-30 19:36:46', '2017-10-30 19:42:16');

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
(1, 'nikita', 'revers414@mail.ru', '$2y$10$p.ROclUoUsEB0Nlj/LElv.qWExcpraiSOOm2O10UJlrVFaA9CV/V2', '1PfuFWKavvoYS9jc10Ctnjk4ZX9V6EJ65w67FXI7LWRlG7eFo7vZ8rVYyPxR', '2017-10-01 11:43:23', '2017-10-01 11:43:23'),
(2, 'rev', 'nekarpeev@yandex.ru', '$2y$10$1ajIZlkog8Gs2/ubK6A2yeI3RjK1V7HV/I/cH4BVEWrmAUZ6l.s7q', 'tbNXuocacKG71JD4yRukp0S6mJxS8CgyuRYErdk2aAzq4N3t5h7HXiiK24oK', '2017-10-30 16:26:43', '2017-10-30 16:26:43');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `category_names`
--
ALTER TABLE `category_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
