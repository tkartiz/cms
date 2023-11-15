<?php for ($j = 0; $j < $tableNum; $j++) { ?>
    <?php if($operation == "edit"){ ?>
        <div class="mb-3">
            <div>
                <input class="w-100" style="outline:1px solid #e6e6e6;" type="text" name="tourTable<?php echo $j ?>-title" value="<?php echo $course['tourTable'.$j.'-title'] ?>">
            </div>
            <?php for ($i = 0; $i < $itemNum; $i++) { ?>
                <div class="d-flex">
                    <input style="width:4rem; outline:1px solid #e6e6e6;" type="text" name="tourTable<?php echo $j ?>-time<?php echo $i ?>" value="<?php echo $course['tourTable'.$j.'-time'.$i] ?>">
                    <?php
                    $contentID = "tourTable".$j."-item".$i;
                    $contents = $course["tourTable".$j."-item".$i];
                    $heights = '46px';
                    include('./template/pallete_min.php');
                    ?>
                </div>
            <?php } ?>
        </div>
    <?php } else if($operation == "post"){ ?>
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
                    $heights = '46px';
                    include('./template/pallete_min.php');
                    ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
<?php } ?>