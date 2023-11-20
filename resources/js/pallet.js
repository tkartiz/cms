window.applyStyle = function (contentID, classEffect, styleEffect) {
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

window.appearTray = function (tray) {
    var trayID = document.getElementById(tray);
    var another_tray;
    if (tray.slice(-1) == '1') {
        another_tray = tray.slice(0, -1) + '2';
    } else if (tray.slice(-1) == '2') {
        another_tray = tray.slice(0, -1) + '1';
    }
    var another_trayID = document.getElementById(another_tray);
    console.log(tray, trayID, another_tray, another_trayID);

    
    if (trayID.classList.contains("hidden")) {
        trayID.classList.remove("hidden");
        trayID.classList.add("block");
    } else if (trayID.classList.contains("block")) {
        trayID.classList.remove("block");
        trayID.classList.add("hidden");
    }

    if (another_trayID.classList.contains("block")) {
        another_trayID.classList.remove("block");
        another_trayID.classList.add("hidden");
    }
}

window.disappearTray = function (contentID) {
    var tray1 = contentID + 'tray1';
    var tray2 = contentID + 'tray2';
    var tray1ID = document.getElementById(tray1);
    var tray2ID = document.getElementById(tray2);

    if (tray1ID.classList.contains("block")) {
        tray1ID.classList.remove("block");
        tray1ID.classList.add("hidden");
    }

    if (tray2ID.classList.contains("block")) {
        tray2ID.classList.remove("block");
        tray2ID.classList.add("hidden");
    }
}

window.applyLink = function (contentID) {
    const url = prompt('リンク先のURLを入力してください');
    // disappearTray(contentID);

    if (url) {
        const textarea = document.getElementById(contentID);
        const text = textarea.value;
        const selectionStart = textarea.selectionStart;
        const selectionEnd = textarea.selectionEnd;
        const selectedText = text.substring(selectionStart, selectionEnd);
        const newText = `<a href="${url}" target="_BLANK">${selectedText}</a>`;
        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
    }
}


