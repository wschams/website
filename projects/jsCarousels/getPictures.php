<?php
require 'db.php';
    $query = "SELECT title, url FROM pictures";
    $rs = $db->prepare($query);
    $rs->execute();
    $pictures = $rs->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($pictures);
?>