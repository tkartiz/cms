<div class="container">
    <div class="d-flex flex-wrap justify-content-center mb-5">
        <div class="col-12 order-2 col-lg-5 order-lg-1">
            <div class="mb-3">
                <img style="width:auto; max-width:100%; max-height:110px;" src="<?php echo ($option_imgFolder_path . $option['titleImg3']) ?>" alt="タイトル画像">
            </div>
            <div><?php echo nl2br($option['content3']) ?></div>
        </div>
        <div class="col-12 order-1 col-lg-6 order-lg-2 position-relative ms-lg-5 bg-secondary overflow-hidden" style="max-height:364px; height:56.25%;">
            <img class="w-100 option-img" src="<?php echo ($option_imgFolder_path . $option['image3']) ?>" alt="画像">
            <div class="w-100 position-absolute bottom-0 start-0 bg-dark text-white text-center py-2">
                <h5 class="m-0"><?php echo $option['title3'] ?></h5>
            </div>
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-center">
        <div class="col-12 order-1 col-lg-6 position-relative me-lg-5 bg-secondary overflow-hidden " style="max-height:364px; height:56.25%;">
            <img class="w-100 option-img" src="<?php echo ($option_imgFolder_path . $option['image4']) ?>" alt="画像">
            <div class="w-100 position-absolute bottom-0 start-0 bg-dark text-white text-center py-2">
                <h5 class="m-0"><?php echo $option['title4'] ?></h5>
            </div>
        </div>
        <div class="col-12 order-2 col-lg-5">
            <div class="mb-3">
                <img style="width:auto; max-width:100%; max-height:110px;" src="<?php echo ($option_imgFolder_path . $option['titleImg4']) ?>" alt="タイトル画像">
            </div>
            <div><?php echo nl2br($option['content4']) ?></div>
        </div>
    </div>
    <div class="my-5 col-12 mx-auto">
        <div class="w-100 text-center py-2 schedule-title">
            <h2 class="m-0">開催スケジュール</h2>
        </div>
        <div class="d-flex flex-wrap">
            <div class="col-12 col-lg-6 order-1 pe-lg-5">
                <div class="w-100 my-4">
                    <div class="d-flex mb-2">
                        <p class="bg-dark text-white text-center me-3" style="width:8rem;">開催日</p>
                        <p><?php echo nl2br($option['day']) ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="bg-dark text-white text-center me-3" style="width:8rem;">開催時間</p>
                        <p><?php echo nl2br($option['hour']) ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="bg-dark text-white text-center me-3" style="width:8rem;">開催場所</p>
                        <p><?php echo nl2br($option['heldLocation']) ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="bg-dark text-white text-center me-3" style="width:8rem;">集合場所</p>
                        <p><?php echo nl2br($option['meetingLocation']) ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="bg-dark text-white text-center me-3" style="width:8rem;">駐車場の有無</p>
                        <p><?php echo nl2br($option['parking']) ?></p>
                    </div>
                    <div class="d-flex">
                        <p class="bg-dark text-white text-center me-3" style="width:8rem;">参加料金</p>
                        <p><?php echo nl2br($option['fee']) ?></p>
                    </div>
                </div>
                <div class="d-flex w-100 bg-warning align-items-center pt-2">
                    <div class="mx-3 mb-3" style="width:3rem; height:3rem;">
                        <p class="bg-dark text-white p-2 lh-sm mb-1" style="border-radius:5px;">交通<br>手段
                    </div>
                    <div style="font-size:12px;">
                        <?php if ($option['transpo1'] != "") { ?>
                            <dl class="d-flex align-items-center mb-1">
                                <dt class="me-3 text-center border border-dark px-1" style="width:4rem"><span class=""><?php echo $option['transpo1'] ?></span></dt>
                                <dd><?php echo nl2br($option['transpo1Content']) ?></dd>
                            </dl>
                        <?php }; ?>
                        <?php if ($option['transpo2'] != "") { ?>
                            <dl class="d-flex align-items-center mb-1">
                                <dt class="me-3 text-center border border-dark px-1" style="width:4rem"><span class=""><?php echo $option['transpo2'] ?></span></dt>
                                <dd><?php echo nl2br($option['transpo2Content']) ?></dd>
                            </dl>
                        <?php }; ?>
                        <?php if ($option['transpo3'] != "") { ?>
                            <dl class="d-flex align-items-center mb-1">
                                <dt class="me-3 text-center border border-dark px-1" style="width:4rem"><span class=""><?php echo $option['transpo3'] ?></span></dt>
                                <dd><?php echo nl2br($option['transpo3Content']) ?></dd>
                            </dl>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 order-2">
                <div class="w-100 mt-4">
                    <div>
                        <p class="bg-dark text-white text-center mb-1" style="width:8rem;"><?php echo $option['titleSchedule1'] ?></p>
                        <div class="mb-2"><?php echo nl2br($option['schedule1']) ?></div>
                    </div>
                    <div>
                        <p class="bg-dark text-white text-center mb-1" style="width:8rem;"><?php echo $option['titleSchedule2'] ?></p>
                        <div class="mb-2"><?php echo nl2br($option['schedule2']) ?></div>
                    </div>
                    <div>
                        <p class="bg-dark text-white text-center mb-1" style="width:8rem;"><?php echo $option['titleSchedule3'] ?></p>
                        <div class="mb-2"><?php echo nl2br($option['schedule3']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 text-center">
        <a href="./index.php#course_selection"><img class="w-75 button request" src="./asset/images/request-join.png"></a>
    </div>
</div>