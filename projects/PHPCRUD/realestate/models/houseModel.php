<?php
    include 'utils/db.php';

    if (! empty($houseId)) {
        try {
            $query = "SELECT * FROM forge.houses WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue('id', $houseId);
            $statement->execute();
            $house = $statement->fetch(PDO::FETCH_ASSOC);
            if (empty($house)) {
                $errors[] = "Unable to find house $houseId";
            }
        } catch(PDOException $e) {
            $errors[] = "Something went wrong " . $e->getMessage();
        }
    } else {
        $errors[] = "No house id set to find";
    }
?>