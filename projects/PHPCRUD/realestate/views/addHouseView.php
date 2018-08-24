<?php
include 'top.php';
if($_SERVER['REQUEST_METHOD'] === "POST" && empty($errors)) : ?>
    <h2 class="text-center text-success">House successfully added</h2>
<?php
endif
?>
<form class="form-horizontal" method = "post">
    <div class = "form-group">
        <label class="control-label col-sm-2" for "price">Price</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "number" id = "price" name = "price" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "address">Address</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "address" name = "address" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "city">City</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "city" name = "city" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "state">State</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "state" name = "state" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "zip">Zip</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "number" id = "zip" name = "zip" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "picture">Picture</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "picture" name = "picture" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "notes">Notes</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "notes" name = "notes" required />
            </div>
    </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary" >Add House</button>
            </div>
        </div>
</form>
<?php 
include 'bottom.php'
?>