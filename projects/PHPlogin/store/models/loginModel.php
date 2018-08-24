<?php 
include_once 'utils/db.php';
require_once "utils/httpsonly.php"; 
include_once "utils/link.php";

$username = '';
$password = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['username'])) {
        $username = $_POST['username'];
    }

    if(!empty($_POST['password'])) {
        $password = $_POST['password'];
    }

    if(!empty($username) && !empty($password)) {
        $db = Db::getDb();
        $query = "SELECT password, admin FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue("username", $username);
    
        try {
            $statement->execute();
            $hashAndAdmin = $statement->fetchAll(PDO::FETCH_ASSOC);

            if(password_verify($password, $hashAndAdmin[0]['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['admin'] = $hashAndAdmin[0]['admin'];

                if(!empty($_SESSION['returnTo'])) {
                    $url = $_SESSION['returnTo'];
                    unset($_SESSION['returnTo']);
                } else {
                    $url = getLink(['action'=>'home']);
                }
                http_response_code(302);
                header("Location: $url");
                exit;
            }
            $errors[] = "Username and password did not match our records. Please try again";
        } catch(PDOException $e){
            $errors[] = $e->getMessage();
        }
    } else {
        $errors[] = "Username and password are required";
    }
}

