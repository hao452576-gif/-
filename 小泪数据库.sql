-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.PHPMyAdmin.net
--
-- 主机： localhost
-- 生成日期： 2025-02-01 23:17:23
-- 服务器版本： 5.6.50
-- PHP 版本： 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 数据库： `www.gov.cn`
--

-- --------------------------------------------------------

--
-- 表的结构 `h_kefu`
--

CREATE TABLE `h_kefu` (
  `id` int(11) NOT NULL,
  `h_user` varchar(30) NOT NULL COMMENT '会员',
  `h_who` int(1) NOT NULL COMMENT '谁的信息1-会员2-客服',
  `h_content` text NOT NULL COMMENT '内容',
  `h_isread` int(1) NOT NULL DEFAULT '0' COMMENT '是否已读',
  `h_actIP` varchar(30) DEFAULT NULL,
  `h_addTime` datetime NOT NULL COMMENT '信息时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `h_kefu_config`
--

CREATE TABLE `h_kefu_config` (
  `id` int(11) NOT NULL,
  `h_sound` int(1) NOT NULL DEFAULT '1' COMMENT '是否关闭会员列表声音',
  `h_robot` int(1) NOT NULL DEFAULT '0' COMMENT '是否关闭机器人',
  `h_admin` varchar(50) DEFAULT NULL,
  `h_pass` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `h_kefu_config`
--

INSERT INTO `h_kefu_config` (`id`, `h_sound`, `h_robot`, `h_admin`, `h_pass`) VALUES
(1, 1, 0, 'e4eceb9a0c2b9b52c0b618819821b', 'e4eceb9a0c2b9b52c0b618819821b');

-- --------------------------------------------------------

--
-- 表的结构 `h_kefu_login`
--

CREATE TABLE `h_kefu_login` (
  `id` int(11) NOT NULL,
  `h_user` varchar(30) DEFAULT NULL,
  `h_ip` char(39) DEFAULT NULL,
  `h_addTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `h_kefu_status`
--

CREATE TABLE `h_kefu_status` (
  `id` int(11) NOT NULL,
  `h_user` varchar(30) NOT NULL COMMENT '会员',
  `h_status` int(1) NOT NULL COMMENT '状态',
  `h_logins` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `h_actIP` varchar(30) DEFAULT NULL,
  `h_address` varchar(30) NOT NULL COMMENT '地址',
  `h_online` varchar(20) NOT NULL COMMENT '设备',
  `h_addTime` datetime NOT NULL COMMENT '信息时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `h_kefu`
--
ALTER TABLE `h_kefu`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `h_kefu_config`
--
ALTER TABLE `h_kefu_config`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `h_kefu_login`
--
ALTER TABLE `h_kefu_login`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `h_kefu_status`
--
ALTER TABLE `h_kefu_status`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `h_kefu`
--
ALTER TABLE `h_kefu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1174;

--
-- 使用表AUTO_INCREMENT `h_kefu_config`
--
ALTER TABLE `h_kefu_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `h_kefu_login`
--
ALTER TABLE `h_kefu_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 使用表AUTO_INCREMENT `h_kefu_status`
--
ALTER TABLE `h_kefu_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;
COMMIT;
