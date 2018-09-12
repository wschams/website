<?php
    if (!empty($_GET['houseId'])) {
        $houseId = $_GET['houseId'];
 
        include 'projects/PHPCRUD/realestate/models/houseModel.php';
        include 'projects/PHPCRUD/realestate/views/houseDetailsView.php';
    } else {
        $errors[] = "houseId is a required param";
        include 'projects/PHPCRUD/realestate/views/error.php';
    }
?>