
--
-- Table structure for table `%%WP_PREFIX%%example_plugin`
--

CREATE TABLE IF NOT EXISTS `%%WP_PREFIX%%example_plugin` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Value` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Example Wordpress Plugin DB table' AUTO_INCREMENT=1 ;