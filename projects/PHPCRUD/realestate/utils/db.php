<?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=test", "test", "0000",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>