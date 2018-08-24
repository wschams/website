<?php
include 'top.php';
if($_SERVER['REQUEST_METHOD'] === "POST" && empty($errors)) : ?>
    <h2 class="text-center text-success">Item successfully added</h2>
<?php
endif
?>
<form class="form-horizontal" method = "post">
    <div class = "form-group">
        <label class="control-label col-sm-2" for "name">Name</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "name" name = "name" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "price">Price</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "number" id = "price" name = "price" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "description">Description</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "description" name = "description" required />
            </div>
    </div>
    <div class = "form-group">
        <label class="control-label col-sm-2" for "url">Url</label>
            <div class="col-sm-10">
                <input class = "form-control" type = "text" id = "url" name = "url" required />
            </div>
    </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary" >Add Item</button>
            </div>
        </div>
</form>
<?php 
include 'bottom.php'
?>