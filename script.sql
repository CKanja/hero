CREATE TABLE `hero`(
                       `id` INT(11) NOT NULL auto_increment,
                       `name` TEXT NOT NULL,
                       `real_name` TEXT NOT NULL,
                       `short_bio` VARCHAR(150) DEFAULT NULL,
                       `long_bio` VARCHAR(500) DEFAULT NULL,
                       PRIMARY KEY(`id`),
                       UNIQUE KEY `name_index`(`name`(30)),
                       UNIQUE KEY `real_name_index`(`real_name`(30))
) ENGINE = INNODB DEFAULT CHARSET = utf8mb4