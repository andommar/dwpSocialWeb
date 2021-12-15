
DROP TABLE web_insight;
DROP TABLE company_developer;
DROP TABLE company;
DROP TABLE user_message; 
DROP TABLE user_votes_post; 
DROP TABLE post_tag; 
DROP TABLE tag;  
DROP TABLE user_category;  


-- USER > Delete user FKs manually
-- ** Get table constrains
-- SELECT *  FROM information_schema.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = 'user';

ALTER TABLE `user` DROP FOREIGN KEY user_ibfk_1;
ALTER TABLE `post` DROP FOREIGN KEY post_ibfk_2;
ALTER TABLE `comment` DROP FOREIGN KEY comment_ibfk_1;
ALTER TABLE `user_message` DROP FOREIGN KEY user_message_ibfk_3;





DROP TABLE `role`; 

-- POST > Delete post FKs manually
ALTER TABLE `user_category` DROP FOREIGN KEY user_category_ibfk_2;
DROP TABLE category; 

-- COMMENT > Delete comment FKs manually 


-- MEDIA > > Delete comment FKs manually
ALTER TABLE `user_votes_post` DROP FOREIGN KEY user_votes_post_ibfk_1;
ALTER TABLE `post_tag` DROP FOREIGN KEY post_tag_ibfk_1;

DROP TABLE media;
DROP TABLE comment;
DROP TABLE post;

ALTER TABLE `user_category` DROP FOREIGN KEY user_category_ibfk_1;
ALTER TABLE `user_votes_post` DROP FOREIGN KEY user_votes_post_ibfk_2;
ALTER TABLE `user_message` DROP FOREIGN KEY user_message_ibfk_1;
ALTER TABLE `user_message` DROP FOREIGN KEY user_message_ibfk_2;

DROP TABLE `user`;