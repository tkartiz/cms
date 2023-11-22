<?php
// ========== ファイル保存先 ================
$announce_imgFolder_path = './asset/post/images/announce/';
// ========== ファイル保存先 ================
// ========= お知らせ欄と画像数の設定 ==========
$colNum = 6;
$colImgNum = 3;
// ========= お知らせ欄と画像数の設定 ==========
?>

<div>
    <div class="bg-white">
        <div class="w-100 py-2 px-2 px-sm-4" style="background-color:lightgray;">
            <h6><?php echo $announce["date"]; ?></h6>
            <h3 class="fs-3"><?php echo nl2br($announce["title"]); ?></h3>
        </div>
        <div class="p-2">
            <?php for ($i = 0; $i < $colNum; $i++) {
                $ImgCount = 0;
                for ($j = 0; $j < $colImgNum; $j++) {
                    if (!empty($announce['col' . ($i + 1) . 'Img' . ($j + 1)])) {
                        $Img[$ImgCount] = $j + 1;
                        $ImgCount = $ImgCount + 1;
                    }
                }

                if ($ImgCount == 0 && !empty($announce["content" . ($i + 1)])) {
            ?>
                    <div class="contentP">
                        <p><?php echo nl2br($announce['content' . ($i + 1)]); ?></p>
                    </div>

                <?php
                } else if ($ImgCount == 1 && !empty($announce["content" . ($i + 1)])) {
                    $ImgWidth = $announce["col" . ($i + 1) . "Img" . $Img[$ImgCount - 1] . "Width"];
                    $ImgWidth_num = (int)explode('-', $ImgWidth)[1];
                    $pWidth_num = 12 - $ImgWidth_num;
                    if ($announce["col" . ($i + 1) . "Img" . $Img[$ImgCount - 1] . "Location"] == "order-2") {
                        $p_class = "pe-3 col-12 order-2 order-sm-1 col-sm-" . $pWidth_num;
                        $img_class = "overflow-hidden h-auto col-12 order-1 order-sm-2 col-sm-" . $ImgWidth_num;
                    } else if ($announce["col" . ($i + 1) . "Img" . $Img[$ImgCount - 1] . "Location"] == "order-1") {
                        $p_class = "ps-3 col-12 order-2 order-sm-2 col-sm-" . $pWidth_num;
                        $img_class = "overflow-hidden h-auto col-12 order-1 order-sm-1 col-sm-" . $ImgWidth_num;
                    }
                    if(empty($announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1] . 'Height'])){
                        $img_style = 'width:100%';
                    } else {
                        $img_style = 'max-height:' . $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1] . 'Height'] . 'px;';
                    }
                    
                    // $img_src = $announce_imgFolder_path . $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1]].'?p=(new Date()).getTime()';
                    $img_src = $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1].'Path'].'?p=(new Date()).getTime()';
                ?>
                    <div class="d-flex flex-wrap contentP">
                        <p class="<?php echo $p_class ?>">
                            <?php echo nl2br($announce["content" . ($i + 1)]); ?>
                        </p>
                        <div class="<?php echo $img_class ?>">
                            <img class="img1" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="">
                            <p class="small p-1 px-sm-2">
                                <?php echo $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1] . 'Cap'] ?>
                            <p>
                        </div>
                    </div>
                <?php
                } else if ($ImgCount == 1 && empty($announce["content" . ($i + 1)])) {
                    $ImgWidth = $announce["col" . ($i + 1) . "Img" . $Img[$ImgCount - 1] . "Width"];
                    $ImgWidth_num = 12;
                    $img_class = "col-12 order-1 order-sm-1 col-sm-" . $ImgWidth_num;
                    $img_style = 'max-height:' . $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1] . 'Height'] . 'px;';
                    // $img_src = $announce_imgFolder_path . $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1]].'?p=(new Date()).getTime()';
                    $img_src = $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1].'Path'].'?p=(new Date()).getTime()';
                ?>
                    <div class="d-flex flex-wrap contentP">
                        <div class="<?php echo $img_class ?>">
                            <img class="object-fit-cover w-100 h-auto" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="">
                            <p class="small p-1 px-sm-2">
                                <?php echo $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1] . 'Cap'] ?>
                            <p>
                        </div>
                    </div>
                <?php
                } else if ($ImgCount == 2) {
                    $ImgHeightMin = 0;
                    $Height_array = [];
                    for ($j = 0; $j < $ImgCount; $j++) {
                        if ($announce['col' . ($i + 1) . 'Img' . $Img[$j] . 'Height'] > 0) {
                            $Height_array[] = $announce['col' . ($i + 1) . 'Img' . $Img[$j] . 'Height'];
                        }
                    }
                    if($Height_array != null) {
                        $ImgHeightMin = min($Height_array);
                        $img_style = 'max-height:' . $ImgHeightMin . 'px;';
                    }
                ?>
                    <div class="d-flex flex-wrap">
                        <?php for ($k = 0; $k < $ImgCount; $k++) {
                            if ($k == 0) {
                                $img_class = "contentP overflow-hidden h-auto col-12 col-sm-6 pe-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            } else {
                                $img_class = "contentP overflow-hidden h-auto col-12 col-sm-6 ps-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            }
                            // $img_src = $announce_imgFolder_path . $announce['col' . ($i + 1) . 'Img' . $Img[$k]].'?p=(new Date()).getTime()';
                            $img_src = $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1].'Path'].'?p=(new Date()).getTime()';
                        ?>
                            <div class="<?php echo $img_class ?>">
                                <img class="img2" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="">
                                <p class="small p-1 px-sm-2">
                                    <?php echo $announce['col' . ($i + 1) . 'Img' . $Img[$k] . 'Cap'] ?>
                                <p>
                            </div>
                        <?php } ?>
                    </div>
                <?php
                } else if ($ImgCount == 3) {
                    $ImgHeightMin = 0;
                    $Height_array = [];
                    for ($j = 0; $j < $ImgCount; $j++) {
                        if ($announce['col' . ($i + 1) . 'Img' . $Img[$j] . 'Height'] > 0) {
                            $Height_array[] = $announce['col' . ($i + 1) . 'Img' . $Img[$j] . 'Height'];
                        }
                    }
                    if($Height_array != null) {
                        $ImgHeightMin = min($Height_array);
                        $img_style = 'max-height:' . $ImgHeightMin . 'px;';
                    }
                ?>
                    <div class="d-flex flex-wrap">
                        <?php for ($k = 0; $k < $ImgCount; $k++) {
                            if ($k == 0) {
                                $img_class = "contentP overflow-hidden h-auto col-12 col-sm-4 pe-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            } else if ($k == 1) {
                                $img_class = "contentP overflow-hidden h-auto col-12 col-sm-4 px-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            } else {
                                $img_class = "contentP overflow-hidden h-auto col-12 col-sm-4 ps-sm-1 order-" . ($k + 1) . "order-sm-" . ($k + 1);
                            }
                            // $img_src = $announce_imgFolder_path . $announce['col' . ($i + 1) . 'Img' . $Img[$k]].'?p=(new Date()).getTime()';
                            $img_src = $announce['col' . ($i + 1) . 'Img' . $Img[$ImgCount - 1].'Path'].'?p=(new Date()).getTime()';
                        ?>
                            <div class="<?php echo $img_class ?>">
                                <img class="img3" style="<?php echo $img_style ?>" src="<?php echo $img_src ?>" alt="">
                                <p class="small p-1 px-sm-2">
                                    <?php echo $announce['col' . ($i + 1) . 'Img' . $Img[$k] . 'Cap'] ?>
                                <p>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>