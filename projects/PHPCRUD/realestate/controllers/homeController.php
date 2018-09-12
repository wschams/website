<?php
    include 'projects/PHPCRUD/realestate/controllers/filterPagerHelper.php';
    include 'projects/PHPCRUD/realestate/models/housesModel.php';
    if(empty ($houses)) {
        $errors[] = "No more houses to show";
        include 'projects/PHPCRUD/realestate/views/error.php';
    } else {
        include 'projects/PHPCRUD/realestate/views/homeView.php';
    }
?>