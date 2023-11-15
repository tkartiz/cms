<div class="d-flex flex-wrap" style="background-color:lightgray">
    <div class="tag">
        <input class="tag1" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'fw-bold', '')">
        <input class="tag2" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'fst-italic', '')">
        <input class="tag3" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-decoration-underline', '')">
        <input class="tag4" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-decoration-line-through', '')">
        <input class="tag11" type="button" onclick="applyStyle('<?php echo $contentID ?>', '', 'font-size:1.50em;')">
        <input class="tag12" type="button" onclick="applyStyle('<?php echo $contentID ?>', '', 'font-size:0.75em;')">

        <input class="tag8" type="button" onclick="appearTray('<?php echo '#' . $contentID . 'tray1'; ?>')">
        <input class="tag13" type="button" onclick="appearTray('<?php echo '#' . $contentID . 'tray2'; ?>')">

        <input class="tag5" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-left', '')">
        <input class="tag6" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-center', '')">
        <input class="tag7" type="button" onclick="applyStyle('<?php echo $contentID ?>', 'text-right', '')">
        <input class="tag9" type="button" onclick="applyLink('<?php echo $contentID ?>')">
        <!-- <input class="tag10" type="button" onclick="applyMail('<?php echo $contentID ?>')"> -->

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
        <div id="<?php echo $contentID . 'tray1'; ?>" class="tray1 d-none">
            <?php for ($k = 0; $k < count($color_array); $k++) { ?>
                <input id="<?php echo $contentID . 'col' . $color_array[$k]; ?>" style="background-color:<?php echo $color_array[$k] ?>;" type="button" onclick="applyStyle('<?php echo $contentID ?>', '','color:<?php echo $color_array[$k] ?>;')">
            <?php } ?>
        </div>
        <div id="<?php echo $contentID . 'tray2'; ?>" class="tray2 d-none">
            <?php for ($k = 0; $k < count($color_array); $k++) { ?>
                <input id="<?php echo $contentID . 'bgcol' . $color_array[$k]; ?>" style="background-color:<?php echo $color_array[$k] ?>;" type="button" onclick="applyStyle('<?php echo $contentID ?>', '','background:linear-gradient(transparent 40%, <?php echo $color_array[$k] ?> 0%); padding:0 5px;')">
            <?php } ?>
        </div>
    </div>
    <?php if ($required == 'yes') { ?>
        <textarea id=<?php echo $contentID ?> class="w-100" style="height:<?php echo $heights ?>" name=<?php echo $contentID ?> required><?php echo $contents ?></textarea>
    <?php } else { ?>
        <textarea id=<?php echo $contentID ?> class="w-100" style="height:<?php echo $heights ?>" name=<?php echo $contentID ?>><?php echo $contents ?></textarea>
    <?php } ?>
</div>

