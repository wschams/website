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
    case 'ant':
        include 'projects/antDisplay/ants.html';
        exit;
    default:
        $error = "Dont know how to $action";
        include 'views/error.php';
        exit;
}