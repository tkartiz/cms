<!doctype html>
<html lang="ja">

<?php
include 'include/function_min.php'; // 共通関数読込み
$JsonName = "announce.json";
$JsonFile = "json/" . $JsonName;
$announces = read_Json($JsonFile);
$ids = array_column($announces, 'date');
array_multisort($ids, SORT_DESC, $announces);
$count = 0; // 表示記事カウント用変数
?>

<head>
  <!-- google tag manager -->

  <!-- google analytics 4 -->


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="道の駅茅ヶ崎、2025/7/**日（*）グランドオープンいたします！">
  <meta name="keywords" content="道の駅茅ヶ崎, 道の駅ちがさき, 神奈川県, ホノルル, ALOHA湘南, 潮風, ちがさき愛, リラクゼーション, 柳島, しおさい公園, キャンプ場, 国道134号, ファーマーズフォレスト, 直売所, 野菜, スイーツ, 観光, 新しい, グランドオープン">
  <meta name="robots" content="noindex">

  <title>道の駅ちがさき</title>
  <link rel="stylesheet" href="css/style.css">

  <!-- swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="css/swiper.css">

  <!-- fontawesome -->
  <link href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">

  <!-- しっぽり明朝 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;700&display=swap" rel="stylesheet">
</head>


<body>
  <header>
    <div class="banner">
      <img src="img/logo.png" alt="道の駅ちがさきロゴ">
    </div>
  </header>

  <!-- ここからお知らせ -->
  <div class="swiper bg-gray-300">
    <div class="swiper-wrapper">
      <?php foreach ($announces as $announce) : ?>
        <div class="swiper-slide me-3">
          <a class="text-decoration-none" href="announce.php?filename=<?php echo $announce["stamp"]; ?>">
            <p class="w-100 px-2"><?php echo $announce["date"]; ?>：<?php echo $announce["title"]; ?></p>
          </a>
        </div>
        <div class="swiper-slide me-3">
          <a class="text-decoration-none" href="announce.php?filename=<?php echo $announce["stamp"]; ?>">
            <p class="w-100 px-2"><?php echo $announce["date"]; ?>：<?php echo $announce["title"]; ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- ここまでお知らせ -->

  <div class="contents">
    <div class="all-part">
      <div class="part1">
        <div class="recruit-title">
          <div>
            <span class="title-circle">生</span>
            <span class="title-circle">産</span>
            <span class="title-circle">者</span>
            <span class="title-circle">さ</span>
            <span class="title-circle">ん</span>
          </div>
          <div>
            <span class="title-circle">募</span>
            <span class="title-circle">集</span>
            <span class="title-circle">中</span>
            <span class="title-circle">!!</span>
          </div>
        </div>
        <div class="recruit-comment">
          <h2 class="shadow-white">
            道の駅ちがさきのオープンに合わせ<br>
            <span class="space">＊＊品の出品を希望される方を募集しています！</span>
          </h2>
          <h3 class="shadow-white">
            集荷便あり！<br>
            <span class="space">遠方の方など納品が難しい方は集荷に伺います！</span>
          </h3>
        </div>
      </div>
      <div class="part2">
        こちらにイメージを挿入します
      </div>
    </div>
    <div class="recruiting">
      <div class="pdf-download">
        <a class="pdf" href="#" target="_blank">出品エントリーシート <i class="fa-solid fa-angle-down"></i></a>
        <div class="contact">
          <p><i class="fa-solid fa-envelope"></i>お問い合わせはコチラ </p>
          <a class="mail shadow-white" href="mailto:m-shonanchigasaki_info&#64;farmersforest.co.jp">m-shonanchigasaki_info&#64;farmersforest.co.jp</a>
        </div>
      </div>
    </div>
    <div class="contents-bg"></div>
  </div>

  <footer>
    <div class="copylights">
      <p>(C) 2023 道の駅ちがさき All rights reserved.</p>
    </div>
  </footer>

  <!-- swiper -->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="js/swiper.js"></script>

</body>
<!-- google tag manager -->

</html>