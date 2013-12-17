CREATE TABLE `appointments`
(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(32) NOT NULL,
	`name` varchar(32) NOT NULL,
	`phone` varchar(16) NULL,
	`description` text NOT NULL,
	`start_time` datetime NOT NULL,
	`end_time` datetime NOT NULL,
	`created_date` int(10) NOT NULL,
	`status` tinyint(1) NOT NULL,
	PRIMARY KEY (`id`)
);