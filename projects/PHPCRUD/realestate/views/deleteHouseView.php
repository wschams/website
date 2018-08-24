<?php
    $styles = "
        .house img {
            width: 206px;
            height: 150px;
        }

        .cheap {
            color: red;
        }

        .cheap::before {
            content: \"ONLY \";
        }

        .cheap::after {
            content: \" !!\"
        }
    ";

    include 'top.php';
?>
    <div class="row">
        <?php include 'filters.php' ?>
        <div class="col-sm-9">
            <?php include "pager.php"; ?>
            <div class="row">
                <?php 
                $i = 0;
                foreach($houses as $house) : ?>
                    <a href="index.php?action=details&houseId=<?= $house['id'] ?>">
                        <div class="col-md-3 col-sm-4 house">
                            <form class = "form-group text-center" method = "post">
                                <input type = "hidden" value = "<?= $house['id'] ?>" name = "houseToDelete" />
                                    <button class = "btn btn-danger text-center">Delete</button>
                            </form>
                                    <figure>
                                        <img src="<?= $house['picture'] ?>" alt="picture of the house"/>
                                    </figure>
                                    <figcaption class="text-center">
                                        <h3 
                                            <?php if($house['price'] < 1500000) echo "class=\"cheap\""?>
                                        ><?= number_format($house['price'], 2) ?></h3>
                                        <h4><?= $house['address'] ?></h4>
                                        <h5><?= "{$house['city']}, {$house['state']} {$house['zip']}"?></h5>
                                        <h6><?= "{$house['notes']}"?></h6>
                                    </figcaption>
                        </div>
                    </a>
                    <?php
                    if (++$i % 3 === 0) {
                        echo '<div class="clearfix visible-sm-block"></div>';
                    }
                    if ($i % 4 === 0) {
                            echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
                    }
                    ?>
                <?php endforeach ?>
            </div>
            <?php include "pager.php"; ?>
        </div>
    </div>
<?php 
include 'bottom.php';
?>