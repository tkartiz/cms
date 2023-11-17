<div class="d-flex flex-wrap p-2">
    <div class="tag">
        <input class="tag1" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'fw-bold', '')">
        <input class="tag2" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'fst-italic', '')">
        <input class="tag3" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-decoration-underline', '')">
        <input class="tag4" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-decoration-line-through', '')">
        <input class="tag11" type="button" onclick="applyStyle('<?php echo $contentID ?>', '', 'font-size:1.50em;')">
        <input class="tag12" type="button" onclick="applyStyle('<?php echo $contentID ?>', '', 'font-size:0.75em;')">

        <input id="tray1" class="tag8" type="button" onclick="appearTray('<?php echo '#' . $contentID . 'tray1'; ?>')">
        <input class="tag13" type="button" onclick="appearTray('<?php echo '#' . $contentID . 'tray2'; ?>')">

        <input class="tag5" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-left', '')">
        <input class="tag6" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-center', '')">
        <input class="tag7" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-right', '')">
        <input class="tag9" type="button" onclick="applyLink('<?php echo $contentID ?>')">

        <?php
        $color_array = array(
            '#ffffff', '#ffcccc', '#ffcc99', '#ffff99', '#ffffcc', '#99ff99', '#99ffff', '#ccffff', '#ccccff', '#ffccff',
            '#cccccc', '#ff6666', '#ff9966', '#ffff66', '#ffff33', '#66ff99', '#33ffff', '#66ffff', '#9999ff', '#ff99ff',
            '#c0c0c0', '#ff0000', '#ff9900', '#ffcc66', '#ffff00', '#33ff33', '#66cccc', '#33ccff', '#6666cc', '#cc66cc',
            '#999999', '#cc0000', '#ff6600', '#ffcc33', '#ffcc00', '#33cc00', '#00cccc', '#3366ff', '#6633ff', '#cc33cc',
            '#666666', '#990000', '#cc6600', '#cc9933', '#999900', '#009900', '#339999', '#3333ff', '#6600cc', '#993399',
            '#333333', '#660000', '#993300', '#996633', '#666600', '#006600', '#336666', '#000099', '#333399', '#663366',
            '#000000', '#330000', '#663300', '#663333', '#333300', '#003300', '#003333', '#000066', '#330099', '#330033'
        );
        ?>
        <div id="<?php echo $contentID . 'tray1'; ?>" class="tray1 hidden">
            <?php for ($k = 0; $k < count($color_array); $k++) { ?>
                <input id="<?php echo $contentID . 'col' . $color_array[$k]; ?>" style="background-color:<?php echo $color_array[$k] ?>;" type="button" onclick="applyStyle('<?php echo $contentID ?>', '','color:<?php echo $color_array[$k] ?>;')">
            <?php } ?>
        </div>
        <div id="<?php echo $contentID . 'tray2'; ?>" class="tray2 hidden">
            <?php for ($k = 0; $k < count($color_array); $k++) { ?>
                <input id="<?php echo $contentID . 'bgcol' . $color_array[$k]; ?>" style="background-color:<?php echo $color_array[$k] ?>;" type="button" onclick="applyStyle('<?php echo $contentID ?>', '','background:linear-gradient(transparent 40%, <?php echo $color_array[$k] ?> 0%); padding:0 5px;')">
            <?php } ?>
        </div>
    </div>
    <textarea id=<?php echo $contentID ?> class="w-full h-32" name=<?php echo $contentID ?>><?php echo $value ?></textarea>
</div>