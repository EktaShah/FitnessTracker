CREATE TABLE `FTExerciseLog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upadated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Exercise` varchar(255) NOT NULL,
  `ActivityType` varchar(50) NOT NULL,
  `Distance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `AveragePace` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Calories` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Time` datetime NOT NULL,
  `UserId` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `FTFoodLog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Name` varchar(255) NOT NULL,
  `Calories` decimal(10,0) NOT NULL DEFAULT '0',
  `Fat` decimal(10,0) NOT NULL DEFAULT '0',
  `Carbs` decimal(10,0) NOT NULL DEFAULT '0',
  `Protein` decimal(10,0) NOT NULL DEFAULT '0',
  `Time` datetime NOT NULL,
  `UserId` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_FTFoodLog1_idx` (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
