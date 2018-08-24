<?php
    include 'filterPagerHelper.php';
    include 'models/housesModel.php';
    if(empty ($houses)) {
        $errors[] = "No more houses to show";
        include 'views/error.php';
    } else {
        include 'views/homeView.php';
    }
?>