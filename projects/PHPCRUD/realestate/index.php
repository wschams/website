<?php
$action = "home";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch($action) {
    case 'home':
        include 'controllers/homeController.php';
        exit;
    case 'table':
        include 'controllers/housesTableController.php';
        exit;
    case 'details':
        include 'controllers/houseDetailsController.php';
        exit;
    case 'add':
        include 'controllers/addHouseController.php';
        exit;
    case 'delete':
        include 'controllers/deleteHouseController.php';
        exit;
    case 'update':
        include 'controllers/updateHouseController.php';
        exit;
    case 'update2':
        include 'controllers/updateHouseController2.php';
        exit;
    default:
        $error = "Dont know how to $action";
        include 'views/error.php';
        exit;
}

?>