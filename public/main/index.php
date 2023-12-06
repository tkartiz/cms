<!doctype html>
<html lang="ja">

<?php
include "asset/include/release.php"; // 公開/非公開変数読込み
include 'asset/include/function_min.php'; // 共通関数読込み
$announces = read_Json('announce', $siteview);
if (!is_null($announces)) {
  $ids = array_column($announces, 'date');
  array_multisort($ids, SORT_DESC, $announces);
}
$count = 0; // 表示記事カウント用変数

// ABOUT・スライダー
$stores = glob('about/img/top/*');
$stores_reverse = array_reverse($stores);
$slider_height = '400px';
// ABOUT・スライダー
<<<<<<< HEAD
=======

>>>>>>> 47ccdecfe93de7bbba0e62efae7528ed4d271cbe
?>

<?php include "asset/include/head.php"; ?><!-- ヘッド -->

<body>
  <div class="w-100 position-relative overflow-hidden">
    <!-- 背景アニメーション -->
    <div id="anime" class="surfer-trace position-absolute">
      <!-- サーファー軌跡 -->
      <div class="w-100 h-100 position-relative top-0 start-0">
        <div id="surferTrace1" class="w-100 h-100 position-absolute top-0 start-0">
          <svg width="0" height="0" viewBox="0 0 1920 730">
            <g>
              <polyline points="0,0 650,0 1350,730 1920,730" fill="none" stroke="#ffffff" stroke-width="20" stroke-linejoin="round" />
            </g>
          </svg>
        </div>
        <div id="surferTrace2" class="w-100 h-100 position-absolute top-0 start-0">
          <svg width="0" height="0" viewBox="0 0 1920 730">
            <g>
              <polyline points="0,0 450,0 1200,730 1920,730" fill="none" stroke="#ffffff" stroke-width="20" stroke-linejoin="round" />
            </g>
          </svg>
        </div>
      </div>
<<<<<<< HEAD
      <!-- サーファー軌跡 -->

      <div class="surfer position-absolute" style="top:-50px;"></div> <!-- サーファー -->

      <div class="lady position-absolute" style="z-index:20; margin-top:-380px;"></div> <!-- 歩く女性 -->

      <div class="lady2 position-absolute" style="z-index:0"></div> <!-- お茶を飲む女性 -->

      <div class="gentleman position-absolute"></div> <!-- 散策する男性 -->
      <div class="child position-absolute"></div> <!-- 散策する娘 -->
    </div>
    <!-- 背景アニメーション -->

    <?php include "asset/include/header.php"; ?><!-- ヘッダー -->

    <!-- ******************************************************************* -->
    <?php include "asset/include/top.php"; ?><!-- ファーストビュー -->

    <?php include "asset/include/news_bar.php"; ?> <!-- お知らせ -->

    <?php include "asset/include/about.php"; ?> <!-- ABOUT -->

    <?php include "asset/include/sns.php"; ?> <!-- SNS -->

    <?php include "asset/include/recruit.php"; ?> <!-- 生産事業者様募集 -->

    <!-- ******************************************************************* -->

    <?php include "asset/include/footer.php"; ?><!-- フッター -->
  </div>

  <?php include "asset/include/script.php"; ?><!-- script読み込み -->

  <script>
    // section間隙間設定
    var screenWidth = $(window).width();
    if (screenWidth < 993) {
      sectionMargin = 350;
    } else {
      sectionMargin = 400;
    }
    document.documentElement.style.setProperty('--sectionMargin', sectionMargin + 'px');
    // section間隙間設定

    // 背景アニメーション位置設定
    const top_h = document.getElementById('top').clientHeight;
    const news_bar_h = document.getElementById('news_bar').clientHeight;
    const about_h = document.getElementById('about').clientHeight;
    const sns_h = document.getElementById('sns').clientHeight;
    const anime_top = top_h + news_bar_h + about_h + sectionMargin * 2 + sns_h / 2;
    document.documentElement.style.setProperty('--animeTop', anime_top + 'px');
    // 背景アニメーション位置設定

    // 背景アニメーション高さ設定
    if (screenWidth < 993 || screenWidth > 1400) {
      animeHeight = sns_h + sectionMargin;
    } else {
      animeHeight = sns_h + sectionMargin * 1.5;
    }
    document.documentElement.style.setProperty('--animeHeight', animeHeight + 'px');

    const svgHeight = 730 / 1920 * screenWidth;
    const animeHeightRatio = animeHeight / svgHeight;
    document.documentElement.style.setProperty('--animeHeightRatio', animeHeightRatio);

    // 背景アニメーション高さ設定

    console.log(animeHeight, animeHeightRatio);
  </script>
