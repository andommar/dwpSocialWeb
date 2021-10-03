DROP DATABASE IF EXISTS socialdb;
CREATE DATABASE socialdb;
USE socialdb;  /* Good practice */


/*CREATE TABLES*/

CREATE TABLE `ROLE` (
    role_name VARCHAR (100) NOT NULL PRIMARY KEY
)ENGINE = InnoDB;

CREATE TABLE `TAG` (
    tag_name VARCHAR (100) NOT NULL PRIMARY KEY
)ENGINE = InnoDB;

CREATE TABLE `USER` (
	`user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  avatar VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  `rank` VARCHAR (255),
  role_name VARCHAR (100) NOT NULL,
  FOREIGN KEY (role_name) REFERENCES `ROLE` (role_name)
)ENGINE = InnoDB;

CREATE TABLE `CATEGORY` (
  category_name VARCHAR (100) NOT NULL PRIMARY KEY,
  `description` TEXT,
  `rules` VARCHAR (255)
)ENGINE = InnoDB;

CREATE TABLE `USER_CATEGORY` (
  `user_id` INT NOT NULL,
  category_name VARCHAR (100) NOT NULL,
  CONSTRAINT PK_UserCategory PRIMARY KEY (`user_id`,category_name),
  FOREIGN KEY (`user_id`) REFERENCES USER (`user_id`),
  FOREIGN KEY (category_name) REFERENCES CATEGORY (category_name)
)ENGINE = InnoDB;

CREATE TABLE `POST` (
	post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(100) NOT NULL,
  `user_id` INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  up_votes INT,
  down_votes INT,
  `description` TEXT NOT NULL,
  `datetime` DATETIME NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES USER (`user_id`),
  FOREIGN KEY (category_name) REFERENCES CATEGORY (category_name)
)ENGINE = InnoDB;


CREATE TABLE `POST_TAG` (
  post_id INT NOT NULL,
  tag_name VARCHAR (100) NOT NULL,
  CONSTRAINT PK_PostTag PRIMARY KEY (post_id,tag_name),
  FOREIGN KEY (post_id) REFERENCES POST (post_id),
  FOREIGN KEY (tag_name) REFERENCES TAG (tag_name)
)ENGINE = InnoDB;

CREATE TABLE `MEDIA` (
	media_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  comment_id INT,
  post_id INT,
  `url` VARCHAR(255) NOT NULL,
  FOREIGN KEY (post_id) REFERENCES POST (post_id)
)ENGINE = InnoDB;

CREATE TABLE `COMMENT` (
  comment_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  media_id INT,
  post_id INT,
  `description` TEXT NOT NULL,
  up_votes INT,
  down_votes INT,
  FOREIGN KEY (`user_id`) REFERENCES USER (`user_id`),
  FOREIGN KEY (media_id) REFERENCES MEDIA (media_id),
  FOREIGN KEY (post_id) REFERENCES POST (post_id)
)ENGINE = InnoDB;

ALTER TABLE MEDIA ADD FOREIGN KEY (comment_id) REFERENCES `COMMENT` (comment_id);

CREATE TABLE USER_MESSAGE(
  user_msg_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  media_id INT,
  sender_id INT NOT NULL,
  receiver_id INT NOT NULL,
  `description` TEXT NOT NULL,
  `datetime` DATETIME NOT NULL,
  FOREIGN KEY (sender_id) REFERENCES USER (`user_id`),
  FOREIGN KEY (receiver_id) REFERENCES USER (`user_id`),
  FOREIGN KEY (media_id) REFERENCES MEDIA (media_id)
)ENGINE = InnoDB;




INSERT INTO `ROLE` VALUES ('guest');
INSERT INTO `ROLE` VALUES ('registeredUser');
INSERT INTO `ROLE` VALUES ('moderator');
INSERT INTO `ROLE` VALUES ('admin') ;
INSERT INTO `TAG` VALUES ('Cristiano Ronaldo');
INSERT INTO `TAG` VALUES ('Angela Merkel');
INSERT INTO `TAG` VALUES ('White House');
INSERT INTO `TAG` VALUES ('Brexit') ;
INSERT INTO `CATEGORY` VALUES ('News', null, null);
INSERT INTO `CATEGORY` VALUES ('Sports', null, null);
INSERT INTO `CATEGORY` VALUES ('Videos', null, null);
INSERT INTO `CATEGORY` VALUES ('Music', null, null);
INSERT INTO `CATEGORY` VALUES ('Photography', null, null);
INSERT INTO `CATEGORY` VALUES ('Films', null, null);
INSERT INTO `USER` VALUES (null, 'monke', 'moderator', 'monke1', 'monke@gmail.com', 'Beginner', 'registeredUser') ;
-- USER_CATEGORY MISSING
INSERT INTO `POST` VALUES (null, 'News', 1, 'Monke first post', 3546, 98531, 'Monkeys are going to rule the world in the next 30 years', '2021-10-02') ;
INSERT INTO `POST` VALUES (null, 'Sports', 1, 'Monke second post post', 246, 321, 'Where banana', '2021-10-03') ;
INSERT INTO `COMMENT` (comment_id, user_id, media_id, post_id, `description`, up_votes, down_votes) VALUES (null, 1 , NULL, 1, 'Where banana', 200, 7809) ;
-- POST_TAG MISSING
-- MEDIA MISSING
