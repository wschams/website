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
        include 'projects/PHPCRUD/realestate/index.php';
        exit;
    case 'login':
        include 'projects/PHPlogin/store/index.php';
        exit;
    case 'ant':
        include 'projects/antDisplay/ants.html';
        exit;
    case 'youtube':
        include 'projects/miniYouTubeClone/videos.html';
        exit;
    default:
        $error = "Dont know how to $action";
        include 'views/error.php';
        exit;
}