=======
      <p class="text-center" style="color:#393939;">Mohala He Li'a：ハワイ語&nbsp;＝&nbsp;夢がかなう：日本語</p>
      <img class="position-absolute end-0" style="width:80px; height:auto; bottom:40px;" src="./img/top/person3.png" alt="サーファー">
      <img class="position-absolute start-0" style="width:90px; height:auto; bottom:40px;" src="./img/top/person6.png" alt="サーファー">
    </div>
    <!-- <div class="position-absolute translate-middle text-center" style="width:40vw; height:calc(40vw * 9/16); background-color:rgb(0,0,256,0.2); top:65%; left:70%;">
      完成していく建物の外観図
    </div> -->
  </div>

  <!-- ここからお知らせ -->
  <div class="d-flex align-items-center position-relative">
    <div class="d-flex position-absolute pe-5 end-0 gap-5" style="top:-32px;">
      <a class="fw-bold border-bottom border-dark" href="event/">イベント一覧</a>
      <a class="fw-bold border-bottom border-dark" href="news/">お知らせ一覧</a>
    </div>
    <p class="title-font small px-3 pt-2 mb-0 lh-sm" style="height:50px; background-color:#F0F5F9;">EVENT<br>&NEWS</p>
    <div class="swiper overflow-hidden" style="height:50px; background-color:#F0F5F9;">
      <div class="swiper-wrapper">
        <?php if (!is_null($announces)) { ?>
          <?php foreach ($announces as $announce) : ?>
            <div class="swiper-slide pt-2 pe-3">
              <a class="text-decoration-none" href="announce.php?filename=<?php echo $announce["stamp"]; ?>">
                <p class="w-100 px-3 text-center text-truncate border-end border-2 border-info" style="width: 10rem;">
                  <?php if ($announce['item'] === "event") { ?>
                    <i class="bi bi-circle-fill" style="color:red;"></i>イベント&nbsp;
                  <?php } else { ?>
                    <i class="bi bi-circle-fill" style="color:orange;"></i>プレスリリース&nbsp;
                  <?php } ?>
                  <?php echo $announce["date"]; ?>：<?php echo $announce["title"]; ?>
                </p>
              </a>
            </div>
          <?php endforeach; ?>
        <?php } ?>
      </div>
    </div>
  </div>

  <div style="background-image: url(./img/top/image4.png); background-repeat: repeat-y;">
    <!-- ABOUT -->
    <div id="about" class="container">
      <!-- コンセプト -->
      <div class="w-100 position-relative" style="padding:120px 0;">
        <a href="about/">
          <div class="position-absolute translate-middle top-50 start-50" style="z-index:10;">
            <p class="text-center title-font mb-5 text-white" style="font-size:6rem; font-weight:900; line-height:3rem; text-shadow:rgb(0,0,0,0.3) 1px 0 10px;">ABOUT<br><span style="font-size:1.75rem;">湘南ちがさき&nbsp;について</span></p>
          </div>
          <div>
            <div class="slider2 overflow-hidden" style="height:<?php echo $slider_height; ?>;">
              <div class="swiper-wrapper">
                <?php if (!is_null($stores)) { ?>
                  <?php foreach ($stores as $store) : ?>
                    <div class="swiper-slide mt-2 me-3">
                      <div style="width:600px; height:<?php echo $slider_height; ?>;"><img class="w-100 h-100 object-fit-cover" style="object-position:center;" src="<?php echo $store ?>" alt="" loading="lazy"></div>
                    </div>
                  <?php endforeach; ?>
                <?php } ?>
              </div>
            </div>
            <div class="slider3 overflow-hidden" style="height:<?php echo $slider_height; ?>; margin-top:-8px;">
              <div class="swiper-wrapper">
                <?php if (!is_null($stores)) { ?>
                  <?php foreach ($stores_reverse as $store_reverse) : ?>
                    <div class="swiper-slide mt-2 me-3">
                      <div style="width:600px; height:<?php echo $slider_height; ?>;"><img class="w-100 h-100 object-fit-cover" style="object-position:center;" src="<?php echo $store_reverse ?>" alt="" loading="lazy"></div>
                    </div>
                  <?php endforeach; ?>
                <?php } ?>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- GUIDE -->
    <div id="guide" class="flex-container mx-auto" style="max-width:1500px;">
      <div class="w-100 position-relative" style="padding:120px 0;">

        <div class="col-6 container position-absolute" style="top:200px; left:0px;">
          <p class="text-center title-font mb-5" style="font-size:6rem; font-weight:900; line-height:3rem;">GUIDE<br><span style="font-size:1.75rem;">施設ガイド</span></p>
        </div>
        <div class="d-flex" style="margin-top:160px;">
          <div class="col-6 position-relative">
            <div class="w-100 position-absolute start-50 bottom-0 p-2" style="transform:translateX(-50%);">
              <a href="areamap/">
                <div class="text-center mx-auto py-5 px-4 border border-5 border-dark rounded" style="width:300px; background-color:rgb(256,256,256,0.6);">
                  <p class="m-0 p-0 fs-2 fw-bold mb-4">湘南ちがさき</p>
                  <p class="fs-5">営業時間・館内マップ</p>
                  <i class="bi bi-info-square" style="font-size:4rem;"></i>
                </div>
              </a>
            </div>
          </div>
          <div class="col-6 position-relative" style="height:calc(50vw * 0.618 * 0.8);">
            <div class="w-100 h-100 position-absolute text-end" style="z-index:0; background-color:orangered; opacity: 0.8; transform:translate(-8%, -3rem);">
              <p class="p-2 title-font text-white fs-2">Products & Foods</p>
            </div>
            <div class="w-100 h-100 position-absolute overflow-hidden pt-4" style="z-index:10;">
              <a href="areamap/product_food/">
                <img class="impress w-100 h-100 object-fit-cover" style="object-position: 0px;" src="./img/guide/image04.jpg" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center" style="margin-top:80px;">
          <div class="col-6 position-relative" style="height:calc(40vw * 0.618 * 0.8); margin-top:60px;">
            <div class="w-100 h-100 position-absolute d-flex align-items-end" style="z-index:0; background-color:orangered; opacity: 0.8; transform:translate(-8%, 1rem);">
              <p class="m-0 p-2 title-font text-white fs-2">Products & Foods</p>
            </div>
            <div class="w-100 h-100 position-absolute overflow-hidden" style="z-index:10;">
              <a href="areamap/product_food/">
                <img class="impress w-100 h-100 object-fit-cover" style="object-position: 0px -50px;" src="./img/guide/image06.jpg" alt="">
              </a>
            </div>
          </div>
        </div>


        <div class="d-flex justify-content-center" style="margin-top:240px;">
          <div class="col-5 position-relative" style="height:calc(41.67vw * 0.7);">
            <div class="w-75 h-100 position-absolute text-end" style="z-index:0; background-color:dodgerblue; opacity: 0.8; transform:translate(-8%, -4rem);">
              <p class="p-2 title-font text-white fs-2">"KOTO"&nbsp;Services</p>
            </div>
            <div class="w-75 h-100 position-absolute overflow-hidden" style="z-index:10; ">
              <a href="areamap/service/">
                <img class="impress w-100 h-100 object-fit-cover" style="object-position: -160px;" src="./img/guide/アートボード 17.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="col-3 position-relative">
            <div class="w-75 position-absolute end-0 top-0 p-2" style="transform:translateY(-5rem);">
              <a href="areamap/rest/">
                <div class="text-center ms-auto py-4 border border-5 rounded" style="background-color:rgb(256,256,256,0.6); border-color:palevioletred!important;">
                  <p class="m-0 p-0 fs-4 fw-bold mb-4" style="color:palevioletred;">休憩エリア<br>・広場</p>
                  <i class="bi bi-balloon-heart" style="font-size:4rem; color:palevioletred;"></i>
                </div>
              </a>
            </div>
          </div>
          <div class="col-3 position-relative">
            <div class="w-75 position-absolute end-0 bottom-0 p-2">
              <a href="areamap/rest/">
                <div class="w-100 text-center ms-auto py-4 border border-5 rounded" style="background-color:rgb(256,256,256,0.6); border-color:cadetblue!important;">
                  <p class="m-0 p-0 fs-4 fw-bold mb-4" style="color:cadetblue;">アクセス</p>
                  <i class="bi bi-geo-alt" style="font-size:4rem; color:cadetblue;"></i>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="d-flex" style="margin-top:80px;">
          <div class="col-3 position-relative"></div>
          <div class="col-5 position-relative" style="height:calc(40vw * 0.618 * 0.6); margin-top:60px;">
            <div class="w-100 h-100 position-absolute d-flex justify-content-end align-items-end" style="z-index:0; background-color:dodgerblue; opacity: 0.8; transform:translate(5%, 4rem);">
              <p class="m-0 p-2 title-font text-white fs-2">"KOTO"&nbsp;Services</p>
            </div>
            <div class="w-100 h-100 position-absolute overflow-hidden" style="z-index:10;">
              <a href="areamap/service/">
                <img class="impress w-100 h-100 object-fit-cover" style="object-position: 0px -60px;" src="./img/guide/about(14).webp" alt="">
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- SNS -->
    <div id="sns" class="container d-flex flex-wrap w-100" style="margin-top:120px; padding:120px 0;">
      <div class="col-6 ms-auto">
        <p class="text-center title-font mb-5" style="font-size:6rem; font-weight:900; line-height:3rem;">
          SNS<br><span style="font-size:1.75rem;"></span>
        </p>
      </div>
      <div class="w-100 d-flex justify-content-between align-items-start">
        <!-- Instagram -->
        <div class="col-5 text-center" style="margin:-80px 0 8rem;">
          <p class="fs-3 fw-bold text-center">Instagram～道の駅ちがさき～</p>
          <ul class="w-100 d-flex flex-wrap list-style-none p-0" style="margin:0 auto 2px;">
            <?php
            $insta_media_limit = '15';
            $insta_business_id = '17841461303480732';
            $insta_access_token = 'EAATZCWTdoaT8BOZBHoec9xYjmzEnVLGeDnmpN9P2jLO8p1zNZCAXb4G5CG53xoiCZA2rAbYjxDjfKCiu3Nhkxt7sJMZBqaQjollIwnCAlcE6dkQF7RRN36iYUHRZBcZBQPCHRCZCi0Uuc5YlPC4SVpP8EUiDS14JSJx3Cx2B0af6qsLAYQRAm3yLkFfyezwgCVcZD';

            $json = file_get_contents("https://graph.facebook.com/v6.0/{$insta_business_id}?fields=name%2Cmedia.limit({$insta_media_limit})%7Bcaption%2Cmedia_url%2Cthumbnail_url%2Cpermalink%7D&access_token={$insta_access_token}");

            $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $obj = json_decode($json, true);

            $insta = [];

            foreach ($obj['media']['data'] as $k => $v) {
              if (!empty($v['thumbnail_url'])) {
                $data = [
                  'img' => $v['thumbnail_url'],
                  'caption' => $v['caption'],
                  'link' => $v['permalink'],
                ];
              } else {
                $data = [
                  'img' => $v['media_url'],
                  'caption' => $v['caption'],
                  'link' => $v['permalink'],
                ];
              }
              $insta[] = $data;
            }
            foreach ($insta as $k => $v) {
              echo '<li class="col-4 overflow-hidden p-1" style="height:140px;"><a href="' . $v['link'] . '"><img class="w-100 h-100 object-fit-cover rounded" src="' . $v['img'] . '"></a></li>';
            }
            ?>
          </ul>
          <div class="text-muted"><a href="https://www.instagram.com/tk.sample/">view more</a></div>
        </div>

        <!-- facebook -->
        <div class="col-6 d-flex mt-5">
          <div class="mx-auto p-0" style="width:500px;">
            <p class="fs-3 fw-bold text-center">FaceBook～道の駅ちがさき～</p>
            <iframe class="w-100 rounded" style="height:540px; border:none; overflow:hidden;" src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Ftochimarushop&amp;width=660&amp;height570&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=true&amp;appId=313411855362986" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
          </div>
        </div>
      </div>
    </div>

    <?php include "include/footer.php" ?><!-- フッター -->
  </div>

  <?php include "include/script.php"; ?><!-- script読み込み -->
>>>>>>> 47ccdecfe93de7bbba0e62efae7528ed4d271cbe
</body>

<!-- google tag manager -->

</html>