<?php
// IDは、releaseとdraftで区分けする
if($mode == "draft"){
    $pre = "draft_";
    $courseNum = $pre.'course' . $course['course'];
    $detailOpenNum = $pre.'detailOpen' . $course['course'];
    $detailCloseUpNum = $pre.'detailCloseUp' . $course['course'];
    $collapseDetailNum = $pre.'collapseDetail' . $course['course'];
    $detailCloseDownNum = $pre.'detailCloseDown' . $course['course'];
} else {
    $courseNum = 'course' . $course['course'];
    $detailOpenNum = 'detailOpen' . $course['course'];
    $detailCloseUpNum = 'detailCloseUp' . $course['course'];
    $collapseDetailNum = 'collapseDetail' . $course['course'];
    $detailCloseDownNum = 'detailCloseDown' . $course['course'];
}

if($timeDelay != ""){
    $courseClass = 'section course fadeUpTrigger delay-time'.$timeDelay;
} else {
    $courseClass = 'section course';
}

?>

<section id="<?php echo $courseNum; ?>" class="section course <?php echo $courseClass; ?>" style="<?php echo 'width:' . $sectionWidth . '!important;'; ?>">
    <div class="course-inline1 contentP">
        <figure>
            <img src="<?php echo ($course_imgFolder_path . $course['title1']) ?>" alt="コースタイトル">
            <div class="higaeri_wrap">
                <img src="<?php echo ($course_imgFolder_path . $course['img1']) ?>" alt="コースイメージ">
            </div>
            <figcaption><?php echo nl2br($course['content1']) ?></figcaption>
        </figure>
    </div>
    <div class="course-inline2 contentP">
        <img src="<?php echo ($course_imgFolder_path . $course['title2']) ?>" alt="コースのコンテンツ">
        <p><?php echo nl2br($course["content2"]) ?></p>
    </div>
    <div>
        <div id="<?php echo $detailOpenNum; ?>" class="detail-open d-block">
            <img class="w-75" src="./asset/images/course/detailOpen.png" alt="もっと見るボタン画像">
        </div>
        <div id="<?php echo $detailCloseUpNum; ?>" class="detail-close d-none">
            <img class="w-75" src="./asset/images/course/detailCloseUp.png" alt="詳細を閉じるボタン画像">
        </div>
        <div id="<?php echo $collapseDetailNum; ?>" class="detail-area d-none">
            <div class="course-inline3">
                <h4>ツアー行程イメージ</h4>
                <?php
                $tableNum = "3";
                $itemNum = "15";

                for ($j = 0; $j < $tableNum; $j++) {
                    if (!empty($course['tourTable' . $j . '-title'])) {
                ?>
                        <table class="fst-table">
                            <caption class="caption-top text-center fw-bold fs-5 mb-2 pb-0 text-dark" style="border-bottom:3px solid #000;"><?php echo $course['tourTable' . $j . '-title']  ?></caption>
                            <?php for ($i = 0; $i < $itemNum; $i++) { ?>
                                <tr>
                                    <td><?php echo $course['tourTable' . $j . '-time' . $i] ?></td>
                                    <td><?php echo nl2br($course['tourTable' . $j . '-item' . $i]) ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                <?php
                    }
                }
                ?>
            </div>
            <div class="course-inline4">
                <div class="course-image contentP">
                    <?php if (!empty($course['photo1'])) { ?>
                        <div class="<?php echo $course['photo1Type'] ?>">
                            <img src="<?php echo ($course_imgFolder_path . $course['photo1']) ?>" alt="">
                            <p><?php echo nl2br($course['photo1Cap']) ?></p>
                            <p><?php echo nl2br($course['photo1text']) ?></p>
                        </div>
                    <?php } ?>
                    <?php if (!empty($course['photo2'])) { ?>
                        <div class="<?php echo $course['photo2Type'] ?>">
                            <img src="<?php echo ($course_imgFolder_path . $course['photo2']) ?>" alt="">
                            <p><?php echo nl2br($course['photo2Cap']) ?></p>
                            <p><?php echo nl2br($course['photo2text']) ?></p>
                        </div>
                    <?php } ?>
                    <?php if (!empty($course['photo3'])) { ?>
                        <div class="<?php echo $course['photo3Type'] ?>">
                            <img src="<?php echo ($course_imgFolder_path . $course['photo3']) ?>" alt="">
                            <p><?php echo nl2br($course['photo3Cap']) ?></p>
                            <p><?php echo nl2br($course['photo3text']) ?></p>
                        </div>
                    <?php } ?>
                    <?php if (!empty($course['photo4'])) { ?>
                        <div class="<?php echo $course['photo4Type'] ?>">
                            <img src="<?php echo ($course_imgFolder_path . $course['photo4']) ?>" alt="">
                            <p><?php echo nl2br($course['photo4Cap']) ?></p>
                            <p><?php echo nl2br($course['photo4text']) ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="course-inline5 contentP">
                <img src="<?php echo ($course_imgFolder_path . $course['title3']) ?>" alt="参加条件">
                <p><?php echo nl2br($course['content3']) ?></p>
            </div>
        </div>
        <a id="<?php echo $detailCloseDownNum; ?>" class="detail-close d-none" href="<?php echo '#detailOpen' . $course['course'] ?>">
            <img class="w-75" src="./asset/images/course/detailCloseDown.png" alt="詳細を閉じるボタン画像">
        </a>
        <div class="forms course-inline6">
            <a href="<?php echo $course['link'] ?>" target="_blank">
                <img class="button" src="<?php echo ($course_imgFolder_path . $course['reqbutton']) ?>" alt="申し込みフォーム"></a>
        </div>
    </div>

</section>