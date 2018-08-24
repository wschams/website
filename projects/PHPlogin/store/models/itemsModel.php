<?php
include 'utils/db.php';

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

if (empty($page)) {
    $page = 0;
}

$numPerPage = 4;

$db = Db::getDb();
try {
    $query = "SELECT * FROM items WHERE (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)
                                    LIMIT :page, :perPage";

    $statement = $db->prepare($query);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('page', (int)$page * $numPerPage, PDO::PARAM_INT);
    $statement->bindValue('perPage', $numPerPage, PDO::PARAM_INT);

    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>