<?php
include_once "projects/PHPCRUD/realestate/utils/link.php";

if(!isset($page)) {
    $page = 0;
}
?>

<div class="row">
    <div class="col-sm-1">
        <a class="btn btn-primary previous" href="<?=getLink(["page" => $page - 1])?>"
        <?php if ($page === 0) echo " disabled"; ?>>prev</a>
    </div>
    <div class="col-sm-1 col-sm-offset-10">
        <a class="btn btn-primary" href="<?=getLink(["page" => $page + 1])?>">next</a>
    </div>
</div>