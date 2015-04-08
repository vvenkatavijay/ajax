CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(45) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
