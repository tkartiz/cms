<!doctype html>
<html lang="ja">

<?php
include "include/release.php"; // 公開/非公開変数読込み
include 'include/function_min.php'; // 共通関数読込み
$announces = read_Json('announce', $siteview);
if (!is_null($announces)) {
  $ids = array_column($announces, 'date');
  array_multisort($ids, SORT_DESC, $announces);
}
$count = 0; // 表示記事カウント用変数

$stores = array_reverse(glob('img/store/*.jpg'));
?>

<?php include "include/head.php"; ?><!-- ヘッド読み込み -->

<body>
  <?php include "include/header.php"; ?><!-- ヘッド読み込み -->

  <!-- トップ画面 -->
  <div id="top" class="w-100" style="height:calc(100vh - 50px); background:url(./img/top/image2.jpg);">
    <div class="position-absolute top-50" style="transform:translate(25%, -60%);">
      <div class="clip-text clip-text_one px-5 py-3 fs-1 fw-bold text-center">
        <p class="fs-5 mb-3">“茅ヶ崎らしさ・茅ヶ崎の良さ”を発信する道の駅</p>
        <p class="fs-4 fw-bold m-0">～Mohala He Li'a～</p>
        <p class="fw-bold m-0" style="font-size:4rem;">湘南ちがさき</p>
        <p class="fs-2 fw-bold mb-0">2025<small>年</small>7<small>月</small>&nbsp;オープン!!</p>
        <!-- <div id="countdown" class="timer_1 lh-sm fs-1 fw-bold" style="font-size:6rem;"></div> -->
      </div>
      <p class="text-center" style="color:blueviolet;">Mohala He Li'a：ハワイ語&nbsp;＝&nbsp;夢がかなう：日本語</p>
      <img class="position-absolute end-0" style="width:80px; height:auto; bottom:40px;" src="./img/top/person3.png" alt="サーファー">
      <img class="position-absolute start-0" style="width:90px; height:auto; bottom:40px;" src="./img/top/person6.png" alt="サーファー">
    </div>
    <div class="position-absolute translate-middle text-center" style="width:40vw; height:calc(40vw * 9/16); background-color:rgb(0,0,256,0.2); top:65%; left:70%;">
      完成していく建物の外観図
    </div>
  </div>

  <!-- ここからお知らせ -->
  <div class="swiper" style="height:50px; background-color:#CFE7EF;">
    <div class="swiper-wrapper">
      <?php if (!is_null($announces)) { ?>
        <?php foreach ($announces as $announce) : ?>
          <div class="swiper-slide mt-2 me-3">
            <a class="text-decoration-none" href="announce.php?filename=<?php echo $announce["stamp"]; ?>">
              <p class="w-100 px-2 text-center"><?php echo $announce["date"]; ?>：<?php echo $announce["title"]; ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      <?php } ?>
    </div>
  </div>

  <div style="background-image: url(./img/top/image4.png); background-repeat: repeat-y;">
    <!-- ABOUT -->
    <div class="container">
      <!-- コンセプト -->
      <div id="concept" class="w-100" style="padding:120px 0;">
        <p class="text-center lh-sm title-font" style="font-size:4rem; font-weight:900;">Consepct<br><span class="fs-4">コンセプト</span></p>
        <div>

        </div>
      </div>
    </div>

    <!-- GUIDE -->
    <div class="flex-container mx-auto" style="max-width:1500px;">
      <!-- 施設 -->
      <div id="facility" class="w-100" style="padding:120px 0;">
        <p class="text-center lh-sm title-font" style="font-size:4rem; font-weight:900;">Facility<br><span class="fs-4">施設について</span></p>
        <div class="w-100">
          <div class="d-flex">
            <div class="w-50 position-relative">
              <div class="w-100 position-absolute start-50 bottom-0 p-2" style="transform:translateX(-50%);">
                <div class="d-flex justify-content-center align-items-center mx-auto" style="width:320px; height:320px; background-color:#49ACDD;">
                  <p class="text-center m-0 p-0 text-white fs-1 fw-bold">湘南ちがさき<br><span class="fs-2">完成予想図</span></p>
                </div>
                <p class="mt-5 border fs-5">ここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れます</p>
              </div>
            </div>
            <div class="w-50 position-relative" style="width:calc(160px * 3.5); height:calc(160px * 4); margin-top:80px;">
              <div class="position-absolute top-0 end-0" style="z-index:0; width:calc(160px * 3); height:calc(160px * 3.5); background-color:#72BFC6; opacity: 0.8; transform:translateX(-80px);"></div>
              <div class="position-absolute bottom-0 end-0 overflow-hidden" style="z-index:10; width:calc(160px * 3); height:calc(160px * 3.5);">
                <img class="h-100 object-fit-cover" style="object-position: -120px;" src="./img/intro/3west.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="d-flex">
            <div class="col-6 position-relative me-auto" style="width:calc(160px * 5); height:calc(160px * 3.5); margin-top:160px;">
              <div class="position-absolute top-0 start-0" style="z-index:0; width:calc(160px * 4.5); height:calc(160px * 3); background-color:#72BFC6; opacity: 0.8;"></div>
              <div class="position-absolute bottom-0 end-0 overflow-hidden" style="z-index:10; width:calc(160px * 4.5); height:calc(160px * 3);">
                <img class="h-100 object-fit-cover" style="object-position: 0px;" src="./img/intro/2east.jpg" alt="">
              </div>
            </div>
            <div class="col-6 position-relative">
              <div class="w-75 position-absolute start-50 bottom-0 border p-2 fs-5" style="height:320px; transform:translate(-50%, -80px);">ここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れます</div>
            </div>
          </div>

          <div class="d-flex">
            <div class="col-4 position-relative">
              <div class="w-100 position-absolute start-100 border p-2 fs-5" style="height:320px; transform:translate(-50%, -50%); top:35%;">ここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れます</div>
            </div>
            <div class="col-8 d-flex justify-content-around" style="margin-top:160px;">
              <div class="position-relative" style="width:calc(160px * 3.5); height:calc(160px * 2.3); margin-top:480px;">
                <div class="position-absolute top-0 end-0" style="z-index:0; width:calc(160px * 3.2); height:calc(160px * 2); background-color:#72BFC6; opacity: 0.8;"></div>
                <div class="position-absolute bottom-0 start-0 overflow-hidden" style="z-index:10; width:calc(160px * 3.2); height:calc(160px * 2); transform:translateX(-80px);">
                  <img class="w-100 object-fit-cover" style="object-position: -20px;" src="./img/intro/5naibu2f.jpg" alt="">
                </div>
              </div>
              <div class="position-relative" style="width:calc(160px * 3.5); height:calc(160px * 2.3);">
                <div class="position-absolute top-0 end-0" style="z-index:0; width:calc(160px * 3.2); height:calc(160px * 2); background-color:#72BFC6; opacity: 0.8;"></div>
                <div class="position-absolute bottom-0 end-0 overflow-hidden" style="z-index:10; width:calc(160px * 3.2); height:calc(160px * 2); transform:translateX(-80px);">
                  <img class="h-100 object-fit-cover" style="object-position: -20px;" src="./img/intro/4naibi1f.jpg" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- ストアガイド -->
      <div id="store" class="w-100" style="padding:120px 0;">
        <p class="text-center lh-sm title-font" style="font-size:4rem; font-weight:900;">Store<br><span class="fs-4">ストア</span></p>
        <div>
          <div class="slider2 overflow-hidden" style="height:400px;">
            <div class="swiper-wrapper">
              <?php if (!is_null($stores)) { ?>
                <?php foreach ($stores as $store) : ?>
                  <div class="swiper-slide mt-2 me-3">
                    <a class="text-decoration-none" href="#">
                      <div style="width:600px; height:400px;"><img class="w-100 object-fit-cover" style="object-position:center;" src="<?php echo $store ?>" alt="" loading="lazy"></div>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php } ?>
            </div>
          </div>
          <div class="slider3 overflow-hidden" style="height:400px; margin-top:-8px;">
            <div class="swiper-wrapper">
              <?php if (!is_null($stores)) { ?>
                <?php foreach ($stores as $store) : ?>
                  <div class="swiper-slide mt-2 me-3">
                    <a class="text-decoration-none" href="#">
                      <div style="width:600px; height:400px;"><img class="w-100 object-fit-cover" style="object-position:center;" src="<?php echo $store ?>" alt="" loading="lazy"></div>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <!-- アクセス -->
      <div id="access" class="w-100" style="padding:120px 0;">
        <p class="text-center lh-sm title-font" style="font-size:4rem; font-weight:900;">Access<br><span class="fs-4">アクセス</span></p>
        <div class="w-100 overflow-hidden text-center" style="height:500px;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1627.7083231985107!2d139.37759337864887!3d35.320473835475795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzXCsDE5JzEzLjciTiAxMznCsDIyJzQzLjIiRQ!5e0!3m2!1sja!2sjp!4v1700803864416!5m2!1sja!2sjp" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <!-- SNSガジェット -->
      <div id="sns" class="w-100" style="padding:120px 0;">
        <p class="text-center lh-sm title-font" style="font-size:4rem; font-weight:900;">SNS</p>
        <div class="w-100 d-flex align-items-start" style="margin-top:80px;">
          <!-- facebook -->
          <div class="col-6 d-flex">
            <div class="mx-auto p-0" style="width:500px;">
              <p class="fs-3 fw-bold text-center">FaceBook～道の駅ちがさき～</p>
              <iframe class="w-100" style="height:540px; border:none; overflow:hidden;" src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Ftochimarushop&amp;width=660&amp;height570&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=true&amp;header=true&amp;appId=313411855362986" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
          </div>

          <!-- Instagram -->
          <div class="col-6 text-center" style="margin-bottom:8rem;">
            <p class="fs-3 fw-bold text-center">Instagram～道の駅ちがさき～</p>
            <ul class="w-100 d-flex flex-wrap list-style-none p-0" style="margin:0 auto 2px;">
              <?php
              $insta_media_limit = '16';
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
                echo '<li class="col-3 overflow-hidden" style="height:130px;"><a href="' . $v['link'] . '"><img class="h-100 object-fit-cover" src="' . $v['img'] . '"></a></li>';
              }
              ?>
            </ul>
            <div class="text-muted"><a href="https://www.instagram.com/tk.sample/">view more</a></div>
          </div>
        </div>
      </div>

      <!-- お問合せ -->
      <div id="contact" class="w-100" style="padding:120px 0;">
        <p class="text-center lh-sm title-font" style="font-size:4rem; font-weight:900;">Contact<br><span class="fs-4">お問合せ</span></p>
        <div class="mx-auto" style="width:30rem; margin-top:80px;">
          <dl class="d-flex">
            <dt style="width:8rem;">CONTACT:</dt>
            <dd>茅ヶ崎市経済部産業振興課</dd>
          </dl>
          <dl class="d-flex">
            <dt style="width:8rem;">ADDRESS:</dt>
            <dd>〒253-8686&emsp;茅ヶ崎市茅ヶ崎⼀丁⽬1番1号</dd>
          </dl>
        </div>
      </div>

    </div>
  </div>

  <?php include "include/footer.php" ?><!-- フッター -->

  <?php include "include/script.php"; ?><!-- script読み込み -->
</body>

<script language="JavaScript" type="text/javascript">

</script>


<!-- google tag manager -->

</html>