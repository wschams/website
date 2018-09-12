<?php
if(!empty ($_POST['houseToDelete'])) {
    $houseToDelete = $_POST['houseToDelete'];    
}
include 'projects/PHPCRUD/realestate/models/deleteHouseModel.php';
include 'projects/PHPCRUD/realestate/models/housesModel.php';
include 'projects/PHPCRUD/realestate/views/deleteHouseView.php';
?>