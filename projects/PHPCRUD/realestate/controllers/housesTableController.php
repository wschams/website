<?php
    include 'filterPagerHelper.php';

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
    include 'models/housesModel.php';
    if(empty ($houses)) {
        $errors[] = "No more houses to show";
        include 'views/error.php';
    } else {
        include 'views/housesTableView.php';
    }
?>