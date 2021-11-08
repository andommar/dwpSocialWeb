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
  `rules` VARCHAR (255),
  `icon` VARCHAR (50) NOT NULL
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
  `description` TEXT,
  `datetime` DATETIME NOT NULL,
  `total_comments` INT NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES USER (`user_id`),
  FOREIGN KEY (category_name) REFERENCES CATEGORY (category_name)
)ENGINE = InnoDB;

CREATE TABLE `USER_VOTES_POST`(
  `user_id` INT NOT NULL,
  post_id INT NOT NULL,
  is_positive BOOLEAN NOT NULL,
  CONSTRAINT PK_UserVotesPost PRIMARY KEY (`user_id`,post_id),
  FOREIGN KEY (post_id) REFERENCES POST (post_id),
  FOREIGN KEY (`user_id`) REFERENCES USER (`user_id`)
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
  `datetime` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
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
INSERT INTO `TAG` (tag_name) VALUES ('Taylor Swift') ;
INSERT INTO `TAG` (tag_name) VALUES ('Kim Kardashian') ;
INSERT INTO `TAG` (tag_name) VALUES ('World Cup') ;
INSERT INTO `TAG` (tag_name) VALUES ('cats') ;
INSERT INTO `TAG` (tag_name) VALUES ('animals') ;
INSERT INTO `TAG` (tag_name) VALUES ('dogs') ;
INSERT INTO `TAG` (tag_name) VALUES ('memes') ;


/* Category */
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('News', null, null, 'fas fa-newspaper');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Sports', null, null, 'fas fa-running');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Videos', null, null, 'fas fa-video');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Music', null, null, 'fas fa-music');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Photography', null, null, 'fas fa-photo-video');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Films', null, null, 'fas fa-film');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Animals', null, null, 'fas fa-paw');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Finance', null, null, 'fas fa-landmark');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Gaming', null, null, 'fas fa-gamepad');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Health', null, null, 'fas fa-heartbeat');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Fitness', null, null, 'fas fa-dumbbell');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Science', null, null, 'fas fa-flask');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Art', null, null, 'fas fa-palette');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Food', null, null, 'fas fa-hamburger');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Humor', null, null, 'fas fa-grin-squint');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Shows', null, null, 'fab fa-youtube');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Tech', null, null, 'fas fa-mobile-alt');
INSERT INTO `CATEGORY` (category_name, `description`, rules, `icon`) 
VALUES ('Books', null, null, 'fas fa-book-open');

/* User (23 users) */

INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'monke1', 'avatar_1', 'monke1', 'monke1@gmail.com', 'Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'monke2', 'avatar_2', 'monke2', 'monke2@gmail.com', 'Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name)  
VALUES (null, 'monke3', 'avatar_3', 'monke3', 'monke3@gmail.com', 'Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'osijmons0','avatar_1', 'Rqi1deY', 'schippendale0@so-net.ne.jp','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'jjeannesson1', 'avatar_2','csu4Ztv', 'radrien1@springer.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'cgrubey2', 'avatar_3', 'PnutLllv4', 'gmacaree2@icq.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'tcaulwell3', 'avatar_4', 'eHfGam9BH3Ka', 'anott3@stumbleupon.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'tscantlebury4', 'avatar_5', 'fdPDyBTe', 'sbroxis4@jiathis.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'crigbye5', 'avatar_6', 'pd5nhIa99', 'sdalwood5@omniture.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'jtruran6', 'avatar_7', 'LwA6HH3', 'agourley6@wunderground.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'vbullimore7', 'avatar_8', '0tgBclGS', 'cwhaymand7@scientificamerican.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'tmatkin8', 'avatar_4','M2nGgFiAu', 'nellum8@tiny.cc','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'wbeany9', 'avatar_6', 'DslPJgeHR', 'korrick9@statcounter.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'pbotterilla', 'avatar_3', 'CeOMcv2Cnt', 'bbrunelleschia@comcast.net','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'gtreffreyb', 'avatar_5', 'T92E04T9jj', 'hfittallb@clickbank.net','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'jtruettc', 'avatar_6', 'tWZgce', 'rlowyc@privacy.gov.au','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'evinnicombed', 'avatar_2', '95TVou6zyDG', 'ashaudfurthd@flickr.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'epartone', 'avatar_1', 'MmmYWiE4rkbY', 'brearye@yolasite.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'tburdfieldf', 'avatar_8', 'L3Dry8S8jXbb', 'dskeelf@yale.edu','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'smacgregorg', 'avatar_3', 'UNNg2u0iKcGc', 'mmaccarrickg@t-online.de','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'ibehnh', 'avatar_7', '1NrFGxFMP8yD', 'sselwynh@woothemes.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'atoopini', 'avatar_4', 'QA9uL9ADNyub', 'rfiennesi@bloglines.com','Beginner', 'registeredUser');
INSERT INTO `USER` (`user_id`, username, avatar, `password`, email, `rank`, role_name) 
values (null, 'arougheyj', 'avatar_2', 'kHDGlJMK9P', 'sthorouggoodj@unicef.org','Beginner', 'registeredUser');


/* Post , 40 Posts */



INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Animals', 19, 'Innovate interactive communities', 251, 21, 'halloween', 'Amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus', '2021-10-19 13:06:43', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Animals', 9, 'Innovate sexy architectures', 1758, 46, 'monke1', 'Amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', '2021-10-17 11:58:13', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Gaming', 20, 'Drive wireless paradigms', 1208, 46, 'nameagame', 'Dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac', '2021-10-01 18:25:16', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Art', 14, 'Benchmark seamless users', 2281, 29, 'summertime', 'Pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra', '2021-10-09 00:21:48', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Films', 15, 'Implement efficient architectures', 2092, 43, null, 'Purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio', '2021-10-11 13:29:15', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'News', 16, 'Maximize cross-platform functionalities', 533, 100, null, 'Duis mattis egestas metus aenean fermentum donec ut mauris eget massa', '2021-10-12 01:16:01', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Films', 5, 'Morph interactive e-commerce', 2567, 2, 'spencermovie', 'Posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper', '2021-10-07 02:08:16', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Shows', 22, 'Incentivize viral convergence', 1247, 50, 'thewitcher', 'Vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et', '2021-10-31 09:30:38', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Music', 18, 'Deliver granular relationships', 1652, 89, null, 'Faucibus orci luctus et ultrices posuere cubilia curae duis faucibus', '2021-10-30 04:08:43', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Humor', 3, 'Maximize open-source networks', 2173, 85, 'mlordmlady', 'Mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc', '2021-10-24 18:37:43', 0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Sports', 23, 'Reintermediate proactive applications', 1267, 89, 'miamigame', 'Nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis', '2021-10-18 17:56:33', 0);


INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Books', 10, 'Aggregate distributed synergies', 636, 5, 'annefrank', 'Vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt', '2021-10-02 16:42:09', 0);


INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
values (null, 'Finance', 8, 'Embrace collaborative applications', 2759, 91, 'financestats', 'Lobortis ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus', '2021-10-24 05:15:19', 0);


-- fin posts personalizados
INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'News', 1, 'Monke first post', 3546, 98531,'monke1', 'Monkeys are going to rule the world in the next 30 years', '2021-10-02',0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'Sports', 2, 'I should be working', 246, 321,'capture', 'Howler zoo arboreal primate space monkey exotic new world tree endangered baby banana spider poo.', '2021-10-03',0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'Music', 3, "I am a freelancer, but this does not mean I'll work for free", 122, 5,'doggo2', '', '2021-10-06',0);

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`,`total_comments`)
VALUES (null, 'Photography', 4, 'Where banana', 23, 7,'monke2', "I'm baby offal vegan messenger bag gluten-free tote bag. Brooklyn schlitz cronut fixie, pork belly lo-fi gentrify bushwick slow-carb.", '2021-10-08',0);

/* User_Category (23 users) */

-- User 1
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Animals');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Books');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Gaming');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Shows');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Humor');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Tech');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (1, 'Art');
-- User 2
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'Animals');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'Films');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'Finance');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'Videos');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'Food');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'Music');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (2, 'Photography');
-- User 3
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Humor');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Science');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Fitness');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Health');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'News');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Sports');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (3, 'Tech');
-- User 4
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (4, 'Books');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (4, 'Health');
-- User 5
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (5, 'Fitness');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (5, 'Health');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (5, 'News');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (5, 'Sports');
-- User 6
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (6, 'Gaming');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (6, 'Shows');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (6, 'Humor');
-- User 7
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (7, 'Art');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (7, 'Animals');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (7, 'Food');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (7, 'Music');
INSERT INTO `USER_CATEGORY` (`user_id`, category_name) VALUES (7, 'Photography');


/* Comment */
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 1 , NULL, 1, 'Where banana', 200, 7809);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 7 , NULL, 1, 'So cute!!', 213, 22);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 4 , NULL, 1, 'The witch dog is in town', 94, 21);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 3 , NULL, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv, shibe stop it fren extremely cuuuuuute boof. Adorable doggo vvv h*ck wow very biscit h*ck, bork blop stop it fren. Long water shoob blop the neighborhood pupper doing me a frighten floofs doge heck, you are doin me a concern floofs porgo heckin good boys and girls shoob, you are doing me a frighten ruff floofs most angery pupper I have ever seen sub woofer. Woofer tungg fat boi you are doing me a frighten pats fluffer, borkf length boy heckin.', 213, 22);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 5 , NULL, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv', 37, 54);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 6 , NULL, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv', 87, 45);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 2 , NULL, 1, 'Doggo ipsum long bois tungg woofer boof he made many woofs, floofs extremely cuuuuuute wow very biscit. What a nice floof shibe super chub ruff, what a nice floof. Bork the neighborhood pupper big ol mlem, big ol. Very jealous pupper wow such tempt big ol sub woofer heckin good boys and girls wow such tempt, pupper super chub snoot long bois vvv', 543, 21);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 2 , NULL, 2, 'My first comment!', 3, 22);
INSERT INTO `COMMENT` (comment_id, `user_id`, media_id, post_id, `description`, up_votes, down_votes) 
VALUES (null, 2 , NULL, 6, 'This is the wrong category for this!', 200, 7809);

-- By the moment we'll set the same description to all the categories.
UPDATE `CATEGORY` SET `description` = 'Nullam ut porttitor lorem, sed maximus dolor. Vestibulum eget enim diam. Donec ut luctus leo, vitae pellentesque nibh.' 

/* Post_tag MISSING
   Media MISSING
   User_message MISSING */
