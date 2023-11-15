<?php for ($j = 0; $j < $tableNum; $j++) { ?>
    <div class="mb-3">
        <div>
            <input class="w-100" style="outline:1px solid #e6e6e6;" type="text" name="tourTable<?php echo $j ?>-title" value="">
        </div>
        <?php for ($i = 0; $i < $itemNum; $i++) { ?>
            <div class="d-flex">
                <input style="width:4rem; outline:1px solid #e6e6e6;" type="text" name="tourTable<?php echo $j ?>-time<?php echo $i ?>" value="">
                <?php
                $contentID = "tourTable".$j."-item".$i;
                $contents = "";
                $heights = '2rem';
                $pallete_type = "mini";
                $required = "no";
                include('./template/pallete.php');
                ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>