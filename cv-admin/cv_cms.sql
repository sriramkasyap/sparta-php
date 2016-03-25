-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2016 at 11:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cv_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sidenav_items`
--

CREATE TABLE IF NOT EXISTS `admin_sidenav_items` (
  `sidenav_id` int(3) NOT NULL,
  `sidenav_name` varchar(50) NOT NULL,
  `sidenav_icon` varchar(50) NOT NULL,
  `sidenav_url` varchar(255) NOT NULL DEFAULT '#',
  `sidenav_has_dropdown` tinyint(1) NOT NULL DEFAULT '0',
  `sidenav_dropdown_items` text NOT NULL,
  `sidenav_pos` int(3) NOT NULL,
  PRIMARY KEY (`sidenav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains Side Navigation panel items';

--
-- Dumping data for table `admin_sidenav_items`
--

INSERT INTO `admin_sidenav_items` (`sidenav_id`, `sidenav_name`, `sidenav_icon`, `sidenav_url`, `sidenav_has_dropdown`, `sidenav_dropdown_items`, `sidenav_pos`) VALUES
(1, 'Dashboard', 'fa-dashboard', 'index.php', 0, '', 1),
(2, 'pages', 'fa-files-o', '#', 1, 'add new page,pages.php?task=add;view all pages,pages.php?task=view', 2),
(3, 'posts', 'fa-list-alt', '#', 1, 'add new post,posts.php?task=add;view all posts,posts.php?task=view', 3),
(4, 'Configuration', 'fa-cogs', 'config.php', 0, '', 4);

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
(2, 'base_url', 'localhost:8080/cv_cms/'),
(3, 'description', 'Cove Venture''s  first basic Content Management System.'),
(4, 'title', 'Cove Venture'),
(5, 'Keywords', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_pages`
--

INSERT INTO `site_pages` (`page_id`, `page_url`, `page_title`, `page_heading`, `page_description`, `page_type`) VALUES
(1, 'home', 'Home', 'Home', 'This is the main Landing Page.', 'home\r\n');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=271 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=236 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_posts`
--

CREATE TABLE IF NOT EXISTS `site_posts` (
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

--
-- Dumping data for table `site_posts_trash`
--

INSERT INTO `site_posts_trash` (`post_id`, `page_id`, `user_id`, `snippet_id`, `post_url`, `post_heading`, `post_pos`, `post_content`, `post_tags`, `post_date`, `post_comments`) VALUES
(1, 1, 1, 1, '#header', 'Landing page', 1, '<header style="background-image: url(''img/../img/aum-wallpaper.jpg'') ">\r\n				    <div class="header-content">\r\n				        <div class="header-content-inner">\r\n				            <h1>Your Favorite Source of Free Bootstrap Themes</h1>\r\n				            <hr>\r\n				            <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>\r\n				            <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>\r\n				        </div>\r\n				    </div>\r\n				</header>', NULL, NULL, NULL),
(2, 1, 1, 1, '#header', 'Landing page', 1, '', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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

CREATE TABLE IF NOT EXISTS `site_snippets` (
  `snippet_id` int(20) NOT NULL AUTO_INCREMENT,
  `snippet_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `snippet_display_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `snippet_tags` text CHARACTER SET utf8 NOT NULL,
  `snippet_content` longtext CHARACTER SET utf8 NOT NULL,
  `snippet_preview_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `snippet_description` text CHARACTER SET utf8,
  PRIMARY KEY (`snippet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `site_snippets`
--

INSERT INTO `site_snippets` (`snippet_id`, `snippet_name`, `snippet_display_name`, `snippet_tags`, `snippet_content`, `snippet_preview_img`, `snippet_description`) VALUES
(1, 'start_bootstrap_header', 'Start Bootstrap Header', 'landing post', '<header>\n        <div class="header-content">\n            <div class="header-content-inner">\n                <h1>Your Favorite Source of Free Bootstrap Themes</h1>\n                <hr>\n                <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>\n                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>\n            </div>\n        </div>\n    </header>', 'img/snippets/start_bootstrap_header.jpg', NULL),
(2, 'start_bootstrap_about', 'Start Bootstrap About Me', 'about post', '<section class="bg-primary" id="about">\n        <div class="container">\n            <div class="row">\n                <div class="col-lg-8 col-lg-offset-2 text-center">\n                    <h2 class="section-heading">We''ve got what you need!</h2>\n                    <hr class="light">\n                    <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>\n                    <a href="#" class="btn btn-default btn-xl">Get Started!</a>\n                </div>\n            </div>\n        </div>\n    </section>', 'img/snippets/start_bootstrap_about.jpg', NULL),
(3, 'start_bootstrap_services', 'Start Bootstrap Services', 'text', '<section id="services">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-12 text-center">\r\n                    <h2 class="section-heading">At Your Service</h2>\r\n                    <hr class="primary">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>\r\n                        <h3>Sturdy Templates</h3>\r\n                        <p class="text-muted">Our templates are updated regularly so they don''t break.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>\r\n                        <h3>Ready to Ship</h3>\r\n                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>\r\n                        <h3>Up to Date</h3>\r\n                        <p class="text-muted">We update dependencies to keep things fresh.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>\r\n                        <h3>Made with Love</h3>\r\n                        <p class="text-muted">You have to make your websites with love these days!</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>', 'img/snippets/start_bootstrap_services.jpg', NULL),
(4, 'start_bootstrap_portfolio', 'Start Bootstrap Portfolio', 'text and image', '<section class="no-padding" id="portfolio">\n        <div class="container-fluid">\n            <div class="row no-gutter">\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n                <div class="col-lg-4 col-sm-6">\n                    <a href="#" class="portfolio-box">\n                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">\n                        <div class="portfolio-box-caption">\n                            <div class="portfolio-box-caption-content">\n                                <div class="project-category text-faded">\n                                    Category\n                                </div>\n                                <div class="project-name">\n                                    Project Name\n                                </div>\n                            </div>\n                        </div>\n                    </a>\n                </div>\n            </div>\n        </div>\n    </section>', 'img/snippets/start_bootstrap_portfolio.jpg', NULL),
(5, 'start_bootstrap_contact', 'Start Bootstrap Contact', 'contact', '<section id="contact">\n        <div class="container">\n            <div class="row">\n                <div class="col-lg-8 col-lg-offset-2 text-center">\n                    <h2 class="section-heading">Let''s Get In Touch!</h2>\n                    <hr class="primary">\n                    <p>Ready to start your next project with us? That''s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>\n                </div>\n                <div class="col-lg-4 col-lg-offset-2 text-center">\n                    <i class="fa fa-phone fa-3x wow bounceIn"></i>\n                    <p>123-456-6789</p>\n                </div>\n                <div class="col-lg-4 text-center">\n                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>\n                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>\n                </div>\n            </div>\n        </div>\n    </section>', 'img/snippets/start_bootstrap_contact.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_topnav`
--

CREATE TABLE IF NOT EXISTS `site_topnav` (
  `topnav_id` int(11) NOT NULL AUTO_INCREMENT,
  `topnav_url` varchar(255) NOT NULL,
  `topnav_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `topnav_pos` int(11) NOT NULL,
  PRIMARY KEY (`topnav_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
