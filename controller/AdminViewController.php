<?php require_once('../bootstrapping.php');

if (isset($_POST["option"])) {
    $option = $_POST["option"];

    switch ($option) {
        case "admin-dashboard":
            $a = new AdminController();
            $data=$a->adminPostCategoriesChartData();
            echo json_encode($data);
            break;
        case "adminEditUser":
            $a = new AdminController();
            $result = $a->validateForm($_POST);
            echo json_encode($result);
            break;
        case "adminDeactivateUser":
            $a = new AdminController();
            $result = $a->banUser($_POST['userid'], $_POST['banned']);
            echo $result;
            break;
        case "adminDeletePost":
            $a = new AdminController();
            $result = $a->deletePost($_POST['postId']);
            echo json_encode($result);
            break;
    }

}

?>