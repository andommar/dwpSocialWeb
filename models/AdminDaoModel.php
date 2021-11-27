<?php

class AdminDaoModel extends DbConn {


    function isUserAdmin($userId){
        $sql = 'SELECT role_name from USER where `user_id` = ?';
        $result = $this->selectQueryBind($sql,$userId);
        if ($result[0]['role_name']== "Admin"){
            return true;
        } else {
            return false;
        }
    }

    function deleteUser ($userId){
        $sql = 'DELETE FROM USER where `user_id` = ?';
        $result = $this->executeQueryBind($sql, $userId);
        return $result;
    }

    function banUser ($userId, $newStatus){
        $sql = 'UPDATE USER SET banned = ? where `user_id` = ?';
        $arr = [$newStatus, $userId];
        $result = $this->executeQueryBindArr($sql, $arr);
        return $result;
    }

    function getPostsData(){
        $sql = 'SELECT u.username, p.post_id, p.title,p.up_votes,p.down_votes, p.category_name 
                FROM user u, post p, category c 
                WHERE u.user_id = p.user_id 
                AND p.category_name = c.category_name';
        $result = $this->selectQuery($sql);
        return $result;
    }

    function getUsersData(){
        $sql = 'SELECT `user_id`, username, email, `rank`, role_name, banned from USER';
        $result = $this->selectQuery($sql);
        return $result;
    }

    function getCommentsData(){
        $sql = 'SELECT `user_id`, username, email, `rank`, role_name from USER';
        $result = $this->selectQuery($sql);
        return $result;
    }
}

?>