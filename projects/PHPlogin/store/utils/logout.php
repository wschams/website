<?php
unset($_SESSION['username']);
http_response_code(302);
header("Location: ../index.php");
exit;
?>