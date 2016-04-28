-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 03:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `t8`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sidenav_items`
--

CREATE TABLE IF NOT EXISTS `admin_sidenav_items` (
  `sidenav_id` int(3) NOT NULL AUTO_INCREMENT,
  `sidenav_name` varchar(50) NOT NULL,
  `sidenav_icon` varchar(50) NOT NULL,
  `sidenav_url` varchar(255) NOT NULL DEFAULT '#',
  `sidenav_has_dropdown` tinyint(1) NOT NULL DEFAULT '0',
  `sidenav_dropdown_items` text NOT NULL,
  `sidenav_pos` int(3) NOT NULL,
  PRIMARY KEY (`sidenav_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Contains Side Navigation panel items' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin_sidenav_items`
--

INSERT INTO `admin_sidenav_items` (`sidenav_id`, `sidenav_name`, `sidenav_icon`, `sidenav_url`, `sidenav_has_dropdown`, `sidenav_dropdown_items`, `sidenav_pos`) VALUES
(1, 'Dashboard', 'fa-dashboard', 'index.php', 0, '', 1),
(2, 'pages', 'fa-files-o', '#', 1, 'add new page,pages.php?task=add;view all pages,pages.php?task=view', 2),
(3, 'posts', 'fa-list-alt', '#', 1, 'add new post,posts.php?task=add;view all posts,posts.php?task=view', 3),
(6, 'Configuration', 'fa-cogs', '#', 1, 'Linked Files, links.php;scripts,scripts.php;plugins,plugins.php;settings,config.php', 4);

-- --------------------------------------------------------

--
-- Table structure for table `plugin_portfolio`
--

