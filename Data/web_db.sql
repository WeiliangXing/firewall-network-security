/*
 Navicat MySQL Data Transfer

 Source Server         : MySQL
 Source Server Version : 50622
 Source Host           : localhost
 Source Database       : web_db

 Target Server Version : 50622
 File Encoding         : utf-8

 Date: 04/25/2015 16:48:42 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `blogs`
-- ----------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `view_counts` int(11) NOT NULL,
  `content` text,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `blogs`
-- ----------------------------
BEGIN;
INSERT INTO `blogs` VALUES ('10', '1', 'What is Blog', '6', 'From Wikipedia, the free encyclopedia\r\n\r\nA blog is a discussion or informational site published on the World Wide Web and consisting of discrete entries (\"posts\") typically displayed in reverse chronological order (the most recent post appears first). Until 2009 blogs were usually the work of a single individual[citation needed], occasionally of a small group, and often covered a single subject. More recently \"multi-author blogs\" (MABs) have developed, with posts written by large numbers of authors and professionally edited. MABs from newspapers, other media outlets, universities, think tanks, advocacy groups and similar institutions account for an increasing quantity of blog traffic. The rise of Twitter and other \"microblogging\" systems helps integrate MABs and single-author blogs into societal newstreams. Blog can also be used as a verb, meaning to maintain or add content to a blog.', '2015-04-25 16:17:23', '2015-04-25 16:41:30'), ('11', '1', 'Welcome to our Blog!', '11', 'Welcome to our blog!', '2015-04-25 16:19:11', '2015-04-25 16:46:37'), ('12', '22', 'Get a driver license', '1', 'If you are age 16 or over, you can apply for a NYS driver license. The first step is to apply for a learner permit at a DMV office.  Save time by completing and printing the Application for Permit, Driver License or Non-Driver ID Card (MV-44) before you go to the DMV and be sure to bring acceptable proof of your identity and age. \r\n\r\nOnce you have a learner permit, you must have supervised driving practice and take a pre-licensing course or a driver education course before you take your road test. \r\n\r\nTo get started, you should read\r\n\r\n1. Get a learner permit\r\n2. Prepare for your road test\r\n3. Schedule & take a road test\r\n\r\nNote: If you are under age 18 or the parent of a driver under age 18, it is very important that you understand the Graduated Driver License (GDL) Law and the restrictions on drivers under age 18.', '2015-04-25 16:21:52', '2015-04-25 16:21:52'), ('13', '22', 'What is the probationary period for new drivers?', '3', 'From NY DMV.\r\n\r\nOnce you pass a road test for a new driver license or to restore a revoked driver license, you must serve a 6 month probationary period.  This period begins on the date you pass the road test.\r\n\r\nDuring your probationary period, your driver license will be suspended for 60 days if you are convicted of any the following\r\n\r\nspeeding\r\nparticipating in a speed contest\r\nreckless driving\r\nfollowing too closely\r\nuse of  a mobile telephone\r\nuse of a portable electronic device (for example a smart phone, tablet, GPS or MP3 player)\r\nany 2 other moving violations\r\nAfter the suspension ends, you must serve a second 6 month probation period.\r\n\r\nIf you are convicted of one of the listed violations (or 2 other moving violations) committed during the second probation period, your driver license will be revoked for at least 6 months.\r\n\r\nWhen the revocation ends, you must serve another a 6 month probationary period.', '2015-04-25 16:22:27', '2015-04-25 16:31:40'), ('14', '23', 'This is my first article', '3', 'This is my first article!', '2015-04-25 16:26:31', '2015-04-25 16:32:02'), ('15', '23', 'Wikipedia:About', '1', 'Wikipedia is written collaboratively by largely anonymous volunteers who write without pay. Anyone with Internet access can write and make changes to Wikipedia articles, except in limited cases where editing is restricted to prevent disruption or vandalism. Users can contribute anonymously, under a pseudonym, or, if they choose to, with their real identity.\r\n\r\nThe fundamental principles by which Wikipedia operates are the five pillars. The Wikipedia community has developed many policies and guidelines to improve the encyclopedia; however, it is not a formal requirement to be familiar with them before contributing.', '2015-04-25 16:27:19', '2015-04-25 16:27:19'), ('16', '24', 'Computer security', '1', 'From Wikipedia, the free encyclopedia\r\n\r\nComputer security, also known as cybersecurity or IT security, is security applied to computing devices such as computers and smartphones, as well as computer networks such as private and public networks, including the whole Internet. The field includes all the processes and mechanisms by which digital equipment, information and services are protected from unintended or unauthorized access, change or destruction, and is of growing importance due to the increasing reliance of computer systems in most societies.[1] It includes physical security to prevent theft of equipment and information security to protect the data on that equipment. Those terms generally do not refer to physical security, but a common belief among computer security experts is that a physical security breach is one of the worst kinds of security breaches as it generally allows full access to both data and equipment.', '2015-04-25 16:28:40', '2015-04-25 16:28:40'), ('17', '24', 'Eavesdropping', '5', 'Eavesdropping is the act of surreptitiously listening to a private conversation, typically between hosts on a network. For instance, programs such as Carnivore and NarusInsight have been used by the FBI and NSA to eavesdrop on the systems of internet service providers. Even machines that operate as a closed system (i.e., with no contact to the outside world) can be eavesdropped upon via monitoring the faint electro-magnetic transmissions generated by the hardware; TEMPEST is a specification by the NSA referring to these attacks.', '2015-04-25 16:29:32', '2015-04-25 16:30:11');
COMMIT;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `comments`
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES ('6', '17', '1', 'Great!', '2015-04-25 16:29:59', '2015-04-25 16:29:59'), ('7', '10', '1', 'Welcome everyone!! This is the first blog!', '2015-04-25 16:30:38', '2015-04-25 16:30:38'), ('8', '13', '1', 'Thanks!! Very useful!', '2015-04-25 16:31:40', '2015-04-25 16:31:40'), ('9', '14', '1', 'Welcome!', '2015-04-25 16:32:02', '2015-04-25 16:32:02'), ('10', '10', '22', 'Great!', '2015-04-25 16:32:56', '2015-04-25 16:32:56'), ('11', '11', '22', 'Yeah', '2015-04-25 16:41:56', '2015-04-25 16:41:56'), ('13', '11', '22', 'How are you?', '2015-04-25 16:42:08', '2015-04-25 16:42:08');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `major` varchar(40) NOT NULL,
  `annual_salary` int(6) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remark` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'weiliang', '123', '1', 'computer science', '1', '0000-00-00 00:00:00', '2015-04-25 16:48:05', 'He is the first user.'), ('22', 'Jianglin', '123', '1', 'computer science', '1', '2015-04-25 16:20:23', '2015-04-25 16:25:39', 'This is our driver.'), ('23', 'Song', '123', '1', 'computer science', '1', '2015-04-25 16:23:00', '2015-04-25 16:23:00', 'This is another user.'), ('24', 'Hongjin', '123', '0', 'computer science', '100', '2015-04-25 16:27:42', '2015-04-25 16:27:42', 'Hahahahahhahahah');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
