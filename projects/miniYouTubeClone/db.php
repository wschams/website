<?php
    $cs = "mysql:host=forge;dbname=forge";
    $user = "forge";
    $password = 'dNDUaWlPWbsibGZRr52t';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
        //header('HTTP/1.0 500 Internal Server Error');
        http_response_code(500);
        echo $error;
    }
?>