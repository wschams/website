<?php
    include 'filterPagerHelper.php';
    include 'models/itemsModel.php';
    if(empty ($items)) {
        $errors[] = "No more items to show";
        include 'views/error.php';
    } else {
        include 'views/homeView.php';
    }
?>