<script>
    function applyStyle(contentID, classEffect, styleEffect) {
        const areaID = contentID;
        const textarea = document.getElementById(areaID);
        const text = textarea.value;
        const selectionStart = textarea.selectionStart;
        const selectionEnd = textarea.selectionEnd;
        const selectedText = text.substring(selectionStart, selectionEnd);

        disappearTray(contentID);

        if (classEffect != "" && styleEffect == "") {
            if (classEffect == 'text-left' || classEffect == 'text-center' || classEffect == 'text-right') {
                const resultC = selectedText.indexOf('<p class="');
                if (resultC < 0) {
                    const newText = '<p class="' + classEffect + '">' + selectedText + '</p>';
                    textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                } else {
                    const resultCf1 = selectedText.indexOf('text-left');
                    const resultCf2 = selectedText.indexOf('text-center');
                    const resultCf3 = selectedText.indexOf('text-right');
                    if (resultCf1 < 0 && resultCf2 < 0 && resultCf3 < 0) {
                        alert('選択した範囲のpタグ内に『text-』クラスは見つかりませんでした。');
                        const newText = selectedText.slice(0, resultC + 10) + classEffect + selectedText.slice(resultC + 10);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultCf1 >= 0 && resultCf2 < 0 && resultCf3 < 0) {
                        alert('選択した範囲のpタグ内に『text-left』クラスが見つかりましたので置き換えます。');
                        const newText = selectedText.slice(0, resultCf1) + classEffect + selectedText.slice(resultCf1 + 9);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultCf1 < 0 && resultCf2 >= 0 && resultCf3 < 0) {
                        alert('選択した範囲のpタグ内に『text-center』クラスが見つかりましたので置き換えます。');
                        const newText = selectedText.slice(0, resultCf2) + classEffect + selectedText.slice(resultCf2 + 11);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultCf1 < 0 && resultCf2 < 0 && resultCf3 >= 0) {
                        alert('選択した範囲のpタグ内に『text-right』クラスが見つかりましたので置き換えます。');
                        const newText = selectedText.slice(0, resultCf3) + classEffect + selectedText.slice(resultCf3 + 10);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    }
                };
            } else {
                const resultC = selectedText.indexOf('class="');
                if (resultC < 0) {
                    const resultCf1 = selectedText.indexOf('<span style="');
                    const resultCf2 = selectedText.indexOf('<p style="');
                    if (resultCf1 < 0 && resultCf2 < 0) {
                        const newText = '<span class="' + classEffect + '">' + selectedText + '</span>';
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultCf1 >= 0 && resultCf2 < 0) {
                        const newText = selectedText.slice(0, resultCf1 + 6) + 'class="' + classEffect + '" ' + selectedText.slice(resultCf1 + 6);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if ((resultCf1 < 0 && resultCf2 >= 0) || (resultCf1 >= 0 && resultCf2 >= 0)) {
                        const newText = selectedText.slice(0, resultCf2 + 3) + 'class="' + classEffect + '" ' + selectedText.slice(resultCf2 + 3);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    }
                } else {
                    const resultCf1 = selectedText.indexOf('<span');
                    const resultCf2 = selectedText.indexOf('<p');
                    if ((resultCf1 >= 0 && resultCf2 < 0) || (resultCf1 < 0 && resultCf2 >= 0)) {
                        alert('選択した範囲のp/spanタグ内に『class』が見つかりました。\r\n今回の効果は、そちらに統合します。');
                        const newText = selectedText.slice(0, resultC + 7) + classEffect + ' ' + selectedText.slice(resultC + 7);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultCf1 >= 0 && resultCf2 >= 0) {
                        alert('選択した範囲のpタグ内に『class』が見つかりました。\r\n今回の効果は、そちらに統合します。');
                        const newText = selectedText.slice(0, resultC + 7) + classEffect + ' ' + selectedText.slice(resultC + 7);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    }
                };
            }
        } else if (classEffect == "" && styleEffect != "") {
            const effect1 = styleEffect.indexOf('color:');
            const effect2 = styleEffect.indexOf('background:');
            const effect3 = styleEffect.indexOf('font-size:');
            if (effect1 >= 0 && effect2 < 0 && effect3 < 0) {
                const resultS = selectedText.indexOf('style="color:');
                if (resultS < 0) {
                    const resultSf1 = selectedText.indexOf('<span');
                    const resultSf2 = selectedText.indexOf('<p');
                    const resultSf3 = selectedText.indexOf('style="');
                    const resultSf4 = selectedText.indexOf('color:');
                    if (resultSf1 < 0 && resultSf2 < 0 && resultSf3 < 0) {
                        const newText = '<span style="' + styleEffect + '">' + selectedText + '</span>';
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf1 >= 0 && resultSf2 < 0 && resultSf3 < 0) {
                        const newText = selectedText.slice(0, resultSf1 + 6) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf1 + 5);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf1 < 0 && resultSf2 >= 0 && resultSf3 < 0) {
                        const newText = selectedText.slice(0, resultSf2 + 3) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf2 + 2);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf3 >= 0 && resultSf4 < 0) {
                        const newText = selectedText.slice(0, resultSf3 + 7) + styleEffect + ' ' + selectedText.slice(resultSf3 + 7);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf3 >= 0 && resultSf4 >= 0) {
                        alert('選択した範囲のp/spanタグ内に『color』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
                        const newText = selectedText.slice(0, resultSf4) + styleEffect + ' ' + selectedText.slice(resultSf4 + 14);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    }
                } else {
                    alert('選択した範囲のp/spanタグ内に『color』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
                    const newText = selectedText.slice(0, resultS + 7) + styleEffect + ' ' + selectedText.slice(resultS + 21);
                    textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                }
            } else if (effect1 < 0 && effect2 >= 0 && effect3 < 0) {
                const resultS = selectedText.indexOf('style="background:');
                if (resultS < 0) {
                    const resultSf1 = selectedText.indexOf('<span');
                    const resultSf2 = selectedText.indexOf('<p');
                    const resultSf3 = selectedText.indexOf('style="');
                    const resultSf4 = selectedText.indexOf('background:');
                    if (resultSf1 < 0 && resultSf2 < 0 && resultSf3 < 0) {
                        const newText = '<span style="' + styleEffect + '">' + selectedText + '</span>';
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf1 >= 0 && resultSf2 < 0 && resultSf3 < 0) {
                        const newText = selectedText.slice(0, resultSf1 + 6) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf1 + 5);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf1 < 0 && resultSf2 >= 0 && resultSf3 < 0) {
                        const newText = selectedText.slice(0, resultSf2 + 3) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf2 + 2);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf3 >= 0 && resultSf4 < 0) {
                        const newText = selectedText.slice(0, resultSf3 + 7) + styleEffect + ' ' + selectedText.slice(resultSf3 + 7);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf3 >= 0 && resultSf4 >= 0) {
                        alert('選択した範囲のp/spanタグ内に『background & padding』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
                        const newText = selectedText.slice(0, resultSf4) + styleEffect + ' ' + selectedText.slice(resultSf4 + 71);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    }
                } else {
                    alert('選択した範囲のp/spanタグ内に『background & padding』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
                    const newText = selectedText.slice(0, resultS + 7) + styleEffect + selectedText.slice(resultS + 78);
                    textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                }
            } else if (effect1 < 0 && effect2 < 0 && effect3 >= 0) {
                const resultS = selectedText.indexOf('style="font-size:');
                if (resultS < 0) {
                    const resultSf1 = selectedText.indexOf('<span');
                    const resultSf2 = selectedText.indexOf('<p');
                    const resultSf3 = selectedText.indexOf('style="');
                    const resultSf4 = selectedText.indexOf('font-size:');
                    if (resultSf1 < 0 && resultSf2 < 0 && resultSf3 < 0) {
                        const newText = '<span style="' + styleEffect + '">' + selectedText + '</span>';
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf1 >= 0 && resultSf2 < 0 && resultSf3 < 0) {
                        const newText = selectedText.slice(0, resultSf1 + 6) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf1 + 5);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf1 < 0 && resultSf2 >= 0 && resultSf3 < 0) {
                        const newText = selectedText.slice(0, resultSf2 + 3) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf2 + 2);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf3 >= 0 && resultSf4 < 0) {
                        const newText = selectedText.slice(0, resultSf3 + 7) + styleEffect + ' ' + selectedText.slice(resultSf3 + 7);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    } else if (resultSf3 >= 0 && resultSf4 >= 0) {
                        alert('選択した範囲のp/spanタグ内に『font-size』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
                        const newText = selectedText.slice(0, resultSf4) + styleEffect + ' ' + selectedText.slice(resultSf4 + 17);
                        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                    }
                } else {
                    alert('選択した範囲のp/spanタグ内に『font-size』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
                    const newText = selectedText.slice(0, resultS + 7) + styleEffect + selectedText.slice(resultS + 24);
                    textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
                }
            }
        }
    }

    function applyLink(contentID) {
        const url = prompt('リンク先のURLを入力してください');
        const areaID = contentID;

        disappearTray(contentID);

        if (url) {
            const textarea = document.getElementById(areaID);
            const text = textarea.value;
            const selectionStart = textarea.selectionStart;
            const selectionEnd = textarea.selectionEnd;
            const selectedText = text.substring(selectionStart, selectionEnd);
            const newText = `<a href="${url}" target="_BLANK">${selectedText}</a>`;
            textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
        }
    }

    function applyMail(contentID) {

    }

    function appearTray(tray) {
        var trayID = $(tray);
        var another_tray;
        if (tray.slice(-1) == '1') {
            another_tray = tray.slice(0, -1) + '2';
        } else if (tray.slice(-1) == '2') {
            another_tray = tray.slice(0, -1) + '1';
        }
        var another_trayID = $(another_tray);

        if (trayID.hasClass("d-none")) {
            trayID.removeClass("d-none");
            trayID.addClass("d-block");
        } else if (trayID.hasClass("d-block")) {
            trayID.removeClass("d-block");
            trayID.addClass("d-none");
        }

        if(another_trayID.hasClass("d-block")) {
            another_trayID.removeClass("d-block");
            another_trayID.addClass("d-none");
        }
    }

    function disappearTray(contentID){
        var tray1 = '#' + contentID + 'tray1';
        var tray2 = '#' + contentID + 'tray2';
        var tray1ID = $(tray1);
        var tray2ID = $(tray2);
        
        if(tray1ID.hasClass("d-block")) {
            tray1ID.removeClass("d-block");
            tray1ID.addClass("d-none");
        }

        if(tray2ID.hasClass("d-block")) {
            tray2ID.removeClass("d-block");
            tray2ID.addClass("d-none");
        }
    }
</script>