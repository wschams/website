<?php
if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(empty($_POST['price'])) {
        $errors[] = "Price is required";   
    } else {
        if(! is_numeric($_POST['price']) ||  $_POST['price'] < 1) {
            $errors[] = "Price must be a number greater than 0";
        } else {
        $newHouse[] = $_POST['price'];
        }
    }
if(empty($_POST['address'])) {
    $errors[] = "Address is required";
    } else {
    $newHouse[] = $_POST['address'];
}
if(empty($_POST['city'])) {
    $errors[] = "City is required";
    } else {
        if(is_numeric($_POST['city'])) {
            $errors[] = "Invalid city";   
        } else {
            $newHouse[] = $_POST['city'];
        }
}
if(empty($_POST['state'])) {
    $errors[] = "State is required";
    } else {
        if(is_numeric($_POST['state'])) {
            $errors[] = "Invalid state";   
        } else {
            $newHouse[] = $_POST['state'];
        }
}
if(empty($_POST['zip'])) {
    $errors[] = "Zip is required";
    } else {
        if(!is_numeric($_POST['zip'])) {
            $errors[] = "Invalid zip";   
        } else {
            $newHouse[] = $_POST['zip'];
        }
}
if(empty($_POST['picture'])) {
    $errors[] = "Picture is required";
    } else {
    $newHouse[] = $_POST['picture'];
}
if(empty($_POST['notes'])) {
    $errors[] = "Notes is required";
    } else {
    $newHouse[] = $_POST['notes'];
}
}
if(empty($errors)) {
    include 'projects/PHPCRUD/realestate/models/addHouseModel.php';
    include 'projects/PHPCRUD/realestate/views/addHouseView.php';
} elseif(!empty ($errors)) {
    include 'projects/PHPCRUD/realestate/views/error.php';
}
?>