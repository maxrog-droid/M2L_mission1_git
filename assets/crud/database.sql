
use utilisateurs;

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `Username` varchar(100) NOT NULL,
  `Password` varchar (100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);