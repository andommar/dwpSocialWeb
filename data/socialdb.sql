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



INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Animals', 19, 'Innovate interactive communities', 251, 21, 'halloween', 'Amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus', '2021-10-19 13:06:43');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Animals', 9, 'Innovate sexy architectures', 1758, 46, 'monke1', 'Amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', '2021-10-17 11:58:13');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Gaming', 20, 'Drive wireless paradigms', 1208, 46, 'nameagame', 'Dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac', '2021-10-01 18:25:16');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Art', 14, 'Benchmark seamless users', 2281, 29, 'summertime', 'Pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra', '2021-10-09 00:21:48');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Films', 15, 'Implement efficient architectures', 2092, 43, null, 'Purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio', '2021-10-11 13:29:15');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'News', 16, 'Maximize cross-platform functionalities', 533, 100, null, 'Duis mattis egestas metus aenean fermentum donec ut mauris eget massa', '2021-10-12 01:16:01');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Films', 5, 'Morph interactive e-commerce', 2567, 2, 'spencermovie', 'Posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper', '2021-10-07 02:08:16');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Shows', 22, 'Incentivize viral convergence', 1247, 50, 'thewitcher', 'Vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et', '2021-10-31 09:30:38');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Music', 18, 'Deliver granular relationships', 1652, 89, null, 'Faucibus orci luctus et ultrices posuere cubilia curae duis faucibus', '2021-10-30 04:08:43');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Humor', 3, 'Maximize open-source networks', 2173, 85, 'mlordmlady', 'Mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc', '2021-10-24 18:37:43');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Sports', 23, 'Reintermediate proactive applications', 1267, 89, 'miamigame', 'Nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis', '2021-10-18 17:56:33');


INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Books', 10, 'Aggregate distributed synergies', 636, 5, 'annefrank', 'Vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt', '2021-10-02 16:42:09');


INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
values (null, 'Finance', 8, 'Embrace collaborative applications', 2759, 91, 'financestats', 'Lobortis ligula sit amet eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus', '2021-10-24 05:15:19');

