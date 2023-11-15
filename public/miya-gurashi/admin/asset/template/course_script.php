<script>
    /* =============================================================== */
    /*　選べる３コース*/
    /* =============================================================== */
    // ======= 横並びの要素の高さ統一動作設定 （releaseとdraft共通）=======
    window.onload = function() {
        heightControl();
        draft_heightControl();
    }

    // ======= 横並びの要素の高さ統一関数（「もっと見る」範囲以外）（release用）=======
    function heightControl() {
        const mediaQuery = window.matchMedia('(min-width: 1200px)')
        let inlineNum = [0, 1, 5];
        if (mediaQuery.matches) {
            course_maxHeight = [];
            inlineNum.forEach(function(j) {
                course_height = [];
                tmp_array = [];
                for (let i = 0; i < param['courseNum']; i++) {
                    let $elem = '#course' + (i + 1) + ' .course-inline' + (j + 1);
                    course_height[i] = document.querySelector($elem).clientHeight;
                    console.log((i + 1) + ' : ' + course_height[i] + 'px');
                    tmp_array.push(course_height[i]);
                }

                course_maxHeight[j] = Math.max(...tmp_array);
                console.log('Ave. : ' + course_maxHeight[j] + 'px');

                for (let i = 0; i < param['courseNum']; i++) {
                    let $elem = '#course' + (i + 1) + ' .course-inline' + (j + 1);
                    var courseInline = document.querySelector($elem);
                    courseInline.style.height = course_maxHeight[j] + 'px';
                }
            })
        } else {
            inlineNum.forEach(function(j) {
                for (let i = 0; i < param['courseNum']; i++) {
                    let $elem = '#course' + (i + 1) + ' .course-inline' + (j + 1);
                    var courseInline = document.querySelector($elem);
                    courseInline.style.height = 'auto';
                }
            })
        }
    }

    // ======= 横並びの要素の高さ統一関数（「もっと見る」範囲）（release用） =======
    function collapseHeightControl() {
        const mediaQuery = window.matchMedia('(min-width: 1200px)')
        if (mediaQuery.matches) {
            course_maxHeight = [];
            for (let j = 2; j < 5; j++) {
                course_height = [];
                tmp_array = [];
                for (let i = 0; i < param['courseNum']; i++) {
                    let $elem = '#collapseDetail' + (i + 1) + ' .course-inline' + (j + 1);
                    course_height[i] = document.querySelector($elem).clientHeight;
                    console.log((i + 1) + ' : ' + course_height[i] + 'px');
                    tmp_array.push(course_height[i]);
                }

                course_maxHeight[j] = Math.max(...tmp_array);
                console.log('Ave. : ' + course_maxHeight[j] + 'px');

                for (let i = 0; i < param['courseNum']; i++) {
                    let $elem = '#collapseDetail' + (i + 1) + ' .course-inline' + (j + 1);
                    var courseInline = document.querySelector($elem);
                    courseInline.style.height = course_maxHeight[j] + 'px';
                }
            }
        } else {
            for (let j = 2; j < 5; j++) {
                for (let i = 0; i < param['courseNum']; i++) {
                    let $elem = '#collapseDetail' + (i + 1) + ' .course-inline' + (j + 1);
                    var courseInline = document.querySelector($elem);
                    courseInline.style.height = 'auto';
                }
            }
        }
    }

    // ======= コース数引き渡し（php->javascript）（releaseとdraft共通）=======
    var param = JSON.parse('<?php echo $param_json; ?>');

    // ======= 「もっと見る」ボタン動作関数 （releaseとdraft共通）=======
    function Btn_control(elem, className) {
        elem.classList.add(className);
        if (className === "d-none") {
            elem.classList.remove("d-block");
        } else if (className === "d-block") {
            elem.classList.remove("d-none");
        }
    }

    // ======= 「もっと見る」ボタン動作設定(release用) =======
    const mediaQuery = window.matchMedia('(min-width: 1200px)')
    const vale = document.getElementById("course-vale");
    const n = param['courseNum'];
    var wholeArea = [];
    var openBtn = [];
    var closeBtnUp = [];
    var closeBtnDown = [];
    var area = [];
    for (let i = 0; i < n; i++) {
        wholeArea[i] = document.getElementById("course" + (i + 1));
        openBtn[i] = document.getElementById("detailOpen" + (i + 1));
        closeBtnUp[i] = document.getElementById("detailCloseUp" + (i + 1));
        closeBtnDown[i] = document.getElementById("detailCloseDown" + (i + 1));
        area[i] = document.getElementById("collapseDetail" + (i + 1));
    }

    for (let i = 0; i < n; i++) {
        openBtn[i].addEventListener('click', function() {
            if (mediaQuery.matches) { // 3列（画面幅1200px以上）の時
                if (area[i].classList.contains("d-none")) {
                    // 全コース詳細を表示し、選択コースを最前面に配置する
                    for (let j = 0; j < n; j++) {
                        Btn_control(area[j], "d-block");
                        if (j == i) {
                            wholeArea[j].style.zIndex = '200';
                        }
                        Btn_control(openBtn[j], "d-none"); // 「もっと見る」ボタンの非表示化
                        Btn_control(closeBtnUp[j], "d-block"); // 「詳細を閉じる」ボタン（上側）の表示化
                        Btn_control(closeBtnDown[j], "d-block"); // 「詳細を閉じる」ボタン（下側）の表示化
                    }
                    collapseHeightControl(); // 表示部分の統一高さ計算（miya-gurashi.js内に記載）
                    // Btn_control(vale, "d-block"); // コース領域に幕をかける（表示対象コース以外）
                }
            } else {
                if (area[i].classList.contains("d-none")) {
                    // 選択以外のコースの詳細は閉じる
                    for (let j = 0; j < n; j++) {
                        if (j == i) {
                            Btn_control(area[j], "d-block");
                            Btn_control(openBtn[j], "d-none"); // 「もっと見る」ボタンの非表示化
                            Btn_control(closeBtnUp[j], "d-block"); // 「詳細を閉じる」ボタン（上側）の表示化
                            Btn_control(closeBtnDown[j], "d-block"); // 「詳細を閉じる」ボタン（下側）の表示化                            
                        } else {
                            Btn_control(area[j], "d-none");
                            Btn_control(openBtn[j], "d-block"); // 「もっと見る」ボタンの非表示化
                            Btn_control(closeBtnUp[j], "d-none"); // 「詳細を閉じる」ボタン（上側）の表示化
                            Btn_control(closeBtnDown[j], "d-none"); // 「詳細を閉じる」ボタン（下側）の表示化
                        }
                    }
                    collapseHeightControl(); // 表示部分の統一高さ計算（miya-gurashi.js内に記載）
                }
            }
        })

        closeBtnUp[i].addEventListener('click', function() {
            if (mediaQuery.matches) { // 3列（画面幅1200px以上）の時
                if (area[i].classList.contains("d-block")) {
                    // 全コース詳細を表示し、選択コースを最前面に配置する
                    for (let j = 0; j < n; j++) {
                        Btn_control(area[j], "d-none");
                        if (j == i) {
                            wholeArea[j].style.zIndex = null;
                        }
                        Btn_control(openBtn[j], "d-block"); // 「もっと見る」ボタンの表示化
                        Btn_control(closeBtnUp[j], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                        Btn_control(closeBtnDown[j], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                    }
                    // Btn_control(vale, "d-none"); // コース領域に幕をとる
                }
            } else {
                if (area[i].classList.contains("d-block")) {
                    Btn_control(area[i], "d-none");
                    Btn_control(openBtn[i], "d-block"); // 「もっと見る」ボタンの表示化
                    Btn_control(closeBtnUp[i], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                    Btn_control(closeBtnDown[i], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                }
            }
        })

        closeBtnDown[i].addEventListener('click', function() {
            if (mediaQuery.matches) { // 3列（画面幅1200px以上）の時
                if (area[i].classList.contains("d-block")) {
                    // 全コース詳細を表示し、選択コースを最前面に配置する
                    for (let j = 0; j < n; j++) {
                        Btn_control(area[j], "d-none");
                        if (j == i) {
                            wholeArea[j].style.zIndex = null;
                        }
                        Btn_control(openBtn[j], "d-block"); // 「もっと見る」ボタンの表示化
                        Btn_control(closeBtnUp[j], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                        Btn_control(closeBtnDown[j], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                    }
                    // Btn_control(vale, "d-none"); // コース領域に幕をとる
                }
            } else {
                if (area[i].classList.contains("d-block")) {
                    Btn_control(area[i], "d-none");
                    Btn_control(openBtn[i], "d-block"); // 「もっと見る」ボタンの表示化
                    Btn_control(closeBtnUp[i], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                    Btn_control(closeBtnDown[i], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                }
            }
        })
    }






    // ======= 横並びの要素の高さ統一関数（「もっと見る」範囲以外）（draft用）=======
    function draft_heightControl() {
        const mediaQuery = window.matchMedia('(min-width: 1200px)')
        let inlineNum = [0, 1, 5];
        if (mediaQuery.matches) {
            draft_course_maxHeight = [];
            inlineNum.forEach(function(j) {
                draft_course_height = [];
                tmp_array = [];
                for (let i = 0; i < param['draft_courseNum']; i++) {
                    let $elem = '#draft_course' + (i + 1) + ' .course-inline' + (j + 1);
                    draft_course_height[i] = document.querySelector($elem).clientHeight;
                    console.log((i + 1) + ' : ' + draft_course_height[i] + 'px');
                    tmp_array.push(draft_course_height[i]);
                }

                draft_course_maxHeight[j] = Math.max(...tmp_array);
                console.log('Ave. : ' + draft_course_maxHeight[j] + 'px');

                for (let i = 0; i < param['draft_courseNum']; i++) {
                    let $elem = '#draft_course' + (i + 1) + ' .course-inline' + (j + 1);
                    var draft_courseInline = document.querySelector($elem);
                    draft_courseInline.style.height = draft_course_maxHeight[j] + 'px';
                }
            })
        } else {
            inlineNum.forEach(function(j) {
                for (let i = 0; i < param['draft_courseNum']; i++) {
                    let $elem = '#draft_course' + (i + 1) + ' .course-inline' + (j + 1);
                    var draft_courseInline = document.querySelector($elem);
                    draft_courseInline.style.height = 'auto';
                }
            })
        }
    }

    // ======= 横並びの要素の高さ統一関数（「もっと見る」範囲）（draft用） =======
    function draft_collapseHeightControl() {
        const mediaQuery = window.matchMedia('(min-width: 1200px)')
        if (mediaQuery.matches) {
            draft_course_maxHeight = [];
            for (let j = 2; j < 5; j++) {
                draft_course_height = [];
                tmp_array = [];
                for (let i = 0; i < param['draft_courseNum']; i++) {
                    let $elem = '#draft_collapseDetail' + (i + 1) + ' .course-inline' + (j + 1);
                    draft_course_height[i] = document.querySelector($elem).clientHeight;
                    console.log((i + 1) + ' : ' + draft_course_height[i] + 'px');
                    tmp_array.push(draft_course_height[i]);
                }
                draft_course_maxHeight[j] = Math.max(...tmp_array);
                console.log('Ave. : ' + draft_course_maxHeight[j] + 'px');

                for (let i = 0; i < param['draft_courseNum']; i++) {
                    let $elem = '#draft_collapseDetail' + (i + 1) + ' .course-inline' + (j + 1);
                    var draft_courseInline = document.querySelector($elem);
                    draft_courseInline.style.height = draft_course_maxHeight[j] + 'px';
                }
            }
        } else {
            for (let j = 2; j < 5; j++) {
                for (let i = 0; i < param['draft_courseNum']; i++) {
                    let $elem = '#draft_collapseDetail' + (i + 1) + ' .course-inline' + (j + 1);
                    var draft_courseInline = document.querySelector($elem);
                    draft_courseInline.style.height = 'auto';
                }
            }
        }
    }

    // ======= 「もっと見る」ボタン動作設定(draft用) =======
    const dn = param['draft_courseNum'];
    var draft_wholeArea = [];
    var draft_openBtn = [];
    var draft_closeBtnUp = [];
    var draft_closeBtnDown = [];
    var draft_area = [];
    for (let i = 0; i < dn; i++) {
        draft_wholeArea[i] = document.getElementById("draft_course" + (i + 1));
        draft_openBtn[i] = document.getElementById("draft_detailOpen" + (i + 1));
        draft_closeBtnUp[i] = document.getElementById("draft_detailCloseUp" + (i + 1));
        draft_closeBtnDown[i] = document.getElementById("draft_detailCloseDown" + (i + 1));
        draft_area[i] = document.getElementById("draft_collapseDetail" + (i + 1));
    }

    for (let i = 0; i < dn; i++) {
        draft_openBtn[i].addEventListener('click', function() {
            if (mediaQuery.matches) { // 3列（画面幅1200px以上）の時
                if (draft_area[i].classList.contains("d-none")) {
                    // 全コース詳細を表示し、選択コースを最前面に配置する
                    for (let j = 0; j < dn; j++) {
                        Btn_control(draft_area[j], "d-block");
                        if (j == i) {
                            draft_wholeArea[j].style.zIndex = '200';
                        }
                        Btn_control(draft_openBtn[j], "d-none"); // 「もっと見る」ボタンの非表示化
                        Btn_control(draft_closeBtnUp[j], "d-block"); // 「詳細を閉じる」ボタン（上側）の表示化
                        Btn_control(draft_closeBtnDown[j], "d-block"); // 「詳細を閉じる」ボタン（下側）の表示化
                    }
                    draft_collapseHeightControl(); // 表示部分の統一高さ計算（miya-gurashi.js内に記載）
                }
            } else {
                if (draft_area[i].classList.contains("d-none")) {
                    // 選択以外のコースの詳細は閉じる
                    for (let j = 0; j < dn; j++) {
                        if (j == i) {
                            Btn_control(draft_area[j], "d-block");
                            Btn_control(draft_openBtn[j], "d-none"); // 「もっと見る」ボタンの非表示化
                            Btn_control(draft_closeBtnUp[j], "d-block"); // 「詳細を閉じる」ボタン（上側）の表示化
                            Btn_control(draft_closeBtnDown[j], "d-block"); // 「詳細を閉じる」ボタン（下側）の表示化                            
                        } else {
                            Btn_control(draft_area[j], "d-none");
                            Btn_control(draft_openBtn[j], "d-block"); // 「もっと見る」ボタンの非表示化
                            Btn_control(draft_closeBtnUp[j], "d-none"); // 「詳細を閉じる」ボタン（上側）の表示化
                            Btn_control(draft_closeBtnDown[j], "d-none"); // 「詳細を閉じる」ボタン（下側）の表示化
                        }
                    }
                    draft_collapseHeightControl(); // 表示部分の統一高さ計算（miya-gurashi.js内に記載）
                }
            }
        })

        draft_closeBtnUp[i].addEventListener('click', function() {
            if (mediaQuery.matches) { // 3列（画面幅1200px以上）の時
                if (draft_area[i].classList.contains("d-block")) {
                    // 全コース詳細を表示し、選択コースを最前面に配置する
                    for (let j = 0; j < dn; j++) {
                        Btn_control(draft_area[j], "d-none");
                        if (j == i) {
                            draft_wholeArea[j].style.zIndex = null;
                        }
                        Btn_control(draft_openBtn[j], "d-block"); // 「もっと見る」ボタンの表示化
                        Btn_control(draft_closeBtnUp[j], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                        Btn_control(draft_closeBtnDown[j], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                    }
                }
            } else {
                if (draft_area[i].classList.contains("d-block")) {
                    Btn_control(draft_area[i], "d-none");
                    Btn_control(draft_openBtn[i], "d-block"); // 「もっと見る」ボタンの表示化
                    Btn_control(draft_closeBtnUp[i], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                    Btn_control(draft_closeBtnDown[i], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                }
            }
        })

        draft_closeBtnDown[i].addEventListener('click', function() {
            if (mediaQuery.matches) { // 3列（画面幅1200px以上）の時
                if (draft_area[i].classList.contains("d-block")) {
                    // 全コース詳細を表示し、選択コースを最前面に配置する
                    for (let j = 0; j < dn; j++) {
                        Btn_control(draft_area[j], "d-none");
                        if (j == i) {
                            draft_wholeArea[j].style.zIndex = null;
                        }
                        Btn_control(draft_openBtn[j], "d-block"); // 「もっと見る」ボタンの表示化
                        Btn_control(draft_closeBtnUp[j], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                        Btn_control(draft_closeBtnDown[j], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                    }
                }
            } else {
                if (draft_area[i].classList.contains("d-block")) {
                    Btn_control(draft_area[i], "d-none");
                    Btn_control(draft_openBtn[i], "d-block"); // 「もっと見る」ボタンの表示化
                    Btn_control(draft_closeBtnUp[i], "d-none"); // 「詳細を閉じる」ボタン（上側）の非表示化
                    Btn_control(draft_closeBtnDown[i], "d-none"); // 「詳細を閉じる」ボタン（下側）の非表示化
                }
            }
        })
    }
</script>