<?php
include 'projects/miniYouTubeClone/db.php';

$query = "SELECT title, url, img FROM forge.videos";
$statement = $db->prepare($query);
$statement->execute();
$videos = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($videos);
?>