<?php
if($_SERVER['REQUEST_METHOD'] === "POST") {
    include 'utils/db.php';
    try {
        $update = "UPDATE `forge.houses` SET `price`= ?,`address`= ?,`city`= ?,`state`= ?,
        `zip`= ?,`picture`= ?,`notes` = ? where `id` = {$house['id']} "; 
        $statement = $db->prepare($update);
        $statement->execute($updatedHouse);
        $statement->closeCursor();  
    }catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
}
?>