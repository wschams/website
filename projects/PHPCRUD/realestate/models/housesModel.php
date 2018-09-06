<?php
include 'projects/PHPCRUD/realestate/utils/db.php';

if (empty($zip)) {
    $zip = '';
}

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

if(empty($column)) {
    $column = "price";    
}

if(empty($direction)) {
    $direction = "DESC";    
}

try {
    $query = "SELECT * FROM forge.houses WHERE (:zip = '' OR zip=:zip)
                                    AND (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)
                                    ORDER BY $column $direction
                                    LIMIT :page, :perPage";

    $statement = $db->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('page', (int)$page * $numPerPage, PDO::PARAM_INT);
    $statement->bindValue('perPage', $numPerPage, PDO::PARAM_INT);

    $statement->execute();
    $houses = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>