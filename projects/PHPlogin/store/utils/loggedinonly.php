<?php

if(!isset($_SESSION['username'])) {
    $_SESSION['returnTo'] = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    header("Location: login.php", true, 401);
}

?>