<?php
session_start();
$action = "login";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch($action) {
    case 'login':
        include 'controllers/loginController.php';
        exit;
    case 'home':
        include 'controllers/homeController.php';
        exit;
    case 'add':
        if($_SESSION['admin'] > 0){
            include 'controllers/addItemController.php';
            exit;
        } else {
            $errors[] = "You can't add because you aren't logged in as an administrator";
            include 'views/error.php';
            exit;
        }
    default:
        $error = "Dont know how to $action";
        include 'views/error.php';
        exit;
}

?>