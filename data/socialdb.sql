DROP DATABASE IF EXISTS socialdb;
CREATE DATABASE socialdb;
USE socialdb; 


/* Tables creation */

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
  media_url VARCHAR(2030),
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
  `user_id` INT,
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


/* Data insertion */

/* Role */
INSERT INTO `ROLE` (role_name) VALUES ('guest');
INSERT INTO `ROLE` (role_name) VALUES ('registeredUser');
INSERT INTO `ROLE` (role_name) VALUES ('moderator');
INSERT INTO `ROLE` (role_name) VALUES ('admin') ;

/* Tag */
INSERT INTO `TAG` (tag_name) VALUES ('Cristiano Ronaldo');
INSERT INTO `TAG` (tag_name) VALUES ('Angela Merkel');
INSERT INTO `TAG` (tag_name) VALUES ('White House');
INSERT INTO `TAG` (tag_name) VALUES ('Brexit') ;

/* Category */
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('News', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Sports', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Videos', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Music', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Photography', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Films', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Animals', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Finance', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Gaming', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Health', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Fitness', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Science', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Art', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Food', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Humor', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Shows', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Tech', null, null);
INSERT INTO `CATEGORY` (category_name, `description`, rules) VALUES ('Books', null, null);

/* User */
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'monke', 'avatar', 'monke1', 'monke@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'doggo', 'doggo', 'dog1', 'doggo@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'beerdoggo', 'beerdoggo', 'beerdoggo', 'beerdoggo@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'dogaldtrump', 'dogaldtrump', 'dogaldtrump', 'dogaldtrump@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'emodoggo', 'emodoggo', 'emodoggo', 'emodoggo@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'sassydoggo', 'sassydoggo', 'sassydoggo', 'sassydoggo@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'sassydoggo', 'sassydoggo', 'sassydoggo', 'sassydoggo@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'farwestdoggo', 'farwestdoggo', 'farwestdoggo', 'farwestdoggo@gmail.com', 'Beginner', 'registeredUser');

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'bdaydoggo', 'bdaydoggo', 'bdaydoggo', 'bdaydoggo@gmail.com', 'Beginner', 'registeredUser');

/* Post */
INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'News', 1, 'Monke first post', 3546, 98531,'monke1', 'Monkeys are going to rule the world in the next 30 years', '2021-10-02');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'Sports', 2, 'I should be working', 246, 321,'capture', 'Howler zoo arboreal primate space monkey exotic new world tree endangered baby banana spider poo.', '2021-10-03');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'Music', 3, "I am a freelancer, but this does not mean I'll work for free", 122, 5,'doggo2', '', '2021-10-06');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'Photography', 4, 'Where banana', 23, 7,'monke2', "I'm baby offal vegan messenger bag gluten-free tote bag. Brooklyn schlitz cronut fixie, pork belly lo-fi gentrify bushwick slow-carb.", '2021-10-08');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'Videos', 5, 'Happy Halloween, from my doggo', 2000, 0,'halloween', '', '2021-10-09');

/* User_Category */
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Sports');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'News');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'News');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Films');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Music');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'News');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Photography');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Sports');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Videos');

/* Comment */
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 1 , NULL, 1, 'Where banana', 200, 7809);


/* Post_tag MISSING
   Media MISSING
   User_message MISSING */
