-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 12 日 01:46
-- 服务器版本: 5.1.66
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `crm`
--

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`id`, `u_id`, `name`, `email`, `phone`) VALUES
(1, 4, 'odin', 'odin@dff.com', '123123123'),
(2, 6, 'axeo', 'odin@df.ddcom', '12309df'),
(3, 4, 'axeo', 'odin@df.com', '123123');

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `c_id`, `name`, `description`) VALUES
(1, 1, 'project1', 'project1'),
(2, 3, 'AXEO Project #1', 'AXEO Project #1');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aid` (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `aid`, `name`) VALUES
(1, 2, 'Manager'),
(2, 7, 'Manager'),
(3, 2, 'Manager2'),
(4, 3, 'nurse');

-- --------------------------------------------------------

--
-- 表的结构 `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create` tinyint(1) NOT NULL,
  `update` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `view` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`),
  KEY `controller` (`controller`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `role_permission`
--

INSERT INTO `role_permission` (`id`, `rid`, `controller`, `create`, `update`, `delete`, `view`) VALUES
(1, 1, 'customer', 1, 1, 1, 1),
(2, 1, 'project', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `a_id`, `username`, `password`, `email`, `active`, `level`, `create_time`, `update_time`) VALUES
(1, 0, 'admin', 'f139ed0d19da5ae22c8f3ec22e1cde4a', 'odin@pwn.so', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 'odin1in', 'f139ed0d19da5ae22c8f3ec22e1cde4a', 'odin@pwn.so', 1, 2, '2012-12-11 19:09:42', '2012-12-11 19:14:38'),
(3, 0, 'axeo', '65479735204726a60ee42124fd851f85', 'info@axeo.com', 1, 2, '2012-12-12 00:32:55', '2012-12-15 01:44:49'),
(4, 2, 'odin1in', 'f139ed0d19da5ae22c8f3ec22e1cde4a', 'odin@pwn.so', 1, 1, '2012-12-14 02:44:29', '2012-12-24 20:48:46'),
(5, 3, 'axeo-user', '65479735204726a60ee42124fd851f85', 'info@axeo.com', 1, 1, '2012-12-15 01:46:19', '0000-00-00 00:00:00'),
(6, 2, 'odin1in1', 'f139ed0d19da5ae22c8f3ec22e1cde4a', 'email@email.ddd', 1, 1, '2012-12-15 02:28:41', '0000-00-00 00:00:00'),
(7, 0, 'odin1in1', 'f139ed0d19da5ae22c8f3ec22e1cde4a', 'odin@0nz.cc', 1, 2, '2012-12-24 19:22:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `user_permission`
--

CREATE TABLE IF NOT EXISTS `user_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `user_permission`
--

INSERT INTO `user_permission` (`id`, `uid`, `controller`, `create`, `update`, `delete`, `view`) VALUES
(21, 4, 'customer', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `rid` (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `user_role`
--

INSERT INTO `user_role` (`id`, `uid`, `rid`) VALUES
(11, 4, 1);

--
-- 限制导出的表
--

--
-- 限制表 `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- 限制表 `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

