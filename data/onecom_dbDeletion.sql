-- Refill database

-- Triggers (not needed)
-- DROP TRIGGER add_post_total_comments;
-- DROP TRIGGER substract_post_total_comments;

-- Tables
DROP TABLE user_message;
DROP TABLE user_votes_post;
DROP TABLE post_tag;
DROP TABLE tag;
DROP TABLE user_category;

-- FKs (USER) > We delete the USER role_name FK to the table ROLE
ALTER TABLE `user`
DROP FOREIGN KEY USER_ibfk_1;
DROP TABLE `role`;

-- FKs (POST) >  We delete all the POST FKs (category_name, user_id)
ALTER TABLE post
DROP FOREIGN KEY POST_ibfk_1;
ALTER TABLE post
DROP FOREIGN KEY POST_ibfk_2;

DROP TABLE category;

-- FKs (COMMENT)
ALTER TABLE `comment`
DROP FOREIGN KEY COMMENT_ibfk_1;
ALTER TABLE `comment`
DROP FOREIGN KEY COMMENT_ibfk_2;
ALTER TABLE `comment`
DROP FOREIGN KEY COMMENT_ibfk_3;

-- FKs (MEDIA)
ALTER TABLE `media`
DROP FOREIGN KEY MEDIA_ibfk_1;

DROP TABLE media;
DROP TABLE comment;
DROP TABLE post;
DROP TABLE `user`;