CREATE TABLE IF NOT EXISTS `plugin_portfolio` (
  `portfolio_id` int(50) NOT NULL AUTO_INCREMENT,
  `portfolio_name` varchar(255) NOT NULL,
  `portfolio_image` varchar(255) NOT NULL,
  `portfolio_text` varchar(255) NOT NULL,
  PRIMARY KEY (`portfolio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `plugin_portfolio`
--

INSERT INTO `plugin_portfolio` (`portfolio_id`, `portfolio_name`, `portfolio_image`, `portfolio_text`) VALUES
(1, 'Test', 'img/logo_small.png', 'Tester'),
(2, 'Test', 'img/logo_small.png', 'Tester'),
(3, 'Test', 'img/logo_small.png', 'Tester'),
(4, 'Test', 'img/logo_small.png', 'Tester'),
(5, 'Test', 'img/logo_small.png', 'Tester'),
(6, 'Test', 'img/logo_small.png', 'Tester'),
(7, 'Test', 'img/logo_small.png', 'Tester'),
(8, 'Test', 'img/logo_small.png', 'Tester'),
(9, 'Test', 'img/logo_small.png', 'Tester'),
(10, 'Test', 'img/logo_small.png', 'Tester'),
(11, 'Test', 'img/logo_small.png', 'Tester'),
(12, 'Test', 'img/logo_small.png', 'Tester'),
(13, 'Test', 'img/logo_small.png', 'Tester'),
(14, 'Test', 'img/logo_small.png', 'Tester'),
(15, 'Test', 'img/logo_small.png', 'Tester'),
(16, 'Test', 'img/logo_small.png', 'Tester'),
(17, 'Test', 'img/logo_small.png', 'Tester'),
(18, 'Test', 'img/logo_small.png', 'Tester'),
(19, 'Test', 'img/logo_small.png', 'Tester'),
(20, 'Test', 'img/logo_small.png', 'Tester'),
(21, 'Test', 'img/logo_small.png', 'Tester'),
(22, 'Test', 'img/logo_small.png', 'Tester'),
(23, 'Test', 'img/logo_small.png', 'Tester'),
(24, 'Test', 'img/logo_small.png', 'Tester'),
(25, 'Test', 'img/logo_small.png', 'Tester'),
(26, 'Test', 'img/logo_small.png', 'Tester'),
(27, 'Test', 'img/logo_small.png', 'Tester'),
(28, 'Test', 'img/logo_small.png', 'Tester'),
(29, 'Test', 'img/logo_small.png', 'Tester'),
(30, 'Test', 'img/logo_small.png', 'Tester'),
(31, 'Test', 'img/logo_small.png', 'Tester'),
(32, 'Test', 'img/logo_small.png', 'Tester'),
(33, 'Test', 'img/logo_small.png', 'Tester'),
(34, 'Test', 'img/logo_small.png', 'Tester'),
(35, 'Test', 'img/logo_small.png', 'Tester'),
(36, 'Test', 'img/logo_small.png', 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE IF NOT EXISTS `site_config` (
  `config_id` int(3) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_content` mediumtext,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`config_id`, `config_name`, `config_content`) VALUES
(1, 'charset', 'utf-8'),
(2, 'base_url', 'http://localhost:8000/t8_cms/'),
(3, 'description', 'Theme 8'),
(4, 'title', 'T8'),
(5, 'Keywords', 'Cove, Venture, Big Data, Management Consulting, ');

-- --------------------------------------------------------

--
-- Table structure for table `site_contact_requests`
--

CREATE TABLE IF NOT EXISTS `site_contact_requests` (
  `cr_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_links`
--

CREATE TABLE IF NOT EXISTS `site_links` (
  `link_id` int(10) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) NOT NULL,
  `link_rel` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'stylesheet',
  `link_type` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'text/css',
  `link_href` text NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `site_links`
--

INSERT INTO `site_links` (`link_id`, `link_name`, `link_rel`, `link_type`, `link_href`) VALUES
(1, 'Reset CSS', 'stylesheet', 'text/css', 'css/reset.css'),
(2, 'Bootstrap CSS', 'stylesheet', 'text/css', 'css/bootstrap.css'),
(3, 'Font Awesome', 'stylesheet', 'text/css', 'css/font-awesome.css     '),
(4, 'Owl Carousel', 'stylesheet', 'text/css', 'css/owl.carousel.css     '),
(5, 'Fancybox CSS', 'stylesheet', 'text/css', 'css/jquery.fancybox.css     '),
(6, 'Main CSS', 'stylesheet', 'text/css', 'css/main.css     '),
(7, 'Indent CSS', 'stylesheet', 'text/css', 'css/indent.css     '),
(8, 'Flaticon', 'stylesheet', 'text/css', 'fonts/fi/flaticon.css     '),
(9, 'Settings', 'stylesheet', 'text/css', 'rs-plugin/css/settings.css     '),
(10, 'Layers''', 'stylesheet', 'text/css', 'rs-plugin/css/layers.css     '),
(11, 'Navigation', 'stylesheet', 'text/css', 'rs-plugin/css/navigation.css     '),
(12, 'Colorpicker', 'stylesheet', 'text/css', 'tuner/css/colorpicker.css     '),
(13, 'Custom Stylesheet', 'stylesheet', 'text/css', 'tuner/css/styles.css');

-- --------------------------------------------------------

--
-- Table structure for table `site_meta`
--

CREATE TABLE IF NOT EXISTS `site_meta` (
  `meta_id` int(50) NOT NULL AUTO_INCREMENT,
  `meta_name` varchar(255) NOT NULL,
  `meta_content` text NOT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_meta`
--

INSERT INTO `site_meta` (`meta_id`, `meta_name`, `meta_content`) VALUES
(1, 'viewport', 'width=device-width, initial-scale=1');

-- --------------------------------------------------------

--
-- Table structure for table `site_pages`
--

CREATE TABLE IF NOT EXISTS `site_pages` (
  `page_id` int(20) NOT NULL AUTO_INCREMENT,
  `page_url` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_heading` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `page_type` varchar(255) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `site_pages`
--

INSERT INTO `site_pages` (`page_id`, `page_url`, `page_title`, `page_heading`, `page_description`, `page_type`) VALUES
(30, '/home/', 'Home', 'Home', '', 'tet'),
(31, '/test-2/', 'Test 2', 'Test 2', '', 'tester'),
(32, '/test-3/', 'Test 3', 'Test 3', '', 'tester'),
(33, '/test-4/', 'Test 4', 'Test 4', '', 'tester');

-- --------------------------------------------------------

--
-- Table structure for table `site_plugins`
--

CREATE TABLE IF NOT EXISTS `site_plugins` (
  `plugin_id` int(10) NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(255) NOT NULL,
  `plugin_file` varchar(255) NOT NULL,
  `plugin_sub_menus` text NOT NULL COMMENT 'name1,link1;name2,link2;',
  `plugin_installed_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `plugin_author` varchar(255) DEFAULT NULL,
  `plugin_desciription` text NOT NULL,
  `plugin_has_dropdown` tinyint(1) NOT NULL DEFAULT '1',
  `plugin_icon` varchar(255) NOT NULL DEFAULT 'fa-plus',
  PRIMARY KEY (`plugin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `site_plugins`
--

INSERT INTO `site_plugins` (`plugin_id`, `plugin_name`, `plugin_file`, `plugin_sub_menus`, `plugin_installed_date`, `plugin_author`, `plugin_desciription`, `plugin_has_dropdown`, `plugin_icon`) VALUES
(1, 'Header', 'header.php', 'Manage Top Panel,header.php?source=site_top_panel;Manage Nav Bar,header.php?source=site_topnav', '2016-04-26 14:24:35', 'Sriram Kasyap Meduri', 'Header for The Eight Theme', 1, 'fa-header'),
(3, 'Contact Requests', 'contact_process.php', 'View Contact Requests,contact_process.php?task=display', '2016-04-28 06:19:27', 'Sriram Kasyap', 'View all the contact requests made on the Contact Us Page.', 1, 'fa-comments'),
(4, 'Portfolio', 'portfolio.php', 'Manage Portfolios,portfolio.php', '2016-04-28 08:12:57', 'Sriram Kasyap', '', 1, 'fa-plus');

-- --------------------------------------------------------

--
-- Table structure for table `site_postmeta`
--

CREATE TABLE IF NOT EXISTS `site_postmeta` (
  `postmeta_id` int(50) NOT NULL AUTO_INCREMENT,
  `post_id` int(50) NOT NULL,
  `snippet_id` int(50) NOT NULL,
  `postmeta_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `postmeta_pos` int(50) NOT NULL,
  `postmeta_type` enum('varchar','text','number','range','color','email','password','tel','date','datetime','time','file') CHARACTER SET utf8 NOT NULL,
  `postmeta_value` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`postmeta_id`),
  KEY `post_id` (`post_id`),
  KEY `snippet_id` (`snippet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=593 ;

--
-- Dumping data for table `site_postmeta`
--

INSERT INTO `site_postmeta` (`postmeta_id`, `post_id`, `snippet_id`, `postmeta_tag`, `postmeta_pos`, `postmeta_type`, `postmeta_value`) VALUES
(591, 1, 48, 'max_posts_per_page', 0, 'number', '10'),
(592, 2, 48, 'max_posts_per_page', 0, 'number', '10');

-- --------------------------------------------------------

--
-- Table structure for table `site_postmeta_trash`
--

CREATE TABLE IF NOT EXISTS `site_postmeta_trash` (
  `postmeta_id` int(50) NOT NULL AUTO_INCREMENT,
  `post_id` int(50) NOT NULL,
  `snippet_id` int(50) NOT NULL,
  `postmeta_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `postmeta_pos` int(50) NOT NULL,
  `postmeta_type` enum('varchar','text','number','range','color','email','password','tel','date','datetime','time','file') CHARACTER SET utf8 NOT NULL,
  `postmeta_value` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`postmeta_id`),
  KEY `post_id` (`post_id`),
  KEY `snippet_id` (`snippet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=584 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_posts`
--

CREATE TABLE IF NOT EXISTS `site_posts` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `page_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `snippet_id` int(20) NOT NULL,
  `post_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_heading` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_pos` int(20) NOT NULL,
  `post_content` longtext CHARACTER SET utf8 NOT NULL,
  `post_tags` text CHARACTER SET utf8,
  `post_date` date DEFAULT NULL,
  `post_comments` text CHARACTER SET utf8,
  `post_on_every_page` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `page_id` (`page_id`),
  KEY `author_id` (`user_id`),
  KEY `snippet_id` (`snippet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `site_posts`
--

INSERT INTO `site_posts` (`post_id`, `page_id`, `user_id`, `snippet_id`, `post_url`, `post_heading`, `post_pos`, `post_content`, `post_tags`, `post_date`, `post_comments`, `post_on_every_page`) VALUES
(2, 30, 1, 48, '#', 'Portfolio', 1, '<div id="portfolio_page"></div>\n								<script>\n									\n									$.get("http://localhost:8000/t8_cms/cv-admin/plugins/portfolio.php?show_pagin=true&task=view&limit=8",function(data) {\n										$("#portfolio_page").html(data);			\n									});\n								</script>', NULL, '2016-04-28', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_posts_trash`
--

CREATE TABLE IF NOT EXISTS `site_posts_trash` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `page_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `snippet_id` int(20) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_heading` varchar(255) NOT NULL,
  `post_pos` int(20) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_tags` text,
  `post_date` date DEFAULT NULL,
  `post_comments` text,
  PRIMARY KEY (`post_id`),
  KEY `page_id` (`page_id`),
  KEY `author_id` (`user_id`),
  KEY `snippet_id` (`snippet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_scripts`
--

CREATE TABLE IF NOT EXISTS `site_scripts` (
  `script_id` int(20) NOT NULL AUTO_INCREMENT,
  `script_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `script_type` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'text/javascript',
  `script_src` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`script_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `site_scripts`
--

INSERT INTO `site_scripts` (`script_id`, `script_name`, `script_type`, `script_src`) VALUES
(13, 'Youtube', 'text/javascript', 'https://www.youtube.com/player_api'),
(15, 'Jquery UI', 'text/javascript', 'js/jquery-ui.min.js     '),
(16, 'Bootstrap JS', 'text/javascript', 'js/bootstrap.js     '),
(17, 'Owl Carousel JavaScript', 'text/javascript', 'js/owl.carousel.js   '),
(18, 'JQuery Sticky', 'text/javascript', 'js/jquery.sticky.js     '),
(19, 'CWS PArallax', 'text/javascript', 'js/cws_parallax.js     '),
(20, 'FancyBox JS', 'text/javascript', 'js/jquery.fancybox.pack.js     '),
(21, 'Fancybox Media JS', 'text/javascript', 'js/jquery.fancybox-media.js     '),
(22, 'JQuery Isotope', 'text/javascript', 'js/jquery.isotope.min.js     '),
(23, 'JQuery Themepunch', 'text/javascript', 'rs-plugin/js/jquery.themepunch.tools.min.js'),
(24, 'Themepunch Revolution JS', 'text/javascript', 'rs-plugin/js/jquery.themepunch.revolution.min.js'),
(25, 'Revolution Extension', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.slideanims.min.js     '),
(26, 'Revolution_extension Layer Animation', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.layeranimation.min.js     '),
(27, 'Revolution Extension Navigation', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.navigation.min.js     '),
(28, 'Revolution Extension Parallax JS', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.parallax.min.js     '),
(29, 'RE Video JS', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.video.min.js     '),
(30, 'RE Actions', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.actions.min.js     '),
(31, 'RE Kenburn JS', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.kenburn.min.js     '),
(32, 'RE Migration JS', 'text/javascript', 'rs-plugin/js/extensions/revolution.extension.migration.min.js     '),
(33, 'JQuery Validate JS', 'text/javascript', 'js/jquery.validate.min.js     '),
(34, 'JQuery Form', 'text/javascript', 'js/jquery.form.min.js     '),
(35, 'Custom JavaScript', 'text/javascript', 'js/script.js     '),
(36, 'CWS Self Vimeo JS', 'text/javascript', 'js/bg-video/cws_self_vimeo_bg.js     '),
(37, 'JQuery Vimeo API', 'text/javascript', 'js/bg-video/jquery.vimeo.api.min.js     '),
(38, 'CWS YT JS', 'text/javascript', 'js/bg-video/cws_YT_bg.js     '),
(39, 'JQuery Tweet JS', 'text/javascript', 'js/jquery.tweet.js     '),
(42, 'Retina JS', 'text/javascript', 'js/retina.min.js');

-- --------------------------------------------------------

--
-- Table structure for table `site_snippets`
--

CREATE TABLE IF NOT EXISTS `site_snippets` (
  `snippet_id` int(20) NOT NULL AUTO_INCREMENT,
  `snippet_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `snippet_display_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `snippet_tags` text CHARACTER SET utf8 NOT NULL,
  `snippet_content` longtext CHARACTER SET utf8 NOT NULL,
  `snippet_preview_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `snippet_description` text CHARACTER SET utf8,
  PRIMARY KEY (`snippet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `site_snippets`
--

INSERT INTO `site_snippets` (`snippet_id`, `snippet_name`, `snippet_display_name`, `snippet_tags`, `snippet_content`, `snippet_preview_img`, `snippet_description`) VALUES
(20, 'the_eight_page_title', 'The Eight Page Title', 'title', '<section class="breadcrumbs">\r\n        <div class="container">\r\n          <div class="row">\r\n            <div class="col-sm-6"> \r\n              <h1>Portfolio</h1>\r\n            </div>\r\n            <div class="col-sm-6 text-right breadcrumbs-item">\r\n            	<a href="index.html">home</a><i class="fa fa-angle-right"></i>\r\n            	<a href="portfolio-with-sidebar.html">Portfolio</a><i class="fa fa-angle-right"></i>\r\n            	<a href="#">Gallery</a>\r\n           </div>\r\n          </div>\r\n        </div>\r\n      </section>', NULL, NULL),
(21, 'eight_latestnews', 'Eight Latest News', '', ' <section class="page-section pb-70 bg-2 bb-gray">\r\n      <div class="container">\r\n        <h2 class="title-section mb-0 mt-0 text-center">Latest News</h2>\r\n        <div class="divider mb-20 mt-25"></div>\r\n        <p class="text-center mb-50">Ut a nisl id ante tempus hendrerit. Proin pretium, leo ac pellentesque mollis, felis nunc ultrices eros, sed gravida augue augue mollis justo.<br> Suspendisse eu ligula. Nulla facilisi. Donec id justo.</p>\r\n        <div class="carousel-container hover-item">\r\n          <div class="row">\r\n            <div class="owl-three-pag pagiation-carousel main-color carousel-hover">\r\n              <!-- Blog Post image-->\r\n              <div class="blog-item blog-box small">\r\n                <!-- Blog Image-->\r\n                <div class="blog-media">\r\n                  <div class="pic"><img src="pic/blog/370x208/2.jpg" data-at2x="pic/blog/370x208/2@2x.jpg" alt>\r\n                    <div class="hover-effect"></div>\r\n                    <div class="links"><a href="pic/blog/370x208/2%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="blog-single.html" class="link-icon flaticon-return13"></a></div>\r\n                  </div>\r\n                </div>\r\n                <div class="blog-content">\r\n                  <!-- title, author...-->\r\n                  <div class="blog-item-data clearfix">\r\n                    <div class="blog-date">\r\n                      <div class="date">\r\n                        <div class="date-cont"><span class="day">24</span><span title="March" class="month"><span>Mar</span></span><span class="year">2016</span><i class="springs"></i></div>\r\n                      </div>\r\n                    </div>\r\n                    <h3 class="blog-title">Phasellus accumsan cursus velit</h3>\r\n                    <div class="divider gray"></div>\r\n                    <p class="post-info">by <span class="posr-author">admin </span><i>|</i>in <a href="#" class="post-category"> <span>news</span></a>, <a href="#" class="post-category"><span>business</span></a></p>\r\n                  </div>\r\n                  <!-- Text Intro-->\r\n                  <div class="blog-item-body">\r\n                    <p>Vestibulum ante ipsum primis in faucibus ai orci luctus et ultrices posuere cubilia.</p>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! Blog Post image-->\r\n              <!-- Blog Post image-->\r\n              <div class="blog-item blog-box small">\r\n                <!-- Blog Image-->\r\n                <div class="blog-media">\r\n                  <div class="pic"><img src="pic/blog/370x208/3.jpg" data-at2x="pic/blog/370x208/3@2x.jpg" alt>\r\n                    <div class="hover-effect"></div>\r\n                    <div class="links"><a href="pic/blog/370x208/3%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="blog-single.html" class="link-icon flaticon-return13"></a></div>\r\n                  </div>\r\n                </div>\r\n                <div class="blog-content">\r\n                  <!-- title, author...-->\r\n                  <div class="blog-item-data clearfix">\r\n                    <div class="blog-date">\r\n                      <div class="date">\r\n                        <div class="date-cont"><span class="day">23</span><span title="March" class="month"><span>Mar</span></span><span class="year">2016</span><i class="springs"></i></div>\r\n                      </div>\r\n                    </div>\r\n                    <h3 class="blog-title">Aenean posuere, tortor sed cursus</h3>\r\n                    <div class="divider gray"></div>\r\n                    <p class="post-info">by <span class="posr-author">admin </span><i>|</i>in <a href="#" class="post-category"> <span>news</span></a>, <a href="#" class="post-category"><span>business</span></a></p>\r\n                  </div>\r\n                  <!-- Text Intro-->\r\n                  <div class="blog-item-body">\r\n                    <p>Vestibulum ante ipsum primis in faucibus ai orci luctus et ultrices posuere cubilia.</p>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! Blog Post image-->\r\n              <!-- Blog Post image-->\r\n              <div class="blog-item blog-box small">\r\n                <!-- Blog Image-->\r\n                <div class="blog-media">\r\n                  <div class="pic"><img src="pic/blog/370x208/1.jpg" data-at2x="pic/blog/370x208/1@2x.jpg" alt>\r\n                    <div class="hover-effect"></div>\r\n                    <div class="links"><a href="pic/blog/370x208/1%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="blog-single.html" class="link-icon flaticon-return13"></a></div>\r\n                  </div>\r\n                </div>\r\n                <div class="blog-content">\r\n                  <!-- title, author...-->\r\n                  <div class="blog-item-data clearfix">\r\n                    <div class="blog-date">\r\n                      <div class="date">\r\n                        <div class="date-cont"><span class="day">22</span><span title="March" class="month"><span>Mar</span></span><span class="year">2016</span><i class="springs"></i></div>\r\n                      </div>\r\n                    </div>\r\n                    <h3 class="blog-title">Vestibulum ante ipsum primis</h3>\r\n                    <div class="divider gray"></div>\r\n                    <p class="post-info">by <span class="posr-author">admin </span><i>|</i>in <a href="#" class="post-category"> <span>news</span></a>, <a href="#" class="post-category"><span>business</span></a></p>\r\n                  </div>\r\n                  <!-- Text Intro-->\r\n                  <div class="blog-item-body">\r\n                    <p>Vestibulum ante ipsum primis in faucibus ai orci luctus et ultrices posuere cubilia.</p>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! Blog Post image-->\r\n              <!-- Blog Post image-->\r\n              <div class="blog-item blog-box small">\r\n                <!-- Blog Image-->\r\n                <div class="blog-media">\r\n                  <div class="pic"><img src="pic/blog/370x208/2.jpg" data-at2x="pic/blog/370x208/2@2x.jpg" alt>\r\n                    <div class="hover-effect"></div>\r\n                    <div class="links"><a href="pic/blog/370x208/2%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="blog-single.html" class="link-icon flaticon-return13"></a></div>\r\n                  </div>\r\n                </div>\r\n                <div class="blog-content">\r\n                  <!-- title, author...-->\r\n                  <div class="blog-item-data clearfix">\r\n                    <div class="blog-date">\r\n                      <div class="date">\r\n                        <div class="date-cont"><span class="day">21</span><span title="March" class="month"><span>Mar</span></span><span class="year">2016</span><i class="springs"></i></div>\r\n                      </div>\r\n                    </div>\r\n                    <h3 class="blog-title">Faucibus ai orci luctus et</h3>\r\n                    <div class="divider gray"></div>\r\n                    <p class="post-info">by <span class="posr-author">admin </span><i>|</i>in <a href="#" class="post-category"> <span>news</span></a>, <a href="#" class="post-category"><span>business</span></a></p>\r\n                  </div>\r\n                  <!-- Text Intro-->\r\n                  <div class="blog-item-body">\r\n                    <p>Vestibulum ante ipsum primis in faucibus ai orci luctus et ultrices posuere cubilia.</p>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! Blog Post image-->\r\n              <!-- Blog Post image-->\r\n              <div class="blog-item blog-box small">\r\n                <!-- Blog Image-->\r\n                <div class="blog-media">\r\n                  <div class="pic"><img src="pic/blog/370x208/3.jpg" data-at2x="pic/blog/370x208/3@2x.jpg" alt>\r\n                    <div class="hover-effect"></div>\r\n                    <div class="links"><a href="pic/blog/370x208/3%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="blog-single.html" class="link-icon flaticon-return13"></a></div>\r\n                  </div>\r\n                </div>\r\n                <div class="blog-content">\r\n                  <!-- title, author...-->\r\n                  <div class="blog-item-data clearfix">\r\n                    <div class="blog-date">\r\n                      <div class="date">\r\n                        <div class="date-cont"><span class="day">20</span><span title="March" class="month"><span>Mar</span></span><span class="year">2016</span><i class="springs"></i></div>\r\n                      </div>\r\n                    </div>\r\n                    <h3 class="blog-title">Ipsum primis in faucibus ai</h3>\r\n                    <div class="divider gray"></div>\r\n                    <p class="post-info">by <span class="posr-author">admin </span><i>|</i>in <a href="#" class="post-category"> <span>news</span></a>, <a href="#" class="post-category"><span>business</span></a></p>\r\n                  </div>\r\n                  <!-- Text Intro-->\r\n                  <div class="blog-item-body">\r\n                    <p>Vestibulum ante ipsum primis in faucibus ai orci luctus et ultrices posuere cubilia.</p>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! Blog Post image-->\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(22, 'eight_awesome_content', 'Eight Awesome Content', '', '	<section class="page-section">\r\n      <div class="container">\r\n        <div class="row">\r\n          <div class="col-md-6 mb-md-50">\r\n            <!-- section title-->\r\n            <h2 class="title-section mb-0 mt-0">The Eight Is <span>Awesome</span></h2>\r\n            <!-- ! section title-->\r\n            <div class="divider gray mb-20 mt-25 left"></div>\r\n            <p class="mb-25">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula egi et dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient mon tes, nascetur ridiculus mus, quam felis, ultricies nec.</p>\r\n            <!-- skill bar item-->\r\n            <div class="skill-bar st-color-2">\r\n              <div class="name">Branding<span class="skill-bar-perc"></span></div>\r\n              <div class="bar"><span data-value="60" class="cp-bg-color skill-bar-progress"></span></div>\r\n            </div>\r\n            <!-- ! skill bar item-->\r\n            <!-- skill bar item-->\r\n            <div class="skill-bar st-color-4">\r\n              <div class="name">Development<span class="skill-bar-perc"></span></div>\r\n              <div class="bar"><span data-value="70" class="cp-bg-color skill-bar-progress"></span></div>\r\n            </div>\r\n            <!-- ! skill bar item-->\r\n            <!-- skill bar item-->\r\n            <div class="skill-bar">\r\n              <div class="name">Design<span class="skill-bar-perc"></span></div>\r\n              <div class="bar"><span data-value="80" class="cp-bg-color skill-bar-progress"></span></div>\r\n            </div>\r\n            <!-- ! skill bar item-->\r\n            <!-- skill bar item-->\r\n            <div class="skill-bar st-color-3">\r\n              <div class="name">Support<span class="skill-bar-perc"></span></div>\r\n              <div class="bar"><span data-value="90" class="cp-bg-color skill-bar-progress"></span></div>\r\n            </div>\r\n            <!-- ! skill bar item-->\r\n          </div>\r\n          <div class="col-md-6"><img src="http://localhost:8000/t8_cms/pic/items-2.png" alt></div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(23, 'eight_double_parallax', 'Eight DOuble Parallax', '', '   <div class="container-fluid">\r\n      <div class="row flex-box">\r\n        <div style="background-image: url(''http://localhost:8000/t8_cms/pic/parallax-1.jpg'');" class="col-md-6 pt-140 pt-md-80 pb-md-80 pb-140 bg-section">\r\n          <div class="row">\r\n            <div class="col-md-8 half-section left">\r\n              <!-- section title-->\r\n              <h2 class="title-section mt-0 mb-0 text-white">Best Theme Ever! <br>Discover <span class="tx-color-2">The Eight</span></h2>\r\n              <!-- ! section title-->\r\n              <div class="divider left mt-20 mb-25 white"></div>\r\n              <p class="mb-40 text-white">Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p><a href="#" class="cws-button white">Contact Us</a>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div style="background-image: url(''http://localhost:8000/t8_cms/pic/parallax-2.jpg'');" class="col-md-6 pt-140 pt-md-80 pb-md-80 pb-140 bg-section">\r\n          <div class="row">\r\n            <div class="col-md-8 pl-55 half-section">\r\n              <!-- section title-->\r\n              <h2 class="title-section mt-0 mb-0 text-white">Welcome To <span>The Eight</span>,<br> Check It Now</h2>\r\n              <!-- ! section title-->\r\n              <div class="divider left mt-20 mb-25 white"></div>\r\n              <p class="mb-40 text-white">Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.</p><a href="#" class="cws-button white">Watch More</a>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>', NULL, NULL),
(24, 'eight_team', 'Eight Team', '', '    <section class="page-section">\r\n      <div class="container">\r\n        <h2 class="title-section mb-0 mt-0 text-center">Meet Our <span>Team</span></h2>\r\n        <div class="divider mb-20 mt-25 gray"></div>\r\n        <p class="text-center mb-50">Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis ullamcorper velit. Phasellus gravida semper nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.</p>\r\n        <div class="row cws-multi-col">\r\n          <div class="col-md-3 col-sm-6 mb-md-30">\r\n            <!-- profile item-->\r\n            <div class="profile-item">\r\n              <div class="pic"><img src="http://localhost:8000/t8_cms/pic/team/3.jpg" data-at2x="pic/team/3@2x.jpg" alt>\r\n                <div class="hover-effect"></div>\r\n                <div class="links"><a href="http://localhost:8000/t8_cms/pic/team/3%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="page-profile.html" class="link-icon flaticon-return13"></a></div>\r\n              </div>\r\n              <div class="profile-info">\r\n                <h3 class="profile-name">Joshua Doe<span class="special"> / Developer</span></h3>\r\n                <div class="divider"></div>\r\n                <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec.</p>\r\n                <div class="social-link"><a href="#" class="cws-social flaticon-facebook55"></a><a href="#" class="cws-social flaticon-twitter1"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social flaticon-social-network106"></a><a href="#" class="cws-social flaticon-pinterest3"></a></div>\r\n              </div>\r\n            </div>\r\n            <!-- ! profile item-->\r\n          </div>\r\n          <div class="col-md-3 col-sm-6 mb-md-30">\r\n            <!-- profile item-->\r\n            <div class="profile-item">\r\n              <div class="pic"><img src="http://localhost:8000/t8_cms/pic/team/1.jpg" data-at2x="pic/team/1@2x.jpg" alt>\r\n                <div class="hover-effect"></div>\r\n                <div class="links"><a href="http://localhost:8000/t8_cms/pic/team/1%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="page-profile.html" class="link-icon flaticon-return13"></a></div>\r\n              </div>\r\n              <div class="profile-info">\r\n                <h3 class="profile-name">Scott Doe<span class="special"> / Web Designer</span></h3>\r\n                <div class="divider color-4"></div>\r\n                <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec.</p>\r\n                <div class="social-link"><a href="#" class="cws-social flaticon-facebook55"></a><a href="#" class="cws-social flaticon-twitter1"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social flaticon-social-network106"></a><a href="#" class="cws-social flaticon-pinterest3"></a></div>\r\n              </div>\r\n            </div>\r\n            <!-- ! profile item-->\r\n          </div>\r\n          <div class="col-md-3 col-sm-6 mb-sm-30">\r\n            <!-- profile item-->\r\n            <div class="profile-item">\r\n              <div class="pic"><img src="http://localhost:8000/t8_cms/pic/team/2.jpg" data-at2x="pic/team/2@2x.jpg" alt>\r\n                <div class="hover-effect"></div>\r\n                <div class="links"><a href="http://localhost:8000/t8_cms/pic/team/2%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="page-profile.html" class="link-icon flaticon-return13"></a></div>\r\n              </div>\r\n              <div class="profile-info">\r\n                <h3 class="profile-name">Mary Doe<span class="special"> / Graphic Designer</span></h3>\r\n                <div class="divider color-2"></div>\r\n                <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec.</p>\r\n                <div class="social-link"><a href="#" class="cws-social flaticon-facebook55"></a><a href="#" class="cws-social flaticon-twitter1"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social flaticon-social-network106"></a><a href="#" class="cws-social flaticon-pinterest3"></a></div>\r\n              </div>\r\n            </div>\r\n            <!-- ! profile item-->\r\n          </div>\r\n          <div class="col-md-3 col-sm-6">\r\n            <!-- profile item-->\r\n            <div class="profile-item">\r\n              <div class="pic"><img src="http://localhost:8000/t8_cms/pic/team/4.jpg" data-at2x="pic/team/4@2x.jpg" alt>\r\n                <div class="hover-effect"></div>\r\n                <div class="links"><a href="http://localhost:8000/t8_cms/pic/team/4%402x.jpg" class="link-icon flaticon-magnifying-glass84 fancy"></a><a href="page-profile.html" class="link-icon flaticon-return13"></a></div>\r\n              </div>\r\n              <div class="profile-info">\r\n                <h3 class="profile-name">Peter Doe<span class="special"> / Ceo</span></h3>\r\n                <div class="divider color-3"></div>\r\n                <p>Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec.</p>\r\n                <div class="social-link"><a href="#" class="cws-social flaticon-facebook55"></a><a href="#" class="cws-social flaticon-twitter1"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social flaticon-social-network106"></a><a href="#" class="cws-social flaticon-pinterest3"></a></div>\r\n              </div>\r\n            </div>\r\n            <!-- ! profile item-->\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(25, 'eight_parallax2', 'Eight Parallax2', '', '    <section class="page-section cws_prlx_section pt-70 pb-70 border-t border-b"><img src="http://localhost:8000/t8_cms/pic/parallax-map.jpg" alt class="cws_prlx_layer">\r\n      <div class="container">\r\n        <div class="row cws-multi-col">\r\n          <div class="col-sm-3 col-xs-6 mb-md-50">\r\n            <!-- counter block-->\r\n            <div class="counter-block border-none white-t"><i class="counter-icon flaticon-social-network156"></i>\r\n              <div data-count="4350" class="counter">0</div>\r\n              <div class="count-divider"></div>\r\n              <div class="counter-name text-uppercase">User Online</div>\r\n            </div>\r\n            <!-- ! counter block-->\r\n          </div>\r\n          <div class="col-sm-3 col-xs-6 mb-md-50">\r\n            <!-- counter block-->\r\n            <div class="counter-block border-none white-t"><i class="counter-icon flaticon-diamond7"></i>\r\n              <div data-count="5600" class="counter">0</div>\r\n              <div class="count-divider"></div>\r\n              <div class="counter-name text-uppercase">Prizes Win</div>\r\n            </div>\r\n            <!-- counter block-->\r\n          </div>\r\n          <div class="col-sm-3 col-xs-6">\r\n            <!-- counter block-->\r\n            <div class="counter-block border-none white-t"><i class="counter-icon flaticon-hearts49"></i>\r\n              <div data-count="7200" class="counter">0</div>\r\n              <div class="count-divider"></div>\r\n              <div class="counter-name text-uppercase">Happy Customers</div>\r\n            </div>\r\n            <!-- ! counter block-->\r\n          </div>\r\n          <div class="col-sm-3 col-xs-6">\r\n            <!-- counter block-->\r\n            <div class="counter-block border-none white-t"><i class="counter-icon flaticon-portfolio2"></i>\r\n              <div data-count="8190" class="counter">0</div>\r\n              <div class="count-divider"></div>\r\n              <div class="counter-name text-uppercase">Awesome Projects</div>\r\n            </div>\r\n            <!-- ! counter block-->\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(26, 'the_eight_pricing_table', 'The Eight Pricing Table', '', '<section class="page-section">\r\n      <div class="container">\r\n        <!-- section title-->\r\n        <h2 class="title-section mt-0 mb-0 text-center">Our Price Tables</h2>\r\n        <!-- ! section title-->\r\n        <div class="divider mt-20 mb-25"></div>\r\n        <p class="mb-50 text-center">Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis ullamcorper velit. Phasellus gravida semper<br> nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.</p>\r\n        <div class="row">\r\n          <div class="col-md-10 col-md-offset-1">\r\n            <div class="row cws-multi-col">\r\n              <div class="col-md-4 col-sm-6 mb-md-30">\r\n                <article class="pricing-tables">\r\n                  <div class="header-pt">\r\n                    <h3>Basic</h3>\r\n                  </div>\r\n                  <div class="price-pt"><sup>$</sup>6<sup>.99</sup><sub>monthly</sub></div>\r\n                  <ul class="pricing-list">\r\n                    <li> <i class="list-icon flaticon-social-network156"></i>1 User Account</li>\r\n                    <li> <i class="list-icon flaticon-lights7"></i>15 Projects</li>\r\n                    <li> <i class="list-icon flaticon-floppy20"></i>3 Gb Storage</li>\r\n                    <li> <i class="list-icon flaticon-arrow164"></i>100 Files Upload</li>\r\n                    <li> <i class="list-icon flaticon-clocks18"></i>3h Assistance</li>\r\n                  </ul><a href="#" class="cws-button small">Try It Now</a>\r\n                </article>\r\n              </div>\r\n              <div class="col-md-4 col-sm-6 mb-md-30">\r\n                <article class="pricing-tables st-color-2">\r\n                  <div class="header-pt">\r\n                    <h3>Standart</h3>\r\n                  </div>\r\n                  <div class="price-pt"><sup>$</sup>12<sup>.99</sup><sub>monthly</sub></div>\r\n                  <ul class="pricing-list">\r\n                    <li> <i class="list-icon flaticon-social-network156"></i>5 User Account</li>\r\n                    <li> <i class="list-icon flaticon-lights7"></i>45 Projects</li>\r\n                    <li> <i class="list-icon flaticon-floppy20"></i>10 Gb Storage</li>\r\n                    <li> <i class="list-icon flaticon-arrow164"></i>1000 Files Upload</li>\r\n                    <li> <i class="list-icon flaticon-clocks18"></i>12h Assistance</li>\r\n                  </ul><a href="#" class="cws-button small color-2">Try It Now</a>\r\n                </article>\r\n              </div>\r\n              <div class="col-md-4 col-sm-6">\r\n                <article class="pricing-tables st-color-3">\r\n                  <div class="header-pt">\r\n                    <h3>Premium</h3>\r\n                  </div>\r\n                  <div class="price-pt"><sup>$</sup>24<sup>.99</sup><sub>monthly</sub></div>\r\n                  <ul class="pricing-list">\r\n                    <li> <i class="list-icon flaticon-social-network156"></i>Unlimited User Account</li>\r\n                    <li> <i class="list-icon flaticon-lights7"></i>Unlimited Projects</li>\r\n                    <li> <i class="list-icon flaticon-floppy20"></i>100 Gb Storage</li>\r\n                    <li> <i class="list-icon flaticon-arrow164"></i>Unlimited Files Upload</li>\r\n                    <li> <i class="list-icon flaticon-clocks18"></i>24h Assistance</li>\r\n                  </ul><a href="#" class="cws-button small color-3">Try It Now</a>\r\n                </article>\r\n              </div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(27, 'the_eight_testimonials', 'The Eight Testimonials', '', '<section class="page-section cws_prlx_section pt-120 pb-70"><img src="http://localhost:8000/t8_cms/pic/parallax-3.jpg" alt class="cws_prlx_layer">\r\n      <div class="overlay pattern"></div>\r\n      <div class="container">\r\n        <div class="row">\r\n          <div class="col-md-10 col-md-offset-1">\r\n            <h2 class="title-section mb0 mt-0 text-center text-white">Testimonials</h2>\r\n            <div class="divider mb-20 mt-25 white"></div>\r\n            <p class="text-center text-white mb-40"> Praesent nec nisl a purus blandit viverra. Praesent ac massa at ligula laoreet iaculis. Nulla neque dolor, sagittis eget, iaculis quis, molestie non, velit. Mauris turpis nunc, blandit et, volutpat molestie, porta ut, ligula.</p>\r\n          </div>\r\n        </div>\r\n        <div class="carousel-container">\r\n          <div class="row">\r\n            <div class="owl-two-pag pagiation-carousel white">\r\n              <!-- comment list section-->\r\n              <div class="comments">\r\n                <div class="comment-list">\r\n                  <div class="comment-container white clearfix">\r\n                    <div class="author"><img src="http://localhost:8000/t8_cms/pic/team/100x100/1.jpg" data-at2x="http://localhost:8000/t8_cms/pic/team/100x100/1@2x.jpg" alt class="color-4">\r\n                      <div class="author-name">Matthew Doe</div>\r\n                    </div>\r\n                    <div class="comment-text">\r\n                      <div class="description">\r\n                        <p>Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultrici es sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Done mollis hendrerit risus. Phasellus nec sem in justo ...</p>\r\n                      </div><a href="#" class="button-reply"><i class="flaticon-return13"></i></a>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! comment list section-->\r\n              <!-- comment list section-->\r\n              <div class="comments">\r\n                <div class="comment-list">\r\n                  <div class="comment-container white clearfix">\r\n                    <div class="author"><img src="http://localhost:8000/t8_cms/pic/team/100x100/2.jpg" data-at2x="http://localhost:8000/t8_cms/pic/team/100x100/2@2x.jpg" alt class="color-4">\r\n                      <div class="author-name">Mary Doe</div>\r\n                    </div>\r\n                    <div class="comment-text">\r\n                      <div class="description">\r\n                        <p>Curabitur ligula sapien, tincidunt non, euismod vitae, pose uere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor ...</p>\r\n                      </div><a href="#" class="button-reply"><i class="flaticon-return13"></i></a>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! comment list section-->\r\n              <!-- comment list section-->\r\n              <div class="comments">\r\n                <div class="comment-list">\r\n                  <div class="comment-container white clearfix">\r\n                    <div class="author"><img src="http://localhost:8000/t8_cms/pic/team/100x100/3.jpg" data-at2x="http://localhost:8000/t8_cms/pic/team/100x100/3@2x.jpg" alt class="color-4">\r\n                      <div class="author-name">Matthew Doe</div>\r\n                    </div>\r\n                    <div class="comment-text">\r\n                      <div class="description">\r\n                        <p>Curabitur ligula sapien, tincidunt non, euismod vitae, pose uere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor ...</p>\r\n                      </div><a href="#" class="button-reply"></a><a href="#" class="button-reply"><i class="flaticon-return13"></i></a>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! comment list section-->\r\n              <!-- comment list section-->\r\n              <div class="comments">\r\n                <div class="comment-list">\r\n                  <div class="comment-container white clearfix">\r\n                    <div class="author"><img src="http://localhost:8000/t8_cms/pic/team/100x100/4.jpg" data-at2x="http://localhost:8000/t8_cms/pic/team/100x100/4@2x.jpg" alt class="color-4">\r\n                      <div class="author-name">Matthew Doe</div>\r\n                    </div>\r\n                    <div class="comment-text">\r\n                      <div class="description">\r\n                        <p>Curabitur ligula sapien, tincidunt non, euismod vitae, pose uere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor ...</p>\r\n                      </div><a href="#" class="button-reply"></a><a href="#" class="button-reply"><i class="flaticon-return13"></i></a>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n              <!-- ! comment list section-->\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(28, 'eight_contact', 'Eight Contact', '', '   <section class="page-section pb-0">\r\n      <div class="container">\r\n        <!-- section title-->\r\n        <h2 class="title-section mt-0 mb-0 text-center">Contact Us</h2>\r\n        <!-- ! section title-->\r\n        <div class="divider mt-20 mb-25"></div>\r\n        <p class="mb-50 text-center">Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis ullamcorper velit. Phasellus gravida semper<br> nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.</p>\r\n        <div class="row">\r\n          <div class="col-md-6 mb-md-50">\r\n            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>\r\n            <hr>\r\n            <address class="contact-address">\r\n              <p><span>Address:</span> 250 Biscayne Blvd. (North) 11st Floor New Tower Miami, Florida 33148</p>\r\n              <p><span>Phone number:</span> <a href="tel:180012345678">1-800-123-45678</a></p>\r\n              <p><span>Email:</span> <a href="mailto:the8@gmail.com">the8@gmail.com</a></p>\r\n            </address>\r\n            <hr>\r\n            <!-- social icons--><a href="#" class="cws-social flaticon-facebook55"></a><a href="#" class="cws-social flaticon-twitter1"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social flaticon-social-network106"></a><a href="#" class="cws-social flaticon-pinterest3"></a>\r\n            <!-- ! social icons-->\r\n          </div>\r\n          <div class="col-md-6">\r\n            <div class="widget-contact-form pb-0">\r\n              <!-- contact-form-->\r\n              <div id="feedback-form-errors" role="alert" class="alert alert-danger alt alert-dismissible fade in">\r\n                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button><i class="alert-icon border flaticon-exclamation-mark1"></i><strong>Error Message!</strong><br>\r\n                <div class="message"></div>\r\n              </div>\r\n              <div class="email_server_responce"></div>\r\n              <form action="http://html.creaws.com/t8/php/contacts-process.php" method="post" class="form contact-form alt clearfix">\r\n                <input type="text" name="name" value="" size="40" placeholder="Your Name" aria-invalid="false" aria-required="true" class="form-row form-row-first">\r\n                <input type="text" name="email" value="" size="40" placeholder="Your Email" aria-required="true" class="form-row form-row-last">\r\n                <textarea name="message" cols="40" rows="4" placeholder="Your Message" aria-invalid="false" aria-required="true"></textarea>\r\n                <input type="submit" value="Send Message" class="cws-button border-radius pull-right">\r\n              </form>\r\n              <!-- /contact-form-->\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n      	  <div>\r\n	  &nbsp;\r\n	  </div>\r\n    </section>', NULL, NULL),
(29, 'eight_footer', 'Eight Footer', '', '    <footer class="footer">\r\n      <div class="container">\r\n        <div class="row cws-multi-col">\r\n          <div class="col-md-3 col-sm-6 mb-md-50">\r\n            <div class="widget-footer text">\r\n              <h3>About</h3>\r\n              <div class="divider"></div>\r\n              <p>Ut tincidunt nisl sapien, eget gravida quama vestibulum vitae. Ut ultrices purus quis tinci dunt rutrum proin commodo ipsum.</p>\r\n              <p>Vestibulum vitae nisl quis elit tristique egesi tas eget sed nisi. Etiam mi sapien, luctus ac tempor quis, varius eu neque.</p>\r\n            </div>\r\n          </div>\r\n          <div class="col-md-3 col-sm-6 mb-md-50">\r\n            <div class="widget-footer">\r\n              <h3>Recent posts</h3>\r\n              <div class="divider"></div>\r\n              <div class="recent-item clearfix"><a href="blog-single.html"><img src="http://localhost:8000/t8_cms/pic/footer/7.jpg" data-at2x="http://localhost:8000/t8_cms/pic/footer/7@2x.jpg" alt></a>\r\n                <h4 class="recent-title"><a href="blog-single.html">Morbi Iaculis</a></h4>\r\n                <p>Ut tincidunt nisl s apien, eget gravida sed nisi reet ... <a href="#">more</a></p>\r\n              </div>\r\n              <div class="recent-item clearfix"><a href="blog-single.html"><img src="pic/footer/8.jpg" data-at2x="http://localhost:8000/t8_cms/pic/footer/8@2x.jpg" alt></a>\r\n                <h4 class="recent-title"><a href="blog-single.html">Praesent sagittis</a></h4>\r\n                <p>Ut tincidunt nisl s apien, eget gravida sed nisi reet ... <a href="#">more</a></p>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          <div class="col-md-3 col-sm-6 mb-sm-50">\r\n            <div class="widget-footer">\r\n              <h3>Gallery</h3>\r\n              <div class="divider"></div>\r\n              <div class="gallery clearfix">\r\n                <div class="gallery-item">\r\n                  <div class="pic"><img src="http://localhost:8000/t8_cms/pic/footer/1.jpg" alt data-at2x="http://localhost:8000/t8_cms/pic/footer/1@2x.jpg">\r\n                    <div class="hover-effect alt">\r\n                      <div class="links"><a href="http://localhost:8000/t8_cms/pic/footer/1%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n                <div class="gallery-item">\r\n                  <div class="pic"><img src="http://localhost:8000/t8_cms/pic/footer/2.jpg" alt data-at2x="pic/footer/2@2x.jpg">\r\n                    <div class="hover-effect alt">\r\n                      <div class="links"><a href="http://localhost:8000/t8_cms/pic/footer/2%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n                <div class="gallery-item">\r\n                  <div class="pic"><img src="http://localhost:8000/t8_cms/pic/footer/3.jpg" alt data-at2x="http://localhost:8000/t8_cms/pic/footer/3@2x.jpg">\r\n                    <div class="hover-effect alt">\r\n                      <div class="links"><a href="http://localhost:8000/t8_cms/pic/footer/3%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n                <div class="gallery-item">\r\n                  <div class="pic"><img src="http://localhost:8000/t8_cms/pic/footer/4.jpg" alt data-at2x="http://localhost:8000/t8_cms/pic/footer/4@2x.jpg">\r\n                    <div class="hover-effect alt">\r\n                      <div class="links"><a href="http://localhost:8000/t8_cms/pic/footer/4%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n                <div class="gallery-item">\r\n                  <div class="pic"><img src="http://localhost:8000/t8_cms/pic/footer/5.jpg" alt data-at2x="http://localhost:8000/t8_cms/pic/footer/5@2x.jpg">\r\n                    <div class="hover-effect alt">\r\n                      <div class="links"><a href="http://localhost:8000/t8_cms/pic/footer/5%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n                <div class="gallery-item">\r\n                  <div class="pic"><img src="http://localhost:8000/t8_cms/pic/footer/6.jpg" alt data-at2x="http://localhost:8000/t8_cms/pic/footer/6@2x.jpg">\r\n                    <div class="hover-effect alt">\r\n                      <div class="links"><a href="http://localhost:8000/t8_cms/pic/footer/6%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a></div>\r\n                    </div>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          <div class="col-md-3 col-sm-6">\r\n            <div class="widget-footer">\r\n              <h3>Contact us</h3>\r\n              <div class="divider"></div>\r\n              <address>\r\n                <p>You can contact us via <a href="mailto:the8@gmail.com">the8@gmail.com</a></p><strong>Our address</strong>\r\n                <p>250 Biscayne Blvd. (North) 11st Floor New World Tower Miami, Florida 33148</p><strong>Our phone</strong><br><a href="tel:180012345678">1-800-123-45678</a>\r\n              </address>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n      <div class="copyright">\r\n        <div class="container">\r\n          <div class="row">\r\n            <div class="col-sm-8">\r\n              <p>Copyrights ©2016: The8 - Premium Multipurpose WordPress Theme</p>\r\n            </div>\r\n            <div class="col-sm-4 text-right"><a href="#" class="cws-social flaticon-facebook55"></a><a href="#" class="cws-social flaticon-twitter1"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social flaticon-social-network106"></a><a href="#" class="cws-social flaticon-pinterest3"></a></div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </footer>', NULL, NULL),
(42, 'the_eight_slider', 'The Eight Slider', '', '    <div class="tp-banner-container">\r\n      <div class="tp-banner-slider">\r\n        <ul>\r\n          <li data-masterspeed="700" data-slotamount="7" data-transition="fade"><img src="rs-plugin/assets/loader.gif" data-bgfit="cover" data-bgposition="center 70%" data-lazyload="http://localhost:8000/t8_cms/pic/slider/main/slide-1.jpg" alt="" data-bgparallax="10">\r\n            <div data-x="[''left'',''center'',''center'',''center'']" data-hoffset="0" data-y="center" data-voffset="-70%" data-width="[''1170px'',''700px'',''500px'',''300px'']" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="400" class="tp-caption sl-content text-center"><img src="img/the8-logo-sticky%402x.png" data-at2x="img/the8-logo-sticky@2x.png" alt>\r\n              <div class="sl-title text-white">MEET THE EIGHT</div>\r\n              <p class="text-white">Creative, Multipurpose WordPress Theme</p><a href="#" class="cws-button white">Discover Now</a>\r\n            </div>\r\n          </li>\r\n          <li data-masterspeed="700" data-transition="fade"><img src="rs-plugin/assets/loader.gif" data-lazyload="http://localhost:8000/t8_cms/pic/slider/main/slide-2.jpg" data-bgposition="center 45%" alt="" data-bgparallax="10">\r\n            <div data-x="[''right'',''center'',''center'',''center'']" data-hoffset="0" data-y="center" data-voffset="-70%" data-width="[''1170px'',''700px'',''500px'',''300px'']" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="400" class="tp-caption sl-content text-center"><img src="img/the8-logo-sticky%402x.png" data-at2x="img/the8-logo-sticky@2x.png" alt>\r\n              <div class="sl-title text-white">ENDLESS POSSIBILITIES</div>\r\n              <p class="text-white">The best solution for your business.</p><a href="#" class="cws-button white">Discover Now</a>\r\n            </div>\r\n          </li>\r\n          <li data-masterspeed="700" data-transition="fade"><img src="rs-plugin/assets/loader.gif" data-lazyload="http://localhost:8000/t8_cms/pic/slider/main/slide-3.jpg" data-bgposition="center 67%" alt="" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10">\r\n            <div data-x="[''left'',''center'',''center'',''center'']" data-hoffset="0" data-y="center" data-voffset="-70%" data-width="[''1170px'',''700px'',''500px'',''300px'']" data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-start="400" class="tp-caption sl-content text-center"><img src="http://localhost:8000/t8_cms/img/the8-logo-sticky%402x.png" data-at2x="http://localhost:8000/t8_cms/img/the8-logo-sticky@2x.png" alt>\r\n              <div class="sl-title text-white">SIMPLE & POWERFUL </div>\r\n              <p class="text-white">Create with no limits.</p><a href="#" class="cws-button white">Discover Now</a>\r\n            </div>\r\n          </li>\r\n        </ul>\r\n      </div>\r\n    </div>', NULL, NULL),
(43, 'service_container', 'Service Container', '', '   <div class="container">\r\n      <div class="row">\r\n        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 p-side">\r\n          <div class="row flex-box services-with-bg mt-minus">\r\n            <div class="col-md-4 service-center-icon white text-center">\r\n              <!-- bg icon--><i class="cws-icon flaticon-lights7 mb-20"></i>\r\n              <!-- ! bg icon-->\r\n              <!-- title-->\r\n              <h3 class="mt-0 mb-0">Research</h3>\r\n              <!-- ! title-->\r\n              <div class="divider mt-10 mb-5 gray-darknest mini"></div>\r\n              <p class="mb-30">Lorem ipsum dolor sit amet</p><a href="#" class="cws-button small">See More</a>\r\n            </div>\r\n            <div class="col-md-4 service-center-icon color-4 text-center">\r\n              <!-- bg icon--><i class="cws-icon flaticon-mug16 text-white mb-20"></i>\r\n              <!-- ! bg icon-->\r\n              <!-- title-->\r\n              <h3 class="mt-0 mb-0 text-white">Design</h3>\r\n              <!-- ! title-->\r\n              <div class="divider mt-10 mb-5 white mini"></div>\r\n              <p class="text-white mb-30">Lorem ipsum dolor sit amet</p><a href="#" class="cws-button white color-4 small">See More</a>\r\n            </div>\r\n            <div class="col-md-4 service-center-icon text-center">\r\n              <!-- bg icon--><i class="cws-icon flaticon-diamond7 text-white mb-20"></i>\r\n              <!-- ! bg icon-->\r\n              <!-- title-->\r\n              <h3 class="mt-0 mb-0 text-white">Developing</h3>\r\n              <!-- ! title-->\r\n              <div class="divider mt-10 mb-5 white mini"></div>\r\n              <p class="text-white mb-30">Lorem ipsum dolor sit amet</p><a href="#" class="cws-button white small">See More</a>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>', NULL, NULL);
INSERT INTO `site_snippets` (`snippet_id`, `snippet_name`, `snippet_display_name`, `snippet_tags`, `snippet_content`, `snippet_preview_img`, `snippet_description`) VALUES
(44, 'our_features', 'Our Features', '', '    <section class="page-section">\r\n      <div class="container">\r\n        <div class="row">\r\n          <div class="col-md-10 col-md-offset-1">\r\n            <!-- title section-->\r\n            <h2 class="title-section text-center mt-0 mb-0">Our <span>Features</span></h2>\r\n            <!-- ! title section-->\r\n            <div class="divider gray mt-20 mb-25"></div>\r\n            <p class="text-center mb-40">Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis ullamcorper velit. Phasellus gravida semper nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam.</p>\r\n          </div>\r\n        </div>\r\n        <div class="row flex-box">\r\n          <div class="col-md-4 mb-md-50">\r\n            <!-- service item-->\r\n            <div class="service-item icon-right mb-50"><i class="flaticon-pencils13 cws-icon type-3"></i>\r\n              <h3>Clean Design</h3>\r\n              <p>Lorem ipsum dolor sit amet, consectetuer adip iscing elit, enean commodo. <a href="#">See More !</a></p>\r\n            </div>\r\n            <!-- ! service item-->\r\n            <!-- service item-->\r\n            <div class="service-item icon-right mb-50"><i class="flaticon-cogwheels10 cws-icon type-3 color-5"></i>\r\n              <h3>Unbelievable options</h3>\r\n              <p>Cum penatibus et magnis disel parturient montes, nascetur. <a href="#" class="color-5">Learn More !</a></p>\r\n            </div>\r\n            <!-- ! service item-->\r\n            <!-- service item-->\r\n            <div class="service-item icon-right"><i class="flaticon-smartphones23 cws-icon type-3 color-4"></i>\r\n              <h3>Responsive Layout</h3>\r\n              <p>Donec pede justo, fringilla vel, aliquet nec, vul putate eget, arcu. In enim justo. <a href="#" class="color-4">Read !</a></p>\r\n            </div>\r\n            <!-- ! service item-->\r\n          </div>\r\n          <div class="col-md-4 mb-md-170 flex-item-end"><img src="http://localhost:8000/t8_cms/pic/woman-blue.jpg" alt class="mb-minus-140"></div>\r\n          <div class="col-md-4">\r\n            <!-- service item-->\r\n            <div class="service-item icon-left mb-50"><i class="flaticon-shopping-carts6 cws-icon type-3 color-3"></i>\r\n              <h3>Shop Pages Included</h3>\r\n              <p>Nullam dictum felis eu pede mollis pretium. In teger tincidunt. Cras dapibus. <a href="#" class="color-3">See Now !</a></p>\r\n            </div>\r\n            <!-- ! service item-->\r\n            <!-- service item-->\r\n            <div class="service-item icon-left mb-50"><i class="flaticon-mug16 cws-icon type-3 color-2"></i>\r\n              <h3>Unlimited Colors</h3>\r\n              <p>Aenean vulputate tellus. Aenean leosi ligula, rosuces consequat vitae. <a href="#" class="color-2">See More !</a></p>\r\n            </div>\r\n            <!-- ! service item-->\r\n            <!-- service item-->\r\n            <div class="service-item icon-left"><i class="flaticon-profile5 cws-icon type-3 color-6"></i>\r\n              <h3>Friendly Support</h3>\r\n              <p>Phasellus viverra nulla varius laoreet. Quisque rutrum, cies nisi vel augue. <a href="#" class="color-6">Try It !</a></p>\r\n            </div>\r\n            <!-- ! service item-->\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(45, 'the_eight_about', 'About the Eight', '', '    <section class="page-section bg-gray bt-gray">\n      <div class="container">\n        <div class="row">\n          <div class="col-md-6 mb-md-50"><img src="http://localhost:8000/t8_cms/pic/items-1.png" alt class="fix-img-2 mt-20"></div>\n          <div class="col-md-6">\n            <!-- section title-->\n            <h2 class="title-section mt-0 mb-0">About <span>The Eight</span></h2>\n            <!-- ! section title-->\n            <div class="divider left mt-20 mb-25"></div>\n            <p class="mb-25">Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis ullamcorper velit. Phasellus gravida semper nisi. </p>\n            <!-- toogle-->\n            <div class="toggle mb-40">\n              <div class="content-title active"> <i class="flaticon-arrow487 toggle-icon"></i><span class="active"><i class="flaticon-lights7"></i>Estibulum ante ipsum primis in faucibus orci luctus et ultrices</span></div>\n              <div style="display: block" class="content">Cras posuere vel ipsum ac varius. Nam hendrerit odio eget diam venenatis, in eros tempus ante blandit. Aenean accumsan tellus leo.</div>\n              <div class="content-title"> <i class="flaticon-arrow487 toggle-icon"></i><span><i class="flaticon-diamond7"></i>Estibulum ante ipsum primis in faucibus orci luctus et ultrices.</span></div>\n              <div class="content">Cras posuere vel ipsum ac varius. Nam hendrerit odio eget diam venenatis, in eros tempus ante blandit. Aenean accumsan tellus leo.</div>\n              <div class="content-title"> <i class="flaticon-arrow487 toggle-icon"></i><span><i class="flaticon-smartphones23"></i>Estibulum ante ipsum primis in faucibus orci luctus et ultrices.</span></div>\n              <div class="content">Cras posuere vel ipsum ac varius. Nam hendrerit odio eget diam venenatis, in eros tempus ante blandit. Aenean accumsan tellus leo.</div>\n            </div>\n            <!-- ! toogle--><a href="#" class="cws-button">Learn More</a><a href="#" class="cws-button alt">Buy Theme</a>\n          </div>\n        </div>\n      </div>\n      <!-- list-->\n    </section>', NULL, NULL),
(46, 'the_eight_parallax', 'The Eight Parallax', '', '   <section class="page-section cws_prlx_section pt-180 pb-180"><img src="http://localhost:8000/t8_cms/pic/1920x1080-img-1.jpg" alt class="cws_prlx_layer">\r\n      <div class="overlay"></div>\r\n      <div class="container">\r\n        <div class="row">\r\n          <div class="col-md-10 col-md-offset-1">\r\n            <h2 class="title-section mb0 mt-0 text-center text-white">Best Theme Ever! Discover <span>The Eight</span></h2>\r\n            <div class="divider mb-20 mt-25 white"></div>\r\n            <p class="text-center text-white mb-30">Donec convallis a velit nec ultricies. Vestibulum elementum neque vitae orci vehicula, ac varius mi fringilla. Nullam molestie lectus vitae lorem aliquet, quis rutrum quam blandit. Nunc arcu mi, blandit ac nisl ut, lacinia dignissim massa.</p>\r\n            <div class="text-center"><a href="#" class="cws-button white">Check It</a></div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(47, 'eight_banner', 'Eight Banner', '', '    <section class="banner-section pt-30 pb-30">\r\n      <div class="container">\r\n        <div class="row">\r\n          <div class="col-md-7">\r\n            <h2 class="banner-title mt-0 mb-0">Do You Like Us ? Please Check Our Works</h2>\r\n          </div>\r\n          <div class="col-md-5 text-right"><a href="page-contact.html" class="cws-button white color-4">Contact Us</a><a href="#" class="cws-button white color-4">Check It</a></div>\r\n        </div>\r\n      </div>\r\n    </section>', NULL, NULL),
(48, 'eight_portfolio', 'The Eight Portfolio', '', ' <div class="container page">\r\n      <div class="row cws-multi-col">\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center mb-30">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/4.jpg" data-at2x="pic/portfolio/370x370/4@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/4%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center mb-30">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/6.jpg" data-at2x="pic/portfolio/370x370/6@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/6%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center mb-30">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/5.jpg" data-at2x="pic/portfolio/370x370/5@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/5%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center mb-30">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/3.jpg" data-at2x="pic/portfolio/370x370/3@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/3%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center mb-30">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/7.jpg" data-at2x="pic/portfolio/370x370/7@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/7%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center mb-md-30">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/1.jpg" data-at2x="pic/portfolio/370x370/1@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/1%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center mb-sm-30">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/8.jpg" data-at2x="pic/portfolio/370x370/8@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/8%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n        <div class="col-md-3 col-sm-6">\r\n          <!-- portfolio item-->\r\n          <div class="portfolio-item text-center">\r\n            <!-- media-->\r\n            <div class="pic"><img src="pic/portfolio/370x370/9.jpg" data-at2x="pic/portfolio/370x370/9@2x.jpg" alt>\r\n              <div class="hover-effect alt"></div>\r\n              <div class="links"><a href="pic/portfolio/370x370/9%402x.jpg" class="link-icon alt flaticon-magnifying-glass84 fancy"></a><a href="page-portfolio-single.html" class="link-icon alt flaticon-return13"></a></div>\r\n            </div>\r\n            <!-- ! media-->\r\n          </div>\r\n          <!-- ! portfolio item-->\r\n        </div>\r\n      </div>\r\n      <!-- pagination-->\r\n      <div class="row mt-0">\r\n        <nav class="text-center">\r\n          <ul class="pagination mt-0 mb-0">\r\n            <li><a href="#" aria-label="Previous"><span class="fa fa-angle-left"></span></a></li>\r\n            <li><a href="#">1</a></li>\r\n            <li><a href="#" class="active">2</a></li>\r\n            <li><a href="#">3</a></li>\r\n            <li><a href="#">...</a></li>\r\n            <li><a href="#">23</a></li>\r\n            <li><a href="#" aria-label="Next"><span class="fa fa-angle-right"></span></a></li>\r\n          </ul>\r\n        </nav>\r\n      </div>\r\n      <!-- ! pagination-->\r\n    </div>\r\n    <!-- ! page -->', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_topnav`
--

CREATE TABLE IF NOT EXISTS `site_topnav` (
  `topnav_id` int(10) NOT NULL AUTO_INCREMENT,
  `topnav_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `topnav_link` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '#',
  `topnav_parent_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`topnav_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `site_topnav`
--

INSERT INTO `site_topnav` (`topnav_id`, `topnav_name`, `topnav_link`, `topnav_parent_id`) VALUES
(14, 'First', '/test/', 0),
(16, 'Third', '#', 0),
(17, 'Nested First', '/test-3/', 16),
(18, 'Nested Second', '/test-4/', 16),
(19, 'Second', '#', 0),
(20, 'Nested Third', '/test-2/', 19),
(21, 'Fourth', '/test-4/', 0),
(22, 'Fifth', '#', 0),
(23, 'Nested Fourth', '/test/', 22),
(24, 'Nested Fifth', '/test-2/', 22),
(25, 'Nested Sixth', '/test-3/', 22),
(26, 'Nested Seventh', '/test-4/', 22),
(27, 'Sixth', '/test/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_top_panel`
--

CREATE TABLE IF NOT EXISTS `site_top_panel` (
  `top_panel_id` int(50) NOT NULL,
  `top_panel_name` varchar(255) NOT NULL,
  `top_panel_link` varchar(255) NOT NULL,
  `top_panel_icon` varchar(100) NOT NULL,
  PRIMARY KEY (`top_panel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_top_panel`
--

INSERT INTO `site_top_panel` (`top_panel_id`, `top_panel_name`, `top_panel_link`, `top_panel_icon`) VALUES
(0, 'Facebook', 'http://www.facebook.com/msskasyap3', 'fa-facebook');

-- --------------------------------------------------------

--
-- Table structure for table `site_users`
--

CREATE TABLE IF NOT EXISTS `site_users` (
  `user_id` int(25) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_display_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_access_level` int(2) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_summary` text NOT NULL,
  `user_logged_in` int(2) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_users`
--

INSERT INTO `site_users` (`user_id`, `user_name`, `user_display_name`, `user_email`, `user_access_level`, `user_password`, `user_summary`, `user_logged_in`) VALUES
(1, 'sriramkasyap', 'Sriram Kasyap Meduri', 'sriramkasyap@coveventure.com', 1, 'Guntur@123', 'Sriram Kasyap Meduri', 1);

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
