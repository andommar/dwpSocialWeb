<?php 
// require '../bootstrapping.php';

class AdminController{

    public function isUserAdmin($userId){
        $a = new AdminDaoModel;
        $result = $a->isUserAdmin($userId);
        if (!$result){
            new Redirector("../home/login.php");
        } else {
            return true;
        }
    }


    // Dashboard functions
    public function adminPostCategoriesChartData(){
        $a = new AdminDaoModel;
        $result = $a->adminPostCategoriesChartData();
        return $result;
    }
    // User functions
    public function getUsersData() {
        $a = new AdminDaoModel;
        $result = $a->getUsersData();
        return $result;
    }
    public function deleteUser($userId){
        $a = new AdminDaoModel;
        $result = $a->deleteUser($userId);
        return $result;
    }
    public function banUser($userId,$isBanned){
        $a = new AdminDaoModel;
        //Check if user is banned or not and apply new ban status. If they are banned (1) now they'll be unbanned (0)
        $newStatus = $isBanned == 0 ? 1 : 0; 
        $result = $a->banUser($userId,$newStatus);
        return $result;
    }

    //Post functions
    public function getPostsData() {
        $a = new AdminDaoModel;
        $result = $a->getPostsData();
        return $result;
    }
    public function deletePost($postId){
        $a = new AdminDaoModel;
        $result = $a->deletePost($postId);
        return $result;
    }
    // Comments functions
    public function getCommentsData() {
        $a = new AdminDaoModel;
        $result = $a->getCommentsData();
        return $result;
    }
    public function deleteComment($commentId){
        $a = new AdminDaoModel;
        $result = $a->deleteComment($commentId);
        return $result;
    }

}
?>