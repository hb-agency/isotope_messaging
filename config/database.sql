-- **********************************************************
-- *                                                        							*
-- * IMPORTANT NOTE                                         				*
-- *                                                        							*
-- * Do not import this file manually but use the TYPOlight 	*
-- * install tool to create and maintain database tables!   		*
-- *                                                        							*
-- **********************************************************

--
-- Table `tl_iso_messaging`
--

CREATE TABLE `tl_iso_messaging` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `config_id` int(10) unsigned NOT NULL default '0',
  `message` text NULL,
  `senderName` varchar(255) NOT NULL default '',
  `sender` varchar(255) NOT NULL default '',
  `cc` varchar(255) NOT NULL default '',
  `bcc` varchar(255) NOT NULL default '',
  `template` varchar(255) NOT NULL default '',
  `attachDocument` char(1) NOT NULL default '',
  `documentTemplate` varchar(255) NOT NULL default '',
  `documentTitle` varchar(255) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  `attachments` blob NULL,
  `archive` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;