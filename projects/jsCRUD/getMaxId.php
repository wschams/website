<?php
require 'db.php';

header("Access-Control-Allow-Origin: *");
$query = "SELECT id FROM `contacts`  
ORDER BY `contacts`.`id`  DESC LIMIT 1";
$stmt = $db->query($query);
$maxId = $stmt->fetch();
echo json_encode($maxId);
?>