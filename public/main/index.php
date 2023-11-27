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
              <p class="w-100 px-3 text-center text-truncate border-end border-2 border-info" style="width: 10rem;">
                <?php if($announce['item'] === "event") { ?>
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

  <div style="background-image: url(./img/top/image4.png); background-repeat: repeat-y;">
    <!-- ABOUT -->
    <div class="container">
      <!-- コンセプト -->
      <div id="concept" class="w-100" style="padding:120px 0;">
        <p class="text-center title-font" style="font-size:4rem; font-weight:900; line-height:3rem;">Consept<br><span class="fs-4">コンセプト</span></p>
        <div>
          <div class="position-relative w-100 mt-5" style="height:800px;">
            <div class="position-absolute translate-middle start-50 mt-5" style="top:100px;">
              <p class="fs-4 text-center mb-0">～Mohala He Li'a～</p>
              <p class="fs-1 fw-bold text-center">湘南ちがさき</p>
            </div>
            <div class="position-absolute p-4 rounded-pill d-flex align-items-center top-0 start-0" style="width:450px; height:450px; background-color:#49acdd ;">
              <div class="w-100 text-center">
                <p class="fs-5 fw-bold mb-5">湘南・茅ヶ崎の新しい拠点</p>
                <ul class="list-unstyled lh-lg">
                  <li class="mb-4">観光も日常も手軽に楽しめる場所</li>
                  <li class="mb-4">誰でも使いやすく、居心地のいい空間とサービス</li>
                  <li class="mb-4">元気で楽しい湘南・茅ヶ崎のくらしを発信</li>
                </ul>
              </div>
            </div>

            <div class="position-absolute translate-middle p-4 rounded-pill d-flex align-items-center" style="top:550px; left:35%; width:450px; height:450px; background-color:#de49ac;">
              <div class="w-100 text-center">
                <p class="fs-5 fw-bold mb-5">茅ヶ崎のここがいい、アピールしよう</p>
                <ul class="list-unstyled lh-lg">
                  <li class="mb-4">茅ヶ崎の海や自然、季節感を楽しもう</li>
                  <li class="mb-4">地元のものや文化を大事にして、<br>みんなに知ってもらおう</li>
                </ul>
              </div>
            </div>

            <div class="position-absolute translate-middle p-4 rounded-pill d-flex align-items-center" style="top:550px; left:65%; width:450px; height:450px; background-color:#de7b49;">
              <div class="w-100 text-center">
                <p class="fs-5 fw-bold mb-5">みんなで盛り上げよう</p>
                <ul class="list-unstyled lh-lg">
                  <li class="mb-4">楽しさやアイデアを大事にして、<br>みんなが愛する場所にしよう</li>
                  <li class="mb-4">価値観の違いを楽しんで、<br>一緒にエリアをよくしていこう</li>
                </ul>
              </div>
            </div>

            <div class="position-absolute p-4 rounded-pill d-flex align-items-center top-0 end-0" style="width:450px; height:450px; background-color:#49de7b;">
              <div class="w-100 text-center">
                <p class="fs-5 fw-bold mb-5">湘南・茅ヶ崎の未来を一緒に作ろう</p>
                <ul class="list-unstyled lh-lg">
                  <li class="mb-4">地元の力を引き出して、みんなが暮らしやすい場所に</li>
                  <li class="mb-4">クリエイティブなアイデアや地域への思いを応援しよう</li>
                  <li class="mb-4"> 旅行や体験を通して、<br>湘南・茅ヶ崎をもっと好きになってもらおう​​</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- GUIDE -->
    <div class="flex-container mx-auto" style="max-width:1500px;">
      <!-- 施設 -->
      <div id="facility" class="w-100" style="padding:120px 0;">
        <p class="text-center title-font" style="font-size:4rem; font-weight:900;  line-height:3rem;">Facility<br><span class="fs-4">施設について</span></p>
        <div class="w-100">
          <div class="w-100 position-relative overflow-hidden text-center rounded" style="margin-top:80px; height:40vw;">
            <!-- 外観1 -->
            <div id="pers1" class="position-absolute" style="z-index:10; width:32px; height:32px; top:18vw; left:60%; cursor:pointer;">
              <svg fill="currentColor" class="w-100 h-100 bi bi-arrow-down-circle-fill bg-white rounded-pill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
              </svg>
            </div>

            <!-- 外観2 -->
            <div id="pers2" class="position-absolute" style="z-index:10; width:32px; height:32px; top:27vw; left:50%; cursor:pointer;">
              <svg fill="currentColor" class="w-100 h-100 bi bi-arrow-up-right-circle-fill bg-white rounded-pill" style="transform:rotate(30deg)" viewBox="0 0 16 16">
                <path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8zm5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707l-4.096 4.096z" />
              </svg>
            </div>

            <!-- 外観3 -->
            <div id="pers3" class="position-absolute" style="z-index:10; width:32px; height:32px; top:31.5vw; left:50%; cursor:pointer;">
              <svg fill="currentColor" class="w-100 h-100 bi bi-arrow-right-circle-fill bg-white rounded-pill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
              </svg>
            </div>

            <!-- 内観 -->
            <div id="pers4" class="position-absolute" style="z-index:10; width:32px; height:32px; top:26vw; left:65%; cursor:pointer;">
              <svg fill="currentColor" class="w-100 h-100 bi bi-c-circle-fill bg-white rounded-pill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c.961 0 1.641.633 1.729 1.512h1.295v-.088c-.094-1.518-1.348-2.572-3.03-2.572-2.068 0-3.269 1.377-3.269 3.638v1.073c0 2.267 1.178 3.603 3.27 3.603 1.675 0 2.93-1.02 3.029-2.467v-.093H9.875c-.088.832-.75 1.418-1.729 1.418-1.224 0-1.927-.891-1.927-2.461v-1.06c0-1.583.715-2.503 1.927-2.503Z" />
              </svg>
            </div>


            <img class="w-100 object-fit-cover" style="z-index:0;" src="./img/intro/image00.jpg" alt="">
            <div id="pers-frm1" class="d-none position-absolute top-0 start-0 overflow-hidden border border-white border-5 border-top-0 border-start-0" style="z-index:10; width: 56%; height:26vw;">
              <img id="pers1-img" class="impress d-none w-100 h-100 object-fit-cover" src="./img/intro/image01.jpg" alt="">
              <img id="pers2-img" class="impress d-none w-100 h-100 object-fit-cover" src="./img/intro/image02.jpg" alt="">
              <img id="pers3-img" class="impress d-none w-100 h-100 object-fit-cover" src="./img/intro/image03_kai.jpg" alt="">
            </div>
            <div id="pers-frm2" class="d-none w-100 d-flex position-absolute top-0 start-0 bg-white overflow-hidden" style="z-index:10; height:17vw;">
              <div class="col-4 h-100 overflow-hidden border border-white border-5 border-top-0 border-start-0">
                <img id="pers4-img" class="impress h-100 object-fit-cover" src="./img/intro/image04.jpg" alt="">
              </div>
              <div class="col-4 h-100 overflow-hidden border border-white border-5 border-top-0 border-start-0">
                <img id="pers5-img" class="impress h-100 object-fit-cover" src="./img/intro/image05.jpg" alt="">
              </div>
              <div class="col-4 h-100 overflow-hidden border border-white border-5 border-top-0 border-start-0 border-end-0">
                <img id="pers6-img" class="impress h-100 object-fit-cover" src="./img/intro/image06.jpg" alt="">
              </div>
            </div>
          </div>

          <!-- <div class="d-flex">
            <div class="w-50 position-relative">
              <div class="w-100 position-absolute start-50 bottom-0 p-2" style="transform:translateX(-50%);">
                <div class="d-flex justify-content-center align-items-center mx-auto" style="width:320px; height:320px; background-color:rgb(40,40,40,0.6);">
                  <p class="text-center m-0 p-0 text-white fs-1 fw-bold">湘南ちがさき<br><span class="fs-2">完成イメージ</span></p>
                </div>
                <p class="mt-5 fs-5"></p>
              </div>
            </div>
            <div class="w-50 position-relative" style="width:calc(160px * 3.5); height:calc(160px * 4); margin-top:80px;">
              <div class="position-absolute top-0 end-0" style="z-index:0; width:calc(160px * 3); height:calc(160px * 3.5); background-color:#72BFC6; opacity: 0.8; transform:translateX(-80px);"></div>
              <div class="position-absolute bottom-0 end-0 overflow-hidden" style="z-index:10; width:calc(160px * 3); height:calc(160px * 3.5);">
                <img class="h-100 object-fit-cover" style="object-position: -240px;" src="./img/intro/image01.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="d-flex">
            <div class="col-6 position-relative me-auto" style="width:calc(160px * 5); height:calc(160px * 3.5); margin-top:160px;">
              <div class="position-absolute top-0 start-0" style="z-index:0; width:calc(160px * 4.5); height:calc(160px * 3); background-color:#72BFC6; opacity: 0.8;"></div>
              <div class="position-absolute bottom-0 end-0 overflow-hidden" style="z-index:10; width:calc(160px * 4.5); height:calc(160px * 3);">
                <img class="h-100 object-fit-cover" style="object-position: 0px;" src="./img/intro/image03_kai.jpg" alt="">
              </div>
            </div>
            <div class="col-6 position-relative">
              <div class="w-75 position-absolute start-50 bottom-0 p-2 fs-5" style="height:320px; transform:translate(-50%, -80px);"></div>
            </div>
          </div>

          <div class="d-flex">
            <div class="col-4 position-relative">
              <div class="w-100 position-absolute start-100 p-2 fs-5" style="height:320px; transform:translate(-50%, -50%); top:35%;"></div>
            </div>
            <div class="col-8 d-flex justify-content-around" style="margin-top:160px;">
              <div class="position-relative" style="width:calc(160px * 3.5); height:calc(160px * 2.3); margin-top:480px;">
                <div class="position-absolute top-0 end-0" style="z-index:0; width:calc(160px * 3.2); height:calc(160px * 2); background-color:#72BFC6; opacity: 0.8;"></div>
                <div class="position-absolute bottom-0 start-0 overflow-hidden" style="z-index:10; width:calc(160px * 3.2); height:calc(160px * 2); transform:translateX(-80px);">
                  <img class="w-100 object-fit-cover" style="width:calc(160px * 3.2); height:calc(160px * 2); object-position: -100px;" src="./img/intro/image05.jpg" alt="">
                </div>
              </div>
              <div class="position-relative" style="width:calc(160px * 3.5); height:calc(160px * 2.3);">
                <div class="position-absolute top-0 end-0" style="z-index:0; width:calc(160px * 3.2); height:calc(160px * 2); background-color:#72BFC6; opacity: 0.8;"></div>
                <div class="position-absolute bottom-0 end-0 overflow-hidden" style="z-index:10; width:calc(160px * 3.2); height:calc(160px * 2); transform:translateX(-80px);">
                  <img class="h-100 object-fit-cover" style="width:calc(160px * 3.2); height:calc(160px * 2); object-position: -20px;" src="./img/intro/image06.jpg" alt="">
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <div class="container">
      <!-- ストアガイド -->
      <div id="store" class="w-100" style="padding:120px 0;">
        <p class="text-center title-font" style="font-size:4rem; font-weight:900;  line-height:3rem;">Store<br><span class="fs-4">ストア</span></p>
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
        <p class="text-center title-font" style="font-size:4rem; font-weight:900; line-height:3rem;">Access<br><span class="fs-4">アクセス</span></p>
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
        <p class="text-center title-font" style="font-size:4rem; font-weight:900; line-height:3rem;">Contact<br><span class="fs-4">お問合せ</span></p>
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