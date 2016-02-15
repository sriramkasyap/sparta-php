-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 11:47 AM
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
(1, 'home', 'home', 'home', 'this is the home page of Sriram Kasyap Meduri\'s Portfolio Website.', 'home');

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
  `postmeta_type` enum('varchar','text','number','range','color','email','password','tel','date','datetime','time','file','url') CHARACTER SET utf8 NOT NULL,
  `postmeta_value` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_postmeta`
--

INSERT INTO `site_postmeta` (`postmeta_id`, `post_id`, `snippet_id`, `postmeta_tag`, `postmeta_pos`, `postmeta_type`, `postmeta_value`) VALUES
(1, 1, 1, 'main_heading', 1, 'varchar', 'Sriram Kasyap Meduri'),
(2, 1, 1, 'main_description', 2, 'text', 'Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!'),
(3, 1, 1, 'button_link', 3, 'url', '#about'),
(4, 1, 1, 'button_text', 4, 'varchar', 'Find More..');

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

--
-- Dumping data for table `site_posts`
--

INSERT INTO `site_posts` (`post_id`, `page_id`, `author_id`, `snippet_id`, `post_url`, `post_heading`, `post_pos`, `post_content`) VALUES
(1, 1, 1, 1, '#page-top', 'Header', 1, '<header>\r\n				    <div class="header-content">\r\n				        <div class="header-content-inner">\r\n				            <h1>Sriram Kasyap Meduri</h1>\r\n				            <hr>\r\n				            <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>\r\n				            <a href="#about" class="btn btn-primary btn-xl page-scroll">Find More..</a>\r\n				        </div>\r\n				    </div>\r\n				</header>'),
(2, 1, 1, 2, '#about', 'About Me', 2, '<section class="bg-primary" id="about">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-8 col-lg-offset-2 text-center">\r\n                    <h2 class="section-heading">We\'ve got what you need!</h2>\r\n                    <hr class="light">\r\n                    <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>\r\n                    <a href="#" class="btn btn-default btn-xl">Get Started!</a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>'),
(3, 1, 1, 3, '#services', 'Services', 3, '<section id="services">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-12 text-center">\r\n                    <h2 class="section-heading">At Your Service</h2>\r\n                    <hr class="primary">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>\r\n                        <h3>Sturdy Templates</h3>\r\n                        <p class="text-muted">Our templates are updated regularly so they don\'t break.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>\r\n                        <h3>Ready to Ship</h3>\r\n                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>\r\n                        <h3>Up to Date</h3>\r\n                        <p class="text-muted">We update dependencies to keep things fresh.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>\r\n                        <h3>Made with Love</h3>\r\n                        <p class="text-muted">You have to make your websites with love these days!</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>'),
(4, 1, 1, 4, '#portfolio', 'Portfolio', 4, '<section class="no-padding" id="portfolio">\r\n        <div class="container-fluid">\r\n            <div class="row no-gutter">\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>'),
(5, 1, 1, 5, '#contact', 'Contact Me', 5, '<section id="contact">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-8 col-lg-offset-2 text-center">\r\n                    <h2 class="section-heading">Let\'s Get In Touch!</h2>\r\n                    <hr class="primary">\r\n                    <p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>\r\n                </div>\r\n                <div class="col-lg-4 col-lg-offset-2 text-center">\r\n                    <i class="fa fa-phone fa-3x wow bounceIn"></i>\r\n                    <p>123-456-6789</p>\r\n                </div>\r\n                <div class="col-lg-4 text-center">\r\n                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>\r\n                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>');

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
  `snippet_display_name` varchar(255) NOT NULL,
  `snippet_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `snippet_content` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_snippets`
--

INSERT INTO `site_snippets` (`snippet_id`, `snippet_name`, `snippet_display_name`, `snippet_type`, `snippet_content`) VALUES
(1, 'start_bootstrap_header', 'Start Bootstrap Header', 'landing post', '<header>\n        <div class="header-content">\n            <div class="header-content-inner">\n                <h1>Your Favorite Source of Free Bootstrap Themes</h1>\n                <hr>\n                <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>\n                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>\n            </div>\n        </div>\n    </header>'),
(2, 'start_bootstrap_about', 'Start Bootstrap About Me', 'about post', '<section class="bg-primary" id="about">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-8 col-lg-offset-2 text-center">\r\n                    <h2 class="section-heading">We\'ve got what you need!</h2>\r\n                    <hr class="light">\r\n                    <p class="text-faded">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>\r\n                    <a href="#" class="btn btn-default btn-xl">Get Started!</a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>'),
(3, 'start_bootstrap_services', 'Start Bootstrap Services', 'text', '<section id="services">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-12 text-center">\r\n                    <h2 class="section-heading">At Your Service</h2>\r\n                    <hr class="primary">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>\r\n                        <h3>Sturdy Templates</h3>\r\n                        <p class="text-muted">Our templates are updated regularly so they don\'t break.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>\r\n                        <h3>Ready to Ship</h3>\r\n                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>\r\n                        <h3>Up to Date</h3>\r\n                        <p class="text-muted">We update dependencies to keep things fresh.</p>\r\n                    </div>\r\n                </div>\r\n                <div class="col-lg-3 col-md-6 text-center">\r\n                    <div class="service-box">\r\n                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>\r\n                        <h3>Made with Love</h3>\r\n                        <p class="text-muted">You have to make your websites with love these days!</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>'),
(4, 'start_bootstrap_portfolio', 'Start Bootstrap Portfolio', 'text and image', '<section class="no-padding" id="portfolio">\r\n        <div class="container-fluid">\r\n            <div class="row no-gutter">\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n                <div class="col-lg-4 col-sm-6">\r\n                    <a href="#" class="portfolio-box">\r\n                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="">\r\n                        <div class="portfolio-box-caption">\r\n                            <div class="portfolio-box-caption-content">\r\n                                <div class="project-category text-faded">\r\n                                    Category\r\n                                </div>\r\n                                <div class="project-name">\r\n                                    Project Name\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>'),
(5, 'start_bootstrap_contact', 'Start Bootstrap Contact', 'contact', '<section id="contact">\r\n        <div class="container">\r\n            <div class="row">\r\n                <div class="col-lg-8 col-lg-offset-2 text-center">\r\n                    <h2 class="section-heading">Let\'s Get In Touch!</h2>\r\n                    <hr class="primary">\r\n                    <p>Ready to start your next project with us? That\'s great! Give us a call or send us an email and we will get back to you as soon as possible!</p>\r\n                </div>\r\n                <div class="col-lg-4 col-lg-offset-2 text-center">\r\n                    <i class="fa fa-phone fa-3x wow bounceIn"></i>\r\n                    <p>123-456-6789</p>\r\n                </div>\r\n                <div class="col-lg-4 text-center">\r\n                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>\r\n                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </section>');

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
  MODIFY `postmeta_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `site_posts`
--
ALTER TABLE `site_posts`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site_scripts`
--
ALTER TABLE `site_scripts`
  MODIFY `script_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  ADD CONSTRAINT `site_postmeta_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `site_posts` (`post_id`),
  ADD CONSTRAINT `site_postmeta_ibfk_2` FOREIGN KEY (`snippet_id`) REFERENCES `site_snippets` (`snippet_id`);

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
