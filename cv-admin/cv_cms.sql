-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2016 at 08:52 AM
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
(3, 'posts', 'fa-list-alt', '#', 1, 'add new post,posts.php?source=add;view all posts,posts.php?source=view', 3),
(4, 'Configuration', 'fa-cogs', 'config.php', 0, '', 4);

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
(1, 'title', 'Cove Venture'),
(2, 'base_url', 'localhost:8080/cv_cms/'),
(4, 'description', 'Cove Venture\'s  first basic Content Management System.');

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

--
-- Dumping data for table `site_meta`
--

INSERT INTO `site_meta` (`meta_id`, `meta_name`, `meta_content`) VALUES
(1, 'viewport', 'width=device-width, initial-scale=1');

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

--
-- Dumping data for table `site_pages`
--

INSERT INTO `site_pages` (`page_id`, `page_url`, `page_title`, `page_heading`, `page_description`, `page_type`) VALUES
(1, 'home', 'Home', 'Home', 'This is the main Landing Page.', 'home\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `site_postmeta`
--

CREATE TABLE `site_postmeta` (
  `postmeta_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `snippet_id` int(50) NOT NULL,
  `postmeta_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `postmeta_pos` int(50) NOT NULL,
  `postmeta_type` enum('varchar','text','number','range','color','email','password','tel','date','datetime','time','file') CHARACTER SET utf8 NOT NULL,
  `postmeta_value` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_postmeta`
--

INSERT INTO `site_postmeta` (`postmeta_id`, `post_id`, `snippet_id`, `postmeta_tag`, `postmeta_pos`, `postmeta_type`, `postmeta_value`) VALUES
(1, 1, 1, 'main_heading', 1, 'varchar', 'Sriram Kasyap Meduri'),
(2, 1, 1, 'main_description', 2, 'text', 'Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!'),
(3, 1, 1, 'button_link', 3, 'varchar', '#about'),
(4, 1, 1, 'button_text', 4, 'varchar', 'Find More..'),
(42, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(43, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(44, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(45, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(46, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(47, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(48, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(49, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(50, 6, 3, 'icon_1', 1, '', 'fa-archive'),
(51, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(52, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(53, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(54, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(55, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(56, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(57, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(58, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(59, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(60, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(61, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(62, 6, 3, 'icon_1', 1, '', 'fa-adjust'),
(63, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(64, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(65, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(66, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(67, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(68, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(69, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(70, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(71, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(72, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(73, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(74, 6, 3, 'icon_1', 1, '', 'fa-archive'),
(75, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(76, 6, 3, 'sub_description_1', 3, 'text', 'Our templates are updated regularly so they don\'t break.'),
(77, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(78, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(79, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(80, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(81, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(82, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(83, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(84, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(85, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(86, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(87, 6, 3, 'icon_1', 1, '', 'fa-arrows'),
(88, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(89, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(90, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(91, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(92, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(93, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(94, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(95, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(96, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(97, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(98, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(99, 6, 3, 'icon_1', 1, '', 'fa-ban'),
(100, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(101, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(102, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(103, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(104, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(105, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(106, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(107, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(108, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(109, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(110, 6, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(111, 6, 4, 'category_name_1', 1, 'varchar', 'Category'),
(112, 6, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(113, 6, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(114, 6, 4, 'category_name_2', 4, 'varchar', 'Category'),
(115, 6, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(116, 6, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(117, 6, 4, 'category_name_3', 7, 'varchar', 'Category'),
(118, 6, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(119, 6, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(120, 6, 4, 'category_name_4', 10, 'varchar', 'Category'),
(121, 6, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(122, 6, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(123, 6, 4, 'category_name_5', 13, 'varchar', 'Category'),
(124, 6, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(125, 6, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(126, 6, 4, 'category_name_6', 16, 'varchar', 'Category'),
(127, 6, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(128, 7, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(129, 7, 4, 'category_name_1', 1, 'varchar', 'Category'),
(130, 7, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(131, 7, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(132, 7, 4, 'category_name_2', 4, 'varchar', 'Category'),
(133, 7, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(134, 7, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(135, 7, 4, 'category_name_3', 7, 'varchar', 'Category'),
(136, 7, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(137, 7, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(138, 7, 4, 'category_name_4', 10, 'varchar', 'Category'),
(139, 7, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(140, 7, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(141, 7, 4, 'category_name_5', 13, 'varchar', 'Category'),
(142, 7, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(143, 7, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(144, 7, 4, 'category_name_6', 16, 'varchar', 'Category'),
(145, 7, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(146, 7, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(147, 7, 4, 'category_name_1', 1, 'varchar', 'Category'),
(148, 7, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(149, 7, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(150, 7, 4, 'category_name_2', 4, 'varchar', 'Category'),
(151, 7, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(152, 7, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(153, 7, 4, 'category_name_3', 7, 'varchar', 'Category'),
(154, 7, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(155, 7, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(156, 7, 4, 'category_name_4', 10, 'varchar', 'Category'),
(157, 7, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(158, 7, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(159, 7, 4, 'category_name_5', 13, 'varchar', 'Category'),
(160, 7, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(161, 7, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(162, 7, 4, 'category_name_6', 16, 'varchar', 'Category'),
(163, 7, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(164, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(165, 6, 5, 'contact_icon_1', 2, '', 'fa-paper-plane-o'),
(166, 6, 5, 'contact_content_1', 3, 'varchar', '8985377378'),
(167, 6, 5, 'contact_icon_for_email', 4, '', 'fa-exchange'),
(168, 6, 5, 'contact_email', 5, 'email', 'sriramkasyap.m.s@gmail.com'),
(169, 6, 5, 'contact_content_for_email', 6, 'varchar', 'sriramkasyap.m.s@gmail.com'),
(170, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(171, 6, 5, 'contact_icon_1', 2, '', 'fa-phone'),
(172, 6, 5, 'contact_content_1', 3, 'varchar', '123-456-6789'),
(173, 6, 5, 'contact_icon_for_email', 4, '', 'fa-envelope-o'),
(174, 6, 5, 'contact_email', 5, 'email', 'feedback@startbootstrap.com'),
(175, 6, 5, 'contact_content_for_email', 6, 'varchar', 'feedback@startbootstrap.com'),
(176, 1, 1, 'main_heading', 0, 'varchar', 'Sriram Kasyap meduri'),
(177, 1, 1, 'main_description', 1, 'text', 'Dreamer, Designer, Developer....... Now  Manager..'),
(178, 1, 1, 'button_link', 2, 'varchar', '#about'),
(179, 1, 1, 'button_text', 3, 'varchar', 'Know More'),
(180, 2, 2, 'section_description', 1, 'text', 'Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!\r\n\r\nGET STARTED!\r\n													'),
(181, 2, 2, 'button_link', 2, 'varchar', '#about'),
(182, 2, 2, 'button_text', 3, 'varchar', 'Find Out More'),
(183, 3, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(184, 3, 3, 'icon_1', 1, '', 'fa-arrows'),
(185, 3, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(186, 3, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(187, 3, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(188, 3, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(189, 3, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(190, 3, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(191, 3, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(192, 3, 3, 'icon_4', 10, '', 'fa-heart'),
(193, 3, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(194, 3, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(195, 4, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(196, 4, 4, 'category_name_1', 1, 'varchar', 'Category'),
(197, 4, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(198, 4, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(199, 4, 4, 'category_name_2', 4, 'varchar', 'Category'),
(200, 4, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(201, 4, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(202, 4, 4, 'category_name_3', 7, 'varchar', 'Category'),
(203, 4, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(204, 4, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(205, 4, 4, 'category_name_4', 10, 'varchar', 'Category'),
(206, 4, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(207, 4, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(208, 4, 4, 'category_name_5', 13, 'varchar', 'Category'),
(209, 4, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(210, 4, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(211, 4, 4, 'category_name_6', 16, 'varchar', 'Category'),
(212, 4, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(213, 5, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(214, 5, 5, 'contact_icon_1', 2, '', 'fa-phone'),
(215, 5, 5, 'contact_content_1', 3, 'varchar', '123-456-6789'),
(216, 5, 5, 'contact_icon_for_email', 4, '', 'fa-envelope-o'),
(217, 5, 5, 'contact_email', 5, 'email', 'feedback@startbootstrap.com'),
(218, 5, 5, 'contact_content_for_email', 6, 'varchar', 'feedback@startbootstrap.com'),
(219, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(220, 6, 5, 'contact_element', 2, '', 'Array'),
(221, 7, 5, 'section_heading', 0, '', 'e'),
(222, 7, 5, 'section_description', 1, '', 'p'),
(223, 7, 5, 'contact_icon_for_element', 2, '', 'fa-envelope-o'),
(224, 7, 5, 'contact_content_for_element', 3, '', '9494'),
(225, 6, 5, 'section_heading', 0, '', 'e'),
(226, 6, 5, 'section_description', 1, '', 'p'),
(227, 6, 5, 'contact_icon_for_element', 2, '', ''),
(228, 6, 5, 'contact_content_for_element', 3, '', ''),
(229, 7, 5, 'section_heading', 0, '', 'e'),
(230, 7, 5, 'section_description', 1, '', 'p'),
(231, 7, 5, 'contact_icon_for_element', 2, '', ''),
(232, 7, 5, 'contact_content_for_element', 3, '', ''),
(233, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(234, 6, 5, 'contact_element', 2, '', 'Array'),
(235, 7, 4, 'project', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_postmeta_trash`
--

CREATE TABLE `site_postmeta_trash` (
  `postmeta_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `snippet_id` int(50) NOT NULL,
  `postmeta_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `postmeta_pos` int(50) NOT NULL,
  `postmeta_type` enum('varchar','text','number','range','color','email','password','tel','date','datetime','time','file') CHARACTER SET utf8 NOT NULL,
  `postmeta_value` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_postmeta_trash`
--

INSERT INTO `site_postmeta_trash` (`postmeta_id`, `post_id`, `snippet_id`, `postmeta_tag`, `postmeta_pos`, `postmeta_type`, `postmeta_value`) VALUES
(1, 1, 1, 'main_heading', 1, 'varchar', 'Sriram Kasyap Meduri'),
(2, 1, 1, 'main_description', 2, 'text', 'Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!'),
(3, 1, 1, 'button_link', 3, 'varchar', '#about'),
(4, 1, 1, 'button_text', 4, 'varchar', 'Find More..'),
(42, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(43, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(44, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(45, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(46, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(47, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(48, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(49, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(50, 6, 3, 'icon_1', 1, '', 'fa-archive'),
(51, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(52, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(53, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(54, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(55, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(56, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(57, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(58, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(59, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(60, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(61, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(62, 6, 3, 'icon_1', 1, '', 'fa-adjust'),
(63, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(64, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(65, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(66, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(67, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(68, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(69, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(70, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(71, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(72, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(73, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(74, 6, 3, 'icon_1', 1, '', 'fa-archive'),
(75, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(76, 6, 3, 'sub_description_1', 3, 'text', 'Our templates are updated regularly so they don\'t break.'),
(77, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(78, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(79, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(80, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(81, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(82, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(83, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(84, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(85, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(86, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(87, 6, 3, 'icon_1', 1, '', 'fa-arrows'),
(88, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(89, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(90, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(91, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(92, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(93, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(94, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(95, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(96, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(97, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(98, 6, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(99, 6, 3, 'icon_1', 1, '', 'fa-ban'),
(100, 6, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(101, 6, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(102, 6, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(103, 6, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(104, 6, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(105, 6, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(106, 6, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(107, 6, 3, 'icon_4', 10, '', 'fa-heart'),
(108, 6, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(109, 6, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(110, 6, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(111, 6, 4, 'category_name_1', 1, 'varchar', 'Category'),
(112, 6, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(113, 6, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(114, 6, 4, 'category_name_2', 4, 'varchar', 'Category'),
(115, 6, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(116, 6, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(117, 6, 4, 'category_name_3', 7, 'varchar', 'Category'),
(118, 6, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(119, 6, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(120, 6, 4, 'category_name_4', 10, 'varchar', 'Category'),
(121, 6, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(122, 6, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(123, 6, 4, 'category_name_5', 13, 'varchar', 'Category'),
(124, 6, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(125, 6, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(126, 6, 4, 'category_name_6', 16, 'varchar', 'Category'),
(127, 6, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(128, 7, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(129, 7, 4, 'category_name_1', 1, 'varchar', 'Category'),
(130, 7, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(131, 7, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(132, 7, 4, 'category_name_2', 4, 'varchar', 'Category'),
(133, 7, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(134, 7, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(135, 7, 4, 'category_name_3', 7, 'varchar', 'Category'),
(136, 7, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(137, 7, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(138, 7, 4, 'category_name_4', 10, 'varchar', 'Category'),
(139, 7, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(140, 7, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(141, 7, 4, 'category_name_5', 13, 'varchar', 'Category'),
(142, 7, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(143, 7, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(144, 7, 4, 'category_name_6', 16, 'varchar', 'Category'),
(145, 7, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(146, 7, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(147, 7, 4, 'category_name_1', 1, 'varchar', 'Category'),
(148, 7, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(149, 7, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(150, 7, 4, 'category_name_2', 4, 'varchar', 'Category'),
(151, 7, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(152, 7, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(153, 7, 4, 'category_name_3', 7, 'varchar', 'Category'),
(154, 7, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(155, 7, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(156, 7, 4, 'category_name_4', 10, 'varchar', 'Category'),
(157, 7, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(158, 7, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(159, 7, 4, 'category_name_5', 13, 'varchar', 'Category'),
(160, 7, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(161, 7, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(162, 7, 4, 'category_name_6', 16, 'varchar', 'Category'),
(163, 7, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(164, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(165, 6, 5, 'contact_icon_1', 2, '', 'fa-paper-plane-o'),
(166, 6, 5, 'contact_content_1', 3, 'varchar', '8985377378'),
(167, 6, 5, 'contact_icon_for_email', 4, '', 'fa-exchange'),
(168, 6, 5, 'contact_email', 5, 'email', 'sriramkasyap.m.s@gmail.com'),
(169, 6, 5, 'contact_content_for_email', 6, 'varchar', 'sriramkasyap.m.s@gmail.com'),
(170, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(171, 6, 5, 'contact_icon_1', 2, '', 'fa-phone'),
(172, 6, 5, 'contact_content_1', 3, 'varchar', '123-456-6789'),
(173, 6, 5, 'contact_icon_for_email', 4, '', 'fa-envelope-o'),
(174, 6, 5, 'contact_email', 5, 'email', 'feedback@startbootstrap.com'),
(175, 6, 5, 'contact_content_for_email', 6, 'varchar', 'feedback@startbootstrap.com'),
(176, 1, 1, 'main_heading', 0, 'varchar', 'Sriram Kasyap meduri'),
(177, 1, 1, 'main_description', 1, 'text', 'Dreamer, Designer, Developer....... Now  Manager..'),
(178, 1, 1, 'button_link', 2, 'varchar', '#about'),
(179, 1, 1, 'button_text', 3, 'varchar', 'Know More'),
(180, 2, 2, 'section_description', 1, 'text', 'Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!\r\n\r\nGET STARTED!\r\n													'),
(181, 2, 2, 'button_link', 2, 'varchar', '#about'),
(182, 2, 2, 'button_text', 3, 'varchar', 'Find Out More'),
(183, 3, 3, 'section_heading', 0, 'varchar', 'At Your Service'),
(184, 3, 3, 'icon_1', 1, '', 'fa-arrows'),
(185, 3, 3, 'sub_head_1', 2, 'varchar', 'Sturdy Templates'),
(186, 3, 3, 'icon_2', 4, '', 'fa-paper-plane'),
(187, 3, 3, 'sub_head_2', 5, 'varchar', 'Ready to Ship'),
(188, 3, 3, 'sub_description_2', 6, 'text', 'You can use this theme as is, or you can make changes!'),
(189, 3, 3, 'icon_3', 7, '', 'fa-newspaper-o'),
(190, 3, 3, 'sub_head_3', 8, 'varchar', 'Up to Date'),
(191, 3, 3, 'sub_description_3', 9, 'text', 'We update dependencies to keep things fresh.'),
(192, 3, 3, 'icon_4', 10, '', 'fa-heart'),
(193, 3, 3, 'sub_head_4', 11, 'varchar', 'Made with Love'),
(194, 3, 3, 'sub_description_4', 12, 'text', 'You have to make your websites with love these days!'),
(195, 4, 4, 'project_image_1', 0, 'varchar', 'img/portfolio/1.jpg'),
(196, 4, 4, 'category_name_1', 1, 'varchar', 'Category'),
(197, 4, 4, 'project_name_1', 2, 'varchar', 'Project Name'),
(198, 4, 4, 'project_image_2', 3, 'varchar', 'img/portfolio/2.jpg'),
(199, 4, 4, 'category_name_2', 4, 'varchar', 'Category'),
(200, 4, 4, 'project_name_2', 5, 'varchar', 'Project Name'),
(201, 4, 4, 'project_image_3', 6, 'varchar', 'img/portfolio/3.jpg'),
(202, 4, 4, 'category_name_3', 7, 'varchar', 'Category'),
(203, 4, 4, 'project_name_3', 8, 'varchar', 'Project Name'),
(204, 4, 4, 'project_image_4', 9, 'varchar', 'img/portfolio/4.jpg'),
(205, 4, 4, 'category_name_4', 10, 'varchar', 'Category'),
(206, 4, 4, 'project_name_4', 11, 'varchar', 'Project Name'),
(207, 4, 4, 'project_image_5', 12, 'varchar', 'img/portfolio/5.jpg'),
(208, 4, 4, 'category_name_5', 13, 'varchar', 'Category'),
(209, 4, 4, 'project_name_5', 14, 'varchar', 'Project Name'),
(210, 4, 4, 'project_image_6', 15, 'varchar', 'img/portfolio/6.jpg'),
(211, 4, 4, 'category_name_6', 16, 'varchar', 'Category'),
(212, 4, 4, 'project_name_6', 17, 'varchar', 'Project Name'),
(213, 5, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(214, 5, 5, 'contact_icon_1', 2, '', 'fa-phone'),
(215, 5, 5, 'contact_content_1', 3, 'varchar', '123-456-6789'),
(216, 5, 5, 'contact_icon_for_email', 4, '', 'fa-envelope-o'),
(217, 5, 5, 'contact_email', 5, 'email', 'feedback@startbootstrap.com'),
(218, 5, 5, 'contact_content_for_email', 6, 'varchar', 'feedback@startbootstrap.com'),
(219, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(220, 6, 5, 'contact_element', 2, '', 'Array'),
(221, 7, 5, 'section_heading', 0, '', 'e'),
(222, 7, 5, 'section_description', 1, '', 'p'),
(223, 7, 5, 'contact_icon_for_element', 2, '', 'fa-envelope-o'),
(224, 7, 5, 'contact_content_for_element', 3, '', '9494'),
(225, 6, 5, 'section_heading', 0, '', 'e'),
(226, 6, 5, 'section_description', 1, '', 'p'),
(227, 6, 5, 'contact_icon_for_element', 2, '', ''),
(228, 6, 5, 'contact_content_for_element', 3, '', ''),
(229, 7, 5, 'section_heading', 0, '', 'e'),
(230, 7, 5, 'section_description', 1, '', 'p'),
(231, 7, 5, 'contact_icon_for_element', 2, '', ''),
(232, 7, 5, 'contact_content_for_element', 3, '', ''),
(233, 6, 5, 'section_description', 1, 'text', '<p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>'),
(234, 6, 5, 'contact_element', 2, '', 'Array'),
(235, 7, 4, 'project', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_posts`
--

CREATE TABLE `site_posts` (
  `post_id` int(20) NOT NULL,
  `page_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `snippet_id` int(20) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_heading` varchar(255) NOT NULL,
  `post_pos` int(20) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_tags` text,
  `post_date` date DEFAULT NULL,
  `post_comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_posts_trash`
--

CREATE TABLE `site_posts_trash` (
  `post_id` int(20) NOT NULL,
  `page_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `snippet_id` int(20) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_heading` varchar(255) NOT NULL,
  `post_pos` int(20) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_tags` text,
  `post_date` date DEFAULT NULL,
  `post_comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_scripts`
--

CREATE TABLE `site_scripts` (
  `script_id` int(20) NOT NULL,
  `script_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `script_type` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'text/javascript',
  `script_src` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_scripts`
--

INSERT INTO `site_scripts` (`script_id`, `script_name`, `script_type`, `script_src`) VALUES
(1, 'jQuery', 'text/javascript', 'js/jquery.js'),
(2, 'Bootstrap Core JavaScript ', 'text/javascript', 'js/bootstrap.min.js'),
(3, 'Plugin JavaScript', 'text/javascript', 'js/jquery.easing.min.js'),
(5, NULL, 'text/javascript', 'js/jquery.fittext.js'),
(6, NULL, 'text/javascript', 'js/wow.min.js'),
(7, 'Custom Theme JavaScript', 'text/javascript', 'js/creative.js');

-- --------------------------------------------------------

--
-- Table structure for table `site_snippets`
--

CREATE TABLE `site_snippets` (
  `snippet_id` int(20) NOT NULL,
  `snippet_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `snippet_display_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `snippet_tags` text CHARACTER SET utf8 NOT NULL,
  `snippet_content` longtext CHARACTER SET utf8 NOT NULL,
  `snippet_preview_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `snippet_description` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_snippets`
--

INSERT INTO `site_snippets` (`snippet_id`, `snippet_name`, `snippet_display_name`, `snippet_tags`, `snippet_content`, `snippet_preview_img`, `snippet_description`) VALUES
(1, 'start_bootstrap_header', 'Start Bootstrap Header', 'landing post', '<header>\n        <div class="header-content">\n            <div class="header-content-inner">\n                <h1>Your Favorite Source of Free Bootstrap Themes</h1>\n                <hr>\n                <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>\n                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>\n            </div>\n        </div>\n    </header>', 'img/snippets/start_bootstrap_header.jpg', NULL),
(2, 'start_bootstrap_about', 'Start Bootstrap About Me', 'about post', '<section class="bg-primary" id="about">\n        <div class="container">\n            <div class="row">\n                <div class="col-lg-8 col-lg-offset-2 text-center">\n                    <h2 class="section-heading">We\'ve got what you need!</h2>\n                    <hr class="light">\n                    <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>\n                    <a href="#" class="btn btn-default btn-xl">Get Started!</a>\n                </div>\n            </div>\n        </div>\n    </section>', 'img/snippets/start_bootstrap_about.jpg', NULL),
(3, 'start_bootstrap_services', 'Start Bootstrap Services', 'text', '<section id="services">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-12 text-center">\r\n                    <h2 class="section-heading">At Your Service</h2>\r\n                    <hr class="primary">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>\r\n                        <h3>Sturdy Templates</h3>\r\n                        <p class="text-muted">Our templates are updated regularly so they don\'t break.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>\r\n                        <h3>Ready to Ship</h3>\r\n                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>\r\n                        <h3>Up to Date</h3>\r\n                        <p class="text-muted">We update dependencies to keep things fresh.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>\r\n                        <h3>Made with Love</h3>\r\n                        <p class="text-muted">You have to make your websites with love these days!</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>', 'img/snippets/start_bootstrap_services.jpg', NULL),
(4, 'start_bootstrap_portfolio', 'Start Bootstrap Portfolio', 'text and image', '<section class="no-padding" id="portfolio">\n        <div class="container-fluid">\n            <div class="row no-gutter">\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n            </div>\n        </div>\n    </section>', 'img/snippets/start_bootstrap_portfolio.jpg', NULL),
(5, 'start_bootstrap_contact', 'Start Bootstrap Contact', 'contact', '<section id="contact">\n        <div class="container">\n            <div class="row">\n                <div class="col-lg-8 col-lg-offset-2 text-center">\n                    <h2 class="section-heading">Let\'s Get In Touch!</h2>\n                    <hr class="primary">\n                    <p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>\n                </div>\n                <div class="col-lg-4 col-lg-offset-2 text-center">\n                    <i class="fa fa-phone fa-3x wow bounceIn"></i>\n                    <p>123-456-6789</p>\n                </div>\n                <div class="col-lg-4 text-center">\n                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>\n                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>\n                </div>\n            </div>\n        </div>\n    </section>', 'img/snippets/start_bootstrap_contact.jpg', NULL);

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
  `user_logged_in` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_users`
--

INSERT INTO `site_users` (`user_id`, `user_name`, `user_display_name`, `user_email`, `user_access_level`, `user_password`, `user_summary`, `user_logged_in`) VALUES
(1, 'sriramkasyap', 'Sriram Kasyap Meduri', 'sriramkasyap@coveventure.com', 1, 'Guntur@123', 'Sriram Kasyap Meduri', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_sidenav_items`
--
ALTER TABLE `admin_sidenav_items`
  ADD PRIMARY KEY (`sidenav_id`);

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
-- Indexes for table `site_postmeta_trash`
--
ALTER TABLE `site_postmeta_trash`
  ADD PRIMARY KEY (`postmeta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `snippet_id` (`snippet_id`);

--
-- Indexes for table `site_posts`
--
ALTER TABLE `site_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `author_id` (`user_id`),
  ADD KEY `snippet_id` (`snippet_id`);

--
-- Indexes for table `site_posts_trash`
--
ALTER TABLE `site_posts_trash`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `author_id` (`user_id`),
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
  MODIFY `meta_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `page_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_postmeta`
--
ALTER TABLE `site_postmeta`
  MODIFY `postmeta_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT for table `site_postmeta_trash`
--
ALTER TABLE `site_postmeta_trash`
  MODIFY `postmeta_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT for table `site_posts`
--
ALTER TABLE `site_posts`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `site_posts_trash`
--
ALTER TABLE `site_posts_trash`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_scripts`
--
ALTER TABLE `site_scripts`
  MODIFY `script_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `site_snippets`
--
ALTER TABLE `site_snippets`
  MODIFY `snippet_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site_topnav`
--
ALTER TABLE `site_topnav`
  MODIFY `topnav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site_users`
--
ALTER TABLE `site_users`
  MODIFY `user_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `site_postmeta`
--
ALTER TABLE `site_postmeta`
  ADD CONSTRAINT `site_postmeta_ibfk_2` FOREIGN KEY (`snippet_id`) REFERENCES `site_snippets` (`snippet_id`);

--
-- Constraints for table `site_posts`
--
ALTER TABLE `site_posts`
  ADD CONSTRAINT `site_posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `site_users` (`user_id`),
  ADD CONSTRAINT `site_posts_ibfk_3` FOREIGN KEY (`snippet_id`) REFERENCES `site_snippets` (`snippet_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
