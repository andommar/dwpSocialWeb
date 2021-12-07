<?php require_once('../bootstrapping.php');

if (isset($_POST["option"])) {
    $option = $_POST["option"];

    switch ($option) {
        case "adminDashboard":
            $a = new AdminController();
            $data=$a->adminPostCategoriesChartData();
            echo json_encode($data);
            break;
        case "adminEditUser":
            $a = new AdminController();
            $result = $a->validateForm($_POST);
            echo json_encode($result);
            break;
    }

}

?>