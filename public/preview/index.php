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
?>

<?php include "include/head.php"; ?><!-- ヘッド読み込み -->

<body>
  <header>
    <div class="banner">
      <img src="img/logo.png" alt="道の駅ちがさきロゴ">
      <?php if ($siteview === 'draft') { ?>
        <h1 class="w-100 position-absolute top-0 start-0 bg-warning">ドラフト版</h1>
      <?php } ?>
    </div>
  </header>

  <!-- ここからお知らせ -->
  <div class="swiper">
    <div class="swiper-wrapper">
      <?php if (!is_null($announces)) { ?>
        <?php foreach ($announces as $announce) : ?>
          <div class="swiper-slide me-3">
            <a class="text-decoration-none" href="announce.php?filename=<?php echo $announce["stamp"]; ?>">
              <p class="w-100 px-2"><?php echo $announce["date"]; ?>：<?php echo $announce["title"]; ?></p>
            </a>
          </div>
        <?php endforeach; ?>
      <?php } ?>
    </div>
  </div>
  <!-- ここまでお知らせ -->



  <?php include "include/footer.php" ?><!-- フッター -->

  <?php include "include/script.php"; ?><!-- script読み込み -->
</body>
<!-- google tag manager -->

</html>