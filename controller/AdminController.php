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
}
?>