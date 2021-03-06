-- ---
-- Globals
-- ---

DROP TABLE IF EXISTS `admin`;
		
CREATE TABLE `admin` (
  `admin_id` INTEGER NOT NULL AUTO_INCREMENT,
  `admin_name` VARCHAR(50) NULL DEFAULT NULL,
  `admin_mail` VARCHAR(50) NULL DEFAULT NULL,
  `admin_password` VARCHAR(60) NULL DEFAULT NULL,
  `admin_role` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
);

-- ---
-- Table 'role'
-- ---

DROP TABLE IF EXISTS `role`;
		
CREATE TABLE `role` (
  `role_id` INTEGER NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
);

-- ---
-- Table 'picture'
-- ---

DROP TABLE IF EXISTS `picture`;
		
CREATE TABLE `picture` (
  `picture_id` INTEGER NOT NULL AUTO_INCREMENT,
  `picture_name` VARCHAR(50) NULL DEFAULT NULL,
  `picture_description` VARCHAR(500) NULL DEFAULT NULL,
  `picture_link` VARCHAR(25) NULL DEFAULT NULL,
  `picture_tag` INTEGER NULL DEFAULT NULL,
  `picture_sharable` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
);

-- ---
-- Table 'tag'
-- ---

DROP TABLE IF EXISTS `tag`;
		
CREATE TABLE `tag` (
  `tag_id` INTEGER NOT NULL AUTO_INCREMENT,
  `tag_name` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
);

-- ---
-- Table 'pt'
-- ---

DROP TABLE IF EXISTS `pt`;
		
CREATE TABLE `pt` (
  `pt_id` INTEGER NOT NULL AUTO_INCREMENT,
  `pt_picture` INTEGER NULL DEFAULT NULL,
  `pt_tag` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`pt_id`)
);

-- ---
-- Table 'basicinfo'
-- ---

DROP TABLE IF EXISTS `basicinfo`;
		
CREATE TABLE `basicinfo` (
  `bi_id` INTEGER NOT NULL AUTO_INCREMENT,
  `bi_name` VARCHAR(25) NULL DEFAULT NULL,
  `bi_content` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`bi_id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `admin` ADD FOREIGN KEY (admin_role) REFERENCES `role` (`role_id`);
ALTER TABLE `picture` ADD FOREIGN KEY (picture_tag) REFERENCES `tag` (`tag_id`);
ALTER TABLE `pt` ADD FOREIGN KEY (pt_picture) REFERENCES `picture` (`picture_id`);
ALTER TABLE `pt` ADD FOREIGN KEY (pt_tag) REFERENCES `tag` (`tag_id`);