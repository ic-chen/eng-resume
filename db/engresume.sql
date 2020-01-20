-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-01-20 15:12:01
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `engresume`
--

-- --------------------------------------------------------

--
-- 資料表結構 `eng_edu`
--

CREATE TABLE `eng_edu` (
  `id` int(11) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `see` tinyint(1) NOT NULL DEFAULT 0 COMMENT '可見',
  `grad_t` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '就讀時間',
  `grad_st` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL' COMMENT '畢業狀態',
  `sch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '學校',
  `dept` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '科系'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_edu`
--

INSERT INTO `eng_edu` (`id`, `acct`, `see`, `grad_t`, `grad_st`, `sch`, `dept`) VALUES
(1, 'admin', 1, '2004 ~ 2008', 'Graduated', 'Tamkang University', 'Department of English');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_exp`
--

CREATE TABLE `eng_exp` (
  `id` int(20) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `see` tinyint(1) NOT NULL DEFAULT 0 COMMENT '可見',
  `dur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '任職期間',
  `corp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '公司',
  `posit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '職稱',
  `jd` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '工作說明'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_exp`
--

INSERT INTO `eng_exp` (`id`, `acct`, `see`, `dur`, `corp`, `posit`, `jd`) VALUES
(1, 'admin', 1, '2010/10 ~ 2012/03 (1 y 5 m)', 'Asialoc Corporation', 'Project Manager', 'Responsible for contacting suppliers and clients, managing localization projects, maintaining technical documents and supporting some translation tasks.'),
(2, 'admin', 1, '2012/04 ~ 2015/02 (2 y 11 m)', 'Asialoc Corporation', 'Freelancer translator', 'Translate/localize technical documents and social networking games from English to Traditional Chinese.'),
(3, 'admin', 1, '2015/04 ~ 2019/04 (4 y 1 m)', 'WeastO Localization', 'In-house editor', 'Translate and review IT/marketing documents.'),
(4, 'admin', 1, '2015/04 ~ 2019/09 (4 y 6 m)', 'SDL plc', 'Freelancer translator', '');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_img`
--

CREATE TABLE `eng_img` (
  `id` int(11) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `see` tinyint(1) NOT NULL DEFAULT 0,
  `filename` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_img`
--

INSERT INTO `eng_img` (`id`, `acct`, `see`, `filename`, `alt`) VALUES
(1, 'admin', 1, '23d50e04b0c3027b.jpg', '企鵝'),
(2, 'admin', 0, '7e7cd0b1jw1f811tiddxqj20fa0egdhz.jpg', '貓熊'),
(4, 'admin', 0, 'wzLgOqh - Imgur.jpg', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_reqs`
--

CREATE TABLE `eng_reqs` (
  `id` int(11) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `see` tinyint(1) NOT NULL DEFAULT 0 COMMENT '可見',
  `reqs_posit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '期望職務',
  `reqs_jd` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '工作描述',
  `reqs_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '可上班時間',
  `reqs_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '期望工作性質',
  `reqs_place` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '期望工作地點',
  `reqs_pay` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '期望薪資'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_reqs`
--

INSERT INTO `eng_reqs` (`id`, `acct`, `see`, `reqs_posit`, `reqs_jd`, `reqs_time`, `reqs_type`, `reqs_place`, `reqs_pay`) VALUES
(1, 'admin', 1, 'Web developer (Front-end, Back-end or Both)', 'Responsible for the coding, design and layout of a website or a application according to a company’s specifications.', 'Any', 'Full-time', 'New Taipei and Taipei City', '38,000 NTD/month');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_skill`
--

CREATE TABLE `eng_skill` (
  `id` int(11) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `see` tinyint(1) NOT NULL DEFAULT 0 COMMENT '可見',
  `cat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分類',
  `skill` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '技能',
  `level` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '程度',
  `des` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '說明'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_skill`
--

INSERT INTO `eng_skill` (`id`, `acct`, `see`, `cat`, `skill`, `level`, `des`) VALUES
(1, 'admin', 1, 'Language', 'English', '80%', 'TOEIC 865'),
(3, 'admin', 1, 'Design/Art', 'Photoshop', '80%', 'Familiar with basic functions.'),
(4, 'admin', 1, 'Design/Art', 'Illustrator', '60%', 'Basic manipulation.'),
(6, 'admin', 1, 'IT/Network', 'PHP/MySQL', '70%', ''),
(7, 'admin', 1, 'IT/Network', 'JavaScript/JQ/AJAX', '60%', '');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_social_m`
--

CREATE TABLE `eng_social_m` (
  `id` int(11) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `see` tinyint(1) NOT NULL DEFAULT 0 COMMENT '可見',
  `fb` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_social_m`
--

INSERT INTO `eng_social_m` (`id`, `acct`, `see`, `fb`, `ig`, `linkedin`, `github`, `youtube`, `twitter`) VALUES
(1, 'admin', 1, '', '', 'http://www.linkedin.com/in/irmachen', 'http://github.com/ic-chen', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_s_intro`
--

CREATE TABLE `eng_s_intro` (
  `id` int(11) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `see` tinyint(1) NOT NULL DEFAULT 0 COMMENT '可見',
  `s_intro` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '自介',
  `bio` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_s_intro`
--

INSERT INTO `eng_s_intro` (`id`, `acct`, `see`, `s_intro`, `bio`) VALUES
(1, 'admin', 1, 'Localization translator & Web design beginner', '10 years’ work experience in localization industry. Recently started learning web design and program coding, hoping to turn the page and start a new chapter of life.');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_user`
--

CREATE TABLE `eng_user` (
  `id` int(11) NOT NULL,
  `acct` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `psw` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '姓名',
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '性別',
  `btd` date DEFAULT NULL COMMENT '生日',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電郵',
  `tel_cell` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '行動電話',
  `tel_home` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '家中電話',
  `addr` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '居住地區',
  `page` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '履歷頁面',
  `reg_time` timestamp NULL DEFAULT current_timestamp() COMMENT '註冊時間',
  `upt_time` timestamp NULL DEFAULT NULL COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_user`
--

INSERT INTO `eng_user` (`id`, `acct`, `psw`, `name`, `gender`, `btd`, `email`, `tel_cell`, `tel_home`, `addr`, `page`, `reg_time`, `upt_time`) VALUES
(1, 'admin', 'admin', 'Chen Yi Ting', '女性', '1986-07-09', 'irma_chen79@hotmail.com', '0929-810-875', '', 'New Taipei City', '14256cf0f9e8fdea022563216aca45711816406a5894145ccd48d2a1794199e1', '2019-12-11 03:21:24', '2020-01-20 05:32:38');

-- --------------------------------------------------------

--
-- 資料表結構 `eng_work`
--

CREATE TABLE `eng_work` (
  `id` int(20) NOT NULL,
  `acct` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `see` tinyint(1) NOT NULL DEFAULT 1 COMMENT '可見',
  `filename` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片名稱',
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作品名稱',
  `url` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `eng_work`
--

INSERT INTO `eng_work` (`id`, `acct`, `see`, `filename`, `name`, `url`) VALUES
(1, 'admin', 1, 'screenshot.jpg', 'Exchange rate trend (RWD)', 'http://220.128.133.15/s1080318/rateTrend/'),
(3, 'admin', 1, 'ShootingStars.jpg', 'Shooting stars game (RWD)', 'http://220.128.133.15/s1080318/ShootingStars/'),
(4, 'admin', 1, 'FlipCards.jpg', 'Card flipping game (RWD)', 'http://220.128.133.15/s1080318/FlipCards/'),
(5, 'admin', 1, 'clock.jpg', 'Clock (RWD)', 'http://220.128.133.15/s1080318/clock/'),
(6, 'admin', 1, 'calendar.jpg', 'Calendar', 'http://220.128.133.15/s1080318/Calendar/'),
(8, 'admin', 1, '01.jpg', 'Resume builder (RWD)', 'http://220.128.133.15/s1080318/resume');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `eng_edu`
--
ALTER TABLE `eng_edu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_exp`
--
ALTER TABLE `eng_exp`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_img`
--
ALTER TABLE `eng_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_reqs`
--
ALTER TABLE `eng_reqs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_skill`
--
ALTER TABLE `eng_skill`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_social_m`
--
ALTER TABLE `eng_social_m`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_s_intro`
--
ALTER TABLE `eng_s_intro`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_user`
--
ALTER TABLE `eng_user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `eng_work`
--
ALTER TABLE `eng_work`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_edu`
--
ALTER TABLE `eng_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_exp`
--
ALTER TABLE `eng_exp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_img`
--
ALTER TABLE `eng_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_reqs`
--
ALTER TABLE `eng_reqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_skill`
--
ALTER TABLE `eng_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_social_m`
--
ALTER TABLE `eng_social_m`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_s_intro`
--
ALTER TABLE `eng_s_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_user`
--
ALTER TABLE `eng_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eng_work`
--
ALTER TABLE `eng_work`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
