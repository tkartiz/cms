<div class="flex flex-wrap px-2">
    <p class="me-auto ps-2">【文章】</p>
    <div class="tag ms-auto">
        <input id="<?php echo $contentID ?>.'bold'" class="tag1" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'fw-bold', '')">
        <input id="<?php echo $contentID ?>.'italic'" class="tag2" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'fst-italic', '')">
        <input id="<?php echo $contentID ?>.'underline'" class="tag3" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-decoration-underline', '')">
        <input id="<?php echo $contentID ?>.'linethrough'" class="tag4" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-decoration-line-through', '')">
        <input id="<?php echo $contentID ?>.'bigger'" class="tag11" type="button" onclick="applyStyle('<?php echo $contentID ?>', '', 'font-size:1.50em;')">
        <input id="<?php echo $contentID ?>.'smaller'" class="tag12" type="button" onclick="applyStyle('<?php echo $contentID ?>', '', 'font-size:0.75em;')">

        <input id="<?php echo $contentID ?>.'color'" class="tag8" type="button" onclick="appearTray('<?php echo  $contentID . 'tray1'; ?>')">
        <input id="<?php echo $contentID ?>.'bgcolor'" class="tag13" type="button" onclick="appearTray('<?php echo  $contentID . 'tray2'; ?>')">

        <input id="<?php echo $contentID ?>.'textleft'" class="tag5" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-left', '')">
        <input id="<?php echo $contentID ?>.'textcenter'" class="tag6" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-center', '')">
        <input id="<?php echo $contentID ?>.'textright'" class="tag7" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-right', '')">
        <input id="<?php echo $contentID ?>.'applyLink'" class="tag9" type="button" onclick="applyLink('<?php echo $contentID ?>')">

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
                <input style="background-color:<?php echo $color_array[$k] ?>;" type="button" onclick="applyStyle('<?php echo $contentID ?>', '','color:<?php echo $color_array[$k] ?>;')">
            <?php } ?>
        </div>
        <div id="<?php echo $contentID . 'tray2'; ?>" class="tray2 hidden">
            <?php for ($k = 0; $k < count($color_array); $k++) { ?>
                <input style="background-color:<?php echo $color_array[$k] ?>;" type="button" onclick="applyStyle('<?php echo $contentID ?>', '','background:linear-gradient(transparent 40%, <?php echo $color_array[$k] ?> 0%); padding:0 5px;')">
            <?php } ?>
        </div>
    </div>
    <textarea id=<?php echo $contentID ?> class="w-full h-32 py-1 px-3  bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 leading-8 transition-colors duration-200 ease-in-out" name=<?php echo $contentID ?>><?php echo $value ?></textarea>
</div>
<script type="text/javascript" defer>
     // 太文字
     document.getElementById(<?php echo $contentID ?>.'bold').addEventListener('click', function() {
        window.applyStyle();
    });

    // イタリック文字
    document.getElementById(<?php echo $contentID ?>.'italic').addEventListener('click', function() {
        window.applyStyle();
    });

    // 下線
    document.getElementById(<?php echo $contentID ?>.'underline').addEventListener('click', function() {
        window.applyStyle();
    });

    // 取り消し線
    document.getElementById(<?php echo $contentID ?>.'linethrough').addEventListener('click', function() {
        window.applyStyle();
    });

    // 文字サイズアップ
    document.getElementById(<?php echo $contentID ?>.'bigger').addEventListener('click', function() {
        window.applyStyle();
    });

    // 文字サイズダウン
    document.getElementById(<?php echo $contentID ?>.'smaller').addEventListener('click', function() {
        window.applyStyle();
    });

    // 文字色指定・色パレット表示
    document.getElementById(<?php echo $contentID ?>.'color').addEventListener('click', function() {
        window.appearTray();
    });

    // 文字色指定
    document.getElementById(<?php echo $contentID ?>.'tray1').addEventListener('click', function() {
        window.applyStyle();
    });

    // 文字背景色指定・色パレット表示
    document.getElementById(<?php echo $contentID ?>.'bgcolor').addEventListener('click', function() {
        window.appearTray();
    });

    // 文字背景色指定
    document.getElementById(<?php echo $contentID ?>.'tray2').addEventListener('click', function() {
        window.applyStyle();
    });

     // 文字左寄せ
     document.getElementById(<?php echo $contentID ?>.'textleft').addEventListener('click', function() {
        window.applyStyle();
    });

    // 文字左寄せ
    document.getElementById(<?php echo $contentID ?>.'textleft').addEventListener('click', function() {
        window.applyStyle();
    });

    // 文字中央寄せ
    document.getElementById(<?php echo $contentID ?>.'textcenter').addEventListener('click', function() {
        window.applyStyle();
    });

    // 文字右寄せ
    document.getElementById(<?php echo $contentID ?>.'textright').addEventListener('click', function() {
        window.applyStyle();
    });

    // リンク付け
    document.getElementById(<?php echo $contentID ?>.'applyLink').addEventListener('click', function() {
        window.applyLink();
    });
</script>