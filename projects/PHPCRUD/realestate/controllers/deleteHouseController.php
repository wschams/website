<?php
if(!empty ($_POST['houseToDelete'])) {
    $houseToDelete = $_POST['houseToDelete'];    
}
include 'models/deleteHouseModel.php';
include 'models/housesModel.php';
include 'views/deleteHouseView.php';
?>