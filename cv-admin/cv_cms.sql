-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 03:48 AM
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
(0, 'charset', 'utf-8'),
(1, 'title', 'Sriram Kasyap Meduri'),
(2, 'base_url', 'localhost:8080/cv_cms/'),
(4, 'desc', 'This is a sample description for a website');

-- --------------------------------------------------------

--
-- Table structure for table `site_links`
--

CREATE TABLE `site_links` (
  `link_id` int(10) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `link_rel` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'stylesheet',
  `link_type` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'text/css',
  `link_href` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_links`
--

INSERT INTO `site_links` (`link_id`, `link_name`, `link_rel`, `link_type`, `link_href`) VALUES
(1, 'Bootstrap Core CSS', 'stylesheet', 'text/css', 'css/bootstrap.min.css'),
(2, 'Custom Fonts', 'stylesheet', 'text/css', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'),
(3, 'Custom Font', 'stylesheet', 'text/css', 'http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'),
(4, 'Font Awesome', 'stylesheet', 'text/css', 'font-awesome/css/font-awesome.min.css'),
(5, 'Plugin CSS', 'stylesheet', 'text/css', 'css/animate.min.css'),
(6, 'Custom CSS', 'stylesheet', 'text/css', 'css/creative.css');

-- --------------------------------------------------------

--
-- Table structure for table `site_meta`
--

CREATE TABLE `site_meta` (
  `meta_id` int(50) NOT NULL,
  `meta_name` varchar(255) NOT NULL,
  `meta_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_pages`
--

CREATE TABLE `site_pages` (
  `page_id` int(20) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_heading` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `page_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_postmeta`
--

CREATE TABLE `site_postmeta` (
  `postmeta_id` int(50) NOT NULL,
  `postmeta_tag` varchar(255) NOT NULL,
  `postmeta_type` varchar(255) NOT NULL,
  `postmeta_value` longtext NOT NULL,
  `post_id` int(50) NOT NULL,
  `snippet_id` int(50) NOT NULL,
  `postmeta_pos` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_posts`
--

CREATE TABLE `site_posts` (
  `post_id` int(20) NOT NULL,
  `page_id` int(20) NOT NULL,
  `author_id` int(20) NOT NULL,
  `snippet_id` int(20) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_heading` varchar(255) NOT NULL,
  `post_pos` int(20) NOT NULL,
  `post_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_scripts`
--

CREATE TABLE `site_scripts` (
  `script_id` int(20) NOT NULL,
  `script_name` varchar(255) NOT NULL,
  `script_type` varchar(255) NOT NULL,
  `script_src` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_snippets`
--

CREATE TABLE `site_snippets` (
  `snippet_id` int(20) NOT NULL,
  `snippet_name` varchar(255) NOT NULL,
  `snippet_type` varchar(255) NOT NULL,
  `snippet_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_topnav`
--

CREATE TABLE `site_topnav` (
  `topnav_id` int(11) NOT NULL,
  `topnav_url` varchar(255) NOT NULL,
  `topnav_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `topnav_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_topnav`
--

INSERT INTO `site_topnav` (`topnav_id`, `topnav_url`, `topnav_name`, `topnav_pos`) VALUES
(1, '#page-top', 'Home', 1),
(2, '#about', 'About Me', 2),
(3, '#services', 'Services', 3),
(4, '#portfolio', 'Portfolio', 4),
(5, '#contact', 'Contact Me', 5);

-- --------------------------------------------------------

--
-- Table structure for table `site_users`
--

CREATE TABLE `site_users` (
  `user_id` int(25) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_display_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_access_level` int(2) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_summary` text NOT NULL,
  `user_logged_in` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `site_links`
--
ALTER TABLE `site_links`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `site_meta`
--
ALTER TABLE `site_meta`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `site_postmeta`
--
ALTER TABLE `site_postmeta`
  ADD PRIMARY KEY (`postmeta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `snippet_id` (`snippet_id`);

--
-- Indexes for table `site_posts`
--
ALTER TABLE `site_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `snippet_id` (`snippet_id`);

--
-- Indexes for table `site_scripts`
--
ALTER TABLE `site_scripts`
  ADD PRIMARY KEY (`script_id`);

--
-- Indexes for table `site_snippets`
--
ALTER TABLE `site_snippets`
  ADD PRIMARY KEY (`snippet_id`);

--
-- Indexes for table `site_topnav`
--
ALTER TABLE `site_topnav`
  ADD PRIMARY KEY (`topnav_id`);

--
-- Indexes for table `site_users`
--
ALTER TABLE `site_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site_links`
--
ALTER TABLE `site_links`
  MODIFY `link_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `site_meta`
--
ALTER TABLE `site_meta`
  MODIFY `meta_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `page_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_postmeta`
--
ALTER TABLE `site_postmeta`
  MODIFY `postmeta_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_posts`
--
ALTER TABLE `site_posts`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_scripts`
--
ALTER TABLE `site_scripts`
  MODIFY `script_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_snippets`
--
ALTER TABLE `site_snippets`
  MODIFY `snippet_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_topnav`
--
ALTER TABLE `site_topnav`
  MODIFY `topnav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site_users`
--
ALTER TABLE `site_users`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `site_postmeta`
--
ALTER TABLE `site_postmeta`
  ADD CONSTRAINT `site_postmeta_ibfk_2` FOREIGN KEY (`snippet_id`) REFERENCES `site_snippets` (`snippet_id`),
  ADD CONSTRAINT `site_postmeta_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `site_posts` (`post_id`);

--
-- Constraints for table `site_posts`
--
ALTER TABLE `site_posts`
  ADD CONSTRAINT `site_posts_ibfk_3` FOREIGN KEY (`snippet_id`) REFERENCES `site_snippets` (`snippet_id`),
  ADD CONSTRAINT `site_posts_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `site_pages` (`page_id`),
  ADD CONSTRAINT `site_posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `site_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
