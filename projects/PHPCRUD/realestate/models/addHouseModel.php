<?php
if($_SERVER['REQUEST_METHOD'] === "POST" && empty($errors)){
    include 'projects/PHPCRUD/realestate/utils/db.php';
        try {
            $insert = "INSERT INTO `houses`(`price`, `address`, `city`, `state`, `zip`, `picture`,
            `notes`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statement = $db->prepare($insert);
            $statement->execute($newHouse);
            $statement->closeCursor();
        } catch(PDOException $e) {
            die("Something went wrong " . $e->getMessage());
        }
}
?>