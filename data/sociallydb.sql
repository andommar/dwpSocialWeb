DROP DATABASE IF EXISTS sociallydb;
CREATE DATABASE sociallydb;
USE sociallydb; 


/* Tables creation */

CREATE TABLE `role` (
    role_name VARCHAR (100) NOT NULL PRIMARY KEY
)ENGINE = InnoDB;

CREATE TABLE `tag` (
    tag_name VARCHAR (100) NOT NULL PRIMARY KEY
)ENGINE = InnoDB;

CREATE TABLE `user` (
	`user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  avatar VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  `rank` VARCHAR (255),
  role_name VARCHAR (100) NOT NULL,
  FOREIGN KEY (role_name) REFERENCES `role` (role_name)
)ENGINE = InnoDB;

CREATE TABLE `category` (
  category_name VARCHAR (100) NOT NULL PRIMARY KEY,
  `description` TEXT,
  `rules` VARCHAR (255),
  `icon` VARCHAR (50) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `user_category` (
  `user_id` INT NOT NULL,
  category_name VARCHAR (100) NOT NULL,
  CONSTRAINT PK_UserCategory PRIMARY KEY (`user_id`,category_name),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  FOREIGN KEY (category_name) REFERENCES category (category_name)
)ENGINE = InnoDB;

CREATE TABLE `post` (
	post_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(100) NOT NULL,
  `user_id` INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  up_votes INT DEFAULT 0,
  down_votes INT DEFAULT 0,
  media_url VARCHAR(2030) DEFAULT null,
  `description` TEXT,
  `datetime` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `total_comments` INT NOT NULL DEFAULT 0,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  FOREIGN KEY (category_name) REFERENCES category (category_name)
)ENGINE = InnoDB;

CREATE TABLE `user_votes_post`(
  `user_id` INT NOT NULL,
  post_id INT NOT NULL,
  is_positive BOOLEAN NOT NULL,
  CONSTRAINT PK_UserVotesPost PRIMARY KEY (`user_id`,post_id),
  FOREIGN KEY (post_id) REFERENCES post (post_id),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
)ENGINE = InnoDB;

CREATE TABLE `post_tag` (
  post_id INT NOT NULL,
  tag_name VARCHAR (100) NOT NULL,
  CONSTRAINT PK_PostTag PRIMARY KEY (post_id,tag_name),
  FOREIGN KEY (post_id) REFERENCES post (post_id),
  FOREIGN KEY (tag_name) REFERENCES tag (tag_name)
)ENGINE = InnoDB;

CREATE TABLE `media` (
	media_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  comment_id INT,
  post_id INT,
  `url` VARCHAR(255) NOT NULL,
  FOREIGN KEY (post_id) REFERENCES post (post_id)
)ENGINE = InnoDB;

CREATE TABLE `comment` (
  comment_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT,
  media_url VARCHAR(2030),
  post_id INT,
  `description` TEXT NOT NULL,
  up_votes INT DEFAULT 0,
  down_votes INT DEFAULT 0,
  `datetime` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  -- FOREIGN KEY (media_id) REFERENCES media (media_id),
  FOREIGN KEY (post_id) REFERENCES post (post_id)
)ENGINE = InnoDB;

ALTER TABLE `media` ADD FOREIGN KEY (comment_id) REFERENCES `comment` (comment_id);

CREATE TABLE user_message(
  user_msg_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  media_id INT,
  sender_id INT NOT NULL,
  receiver_id INT NOT NULL,
  `description` TEXT NOT NULL,
  `datetime` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
  FOREIGN KEY (sender_id) REFERENCES `user` (`user_id`),
  FOREIGN KEY (receiver_id) REFERENCES `user` (`user_id`),
  FOREIGN KEY (media_id) REFERENCES media (media_id)
)ENGINE = InnoDB;


/* Data insertion */

/* Role */
INSERT INTO `role` (role_name) VALUES ('guest');
INSERT INTO `role` (role_name) VALUES ('registeredUser');
INSERT INTO `role` (role_name) VALUES ('moderator');
INSERT INTO `role` (role_name) VALUES ('admin') ;

/* Tag */
INSERT INTO `tag` (tag_name) VALUES ('Cristiano Ronaldo');
INSERT INTO `tag` (tag_name) VALUES ('Angela Merkel');
INSERT INTO `tag` (tag_name) VALUES ('White House');
INSERT INTO `tag` (tag_name) VALUES ('Brexit') ;
INSERT INTO `tag` (tag_name) VALUES ('Taylor Swift') ;
INSERT INTO `tag` (tag_name) VALUES ('Kim Kardashian') ;
INSERT INTO `tag` (tag_name) VALUES ('World Cup') ;
INSERT INTO `tag` (tag_name) VALUES ('cats') ;
INSERT INTO `tag` (tag_name) VALUES ('animals') ;
INSERT INTO `tag` (tag_name) VALUES ('dogs') ;
INSERT INTO `tag` (tag_name) VALUES ('memes') ;


/* Category */
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('News', null, null, 'fas fa-newspaper');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Sports', null, null, 'fas fa-running');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Videos', null, null, 'fas fa-video');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Music', null, null, 'fas fa-music');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Photography', null, null, 'fas fa-photo-video');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Films', null, null, 'fas fa-film');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Animals', null, null, 'fas fa-paw');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Finance', null, null, 'fas fa-landmark');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Gaming', null, null, 'fas fa-gamepad');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Health', null, null, 'fas fa-heartbeat');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Fitness', null, null, 'fas fa-dumbbell');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Science', null, null, 'fas fa-flask');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Art', null, null, 'fas fa-palette');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Food', null, null, 'fas fa-hamburger');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Humor', null, null, 'fas fa-grin-squint');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Shows', null, null, 'fab fa-youtube');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Tech', null, null, 'fas fa-mobile-alt');
INSERT INTO `category` (category_name, `description`, rules, `icon`) 
VALUES ('Books', null, null, 'fas fa-book-open');

/* User (13 users) */

INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'monke1', 'avatar_1.png', 'monke1', 'monke1@gmail.com', 'Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'monke2', 'avatar_2.png', 'monke2', 'monke2@gmail.com', 'Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'monke3', 'avatar_3.png', 'monke3', 'monke3@gmail.com', 'Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'osijmons0','avatar_1.png', 'Rqi1deY', 'schippendale0@so-net.ne.jp','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'jjeannesson1', 'avatar_2.png','csu4Ztv', 'radrien1@springer.com','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'cgrubey2', 'avatar_3.png', 'PnutLllv4', 'gmacaree2@icq.com','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'tcaulwell3', 'avatar_4.png', 'eHfGam9BH3Ka', 'anott3@stumbleupon.com','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'tscantlebury4', 'avatar_5.png', 'fdPDyBTe', 'sbroxis4@jiathis.com','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'crigbye5', 'avatar_6.png', 'pd5nhIa99', 'sdalwood5@omniture.com','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'jtruran6', 'avatar_7.png', 'LwA6HH3', 'agourley6@wunderground.com','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'vbullimore7', 'avatar_8.png', '0tgBclGS', 'cwhaymand7@scientificamerican.com','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'tmatkin8', 'avatar_4.png','M2nGgFiAu', 'nellum8@tiny.cc','Beginner', 'registeredUser');
INSERT INTO `user` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'wbeany9', 'avatar_6.png', 'DslPJgeHR', 'korrick9@statcounter.com','Beginner', 'registeredUser');


/* Posts */

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Animals', 7, 'Innovate interactive communities', 251, 21, 'halloween.png', 'Amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus', '2021-10-19 13:06:43', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Animals', 9, 'Innovate sexy architectures', 1758, 46, 'monke1.png', 'Amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', '2021-10-17 11:58:13', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Gaming', 10, 'Drive wireless paradigms', 1208, 46, 'nameagame.jpg', 'Dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac', '2021-10-01 18:25:16', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Art', 4, 'Benchmark seamless users', 2281, 29, 'summertime.jpg', 'Pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra', '2021-10-09 00:21:48', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Films', 5, 'Implement efficient architectures', 2092, 43, null, 'Purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio', '2021-10-11 13:29:15', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'News', 6, 'Maximize cross-platform functionalities', 533, 100, null, 'Duis mattis egestas metus aenean fermentum donec ut mauris eget massa', '2021-10-12 01:16:01', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Films', 5, 'Morph interactive e-commerce', 2567, 2, 'spencermovie.png', 'Posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper', '2021-10-07 02:08:16', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Shows', 12, 'Incentivize viral convergence', 1247, 50, 'thewitcher.png', 'Vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et', '2021-10-31 09:30:38', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Music', 11, 'Deliver granular relationships', 1652, 89, null, 'Faucibus orci luctus et ultrices posuere cubilia curae duis faucibus', '2021-10-30 04:08:43', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Humor', 3, 'Maximize open-source networks', 2173, 85, 'mlordmlady.jpg', 'Mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc', '2021-10-24 18:37:43', 0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Sports', 11, 'Reintermediate proactive applications', 1267, 89, 'miamigame.png', 'Nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis', '2021-10-18 17:56:33', 0);


INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Books', 10, 'Aggregate distributed synergies', 636, 5, 'annefrank.png', 'Vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt', '2021-10-02 16:42:09', 0);


INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Finance', 8, 'Embrace collaborative applications', 2759, 91, 'financestats.png', 'Lobortis ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus', '2021-10-24 05:15:19', 0);


INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'News', 1, 'Monke first post', 3546, 98531,'monke1.png', 'Monkeys are going to rule the world in the next 30 years', '2021-10-02',0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'Sports', 2, 'I should be working', 246, 321,'capture.png', 'Howler zoo arboreal primate space monkey exotic new world tree endangered baby banana spider poo.', '2021-10-03',0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'Music', 3, "I am a freelancer, but this does not mean I'll work for free", 122, 5,'doggo2.jpg', '', '2021-10-06',0);

INSERT INTO `post` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'Photography', 4, 'Where banana', 23, 7,'monke2.jpg', "I'm baby offal vegan messenger bag gluten-free tote bag. Brooklyn schlitz cronut fixie, pork belly lo-fi gentrify bushwick slow-carb.", '2021-10-08',0);

/* User_Category (12 users) */

-- User 1
INSERT INTO `user_category` (`user_id`, category_name) VALUES (1, 'Animals');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (1, 'Books');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (1, 'Gaming');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (1, 'Shows');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (1, 'Humor');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (1, 'Tech');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (1, 'Art');
-- User 2
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Animals');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Art');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Books');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Films');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Finance');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Fitness');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Food');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Gaming');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Health');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Humor');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Music');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'News');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Photography');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Science');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Shows');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Sports');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Tech');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (2, 'Videos');
-- User 3
INSERT INTO `user_category` (`user_id`, category_name) VALUES (3, 'Humor');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (3, 'Science');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (3, 'Fitness');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (3, 'Health');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (3, 'News');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (3, 'Sports');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (3, 'Tech');
-- User 4
INSERT INTO `user_category` (`user_id`, category_name) VALUES (4, 'Books');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (4, 'Health');
-- User 5
INSERT INTO `user_category` (`user_id`, category_name) VALUES (5, 'Fitness');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (5, 'Health');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (5, 'News');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (5, 'Sports');
-- User 6
INSERT INTO `user_category` (`user_id`, category_name) VALUES (6, 'Gaming');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (6, 'Shows');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (6, 'Humor');
-- User 7
INSERT INTO `user_category` (`user_id`, category_name) VALUES (7, 'Art');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (7, 'Animals');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (7, 'Food');

-- User 8

INSERT INTO `user_category` (`user_id`, category_name) VALUES (8, 'Food');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (8, 'Music');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (8, 'Photography');

-- User 9
INSERT INTO `user_category` (`user_id`, category_name) VALUES (9, 'News');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (9, 'Sports');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (9, 'Tech');

-- User 10
INSERT INTO `user_category` (`user_id`, category_name) VALUES (10, 'Gaming');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (10, 'Shows');

-- User 11
INSERT INTO `user_category` (`user_id`, category_name) VALUES (11, 'Finance');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (11, 'Videos');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (11, 'Food');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (11, 'Music');

-- User 12

INSERT INTO `user_category` (`user_id`, category_name) VALUES (12, 'Music');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (12, 'Photography');

-- User 13
INSERT INTO `user_category` (`user_id`, category_name) VALUES (13, 'Art');
INSERT INTO `user_category` (`user_id`, category_name) VALUES (13, 'Animals');

-- By the moment we'll set the same description to all the categories.
UPDATE `category` SET `description` = 'Nullam ut porttitor lorem, sed maximus dolor. Vestibulum eget enim diam. Donec ut luctus leo, vitae pellentesque nibh.';

/* Comment */
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 1 , null, 1, 'Where banana', 200, 7809);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 7 , null, 1, 'So cute!!', 213, 22);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 4 , null, 1, 'The witch dog is in town', 94, 21);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 3 , null, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv, shibe stop it fren extremely cuuuuuute boof. Adorable doggo vvv h*ck wow very biscit h*ck, bork blop stop it fren. Long water shoob blop the neighborhood pupper doing me a frighten floofs doge heck, you are doin me a concern floofs porgo heckin good boys and girls shoob, you are doing me a frighten ruff floofs most angery pupper I have ever seen sub woofer. Woofer tungg fat boi you are doing me a frighten pats fluffer, borkf length boy heckin.', 213, 22);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 5 , null, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv', 37, 54);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 6 , null, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv', 87, 45);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 2 , null, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv', 543, 21);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 2 , null, 2, 'My first comment!', 3, 22);
INSERT INTO `comment` (comment_id, `user_id`, media_url, post_id, `description`, up_votes, down_votes) 
VALUES (null, 2 , null, 6, 'This is the wrong category for this!', 200, 7809);

