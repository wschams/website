<?php
    $styles = "
        img {
            width: 400px;
            height: 210px;
            margin-bottom: 8px;
        }

        .well:first-of-type {
            background: none;
            border: none;
            box-shadow: none;
        }
    ";
    include 'top.php';
?>
        <div class="row">
            <div class="text-center"><img src="<?= $newHouse[5] ?>" alt="picture of the house"/></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Address</div><div class="well col-sm-8"><?= $newHouse[1] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">City</div><div class="well col-sm-8"><?= $newHouse[2] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">State</div><div class="well col-sm-8"><?= $newHouse[3] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Zip</div><div class="well col-sm-8"><?= $newHouse[4] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Price</div><div class="well col-sm-8"><?= $newHouse[0] ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Notes</div><div class="well col-sm-8"><?= $newHouse[6] ?></div>
        </div>
<?php  
include 'bottom.php';
?>