-- fill with images
-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Fitness', 10, 'Harness world-class metrics', 399, 84, null, 'Eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget', '2021-10-08 16:08:05');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Food', 2, 'Transform leading-edge interfaces', 215, 26, null, 'Bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at velit eu est congue elementum', '2021-10-13 12:28:10');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Health', 23, 'Transform scalable e-markets', 1616, 32, null, 'Nec molestie sed justo pellentesque viverra pede ac diam cras', '2021-10-27 09:24:52');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Photography', 12, 'Strategize e-business relationships', 2535, 47, null, 'Ipsum aliquam non mauris morbi non lectus aliquam sit amet diam', '2021-10-09 00:04:01');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Science', 13, 'Transition seamless networks', 2495, 8, null, 'Lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel', '2021-10-04 03:53:15');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Tech', 6, 'Synthesize 24/7 infrastructures', 2842, 80, null, 'Suscipit nulla elit ac nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at', '2021-10-20 02:58:41');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Videos', 2, 'Repurpose holistic e-business', 1412, 39, null, 'Neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', '2021-10-01 21:24:06');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Sports', 5, 'Brand world-class channels', 131, 51, null, 'Ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac', '2021-10-10 12:13:35');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Art', 19, 'Transform magnetic e-services', 1779, 82, null, 'Eleifend quam a odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac', '2021-10-20 03:54:53');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Books', 12, 'Synergize efficient schemas', 2092, 16, null, 'Iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi', '2021-10-23 01:00:38');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Gaming', 4, 'Reintermediate one-to-one partnerships', 913, 9, null, 'Vel pede morbi porttitor lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis', '2021-10-13 01:38:38');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Science', 13, 'Benchmark viral deliverables', 990, 76, null, 'Praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim', '2021-10-26 02:47:49');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Humor', 12, 'Redefine turn-key deliverables', 2632, 25, 'meme1', 'Ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel', '2021-10-05 12:18:08');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Photography', 14, 'Generate robust experiences', 84, 56, null, 'In faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi integer', '2021-10-29 10:55:37');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Videos', 6, 'Whiteboard visionary experiences', 1091, 65, null, 'Aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam', '2021-10-26 12:07:23');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Music', 6, 'Drive world-class initiatives', 2366, 25, null, 'Augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit', '2021-10-27 05:12:35');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Films', 14, 'Matrix world-class networks', 883, 73, null, 'Odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu', '2021-10-21 20:13:32');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Finance', 2, 'Synergize innovative e-tailers', 2454, 9, null, 'Fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus', '2021-10-06 06:08:48');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Music', 3, 'Iterate next-generation web-readiness', 1112, 98, null, 'Vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel', '2021-10-05 14:00:55');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Fitness', 2, 'Disintermediate revolutionary communities', 346, 88, null, 'Aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus', '2021-10-14 07:01:19');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Food', 22, 'Engineer frictionless e-markets', 1492, 13, null, 'Vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id', '2021-10-31 06:08:39');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Health', 12, 'Orchestrate granular infomediaries', 2813, 52, null, 'Ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices', '2021-10-19 17:53:17');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'News', 4, 'Aggregate wireless applications', 2912, 37, null, 'Consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero', '2021-10-29 04:35:33');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Shows', 16, 'Cultivate end-to-end networks', 804, 61, null, 'Ante vivamus tortor duis mattis egestas metus aenean fermentum donec', '2021-10-05 08:35:04');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Tech', 14, 'Incentivize cutting-edge platforms', 868, 72, null, 'Vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit', '2021-10-12 21:56:31');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Animals', 16, 'Deploy cutting-edge e-tailers', 637, 72, 'animals1', 'Mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa', '2021-11-01 09:15:03');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Animals', 6, 'Enable visionary technologies', 378, 2, 'animals2', null, '2021-11-01 09:15:03');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Art', 6, 'Whiteboard collaborative interfaces', 486, 52, null, 'Augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia', '2021-10-20 07:31:56');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Humor', 1, 'Unleash clicks-and-mortar infomediaries', 632, 1, 'meme1', 'Sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper', '2021-10-07 12:18:08');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Humor', 1, 'Seize efficient web services', 1223, 12, 'meme2', null, '2021-11-01 12:18:08');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Humor', 20, 'Recontextualize viral e-services', 734, 112, 'meme3', 'Nullam molestie nibh in lectus pellentesque', '2021-10-03 09:18:01');

-- INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
-- values (null, 'Humor', 15, 'Deliver efficient bandwidth', 1678, 13, 'meme4', null, '2021-11-02 11:20:08');




-- fin posts personalizados
INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'News', 1, 'Monke first post', 3546, 98531,'monke1', 'Monkeys are going to rule the world in the next 30 years', '2021-10-02');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'Sports', 2, 'I should be working', 246, 321,'capture', 'Howler zoo arboreal primate space monkey exotic new world tree endangered baby banana spider poo.', '2021-10-03');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'Music', 3, "I am a freelancer, but this does not mean I'll work for free", 122, 5,'doggo2', '', '2021-10-06');

INSERT INTO `POST` (post_id, category_name, `user_id`, title, up_votes, down_votes, media_url, `description`, `datetime`)
VALUES (null, 'Photography', 4, 'Where banana', 23, 7,'monke2', "I'm baby offal vegan messenger bag gluten-free tote bag. Brooklyn schlitz cronut fixie, pork belly lo-fi gentrify bushwick slow-carb.", '2021-10-08');

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

-- By the moment we'll set the same description to all the categories.
UPDATE `CATEGORY` SET `description` = 'Nullam ut porttitor lorem, sed maximus dolor. Vestibulum eget enim diam. Donec ut luctus leo, vitae pellentesque nibh. Vivamus eleifend eros sit amet velit tempus, et bibendum elit pharetra. Proin at rhoncus lectus. Pellentesque semper dui quis tortor ornare, nec dapibus leo gravida. Vestibulum pharetra ultrices nisi, nec scelerisque odio aliquam in.' 

/* Post_tag MISSING
   Media MISSING
   User_message MISSING */
