var unit = 100,
    canvasList, // キャンバスの配列
    info = {}, // 全キャンバス共通の描画情報
    colorList; // 各キャンバスの色情報

/**
 * Init function.
 * 
 * Initialize variables and begin the animation.
 */

function init() {
    info.seconds = 0;
    info.t = 0;
    canvasList = [];
    colorList = [];

    // canvas1個めの色指定
    canvasList.push(document.getElementById("waveCanvasFooter"));
    colorList.push(['#24b5f5']);

    // canvas2個めの色指定
    canvasList.push(document.getElementById("waveCanvasTop"));
    colorList.push(['#f5f5f5']);

    // 各キャンバスの初期化
    for (var canvasIndex in canvasList) {
        var canvas = canvasList[canvasIndex];
        canvas.width = document.documentElement.clientWidth; //Canvasのwidthをウィンドウの幅に合わせる
        if (canvas.width < 376) { //波の高さ
            canvas.height = 30;
            zoom = 2;
        } else if (canvas.width < 993) {
            canvas.height = 40;
            zoom = 2;
        } else if (canvas.width < 1401) {
            canvas.height = 30;
            zoom = 2;
        } else {
            canvas.height = 40;
            zoom = 2;
        }

        canvas.contextCache = canvas.getContext("2d");
    }
    // 共通の更新処理呼び出し
    update();
}