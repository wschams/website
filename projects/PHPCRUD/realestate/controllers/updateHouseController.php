<?php
if(empty ($_POST['houseId'])) {
    include 'models/housesModel.php';
    include 'views/updateHouseView1.php';
} else {
    $houseId = $_POST['houseId'];    
}
include 'models/updateHouseModel.php';
?>