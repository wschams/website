<?php
$action = '';
  if(empty($_GET['action'])) {
    include 'home.php';
  } else {
    $action = $_GET['action'];
  }

if($action === 'snake') {
        include 'jsSnakeGame/snake.html';
}
?>