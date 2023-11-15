<?php
if($mode == "release"){
    $option_class = 'fadeUpTrigger delay-time'.$timeDelay;
} else {
    $option_class = '';
}
?>

<div class="<?php echo $option_class ?>">
    <a class="option-banner">
        <h2><?php echo $option['title1'] ?></h2>
        <div></div>
        <img src="<?php echo ($option_imgFolder_path . $option['image1']) ?>">
    </a>
    <h3><?php echo  $option['title2'] ?></h3>
    <div class="option-info">
        <div class="contentP">
            <p class="option-item">参加料金</p>
            <p><?php echo nl2br($option['fee']) ?></p>
        </div>
        <div class="contentP">
            <p class="option-item">開催日時</p>
            <p><?php echo nl2br($option['day']) ?></p>
        </div>
        <div class="contentP">
            <p class="option-item">交通手段</p>
            <table class="transpo">
                <?php if ($option['transpo1'] != "") { ?>
                    <tr><td></td><td></td></tr>
                    <tr>
                        <td><?php echo $option['transpo1'] ?></td>
                        <td><?php echo nl2br($option['transpo1Content']) ?></td>
                    </tr>
                <?php }; ?>
                <?php if ($option['transpo2'] != "") { ?>
                    <tr><td></td><td></td></tr>
                    <tr>
                        <td><?php echo $option['transpo2'] ?></td>
                        <td><?php echo nl2br($option['transpo2Content']) ?></td>
                    </tr>
                <?php }; ?>
                <?php if ($option['transpo3'] != "") { ?>
                    <tr><td></td><td></td></tr>
                    <tr>
                        <td><?php echo $option['transpo3'] ?></td>
                        <td><?php echo nl2br($option['transpo3Content']) ?></td>
                    </tr>
                <?php }; ?>
            </table>
        </div>
    </div>
</div>