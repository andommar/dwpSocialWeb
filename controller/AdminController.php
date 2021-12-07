<?php 
// require '../../bootstrapping.php';

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

    // Edit user functions 

    //Function gathers the form sent via POST from the edit user in the admin section and validates its inputs
    public function validateForm ($postData) {
        $data = [];
        $text = [];
        $u = new UserModel ($postData['userid']);
        foreach ($postData as $key=>$value) {
            if (!empty($value)){
                $this->validateInput($value);
                // Checks the key name of the array and updates the data
                if ($key == 'username') { 
                    $u-> setUsername($value);
                    $text['username'] = 'Username updated successfully';
                } else if ($key == 'email'){
                    $u-> setUserEmail($value);
                    $text['email'] = 'Email updated successfully';

                } else if ($key == 'password'){
                    $u-> setUserPassword($value);
                    $text['password'] = 'Password updated successfully';

                } else if ($key == 'userrank'){
                    $u-> setUserRank($value);
                    $text['userrank'] = 'User rank updated successfully';

                } else if ($key == 'userpermission'){
                    $u-> setUserRole($value);
                    $text['userpermission'] = 'User permission updated successfully';

                }
            }
        }

        $data['success'] = true;
        $data['text'] = 'User data updated successfully';

        return  $data;
        
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


    // Validations

    private function validateInput ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace(' ', '', $data);
    }

}
?>