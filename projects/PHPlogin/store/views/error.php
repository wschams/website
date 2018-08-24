<?php 
include 'top.php'; 
if (!empty($errors)) : 
foreach($errors as $error) : ?>
<h3 class="alert alert-danger"><?= $error ?></h3>
<?php endforeach;
endif;
include 'bottom.php'
?>