CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
