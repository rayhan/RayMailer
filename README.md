# RayMailer plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require rayhan/RayMailer
```

```
CREATE TABLE `raymailer_layouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `body` text,
  `type` enum('Html','Text') DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_email` varchar(255) DEFAULT NULL,
  `reply_to` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_locked` tinyint(1) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Active',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_rel_slug` (`slug`),
  KEY `idx_rel_name` (`name`),
  KEY `idx_rel_is_locked` (`is_locked`),
  KEY `idx_rel_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


CREATE TABLE `raymailer_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `default` text,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_email` varchar(255) DEFAULT NULL,
  `reply_to` varchar(255) DEFAULT NULL,
  `is_locked` tinyint(1) DEFAULT NULL,
  `raymailer_layout_id` int(11) DEFAULT NULL,
  `transport` varchar(45) DEFAULT NULL,
  `notes` text,
  `status` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

```
