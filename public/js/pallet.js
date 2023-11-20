/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/pallet.js ***!
  \********************************/
window.applyStyle = function (contentID, classEffect, styleEffect) {
  var areaID = contentID;
  var textarea = document.getElementById(areaID);
  var text = textarea.value;
  var selectionStart = textarea.selectionStart;
  var selectionEnd = textarea.selectionEnd;
  var selectedText = text.substring(selectionStart, selectionEnd);
  disappearTray(contentID);
  if (classEffect != "" && styleEffect == "") {
    if (classEffect == 'text-left' || classEffect == 'text-center' || classEffect == 'text-right') {
      var resultC = selectedText.indexOf('<p class="');
      if (resultC < 0) {
        var newText = '<p class="' + classEffect + '">' + selectedText + '</p>';
        textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
      } else {
        var resultCf1 = selectedText.indexOf('text-left');
        var resultCf2 = selectedText.indexOf('text-center');
        var resultCf3 = selectedText.indexOf('text-right');
        if (resultCf1 < 0 && resultCf2 < 0 && resultCf3 < 0) {
          alert('選択した範囲のpタグ内に『text-』クラスは見つかりませんでした。');
          var _newText = selectedText.slice(0, resultC + 10) + classEffect + selectedText.slice(resultC + 10);
          textarea.value = text.slice(0, selectionStart) + _newText + text.slice(selectionEnd);
        } else if (resultCf1 >= 0 && resultCf2 < 0 && resultCf3 < 0) {
          alert('選択した範囲のpタグ内に『text-left』クラスが見つかりましたので置き換えます。');
          var _newText2 = selectedText.slice(0, resultCf1) + classEffect + selectedText.slice(resultCf1 + 9);
          textarea.value = text.slice(0, selectionStart) + _newText2 + text.slice(selectionEnd);
        } else if (resultCf1 < 0 && resultCf2 >= 0 && resultCf3 < 0) {
          alert('選択した範囲のpタグ内に『text-center』クラスが見つかりましたので置き換えます。');
          var _newText3 = selectedText.slice(0, resultCf2) + classEffect + selectedText.slice(resultCf2 + 11);
          textarea.value = text.slice(0, selectionStart) + _newText3 + text.slice(selectionEnd);
        } else if (resultCf1 < 0 && resultCf2 < 0 && resultCf3 >= 0) {
          alert('選択した範囲のpタグ内に『text-right』クラスが見つかりましたので置き換えます。');
          var _newText4 = selectedText.slice(0, resultCf3) + classEffect + selectedText.slice(resultCf3 + 10);
          textarea.value = text.slice(0, selectionStart) + _newText4 + text.slice(selectionEnd);
        }
      }
      ;
    } else {
      var _resultC = selectedText.indexOf('class="');
      if (_resultC < 0) {
        var _resultCf = selectedText.indexOf('<span style="');
        var _resultCf2 = selectedText.indexOf('<p style="');
        if (_resultCf < 0 && _resultCf2 < 0) {
          var _newText5 = '<span class="' + classEffect + '">' + selectedText + '</span>';
          textarea.value = text.slice(0, selectionStart) + _newText5 + text.slice(selectionEnd);
        } else if (_resultCf >= 0 && _resultCf2 < 0) {
          var _newText6 = selectedText.slice(0, _resultCf + 6) + 'class="' + classEffect + '" ' + selectedText.slice(_resultCf + 6);
          textarea.value = text.slice(0, selectionStart) + _newText6 + text.slice(selectionEnd);
        } else if (_resultCf < 0 && _resultCf2 >= 0 || _resultCf >= 0 && _resultCf2 >= 0) {
          var _newText7 = selectedText.slice(0, _resultCf2 + 3) + 'class="' + classEffect + '" ' + selectedText.slice(_resultCf2 + 3);
          textarea.value = text.slice(0, selectionStart) + _newText7 + text.slice(selectionEnd);
        }
      } else {
        var _resultCf3 = selectedText.indexOf('<span');
        var _resultCf4 = selectedText.indexOf('<p');
        if (_resultCf3 >= 0 && _resultCf4 < 0 || _resultCf3 < 0 && _resultCf4 >= 0) {
          alert('選択した範囲のp/spanタグ内に『class』が見つかりました。\r\n今回の効果は、そちらに統合します。');
          var _newText8 = selectedText.slice(0, _resultC + 7) + classEffect + ' ' + selectedText.slice(_resultC + 7);
          textarea.value = text.slice(0, selectionStart) + _newText8 + text.slice(selectionEnd);
        } else if (_resultCf3 >= 0 && _resultCf4 >= 0) {
          alert('選択した範囲のpタグ内に『class』が見つかりました。\r\n今回の効果は、そちらに統合します。');
          var _newText9 = selectedText.slice(0, _resultC + 7) + classEffect + ' ' + selectedText.slice(_resultC + 7);
          textarea.value = text.slice(0, selectionStart) + _newText9 + text.slice(selectionEnd);
        }
      }
      ;
    }
  } else if (classEffect == "" && styleEffect != "") {
    var effect1 = styleEffect.indexOf('color:');
    var effect2 = styleEffect.indexOf('background:');
    var effect3 = styleEffect.indexOf('font-size:');
    if (effect1 >= 0 && effect2 < 0 && effect3 < 0) {
      var resultS = selectedText.indexOf('style="color:');
      if (resultS < 0) {
        var resultSf1 = selectedText.indexOf('<span');
        var resultSf2 = selectedText.indexOf('<p');
        var resultSf3 = selectedText.indexOf('style="');
        var resultSf4 = selectedText.indexOf('color:');
        if (resultSf1 < 0 && resultSf2 < 0 && resultSf3 < 0) {
          var _newText10 = '<span style="' + styleEffect + '">' + selectedText + '</span>';
          textarea.value = text.slice(0, selectionStart) + _newText10 + text.slice(selectionEnd);
        } else if (resultSf1 >= 0 && resultSf2 < 0 && resultSf3 < 0) {
          var _newText11 = selectedText.slice(0, resultSf1 + 6) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf1 + 5);
          textarea.value = text.slice(0, selectionStart) + _newText11 + text.slice(selectionEnd);
        } else if (resultSf1 < 0 && resultSf2 >= 0 && resultSf3 < 0) {
          var _newText12 = selectedText.slice(0, resultSf2 + 3) + 'style="' + styleEffect + '" ' + selectedText.slice(resultSf2 + 2);
          textarea.value = text.slice(0, selectionStart) + _newText12 + text.slice(selectionEnd);
        } else if (resultSf3 >= 0 && resultSf4 < 0) {
          var _newText13 = selectedText.slice(0, resultSf3 + 7) + styleEffect + ' ' + selectedText.slice(resultSf3 + 7);
          textarea.value = text.slice(0, selectionStart) + _newText13 + text.slice(selectionEnd);
        } else if (resultSf3 >= 0 && resultSf4 >= 0) {
          alert('選択した範囲のp/spanタグ内に『color』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
          var _newText14 = selectedText.slice(0, resultSf4) + styleEffect + ' ' + selectedText.slice(resultSf4 + 14);
          textarea.value = text.slice(0, selectionStart) + _newText14 + text.slice(selectionEnd);
        }
      } else {
        alert('選択した範囲のp/spanタグ内に『color』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
        var _newText15 = selectedText.slice(0, resultS + 7) + styleEffect + ' ' + selectedText.slice(resultS + 21);
        textarea.value = text.slice(0, selectionStart) + _newText15 + text.slice(selectionEnd);
      }
    } else if (effect1 < 0 && effect2 >= 0 && effect3 < 0) {
      var _resultS = selectedText.indexOf('style="background:');
      if (_resultS < 0) {
        var _resultSf = selectedText.indexOf('<span');
        var _resultSf2 = selectedText.indexOf('<p');
        var _resultSf3 = selectedText.indexOf('style="');
        var _resultSf4 = selectedText.indexOf('background:');
        if (_resultSf < 0 && _resultSf2 < 0 && _resultSf3 < 0) {
          var _newText16 = '<span style="' + styleEffect + '">' + selectedText + '</span>';
          textarea.value = text.slice(0, selectionStart) + _newText16 + text.slice(selectionEnd);
        } else if (_resultSf >= 0 && _resultSf2 < 0 && _resultSf3 < 0) {
          var _newText17 = selectedText.slice(0, _resultSf + 6) + 'style="' + styleEffect + '" ' + selectedText.slice(_resultSf + 5);
          textarea.value = text.slice(0, selectionStart) + _newText17 + text.slice(selectionEnd);
        } else if (_resultSf < 0 && _resultSf2 >= 0 && _resultSf3 < 0) {
          var _newText18 = selectedText.slice(0, _resultSf2 + 3) + 'style="' + styleEffect + '" ' + selectedText.slice(_resultSf2 + 2);
          textarea.value = text.slice(0, selectionStart) + _newText18 + text.slice(selectionEnd);
        } else if (_resultSf3 >= 0 && _resultSf4 < 0) {
          var _newText19 = selectedText.slice(0, _resultSf3 + 7) + styleEffect + ' ' + selectedText.slice(_resultSf3 + 7);
          textarea.value = text.slice(0, selectionStart) + _newText19 + text.slice(selectionEnd);
        } else if (_resultSf3 >= 0 && _resultSf4 >= 0) {
          alert('選択した範囲のp/spanタグ内に『background & padding』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
          var _newText20 = selectedText.slice(0, _resultSf4) + styleEffect + ' ' + selectedText.slice(_resultSf4 + 71);
          textarea.value = text.slice(0, selectionStart) + _newText20 + text.slice(selectionEnd);
        }
      } else {
        alert('選択した範囲のp/spanタグ内に『background & padding』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
        var _newText21 = selectedText.slice(0, _resultS + 7) + styleEffect + selectedText.slice(_resultS + 78);
        textarea.value = text.slice(0, selectionStart) + _newText21 + text.slice(selectionEnd);
      }
    } else if (effect1 < 0 && effect2 < 0 && effect3 >= 0) {
      var _resultS2 = selectedText.indexOf('style="font-size:');
      if (_resultS2 < 0) {
        var _resultSf5 = selectedText.indexOf('<span');
        var _resultSf6 = selectedText.indexOf('<p');
        var _resultSf7 = selectedText.indexOf('style="');
        var _resultSf8 = selectedText.indexOf('font-size:');
        if (_resultSf5 < 0 && _resultSf6 < 0 && _resultSf7 < 0) {
          var _newText22 = '<span style="' + styleEffect + '">' + selectedText + '</span>';
          textarea.value = text.slice(0, selectionStart) + _newText22 + text.slice(selectionEnd);
        } else if (_resultSf5 >= 0 && _resultSf6 < 0 && _resultSf7 < 0) {
          var _newText23 = selectedText.slice(0, _resultSf5 + 6) + 'style="' + styleEffect + '" ' + selectedText.slice(_resultSf5 + 5);
          textarea.value = text.slice(0, selectionStart) + _newText23 + text.slice(selectionEnd);
        } else if (_resultSf5 < 0 && _resultSf6 >= 0 && _resultSf7 < 0) {
          var _newText24 = selectedText.slice(0, _resultSf6 + 3) + 'style="' + styleEffect + '" ' + selectedText.slice(_resultSf6 + 2);
          textarea.value = text.slice(0, selectionStart) + _newText24 + text.slice(selectionEnd);
        } else if (_resultSf7 >= 0 && _resultSf8 < 0) {
          var _newText25 = selectedText.slice(0, _resultSf7 + 7) + styleEffect + ' ' + selectedText.slice(_resultSf7 + 7);
          textarea.value = text.slice(0, selectionStart) + _newText25 + text.slice(selectionEnd);
        } else if (_resultSf7 >= 0 && _resultSf8 >= 0) {
          alert('選択した範囲のp/spanタグ内に『font-size』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
          var _newText26 = selectedText.slice(0, _resultSf8) + styleEffect + ' ' + selectedText.slice(_resultSf8 + 17);
          textarea.value = text.slice(0, selectionStart) + _newText26 + text.slice(selectionEnd);
        }
      } else {
        alert('選択した範囲のp/spanタグ内に『font-size』が見つかりました。\r\n今回の効果は、そちらと入替えします。');
        var _newText27 = selectedText.slice(0, _resultS2 + 7) + styleEffect + selectedText.slice(_resultS2 + 24);
        textarea.value = text.slice(0, selectionStart) + _newText27 + text.slice(selectionEnd);
      }
    }
  }
};
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
};
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
};
window.applyLink = function (contentID) {
  var url = prompt('リンク先のURLを入力してください');
  // disappearTray(contentID);

  if (url) {
    var textarea = document.getElementById(contentID);
    var text = textarea.value;
    var selectionStart = textarea.selectionStart;
    var selectionEnd = textarea.selectionEnd;
    var selectedText = text.substring(selectionStart, selectionEnd);
    var newText = "<a href=\"".concat(url, "\" target=\"_BLANK\">").concat(selectedText, "</a>");
    textarea.value = text.slice(0, selectionStart) + newText + text.slice(selectionEnd);
  }
};
/******/ })()
;