<?php
if($_SERVER['REQUEST_METHOD'] === "POST" && empty($errors)){
    include 'utils/db.php';
    $db = Db::getDb();
        try {
            $insert = "INSERT INTO `items`(`name`, `price`, `description`, `url`
            ) VALUES (?, ?, ?, ?)";
            $statement = $db->prepare($insert);
            $statement->execute($newItem);
            $statement->closeCursor();
        } catch(PDOException $e) {
            die("Something went wrong " . $e->getMessage());
        }
}
?>