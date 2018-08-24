<?php
    function getTd($value, $houseId) {
        $it = "<td><a href=\"index.php?action=details&houseId=$houseId\">$value</a></td>";
        return $it;
    }

    $styles = "
        .house img {
            width: 131.24px;
            height: 98px;
        }
        .glyphicon-triangle-top {
            margin-right: -5px;
        }
        th a:hover {
            text-decoration: none;
        }
    ";
    include 'top.php';
?>
    <div class="row">
        <?php include 'filters.php' ?>

        <div class="col-sm-9">
            <?php include "pager.php"; ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <?php foreach($columns as $column) : ?>
                            <th class = "text-capitalize"> <?= $column ?>
                                <?php if($column === 'picture' || $column === 'notes') : echo "</th>"; continue; endif ?>
                                    <a href = "<?= getLink(["column" => $column, "direction" => "ASC", "page" => 0]) ?>">
                                        <span class = "glyphicon glyphicon-triangle-top">
                                        </span>
                                    </a>
                                    <a href = "<?= getLink(["column" => $column, "direction" => "DESC", "page" => 0])?>">
                                        <span class = "glyphicon glyphicon-triangle-bottom">
                                        </span>
                                    </a>                              
                            </th>
                        <?php endforeach ?>
                    </tr>
                </thead>
<tbody>
                    <?php foreach($houses as $house) :?>
                    <tr class="house">
                        <?= getTd(number_format($house['price'], 2), $house['id']) ?>
                        <?= getTd($house['address'], $house['id']) ?>
                        <?= getTd($house['city'], $house['id']) ?>
                        <?= getTd($house['state'], $house['id']) ?>
                        <?= getTd($house['zip'], $house['id']) ?>
                        <td><a href="index.php?action=details&houseId=<?= $house['id'] ?>"><img src= "<?= $house['picture'] ?>" alt="the house"/></a></td>
                        <?= getTd($house['notes'], $house['id']) ?>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php include "pager.php"; ?>
        </div>
    </div>
<?php
include 'bottom.php';
?>