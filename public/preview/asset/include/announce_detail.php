<?php
// ========== ファイル保存先 ================
$announce_pre = '../asset';
// ========== ファイル保存先 ================
// ========= お知らせ欄と画像数の設定 ==========
$colNum = 6;
$colImgNum = 3;
// ========= お知らせ欄と画像数の設定 ==========
?>

<div>
    <div class="bg-white">
        <div class="w-100 px-5 py-4" style="background-color:#96D8F5;">
            <h4><?php echo $announce["date"]; ?></h4>
            <h3 class="fs-3"><?php echo nl2br($announce["title"]); ?></h3>
        </div>
        <div class="p-5">
            <?php for ($i = 0; $i < $colNum; $i++) { ?>
                <?php    // 画像カウントと画像がある番号の把握
                $ImgCount = 0;
                for ($j = 0; $j < $colImgNum; $j++) {
                    if (!empty($announce['col' . ($i + 1) . 'Img' . ($j + 1)])) {
                        $Img[$ImgCount] = $j + 1;
                        $ImgCount = $ImgCount + 1;
                    }
                } ?>
                <?php if ($ImgCount == 0 && !empty($announce["content" . ($i + 1)])) { ?>
                    <div class="pb-5">
                        <p><?php echo nl2br($announce['content' . ($i + 1)]); ?></p>
                    </div>
                <?php } else if ($ImgCount == 1 && !empty($announce["content" . ($i + 1)])) { ?>
                    <?php
                    $name = "col" . ($i + 1) . "Img" . $Img[$ImgCount - 1];
                    if(!is_null($announce[$name . "Width"])){
                        $ImgWidth = $announce[$name . "Width"];
                    } else {
                        $ImgWidth = 'col-12';  // 空白時は100%幅とする
                    }
                    $ImgWidth_num = (int)explode('-', $ImgWidth)[1];
                    $pWidth_num = 12 - $ImgWidth_num;
                    if ($announce[$name . "Location"] == "order-2") {
                        $p_class = "pe-5 col-12 order-2 order-sm-1 col-sm-" . $pWidth_num;
                        $img_class = "overflow-hidden h-auto col-12 order-1 order-sm-2 col-sm-" . $ImgWidth_num;
                    } else if ($announce[$name . "Location"] == "order-1") {
                        $p_class = "ps-5 col-12 order-2 order-sm-2 col-sm-" . $pWidth_num;
                        $img_class = "overflow-hidden h-auto col-12 order-1 order-sm-1 col-sm-" . $ImgWidth_num;
                    }

                    if (empty($announce[$name . 'Height'])) {
                        $img_style = 'width:100%';
                    } else {
                        $img_style = 'max-height:' . $announce[$name . 'Height'] . 'px;';
                    }

                    $img_src = $announce_pre . $announce[$name . 'Path'] . '?p=(new Date()).getTime()';
                    ?>

                    <div class="d-flex flex-wrap pb-5">
                        <p class="<?php echo $p_class ?>">
                            <?php echo nl2br($announce["content" . ($i + 1)]); ?>
                        </p>
                        <div class="<?php echo $img_class ?>">
                            <img class="img1" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="お知らせ関連画像">
                            <p class="small p-1 px-sm-2">
                                <?php echo $announce[$name . 'Cap'] ?>
                            <p>
                        </div>
                    </div>
                <?php } else if ($ImgCount == 1 && empty($announce["content" . ($i + 1)])) {
                    $name = "col" . ($i + 1) . "Img" . $Img[$ImgCount - 1];
                    $ImgWidth = $announce[$name . "Width"];
                    $ImgWidth_num = 12;
                    $img_class = "col-12 order-1 order-sm-1 col-sm-" . $ImgWidth_num;
                    $img_style = 'max-height:' . $announce[$name . 'Height'] . 'px;';
                    $img_src = $announce_pre . $announce[$name . 'Path'] . '?p=(new Date()).getTime()';
                ?>
                    <div class="d-flex flex-wrap pb-5">
                        <div class="<?php echo $img_class ?>">
                            <img class="object-fit-cover w-100 h-auto" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="お知らせ関連画像">
                            <p class="small p-1 px-sm-2">
                                <?php echo $announce[$name . 'Cap'] ?>
                            <p>
                        </div>
                    </div>
                <?php } else if ($ImgCount == 2) {
                    // 画像高さ入力があった場合に統一する
                    $ImgHeightMin = 0;
                    $Height_array = [];
                    for ($j = 0; $j < $ImgCount; $j++) {
                        $name = 'col' . ($i + 1) . 'Img' . $Img[$j];
                        if ($announce[$name . 'Height'] > 0) {
                            $Height_array[] = $announce[$name . 'Height'];
                        }
                    }
                    if ($Height_array != null) {
                        $ImgHeightMin = min($Height_array);
                        $img_style = 'max-height:' . $ImgHeightMin . 'px; width:100%; object-fit:cover; object-position:center;';
                    } else {
                        $img_style = 'width:100%; object-fit:cover; object-position:center;';
                    }
                ?>
                    <div class="d-flex flex-wrap pb-5">
                        <?php for ($k = 0; $k < $ImgCount; $k++) {
                            $name = 'col' . ($i + 1) . 'Img' . $Img[$k];
                            if ($k == 0) {
                                $img_class = "overflow-hidden h-auto col-12 col-sm-6 pe-sm-1 order-" . ($k + 1) . " order-sm-" . ($k + 1);
                            } else {
                                $img_class = "overflow-hidden h-auto col-12 col-sm-6 ps-sm-1 order-" . ($k + 1) . " order-sm-" . ($k + 1);
                            }
                            $img_src = $announce_pre . $announce[$name . 'Path'] . '?p=(new Date()).getTime()';
                        ?>
                            <div class="<?php echo $img_class ?>">
                                <img class="img2" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="お知らせ関連画像">
                                <p class="small p-1 px-sm-2">
                                    <?php echo $announce[$name . 'Cap'] ?>
                                <p>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else if ($ImgCount == 3) { ?>
                    <?php
                    // 画像高さ入力があった場合に統一する
                    $ImgHeightMin = 0;
                    $Height_array = [];
                    for ($j = 0; $j < $ImgCount; $j++) {
                        $name = 'col' . ($i + 1) . 'Img' . $Img[$j];
                        if ($announce[$name . 'Height'] > 0) {
                            $Height_array[] = $announce[$name . 'Height'];
                        }
                    }
                    if ($Height_array != null) {
                        $ImgHeightMin = min($Height_array);
                        $img_style = 'max-height:' . $ImgHeightMin . 'px; width:100%; object-fit:cover; object-position:center;';
                    } else {
                        $img_style = 'width:100%; object-fit:cover; object-position:center;';
                    }
                    ?>
                    <div class="d-flex flex-wrap pb-5">
                        <?php for ($k = 0; $k < $ImgCount; $k++) {
                            $name = 'col' . ($i + 1) . 'Img' . $Img[$k];
                            if ($k == 0) {
                                $img_class = "overflow-hidden h-auto col-12 col-sm-4 pe-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            } else if ($k == 1) {
                                $img_class = "overflow-hidden h-auto col-12 col-sm-4 px-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            } else {
                                $img_class = "overflow-hidden h-auto col-12 col-sm-4 ps-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            }
                            $img_src = $announce_pre . $announce[$name . 'Path'] . '?p=(new Date()).getTime()';
                        ?>
                            <div class="<?php echo $img_class ?>">
                                <img class="img3" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="お知らせ関連画像">
                                <p class="small p-1 px-sm-2">
                                    <?php echo $announce[$name . 'Cap'] ?>
                                <p>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>