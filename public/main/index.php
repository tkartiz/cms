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
  <div class="w-100" style="height:calc(100vh - 50px); background-color:#49ACDD;">
    <div class="position-absolute top-50" style="transform:translate(25%, -50%);">
      <div class="clip-text clip-text_one px-5 py-3 fs-1 fw-bold text-center">
        <p class="fs-1 fw-bold mb-0">道の駅 ちがさき</p>
        <p class="fs-2 fw-bold mb-0">2025<small>年</small>7<small>月</small>&nbsp;Open!!</p>
        <div id="countdown" class="timer_1 lh-sm fs-1 fw-bold" style="font-size:6rem;"></div>
      </div>
    </div>
  </div>

  <!-- ここからお知らせ -->
  <div class="swiper" style="height:50px; background-color:aliceblue;">
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

  <div class="flex-container mx-auto" style="max-width:1500px;">
    <!-- パース -->
    <div class="w-100" style="padding:120px 0;">
      <p class="text-center fs-1 fw-bold">施設のご紹介</p>
      <div class="w-100">
        <div class="d-flex">
          <div class="w-50 position-relative">
            <div class="w-100 position-absolute start-50 bottom-0 p-2" style="transform:translateX(-50%);">
              <div class="d-flex justify-content-center align-items-center mx-auto" style="width:320px; height:320px; background-color:#49ACDD;">
                <p class="text-center m-0 p-0 text-white fs-1 fw-bold">道の駅ちがさき<br><span class="fs-2">完成予想図</span></p>
              </div>
              <p class="mt-5 border fs-4">ここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れます</p>
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
            <div class="w-75 position-absolute start-50 bottom-0 border p-2 fs-4" style="height:320px; transform:translate(-50%, -80px);">ここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れます</div>
          </div>
        </div>

        <div class="d-flex">
          <div class="col-4 position-relative">
            <div class="w-100 position-absolute start-100 border p-2 fs-4" style="height:320px; transform:translate(-50%, -50%); top:35%;">ここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れますここに説明を入れます</div>
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
    <div class="w-100" style="padding:120px 0;">
      <p class="text-center fs-1 fw-bold">ストア紹介</p>
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

    <!-- SNSガジェット -->
    <div class="w-100" style="padding:120px 0;">
      <p class="text-center fs-1 fw-bold">SNS</p>
    </div>
  </div>

  <?php include "include/footer.php" ?><!-- フッター -->

  <?php include "include/script.php"; ?><!-- script読み込み -->
</body>

<script language="JavaScript" type="text/javascript">

</script>


<!-- google tag manager -->

</html>