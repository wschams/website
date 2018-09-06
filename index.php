<?php
$action = "home";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch($action) {
    case 'home':
        include 'home.html';
        exit;
    case 'map':
        include 'projects/jsWikipediaGoogleMapsApp/wikipediaMapApp.html';
        exit;
    case 'snake':
        include 'projects/jsSnakeGame/snake.html';
        exit;
    case 'crud':
        include 'projects/PHPCRUD/realestate/home.php';
        exit;
    case 'table':
        include 'projects/PHPCRUD/realestate/controllers/housesTableController.php';
        exit;
    case 'details':
        include 'projects/PHPCRUD/realestate/controllers/houseDetailsController.php';
        exit;
    case 'add':
        include 'projects/PHPCRUD/realestate/controllers/addHouseController.php';
        exit;
    case 'delete':
        include 'projects/PHPCRUD/realestate/controllers/deleteHouseController.php';
        exit;
    case 'update':
        include 'projects/PHPCRUD/realestate/controllers/updateHouseController.php';
        exit;
    case 'update2':
        include 'projects/PHPCRUD/realestate/controllers/updateHouseController2.php';
        exit;
    case 'ant':
        include 'projects/antDisplay/ants.html';
        exit;
    default:
        $error = "Dont know how to $action";
        include 'views/error.php';
        exit;
}