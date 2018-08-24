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
    if (!empty($house)) : ?>
        <div class="row">
            <form class="form-horizontal" method = "post">
    <div class = "form-group">
        <label class="control-label col-sm-2" for "price">Price</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "number" id = "price" name = "price" value = "<?= $house['price'] ?>" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "address">Address</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "address" name = "address" value = "<?= $house['address'] ?>" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "city">City</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "city" name = "city" value = "<?= $house['city'] ?>" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "state">State</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "state" name = "state" value = "<?= $house['state'] ?>" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "zip">Zip</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "number" id = "zip" name = "zip" value = "<?= $house['zip'] ?>" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "picture">Picture</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "picture" name = "picture" value = "<?= $house['picture'] ?>" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "notes">Notes</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "notes" name = "notes"  value = "<?= $house['notes'] ?>" required />
            </div>
    </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary">Update</button>
            </div>
        </div>
</form>
<?php 
endif;
include 'bottom.php'
?>