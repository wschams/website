<?php
require 'db.php';
if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT url FROM pictures WHERE id = :id";
    $rs = $db->prepare($query);
    $rs->bindValue("id", $id);
    $rs->execute();
    $picture = $rs->fetch(PDO::FETCH_COLUMN);
    echo json_encode($picture);
}
?>