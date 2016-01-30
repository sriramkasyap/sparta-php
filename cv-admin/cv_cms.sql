-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2016 at 09:26 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sidenav_items`
--

CREATE TABLE `admin_sidenav_items` (
  `sidenav_id` int(3) NOT NULL,
  `sidenav_name` varchar(50) NOT NULL,
  `sidenav_icon` varchar(50) NOT NULL,
  `sidenav_url` varchar(255) NOT NULL DEFAULT '#',
  `sidenav_has_dropdown` tinyint(1) NOT NULL DEFAULT '0',
  `sidenav_dropdown_items` text NOT NULL,
  `sidenav_pos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains Side Navigation panel items';

--
-- Dumping data for table `admin_sidenav_items`
--

INSERT INTO `admin_sidenav_items` (`sidenav_id`, `sidenav_name`, `sidenav_icon`, `sidenav_url`, `sidenav_has_dropdown`, `sidenav_dropdown_items`, `sidenav_pos`) VALUES
(1, 'Dashboard', 'fa-dashboard', 'index.php', 0, '', 1),
(2, 'pages', 'fa-files-o', '#', 1, 'add new page,pages.php?source=add;view all pages,pages.php?source=view', 2),
(3, 'posts', 'fa-list-alt', '#', 1, 'add new post,posts.php?source=add;view all posts,posts.php?source=view', 3);

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE `site_config` (
  `config_id` int(3) NOT NULL,
  `config_name` varchar(255) NOT NULL,
  `config_content` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`config_id`, `config_name`, `config_content`) VALUES
(1, 'title', 'Sriram Kasyap Meduri'),
(2, 'base_url', 'localhost:8080/cv_cms/'),
(3, 'db_name', 'cv_cms'),
(4, 'desc', 'This is a sample description for a website');

-- --------------------------------------------------------

--
-- Table structure for table `site_pages`
--

CREATE TABLE `site_pages` (
  `page_id` int(3) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_type` varchar(255) NOT NULL,
  `page_heading` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_posts`
--

CREATE TABLE `site_posts` (
  `post_id` int(3) NOT NULL,
  `post_pos` int(5) NOT NULL,
  `page_id` int(3) NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `post_content` mediumtext NOT NULL,
  `post_option_background` varchar(255) NOT NULL,
  `post_option_border` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_scripts`
--

CREATE TABLE `site_scripts` (
  `script_id` int(3) NOT NULL,
  `script_name` varchar(255) NOT NULL,
  `script_url` varchar(255) NOT NULL,
  `script_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_snippets_installed`
--

CREATE TABLE `site_snippets_installed` (
  `snip_sample_id` int(5) NOT NULL,
  `snip_sample_name` varchar(255) NOT NULL,
  `snip_sample_author` varchar(255) NOT NULL,
  `snip_sample_desc` text NOT NULL,
  `snip_sample_display_name` varchar(255) NOT NULL,
  `snip_sample_type` enum('text','image','video','general') NOT NULL,
  `snip_sample_call_url` varchar(255) NOT NULL,
  `snip_sample_sample` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_styles`
--

CREATE TABLE `site_styles` (
  `style_id` int(3) NOT NULL,
  `style_name` varchar(255) NOT NULL,
  `style_url` varchar(255) NOT NULL,
  `style_media_min` varchar(255) NOT NULL,
  `style_media_max` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_theme_installed`
--

CREATE TABLE `site_theme_installed` (
  `theme_page_id` int(10) NOT NULL,
  `theme_page_name` varchar(255) NOT NULL,
  `theme_page_content` longtext NOT NULL,
  `theme_page_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_top_navbar`
--

CREATE TABLE `site_top_navbar` (
  `topnav_id` int(3) NOT NULL,
  `page_id` int(3) NOT NULL,
  `topnav_name` varchar(55) NOT NULL,
  `topnav_has_dropdown` tinyint(1) NOT NULL,
  `topnav_dropdown_items` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_sidenav_items`
--
ALTER TABLE `admin_sidenav_items`
  ADD PRIMARY KEY (`sidenav_id`),
  ADD UNIQUE KEY `sidenav_pos` (`sidenav_pos`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `site_posts`
--
ALTER TABLE `site_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `site_scripts`
--
ALTER TABLE `site_scripts`
  ADD PRIMARY KEY (`script_id`);

--
-- Indexes for table `site_snippets_installed`
--
ALTER TABLE `site_snippets_installed`
  ADD PRIMARY KEY (`snip_sample_id`);

--
-- Indexes for table `site_styles`
--
ALTER TABLE `site_styles`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `site_theme_installed`
--
ALTER TABLE `site_theme_installed`
  ADD PRIMARY KEY (`theme_page_id`),
  ADD UNIQUE KEY `theme_page_name` (`theme_page_name`),
  ADD UNIQUE KEY `theme_page_type` (`theme_page_type`);

--
-- Indexes for table `site_top_navbar`
--
ALTER TABLE `site_top_navbar`
  ADD PRIMARY KEY (`topnav_id`),
  ADD KEY `page_id` (`page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_sidenav_items`
--
ALTER TABLE `admin_sidenav_items`
  MODIFY `sidenav_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `site_config`
--
ALTER TABLE `site_config`
  MODIFY `config_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `page_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_posts`
--
ALTER TABLE `site_posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_scripts`
--
ALTER TABLE `site_scripts`
  MODIFY `script_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_snippets_installed`
--
ALTER TABLE `site_snippets_installed`
  MODIFY `snip_sample_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_styles`
--
ALTER TABLE `site_styles`
  MODIFY `style_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_theme_installed`
--
ALTER TABLE `site_theme_installed`
  MODIFY `theme_page_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_top_navbar`
--
ALTER TABLE `site_top_navbar`
  MODIFY `topnav_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `site_pages`
--
ALTER TABLE `site_pages`
  ADD CONSTRAINT `site_pages_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `site_top_navbar` (`page_id`);

--
-- Constraints for table `site_posts`
--
ALTER TABLE `site_posts`
  ADD CONSTRAINT `site_posts_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `site_pages` (`page_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
