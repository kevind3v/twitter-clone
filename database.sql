CREATE DATABASE twitter;
USE twitter;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `about` varchar(150) DEFAULT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(140) NOT NULL DEFAULT '',
  `location` varchar(255) DEFAULT NULL,
  `em_code` varchar(100) DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'registered' COMMENT 'registered, confirmed',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
CREATE TABLE `` () ENGINE = InnoDB DEFAULT CHARSET = utf8;
CREATE TABLE `tweets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) unsigned NOT NULL,
  `description` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`author`),
  CONSTRAINT `user_id` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE
  SET
    NULL ON UPDATE NO ACTION
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
CREATE TABLE `follow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `following` int(11) unsigned DEFAULT NULL,
  `followed` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_following` (`following`),
  KEY `user_followed` (`followed`),
  CONSTRAINT `user_following` FOREIGN KEY (`following`) REFERENCES `users` (`id`) ON DELETE
  SET
    NULL ON UPDATE NO ACTION,
    CONSTRAINT `user_followed` FOREIGN KEY (`followed`) REFERENCES `users` (`id`) ON DELETE
  SET
    NULL ON UPDATE NO ACTION
) ENGINE = InnoDB DEFAULT CHARSET = utf8;