<?php
if (!empty($_GET['houseId'])) {
    $houseId = $_GET['houseId'];
    include 'projects/PHPCRUD/realestate/models/houseModel.php';
    
    if($_SERVER['REQUEST_METHOD'] === "POST") {
        if(empty($_POST['price'])) {
            $errors[] = "Price is required";   
        } else {
            if(! is_numeric($_POST['price']) ||  $_POST['price'] < 1) {
                $errors[] = "Price must be a number greater than 0";
            } else {
            $updatedHouse[] = $_POST['price'];
            }
        }
        if(empty($_POST['address'])) {
            $errors[] = "Address is required";
            } else {
            $updatedHouse[] = $_POST['address'];
        }
        if(empty($_POST['city'])) {
            $errors[] = "City is required";
            } else {
                if(is_numeric($_POST['city'])) {
                    $errors[] = "Invalid city";   
                } else {
                    $updatedHouse[] = $_POST['city'];
                }
        }
        if(empty($_POST['state'])) {
            $errors[] = "State is required";
            } else {
                if(is_numeric($_POST['state'])) {
                    $errors[] = "Invalid state";   
                } else {
                    $updatedHouse[] = $_POST['state'];
                }
        }
        if(empty($_POST['zip'])) {
            $errors[] = "Zip is required";
            } else {
                if(!is_numeric($_POST['zip'])) {
                    $errors[] = "Invalid zip";   
                } else {
                    $updatedHouse[] = $_POST['zip'];
                }
        }
        if(empty($_POST['picture'])) {
            $errors[] = "Picture is required";
            } else {
            $updatedHouse[] = $_POST['picture'];
        }
        if(empty($_POST['notes'])) {
            $errors[] = "Notes is required";
            } else {
            $updatedHouse[] = $_POST['notes'];
        }
        }
        if(!empty ($errors)) {
            include 'projects/PHPCRUD/realestate/views/error.php';
        } else {
            include 'projects/PHPCRUD/realestate/models/updateHouseModel.php';
            include 'projects/PHPCRUD/realestate/models/houseModel.php';
            include 'projects/PHPCRUD/realestate/views/updateHouseView2.php';
        }
} else {
    $errors[] = "houseId is a required param";
    include 'projects/PHPCRUD/realestate/views/error.php';
}
?>