CREATE TRIGGER update_post_comments
AFTER INSERT 
ON `comment` FOR EACH ROW 
BEGIN
	UPDATE `post` 
	SET total_comments = (total_comments +1)
	WHERE post_id = NEW.post_id;
END




