<?php
if($_SERVER['REQUEST_METHOD'] === "POST" && empty($errors)){
    include 'utils/db.php';
        try {
            $insert = "INSERT INTO `forge.houses`(`price`, `address`, `city`, `state`, `zip`, `picture`,
            `notes`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $statement = $db->prepare($insert);
            $statement->execute($newHouse);
            $statement->closeCursor();
        } catch(PDOException $e) {
            die("Something went wrong " . $e->getMessage());
        }
}
?>