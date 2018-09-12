<?php
if(empty ($_POST['houseId'])) {
    include 'projects/PHPCRUD/realestate/models/housesModel.php';
    include 'projects/PHPCRUD/realestate/views/updateHouseView1.php';
} else {
    $houseId = $_POST['houseId'];    
}
include 'projects/PHPCRUD/realestate/models/updateHouseModel.php';
?>