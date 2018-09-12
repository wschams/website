<?php
if(!empty ($houseToDelete)) {
    include 'projects/PHPCRUD/realestate/utils/db.php';
    try{
        $delete = "DELETE FROM `forge.houses` WHERE id = :id";
        $statement = $db->prepare($delete);
        $statement->bindValue('id', $houseToDelete);
        $statement->execute();
        $statement->closeCursor();
    } catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
    }
}
?>