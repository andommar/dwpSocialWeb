DELIMITER //
CREATE TRIGGER add_post_total_comments
AFTER INSERT 
ON `comment` FOR EACH ROW 
BEGIN
    UPDATE `post` 
    SET total_comments = (total_comments +1)
    WHERE post_id = new.post_id;
END//
DELIMITER ;

DELIMITER //
CREATE TRIGGER substract_post_total_comments
AFTER DELETE 
ON `comment` FOR EACH ROW 
BEGIN
    UPDATE `post` 
    SET total_comments = (total_comments -1)
    WHERE post_id = old.post_id;
END//
DELIMITER ;



