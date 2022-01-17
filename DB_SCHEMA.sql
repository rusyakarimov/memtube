CREATE TABLE IF NOT EXISTS `users` (
`user_id` INT(11) NOT NULL AUTO_INCREMENT ,
`username` VARCHAR(45) ,
`password` VARCHAR(100) ,
`email` VARCHAR(45) ,
`profile_pic` VARCHAR(150),
`user_status` INT(1),
PRIMARY KEY (`user_id`)
) DEFAULT CHARSET="utf8";


CREATE TABLE IF NOT EXISTS `category` (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(100),
`desc` VARCHAR(300),
PRIMARY KEY (`id`)
) DEFAULT CHARSET="utf8";

CREATE TABLE IF NOT EXISTS `files`(
 `id` int(11) NOT NULL AUTO_INCREMENT ,
 `id_cat` int(11),
 `file` TEXT,
 `name` VARCHAR(200),
 `desc` TEXT,
 `time` text,
 `date` text,
 `user` VARCHAR(100),
 PRIMARY KEY(`id`)
) DEFAULT CHARSET=utf8;
