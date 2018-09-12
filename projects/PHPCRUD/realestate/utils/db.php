<?php
    try {
        $db = new PDO("mysql:host=167.99.224.176;dbname=forge", "forge", "dNDUaWlPWbsibGZRr52t",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>