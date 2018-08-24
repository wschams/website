<?php
require 'db.php';

header("Access-Control-Allow-Origin: http://localhost");
function getParam($param) {
    if(! empty($_POST[$param])) {
        return $_POST[$param];
    } 
    return "UNKNOWN";
}

$firstName = getParam("firstName");
$lastName = getParam("lastName");
$email = getParam("email");
$phone = getParam("phone");
$id = getParam("id");

$update = "UPDATE contacts SET `firstName`= :firstName,`lastName`= :lastName,`email`= :email,`phone`= :phone WHERE id = :id";

$statement = $db->prepare($update);
$statement->bindParam("firstName", $firstName);
$statement->bindParam("lastName", $lastName);
$statement->bindParam("email", $email);
$statement->bindParam("phone", $phone);
$statement->bindParam("id", $id);
$rowsInserted = $statement->execute();
if(!$rowsInserted) {
    http_response_code(500);
    exit("Unable to add contact");
}

http_response_code(201);