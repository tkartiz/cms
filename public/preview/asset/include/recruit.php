<?php
$title_recruit_fonts = array('R', 'e', 'c', 'r', 'u', 'i', 't', 'm', 'e', 'n', 't');
$delay_time = 0.7;
?>

<section id="recruit" class="container position-relative p-0">
    <div class="recruit-img">
        <div class="title-recruit position-absolute text-end title-effect-trigger ">
            <div class="title-font title-fs d-flex mb-2">
                <?php foreach ($title_recruit_fonts as $title_recruit_font) : ?>
                    <span class="effect-inner-container" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                        <span class="effect-inner" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $title_recruit_font; ?></span>
                    </span>
                    <?php $delay_time += 0.04; ?>
                <?php endforeach; ?>
                <?php $delay_time += 0.2; ?>
            </div>
            <p class="title-fs-sub fadeIn" style="animation-delay: <?php echo $delay_time; ?>s;">出品者様募集中</p>
        </div>
        <div class="recruit-img-outer w-100 position-relative">
            <div class="recruit-img-inner position-absolute translate-middle top-50 start-50"></div>
            <div class="recruit-img-frm1 position-absolute top-0 start-0"></div>
            <div class="recruit-img-frm2 position-absolute bottom-0 end-0"></div>
        </div>
    </div>
    <div class="recruit-comment fadeIn" style="animation-delay: <?php echo $delay_time; ?>s;">
        <div class="recruit-comment-inner d-flex flex-wrap justify-content-center w-100 position-relative ih-ig fw-bold">
            <div class="recruit-comment-title position-absolute fs-3">出品者様、募集中！</div>
            <div class="col-12 px-4 px-sm-5 col-md-8 px-md-0 mx-auto mb-5">
                <p class="mb-4">
                    湘南ちがさきのオープンに合わせ<br>
                    農産品・加工品等の出品者様を広く募集<br>
                    しています！
                </p>
                <p class="mb-5">
                    出品を応募される方はオンラインフォーム<br>
                    郵送またはFAXからお申し込みください。
                </p>
                <p class="m-2">
                    <a href="inquiry/fax/">
                        <svg id="_レイヤー_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.57 23.88" style="width:auto; height:20px;">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #0a3f70;
                                        stroke-width: 0px;
                                    }
                                </style>
                            </defs>
                            <g id="_レイヤー_1-2">
                                <path class="cls-1" d="m5.67,10.85L.34,3.09C-.73,1.47.92-.56,2.72.14l25.58,9.94c1.69.66,1.69,3.06,0,3.71L2.72,23.74c-1.81.7-3.45-1.33-2.39-2.95l5.33-7.75c.44-.66.44-1.52,0-2.19Z" />
                            </g>
                        </svg>
                        FAX・郵送でのお申し込み
                    </a>
                </p>
                <p class="m-2">
                    <a href="">
                        <svg id="_レイヤー_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.57 23.88" style="width:auto; height:20px;">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #0a3f70;
                                        stroke-width: 0px;
                                    }
                                </style>
                            </defs>
                            <g id="_レイヤー_1-2">
                                <path class="cls-1" d="m5.67,10.85L.34,3.09C-.73,1.47.92-.56,2.72.14l25.58,9.94c1.69.66,1.69,3.06,0,3.71L2.72,23.74c-1.81.7-3.45-1.33-2.39-2.95l5.33-7.75c.44-.66.44-1.52,0-2.19Z" />
                            </g>
                        </svg>
                        オンラインでのお申し込み
                    </a>
                </p>
            </div>
            <div class="col-12 px-2 col-md-8 px-md-0 text-center">
                <a href="inquiry/">
                    <p class="m-2 fs-5 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 30" class="me-2" style="width:30px; height:30px;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: #0a3f70;
                                }
                            </style>
                            <path class="st0" d="M27.2,4.2H2.8C1.2,4.2,0,5.5,0,7v16c0,1.5,1.2,2.8,2.8,2.8h24.4c1.5,0,2.8-1.2,2.8-2.8V7
	C30,5.5,28.8,4.2,27.2,4.2z M25.8,11.7l-7.7,3.9c-1,0.5-2.1,0.8-3.2,0.8c-1.1,0-2.1-0.2-3.1-0.7l-7.9-4c-0.4-0.2-0.6-0.7-0.4-1.1
	c0.2-0.4,0.7-0.6,1.1-0.4l7.9,3.9c1.5,0.8,3.3,0.7,4.8,0l7.7-3.9c0.4-0.2,0.9,0,1.1,0.4C26.4,11,26.2,11.5,25.8,11.7z" />
                        </svg>
                        Contact
                    </p>
                    出品に関するお問い合わせはこちら
                </a>
            </div>
        </div>
    </div>
</section>