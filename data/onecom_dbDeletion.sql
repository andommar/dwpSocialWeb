

DROP TABLE user_message; 
DROP TABLE user_votes_post; 
DROP TABLE post_tag; 
DROP TABLE tag;  
DROP TABLE user_category;  


-- USER > Delete user FKs manually
-- ** Get table constrains
-- SELECT *  FROM information_schema.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = 'user';

-- ALTER TABLE `user` DROP FOREIGN KEY user_ibfk_1;
-- ALTER TABLE `post` DROP FOREIGN KEY post_ibfk_2;





DROP TABLE `role`; 

-- POST > Delete post FKs manually


DROP TABLE category; 

-- COMMENT > Delete comment FKs manually 


-- MEDIA > > Delete comment FKs manually


DROP TABLE media;
DROP TABLE comment;
DROP TABLE post;
DROP TABLE `user`;