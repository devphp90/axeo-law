CREATE TABLE `tasks`
(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`office_id` INT(11) NOT NULL,
	`title` varchar(32) NOT NULL,
	`description` text NULL,
	`start_time` datetime NOT NULL,
	`end_time` datetime NOT NULL,
	`all_date` tinyint(1) DEFAULT 0,
	`created_time` int(10) NOT NULL,
	PRIMARY KEY (`id`)
);