<?php
    include 'projects/PHPCRUD/realestate/controllers/filterPagerHelper.php';

    if(! empty($_GET['direction'])) {
    if($_GET['direction'] ==! "ASC" || $_GET['direction'] ==! "DESC") {
        $errors[] = "sorting direction must be ASC or DESC";
    } else {
        $direction = $_GET['direction'];
    }
}

$columns = ["price", "address", "city", "state", "zip", "picture", "notes"];

if(! empty($_GET['column'])) {
    if(!in_array($_GET['column'], $columns)) {
        $errors[] = "Invalid sort";
        } else {
    $column = $_GET['column'];
    }
}
    include 'projects/PHPCRUD/realestate/models/housesModel.php';
    if(empty ($houses)) {
        $errors[] = "No more houses to show";
        include 'projects/PHPCRUD/realestate/views/error.php';
    } else {
        include 'projects/PHPCRUD/realestate/views/housesTableView.php';
    }
?>