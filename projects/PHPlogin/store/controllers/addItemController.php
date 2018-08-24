<?php
if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(empty($_POST['name'])) {
        $errors[] = "Name is required";
        } else {
        $newItem[] = $_POST['name'];
    }

    if(empty($_POST['price'])) {
        $errors[] = "Price is required";   
    } else {
        if(! is_numeric($_POST['price']) ||  $_POST['price'] < 0) {
            $errors[] = "Price can't be a number less than 0";
        } else {
        $newItem[] = $_POST['price'];
        }
    }

    if(empty($_POST['description'])) {
        $errors[] = "Description is required";
        } else {
            if(is_numeric($_POST['description'])) {
                $errors[] = "Invalid description";   
            } else {
                $newItem[] = $_POST['description'];
            }
    }

    if(empty($_POST['url'])) {
        $errors[] = "Url is required";
        } else {
            if(is_numeric($_POST['url'])) {
                $errors[] = "Invalid url";   
            } else {
                $newItem[] = $_POST['url'];
            }
    }
}

if(empty($errors)) {
    include 'models/addItemModel.php';
    include 'views/addItemView.php';
} elseif(!empty ($errors)) {
    include 'views/error.php';
}
?>