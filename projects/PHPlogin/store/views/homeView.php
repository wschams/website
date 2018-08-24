<?php
include 'top.php';
?>
    <div class="row">
        <?php include 'filters.php' ?>

        <div class="col-sm-9">
            <?php include "pager.php"; ?>
            <div class="row">
                <?php 
                $i = 0;
                foreach($items as $item) :
                ?>
                    <div class="col-md-3 col-sm-4 house">
                            <figure>
                                <img src="<?= $item['url'] ?>" alt="picture of the item"/>
                            </figure>
                            <figcaption class="text-center">
                                <h3 
                                ><?= number_format($item['price'], 2) ?></h3>
                                <h4><?= $item['name'] ?></h4>
                                <h6><?= "{$item['description']}"?></h6>
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