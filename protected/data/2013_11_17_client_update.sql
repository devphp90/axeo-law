ALTER TABLE `clients`
CHANGE `facebookaddress` `facebook` varchar(150) NOT NULL,
CHANGE `phone1` `phone` varchar(20) NOT NULL,
ADD `office_id` int(11) NOT NULL after `id`;
