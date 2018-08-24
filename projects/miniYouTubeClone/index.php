<?php
    require 'db.php';
    
    try {
        $query = "SELECT id, title FROM videos";
        $results = $db->query($query);
        $videos = $results->fetchAll(PDO::FETCH_ASSOC);
        $results->closeCursor();
    
        if(isset($_GET["sefer"])) {
            if(empty($_GET["sefer"] || !is_numeric($_GET["sefer"]))) {
                $error = "A valid sefer id must be submitted";
            } else {
                $theId = $_GET['sefer'];
                
                $query = "SELECT id, name, price FROM seforim WHERE id = :theId";
                $statement = $db->prepare($query);
                $statement->bindValue('theId', $theId);
                $statement->execute();
                $selectedSefer = $statement->fetch();
                if(empty($selectedSefer)) {
                    $error = "Couldnt find sefer {$theId}";
                }
            }
        }
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }

    include 'top.php'
?>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="sefer" class="col-sm-2 control-label">Select A Sefer</label>
            <div class="col-sm-10">
            <select class="form-control" id="sefer" name="sefer">
                    <?php foreach($seforim as $sefer) :?>
                    <option value="<?= $sefer['id'] ?>"
                    <?php if (!empty($selectedSefer) && $sefer['id'] == $selectedSefer['id']) echo "selected" ?>
                    ><?= $sefer["name"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Get Info</button>
            </div>
        </div>
    </form>

    <?php if(!empty($selectedSefer)) : ?>
        <h2 class="text-center">
            <?= $selectedSefer['name'] ?> is $<?= number_format($selectedSefer['price'], 2) ?>
        </h2>
    <?php endif ?>

    <?php if(!empty($error)) : ?>
        <h2 class="text-center alert alert-danger">
            <?= $error ?>
        </h2>
<?php 
endif; 
include 'bottom.php'
?>
    